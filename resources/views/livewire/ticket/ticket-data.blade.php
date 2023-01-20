<div>
    <div class="card">
        @include('livewire.ticket.ticket-data-modal')
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
                        <th>Nama Tiket</th>
                        <th>Harga</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tickets as $ticket)
                    <tr>
                        <td>{{ $ticket->name }}</td>
                        <td>{{ priceFormat($ticket->price) }}</td>
                        <td>
                            <button wire:click="editTicket({{ $ticket->id }})" type="button" class="btn btn-warning block" data-bs-toggle="modal" data-bs-target="#updateTicket"><i class="bi bi-pencil-square"></i>
                            </button>
                            <button wire:click="deleteTicket({{ $ticket->id }})" type="button" class="btn btn-danger block"><i class="bi bi-trash3"></i>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>