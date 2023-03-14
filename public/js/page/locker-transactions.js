
window.addEventListener('null', event => {
    Swal.fire({
        icon: "info",
        title: "Jumlah Produk Yang Dipilih Masih Kosong",
    })
})
window.addEventListener('success-add', event => {
    Swal.fire({
        icon: "success",
        title: "Berhasil Melakukan Transaksi",
        text: "Total Pembelian " + event.detail.total,
    })
})

window.addEventListener('success-edited', event => {
    Swal.fire({
        icon: "success",
        title: "Berhasil Memperbarui Transaksi"
    }).then((result) => {
        if (result.value) {
            Livewire.emit('back')
        }
      });
})


