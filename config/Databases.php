<?php


class Database {
    private $host = 'localhost';
    private $db_name = 'rumah_sakit_db';
    private $username = 'root';
    private $password = '';
    private $koneksi;


    public function getKoneksi(){
        $this->koneksi = null;

        try{
            $this->koneksi = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password); // for buat koneksi
            $this->koneksi->exec("set names utf8"); // for set encoding for prevent error
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }

        return $this->koneksi;
    }
}
