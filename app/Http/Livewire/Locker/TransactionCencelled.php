<?php

namespace App\Http\Livewire\Locker;

use App\Models\LockerTransaction;
use App\Models\LockerTransactionDetail;
use App\Models\TicketTransaction;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class TransactionCencelled extends Component
{
    public $transactionDetails ;
    public $idTr ,$idDeleted,$idRestore ;
    protected $listeners = ['deleted','undeleted','restored','unrestored'];

    // public function mount(){
    //     $this->transactionDetails = TicketTransaction::with('detail')->first();
    //     $this->idTr = 0;
    // }

    public function info($id){
        $this->transactionDetails = LockerTransaction::onlyTrashed()->withOnly('detail')->findOrFail($id);
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
            LockerTransaction::where('id' ,$id)
            ->forceDelete();
            LockerTransactionDetail::where('locker_transaction_id',$id)
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
            LockerTransaction::withTrashed()->where('id' ,$id)
            ->restore();
            LockerTransactionDetail::withTrashed()->where('locker_transaction_id',$id)
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
        $transactions = LockerTransaction::onlyTrashed()->with('user')->get();
        return view('livewire.locker.transaction-cencelled',compact('transactions'));
    }
}
