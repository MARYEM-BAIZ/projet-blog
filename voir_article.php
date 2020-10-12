<?php   
 
 session_start();
 try {
  $basevoirarticleblog= new PDO ('mysql:host=localhost;dbname=blog;charset=utf8','root','');
} catch (exception $e) {
  echo " la connexion a échoué " ." <br>";
}   
// $_SESSION['idutilisateur']
// $_SESSION['id_article']


    if(isset($_GET['id_article']) and isset($_SESSION['idutilisateur']) and isset($_POST['envoyer']) ) {
       
        $inserercomment=$basevoirarticleblog->prepare("insert into commentaire(contenu_commentaire , id_article , id_utilisateur) values(?,?,?) ");
        $assurer=$inserercomment->execute(array($_POST['commentaire'],$_GET['id_article'],$_SESSION['idutilisateur']));
        // var_dump($assurer);
        // echo " <br>";
    }

     $done=$basevoirarticleblog->prepare(' select * from articles where id_article =?');
     $done1=$done->execute(array($_GET['id_article']));

    $affichercomment=$basevoirarticleblog->prepare(' select * from commentaire where id_article =?');
    $assurer1=$affichercomment->execute(array($_GET['id_article']));
  
    echo " <br>";

    $afficher2=$affichercomment->fetch();


    // $requette2 = $basevoirarticleblog->prepare(" select utilisateur.username_utilisateur, commentaire.contenu_commentaire ,commentaire.date_commentaire from utilisateur , commentaire, articles where  articles.id_article = commentaire.id_article and commentaire.id_utilisateur = utilisateur.id_utilisateur");
    // $requette2->execute(array($_GET['id_article']));

    $requette2 = $basevoirarticleblog->prepare("select utilisateur.username_utilisateur, commentaire.contenu_commentaire  ,commentaire.date_commentaire from utilisateur , commentaire, articles where commentaire.id_article = ?  and commentaire.id_utilisateur = utilisateur.id_utilisateur and articles.id_article = commentaire.id_article");
    $requette2->execute(array($_GET['id_article']));
   
    
        if (isset($_POST['liker']) and isset($_SESSION['idutilisateur']) and isset($_GET['id_article']) ) {
          
          $liker=$basevoirarticleblog->prepare(' insert into likes(id_article,id_utilisateur) values(?,?)');
          $liker1=$liker->execute(array($_GET['id_article'],$_SESSION['idutilisateur']));
        
         
          // var_dump($liker1);
        }
        

        $requette = $basevoirarticleblog->prepare("SELECT count(id_like) as nbr_like FROM likes where id_article= ? "); 
        $requette ->execute(array($_GET['id_article'])) ;
        $re=$requette->fetch();

        $requette3=$basevoirarticleblog->prepare( ' SELECT count(id_commentaire) as nbr_commentaire from commentaire where id_article= ?');
        $req=$requette3->execute(array($_GET['id_article']));
        $requet=$requette3->fetch();
      // var_dump($re);
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

<header>
<div class="pl-3 pt-3 pb-3">
<a href="accueil.php"><img  class="immageheader" src="immages/logo-blog.png" alt="immage"></a>
</div>

<nav class="navbar navbar-expand-lg navbar-light bg-light mb-5">
                <!-- <a class="navbar-brand" href="#">Navbar</a> -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                    
                    <li class="nav-item">
                        <a class="nav-link ml-3 mr-5 h5" href="accueil.php">Accueil</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link mr-5 dropdown-toggle h5" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Catégories
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item h5" href="bien_etre.php">Bien etre </a>
                        <a class="dropdown-item h5" href="cheuveux.php">Cheveux</a>
                        <a class="dropdown-item h5" href="maquillage.php">Maquillage</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link h5" href="contact_us.php">Contact Us</a>
                    </li>
                    </ul>
                    
                </div>
              
             
                
           
            <?php    if (!isset($_SESSION['idutilisateur'])) {  ?>
               <div class="">
               <form class="" action="seconnecter.php" method="post">
       <!-- <button type="button" name="seconnecter" class="btn btn-primary ">Se connecter</button> -->
       <input type="submit" name="seconnecter" value="Se Connecter" class="btn mr-4 text-muted font-weight-bold  btn-outline-info h4 ">
       </form>
               </div>

               <div class="">
               <form class=" " action="inscrire.php" method="post" enctype="multipart/form-data">
       <!-- <button type="button" name="inscrire" class="btn btn-primary ">S'inscrire</button> -->
        <input type="submit" class=" btn mr-4 text-muted font-weight-bold btn-outline-info h4 " name="inscrire" value="S'inscrire" >
       </form>
               </div>
               <?php  }  ?>
               <?php    if (isset($_SESSION['idutilisateur'])) {  ?>
                <ul class="navbar-nav ml-auto nav-flex-icons">
                <li class="nav-item">
                     <p style="color:gray" class="mr-3 mt-4 h5"> <?php  echo $_SESSION['username'] ?> </p>
                    </li>
      <li class="nav-item avatar">
        <a class="nav-link p-0" href=" <?php   if($_SESSION['roleutilisateur'] == 1) { echo "utilisateur.php"; }else { echo "administrateur.php"; }  ?>">
          <img style=" width: 60px; height: 60px; border: none; border-radius: 70px;" name="image" src="   <?php echo     $_SESSION['immageutilisateur'] ?>" alt="immage" 
            alt="avatar image" height="35">
        </a>
      </li>
    </ul> 
                <?php  }  ?>

    </nav>

