$("#paid").keyup(function(){
    let val = $("#paid").val();
    $("#paid").val(formatRupiah(val,"Rp."));
});

window.addEventListener('close-modal', event => {
    $('#addTransaction').modal('hide');
})


window.addEventListener('null', event => {
    Swal.fire({
        icon: "info",
        title: "Jumlah Tiket Yang Dipilih Masih Kosong",
    })
})
window.addEventListener('success-add', event => {
    Swal.fire({
        icon: "success",
        title: "Berhasil Melakukan Transaksi",
        text: "Total Kembalian " + event.detail.cashback,
    })
})


window.addEventListener('success-edited', event => {
    Swal.fire({
        icon: "success",
        title: "Berhasil Memperbarui Transaksi"
    })
})


