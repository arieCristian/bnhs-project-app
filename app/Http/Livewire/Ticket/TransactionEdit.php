<?php

namespace App\Http\Livewire\Ticket;

use App\Models\Ticket;
use App\Models\TicketTransaction;
use App\Models\TicketTransactionDetail;
use Livewire\Component;

class TransactionEdit extends Component
{
    public $transaction ;
    public $total;
    public $transactions = [];
    public function mount(){
        $tickets = Ticket::all();
        foreach($tickets as $ticket){
            $qty = 0 ;
            $td = $this->transaction->detail->where('ticket_id',$ticket->id);
            if(count($td) >0){
                $qty =  $td[0]->qty;
            }
            array_push($this->transactions,[
                'id' => $ticket->id,
                'ticket_name' => $ticket->name, 
                'qty' => $qty,
                'price' => $ticket->price
            ]);
        }
        $this->total = $this->transaction->total;
    }

    public function countTotal(){
        $this->total = 0;
        foreach ($this->transactions as $tr){
            $this->total += (intval($tr['price']) * intval($tr['qty']));
        }
    }

    public function editTransaction(){
        TicketTransaction::where('id', $this->transaction->id)
        ->update(['total'=>$this->total]);

        TicketTransactionDetail::where('ticket_transaction_id',$this->transaction->id)->delete();

        foreach($this->transactions as $tr){
            $qty = intval($tr['qty']);
            if($qty > 0 ){
                TicketTransactionDetail::create([
                    'ticket_id' => $tr['id'],
                    'ticket_transaction_id' => $this->transaction->id,
                    'qty' => $qty,
                    'price' => $tr['price'],
                    'total' => intval($tr['price']) * $qty
                ]);
            }
        }

        $this->dispatchBrowserEvent('success-edited');
        return redirect()->to('/ticket/transaction');
    }

    public function render()
    {
        $this->countTotal();
        return view('livewire.ticket.transaction-edit');
    }
}
