 <?php   
 session_start();

try {
   $baseblog= new PDO ('mysql:host=localhost;dbname=blog;charset=utf8','root','');
} catch (exception $e) {
   echo " la connexion a échoué " ." <br>";
}   

  

    session_destroy();
    header('Location:accueil.php'); 
   // unset($_SESSION['idutilisateur']);
   // unset($_SESSION['roleutilisateur']);
   // var_dump( $_SESSION['immageutilisateur']);
   // var_dump( $_SESSION['roleutilisateur']);

?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
</head>
<body>
   <h1>Helo</h1>

</body>
</html> 