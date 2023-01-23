<?php

namespace App\Http\Livewire\Ticket;

use App\Models\TicketTransaction;
use Livewire\Component;

class TransactionHistory extends Component
{
    public $transactionDetails ;

    public function mount(){
        $this->transactionDetails = TicketTransaction::with('detail')->first();
    }

    public function info($id){
        $this->transactionDetails = TicketTransaction::withOnly('detail')->findOrFail($id);
    }
    public function render()
    {
        $transactions = TicketTransaction::all();
        return view('livewire.ticket.transaction-history',compact('transactions'));
    }
}
