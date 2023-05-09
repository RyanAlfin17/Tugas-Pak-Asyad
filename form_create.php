<?php 
        //untuk koneksikan ke database
        include "crud.php";

        if(isset($_POST['submit'])){
            
            $nama = $_POST['nama'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $alamat = $_POST['alamat'];

            $folder = './foto/';
            $foto = $_FILES['foto']['name'];
            $source = $_FILES['foto']['tmp_name'];
            move_uploaded_file($source, $folder . $foto);
        
            $sql = "INSERT INTO user (nama,email,password,alamat,foto) VALUES ('$nama', '$email', '$password', '$alamat', '$foto')";

            $hasil = mysqli_query($kon,$sql);
        
            if ($hasil) {
                header('Location:index.php');
            } else {
                echo "Data gagal ditambahkan";
                echo "<a href='form.php'>Kembali</a>";
            }
        }
?>