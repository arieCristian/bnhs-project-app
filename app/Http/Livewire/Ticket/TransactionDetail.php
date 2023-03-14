<?php

namespace App\Http\Livewire\Ticket;

use App\Models\Role;
use App\Models\TicketTransactionDetail;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class TransactionDetail extends Component
{
    use WithPagination ;
    protected $paginationTheme = 'bootstrap';
    public $from,$to,$orderBy,$asc ;
    public function mount(){
        $this->orderBy = 'created_at';
        $this->from = date('Y-m-d');
        $this->to = date('Y-m-d');
        $this->asc = 'desc';
    }

    public function render()
    {       
        $dateTo = date('Y-m-d', strtotime( $this->to . " +1 days"));
        // if(auth()->user()->role_id == Role::IS_TICKET){
        //     $transactions = TicketTransactionDetail::whereRelation('ticket_transactions','user_id', auth()->user()->id)
        //     ->with('ticket')
        //     ->whereBetween('created_at', [$this->from, $dateTo])
        //     ->orderBy($this->orderBy, $this->asc)
        //     ->paginate(10);
        //     $totalPrice = TicketTransactionDetail::whereBetween('created_at', [$this->from, $dateTo])
        //     ->sum('total');
        //     $totalQty = TicketTransactionDetail::whereBetween('created_at', [$this->from, $dateTo])
        //     ->sum('qty');
        //     $transactionsSum = TicketTransactionDetail::select('tickets.name as ticket_name', DB::raw('sum(total) as total_price'),DB::raw('sum(qty) as total_qty'))
        //     ->join('tickets', 'ticket_transaction_details.ticket_id', '=', 'tickets.id')
        //     ->groupBy('tickets.name')
        //     ->whereBetween('ticket_transaction_details.created_at', [$this->from, $dateTo])
        //     ->get();
        // }
        $transactions = TicketTransactionDetail::with('ticket')
        ->whereBetween('created_at', [$this->from, $dateTo])
        ->orderBy($this->orderBy, $this->asc)
        ->paginate(10);
        $totalPrice = TicketTransactionDetail::whereBetween('created_at', [$this->from, $dateTo])
        ->sum('total');
        $totalQty = TicketTransactionDetail::whereBetween('created_at', [$this->from, $dateTo])
        ->sum('qty');
        $transactionsSum = TicketTransactionDetail::select('tickets.name as ticket_name', DB::raw('sum(total) as total_price'),DB::raw('sum(qty) as total_qty'))
        ->join('tickets', 'ticket_transaction_details.ticket_id', '=', 'tickets.id')
        ->groupBy('tickets.name')
        ->whereBetween('ticket_transaction_details.created_at', [$this->from, $dateTo])
        ->get();
        return view('livewire.ticket.transaction-detail',compact('transactions','transactionsSum','totalPrice','totalQty'));
    }
}
