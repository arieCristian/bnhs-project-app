window.addEventListener('success-deleted', event => {
    Swal.fire({
        icon: "success",
        title: "Berhasil Menghapus Transaksi Yang Dibatalkan"
    })
})
window.addEventListener('undeleted', event => {
    Swal.fire({
        icon: "info",
        title: "Transaksi Batal Dihapus"
    })
})
window.addEventListener('confirm-delete', event => {
    Swal.fire({
        title: 'Yakin ?',
        text: "Hapus Transaksi [" + event.detail.id + "]",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtontext: 'Batal',
        confirmButtonText: 'Hapus'
    }).then((result) => {
        if (result.isConfirmed) {
            Livewire.emit('deleted')
        } else {
            Livewire.emit('undeleted')
        }
    })
})



/* RESTORED */
window.addEventListener('success-restored', event => {
    Swal.fire({
        icon: "success",
        title: "Berhasil Mengembalikan Transaksi Yang Telah Dihapus"
    })
})
window.addEventListener('unrestored', event => {
    Swal.fire({
        icon: "info",
        title: "Transaksi Batal Dikembalikan"
    })
})
window.addEventListener('confirm-restore', event => {
    Swal.fire({
        title: 'Yakin ?',
        text: "Kembalikan Transaksi [" + event.detail.id + "] Yang Telah Dihapus",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtontext: 'Batal',
        confirmButtonText: 'Kembalikan'
    }).then((result) => {
        if (result.isConfirmed) {
            Livewire.emit('restored')
        } else {
            Livewire.emit('unrestored')
        }
    })
})