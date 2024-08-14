<div class="table-responsive">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th width="3%">No.</th>
                <th>Jenis</th>
                <th>Golongan</th>
                <th>No SK</th>
                <th>Tanggal</th>
                <th>TMT</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($berkala as $row) {
                echo "<tr>";
                echo "<td>" . $no . "</td>";
                echo "<td></td>";
                echo "<td>" . $row->KdGolBaru . "</td>";
                echo "<td>" . $row->NoSKBaru . "</td>";
                echo "<td>" . $row->TglSKBaru . "</td>";
                echo "<td>" . $row->TMTBaru . "</td>";
                echo "</tr>";
                $no++;
            }
            ?>
        </tbody>
    </table>
</div>