</header>
       <main class="bg-white">
  
<section class=" px-5 pt-5 pb-2">
      

<?php  while ($afficher333=$done->fetch()) { ?>
              <div class="mb-4">
                  <img style="width: 100% ; height:250px ;border: none ; display:block ; margin-left:auto ;margin-right:auto  "  src="<?php echo $afficher333['immage_article'] ?>" alt="immage">
              </div>
              <p class="pull-right mt-3 mr-4"> <?php   echo $re['nbr_like'] ." likes";     ?></p>
              <form class="pull-right mr-2" action="#" method="post">
                <!-- <input type="submit" name="liker" value="liker"> -->
                <button style="border:none ; background-color:white" type="submit" name="liker" ><i class="fa fa-thumbs-up fa-3x " aria-hidden="true"></i></button>
              </form>
              <!-- <div class="pull-right mr-4">
              <button name="liker" type="button" style="border:none ; background-color:white"><i class="fa fa-thumbs-up fa-3x " aria-hidden="true"></i> </button>
              </div> -->
              <br><br>
              <p ><strong>Date de publication :</strong> <?php echo $afficher333['date_creation_article'] ?>   </p>
              <hr>
              <p ><strong>titre :</strong> <?php echo $afficher333['titre_article'] ?></p>
              <hr>
              <p  > <?php echo $afficher333['contenu_article'] ?></p>
       
         </div>
    <?php   } ?>
    

</section>
    <section class="  mb-5 px-5 pb-5">
        <p class="h4 text-muted">Commentaires : ( <?php  echo $requet['nbr_commentaire'] ." )";     ?></p>
    <form action="#" method="post">
    <textarea style="display:block" name="commentaire" class="ckeditor p-3 "  cols="15" rows="5"></textarea>
    <input class="btn btn-info text-muted my-4" type="submit" name="envoyer" value="Commenter">
    <!-- <input type="submit" name="envoyer" valeur="envoyer"> -->
    </form>
           
              
      
      <div class="mt-3 ">
      <?php   while($requette22 = $requette2->fetch()  ) {  ?>
         
         <div class="commentaire">
        <h5> <small><?php   echo $requette22['username_utilisateur']  ?></small></h5>
            
            <h6><small>(<?php   echo $requette22['date_commentaire'] ?>)</small></h6>
           
       
       <p ><strong><?php   echo $requette22['contenu_commentaire'] ?></strong></p>
       <hr>

         </div>
    <?php   }  ?>
      </div>
       
        
    </section>
       </main>

       <footer>

<div class="container">
<div class="row">


<div class="col-md-2 ">

</div>

  <div class="col-md-6 ">
  <article class="article1 ">
<a class=" h4"  href="contact_us.php">Contact Us </a>
</article>
  </div>

  <div class="col-md-4 ">
  <article class="article2">
<p class="h4">Follow us </p>
<div class="  ">
<a href=""><i class="fa fa-instagram text-info fa-2x" aria-hidden="true"></i></a>
<a href=""><i class="fa fa-facebook-square text-info fa-2x" aria-hidden="true"></i></a>
<a href=""> <i class="fa fa-twitter-square text-info fa-2x" aria-hidden="true"></i></a>
<a href=""><i class="fa fa-linkedin-square text-info fa-2x" aria-hidden="true"></i></a>
</div>
  </div>


</div>
</div>


</article>
</footer> 
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>