<?php

namespace App\Http\Livewire\Locker;

use App\Models\Locker;
use App\Models\LockerTransaction;
use App\Models\LockerTransactionDetail;
use Livewire\Component;
use Psy\CodeCleaner\AssignThisVariablePass;

class TransactionPage extends Component
{
    public $total,$paid,$name;
    public $transactions = [];
    protected $rules = [
        'name' => 'required'
    ];
    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function mount(){
        $lockers = Locker::all();
        foreach($lockers as $locker){
            array_push($this->transactions,[
                'id' => $locker->id,
                'ticket_name' => $locker->name, 
                'qty' => 0,
                'price' => $locker->price
            ]);
        }
        $this->total = 0;
    }
    public function countTotal(){
        $this->total = 0;
        foreach ($this->transactions as $tr){
            $this->total = $this->total + (intval($tr['price']) * intval($tr['qty']));
        }
    }

    public function addTransaction(){
        $validatedData = $this->validate();
        foreach($this->transactions as $index => $tr){
            $this->transactions[$index]['qty'] = intval($tr['qty']);
        }
        if($this->total  != 0){
            $trId =  LockerTransaction::create([
                'customer' => $validatedData['name'],
                'total' => $this->total,
                'user_id' => auth()->user()->id,
                'paid' => false
            ]);
            foreach($this->transactions as $tr){
                if($tr['qty'] > 0 ){
                    LockerTransactionDetail::create([
                        'locker_id' => $tr['id'],
                        'locker_transaction_id' => $trId->id,
                        'qty' => $tr['qty'],
                        'price' => $tr['price'],
                        'total' => (intval($tr['price']) * intval($tr['qty']))
                    ]);
                }
            }

            $this->dispatchBrowserEvent('success-add',[
                'total' => priceFormat($this->total)
            ]);
            $this->resetField();
            return redirect()->to('/locker/transaction');
        }else {
            $this->dispatchBrowserEvent('null');
        }
    }

    public function resetField(){
        $this->total = 0 ;
        $this->name = null;
        foreach ($this->transactions as $index => $tr){
            $this->transactions[$index]['qty'] = 0;
        }
    }

    public function executeTransaction(){
        foreach($this->transactions as $index => $tr){
            $this->transactions[$index]['qty'] = intval($tr['qty']);
        }
        if($this->total  != 0){
            $trId =  LockerTransaction::create([
                'total' => $this->total,
                'user_id' => auth()->user()->id,
                'paid' => false
            ]);
            foreach($this->transactions as $tr){
                if($tr['qty'] > 0 ){
                    LockerTransactionDetail::create([
                        'locker_id' => $tr['id'],
                        'locker_transaction_id' => $trId->id,
                        'qty' => $tr['qty'],
                        'price' => $tr['price'],
                        'total' => (intval($tr['price']) * intval($tr['qty']))
                    ]);
                }
            }
            if(isset($this->paid)){
                $cashback =  priceToInt($this->paid) -$this->total;
                $cashback = priceFormat($cashback);
            }else {
                $cashback = "Rp.0" ;
            }
            $this->dispatchBrowserEvent('success-add',[
                'cashback' => $cashback
            ]);
            $this->resetField();
            $this->closeModal();
        }else {
            $this->closeModal();
            $this->dispatchBrowserEvent('null');
        }

    }
    public function render()
    {
        $this->countTotal();
        return view('livewire.locker.transaction-page');
    }
}
