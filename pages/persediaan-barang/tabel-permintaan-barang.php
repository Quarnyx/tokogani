<table id="table-data-1" class="table bordered-table mb-0" data-page-length='10'>
    <thead>
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Nama Produk</th>
            <th>Satuan</th>
            <th>Jumlah</th>
            <th>Status</th>
            <th>Catatan</th>
            <th>PIC</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        require_once '../../partials/config.php';
        $no = 1;
        $sql = "SELECT * FROM v_permintaan_barang";
        $result = $link->query($sql);
        while ($row = $result->fetch_assoc()) {
            ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $row['tanggal'] ?></td>
                <td><?= $row['nama_produk'] ?></td>
                <td><?= $row['satuan'] ?></td>
                <td><?= $row['jumlah_diminta'] ?></td>
                <td><?php
                if ($row['status'] == 'Proses') { ?>
                        <span class="badge bg-warning">Proses
                        </span>
                    <?php } elseif ($row['status'] == 'Disetujui') { ?>
                        <span class="badge bg-success">Disetujui
                        </span>
                    <?php } elseif ($row['status'] == 'Ditolak') { ?>
                        <span class="badge bg-danger">Ditolak
                        </span>
                    <?php } ?>
                </td>
                <td><?= $row['catatan'] ?></td>
                <td><?= $row['nama_pengguna'] ?></td>
                <td>
                    <?php if ($row['status'] == 'Proses' || $row['status'] == 'Ditolak') { ?>
                        <button id="delete" data-nama="<?= $row['nama_produk'] ?>" data-id="<?= $row['id_permintaan_barang'] ?>"
                            class="btn btn-danger-600 radius-8 px-10 py-10 d-flex align-items-center gap-2 text-sm"><iconify-icon
                                icon="mingcute:delete-2-line" class="text-xl"></iconify-icon>Batalkan</button>
                    <?php } ?>
                </td>
            </tr>
            <?php
        }
        ?>
    </tbody>
</table>
<script>
    $(document).ready(function () {
        $('#table-data-1').DataTable();

        $('#table-data-1').on('click', '#edit', function () {
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
        $('#table-data-1').on('click', '#delete', function () {
            const id = $(this).data('id');
            const nama = $(this).data('nama');
            alertify.confirm('Hapus', 'Apakah anda yakin ingin menghapus data ' + nama + '?', function () {
                $.ajax({
                    type: 'POST',
                    url: 'pages/persediaan-barang/proses-persediaan-produk.php?aksi=hapus-persediaan-produk',
                    data: 'id=' + id,
                    success: function (data) {
                        if (data == "ok") {
                            loadTable();
                            $('.modal').modal('hide');
                            alertify.success('Permintaan Berhasil Dihapus');
                        } else {
                            alertify.error('Permintaan Gagal Dihapus');
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