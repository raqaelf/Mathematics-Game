<?php
session_start();
if($_SESSION['lives'] > 0){
    echo $_SESSION['lives']; 
    header("Location: soal.php");
}

include("./lib/crud.php");
$lib = new Crud();
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
                        <div class="form-group">
                            <p class="teks text-light text-center">Hello, <?php echo $_SESSION['name']; ?>… Sayang permainan sudah selesai. Semoga kali lain bisa lebih baik.</p>
                            <p class="teks small text-light text-center">Score : <?php echo $_SESSION['score']; ?></p>
                        </div>
        
                        <div class="form-group">
                            <a href="index.php" class="btn btn-info">Main Lagi</a>
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="text-center text-light" scope="col">No</th>
                                    <th class="text-center text-light" scope="col">Nama</th>
                                    <th class="text-center text-light" scope="col">Score</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                                $no=1;
                                $select = $lib->read('scores','ORDER BY score DESC LIMIT 10');
                                foreach ($select as $value){
                                    echo '<tr>';
                                    echo '<td class="text-center text-light">'.$no.'</td>';
                                    echo '<td class="text-center text-light">'.$value['name'].'</td>';
                                    echo '<td class="text-center text-light">'.$value['score'].'</td>';
                                    echo '</tr>';
                                    $no+=1;
                                }
                            ?>
                            </tbody>

                        </table>
                    <!-- =================================================================== -->
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>