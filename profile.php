<?php
session_start();
if (!isset($_SESSION['login'])) {
    header('Location: index.php');
    exit;
}
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'tugasparsyad';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
    exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
$stmt = $con->prepare('SELECT password, email FROM user WHERE id = ?');
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($password, $email);
$stmt->fetch();
$stmt->close();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Profile Page</title>
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer">
</head>

<body class="loggedin">
    <div class="content">
        <h2>Profile Page</h2>
        <div>
            <a href="index.php"><i class="fas fa-sign-out-alt"></i>Kembali</a>
        </div>
        <div>
            <p>Your account details are below:</p>
            <table>
            <?php
        include 'crud.php';
        $data = mysqli_query($kon, "SELECT * FROM user WHERE id='$_GET[id]'");
        $fetch = mysqli_fetch_array($data);
        ?>
        <div class='form-group'>
            <label>Foto</label>
            <img src="foto/<?= $fetch['foto'] ?>" alt="<?= $fetch['nama'] ?>">
        </div>
        <div class='form-group'>
            <label>Nama</label>
            <p><?= $fetch['nama'] ?></p>
        </div>
        <div class='form-group'>
            <label>Email</label>
            <p><?= $fetch['email'] ?></p>
        </div>
        <div class='form-group'>
            <label>Password</label>
            <p><?= $fetch['password'] ?></p>
        </div>
        <div class='form-group'>
            <label>Alamat</label>
            <p><?= $fetch['alamat'] ?></p>
        </div>
            </table>
        </div>
    </div>
</body>

</html>