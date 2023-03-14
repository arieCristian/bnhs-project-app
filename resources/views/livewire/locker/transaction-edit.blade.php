<div>
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h5>Edit Transaksi</h5>
                </div>
                <div class="card-body">
                    <p> Transaction ID = {{ $transaction->id }}</p>
                    <form wire:submit.prevent="editTransaction">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nama Pelanggan</label>
                            <input wire:model="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Masukan nama pelanggan" autofocus/>
                            @error('name')
                            <div class="invalid-feedback">
                            {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-8">
                                <label for="">Nama Produk</label>
                            </div>
                            <div class="col-4">
                                <label for="">Jumlah</label>
                            </div>
                        </div>
                        @foreach ($transactions as $index => $tr)
                        <input type="hidden" wire:model="transactions.{{ $index }}.id" value="{{ $tr['id'] }}">
                        <input type="hidden" wire:model="transactions.{{ $index }}.price" value="{{ $tr['price'] }}">
                        <div class="row">
                            <div class="col-8">
                                <div class="form-group">
                                    <input  class="form-control" type="text" value="{{ $tr['locker_name'] }}" readonly>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <input wire:model="transactions.{{$index}}.qty" min="0" class="form-control" type="number" value="0">
                                </div>
                            </div>
                        </div>
                        @endforeach
                    
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h3 wire:model="total">{{ priceFormat($total) }}</h3>
                        </div>
                        <div>
                            <a href="{{ url('locker/transaction') }}" class="btn btn-outline-primary">Batal</a>
                            <button class="btn btn-primary">Simpan Transaksi</button>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
