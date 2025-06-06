<?php
require_once '../../partials/config.php';
switch ($_GET['aksi'] ?? '') {
    case 'tambah-penerimaan-barang':
        $id_produk = $_POST['id_produk'];
        $jumlah = $_POST['jumlah'];
        $tanggal = $_POST['tanggal'];
        $no_surat_jalan = $_POST['no_surat_jalan'];
        $id_supplier = $_POST['id_supplier'];
        $id_pengguna = $_POST['id_pengguna'];


        $sql = "INSERT INTO barang_masuk (id_produk, jumlah, tanggal, no_surat_jalan, id_supplier, id_pengguna) 
        VALUES ('$id_produk', '$jumlah', '$tanggal', '$no_surat_jalan', '$id_supplier', '$id_pengguna')";
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
    case 'hapus-penerimaan-barang':
        $id = $_POST['id'];
        $sql = "DELETE FROM barang_masuk WHERE id_barang_masuk = '$id'";
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
    case 'update-penerimaan-barang':
        $id = $_POST['id'];
        $id_produk = $_POST['id_produk'];
        $jumlah = $_POST['jumlah'];
        $tanggal = $_POST['tanggal'];
        $id_supplier = $_POST['id_supplier'];
        $id_pengguna = $_POST['id_pengguna'];
        $no_surat_jalan = $_POST['no_surat_jalan'];
        $sql = "UPDATE barang_masuk SET 
                id_produk = '$id_produk',
                jumlah = '$jumlah',
                tanggal = '$tanggal',
                id_supplier = '$id_supplier',
                id_pengguna = '$id_pengguna',
                no_surat_jalan = '$no_surat_jalan'
                WHERE id_barang_masuk = '$id'";
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