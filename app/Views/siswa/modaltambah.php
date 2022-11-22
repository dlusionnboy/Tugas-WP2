<!-- Modal -->
<div class="modal fade" id="modaltambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Murid</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('siswa/simpandata', ['class' => 'formsiswa']) ?>
            <div class="modal-body">
                <div class="form-group row">
                    <label for="" class="col-sm-2 form-label">No.Bp</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="nobp" name="nobp">
                        <div class="invalid-feedback errorNobp">

                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 form-label">Nama Siswa</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="nama" name="nama">
                        <div class="invalid-feedback errorNama">

                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 form-label">Tempat Lahir</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="tempat" name="tempat">
                        <div class="invalid-feedback errorTempat">

                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 form-label">Tgl. Lahir</label>
                    <div class="col-sm-5">
                        <input type="date" class="form-control" id="tgllahir" name="tgllahir">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 form-label">Jenis Kelamin</label>
                    <div class="col-sm-5">
                        <select name="jenkel" id="jenkel" class="form-control">
                            <option value="">--Pilih--</option>
                            <option value="L">Laki-Laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary btnsimpan">Simpan</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>

            <?= form_close() ?>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    $('.formsiswa').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: "post",
            url: $(this).attr('action'),
            data: $(this).serialize(),
            dataType: "json",
            beforeSend: function() {
                $('.btnsimpan').attr('disable', 'disabled')
                $('.btnsimpan').html('<i class="fa fa-spin fa-spinner"></i>');
            },
            complete: function() {
                $('.btnsimpan').removeAttr('disable');
                $('.btnsimpan').html('Simpan');
            },
            success: function(response) {
                if (response.error) {
                    if (response.error.nobp) {
                        $('#nobp').addClass('is-invalid');
                        $('.errorNobp').html(response.error.nobp);
                    } else {
                        $('#nobp').removeClass('is-invalid');
                        $('.errorNobp').html('');
                    }

                    if (response.error.nama) {
                        $('#nama').addClass('is-invalid');
                        $('.errorNama').html(response.error.nama);
                    } else {
                        $('#nama').removeClass('is-invalid');
                        $('.errorNama').html('');
                    }

                    if (response.error.tempat) {
                        $('#tempat').addClass('is-invalid');
                        $('.errorTempat').html(response.error.tempat);
                    } else {
                        $('#tempat').removeClass('is-invalid');
                        $('.errorTempat').html('');
                    }
                } else {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: response.sukses
                    })

                    $('#modaltambah').modal('hide');
                    dataSiswa();
                }
            },
            error: function(xhr, ajaxOption, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }

        })
        return false;
    });
});
</script>