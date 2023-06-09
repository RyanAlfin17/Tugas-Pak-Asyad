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
                        <li>
                            <a href="logout.php" style="text-decoration: none; color: white;">
                                <i class="fa-solid fa-arrow-right-from-bracket fa-lg" style="transform: scaleX(-1);"></i>
                            </a>
                        </li>
                        <li>
                            <a href="detail.php" style="text-decoration: none; color: white; ">
                                <i class="fa-solid fa-user fa-lg"></i>
                            </a>
                        </li>
                    </ul>
                    <h4 style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">CRUD BASIC</h4>
                </nav>
            </header>
        </div>

        <?php
        session_start();

        if (!isset($_SESSION['login'])) {
            header('Location:login.php');
        }

        include "crud.php";

        if (isset($_GET['id'])) {
            $id = htmlspecialchars($_GET["id"]);

            $sql = "delete from user where id='$id' ";
            $hasil = mysqli_query($kon, $sql);

            //Kondisi apakah berhasil atau tidak
            if ($hasil) {
                header("Location:index.php");
            } else {
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

                    $hasil = mysqli_query($kon, $sql);
                    $no = 0;
                    while ($data = mysqli_fetch_array($hasil)) {
                        $no++;

                    ?>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="text-align:center;"><?php echo $no; ?></td>
                    <td style="text-align:center;"><img style="width: 150px; border-radius:10px;" src="foto/<?php echo $data['foto']; ?>" alt="<?php echo $data['foto'] ?>">
                    </td>
                    <td style=" text-align:center;  "><?php echo $data["nama"]; ?></td>
                    <td style="text-align:center;"><?php echo $data["email"]; ?></td>
                    <td style="text-align:center;"><?php echo $data["alamat"]; ?></td>
                    <td style="text-align:center;">
                        <a href="form_edit.php?id=<?php echo htmlspecialchars($data['id']); ?>">
                            <button>Edit</button>
                        </a>
                        <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?id=<?php echo $data['id']; ?>">
                            <button>Delete</button>
                        </a>
                        <!-- Trigger/Open The Modal -->
                        <a href="detail.php?id=<?php echo htmlspecialchars($data['id']); ?>">
                            <button>Detail</button>
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
        /* Navbar styling */
        * {
            font-family: 'Montserrat', sans-serif;
            text-decoration: none;
        }

        nav {
            background-color: #292929;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
        }

        nav ul {
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            list-style: none;
        }

        nav ul li {
            margin-right: 10px;
        }

        nav ul li a {
            color: #fff;
            text-decoration: none;
        }

        nav ul li i {
            color: #fff;
        }

        nav ul li:hover i {
            color: #888;
        }

        nav h4 {
            margin: 0;
            font-size: 1.5rem;
            color: #fff;
        }

        /* Table styling */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        thead {
            background-color: #292929;
            color: #fff;
        }

        thead td {
            font-weight: bold;
            padding: 10px;
            text-align: center;
        }

        tbody td {
            padding: 10px;
            text-align: center;
        }

        tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tbody tr:hover {
            background-color: #ddd;
        }

        .button-tambah {
            margin-top: 20px;
            text-align: right;
        }

        button {
            background-color: #292929;
            border: none;
            color: #fff;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin-right: 10px;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        button:hover {
            background-color: #888;
        }

        .alert {
            padding: 20px;
            background-color: #f44336;
            color: white;
            margin-bottom: 15px;
            position: relative;
        }

        .closebtn {
            position: absolute;
            right: 0;
            top: 0;
            padding: 12px 16px;
            cursor: pointer;
        }

        .closebtn:hover {
            background-color: #ccc;
            color: black;
        }

        /* The Modal (background) */
        .modal {
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Stay in place */
            z-index: 1;
            /* Sit on top */
            left: 0;
            top: 0;
            width: 100%;
            /* Full width */
            height: 100%;
            /* Full height */
            overflow: auto;
            /* Enable scroll if needed */
            background-color: rgb(0, 0, 0);
            /* Fallback color */
            background-color: rgba(0, 0, 0, 0.4);
            /* Black w/ opacity */
        }

        /* Modal Content/Box */
        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            /* 15% from the top and centered */
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            /* Could be more or less, depending on screen size */
        }

        /* The Close Button */
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        nav {
            background-color: #292929;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
        }

        nav ul {
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            list-style: none;
        }

        nav ul li {
            margin-right: 10px;
        }

        nav ul li a {
            color: #fff;
            text-decoration: none;
        }

        nav ul li i {
            color: #fff;
        }

        nav ul li:hover i {
            color: #888;
        }

        nav h4 {
            margin: 0;
            font-size: 1.5rem;
            color: #fff;
            margin-left: 10px;
        }
    </style>

    </html>