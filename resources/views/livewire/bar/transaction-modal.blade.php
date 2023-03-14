{{-- MODAL --}}
<div wire:ignore.self class="modal fade" id="addProduct" data-keyboard="false" tabindex="-1"
    aria-labelledby="addProductLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-primary" id="addProductLabel">Tambah Transaksi Produk</h5>
                <button wire:click="resetAdd" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="search-product">
                    <input type="text" class="form-control" placeholder="Cari nama produk..." wire:model="query"/>
                    @if(!empty($query))
                        <ul class="list-gorup p-0 mt-2">
                            @if(!empty($menuBar))
                            @foreach($menuBar as $i => $menu)
                            <li class="list-group-item p-1">
                                <button wire:click="addOrder({{ $i }})" style="width: 100%" class="btn btn-link text-left text-decoration-none text-primary">{{ $menu['name'] }}</button>
                            </li>
                            @endforeach
                            @else
                            <li class="list-group-item">Produk tidak ditemukan !</li>
                            @endif
                        </ul>
                    @endif
                </div>

            </div>
            <div class="modal-footer d-flex justify-content-end">
                    <button wire:click="resetAdd" type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
            </div>
            {{-- </form> --}}
            </div>
            </div>
            </div>
