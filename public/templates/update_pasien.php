<form action="update_pasien.php" method="post">
<form action="update_pasien.php?id=<?php echo $_GET['id'] ?>" method="get">
<div class="form-group">
<label for="Nama">Nama</label>
<input type="text" class="form-control" id="nama" placeholder="Masukan Nama Anda" name="nama" value="<?php echo $_GET['nama'] ?>">
</div>
<div class="form-group">
<label for="umur">Umur</label>
<input type="number" name="umur" id="umur" class="form-control" placeholder="Masukan Umur Anda" value="<?php echo $_GET['umur'] ?>">
</div>
<div class="form-group">
<label for="alamat">Alamat</label>
<textarea class="form-control" id="alamat" placeholder="Masukan Alamat Anda" name="alamat"><?php echo $_GET['alamat'] ?></textarea>
</div>
<div class="form-group">
<label for="no_hp">Nomor Hp</label>
<input type="number" class="form-control" id="no_hp" placeholder="Masukan Nomor Telepon Anda" name="no_hp" value="<?php echo $_GET['no_hp'] ?>">
</div>
<button type="submit" class="btn btn-primary">Submit</button>
</form>
