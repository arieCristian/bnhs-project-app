<div>
    <div class="card">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-lg-3 form-group">
                    <label for="from">Tampilkan Dari :</label>
                    <input wire:model="from" name="from" id="from" type="date" class="form-control">
                </div>
                <div class="col-lg-3 form-group">
                    <label for="to">Sampai :</label>
                    <input wire:model="to" name="to" id="to" type="date" class="form-control">
                </div>
                <div class="col-lg-3 form-group">
                    <label for="orderBy">Urutkan Berdasarkan</label>
                    <select wire:model="orderBy" class="form-control" id="orderBy">
                        <option value="created_at">Tanggal</option>
                        <option value="total">Total</option>
                        <option value="ticket_id">Jenis Tiket</option>
                    </select>
                </div>
                <div class="col-lg-3 form-group">
                    <label for="asc">Urutkan Berdasarkan</label>
                    <select wire:model="asc" class="form-control" id="asc">
                        <option value="asc" selected>Terkecil</option>
                        <option value="desc">Terbesar</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Jenis Tiket</th>
                            <th>Qty</th>
                            <th>Harga</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($transactions != null)
                        @foreach ($transactions as $tr)
                        <tr>
                            <td>{{ dateFormat($tr->created_at) }}</td>
                            <td>{{ $tr->ticket->name }}</td>
                            <td>{{ $tr->qty }}</td>
                            <td>{{ priceFormat($tr->price) }}</td>
                            <td>{{ priceFormat($tr->total) }}</td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
            {!! $transactions->links() !!}
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-lg-8">
            <div class="card">
                <div class="table-responsive">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>Jenis Tiket</th>
                                <th>Total Qty</th>
                                <th>Total Penjualan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($transactionsSum != null)
                            @foreach ($transactionsSum as $sum)
                            <tr>
                                <td>{{ $sum->ticket_name }}</td>
                                <td>{{ $sum->total_qty }}</td>
                                <td>{{ priceFormat($sum->total_price) }}</td>
                            </tr>
                            @endforeach
                            <tr>
                                <th>TOTAL</th>
                                <th>{{ $totalQty }}</th>
                                <th>{{ priceFormat($totalPrice) }}</th>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
