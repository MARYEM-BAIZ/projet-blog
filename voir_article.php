<?php   
 
 session_start();
 try {
  $basevoirarticleblog= new PDO ('mysql:host=localhost;dbname=blog;charset=utf8','root','');
} catch (exception $e) {
  echo " la connexion a échoué " ." <br>";
}   
// $_SESSION['idutilisateur']
// $_SESSION['id_article']


     if (isset($_POST['quitter'])) {
        header('Location:accueil.php');
     }
     
     if (isset($_POST['revenir']) and  $_SESSION['roleutilisateur']==1) {
        header('Location:utilisateur.php');
     }
     if (isset($_POST['revenir']) and $_SESSION['roleutilisateur']==2) {
        header('Location:administrateur.php');
     }

    if(isset($_GET['id_article']) and isset($_GET['id_utilisateur']) and isset($_POST['envoyer']) ) {
       
        $inserercomment=$basevoirarticleblog->prepare("insert into commentaire(contenu_commentaire , id_article , id_utilisateur) values(?,?,?) ");
        $assurer=$inserercomment->execute(array($_POST['commentaire'],$_GET['id_article'],$_GET['id_utilisateur']));
        var_dump($assurer);
        echo " <br>";
    }

     $done=$basevoirarticleblog->prepare(' select * from articles where id_article =?');
     $done1=$done->execute(array($_GET['id_article']));

    $affichercomment=$basevoirarticleblog->prepare(' select * from commentaire where id_article =?');
    $assurer1=$affichercomment->execute(array($_GET['id_article']));
  
    echo " <br>";

    $afficher2=$affichercomment->fetch();
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
            <form class="text-center   p-5" action="#" method="post">
            <input class="btn btn-info my-4 btn-block" name="quitter" value="quitter l'article"  type="submit">
            <input class="btn btn-info my-4 btn-block" name="revenir" value="revenir à votre page"  type="submit">
            </form>
        </section>
<section class="para">
      

<?php  while ($afficher333=$done->fetch()) { ?>
              <div  class="immageaffiche" >
                  <img class="imgheight" src="<?php echo $afficher333['immage_article'] ?>" alt="immage">
              </div>
              <p> <?php echo $afficher333['date_creation_article'] ?> </p>
              <p> <?php echo $afficher333['titre_article'] ?></p>
              <p> <?php echo $afficher333['contenu_article'] ?></p>
       
         </div>
    <?php   } ?>
    

</section>
    <section>
        
    <form action="#" method="post">
    <textarea name="commentaire" class="ckeditor"  cols="30" rows="10"></textarea>
    <input type="submit" name="envoyer" valeur="envoyer">
    </form>
              <!-- <i class="fa fa-thumbs-up fa-3x" aria-hidden="true"></i> -->
              
      
        <?php   while($afficher2 = $affichercomment->fetch()) {  ?>
         
             <div class="commentaire">
             <?php   echo $_SESSION['username'] ?>
                
                <?php   echo $afficher2['date_commentaire'] ?>
               
           
           <?php   echo $afficher2['contenu_commentaire'] ?>

             </div>
        <?php   }  ?>
       
        
    </section>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>