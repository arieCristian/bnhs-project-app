<?php

namespace App\Http\Livewire\Ticket;

use App\Models\CencelledTicketTransaction;
use App\Models\Role;
use App\Models\TicketTransaction;
use App\Models\TicketTransactionDetail;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class TransactionHistory extends Component
{
    use WithPagination ;
    protected $paginationTheme = 'bootstrap';
    public $transactionDetails ;
    public $idTr ,$idDeleted ;
    public $from,$to,$orderBy,$asc ;
    protected $listeners = ['cencelled','uncencelled'];

    public function mount(){
        $this->transactionDetails = TicketTransaction::with('detail')->first();
        $this->idTr = 0;
        $this->orderBy = 'created_at';
        $this->from = date('Y-m-d');
        $this->to = date('Y-m-d');
        $this->asc = 'desc';
    }

    public function info($id){
        $this->transactionDetails = TicketTransaction::withOnly('detail')->findOrFail($id);
        $this->idTr = $id;
    }

    public function cencel($id){
        $this->dispatchBrowserEvent('confirm-cencelled',[
            'id' => $id
        ]);
        $this->idDeleted = $id;
    }

    public function cencelled(){
        $id = $this->idDeleted;
        DB::transaction(function() use ($id){
            TicketTransaction::where('id' ,$id)
            ->delete();
            TicketTransactionDetail::where('ticket_transaction_id',$id)
            ->delete();
        });
        $this->dispatchBrowserEvent('success-cencelled',[
            'id' => $id
        ]);
    }

    public function uncencelled(){
        $this->dispatchBrowserEvent('uncencelled');
        $this->idDeleted = null;
    }


    public function closeModal(){
        $this->idTr = 0;
        $this->dispatchBrowserEvent('close-modal');
    }


    public function render()
    {
        if(auth()->user()->role_id == Role::IS_TICKET){
            $transactions = TicketTransaction::where('user_id', auth()->user()->id);
        }else{
            $transactions = TicketTransaction::with('user');
        }
        $dateTo = date('Y-m-d', strtotime( $this->to . " +1 days"));
        $transactions = $transactions
        ->whereBetween('created_at', [$this->from, $dateTo])
        ->orderBy($this->orderBy, $this->asc)
        ->paginate(10);
        return view('livewire.ticket.transaction-history',compact('transactions'));
    }
}
