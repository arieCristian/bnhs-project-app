<?php

namespace App\Http\Livewire\Locker;

use App\Models\Locker;
use App\Models\LockerTransaction;
use App\Models\LockerTransactionDetail;
use Livewire\Component;

class TransactionEdit extends Component
{
    public $transaction ;
    public $total,$name;
    public $transactions = [];
    protected $listeners = ['back'];
    protected $rules = [
        'name' => 'required'
    ];
    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function mount(){
        $lockers = Locker::all();
        $index = 0 ;
        foreach($lockers as $locker){
            $qty = 0 ;
            $td = $this->transaction->detail->where('locker_id',$locker->id);
            if(count($td) >0){
                $qty =  $td[$index]->qty;
                $index++ ;
            }
            array_push($this->transactions,[
                'id' => $locker->id,
                'locker_name' => $locker->name, 
                'qty' => $qty,
                'price' => $locker->price
            ]);
        }
        $this->total = $this->transaction->total;
        $this->name = $this->transaction->customer;
    }

    public function countTotal(){
        $this->total = 0;
        foreach ($this->transactions as $tr){
            $this->total += (intval($tr['price']) * intval($tr['qty']));
        }
    }

    public function editTransaction(){
        $validatedData = $this->validate();
        LockerTransaction::where('id', $this->transaction->id)
        ->update([
            'total'=>$this->total,
            'customer' => $validatedData['name']
        ]);

        LockerTransactionDetail::where('locker_transaction_id',$this->transaction->id)->forceDelete();

        foreach($this->transactions as $tr){
            $qty = intval($tr['qty']);
            if($qty > 0 ){
                LockerTransactionDetail::create([
                    'locker_id' => $tr['id'],
                    'locker_transaction_id' => $this->transaction->id,
                    'qty' => $qty,
                    'price' => $tr['price'],
                    'total' => intval($tr['price']) * $qty
                ]);
            }
        }
        $this->dispatchBrowserEvent('success-edited');
        
    }

    public function back(){
        return redirect()->to('/locker/transaction');
    }

    public function render()
    {
        $this->countTotal();
        return view('livewire.locker.transaction-edit');
    }
}
