<?php 
session_start();
header("Cache-Control: no-cache, no-store, must-revalidate"); 
header("Pragma: no-cache"); 
header("Expires: 0");

if (!isset($_SESSION['logged'])) {
    header("Location: ../../index.php");
    exit();
}

include("../includes/functions.php");

if(isset($_POST['logout'])){
    logout();
    header("Location: ../../index.php");
    
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/png" href="../assets/img/favicon-32x32.png">
        <link rel="stylesheet" href="../styles/reset.css">
        <link rel="stylesheet" href="../styles/home.css">
        <title>Document</title>
    </head>
    <body>

         <?php if(isset($_SESSION['logged']) || empty(session_id())) { ?>
                 <main>
                    <div class="bloco-1">1</div>
                    <div class="bloco-2">2</div>
                    <div class="bloco-3">3</div>
                    <form action="home.php" method="post">
                        <input type="submit" name="logout" value="logout">
                    </form>
                </main>
       <?php } else{
                header("Location: ../../index.php");
       }?>

    </body>
    <script>

    // Esse evento detecta se a página veio do "fundo do baú" (cache)
    window.onpageshow = function(event) {
        if (event.persisted) {
            // Se veio do cache, força um reload real no servidor
            window.location.reload();
        }
    };
</script>

</html>