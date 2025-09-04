<form id="tambah-barang" enctype="multipart/form-data">
    <?php session_start(); ?>
    <input type="hidden" name="id_pengguna" value="<?= $_SESSION['id_pengguna'] ?>">
    <input type="hidden" name="no_po" value="<?= $_GET['no_po'] ?>">

    <?php
    // Build options once to reuse for each row
    include "../../partials/config.php";
    $barang_options = '';

    // Get barang options with available quantity
    $sql = "SELECT * FROM v_penerimaan_barang WHERE no_po = '" . $_GET['no_po'] . "'";
    $result = $link->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $barang_options .= '<option value="' . $row['id_produk'] . '" data-jumlah-tersedia="' . $row['jumlah'] . '">';
            $barang_options .= $row['kode_produk'] . ' - ' . $row['nama_produk'] . ' - Jumlah diterima ' . $row['jumlah'];
            $barang_options .= '</option>';
        }
    }

    // Get supplier data for input
    $suppliers = [];
    $sql = "SELECT * FROM v_penerimaan_barang WHERE no_po = '" . $_GET['no_po'] . "' GROUP BY id_supplier";
    $result = $link->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    }
    ?>

    <div class="d-grid gap-3">
        <div id="barang-rows">
            <div class="row barang-row">
                <div class="col-md-8">
                    <label for="id_produk_0" class="form-label">Nama Barang</label>
                    <select class="form-select form-selectable" name="id_produk[]" id="id_produk_0" data-trigger="">
                        <option value="">Pilih Barang</option>
                        <?= $barang_options ?>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="jumlah_0" class="form-label">Jumlah</label>
                    <input type="number" class="form-control jumlah-input" name="jumlah[]" id="jumlah_0"
                        placeholder="Jumlah" min="1">
                </div>
                <div class="col-md-1 d-flex align-items-end">
                    <button type="button" class="btn btn-danger btn-remove-row" style="display:none;">-</button>
                </div>
            </div>
        </div>
        <button type="button" class="btn btn-success mt-2" id="add-row">Tambah Barang</button>

        <!-- Supplier Fields -->
        <div class="row">
            <div class="col-md-12">
                <input type="hidden" class="form-control" name="id_supplier" id="id_supplier" placeholder="ID Supplier"
                    value="<?= $row['id_supplier'] ?? '' ?>" readonly>
                <label for="nama_supplier" class="form-label">Nama Supplier</label>
                <input type="text" class="form-control" name="nama_supplier" id="nama_supplier"
                    placeholder="Nama Supplier" value="<?= $row['nama_supplier'] ?? '' ?>" readonly>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <label for="tanggal" class="form-label">Tanggal</label>
                <input type="date" class="form-control" name="tanggal" id="tanggal" placeholder="Tanggal">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <label for="keterangan" class="form-label">Keterangan</label>
                <textarea class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan"></textarea>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary mt-3" id="submit-btn">Simpan</button>
