<?php

namespace App\Models;

use CodeIgniter\Model;

class PegawaiModel extends Model
{
    protected $table = 'tpegawai';
    protected $primaryKey = 'id_pegawai';
    protected $returnType = 'object';
    protected $allowedFields = [
        'NIK',
        'Nama',
        'GelarDepan',
        'GelarBelakang',
        'username',
        'password',
        'KdKelamin',
        'TempatLahir',
        'TglLahir',
        'KdAgama',
        'KdGolDarah',
        'KdJabatan',
        'KdJabatan2',
        'KdBagian',
        'KdSeksi',
        'KdPelaksana',
        'KdGol',
        'MK',
        'KdGapok',
        'Alamat',
        'Telp',
        'HP',
        'KdKawin',
        'PKawin',
        'JPeg',
        'JIstri',
        'JAnak',
        'JTanggungan',
        'IstriDptTunjangan',
        'TPeg',
        'TIstri',
        'TAnak',
        'TJiwa',
        'JSusu',
        'KdStatusPegawai',
        'KdPendidikan',
        'NoDapenma',
        'NoJamsostek',
        'IkutJKK',
        'IkutJKM',
        'IkutJPK',
        'IkutJHT',
        'IkutJP',
        'IkutDapenma',
        'NoAskes',
        'KdAktif',
        'NPWP',
        'NoKoperasi',
        'TglMasuk',
        'MasaKerjaAwal',
        'TglPangkatTerakhir',
        'TglBerkalaTerakhir',
        'TglJabatanTerakhir',
        'TglCapeg',
        'TglPegawai',
        'TglPensiun',
        'TglBerhenti',
        'TglNikah',
        'DptAskes',
        'DptAsuransiBerobat',
        'KelasBerobat',
        'KelasAskes',
        'PHDP1',
        'PHDP2',
        'KdPTKP',
        'KdBank',
        'NoRekBank',
        'Gapok',
        'UIstri',
        'UAnak',
        'UBeras',
        'UJabatan',
        'UPerusahaan',
        'UPelaksana',
        'UPerumahan',
        'URapel',
        'UKeahlian',
        'UKemahalan',
        'UTransport',
        'ULaukPauk',
        'ULain',
        'URepresentatif',
        'UUmum',
        'USusu',
        'UPajak',
        'UPajak2',
        'UJKK',
        'UJKM',
        'UJHTBadan',
        'UJPK',
        'UJPBadan',
        'UJamsostek',
        'UDapenmaBadan',
        'UBruto',
        'UBrutoFinal',
        'UBrutoSetelahPajak',
        'PotBank',
        'PotPDAM',
        'PotAKoperasi',
        'potBKoperasi',
        'PotPKoperasi',
        'PotWKoperasi',
        'PotHutangPegawai',
        'PotDharmaWanita',
        'PotBonPakaian',
        'PotBonPDAM',
        'PotSanggar',
        'PotArisan',
        'PotKantin',
        'PotOlahraga',
        'PotAnakAsuh',
        'PotAsuransi',
        'PotDaging',
        'PotBapor',
        'PotLain',
        'PotHonor',
        'PotRekeningAir',
        'PotAbsensi',
        'PotKesejahteraan',
        'PotJKK',
        'PotJKM',
        'PotJPK',
        'PotJHTPribadi',
        'PotJPPribadi',
        'PotJPBadan',
        'PotJHTBadan',
        'PotJamsostek',
        'PotDapenmaBadan',
        'PotDapenmaPribadi',
        'PotPajak',
        'JAlpha',
        'JIzin',
        'JumlahPotongan',
        'BiayaJabatan',
        'BiayaJabatan2',
        'PTKP',
        'PTKP2',
        'PKP',
        'PKP2',
        'JumlahHasil',
        'JumlahDiterima',
        'Bulat',
        'FAktif',
        'Tabul',
        'DasarHitJamsostek',
        'Bruto1',
        'JumlahPengurangPajak',
        'NettoSebulan1',
        'NettoSetahun1',
        'Bruto2',
        'NettoSebulan2',
        'NettoSetahun2',
        'IkutPotBapor',
        'IkutPotDW',
        'IkutPotQurban',
        'Foto',
        'dok',
    ];

    // protected $dateFormat    = 'datetime';
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    public function getPegawai()
    {
        $builder = $this->db->table('tpegawai a');
        return $builder->select('a.*, b.Agama, c.Aktif, d.StatusPegawai')
            ->join('magama b', 'b.KdAgama = a.KdAgama')
            ->join('maktif c', 'c.KdAktif = a.KdAktif')
            ->join('mstatuspegawai d', 'd.KdStatusPegawai = a.KdStatusPegawai')
            ->join('mtingkatdidik e', 'e.kdtingkatdidik = a.KdPendidikan')
            ->orderBy('Nama', 'asc')
            ->limit(100)
            ->get();
    }

