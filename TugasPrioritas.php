
<?php

require_once 'Tugas.php';

class TugasPrioritas extends Tugas
{
    // 5 Atribut tambahan
    private $tingkatPrioritas;
    private $kategori;
    private $pengingat;
    private $pembuat;
    private $penting;

    // Konstruktor
    public function __construct(
        $id, $nama, $deskripsi, $batasWaktu, $status,
        $tingkatPrioritas, $kategori, $pengingat, $pembuat, $penting
    ) {
        parent::__construct(
            $id, $nama, $deskripsi, $batasWaktu, $status
        );

        $this->tingkatPrioritas = $tingkatPrioritas;
        $this->kategori = $kategori;
        $this->pengingat = $pengingat;
        $this->pembuat = $pembuat;
        $this->penting = $penting;
    }

    // 4 Method
    public function aturPrioritas($prioritas)
    {
        $this->tingkatPrioritas = $prioritas;
    }

    public function aturKategori($kategori)
    {
        $this->kategori = $kategori;
    }

    public function aturPengingat($pengingat)
    {
        $this->pengingat = $pengingat;
    }

    public function tampilkanDetail()
    {
        return "Prioritas: " . $this->tingkatPrioritas .
               "<br>Kategori: " . $this->kategori .
               "<br>Pengingat: " . $this->pengingat .
               "<br>Pembuat: " . $this->pembuat .
               "<br>Penting: " . $this->penting;
    }
}
?>
