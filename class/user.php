<?php

class User
{
    private $koneksi; // membuat variable koneksi
    private $nama_tabel = "login"; // membuat variable nama_tabel yang befungsi menghubungkan tabel login

    public $id;
    public $username;
    public $password;

    public function __construct($db)
    {
        $this->koneksi = $db; // buat ngambil deklarasi database
    }

    public function login()
    {
        $sql = "SELECT * FROM " . $this->nama_tabel . " WHERE username = :username AND password = :password";
        $stmt = $this->koneksi->prepare($sql); // buat membuat statement


        // protect username and password from html input backtrack
        $this->username = htmlspecialchars(strip_tags($this->username));
        $this->password = htmlspecialchars(strip_tags($this->password));

        // execute username and password sql
        $stmt->bindParam(":username", $this->username);
        $stmt->bindParam(":password", $this->password);

        // execute the sql
        $stmt->execute();

        // cek hitungan data pas di eksekusi
        $num = $stmt->rowCount();

        if($num > 0)
        {
            $row = $stmt->fetch(PDO::FETCH_ASSOC); // buat ngambil data dengan metode fetch_assoc
            if($row["password"] == $this->password) // ini buat melakukan pengecekan password jika di dalam row password terdapat password yang sama yang ada di form maka itu true
            {
                return $row["username"];
            }
        }

        return false;

    }

    public function cek_login(){

        $sql = "SELECT * FROM " . $this->nama_tabel . " WHERE username = :username ";
        $stmt = $this->koneksi->prepare($sql); // buat membuat statement


        // protect username and password from html input backtrack
        $this->username = htmlspecialchars(strip_tags($this->username));
        // $this->password = htmlspecialchars(strip_tags($this->password));

        // execute username and password sql
        $stmt->bindParam(":username", $this->username);
        // $stmt->bindParam(":password", $this->password);

        // execute the sql
        $stmt->execute();

        // cek hitungan data pas di eksekusi
        $num = $stmt->rowCount();

        if($num > 0)
        {
            $row = $stmt->fetch(PDO::FETCH_ASSOC); // buat ngambil data dengan metode fetch_assoc
            if($row["username"] == $this->username) // ini buat melakukan pengecekan password jika di dalam row password terdapat password yang sama yang ada di form maka itu true
            {
                return $row["username"];
            }
        }

        return false;


    }

}

?>
