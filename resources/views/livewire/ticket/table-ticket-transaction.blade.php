<div>
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <button data-bs-toggle="modal" data-bs-target="#addTicket" class="btn icon icon-left btn-primary rounded-pill">
                <i class="bi bi-plus-lg"></i>
                Tambah Ticket</button>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-hover" id="table1">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Nama Pelanggan</th>
                        <th>Total Pembelian</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transactions as $tr)
                    <tr>
                        <td>{{ $tr->created_at->format('d M Y') }}</td>
                        <td>{{ $tr->customer }}</td>
                        <td>{{ priceFormat($tr->total) }}</td>
                        <td>
                            <button wire:click="info({{ $tr->id }})" type="button" class="btn btn-info block" data-bs-toggle="modal" data-bs-target="#info"><i class="bi bi-pencil-square"></i>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
