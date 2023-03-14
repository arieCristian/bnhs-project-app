$("#paid").keyup(function(){
    let val = $("#paid").val();
    $("#paid").val(formatRupiah(val,"Rp."));
});

window.addEventListener('success-paid', event => {
    Swal.fire({
        icon: "success",
        title: "Berhasil Melakukan Pembayran",
        text: "Total Kembalian " + event.detail.cashback,
    })
})

window.addEventListener('close-paid-modal', event => {
    $('#pay').modal('hide');
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


window.addEventListener('success-deleted', event => {
    Swal.fire({
        icon: "success",
        title: "Berhasil Menghapus Transaksi"
    })
})
window.addEventListener('undeleted', event => {
    Swal.fire({
        icon: "info",
        title: "Transaksi Batal Dihapus"
    })
})