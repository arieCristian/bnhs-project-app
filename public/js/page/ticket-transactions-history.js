window.addEventListener('success-cencelled', event => {
    Swal.fire({
        icon: "success",
        title: "Berhasil Membatalkan Transaksi"
    })
})
window.addEventListener('uncencelled', event => {
    Swal.fire({
        icon: "info",
        title: "Transaksi Tidak Dibatalkan"
    })
})

window.addEventListener('close-modal', event => {
    $('#cencelled').modal('hide');
})

window.addEventListener('confirm-cencelled', event => {
    Swal.fire({
        title: 'Yakin ?',
        text: "Batalkan Transaksi [" + event.detail.id + "]",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtontext: 'Batal',
        confirmButtonText: 'Batalkan'
    }).then((result) => {
        if (result.isConfirmed) {
            Livewire.emit('cencelled')
        } else {
            Livewire.emit('uncencelled')
        }
    })
})
