<?php
require_once '../../partials/config.php';


switch ($_GET['aksi']) {
    case 'tambah-detail-purchase-order':
        $id_produk = $_POST['id_produk'];
        $jumlah = $_POST['jumlah'];
        $no_po = $_POST['no_po'];

        $sql = "INSERT INTO po_detail (id_produk, jumlah, no_po) VALUES ('$id_produk', '$jumlah', '$no_po')";
        $result = $link->query($sql);
        if ($result) {
            http_response_code(200);
            echo json_encode(['status' => 'success', 'message' => 'Data keranjang berhasil ditambahkan']);
        } else {
            http_response_code(500);
            echo json_encode(['status' => 'error', 'message' => 'Data keranjang gagal ditambahkan', 'error' => $link->error]);
        }
        break;
    case 'hapus-detail-po':
        $id = $_POST['id'];
        $sql = "DELETE FROM po_detail WHERE id_po_detail = '$id'";
        $result = $link->query($sql);
        if ($result) {
            http_response_code(200);
            echo json_encode(['status' => 'success', 'message' => 'Data keranjang berhasil dihapus']);
        } else {
            http_response_code(500);
            echo json_encode(['status' => 'error', 'message' => 'Data keranjang gagal dihapus', 'error' => $link->error]);
        }
        break;
    case 'tambah-purchase-order':
        $id_pengguna = $_POST['id_pengguna'];
        $no_po = $_POST['no_po'];
        $id_supplier = $_POST['id_supplier'];
        $tanggal = $_POST['tanggal'];
        $status = "Dipesan";
        $sql = "INSERT INTO purchase_order (id_pengguna, no_po, id_supplier, tanggal, status) VALUES ('$id_pengguna', '$no_po', '$id_supplier', '$tanggal', '$status')";
        $result = $link->query($sql);
        if ($result) {
            http_response_code(200);
            echo json_encode(['status' => 'success', 'message' => 'Data penjualan berhasil ditambahkan']);
        } else {
            http_response_code(500);
            echo json_encode(['status' => 'error', 'message' => 'Data penjualan gagal ditambahkan', 'error' => $link->error]);
        }
        break;
}