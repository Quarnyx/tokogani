<?php
require_once '../../partials/config.php';
switch ($_GET['aksi'] ?? '') {
    case 'tambah-pengeluaran-barang':
        $id_produk = $_POST['id_produk'];
        $jumlah = $_POST['jumlah'];
        $tanggal = $_POST['tanggal'];
        $tujuan = $_POST['tujuan'];
        $keterangan = $_POST['keterangan'];
        $id_pengguna = $_POST['id_pengguna'];


        $sql = "INSERT INTO barang_keluar (id_produk, jumlah, tanggal, tujuan, keterangan, id_pengguna) 
        VALUES ('$id_produk', '$jumlah', '$tanggal', '$tujuan', '$keterangan', '$id_pengguna')";
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
    case 'hapus-pengeluaran-barang':
        $id = $_POST['id'];
        $sql = "DELETE FROM barang_keluar WHERE id_barang_keluar = '$id'";
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
    case 'update-pengeluaran-barang':
        $id = $_POST['id'];
        $id_produk = $_POST['id_produk'];
        $jumlah = $_POST['jumlah'];
        $tanggal = $_POST['tanggal'];
        $id_pengguna = $_POST['id_pengguna'];
        $tujuan = $_POST['tujuan'];
        $keterangan = $_POST['keterangan'];
        $sql = "UPDATE barang_keluar SET 
                id_produk = '$id_produk',
                jumlah = '$jumlah',
                tanggal = '$tanggal',
                id_pengguna = '$id_pengguna',
                tujuan = '$tujuan',
                keterangan = '$keterangan'
                WHERE id_barang_keluar = '$id'";
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