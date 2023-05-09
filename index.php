<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a947a4aa54.js" crossorigin="anonymous"></script>
    <title>CRUD USER</title>
</head>
<body>
    <div class="container">
    <header>
    <nav>
        <ul>
            <a href="logout.php" style="text-decoration: none; color: inherit;">
                <i class="fa-solid fa-arrow-right-from-bracket fa-lg" style="transform: scaleX(-1);"></i>
            </a>
        </ul>
        <ul>
            <h4 style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">CRUD BASIC</h4>
        </ul>
    </nav>
    </header>
    </div>

    <?php 
        session_start();

        if(!isset($_SESSION['login'])){
            header('Location:login.php');
        }

        include "crud.php";

        if (isset($_GET['id'])) {
            $id=htmlspecialchars($_GET["id"]);
    
            $sql="delete from user where id='$id' ";
            $hasil=mysqli_query($kon,$sql);
    
            //Kondisi apakah berhasil atau tidak
                if ($hasil) {
                    header("Location:index.php");
    
                }
                else {
                    echo "<div class='alert'>
                    <span class='closebtn'>&times;</span>  
                    <strong>Data</strong> gagal dihapus!
                  </div>";
                }
            }
    ?>

        <div class="button-tambah">
            <a href="form.php">
                <button>Tambah</button>
            </a>
        </div>
        <!-- <button style="margin-top: 25px; margin-bottom: 5px"><a href="form.php">Tambah</a></button> -->
                    <table class="table">
                        <thead>
                            <tr>
                                <td>No</td>
                                <td>Foto</td>
                                <td>Nama</td>
                                <td>Email</td>
                                <td>Alamat</td>
                                <td colspan='2'>Aksi</td>
                                <?php 
                                include "crud.php";
                                $sql = "select * from user order by id asc";

                                $hasil = mysqli_query($kon,$sql);
                                $no=0;
                                while ($data = mysqli_fetch_array($hasil)) {
                                    $no++;

                                ?>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="text-align:center;"><?php echo $no;?></td>
                                <td style="text-align:center;"><img style="width: 150px;" src="foto/<?php echo $data['foto']; ?>"
                                    alt="<?php echo $data['foto'] ?>"">
                                </td>
                                <td style="text-align:center;"><?php echo $data["nama"];?></td>
                                <td style="text-align:center;"><?php echo $data["email"];?></td>
                                <td style="text-align:center;"><?php echo $data["alamat"];?></td>
                                <td style="text-align:center;">
                                    <a href="form_edit.php?id=<?php echo htmlspecialchars($data['id']); ?>">
                                        <button>Edit</button>
                                    </a>
                                    <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?id=<?php echo $data['id']; ?>">
                                        <button>Delete</button>
                                    </a>
                                </td>
                            </tr>
                        <?php
            }
            ?>
                            
                        </tbody>
                    </table>
        
</body>
<style>
.table {
    border-collapse: collapse;
    /* margin: 25px 0; */
    font-size: 18px;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    min-width: 400px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
    border-radius: 10px;
    width: 70%;
    margin-left: auto;
    margin-right: auto;
    margin-top: auto;
    top: 20%;
    overflow: hidden;
}

.table thead tr{
    background-color: #000000;
    color: #ffffff;
    text-align: center;
    border-radius: 10px;
}

.table th,
.table td {
    padding: 12px 15px;
    /* border-radius: 10px; */
}

.table tbody tr {
    border-bottom: 1px solid #dddddd;
}

.table tbody tr:nth-of-type(even) {
    background-color: #333;
}
.table tbody tr:last-of-type{
    border-bottom: 2px solid #000000;
    border-radius: 2px;
}

button {
    /* top: 10px; */
    margin-left: auto;
  margin-right: auto;
  font-family: monospace;
  font-size: 1rem;
  color: #576CBC;
  text-transform: uppercase;
  padding: 10px 20px;
  border-radius: 10px;
  border: 2px solid #000000;
  background: #fff;
  box-shadow: 3px 3px #000000;
  cursor: pointer;
  margin-top: 10px;
}
button:active {
  box-shadow: none;
  transform: translate(3px, 3px);
}

header {
    background-color: white;
    top: 0;
    left: 0;
    right: 0;
    height: 80px;
    display: flex;
    align-items: center;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
}

header * {
    display: inline;
}

header li {
    margin: 20px;
}

header li a {
    color: black;
    text-decoration: none;
}

</style>
</html>