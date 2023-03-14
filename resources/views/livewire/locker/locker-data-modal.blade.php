<!-- Add Modal -->
    <div wire:ignore.self class="modal fade" id="addLocker" data-keyboard="false" tabindex="-1"
        aria-labelledby="addLockerLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-primary" id="addLockerLabel">Tambah Data Produk Loker</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="addLocker">
                        <div class="form-group">
                            <label for="name">Nama Produk Loker</label>
                            <input wire:model="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Masukan nama produk" autofocus/>
                            @error('name')
                            <div class="invalid-feedback">
                            {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="price">Harga Produk</label>
                            <input wire:model="price" type="text" class="form-control @error('price') is-invalid @enderror" id="price" placeholder="Masukan Harga produk"/>
                            @error('price')
                            <div class="invalid-feedback">
                            {{ $message }}
                            </div>
                            @enderror
                        </div>
                </div>
                <div class="modal-footer">
                    <button wire:click="closeModal" type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Buat Produk</button>
                </div>
            </form>
            </div>
        </div>
    </div>



<!-- EDIT MODAL -->
<div wire:ignore.self class="modal fade" id="updateLocker" data-keyboard="false" tabindex="-1"
aria-labelledby="updateLockerLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title text-primary" id="updateLockerLabel">Edit Data Produk Loker</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form wire:submit.prevent="updateLocker">
                <div class="form-group">
                    <label for="name">Nama Produk</label>
                    <input wire:model="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Masukan nama produk" autofocus/>
                    @error('name')
                    <div class="invalid-feedback">
                    {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="price">Harga Produk</label>
                    <input wire:model="price" type="text" class="form-control @error('price') is-invalid @enderror" id="price-update" placeholder="Masukan harga produk"/>
                    @error('price')
                    <div class="invalid-feedback">
                    {{ $message }}
                    </div>
                    @enderror
                </div>
        </div>
        <div class="modal-footer">
            <button wire:click="closeModal" type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Perbarui Produk</button>
        </div>
        </form>
    </div>
</div>
</div>