    public function searchPegawai($search)
    {
        $builder = $this->db->table('tpegawai a');
        return $builder->select('a.*, b.Agama, c.Aktif, d.StatusPegawai')
            ->like('nama', $search, 'both')
            ->join('magama b', 'b.KdAgama = a.KdAgama', 'left')
            ->join('maktif c', 'c.KdAktif = a.KdAktif', 'left')
            ->join('mstatuspegawai d', 'd.KdStatusPegawai = a.KdStatusPegawai', 'left')
            ->join('mtingkatdidik e', 'e.kdtingkatdidik = a.KdPendidikan', 'left')
            ->orderBy('Nama', 'asc')
            ->get();
    }

    public function getPegawaiDetail($nik)
    {
        $builder = $this->db->table('tpegawai a');
        return $builder->select('a.*, b.Agama, c.Aktif, d.StatusPegawai, e.GolDarah, g.tingkatpendidikan, h.kdgol, h.pangkat, i.NamaJabatan2, j.Bagian')
            ->join('magama b', 'b.KdAgama = a.KdAgama', 'left')
            ->join('maktif c', 'c.KdAktif = a.KdAktif', 'left')
            ->join('mstatuspegawai d', 'd.KdStatusPegawai = a.KdStatusPegawai', 'left')
            ->join('mgoldarah e', 'e.KdGolDarah = a.KdGolDarah', 'left')
            ->join('trjabatan f', 'f.NIK = a.NIK', 'left')
            ->join('mtingkatdidik g', 'g.kdtingkatdidik = a.KdPendidikan', 'left')
            ->join('mgol h', 'h.kdgol = a.KdGol', 'left')
            ->join('mbjabatan i', 'i.KdJabatan = a.KdJabatan and i.KdJabatan2 = a.KdJabatan2', 'left')
            ->join('mbagian j', 'i.KdBagian = a.KdBagian', 'left')
            ->where('a.nik', $nik)
            ->orderBy('Nama', 'asc')
            ->get();
    }

    public function getPegawaiByDepartment()
    {
        $builder = $this->db->table('tpegawai a');  // Replace with your employee table name

        $builder->select('b.Bagian, count(a.nik) as jumlahPegawai');
        $builder->join('mbagian b', 'b.KdBagian = a.KdBagian AND b.Aktif = 1', 'left');
        $builder->where('a.KdAktif', 'A01');
        $builder->groupBy('b.KdBagian');

        return $builder->get();
    }

    public function getPegawaiByPendidikan()
    {
        $builder = $this->db->table('tpegawai a');  // Replace with your employee table name
        $builder->select('b.tingkatpendidikan, count(a.nik) as jumlahPegawai');
        $builder->join('mtingkatdidik b', 'b.kdtingkatdidik = a.KdPendidikan', 'left');
        $builder->where('a.KdAktif', 'A01');
        $builder->groupBy('b.kdtingkatdidik');
        return $builder->get();
    }

    public function getPegawaiByStatus()
    {
        $builder = $this->db->table('tpegawai a');  // Replace with your employee table name

        return $builder->select('b.StatusPegawai, count(a.nik) as jumlahPegawai')
            ->join('mstatuspegawai b', 'b.KdStatusPegawai = a.KdStatusPegawai', 'left')
            ->where('a.KdAktif', 'A01')
            ->groupBy('b.KdStatusPegawai')
            ->get();
    }

    public function getPegawaiByGol()
    {
        $builder = $this->db->table('tpegawai a');

        return $builder->select('b.kdgol, count(a.nik) as jumlahPegawai')
            ->join('mgol b', 'b.kdgol = a.KdGol', 'left')
            ->where('a.KdAktif', 'A01')
            ->groupBy('b.kdgol')
            ->get();
    }

    public function getPegawaiPensiun()
    {
        $builder = $this->db->table('tpegawai a');
        return $builder->select('a.NIK , a.Nama, DATE(a.TglLahir) as tgllahir, YEAR(CURDATE()) - YEAR(a.TglLahir) as usia')
            ->where('TIMESTAMPDIFF(YEAR, DATE(a.TglLahir), CURDATE()) >=', '54')
            ->where('a.KdAktif', 'A01')
            ->get();
    }

    public function getBekalaMoreThan2()
    {
        return $this->db->query("   SELECT a.NIK, a.Nama,
                                        (SELECT TIMESTAMPDIFF(YEAR, DATE(b.TglSKBaru), CURDATE())
                                        FROM trkepangkatan b
                                        WHERE b.NIK = a.NIK
                                        ORDER BY b.id DESC
                                        LIMIT 1) AS berkala,
                                        (SELECT DATE(b.TglSKBaru)
                                        FROM trkepangkatan b
                                        WHERE b.NIK = a.NIK
                                        ORDER BY b.id DESC
                                        LIMIT 1) AS terakhirberkala
                                    FROM tpegawai a
                                    WHERE a.KdAktif = 'A01'
                                    HAVING berkala >= 2
                                    order  by terakhirberkala desc");
    }

    public function JumlahAktif()
    {
        $builder = $this->db->table('tpegawai');
        return $builder->select('NIK')->where('kdAktif', 'A01')->get()->getNumRows();
    }

    public function tes()
    {
        $this->query("select * from login where username = '1571070908960001'");
        // $this->select('username');
        // $this->where('username', '1571070908960001');
        return $this->first();
    }
}
