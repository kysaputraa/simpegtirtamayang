<div class="table-responsive">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th width="3%">No.</th>
                <th>No Jabatan</th>
                <th>NIK</th>
                <th>Jabatan Baru</th>
                <th>TMT</th>
                <th>No SK</th>
                <th>Tanggal SK</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($TrJabatan as $row) {
                echo "<tr>";
                echo "<td class='text-center'>" . $no . "</td>";
                echo "<td>" . $row->NoJabatan . "</td>";
                echo "<td>" . $row->NIK . "</td>";
                echo "<td>" . $row->NamaJabatan2 . "</td>";
                echo "<td>" . $row->TMT . "</td>";
                echo "<td>" . $row->NoSK . " <a href='uploads/" . $row->NIK . "/jabatan/" . $row->file . "' target='_blank' title='view'><i class='fa fa-file fa-lg'></i></a></td>";
                echo "<td>" . $row->TglSK . "</td>";
                echo "<td>" . $row->Keterangan . "</td>";
                echo "</tr>";
                $no++;
            }
            ?>
        </tbody>
    </table>
</div>