</form>
<script>
    $(document).ready(function () {
        // Initialize Selectr for existing selects
        new Selectr('.form-selectable');

        // Store the options HTML for reuse
        var barangOptions = `<?= $barang_options ?>`;

        // Row counter for unique IDs
        var rowCounter = 1;

        // Template for new rows (without supplier)
        function createNewRow() {
            return `
                <div class="row barang-row">
                    <div class="col-md-8">
                        <label for="id_produk_${rowCounter}" class="form-label">Nama Barang</label>
                        <select class="form-select form-selectable" name="id_produk[]" id="id_produk_${rowCounter}" data-trigger="">
                            <option value="">Pilih Barang</option>
                            ${barangOptions}
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="jumlah_${rowCounter}" class="form-label">Jumlah</label>
                        <input type="number" class="form-control jumlah-input" name="jumlah[]" id="jumlah_${rowCounter}" placeholder="Jumlah" min="1">
                    </div>
                    <div class="col-md-1 d-flex align-items-end">
                        <button type="button" class="btn btn-danger btn-remove-row">-</button>
                    </div>
                </div>
            `;
        }

        // Handle supplier selection
        $('#nama_supplier').on('change', function () {
            const selectedId = $(this).find(':selected').data('id') || '';
            $('#id_supplier').val(selectedId);
        });

        // Quantity validation function
        function validateQuantity($input) {
            const jumlah = parseInt($input.val()) || 0;
            const $row = $input.closest('.barang-row');
            const $select = $row.find('.form-selectable');
            const jumlahTersedia = parseInt($select.find(':selected').data('jumlah-tersedia')) || 0;

            // Remove previous validation classes
            $input.removeClass('is-invalid is-valid');

            if ($select.val() === '') {
                // No product selected, no validation needed yet
                checkAllValidation();
                return;
            }

            if (jumlah > jumlahTersedia && jumlahTersedia > 0) {
                $input.addClass('is-invalid');
                alertify.error(`Jumlah tidak boleh melebihi jumlah tersedia (${jumlahTersedia})`);
            } else if (jumlah > 0) {
                $input.addClass('is-valid');
            }

            checkAllValidation();
        }

        // Check validation for all inputs
        function checkAllValidation() {
            const $submitBtn = $('#submit-btn');
            const hasInvalid = $('#barang-rows .jumlah-input.is-invalid').length > 0;
            const hasEmptyRequired = $('#barang-rows .barang-row').filter(function () {
                const $row = $(this);
                const hasProduct = $row.find('.form-selectable').val() !== '';
                const hasQuantity = parseInt($row.find('.jumlah-input').val()) > 0;
                return hasProduct && !hasQuantity; // Product selected but no quantity
            }).length > 0;

            // Check if supplier is selected
            const hasSupplier = $('#nama_supplier').val() !== '';

            $submitBtn.prop('disabled', hasInvalid || hasEmptyRequired || !hasSupplier);
        }

        // Handle product selection change
        $('#barang-rows').on('change', '.form-selectable', function () {
            const $row = $(this).closest('.barang-row');
            const $jumlahInput = $row.find('.jumlah-input');
            const jumlahTersedia = parseInt($(this).find(':selected').data('jumlah-tersedia')) || 0;

            if ($(this).val() !== '') {
                $jumlahInput.attr('max', jumlahTersedia);
                // Validate current quantity if any
                if ($jumlahInput.val() !== '') {
                    validateQuantity($jumlahInput);
                }
            } else {
                $jumlahInput.removeAttr('max').removeClass('is-invalid is-valid');
                checkAllValidation();
            }
        });

        // Handle quantity input
        $('#barang-rows').on('input change', '.jumlah-input', function () {
            validateQuantity($(this));
        });

        // Handle supplier change for validation
        $('#nama_supplier').on('change', function () {
            checkAllValidation();
        });

        // Add new row
        $('#add-row').click(function () {
            const newRowHtml = createNewRow();
            $('#barang-rows').append(newRowHtml);

            // Initialize Selectr for the new row
            const $newRow = $('#barang-rows .barang-row:last');
            new Selectr($newRow.find('.form-selectable')[0]);

            // Show remove buttons
            $('#barang-rows .barang-row').find('.btn-remove-row').show();

            // Increment counter for next row
            rowCounter++;

            // Update validation
            checkAllValidation();
        });

        // Remove row
        $('#barang-rows').on('click', '.btn-remove-row', function () {
            $(this).closest('.barang-row').remove();

            // Hide remove button if only one row
            if ($('#barang-rows .barang-row').length === 1) {
                $('#barang-rows .barang-row .btn-remove-row').hide();
            }

            // Update validation
            checkAllValidation();
        });

        // Hide remove button if only one row initially
        if ($('#barang-rows .barang-row').length === 1) {
            $('#barang-rows .barang-row .btn-remove-row').hide();
        }

        // Form submission
        $("#tambah-barang").submit(function (e) {
            e.preventDefault();

            // Final validation before submit
            let isValid = true;
            let hasData = false;

            // Check supplier
            if ($('#nama_supplier').val() === '') {
                alertify.error('Supplier harus dipilih');
                return false;
            }

            $('#barang-rows .barang-row').each(function () {
                const $row = $(this);
                const $select = $row.find('.form-selectable');
                const $jumlahInput = $row.find('.jumlah-input');

                if ($select.val() !== '') {
                    hasData = true;
                    const jumlah = parseInt($jumlahInput.val()) || 0;
                    const jumlahTersedia = parseInt($select.find(':selected').data('jumlah-tersedia')) || 0;

                    if (jumlah <= 0) {
                        alertify.error('Jumlah harus diisi untuk semua barang yang dipilih');
                        isValid = false;
                        return false;
                    }

                    if (jumlah > jumlahTersedia) {
                        alertify.error('Periksa kembali jumlah barang yang melebihi stok tersedia');
                        isValid = false;
                        return false;
                    }
                }
            });

            if (!hasData) {
                alertify.error('Pilih minimal satu barang');
                return false;
            }

            if (!isValid) {
                return false;
            }

            var formData = new FormData(this);
            $.ajax({
                type: "POST",
                url: "pages/pengembalian-barang/proses-pengembalian-barang.php?aksi=tambah-pengembalian-barang",
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