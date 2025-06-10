<table id="table-data" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Kode Produk</th>
            <th>Nama Produk</th>
            <th>Satuan</th>
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
                <td><?= $row['buffer_stock'] ?></td>
                <td><?= $row['minimum_stock'] ?></td>
                <td>
                    <div class="d-flex flex-wrap align-items-end gap-1">
                        <button id="edit" data-nama="<?= $row['nama_produk'] ?>" data-id="<?= $row['id_produk'] ?>"
                            class="btn btn-primary-600 radius-8 px-10 py-10 d-flex align-items-center gap-2 text-sm"><iconify-icon
                                icon="mingcute:refresh-4-ai-line" class="text-xl"></iconify-icon>Hitung Buffer
                            Stock</button>

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
                url: 'pages/stok-minimal/hitung-buffer-stock.php',
                data: 'id=' + id + '&nama=' + nama,
                success: function (data) {
                    $('.modal').modal('show');
                    $('.modal-title').html('Hitung Buffer ' + nama);
                    $('.modal .modal-body').html(data);
                }
            })
        });

    });
</script>