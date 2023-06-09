<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail User</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f2f2f2;
        }

        .container {
            width: 40%;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
        }

        .form-group {
            margin-bottom: 20px;
            width: 100%;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            text-transform: uppercase;
            color: #000000;
        }

        p {
            margin: 0;
            font-size: 18px;
            color: #555;
        }

        img {
            display: block;
            max-width: 100%;
            margin-bottom: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        button {
            background-color: #000000;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            text-transform: uppercase;
        }

        button:hover {
            background-color: #555;
        }
    </style>
</head>

<body>
    <div class="container">
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

        <button onclick="location.href='index.php'" type="button">Kembali</button>
    </div>
</body>

</html>