<div>
    {{-- <div wire:ignore.self class="modal fade text-left" id="addTransaction" tabindex="-1" role="dialog"
        aria-labelledby="addTransactionLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addTransactionLabel">Lakukan Transaksi</h5>
                    <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    
                </div>
                <div class="modal-footer">
                    <button wire:click="closeModal" type="button" class="btn" data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Batal</span>
                    </button>
                    <button type="submit" class="btn btn-primary ml-1">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Lakukan Transaksi</span>
                    </button>
                </div>
                
            </div>
        </div>
    </div> --}}

    {{-- MODAL --}}
    <div wire:ignore.self class="modal fade" id="addTransaction" data-keyboard="false" tabindex="-1"
        aria-labelledby="addTransactionLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addTransactionLabel">Lakukan Transaksi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5>{{ priceFormat($total) }}</h5>
                    <form wire:submit.prevent="executeTransaction">
                        <div class="form-group">
                            <label for="paid">Uang Dibayarkan </label>
                            <input wire:model="paid" type="text"
                                class="form-control @error('paid') is-invalid @enderror" id="paid" />
                        </div>
                </div>
                <div class="modal-footer">
                    <button wire:click="closeModal" type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Buat Transaksi</button>
                    </form>
                </div>
            </div>
        </div>
    </div>





    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Buat Transaksi</h6>
                </div>
                <div class="card-body">
                    <form wire:submit.prevent="addTransaction">
                        {{-- <div class="form-group">
                            <label for="customer">Nama Tamu</label>
                            <input wire:model="customer" type="text" class="form-control">
                        </div> --}}
                        <div class="row">
                            <div class="col-8">
                                <label for="">Jenis Tiket</label>
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
                                    <input class="form-control" type="text" value="{{ $tr['ticket_name'] }}" readonly>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <input wire:model="transactions.{{$index}}.qty" min="0" class="form-control"
                                        type="number" value="0">
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <div class="d-flex justify-content-between">
                            <h3>{{ priceFormat($total) }}</h3>
                            <button data-toggle="modal" data-target="#addTransaction" class="btn btn-primary">Buat
                                Transaksi</button>
                        </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h5>Buat Transaksi</h5>
                </div>
                <div class="card-body">
                    
                    
                </div>
                <div class="card-footer">
                    
                </div>
                </form>
            </div>
        </div>
    </div> --}}
</div>
