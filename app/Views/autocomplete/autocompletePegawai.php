<div class="autocomplete_parent border">
    <ul class="autocomplete" style=" max-height: 200px; overflow: auto">
        <?php
        foreach ($pegawai as $row) { ?>
            <li class="mx-2" type="button" onClick="<?= $func ?>('<?php echo $row->NIK; ?>','<?php echo $row->Nama; ?>');"><?php echo $row->Nama; ?></li>
        <?php } ?>
    </ul>
</div>