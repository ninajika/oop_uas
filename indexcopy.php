<?php
include ("Databases.php");
include ("pasien.php");


$db_konek = New Database();
$db_database = $db_konek->getKoneksi();

$query = new Pasien($db_database);
$read = $query-> baca_semua();



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage - display data</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">  

    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


    <link rel="stylesheet" href="styleindex.css">
    

</head>
<body>
    <div class="navbar">
        <div class="home">
            <p>Home</p>
        </div>

        <div class="login">
            <p>Login</p>
        </div>
        
    </div>

    <!-- <div class="imagebanner"></div> -->
    <div class="showdatacontainer">
    <div class="showdata">



<!-- Ini bagian display tabel data -->

    <div class="card-body">
    <table class="table table-bordered" style="border-radius: 5px;margin-top:5px;">
        <tr class="bg-primary">
            <td> id</td>
            <td> Nama</td>
            <td> umur</td>
            <td> alamat</td>
            <td> no hp</td>
            
            <td colspan="2">Action</td>
            
            
        </tr>

        <tr>
            <?php

            //query disini
                while ($row = $read->fetch(PDO::FETCH_ASSOC)){
                    $dataid = $row['id'];

                    $ubahdata = 'ubahdata.php?datanya='.$dataid;
                    $deletedata = 'deletedata.php?datanya='.$dataid;

            ?>
            <td><?php echo $row['id'];   ?></td>
            <td><?php echo $row['nama'];   ?></td>
            <td><?php echo $row['umur'];   ?></td>
            <td><?php echo $row['alamat'];   ?></td>
            <td><?php echo $row['no_hp'];   ?></td>
 





            <td><a href="<?php echo $ubahdata?>" class="btn btn-primary">edit</a></td>
            <td><a href="<?php echo $deletedata?>" class="btn btn-danger">delete</a></td>
            <!-- <td><button class="btn btn-danger" id="btn-del" >delete</button></td> -->

        </tr>
            <?php
                }

            

            ?>
            
        


    </table>
    </div>

    </div>
    </div>

    
</body>
</html>