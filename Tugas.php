
<?php

class Tugas
{
    // 5 Atribut
    protected $id;
    protected $nama;
    protected $deskripsi;
    protected $batasWaktu;
    protected $status;

    // Konstruktor
    public function __construct($id, $nama, $deskripsi, $batasWaktu, $status)
    {
        $this->id = $id;
        $this->nama = $nama;
        $this->deskripsi = $deskripsi;
        $this->batasWaktu = $batasWaktu;
        $this->status = $status;
    }

    // 4 Method
    public function tambahTugas()
    {
        return "Tugas berhasil ditambahkan";
    }

    public function lihatTugas()
    {
        return $this->nama;
    }

    public function ubahTugas($nama)
    {
        $this->nama = $nama;
    }

    public function hapusTugas()
    {
        return "Tugas berhasil dihapus";
    }
}
?>
