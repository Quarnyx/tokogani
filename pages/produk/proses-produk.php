<?php
require_once '../../partials/config.php';
switch ($_GET['aksi'] ?? '') {
    case 'tambah-produk':
        $kode_produk = $_POST['kode_produk'];
        $nama_produk = $_POST['nama_produk'];
        $satuan = $_POST['satuan'];
        $harga_beli = $_POST['harga_beli'];
        $harga_beli = preg_replace('/[^0-9]/', '', $_POST['harga_beli']);
        $harga_jual = $_POST['harga_jual'];
        $harga_jual = preg_replace('/[^0-9]/', '', $_POST['harga_jual']);
        $buffer_stock = $_POST['buffer_stock'];
        $minimum_stock = $_POST['minimum_stock'];

        $sql = "INSERT INTO produk (kode_produk, nama_produk, satuan, harga_beli, harga_jual, buffer_stock, minimum_stock) 
                VALUES ('$kode_produk', '$nama_produk', '$satuan', '$harga_beli', '$harga_jual', '$buffer_stock', '$minimum_stock')";
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

    case 'edit-produk':
        $id = $_POST['id'];
        $kode_produk = $_POST['kode_produk'];
        $nama_produk = $_POST['nama_produk'];
        $satuan = $_POST['satuan'];
        $harga_beli = $_POST['harga_beli'];
        $harga_beli = preg_replace('/[^0-9]/', '', $_POST['harga_beli']);
        $harga_jual = $_POST['harga_jual'];
        $harga_jual = preg_replace('/[^0-9]/', '', $_POST['harga_jual']);
        $buffer_stock = $_POST['buffer_stock'];
        $minimum_stock = $_POST['minimum_stock'];

        $sql = "UPDATE produk SET 
                kode_produk = '$kode_produk',
                nama_produk = '$nama_produk',
                satuan = '$satuan',
                harga_beli = '$harga_beli',
                harga_jual = '$harga_jual',
                buffer_stock = '$buffer_stock',
                minimum_stock = '$minimum_stock'
                WHERE id_produk = '$id'";

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

    case 'hapus-produk':
        $id = $_POST['id'];
        $sql = "DELETE FROM produk WHERE id_produk = '$id'";
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