<?php

namespace App\Http\Livewire\Bar;

use App\Models\Bar;
use App\Models\BarTransaction;
use App\Models\BarTransactionDetail;
use Livewire\Component;
use Psy\CodeCleaner\AssignThisVariablePass;

class TransactionPage extends Component
{
    public $query,$menuBar,$menuAdded ;
    public $addId ,$addQty , $addTotal;
    public $total,$bar,$name ;
    public $transactions = [];
    protected $rules = [
        'name' => 'required'
    ];
    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function mount(){
        $this->resetAll();
    }
    public function updatedQuery()
    {
        $this->menuBar = Bar::where('name', 'like', '%' . $this->query . '%')
            ->whereNotIn('id',$this->menuAdded)
            ->get()
            ->toArray();
    }

    public function resetAdd(){
        $this->query = '';
        $this->menuBar = [];
    }
    public function resetAll(){
        $this->query = '';
        $this->menuBar = [];
        $this->menuAdded = [];
        $this->transactions = [];
        $this->name = null ;
        $this->total = 0 ;
    }

    public function addOrder($index){
        array_push($this->transactions,[
            'product_id' => $this->menuBar[$index]['id'],
            'name' =>  $this->menuBar[$index]['name'],
            'price' =>  $this->menuBar[$index]['price'], 
            'qty' => 0,
        ]);
        array_push($this->menuAdded,$this->menuBar[$index]['id']);
        $this->resetAdd();
    }

    public function deleteOrder($index){
        $key = array_search($this->transactions[$index]['product_id'], $this->menuAdded);
        if ($key !== false) {
            unset($this->menuAdded[$key]);
        }
        unset($this->transactions[$index]);
        $this->transactions = array_values($this->transactions);
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
            $trId =  BarTransaction::create([
                'customer' => $validatedData['name'],
                'total' => $this->total,
                'user_id' => auth()->user()->id,
                'paid' => false
            ]);
            foreach($this->transactions as $tr){
                if($tr['qty'] > 0 ){
                    BarTransactionDetail::create([
                        'bar_id' => $tr['product_id'],
                        'bar_transaction_id' => $trId->id,
                        'qty' => $tr['qty'],
                        'price' => $tr['price'],
                        'total' => (intval($tr['price']) * intval($tr['qty']))
                    ]);
                }
            }

            $this->dispatchBrowserEvent('success-add',[
                'total' => priceFormat($this->total)
            ]);
            $this->resetAll();
        }else {
            $this->dispatchBrowserEvent('null');
        }
    }
    public function render()
    {
        $this->countTotal();
        return view('livewire.bar.transaction-page');
    }
}
