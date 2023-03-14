<div>
    <div>
        <div class="card">
            @include('livewire.bar.bar-data-modal')
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <button data-toggle="modal" data-target="#addBar" class="btn btn-primary rounded-pill">
                    <i class="fas fa-plus"></i>
                    Tambah Produk Bar</button>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-stripe" id="table1">
                        <thead>
                            <tr>
                                <th>Nama Produk Bar</th>
                                <th>Harga</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bars as $bar)
                            <tr>
                                <td>{{ $bar->name }}</td>
                                <td>{{ priceFormat($bar->price) }}</td>
                                <td>
                                    <button wire:click="editBar({{ $bar->id }})" type="button" class="btn btn-warning block" data-toggle="modal" data-target="#updateBar"><i class="fa fa-edit"></i>
                                    </button>
                                    <button wire:click="deleteBar({{ $bar->id }})" type="button" class="btn btn-danger block"><i class="fa fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
</div>
