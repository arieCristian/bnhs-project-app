<?php

namespace App\Http\Livewire\Locker;

use App\Models\LockerTransaction;
use App\Models\LockerTransactionDetail;
use App\Models\Role;
use App\Models\TicketTransaction;
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
        $this->transactionDetails = LockerTransaction::with('detail')->first();
        $this->idTr = 0;
        $this->orderBy = 'created_at';
        $this->from = date('Y-m-d');
        $this->to = date('Y-m-d');
        $this->asc = 'desc';
    }

    public function info($id){
        $this->transactionDetails = LockerTransaction::withOnly('detail')->findOrFail($id);
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
            LockerTransaction::where('id' ,$id)
            ->delete();
            LockerTransactionDetail::where('locker_transaction_id',$id)
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
        $dateTo = date('Y-m-d', strtotime( $this->to . " +1 days"));
        $transactions = LockerTransaction::with('user')
        ->where('paid',true)
        ->whereBetween('created_at', [$this->from, $dateTo])
        ->orderBy($this->orderBy, $this->asc)
        ->paginate(10);

        $total = LockerTransaction::where('paid',true)
        ->whereBetween('created_at', [$this->from, $dateTo])
        ->sum('total');
        return view('livewire.locker.transaction-history',compact('transactions','total'));
    }
}
