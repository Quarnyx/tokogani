<div class="table-responsive">
    <table id="table-data" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Supplier</th>
                <th>Nama Supplier</th>
                <th>Alamat</th>
                <th>Kontak</th>
                <th>Lama Pengantaran</th>
                <th>Avg. Lama Pengantaran</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include "../../partials/config.php";
            $no = 1;
            $sql = "SELECT * FROM supplier ORDER BY id_supplier DESC";
            $result = $link->query($sql);
            while ($row = $result->fetch_assoc()) {
                ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $row['kode_supplier'] ?></td>
                    <td><?= $row['nama_supplier'] ?></td>
                    <td class="text-wrap"><?= $row['alamat'] ?></td>
                    <td><?= $row['kontak'] ?></td>
                    <td><?= $row['lama_pengantaran_maksimal'] ?> Hari</td>
                    <td><?= $row['avg_lama_pengantaran'] ?> Hari</td>
                    <td>
                        <div class="d-flex flex-wrap align-items-end gap-1">
                            <button id="edit" data-nama="<?= $row['nama_supplier'] ?>" data-id="<?= $row['id_supplier'] ?>"
                                class="btn btn-primary-600 radius-8 px-10 py-10 d-flex align-items-center gap-2 text-sm"><iconify-icon
                                    icon="mingcute:bookmark-edit-line" class="text-xl"></iconify-icon>Edit</button>
                            <button id="delete" data-nama="<?= $row['nama_supplier'] ?>"
                                data-id="<?= $row['id_supplier'] ?>"
                                class="btn btn-danger-600 radius-8 px-10 py-10 d-flex align-items-center gap-2 text-sm"><iconify-icon
                                    icon="mingcute:delete-2-line" class="text-xl"></iconify-icon>Hapus</button>

                        </div>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<script>
    $(document).ready(function () {
        $('#table-data').DataTable();
        // Handle edit button click
        $('#table-data').on('click', '#edit', function () {
            const id = $(this).data('id');
            const nama = $(this).data('nama');
            $.ajax({
                type: 'POST',
                url: 'pages/supplier/edit-supplier.php',
                data: 'id=' + id,
                success: function (data) {
                    $('.modal').modal('show');
                    $('.modal-title').html('Edit Supplier ' + nama);
                    $('.modal-body').html(data);
                }
            });
        });

        // Handle delete button click
        $('#table-data').on('click', '#delete', function () {
            const id = $(this).data('id');
            const nama = $(this).data('nama');
            alertify.confirm('Hapus Supplier', 'Apakah anda yakin ingin menghapus supplier ' + nama + '?', function () {
                $.ajax({
                    type: 'POST',
                    url: 'pages/supplier/proses-supplier.php?aksi=hapus-supplier',
                    data: 'id=' + id,
                    success: function (data) {
                        if (data == "ok") {
                            loadTable();
                            alertify.success('Supplier berhasil dihapus');
                        } else {
                            alertify.error('Supplier gagal dihapus');
                        }
                    }
                });
            }, function () {
                alertify.error('Hapus supplier dibatalkan');
            });
        });
    });

</script>