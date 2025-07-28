<?php
require_once '../../partials/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $no_po = $_POST['no_po'];
    $id_produk = $_POST['idproduk'];
    $jumlah_diterima = $_POST['jumlah_diterima'];
    $tanggal_penerimaan = $_POST['tanggal_penerimaan'];
    $no_surat_jalan = $_POST['no_surat_jalan'];
    $id_supplier = $_POST['id_supplier'];
    $id_pengguna = $_POST['id_pengguna'];

    for ($i = 0; $i < count($id_produk); $i++) {
        $sql = "INSERT INTO barang_masuk (no_po, id_produk, jumlah, tanggal, no_surat_jalan, id_supplier, id_pengguna) VALUES ('$no_po', '$id_produk[$i]', '$jumlah_diterima[$i]', '$tanggal_penerimaan', '$no_surat_jalan', '$id_supplier', '$id_pengguna')";
        $link->query($sql);
    }
    // ganti status PO menjadi Diterima
    $sqlUpdate = "UPDATE purchase_order SET status = 'Diterima' WHERE no_po = '$no_po'";
    $link->query($sqlUpdate);

    header("Location: ../../index.php?page=penerimaan-barang");
    exit();
}