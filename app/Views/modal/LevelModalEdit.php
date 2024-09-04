<?php

function search($search, $data)
{
    foreach ($data as $item) {
        if ($item->menu == $search) {
            return 'checked';
        }
    }
    return null;
}

?>
<div class="form-group">
    <input <?= search('dashboard', $Level) ?> type="checkbox" name="menu[]" value='dashboard' />
    <label class="control-label">Dashboard</label>
    <input type="hidden" class="form-control" name="level" value="<?= $levelid ?>" />
</div>
<div class="form-group">
    <input <?= search('master', $Level) ?> type="checkbox" name="menu[]" value='master' />
    <label class="control-label">Master</label>
    <div class="sub" style="margin-left: 25px;">
        <input <?= search('agama', $Level) ?> type="checkbox" name="menu[]" value='agama' />
        <label class="control-label">Agama</label>
    </div>
    <div class="sub" style="margin-left: 25px;">
        <input <?= search('departemen', $Level) ?> type="checkbox" name="menu[]" value='departemen' />
        <label class="control-label">Departemen</label>
    </div>
    <div class="sub" style="margin-left: 25px;">
        <input <?= search('goldarah', $Level) ?> type="checkbox" name="menu[]" value='goldarah' />
        <label class="control-label">Golongan Darah</label>
    </div>
    <div class="sub" style="margin-left: 25px;">
        <input <?= search('statuskeluarga', $Level) ?> type="checkbox" name="menu[]" value='statuskeluarga' />
        <label class="control-label">Hubungan Keluarga</label>
    </div>
    <div class="sub" style="margin-left: 25px;">
        <input <?= search('jabatan', $Level) ?> type="checkbox" name="menu[]" value='jabatan' />
        <label class="control-label">Jabatan</label>
    </div>
    <div class="sub" style="margin-left: 25px;">
        <input <?= search('tingkatdidik', $Level) ?> type="checkbox" name="menu[]" value='tingkatdidik' />
        <label class="control-label"> Pendidikan</label>
    </div>
    <div class="sub" style="margin-left: 25px;">
        <input <?= search('statuspegawai', $Level) ?> type="checkbox" name="menu[]" value='statuspegawai' />
        <label class="control-label">Status Pegawai</label>
    </div>
    <div class="sub" style="margin-left: 25px;">
        <input <?= search('aktif', $Level) ?> type="checkbox" name="menu[]" value='aktif' />
        <label class="control-label">Status Aktif</label>
    </div>
</div>
<div class="form-group">
    <input <?= search('keluarga', $Level) ?> type="checkbox" name="menu[]" value='keluarga' />
    <label class="control-label">Riwayat Keluarga</label>
</div>
<div class="form-group">
    <input <?= search('pendidikan', $Level) ?> type="checkbox" name="menu[]" value='pendidikan' />
    <label class="control-label">Riwayat pendidikan</label>
</div>
<div class="form-group">
    <input <?= search('pelatihan', $Level) ?> type="checkbox" name="menu[]" value='pelatihan' />
    <label class="control-label">Riwayat Pelatihan</label>
</div>
<div class="form-group">
    <input <?= search('pegawai', $Level) ?> type="checkbox" name="menu[]" value='pegawai' />
    <label class="control-label">Pegawai</label>
    <div class="sub" style="margin-left: 25px;">
        <input <?= search('trjabatan', $Level) ?> type="checkbox" name="menu[]" value='trjabatan' />
        <label class="control-label">Riwayat Jabatan</label>
    </div>
    <div class="sub" style="margin-left: 25px;">
        <input <?= search('berkala', $Level) ?> type="checkbox" name="menu[]" value='berkala' />
        <label class="control-label">Riwayat Berkala</label>
    </div>
</div>
<div class="form-group">
    <input <?= search('kepegawaian', $Level) ?> type="checkbox" name="menu[]" value='kepegawaian' />
    <label class="control-label">Kepegawaian</label>
</div>
<div class="form-group">
    <input <?= search('laporan', $Level) ?> type="checkbox" name="menu[]" value='laporan' />
    <label class="control-label">Laporan</label>
</div>