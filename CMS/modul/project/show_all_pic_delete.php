<?php
//include file config.php
include('../../assets/relasi/koneksi.php');
//jika benar mendapatkan GET id dari URL
if (isset($_GET['id'])) {
        //membuat variabel $id yang menyimpan nilai dari $_GET['id']
        $id = $_GET['id'];
    
        //melakukan query ke database, dengan cara SELECT data yang memiliki id yang sama dengan variabel $id
        $cek = mysqli_query($konek, "SELECT * FROM foto_project WHERE id_foto_project='$id'") or die(mysqli_error($konek));
        $data = mysqli_fetch_assoc($cek);
        //jika query menghasilkan nilai > 0 maka eksekusi script di bawah
        if (mysqli_num_rows($cek) > 0) {
            //query ke database DELETE untuk menghapus data dengan kondisi id=$id
            $del = mysqli_query($konek, "DELETE FROM foto_project WHERE id_foto_project='$id'") or die(mysqli_error($konek));
            if ($del) {
                $delPath = $path_project . $data['foto'];
                unlink($delPath);
                echo 
                '<script>alert("Berhasil menghapus data.");
                document.location = "../../index.php?page=show_all_pic&id=' . $data['id_project'] .'";
                </script>';
            } else {
                echo '<script>alert("Gagal menghapus data.");</script>';
            }
        } else {
            echo '<script>alert("ID tidak ditemukan di database.");</script>';
        }
    } else {
        echo '<script>alert("ID tidak ditemukan di database.");</script>';
    }