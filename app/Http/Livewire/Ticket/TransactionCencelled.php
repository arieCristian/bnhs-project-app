<?php

namespace App\Http\Livewire\Ticket;

use App\Models\TicketTransaction;
use App\Models\TicketTransactionDetail;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class TransactionCencelled extends Component
{
    public $transactionDetails ;
    public $idTr ,$idDeleted,$idRestore ;
    protected $listeners = ['deleted','undeleted','restored','unrestored'];

    public function mount(){
        $this->transactionDetails = TicketTransaction::with('detail')->first();
        $this->idTr = 0;
    }

    public function info($id){
        $this->transactionDetails = TicketTransaction::onlyTrashed()->withOnly('detail')->findOrFail($id);
        $this->idTr = $id;
    }

    public function delete($id){
        $this->dispatchBrowserEvent('confirm-delete',[
            'id' => $id
        ]);
        $this->idDeleted = $id ;
    }
    public function deleted(){
        $id = $this->idDeleted;
        DB::transaction(function() use ($id){
            TicketTransaction::where('id' ,$id)
            ->forceDelete();
            TicketTransactionDetail::where('ticket_transaction_id',$id)
            ->forceDelete();
        });
        $this->dispatchBrowserEvent('success-deleted',[
            'id' => $id
        ]);
    }

    public function undeleted(){
        $this->dispatchBrowserEvent('undeleted');
        $this->idDeleted = null;
    }

   

    /* RESTORE FUNCTION */
    public function restore($id){
        $this->dispatchBrowserEvent('confirm-restore',[
            'id' => $id
        ]);
        $this->idRestore = $id ;
    }
    public function restored(){
        $id = $this->idRestore;
        DB::transaction(function() use ($id){
            TicketTransaction::withTrashed()->where('id' ,$id)
            ->restore();
            TicketTransactionDetail::withTrashed()->where('ticket_transaction_id',$id)
            ->restore();
        });
        $this->dispatchBrowserEvent('success-resotred',[
            'id' => $id
        ]);
    }

    public function unrestored(){
        $this->dispatchBrowserEvent('unrestored');
        $this->idRestore = null;
    }
    


    public function render()
    {
        $transactions = TicketTransaction::onlyTrashed()->with('user')->get();
        return view('livewire.ticket.transaction-cencelled',compact('transactions'));
    }
}
