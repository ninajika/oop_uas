<?php
include_once '../config/Databases.php';
include_once '../class/pasien.php';

if (isset($_GET['id'])) {
    $database = new Database();
    $db = $database->getKoneksi();

    $pasien = new Pasien($db);
    $pasien->id = $_GET['id'];
    $data = $pasien->baca_id($pasien->id);

    if ($data) {
        $id = $data['id'];
        $nama = $data['nama'];
        $umur = $data['umur'];
        $alamat = $data['alamat'];
        $no_hp = $data['no_hp'];
    } else {
        echo "Data tidak ditemukan.";
        exit;
    }
}
?>

<form action="../public/update_pasien.php?id=<?php echo $pasien->id; ?>" method="post">
    <input type="hidden" name="id" value="<?php echo $pasien->id; ?>">
    <div class="form-group">
        <label for="Nama">Nama</label>
        <input type="text" class="form-control" id="nama" placeholder="Masukan Nama Anda" name="nama" value="<?php echo htmlspecialchars($nama); ?>">
    </div>
    <div class="form-group">
        <label for="umur">Umur</label>
        <input type="number" name="umur" id="umur" class="form-control" placeholder="Masukan Umur Anda" value="<?php echo htmlspecialchars($umur); ?>">
    </div>
    <div class="form-group">
        <label for="alamat">Alamat</label>
        <textarea class="form-control" id="alamat" placeholder="Masukan Alamat Anda" name="alamat"><?php echo htmlspecialchars($alamat); ?></textarea>
    </div>
    <div class="form-group">
        <label for="no_hp">Nomor Hp</label>
        <input type="number" class="form-control" id="no_hp" placeholder="Masukan Nomor Telepon Anda" name="no_hp" value="<?php echo htmlspecialchars($no_hp); ?>">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
