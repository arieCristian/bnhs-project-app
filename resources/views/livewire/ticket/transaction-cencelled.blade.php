<div>
    {{-- MODAL --}}
    <div wire:ignore.self class="modal fade text-left" id="info" tabindex="-1" role="dialog" aria-labelledby="infoLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            @if ($transactionDetails != null)
            <div class="modal-content">
                <div class="modal-header">
                        <h5 class="modal-title" id="infoLabel">Detail Transaksi</h5>
                        
                    <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Transaksi ID = {{ $idTr }}</p>
                    <div class="table-responsive">
                        <table class="table table-borderless mb-0">
                            <thead>
                                <tr>
                                    <th>Qty</th>
                                    <th>Tiket</th>
                                    <th>Harga</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            @foreach ($transactionDetails->detail as $td)
                            <tbody>
                                <tr>
                                    <td class="text-bold-500">{{ $td->qty }}</td>
                                    <td>{{ $td->ticket->name }}</td>
                                    <td>{{ priceFormat($td->price) }}</td>
                                    <td>{{ priceFormat($td->total) }}</td>
                                </tr>

                            </tbody>
                            @endforeach 
                        </table>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-between">
                    <h3>{{ priceFormat($transactionDetails->total) }}</h3>
                    <button  type="button" class="btn" data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </button>
                </div>
            </form>
        </div>
        @endif
    </div>
    </div>

    {{-- END MODAL --}}



    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <button data-bs-toggle="modal" data-bs-target="#addTicket"
                    class="btn icon icon-left btn-primary rounded-pill">
                    <i class="bi bi-plus-lg"></i>
                    Tambah Ticket</button>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-hover" id="table1">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tanggal</th>
                        <th>Oleh</th>
                        <th>Total Pembelian</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($transactions != null)
                    @foreach ($transactions as $tr)
                    <tr>
                        <td>{{ $tr->id }}</td>
                        <td>{{ $tr->created_at->format('d M Y') }}</td>
                        <td>{{ $tr->user->name }}</td>
                        <td>{{ priceFormat($tr->total) }}</td>
                        <td>
                            <button wire:click="info({{ $tr->id }})" type="button" class="btn btn-info block"
                                data-bs-toggle="modal" data-bs-target="#info"><i class="bi bi-info-lg"></i>
                            </button>
                            <button wire:click="restore({{ $tr->id }})" class="btn btn-success" type="button"><i class="bi bi-arrow-counterclockwise"></i></button>
                            <button wire:click="delete({{ $tr->id }})" class="btn btn-danger" type="button"><i class="bi bi-trash3"></i></button>
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
