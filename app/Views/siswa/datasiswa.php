<table class="table table-sm table-striped" id="datasiswa">
    <thead>
        <tr>
            <th>No</th>
            <th>No.Bp</th>
            <th>Nama Siswa</th>
            <th>Tempat Lahir</th>
            <th>Tgl.Lahir</th>
            <th>Jenis Kelamin</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>
        <?php $nomor=0; foreach($tampildata as $row):
                        $nomor++; ?>
        <tr>
            <td><?= $nomor ?></td>
            <td><?= $row['nobp'] ?></td>
            <td><?= $row['nama'] ?></td>
            <td><?= $row['tmplahir'] ?></td>
            <td><?= $row['tgllahir'] ?></td>
            <td><?= $row['jenkel'] ?></td>
            <td>

            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<script>
$(document).ready(function() {
    $('#datasiswa').DataTable();
})
</script>