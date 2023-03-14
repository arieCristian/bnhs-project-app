<div>
    @include('livewire.bar.transaction-modal')
    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Buat Transaksi</h6>
                </div>
                <div class="card-body">
                    <form wire:submit.prevent="addTransaction">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nama Pelanggan</label>
                            <input wire:model="name" type="text"
                                class="form-control @error('name') is-invalid @enderror" id="name"
                                placeholder="Masukan nama pelanggan" autofocus />
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        @if(count($transactions) > 0)
                        {{-- <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputCity">Nama Menu</label>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputState">Harga</label>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputZip">Qty</label>
                            </div>
                        </div>
                        @foreach ($transactions as $index => $tr)
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputCity">{{ $tr['name'] }}</label>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputState">{{ priceFormat($tr['price']) }}</label>
                            </div>
                            <div class="form-group col-md-2">
                                <input wire:model="transactions.{{$index}}.qty" min="0" class="form-control"
                                    type="number">
                            </div>
                        </div>
                        @endforeach --}}
                        <div class="table-responsive">
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th width="50%">Nama Produk</th>
                                        <th width="20%">Harga</th>
                                        <th width="20%">Qty</th>
                                        <th width="10%"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($transactions as $index => $tr)
                                    <tr>
                                        <td>{{ $transactions[$index]['name'] }}</td>
                                        <td>{{ $transactions[$index]['price'] }}</td>
                                        <td><input wire:model="transactions.{{$index}}.qty" min="0" class="form-control"
                                            type="number"></td>
                                            <td>
                                                <button wire:click.prevent="deleteOrder({{ $index }})" class="btn btn-danger">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @else
                        <p>Belum ada tranasksi</p>
                        @endif
                        <div class="d-flex justify-content-between">
                            <h3>{{ priceFormat($total) }}</h3>
                            <div class="tombol">
                                <button type="button" class="btn btn-info block" data-toggle="modal"
                                    data-target="#addProduct">
                                    + Produk
                                </button>
                                <button type="submit" class="btn btn-primary">Buat
                                    Transaksi</button>

                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>

</div>
