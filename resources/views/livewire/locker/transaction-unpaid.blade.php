<div>
    {{-- MODAL --}}

    {{-- INFO MODAL --}}
    <div wire:ignore.self class="modal fade" id="info" data-keyboard="false" tabindex="-1" aria-labelledby="infoLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-primary" id="infoLabel">Detail Transaksi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @if ($transactionDetails != null)
                <div class="modal-body">
                    <table>
                        <tr>
                            <td>Transaksi ID</td>
                            <td>:</td>
                            <td>{{ $idTr }}</td>
                        </tr>
                        <tr>
                            <td>Nama Customer</td>
                            <td>:</td>
                            <td>{{ $transactionDetails->customer }}</td>
                        </tr>
                    </table>
                    {{-- <p>Transaksi ID = {{ $idTr }}</p> --}}
                    <div class="table-responsive">
                        <table class="table table-borderless mb-0">
                            <thead>
                                <tr>
                                    <th>Qty</th>
                                    <th>Produk</th>
                                    <th>Harga</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            @foreach ($transactionDetails->detail as $td)
                            <tbody>
                                <tr>
                                    <td class="text-bold-500">{{ $td->qty }}</td>
                                    <td>{{ $td->locker->name }}</td>
                                    <td>{{ priceFormat($td->price) }}</td>
                                    <td>{{ priceFormat($td->total) }}</td>
                                </tr>

                            </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <h3 class="mr-auto">{{ priceFormat($transactionDetails->total) }}</h3>
                    <button wire:click="pay({{ $transactionDetails->id }})" data-toggle="modal" data-target="#pay" class="btn btn-success" data-dismiss="modal"><i class="fas fa-hand-holding-usd"></i> Bayar</button>
                    <button type="button" class="btn btn-secondary"
                        data-dismiss="modal">Tutup</button>
                </div>
                @endif
            </div>
        </div>
    </div>


    {{-- PAY MODAL --}}
    <div wire:ignore.self class="modal fade" id="pay" data-keyboard="false" tabindex="-1"
        aria-labelledby="payLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="payLabel">Lakukan Transaksi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table>
                        <tr>
                            <td>Transaksi ID</td>
                            <td>:</td>
                            <td>{{ $idPaid }}</td>
                        </tr>
                        <tr>
                            <td>Nama Customer</td>
                            <td>:</td>
                            <td>{{ $customerPaid }}</td>
                        </tr>
                        <tr>
                            <td>Total Sewa</td>
                            <td>:</td>
                            <td class="text-primary font-weight-bold">{{ priceFormat($totalPay) }}</td>
                        </tr>
                    </table>
                    <form wire:submit.prevent="executePay">
                        @csrf
                        <div class="form-group">
                            <label for="paid">Uang Dibayarkan </label>
                            <input wire:model="paid" type="text"
                                class="form-control @error('paid') is-invalid @enderror" id="paid" />
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Lakukan Pembayaran</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    {{-- CONTENT --}}
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
                        <option value="id" selected>ID</option>
                        <option value="created_at">Tanggal</option>
                        <option value="total">Total</option>
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
                            <th>ID</th>
                            <th>Tanggal</th>
                            <th>Customer</th>
                            @can('admin')
                            <th>Kasir</th>
                            @endcan
                            <th>Total Pembelian</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($transactions) > 0)
                        @foreach ($transactions as $tr)
                        <tr>
                            <td>{{ $tr->id }}</td>
                            <td>{{ dateFormat($tr->created_at) }}</td>
                            <td>{{ $tr->customer }}</td>
                            @can('admin')
                            <td>{{ $tr->user->name }}</td>
                            @endcan
                            <td>{{ priceFormat($tr->total) }}</td>
                            <td>
                                <button wire:click="info({{ $tr->id }})" type="button" class="btn btn-info block"
                                    data-toggle="modal" data-target="#info">
                                    <i class="fas fa-info-circle"></i>
                                </button>
                                @can('locker')
                                <button wire:click="pay({{ $tr->id }})" data-toggle="modal" data-target="#pay" class="btn btn-success"><i class="fas fa-hand-holding-usd"></i></button>
                                <a href="transaction/{{ $tr->id }}/edit" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                <button wire:click="delete({{ $tr->id }})" type="button" class="btn btn-danger block">
                                    <i class="fas fa-trash"></i>
                                </button>
                                @endcan
                            </td>
                        </tr>
                        @endforeach
                        <tr>
                                @canany(['admin', 'owner'])
                                <th colspan="4" class="text-center">TOTAL</th>
                                @endcanany
                                @can('locker')
                                <th colspan="3" class="text-center">TOTAL</th>
                                @endcan
                                <th colspan="2">{{ priceFormat($total) }}</th>
                        </tr>
                        @else
                            @canany(['admin', 'owner'])
                            <th colspan="6" class="text-center">Tidak ada transaksi</th>
                            @endcanany
                            @can('locker')
                            <th colspan="5" class="text-center">Tidak ada transaksi</th>
                            @endcan
                        @endif
                    </tbody>
                </table>
            </div>
            {!! $transactions->links() !!}
        </div>
    </div>
</div>
