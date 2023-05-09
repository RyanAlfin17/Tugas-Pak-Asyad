<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Css/form.css">
</head>
<body>
    <div class="container">
        <form action="form_create.php" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-25">
                    <label>Foto</label>
                </div>
                <div class="col-75">
                    <input type="file" id="foto" name="foto" />
                </div>
            </div>
                <div class="row">
                    <div class="col-25">
                        <label>Nama</label>
                    </div>
                    <div class="col-75">
                        <input type='text' name="nama" class="form-control" placeholder='Masukkan nama' required />
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label>Email</label>
                    </div>
                    <div class="col-75">
                        <input type='text' name="email" class="form-control" placeholder='Masukkan email' required />
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label>Password</label>
                    </div>
                    <div class="col-75">
                        <input type='text' name="password" class="form-control" placeholder='Masukkan Password' required />
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label>Alamat</label>
                    </div>
                    <div class="col-75">
                        <input type='text' name="alamat" class="form-control" placeholder='Masukkan alamat' required />
                    </div>
                </div>

            <button type="submit" name="submit" >Submit</button>
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