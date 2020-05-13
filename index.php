<?php
session_start();
if($_GET['mode']=='new'){
    session_unset();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mathemathics Game!</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/main.css">
</head>
<body class="bg-dark">
    <div class="container vh-100">
        <div class="row flexbox-container">
            <div class="col">
                <div class="box">
                    <!-- =================================================================== -->
                    <?php 
                    if(!isset($_SESSION['email'])){
                    ?>
                    <!-- =================================================================== -->
                    <form method="POST">
                        <div class="form-group">
                            <input class="form-control"  name="name" placeholder="Masukkan Nama" type="text" required>
                        </div>
                        <div class="form-group">
                            <input class="form-control" name="email" placeholder="Masukkan Email" type="email" required>
                        </div>
                        <div class="form-group">
                            <input id="start" class="btn btn-info" name="start" type="submit" value="START!">
                        </div>
                    </form>
                    <!-- =================================================================== -->
                    <?php
                    } else {
                    ?>
                    <!-- =================================================================== -->
                    <form method="POST">
                        <div class="form-group">
                            <p class="teks text-light text-center" >Hallo <?php echo $_SESSION['name'] ?> , selamat datang kembali di permainan ini!!!</p>
                            <p class="teks small text-light text-center" >Bukan anda? <a class="primary" href="?mode=new">(klik di sini)</a></p>
                        </div>
                        <div class="form-group">
                            <input id="start" class="btn btn-info" name="start" type="submit" value="START!">
                        </div>
                    </form>
                    <!-- =================================================================== -->
                    <?php
                    }
                    ?>
                    <!-- =================================================================== -->
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
<?php

if(isset($_POST['start'])){
    if(!isset($_SESSION['email'])){
        $_SESSION['name'] = $_POST['name'];
        $_SESSION['email'] = $_POST['email'];
    }
    $_SESSION['lives'] = 5;
    $_SESSION['score'] = 0;
    header('Location: soal.php');
}
?>

