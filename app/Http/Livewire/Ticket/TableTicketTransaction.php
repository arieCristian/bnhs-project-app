<?php

namespace App\Http\Livewire\Ticket;

use App\Models\TicketTransaction;
use Livewire\Component;

class TableTicketTransaction extends Component
{

    public function render()
    {
        $transactions = TicketTransaction::all();
        return view('livewire.ticket.table-ticket-transaction',compact('transactions'));
    }
}
