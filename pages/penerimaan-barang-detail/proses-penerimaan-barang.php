<?php
require_once '../../partials/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $no_po = $_POST['no_po'];
    $id_produk = $_POST['idproduk'];
    $jumlah = isset($_POST['jumlah']) ? $_POST['jumlah'] : [];
    $jumlah_diterima = $_POST['jumlah_diterima'];
    $tanggal_penerimaan = $_POST['tanggal_penerimaan'];
    $no_surat_jalan = $_POST['no_surat_jalan'];
    $id_supplier = $_POST['id_supplier'];
    $id_pengguna = $_POST['id_pengguna'];
    $create_backorder = isset($_POST['create_backorder']) && $_POST['create_backorder'] == '1';

    $hasShortfall = false;

    // input penerimaan barang
    for ($i = 0; $i < count($id_produk); $i++) {
        $ordered = isset($jumlah[$i]) ? (float) $jumlah[$i] : 0;
        $received = isset($jumlah_diterima[$i]) ? (float) $jumlah_diterima[$i] : 0;

        $stmt = $link->prepare("INSERT INTO barang_masuk (no_po, id_produk, jumlah, tanggal, no_surat_jalan, id_supplier, id_pengguna) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param('siissii', $no_po, $id_produk[$i], $received, $tanggal_penerimaan, $no_surat_jalan, $id_supplier, $id_pengguna);
        $stmt->execute();
        $stmt->close();

        if ($received < $ordered) {
            $hasShortfall = true;
        }
    }

    if ($hasShortfall && $create_backorder) {
        // generate new PO code
        $query = $link->query("SELECT MAX(no_po) AS no_po FROM purchase_order");
        $data = $query->fetch_assoc();
        $lastNum = $data['no_po'] ? preg_replace('/[^0-9]/', '', $data['no_po']) : '0';
        $next = intval($lastNum) + 1;
        $new_no_po = 'PO-' . sprintf('%03d', $next);

        $keterangan = 'Backorder dari ' . $no_po . ' - sisa qty';
        $status = 'Dipesan';

        $stmt = $link->prepare("INSERT INTO purchase_order (id_pengguna, no_po, id_supplier, tanggal, status, keterangan) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param('isisss', $id_pengguna, $new_no_po, $id_supplier, $tanggal_penerimaan, $status, $keterangan);
        $stmt->execute();
        $stmt->close();

        // insert remaining quantities into po_detail for the new PO
        for ($i = 0; $i < count($id_produk); $i++) {
            $ordered = isset($jumlah[$i]) ? (int) $jumlah[$i] : 0;
            $received = isset($jumlah_diterima[$i]) ? (int) $jumlah_diterima[$i] : 0;
            $remaining = $ordered - $received;
            if ($remaining > 0) {
                $stmt = $link->prepare("INSERT INTO po_detail (id_produk, jumlah, no_po) VALUES (?, ?, ?)");
                $stmt->bind_param('iis', $id_produk[$i], $remaining, $new_no_po);
                $stmt->execute();
                $stmt->close();
            }
        }

        // update original PO status to 'Diterima Sebagian'
        $stmt = $link->prepare("UPDATE purchase_order SET status = ? WHERE no_po = ?");
        $partialStatus = 'Diterima Sebagian';
        $stmt->bind_param('ss', $partialStatus, $no_po);
        $stmt->execute();
        $stmt->close();
    } else {
        // no shortfall -> fully received
        $stmt = $link->prepare("UPDATE purchase_order SET status = ? WHERE no_po = ?");
        $fullStatus = 'Diterima';
        $stmt->bind_param('ss', $fullStatus, $no_po);
        $stmt->execute();
        $stmt->close();
    }

    header("Location: ../../index.php?page=penerimaan-barang");
    exit();
}