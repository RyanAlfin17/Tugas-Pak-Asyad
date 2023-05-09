<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Css/form.css">
    <title>Edit</title>
</head>
<body>
    <div class="container">
        <?php 
        include 'crud.php';
        
        $data = mysqli_query($kon, "SELECT * FROM user WHERE id='$_GET[id]'");
        $fetch = mysqli_fetch_array($data);
        ?>

        <form action="update.php" method="post" enctype="multipart/form-data">
            <div class='form-group'>
                <label>Foto</label>
                <input type="file" id="foto" name="foto" value="<?= $fetch['foto'] ?>" required />
            </div>
            <div class='form-group'>
                <label>Nama</label>
                <input type='text' name="nama" class="form-control" value="<?= $fetch['nama'] ?>" required />
            </div>
            <div class='form-group'>
                <label>Email</label>
                <input type='email' name="email" class="form-control" value="<?= $fetch['email'] ?>" required />
            </div>
            <div class='form-group'>
                <label>Password</label>
                <input type='password' name="password" class="form-control" value="<?= $fetch['password'] ?>" required />
            </div>
            <div class='form-group'>
                <label>Alamat</label>
                <input type='alamat' name="alamat" class="form-control" value="<?= $fetch['alamat'] ?>" required />
            </div>

            <input type="hidden" name="id" value="<?= $fetch['id']; ?>">

            <button type="submit" name="submit">Submit</button>
        </form>
    </div>
</body>
<style>
    .container {
    font-family: 'Montserrat', sans-serif;
    width: 80%;
    margin: 0 auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
  }
  
  .form-group {
    margin-bottom: 10px;
  }
  
  label {
    display: block;
    margin-bottom: 5px;
  }
  
  input[type="text"],
  input[type="email"],
  input[type="file"],
  textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
    font-size: 16px;
    margin-bottom: 10px;
  }
  
  input[type="submit"] {
    background-color: #4CAF50;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
  }
  
</style>
</html>