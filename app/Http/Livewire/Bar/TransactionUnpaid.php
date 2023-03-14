<?php

namespace App\Http\Livewire\Bar;

use App\Models\BarTransaction;
use App\Models\BarTransactionDetail;
use App\Models\Role;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class TransactionUnpaid extends Component
{
    use WithPagination ;
    protected $paginationTheme = 'bootstrap';
    public $transactionDetails ;
    public $idTr ,$idDeleted,$customer ;
    public $totalPay,$paid,$customerPaid ,$idPaid;
    public $from,$to,$orderBy,$asc ;
    protected $listeners = ['deleted','undeleted'];

    public function mount(){
        $this->transactionDetails = BarTransaction::with('detail')
        ->where('paid',false)
        ->first();
        $this->idTr = 0;
        $this->orderBy = 'created_at';
        $this->from = date('Y-m-d');
        $this->to = date('Y-m-d');
        $this->asc = 'desc';
        $this->totalPay = 0 ;
        $this->idPaid = 0;
        $this->customerPaid = 'tidak ada';
    }

    public function info($id){
        $this->transactionDetails = BarTransaction::withOnly('detail')
        ->where('paid',false)
        ->findOrFail($id);
        $this->idTr = $id;
    }

    public function pay($id){
        $transaction = BarTransaction::findOrFail($id);
        $this->totalPay = $transaction->total;
        $this->customerPaid = $transaction->customer;
        $this->idPaid = $transaction->id;
        
    }

    public function executePay(){
        BarTransaction::where('id',$this->idPaid)
        ->update([
            'paid' => true
        ]);
        if(isset($this->paid)){
            $cashback =  priceToInt($this->paid) - intval($this->totalPay);
            $cashback = priceFormat($cashback);
        }else {
            $cashback = "Rp.0" ;
        }
        $this->dispatchBrowserEvent('close-paid-modal');
        $this->dispatchBrowserEvent('success-paid',[
            'cashback' => $cashback
        ]);
        $this->resetPaid();
    }

    public function resetPaid(){
        $this->totalPay = 0 ;
        $this->idPaid = 0;
        $this->customerPaid = 'tidak ada';
    }

    public function delete($id){
        $this->dispatchBrowserEvent('confirm-delete',[
            'id' => $id
        ]);
        $this->idDeleted = $id;
    }

    public function deleted(){
        $id = $this->idDeleted;
        DB::transaction(function() use ($id){
            BarTransaction::where('id' ,$id)
            ->forceDelete();
            BarTransactionDetail::where('locker_transaction_id',$id)
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


    public function closeModal(){
        $this->idTr = 0;
        $this->dispatchBrowserEvent('close-modal');
    }


    public function render()
    {
        if(auth()->user()->role_id == Role::IS_BAR){
            $transactions = BarTransaction::where('paid',false);
        }else{
            $transactions = BarTransaction::with('user')->where('paid',false);
        }
        $dateTo = date('Y-m-d', strtotime( $this->to . " +1 days"));
        $transactions = $transactions
        ->whereBetween('created_at', [$this->from, $dateTo])
        ->orderBy($this->orderBy, $this->asc)
        ->paginate(10);

        $total = BarTransaction::whereBetween('created_at', [$this->from, $dateTo])
        ->where('paid',false)
        ->sum('total');
        return view('livewire.bar.transaction-unpaid',compact('transactions','total'));
    }
}
