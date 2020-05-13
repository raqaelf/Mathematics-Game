<?php
session_start();
$a = rand(0,20);
$b = rand(0,20);
if($_SESSION['lives'] <= 0){
    echo $_SESSION['lives']; 
    header("Location: over.php");
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
                    <form action="" method="POST">
                        <div class="form-group">
                            <p class="teks text-light text-center">Hallo <?php echo $_SESSION['name']; ?>, tetap semangat ya… you can do the best!!</p>
                            <p class="teks small text-light text-center">Lives : <?php echo $_SESSION['lives']; ?> | Score : <?php echo $_SESSION['score']; ?></p>
                        </div>
                        <div class="form-group">
                            <p class="teks text-info text-center">Berapakah <?php echo $a; ?> + <?php echo $b; ?> =</label>
                            <input type="hidden" name="a" value="<?php echo $a; ?>">
                            <input type="hidden" name="b" value="<?php echo $b; ?>">
                        </div>
                        <div class="form-group">
                            <input class="form-control"  name="isi" placeholder="Masukkan Jawaban" type="number" required>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-info" name="jawab" type="submit" value="jawab!">jawab!</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
<?php 
echo $jawaban;
if($_POST['jawab']){
    if($_POST['isi'] == $_POST['a']+$_POST['b']){
        $_SESSION['score'] += 10;
        header("Location: hasil.php?result=success");
    }else{
        $_SESSION['lives'] -= 1;
        $_SESSION['score'] -= 2;
        if($_SESSION['lives'] > 0){
            header("Location: hasil.php?result=failed");
        } else {
            include("./lib/crud.php");
            $lib = new Crud();
            $insert = $lib->create('scores', array('name'=>$_SESSION[name],'score'=>$_SESSION['score']));
            header("Location: over.php");
        }
        
    }
}
?>