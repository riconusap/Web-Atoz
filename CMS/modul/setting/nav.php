<?php
if (in_array($fileActualExtToko, $allowedExt)) {

    $delPathLogo = $newpath . $oldFileLogo;
    $delPathToko = $newpath . $oldFileToko;

    unlink($delPathLogo);
    unlink($delPathToko);

    if ($fileErrorlogo === 0) {
        if ($fileSize < 10485760) {
            $fileNameNew = uniqid('', true) . "." . $fileActualExt;
            $fileDestination = '../assets/img/' . $fileNameNew;
            move_uploaded_file($fileTmp, $fileDestination);
            mysqli_query($conect, "UPDATE produk SET gambar_produk='$fileNameNew', nama_produk='$nama_produk', harga='$harga', keterangan_produk='$keterangan', spesifikasi='$spek' WHERE id_produk='$id_produk'") or die(mysqli_error($conect));
            echo '<script>
                alert("Berhasil menambahkan data.");
                document.location = "index.php?page=tampil_produk";
                </script>';
        } else {
            echo '<script>
            alert("Ukuran File terlalu Besar.");
            document.location = "index.php?page=tampil_produk";
        </script>';
        }
    } else {
        echo '<script>
        alert("Terjadi Kesalahan Saat Upload Gambar, Silahkan Periksa Kembali.");
        document.location = "index.php?page=tampil_produk";
    </script>';
    }
} else {
    echo '<script>
    alert("Ekstensi Gambar Tidak Di Izinkan.");
</script>';
}
