<?php
include "../../partials/config.php";

$aksi = $_GET['aksi'];

switch ($aksi) {
    case 'tambah-supplier':
        $nama_supplier = $_POST['nama_supplier'];
        $alamat = $_POST['alamat'];
        $kontak = $_POST['kontak'];
        $lama_pengantaran_maksimal = $_POST['lama_pengantaran_maksimal'];
        $avg_lama_pengantaran = $_POST['avg_lama_pengantaran'];

        $sql = "INSERT INTO supplier (nama_supplier, alamat, kontak, lama_pengantaran_maksimal, avg_lama_pengantaran) VALUES ('$nama_supplier', '$alamat', '$kontak', '$lama_pengantaran_maksimal', '$avg_lama_pengantaran')";
        if ($link->query($sql)) {
            echo "ok";
        } else {
            echo "error";
        }
        break;

    case 'edit-supplier':
        $id = $_POST['id'];
        $nama_supplier = $_POST['nama_supplier'];
        $alamat = $_POST['alamat'];
        $kontak = $_POST['kontak'];
        $lama_pengantaran_maksimal = $_POST['lama_pengantaran_maksimal'];
        $avg_lama_pengantaran = $_POST['avg_lama_pengantaran'];

        $sql = "UPDATE supplier SET nama_supplier = '$nama_supplier', alamat = '$alamat', kontak = '$kontak', lama_pengantaran_maksimal = '$lama_pengantaran_maksimal', avg_lama_pengantaran = '$avg_lama_pengantaran' WHERE id_supplier = '$id'";
        if ($link->query($sql)) {
            echo "ok";
        } else {
            echo "error";
        }
        break;

    case 'hapus-supplier':
        $id = $_POST['id'];

        $sql = "DELETE FROM supplier WHERE id_supplier = '$id'";
        if ($link->query($sql)) {
            echo "ok";
        } else {
            echo "error";
        }
        break;

    default:
        echo "error";
        break;
}
?>