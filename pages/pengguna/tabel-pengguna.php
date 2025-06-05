<table id="table-data" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Username</th>
            <th>Level</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        require_once '../../partials/config.php';
        $no = 1;
        $sql = "SELECT * FROM pengguna";
        $result = $link->query($sql);
        while ($row = $result->fetch_assoc()) {
            ?>
            <tr>
                <td><?= $no++ ?></td>
                <td> <?= $row['nama_pengguna'] ?>
                </td>
                <td><?= $row['username'] ?></td>
                <td><?= $row['level'] ?></td>
                <td>
                    <div class="d-flex flex-wrap align-items-end gap-1">
                        <button id="edit" data-nama="<?= $row['nama_pengguna'] ?>" data-id="<?= $row['id_pengguna'] ?>"
                            class="btn btn-primary-600 radius-8 px-10 py-10 d-flex align-items-center gap-2 text-sm"><iconify-icon
                                icon="mingcute:bookmark-edit-line" class="text-xl"></iconify-icon>Edit</button>

                        <?php if ($row['level'] != 'Kepala Sekolah') { ?>
                            <button id="delete" data-nama="<?= $row['nama_pengguna'] ?>" data-id="<?= $row['id_pengguna'] ?>"
                                class="btn btn-danger-600 radius-8 px-10 py-10 d-flex align-items-center gap-2 text-sm"><iconify-icon
                                    icon="mingcute:delete-2-line" class="text-xl"></iconify-icon>Hapus</button>
                        <?php } ?>

                        <button id="ganti-password" data-nama="<?= $row['nama_pengguna']; ?>"
                            data-id="<?= $row['id_pengguna'] ?>"
                            class="btn btn-outline-primary-600 radius-8 px-10 py-10 d-flex align-items-center gap-2 text-sm"><iconify-icon
                                icon="mingcute:key-1-line" class="text-xl"></iconify-icon>Ganti
                            Password</button>
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
                url: 'pages/pengguna/edit-pengguna.php',
                data: 'id=' + id + '&nama=' + nama,
                success: function (data) {
                    $('.modal').modal('show');
                    $('.modal-title').html('Edit Data ' + nama);
                    $('.modal .modal-body').html(data);
                }
            })
        });
        $('#table-data').on('click', '#ganti-password', function () {
            const id = $(this).data('id');
            const nama = $(this).data('nama');
            alertify.prompt('Ganti Password ' + nama, 'Masukkan Password Baru', '', function (evt, value) {
                $.ajax({
                    type: 'POST',
                    url: 'pages/pengguna/proses-pengguna.php?aksi=ganti-password',
                    data: 'id=' + id + '&nama=' + nama + '&password=' + value,
                    success: function (data) {
                        if (data == "ok") {
                            alertify.success('Ganti Password Berhasil');

                        } else {
                            alertify.error('Ganti Password Gagal');

                        }
                    },
                    error: function (data) {
                        alertify.error(data);
                    }
                })
            }, function () {
                alertify.error('Ganti password dibatalkan');
            })
        });
        $('#table-data').on('click', '#delete', function () {
            const id = $(this).data('id');
            const nama = $(this).data('nama');
            alertify.confirm('Hapus', 'Apakah anda yakin ingin menghapus data ' + nama + '?', function () {
                $.ajax({
                    type: 'POST',
                    url: 'pages/pengguna/proses-pengguna.php?aksi=hapus-pengguna',
                    data: 'id=' + id,
                    success: function (data) {
                        if (data == "ok") {
                            loadTable();
                            $('.modal').modal('hide');
                            alertify.success('Pengguna Berhasil Dihapus');

                        } else {
                            alertify.error('Pengguna Gagal Dihapus');

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