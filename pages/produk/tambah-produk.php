<form id="tambah-produk" enctype="multipart/form-data">
    <div class="d-grid gap-3 " id="produk-rows">
        <div class="row produk-row">
            <div class="col-md-3">
                <label for="nama_produk" class="form-label">Nama Produk</label>
                <input type="text" class="form-control" name="nama_produk[]" placeholder="Nama Produk">
            </div>
            <div class="col-md-2">
                <label for="satuan" class="form-label">Satuan</label>
                <input type="text" class="form-control" name="satuan[]" placeholder="Satuan">
            </div>
            <div class="col-md-3">
                <label for="harga_beli" class="form-label">Harga Beli</label>
                <input type="text" class="form-control harga harga-beli" name="harga_beli[]" placeholder="Harga Beli">
            </div>
            <div class="col-md-3">
                <label for="harga_jual" class="form-label">Harga Jual</label>
                <input type="text" class="form-control harga harga-jual" name="harga_jual[]" placeholder="Harga Jual">
            </div>
            <div class="col-md-1 d-flex align-items-end">
                <button type="button" class="btn btn-danger btn-remove-row">-</button>
            </div>
        </div>
    </div>
    <button type="button" class="btn btn-success mt-3" id="add-row">Tambah Baris</button>
    <button type="submit" class="btn btn-primary mt-3">Simpan</button>
</form>
<script>
    var barangRowHtml = `
    <div class="row produk-row">
        <div class="col-md-3">
            <label class="form-label">Nama Produk</label>
            <input type="text" class="form-control" name="nama_produk[]" placeholder="Nama Produk">
        </div>
        <div class="col-md-2">
            <label class="form-label">Satuan</label>
            <input type="text" class="form-control" name="satuan[]" placeholder="Satuan">
        </div>
        <div class="col-md-3">
            <label class="form-label">Harga Beli</label>
            <input type="text" class="form-control harga harga-beli" name="harga_beli[]" placeholder="Harga Beli">
        </div>
        <div class="col-md-3">
            <label class="form-label">Harga Jual</label>
            <input type="text" class="form-control harga harga-jual" name="harga_jual[]" placeholder="Harga Jual">
        </div>
        <div class="col-md-1 d-flex align-items-end">
            <button type="button" class="btn btn-danger btn-remove-row">-</button>
        </div>
    </div>
    `;

    function formatRupiah(el) {
        var $el = $(el);
        var value = $el.val() || "";
        var onlyDigits = value.replace(/[^\d]/g, "");
        if (onlyDigits === "") {
            $el.val("");
            return;
        }
        var formatted = "Rp. " + onlyDigits.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.");
        $el.val(formatted);
    }

    function updateRemoveButtons() {
        var rows = $('#produk-rows .produk-row').length;
        if (rows === 1) {
            $('#produk-rows .produk-row .btn-remove-row').hide();
        } else {
            $('#produk-rows .produk-row .btn-remove-row').show();
        }
    }

    $('#add-row').click(function () {
        $('#produk-rows').append(barangRowHtml);
        updateRemoveButtons();
    });

    $('#produk-rows').on('click', '.btn-remove-row', function () {
        $(this).closest('.produk-row').remove();
        updateRemoveButtons();
    });

    $('#produk-rows').on('input keyup', '.harga', function () {
        formatRupiah(this);
    });

    $(document).ready(function () {
        updateRemoveButtons();
        $('#produk-rows .harga').each(function () {
            formatRupiah(this);
        });
    });

    $("#tambah-produk").submit(function (e) {
        e.preventDefault();
        $('#produk-rows .harga').each(function () {
            var raw = $(this).val().replace(/[^\d]/g, "");
            $(this).val(raw);
        });

        var formData = new FormData(this);
        $.ajax({
            type: "POST",
            url: "pages/produk/proses-produk.php?aksi=tambah-produk",
            data: formData,
            contentType: false,
            processData: false,
            success: function (data) {
                if (data == "ok") {
                    loadTable();
                    $('.modal').modal('hide');
                    alertify.success('Produk Berhasil Ditambah');
                } else {
                    alertify.error('Produk Gagal Ditambah');
                }
            }
        });
    });
</script>