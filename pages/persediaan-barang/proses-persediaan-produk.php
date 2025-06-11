<?php
require_once '../../partials/config.php';
switch ($_GET['aksi'] ?? '') {
    case 'tambah-persediaan-produk':
        $id_produk = $_POST['id'];
        $id_pengguna = $_POST['id_pengguna'];
        $jumlah_diminta = $_POST['jumlah_diminta'];
        $tanggal = $_POST['tanggal'];
        $status = "Prses";

        $sql = "INSERT INTO permintaan_barang (id_produk, id_pengguna, jumlah_diminta, tanggal) VALUES ('$id_produk', '$id_pengguna', '$jumlah_diminta', '$tanggal')";
        $result = $link->query($sql);
        if ($result) {
            echo 'ok';
            http_response_code(200);
        } else {
            echo 'error';
            echo $link->error;
            http_response_code(400);
        }
        break;


    case 'hapus-persediaan-produk':
        $id = $_POST['id'];
        $sql = "DELETE FROM permintaan_barang WHERE id_permintaan_barang = '$id'";
        $result = $link->query($sql);
        if ($result) {
            echo 'ok';
            http_response_code(200);
        } else {
            echo 'error';
            echo $link->error;
            http_response_code(400);
        }
        break;
}