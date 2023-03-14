<div>
    <div>
        <div class="card">
            @include('livewire.locker.locker-data-modal')
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <button data-toggle="modal" data-target="#addLocker" class="btn btn-primary rounded-pill">
                    <i class="fas fa-plus"></i>
                    Tambah Produk Locker</button>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-stripe" id="table1">
                        <thead>
                            <tr>
                                <th>Nama Produk Loker</th>
                                <th>Harga</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($lockers as $locker)
                            <tr>
                                <td>{{ $locker->name }}</td>
                                <td>{{ priceFormat($locker->price) }}</td>
                                <td>
                                    <button wire:click="editLocker({{ $locker->id }})" type="button" class="btn btn-warning block" data-toggle="modal" data-target="#updateLocker"><i class="fa fa-edit"></i>
                                    </button>
                                    <button wire:click="deleteLocker({{ $locker->id }})" type="button" class="btn btn-danger block"><i class="fa fa-trash"></i>
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
