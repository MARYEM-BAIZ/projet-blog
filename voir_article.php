<?php   
 
 session_start();
 try {
  $basevoirarticleblog= new PDO ('mysql:host=localhost;dbname=blog;charset=utf8','root','');
} catch (exception $e) {
  echo " la connexion a échoué " ." <br>";
}   
// $_SESSION['idutilisateur']
// $_SESSION['id_article']


    if(isset($_GET['id_article']) and isset($_GET['id_utilisateur']) and isset($_POST['envoyer']) ) {
       
        $inserercomment=$basevoirarticleblog->prepare("insert into commentaire(contenu_commentaire , id_article , id_utilisateur) values(?,?,?) ");
        $assurer=$inserercomment->execute(array($_POST['commentaire'],$_GET['id_article'],$_GET['id_utilisateur']));
        var_dump($assurer);
        echo " <br>";
    }

    $affichercomment=$basevoirarticleblog->prepare(' select * from commentaire ');
    $assurer1=$affichercomment->execute(array());
    var_dump($assurer1);
    echo " <br>";

    $afficher2=$affichercomment->fetch()
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voir article</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/voir_article.css">
    <!-- <script src="ckeditor.js"></script> -->
</head>
<body>
    <section>
    
    <form action="#" method="post">
    <textarea name="commentaire" class="ckeditor"  cols="30" rows="10"></textarea>
    <input type="submit" name="envoyer" valeur="envoyer">
    </form>
              <!-- <i class="fa fa-thumbs-up fa-3x" aria-hidden="true"></i> -->
              
        <p class=""><?php echo $afficher2['id_utilisateur'] ;  ?></p>
        <p class=""><?php echo $afficher2['date_commentaire'] ;  ?></p>
        <p class=""><?php echo $afficher2['contenu_commentaire'] ;  ?></p>
        
    </section>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>