<!-- Add Modal -->
<div wire:ignore.self class="modal fade text-left" id="addTicket" tabindex="-1" role="dialog" aria-labelledby="addTicketLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addTicketLabel">Add Ticket</h5>
                <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="addTicket">
                    <div class="form-group">
                        <label for="name">Nama Tiket</label>
                        <input wire:model="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Enter ticket name" autofocus/>
                        @error('name')
                        <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="price">Harga Tiket</label>
                        <input wire:model="price" type="text" class="form-control @error('price') is-invalid @enderror" id="price" placeholder="Enter ticket price"/>
                        @error('price')
                        <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                        @enderror
                    </div>
            </div>
            <div class="modal-footer">
                <button wire:click="closeModal" type="button" class="btn" data-bs-dismiss="modal">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Close</span>
                </button>
                <button type="submit" class="btn btn-primary ml-1">
                    <i class="bx bx-check d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Tambah Tiket</span>
                </button>
            </div>
        </form>
        </div>
    </div>
</div>



<!-- EDIT MODAL -->
<div wire:ignore.self class="modal fade text-left" id="updateTicket" tabindex="-1" role="dialog" aria-labelledby="updateTicketLebel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateTicketLebel">Edit Ticket</h5>
                <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="updateTicket">
                    <div class="form-group">
                        <label for="name">Ticket Name</label>
                        <input wire:model="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Enter ticket name" autofocus/>
                        @error('name')
                        <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="price">Harga Tiket</label>
                        <input wire:model="price" type="text" class="form-control @error('price') is-invalid @enderror" id="price-update" placeholder="Enter ticket price"/>
                        @error('price')
                        <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                        @enderror
                    </div>
            </div>
            <div class="modal-footer">
                <button wire:click="closeModal" type="button" class="btn" data-bs-dismiss="modal">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Close</span>
                </button>
                <button type="submit" class="btn btn-primary ml-1">
                    <i class="bx bx-check d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Update</span>
                </button>
            </div>
            </form>
        </div>
    </div>
</div>
