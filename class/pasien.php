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

    public function perbarui(){
        $sql = "UPDATE $this->nama_tabel SET nama = :nama, umur = :umur, alamat = :alamat, no_hp = :no_hp WHERE id = :id";
        $stmt = $this->koneksi->prepare($sql);
        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":nama", $this->nama);
        $stmt->bindParam(":umur", $this->umur);
        $stmt->bindParam(":alamat", $this->alamat);
        $stmt->bindParam(":no_hp", $this->no_hp);
        $stmt->execute();
        return $stmt;
    }

    public function tambah(){
        $sql = "INSERT INTO $this->nama_tabel (id, nama, umur, alamat, no_hp) VALUES ('', :nama, :umur, :alamat, :no_hp)";
        $stmt = $this->koneksi->prepare($sql);

        // start binding
        $stmt->bindParam(":nama", $this->nama);
        $stmt->bindParam(":umur", $this->umur);
        $stmt->bindParam(":alamat", $this->alamat);
        $stmt->bindParam(":no_hp", $this->no_hp);
        $stmt->execute();
        return $stmt;

    }
}
