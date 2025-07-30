<?php
require_once '../../partials/config.php';
switch ($_GET['aksi'] ?? '') {
    case 'tambah-pengembalian-barang':
        $id_produk_arr = $_POST['id_produk'];
        $jumlah_arr = $_POST['jumlah'];
        $id_supplier_arr = $_POST['id_supplier'];
        $tanggal = $_POST['tanggal'];
        $keterangan = $_POST['keterangan'];
        $id_pengguna = $_POST['id_pengguna'];
        $no_po = $_POST['no_po'];

        $success = true;
        // Insert each row
        for ($i = 0; $i < count($id_produk_arr); $i++) {
            $id_produk = $link->real_escape_string($id_produk_arr[$i]);
            $jumlah = $link->real_escape_string($jumlah_arr[$i]);
            $id_supplier = $link->real_escape_string($id_supplier_arr[$i]);
            $sql = "INSERT INTO barang_kembali (id_produk, jumlah, tanggal, id_supplier, keterangan, id_pengguna, no_po) 
                VALUES ('$id_produk', '$jumlah', '$tanggal', '$id_supplier', '$keterangan', '$id_pengguna', '$no_po')";
            $result = $link->query($sql);
            if (!$result) {
                $success = false;
                break;
            }
        }
        if ($success) {
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