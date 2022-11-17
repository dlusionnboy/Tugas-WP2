<?= $this->extend('layout/main') ?>
<?= $this->extend('layout/menu') ?>
<?= $this->section('isi') ?>

<!-- DataTables -->
<link href="<?= base_url() ?>/assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet"
    type="text/css" />
<link href="<?= base_url() ?>/assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<!-- CSS only -->
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous"> -->
<script src="<?= base_url() ?>/assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>/assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>

<div class="col-sm-12">
    <div class="page-title-box">
        <h4 class="page-title">Data Siswa</h4>
    </div>
</div>

<div class="col-sm-12">
    <div class="card m-b-30">
        <div class="card-body">

            <div class="card-title">
                <button type="button" class="btn btn-primary waves-effect waves-light btn-sm tomboltambah">
                    Tambah Data
                </button>
            </div>

            <p class="card-text viewdata">

            </p>
        </div>
    </div>
</div>
<div class="viewmodal" style="display: none;"></div>
<script>
function dataSiswa() {
    $.ajax({
        url: "<?= site_url('siswa/ambildata') ?>",
        dataType: "json",
        success: function(response) {
            $('.viewdata').html(response.data)
        },
        error: function(xhr, ajaxOption, thrownError) {
            alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
        }
    });
}
$(document).ready(function() {
    dataSiswa();

    $('.tomboltambah').click(function(e) {
        e.preventDefault();
        $.ajax({
            url: "<?= site_url('siswa/formtambah') ?>",
            dataType: "json",
            success: function(response) {
                $('.viewmodal').html(response.data).show();

                $('#modaltambah').modal('show');
            },
            error: function(xhr, ajaxOption, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
    });
});
</script>
<?= $this->endSection('isi') ?>