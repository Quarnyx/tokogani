<?php
require_once '../../partials/config.php';
function hitungBufferStock($link, $id_produk, $id_supplier)
{
    // Ambil data barang keluar 30 hari terakhir
    $sql = "SELECT tanggal, SUM(jumlah) as total 
            FROM barang_keluar 
            WHERE id_produk = $id_produk 
            AND tanggal >= CURDATE() - INTERVAL 30 DAY 
            GROUP BY tanggal";

    $result = mysqli_query($link, $sql);

    $harian = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $harian[] = $row['total'];
    }

    if (count($harian) === 0)
        return 0;

    $max_harian = max($harian);
    $avg_harian = array_sum($harian) / count($harian);

    // Ambil lead time dari tabel suppliers
    $sqlLead = "SELECT lama_pengantaran_maksimal FROM supplier WHERE id_supplier = $id_supplier";
    $resLead = mysqli_query($link, $sqlLead);
    $lead = mysqli_fetch_assoc($resLead);

    $max_lead = $lead ? $lead['lama_pengantaran_maksimal'] + 2 : 7;  // anggap +2 hari cadangan
    $avg_lead = $lead ? $lead['lama_pengantaran_maksimal'] : 5;

    // Hitung buffer stock
    $buffer_stock = ($max_harian * $max_lead) - ($avg_harian * $avg_lead);

    return ceil($buffer_stock);

}

switch ($_GET['aksi'] ?? '') {
    case 'edit-stok-minimal':
        $id = $_POST['id'];
        $id_supplier = $_POST['id_supplier'];

        $buffer = hitungBufferStock($link, $id, $id_supplier);
        $sql = "UPDATE produk SET 
                buffer_stock = '$buffer'
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

}