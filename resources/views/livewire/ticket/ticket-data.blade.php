<div>
    <div class="card">
        @include('livewire.ticket.ticket-data-modal')
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <button data-toggle="modal" data-target="#addTicket" class="btn btn-primary rounded-pill">
                <i class="fas fa-plus" style="color: #FFF"></i>
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
                            <button wire:click="editTicket({{ $ticket->id }})" type="button" class="btn btn-warning block" data-toggle="modal" data-target="#updateTicket"><i class="fa fa-edit"></i>
                            </button>
                            <button wire:click="deleteTicket({{ $ticket->id }})" type="button" class="btn btn-danger block"><i class="fa fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
