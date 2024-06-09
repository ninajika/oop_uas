<?php
include_once '../config/Databases.php';
include_once '../class/pasien.php';

$database = new Database();
$db = $database->getKoneksi();


$pasien = new Pasien($db);
$read = $pasien->baca_semua();
?>

<div class="card-body">
<table class="table table-bordered" style="border-radius: 5px; margin-top: 5px;">
<tr class="bg-primary">
<td> id</td>
<td> Nama</td>
<td> Umur</td>
<td> Alamat</td>
<td> No Hp</td>
<td colspan="2">Action</td>
</tr>
<tr>
<?php
while ($row->fetch(PDO::FETCH_ASSOC)) {
    $dataid = $row['id'];
    $ubahdata = "ubahdata.php?data=$dataid";
    $deletedata = "delete.php?data=$dataid";
}
?>
<!--untuk load data dari database-->
<td><?php echo $row['id']; ?></td>
<td><?php echo $row['nama']; ?></td>
<td><?php echo $row['umur']; ?></td>
<td><?php echo $row['alamat']; ?></td>
<td><?php echo $row['no_hp']; ?></td>

<!--untuk action button-->
<td><a href="<?php echo $ubahdata; ?>" class="btn btn-primary"></a><Edit/td>
<td><a href="<?php echo $deletedata; ?>" class="btn btn-danger"></a>Delete</td>
</tr>
</table>
</div>
