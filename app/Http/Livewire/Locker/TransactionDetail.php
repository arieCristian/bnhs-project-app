<?php

namespace App\Http\Livewire\Locker;

use App\Models\LockerTransactionDetail;
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
        $transactions = LockerTransactionDetail::whereRelation('transaction','paid',true)
        ->with('locker')
        ->whereBetween('created_at', [$this->from, $dateTo])
        ->orderBy($this->orderBy, $this->asc)
        ->paginate(10);

        $totalPrice = LockerTransactionDetail::whereRelation('transaction','paid',true)
        ->whereBetween('created_at', [$this->from, $dateTo])
        ->sum('total');

        $totalQty = LockerTransactionDetail::whereRelation('transaction','paid',true)
        ->whereBetween('created_at', [$this->from, $dateTo])
        ->sum('qty');

        $transactionsSum = LockerTransactionDetail::whereRelation('transaction','paid',true)
        ->select('lockers.name as locker_name', DB::raw('sum(total) as total_price'),DB::raw('sum(qty) as total_qty'))
        ->join('lockers', 'locker_transaction_details.locker_id', '=', 'lockers.id')
        ->groupBy('lockers.name')
        ->whereBetween('locker_transaction_details.created_at', [$this->from, $dateTo])
        ->get();
        return view('livewire.locker.transaction-detail',compact('transactions','transactionsSum','totalPrice','totalQty'));
    }
}
