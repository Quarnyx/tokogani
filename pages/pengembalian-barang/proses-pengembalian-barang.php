<?php
require_once '../../partials/config.php';
switch ($_GET['aksi'] ?? '') {
    case 'tambah-pengembalian-barang':
        $id_produk = $_POST['id_produk'];
        $jumlah = $_POST['jumlah'];
        $tanggal = $_POST['tanggal'];
        $id_supplier = $_POST['id_supplier'];
        $keterangan = $_POST['keterangan'];
        $id_pengguna = $_POST['id_pengguna'];


        $sql = "INSERT INTO barang_kembali (id_produk, jumlah, tanggal, id_supplier, keterangan, id_pengguna) 
        VALUES ('$id_produk', '$jumlah', '$tanggal', '$id_supplier', '$keterangan', '$id_pengguna')";
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
    case 'hapus-pengembalian-barang':
        $id = $_POST['id'];
        $sql = "DELETE FROM barang_kembali WHERE id_barang_kembali = '$id'";
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
    case 'update-pengembalian-barang':
        $id = $_POST['id'];
        $id_produk = $_POST['id_produk'];
        $jumlah = $_POST['jumlah'];
        $tanggal = $_POST['tanggal'];
        $id_pengguna = $_POST['id_pengguna'];
        $id_supplier = $_POST['id_supplier'];
        $keterangan = $_POST['keterangan'];
        $sql = "UPDATE barang_kembali SET 
                id_produk = '$id_produk',
                jumlah = '$jumlah',
                tanggal = '$tanggal',
                id_pengguna = '$id_pengguna',
                id_supplier = '$id_supplier',
                keterangan = '$keterangan'
                WHERE id_barang_kembali = '$id'";
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