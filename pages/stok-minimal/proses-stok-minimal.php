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

    // echo "<pre> Harian";
    // print_r($harian);
    // echo "</pre>";
    // echo "<pre> Max Harian";
    // print_r($max_harian);
    // echo "</pre>";
    // echo "<pre> Avg Harian";
    // print_r($avg_harian);
    // echo "</pre>";

    // Ambil lead time dari tabel suppliers
    $sqlLead = "SELECT lama_pengantaran_maksimal, avg_lama_pengantaran FROM supplier WHERE id_supplier = $id_supplier";
    $resLead = mysqli_query($link, $sqlLead);
    $lead = mysqli_fetch_assoc($resLead);

    $max_lead = $lead ? $lead['lama_pengantaran_maksimal'] : 7;  // anggap +2 hari cadangan
    $avg_lead = $lead ? $lead['avg_lama_pengantaran'] : 5;

    // echo "<pre> Max Lead";
    // print_r($max_lead);
    // echo "</pre>";
    // echo "<pre> Avg Lead";
    // print_r($avg_lead);
    // echo "</pre>";
    // Hitung buffer stock
    $buffer_stock = ($max_harian * $max_lead) - ($avg_harian * $avg_lead);

    // echo "<pre> Buffer Stock";
    // print_r($buffer_stock);
    // echo "</pre>";
    return ceil($buffer_stock);

}

function hitungStockMinimal($link, $id_produk, $id_supplier)
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
    // Ambil lead time dari tabel suppliers
    $sqlLead = "SELECT lama_pengantaran_maksimal, avg_lama_pengantaran FROM supplier WHERE id_supplier = $id_supplier";
    $resLead = mysqli_query($link, $sqlLead);
    $lead = mysqli_fetch_assoc($resLead);

    $avg_harian = array_sum($harian) / count($harian);
    // echo "<pre> Avg Harian";
    // print_r($avg_harian);
    // echo "</pre>";
    return ceil($avg_harian * $lead['avg_lama_pengantaran']);


}

switch ($_GET['aksi'] ?? '') {
    case 'edit-stok-minimal':
        $id = $_POST['id'];
        $id_supplier = $_POST['id_supplier'];

        $buffer = hitungBufferStock($link, $id, $id_supplier);
        $minimum_stock = hitungStockMinimal($link, $id, $id_supplier);
        $sql = "UPDATE produk SET 
                buffer_stock = '$buffer',
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

}