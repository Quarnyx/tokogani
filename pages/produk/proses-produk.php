<?php
require_once '../../partials/config.php';
switch ($_GET['aksi'] ?? '') {
    case 'tambah-produk':
        $nama_produk_arr = $_POST['nama_produk'] ?? [];
        $satuan_arr = $_POST['satuan'] ?? [];
        $harga_beli_arr = $_POST['harga_beli'] ?? [];
        $harga_jual_arr = $_POST['harga_jual'] ?? [];

        $buffer_stock = 10;

        if (!is_array($nama_produk_arr) || count($nama_produk_arr) === 0) {
            echo 'error';
            http_response_code(400);
            exit;
        }

        $stmt = $link->prepare("INSERT INTO produk (kode_produk, nama_produk, satuan, harga_beli, harga_jual, buffer_stock) VALUES (?, ?, ?, ?, ?, ?)");
        if (!$stmt) {
            echo 'error';
            echo $link->error;
            http_response_code(500);
            exit;
        }

        $link->begin_transaction();
        $all_ok = true;

        foreach ($nama_produk_arr as $i => $nama_produk_item) {
            $nama_produk_item = trim($nama_produk_item);
            if ($nama_produk_item === '') {
                $all_ok = false;
                break;
            }

            $parts = preg_split('/\s+/', $nama_produk_item);
            $firstWord = $parts[0] ?? '';
            $prefix = preg_replace('/[^A-Za-z0-9]/', '', strtoupper($firstWord));
            if ($prefix === '') {
                $prefix = 'PRD';
            }
            if (strlen($prefix) < 3) {
                $prefix = str_pad($prefix, 3, 'X');
            }
            $prefix = substr($prefix, 0, 3);

            $prefixEsc = $link->real_escape_string($prefix);

            $substrStart = strlen($prefix) + 2;
            $leftLen = strlen($prefix) + 1;
            $q = $link->query(
                "SELECT MAX(CAST(SUBSTRING(kode_produk, $substrStart) AS UNSIGNED)) AS maxseq
                 FROM produk
                 WHERE LEFT(kode_produk, $leftLen) = '{$prefixEsc}-'"
            );
            $maxseq = 0;
            if ($q) {
                $row = $q->fetch_assoc();
                $maxseq = (int) ($row['maxseq'] ?? 0);
            }
            $nextSeq = $maxseq + 1;

            $kode_produk = $prefix . '-' . str_pad($nextSeq, 3, '0', STR_PAD_LEFT);


            $harga_beli_raw = $harga_beli_arr[$i] ?? '';
            $harga_jual_raw = $harga_jual_arr[$i] ?? '';
            $harga_beli_num = (int) preg_replace('/[^0-9]/', '', $harga_beli_raw);
            $harga_jual_num = (int) preg_replace('/[^0-9]/', '', $harga_jual_raw);

            $satuan_item = $satuan_arr[$i] ?? '';


            $stmt->bind_param('sssiii', $kode_produk, $nama_produk_item, $satuan_item, $harga_beli_num, $harga_jual_num, $buffer_stock);
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
            echo 'error';
            if ($stmt && $stmt->error) {
                echo $stmt->error;
            } else {
                echo $link->error;
            }
            http_response_code(400);
        }

        $stmt->close();
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