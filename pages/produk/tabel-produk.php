<table id="table-data" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Kode Produk</th>
            <th>Nama Produk</th>
            <th>Satuan</th>
            <th>Harga Beli</th>
            <th>Harga Jual</th>
            <th>Buffer Stock</th>
            <th>Minimum Stock</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        require_once '../../partials/config.php';
        $no = 1;
        $sql = "SELECT * FROM produk";
        $result = $link->query($sql);
        while ($row = $result->fetch_assoc()) {
            ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $row['kode_produk'] ?></td>
                <td><?= $row['nama_produk'] ?></td>
                <td><?= $row['satuan'] ?></td>
                <td>Rp <?= number_format($row['harga_beli'], 0, ',', '.') ?></td>
                <td>Rp <?= number_format($row['harga_jual'], 0, ',', '.') ?></td>
                <td><?= $row['buffer_stock'] ?></td>
                <td><?= $row['minimum_stock'] ?></td>
                <td>
                    <div class="d-flex flex-wrap align-items-end gap-1">
                        <button id="edit" data-nama="<?= $row['nama_produk'] ?>" data-id="<?= $row['id_produk'] ?>"
                            class="btn btn-primary-600 radius-8 px-10 py-10 d-flex align-items-center gap-2 text-sm"><iconify-icon
                                icon="mingcute:bookmark-edit-line" class="text-xl"></iconify-icon>Edit</button>

                        <button id="delete" data-nama="<?= $row['nama_produk'] ?>" data-id="<?= $row['id_produk'] ?>"
                            class="btn btn-danger-600 radius-8 px-10 py-10 d-flex align-items-center gap-2 text-sm"><iconify-icon
                                icon="mingcute:delete-2-line" class="text-xl"></iconify-icon>Hapus</button>
                    </div>
                </td>
            </tr>
            <?php
        }
        ?>
    </tbody>
</table>
<script>
    $(document).ready(function () {
        $('#table-data').DataTable();
        $('#table-data').on('click', '#edit', function () {
            const id = $(this).data('id');
            const nama = $(this).data('nama');
            $.ajax({
                type: 'POST',
                url: 'pages/produk/edit-produk.php',
                data: 'id=' + id + '&nama=' + nama,
                success: function (data) {
                    $('.modal').modal('show');
                    $('.modal-title').html('Edit Data ' + nama);
                    $('.modal .modal-body').html(data);
                }
            })
        });
        $('#table-data').on('click', '#delete', function () {
            const id = $(this).data('id');
            const nama = $(this).data('nama');
            alertify.confirm('Hapus', 'Apakah anda yakin ingin menghapus data ' + nama + '?', function () {
                $.ajax({
                    type: 'POST',
                    url: 'pages/produk/proses-produk.php?aksi=hapus-produk',
                    data: 'id=' + id,
                    success: function (data) {
                        if (data == "ok") {
                            loadTable();
                            $('.modal').modal('hide');
                            alertify.success('Produk Berhasil Dihapus');
                        } else {
                            alertify.error('Produk Gagal Dihapus');
                        }
                    },
                    error: function (data) {
                        alertify.error(data);
                    }
                })
            }, function () {
                alertify.error('Hapus dibatalkan');
            })
        });
    });
</script>