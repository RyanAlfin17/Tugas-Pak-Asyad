<?php 

include 'crud.php';

if (isset($_POST['submit'])) {
    $id = $_POST['id'];

    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $alamat = $_POST['alamat'];

    $folder = './foto/';
    $foto = $_FILES['foto']['name'];
    $source = $_FILES['foto']['tmp_name'];
    move_uploaded_file($source, $folder . $foto);

    $sql="UPDATE user SET nama='$nama', email='$email', password='$password', alamat='$alamat', foto='$foto' WHERE id='$id'";

    $hasil=mysqli_query($kon,$sql); 

    if ($hasil) {
        header('Location:index.php');
    } else {
        echo "Data gagal ditambahkan";
        echo "<a href='form_edit.php'>Kembali</a>";
    }
}

?>

