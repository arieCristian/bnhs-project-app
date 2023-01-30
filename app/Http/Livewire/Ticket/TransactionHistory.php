<?php

namespace App\Http\Livewire\Ticket;

use App\Models\CencelledTicketTransaction;
use App\Models\Role;
use App\Models\TicketTransaction;
use App\Models\TicketTransactionDetail;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class TransactionHistory extends Component
{
    public $transactionDetails ;
    public $idTr ,$idDeleted ;
    protected $listeners = ['cencelled','uncencelled'];

    public function mount(){
        $this->transactionDetails = TicketTransaction::with('detail')->first();
        $this->idTr = 0;
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
            $transactions = TicketTransaction::where('user_id', auth()->user()->id)->get();
        }else{
            $transactions = TicketTransaction::with('user')->get();
        }
        return view('livewire.ticket.transaction-history',compact('transactions'));
    }
}
