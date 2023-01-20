$("#price").keyup(function(){
    let val = $("#price").val();
    $("#price").val(formatRupiah(val,"Rp."));
});
$("#price-update").keyup(function(){
    let val = $("#price-update").val();
    $("#price-update").val(formatRupiah(val,"Rp."));
});
window.addEventListener('close-modal', event => {
    $('#addTicket').modal('hide');
})
window.addEventListener('close-update-modal', event => {
    $('#updateTicket').modal('hide');
})
window.addEventListener('success-added', event => {
    Swal.fire({
        icon: "success",
        title: "Berhasil Menambahkan Daftar Tiket Baru",
    })
})
window.addEventListener('success-updated', event => {
    Swal.fire({
        icon: "success",
        title: "Berhasil Memperbarui Daftar Tiket",
    })
})
window.addEventListener('deleted-confirm', event => {
    Swal.fire({
        title: 'Yakin ?',
        text: "Hapus " + event.detail.name,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtontext: 'Batal',
        confirmButtonText: 'Hapus'
    }).then((result) => {
        if (result.isConfirmed) {
            Livewire.emit('destroyTicket')
        } else {
            Livewire.emit('cencelDelete')
        }
    })
})
window.addEventListener('deleted-success', event => {
    Swal.fire({
        icon: "success",
        title: "Berhasil Menghapus Tiket",
    })
})
