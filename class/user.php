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

    public function login($username, $password)
    {
        $sql = "SELECT * FROM " . $this->nama_tabel . " WHERE username = :username AND password = :password";
        $stmt = $this->koneksi->prepare($sql); // buat membuat statement


        // protect username and password from html input backtrack
        $this->username = htmlspecialchars(strip_tags($username));
        $this->password = htmlspecialchars(strip_tags($password));

        // execute username and password sql
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":password", $password);

        // execute the sql
        $stmt->execute();

        // cek hitungan data pas di eksekusi
        $num = $stmt->rowCount();

        if($num > 0)
        {
            $row = $stmt->fetch(PDO::FETCH_ASSOC); // buat ngambil data dengan metode fetch_assoc
            if($row["password"] == $password) // ini buat melakukan pengecekan password jika di dalam row password terdapat password yang sama yang ada di form maka itu true
            {
                return $row["id"];
            }
        }

        return false;

    }

}

?>
