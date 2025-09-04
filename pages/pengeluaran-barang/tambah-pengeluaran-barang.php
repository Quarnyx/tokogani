<form id="tambah-barang" enctype="multipart/form-data">
    <?php session_start(); ?>
    <input type="hidden" name="id_pengguna" value="<?= $_SESSION['id_pengguna'] ?>">

    <?php
    // Build options once to reuse for each row
    include "../../partials/config.php";
    $options = '';
    $sql = "SELECT * FROM v_stok WHERE stok_tersedia > 0";
    $result = $link->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $options .= '<option data-hargajual="' . $row['harga_jual'] . '" value="' . $row['id_produk'] . '">' . $row['nama_produk'] . ' - Stok ' . $row['stok_tersedia'] . '</option>';
        }
    }
    ?>

    <div class="d-grid gap-3">
        <!-- rows container -->
        <div id="rows-container">
            <!-- one visible row to start -->
            <div class="row item-row mb-2">
                <div class="col-md-6">
                    <label class="form-label">Nama Barang</label>
                    <select class="form-select id-produk" name="id_produk[]" data-trigger="">
                        <option value="">Pilih Barang</option>
                        <?= $options ?>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Harga Jual</label>
                    <input type="text" class="form-control harga-jual" name="harga_jual[]" placeholder="Harga Jual"
                        readonly>
                </div>
                <div class="col-md-2">
                    <label class="form-label">Jumlah</label>
                    <input type="number" class="form-control jumlah" name="jumlah[]" placeholder="Jumlah" min="1">
                </div>
                <div class="col-md-1 d-flex align-items-end">
                    <button type="button" class="btn btn-danger btn-sm remove-row" title="Hapus baris">&times;</button>
                </div>
            </div>
        </div>

        <!-- template (hidden) for cloning -->
        <div class="row item-row-template d-none">
            <div class="col-md-6">
                <select class="form-select id-produk" name="id_produk[]" data-trigger="">
                    <option value="">Pilih Barang</option>
                    <?= $options ?>
                </select>
            </div>
            <div class="col-md-3">
                <input type="text" class="form-control harga-jual" name="harga_jual[]" placeholder="Harga Jual"
                    readonly>
            </div>
            <div class="col-md-2">
                <input type="number" class="form-control jumlah" name="jumlah[]" placeholder="Jumlah" min="1">
            </div>
            <div class="col-md-1 d-flex align-items-end">
                <button type="button" class="btn btn-danger btn-sm remove-row" title="Hapus baris">&times;</button>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <label for="tanggal" class="form-label">Tanggal</label>
                <input type="date" class="form-control" name="tanggal" id="tanggal" placeholder="Tanggal">
            </div>
            <div class="col-md-6">
                <label for="tujuan" class="form-label">Tujuan</label>
                <input type="text" class="form-control" name="tujuan" id="tujuan" placeholder="Tujuan">
            </div>
        </div>

        <div class="mt-2">
            <button type="button" id="add-row" class="btn btn-secondary btn-sm">Tambah Baris</button>
        </div>
    </div>

    <button type="submit" class="btn btn-primary mt-3">Simpan</button>
</form>

<script>
    $(document).ready(function () {
        // initialize Selectr for existing selects
        new Selectr('.form-select');

        // Delegate change to set harga_jual for the row
        $('#rows-container').on('change', '.id-produk', function () {
            const harga_jual = $(this).find(':selected').data('hargajual') ?? '';
            const stok_tersedia = $(this).find(':selected').text().match(/Stok (\d+)/)?.[1] ?? 0;

            const $row = $(this).closest('.item-row, .item-row-template, .item-row');
            $row.find('.harga-jual').val(harga_jual);
            $row.find('.jumlah').attr('data-stok', stok_tersedia).attr('max', stok_tersedia);

            // Validate current quantity if any
            validateQuantity($row.find('.jumlah'));
        });

        // Validate quantity input
        $('#rows-container').on('input change', '.jumlah', function () {
            validateQuantity($(this));
        });

        // Validation function
        function validateQuantity($input) {
            const jumlah = parseInt($input.val()) || 0;
            const stok = parseInt($input.attr('data-stok')) || 0;
            const $submitBtn = $('#tambah-barang button[type="submit"]');

            // Remove previous validation classes
            $input.removeClass('is-invalid is-valid');

            if (jumlah > stok && stok > 0) {
                $input.addClass('is-invalid');
                alertify.error(`Jumlah tidak boleh melebihi stok tersedia (${stok})`);
                $submitBtn.prop('disabled', true);
            } else if (jumlah > 0) {
                $input.addClass('is-valid');
                // Check if all inputs are valid before enabling submit
                checkAllValidation();
            } else {
                checkAllValidation();
            }
        }

        // Check validation for all quantity inputs
        function checkAllValidation() {
            const $submitBtn = $('#tambah-barang button[type="submit"]');
            const hasInvalid = $('#rows-container .jumlah.is-invalid').length > 0;
            const hasEmpty = $('#rows-container .jumlah').filter(function () {
                return $(this).val() === '' || parseInt($(this).val()) <= 0;
            }).length > 0;

            $submitBtn.prop('disabled', hasInvalid || hasEmpty);
        }

        // Add new row
        $('#add-row').click(function () {
            const $tpl = $('.item-row-template').clone();
            $tpl.removeClass('item-row-template d-none').addClass('item-row mb-2');
            $('#rows-container').append($tpl);
            new Selectr($tpl.find('.form-select')[0]);

            // Check validation after adding new row
            checkAllValidation();
        });

        // Remove row
        $('#rows-container').on('click', '.remove-row', function () {
            if ($('#rows-container .item-row').length > 1) {
                $(this).closest('.item-row').remove();
                checkAllValidation();
            } else {
                const $r = $(this).closest('.item-row');
                $r.find('.id-produk').val('').trigger('change');
                $r.find('.harga-jual').val('');
                $r.find('.jumlah').val('').removeClass('is-invalid is-valid');
                checkAllValidation();
            }
        });

        // Submit handler
        $("#tambah-barang").submit(function (e) {
            var formData = new FormData(this);
            e.preventDefault();

            // Final validation before submit
            let isValid = true;
            $('#rows-container .jumlah').each(function () {
                const jumlah = parseInt($(this).val()) || 0;
                const stok = parseInt($(this).attr('data-stok')) || 0;
                if (jumlah > stok && stok > 0) {
                    isValid = false;
                    return false;
                }
            });

            if (!isValid) {
                alertify.error('Periksa kembali jumlah barang yang melebihi stok');
                return false;
            }

            $.ajax({
                type: "POST",
                url: "pages/pengeluaran-barang/proses-pengeluaran-barang.php?aksi=tambah-pengeluaran-barang",
                data: formData,
                contentType: false,
                processData: false,
                success: function (data) {
                    if (data.trim() == "ok") {
                        loadTable();
                        $('.modal').modal('hide');
                        alertify.success('Transaksi Berhasil Ditambah');
                    } else {
                        alertify.error('Transaksi Gagal Ditambah: ' + data);
                    }
                },
                error: function (xhr) {
                    alertify.error('Transaksi Gagal Ditambah');
                }
            });
        });

        // Initial validation check
        checkAllValidation();
    });

</script>