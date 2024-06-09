<?php
class Pasien{
    private $koneksi; // lokasi ada di config/database.php
    private $nama_tabel = "data_pasien";

    // untuk referensi kolom yang ada di tabel pasien
    public $id;
    public $nama;
    public $umur;
    public $alamat;
    public $no_hp;

    public function __construct($db){
        $this->koneksi = $db;
    }

    public function baca_semua(){
        $sql = "SELECT * FROM $this->nama_tabel";
        $stmt = $this->koneksi->prepare($sql);
        $stmt->execute();
        return $stmt;
    }

    // kalau misalnya perlu kita baca pake id
    public function baca_id(){
        $sql = "SELECT * FROM $this->nama_tabel WHERE id = :id"; // ngambil per id
        $stmt = $this->koneksi->prepare($sql);
        $stmt->bindParam(":id", $this->id); // binding id ke parameter
        $stmt->execute();
        return $stmt;
    }

    public function hapus(){
        $sql = "DELETE FROM $this->nama_tabel WHERE id = :id"; // ngambil per id
        $stmt = $this->koneksi->prepare($sql);
        $stmt->bindParam(":id", $this->id); // binding id ke parameter
        $stmt->execute();
        return $stmt;
    }
}
