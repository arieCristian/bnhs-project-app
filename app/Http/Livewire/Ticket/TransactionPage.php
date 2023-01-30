<?php

namespace App\Http\Livewire\Ticket;

use App\Models\Ticket;
use App\Models\TicketTransaction;
use App\Models\TicketTransactionDetail;
use Livewire\Component;

class TransactionPage extends Component
{
    public $total,$paid;
    public $transactions = [];
    public function mount(){
        $tickets = Ticket::all();
        foreach($tickets as $ticket){
            array_push($this->transactions,[
                'id' => $ticket->id,
                'ticket_name' => $ticket->name, 
                'qty' => 0,
                'price' => $ticket->price
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
        $this->dispatchBrowserEvent('add-transaction',[
            'total' => $this->total
        ]);
    }
    public function closeModal(){
        $this->paid = null ;
        $this->dispatchBrowserEvent('close-modal');
    }

    public function resetField(){
        $this->paid = null ;
        $this->total = 0 ;
        foreach ($this->transactions as $index => $tr){
            $this->transactions[$index]['qty'] = 0;
        }
    }

    public function executeTransaction(){
        foreach($this->transactions as $index => $tr){
            $this->transactions[$index]['qty'] = intval($tr['qty']);
        }
        if($this->total  != 0){
            $trId =  TicketTransaction::create([
                'total' => $this->total,
                'user_id' => auth()->user()->id
            ]);

            foreach($this->transactions as $tr){
                if($tr['qty'] > 0 ){
                    TicketTransactionDetail::create([
                        'ticket_id' => $tr['id'],
                        'ticket_transaction_id' => $trId->id,
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
        return view('livewire.ticket.transaction-page');
    }
}
