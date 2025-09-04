<?php
require_once '../../partials/config.php';
switch ($_GET['aksi'] ?? '') {
    case 'tambah-pengeluaran-barang':
        // Accept arrays for bulk insert
        $id_produk_arr = $_POST['id_produk'] ?? [];
        $jumlah_arr = $_POST['jumlah'] ?? [];
        $tanggal = $_POST['tanggal'] ?? null;
        $tujuan = $_POST['tujuan'] ?? null;
        $id_pengguna = $_POST['id_pengguna'] ?? null;
        $harga_jual_arr = $_POST['harga_jual'] ?? [];

        // Basic validation
        if (empty($id_produk_arr) || !is_array($id_produk_arr)) {
            echo 'error: no items';
            http_response_code(400);
            exit;
        }

        // Begin transaction
        $link->begin_transaction();
        $stmt = $link->prepare("INSERT INTO barang_keluar (id_produk, jumlah, tanggal, tujuan, id_pengguna, harga_jual) VALUES (?, ?, ?, ?, ?, ?)");
        if (!$stmt) {
            echo 'error: prepare failed';
            http_response_code(500);
            exit;
        }

        $all_ok = true;
        for ($i = 0; $i < count($id_produk_arr); $i++) {
            $id_produk = $id_produk_arr[$i];
            $jumlah = $jumlah_arr[$i] ?? 0;
            $harga_jual = $harga_jual_arr[$i] ?? null;

            // skip empty rows
            if (empty($id_produk) || empty($jumlah) || $jumlah <= 0) {
                continue;
            }

            $stmt->bind_param('iissid', $id_produk, $jumlah, $tanggal, $tujuan, $id_pengguna, $harga_jual);
            if (!$stmt->execute()) {
                $all_ok = false;
                break;
            }
        }

        if ($all_ok) {
            $link->commit();
            echo 'ok';
            http_response_code(200);
        } else {
            $link->rollback();
            echo 'error: ' . $stmt->error;
            http_response_code(400);
        }
        $stmt->close();
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
        $sql = "UPDATE barang_keluar SET 
                id_produk = '$id_produk',
                jumlah = '$jumlah',
                tanggal = '$tanggal',
                id_pengguna = '$id_pengguna',
                tujuan = '$tujuan'
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