<?php 
session_start();
              
try {
  $baseadminblog= new PDO ('mysql:host=localhost;dbname=blog;charset=utf8','root','');
} catch (exception $e) {
  echo " la connexion a échoué " ." <br>";
}   
 


        $select=$baseadminblog->prepare(' select * from signaler  ');
        $select->execute(array());


  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>page (signal)</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  
    <link rel="stylesheet" type="text/css" href="css/signal.css">
</head>
<body>
<header>
<div class="pl-3 pt-3 pb-3">
<a href="accueil.php"><img  class="immageheader" src="immages/logo-blog.png" alt="immage"></a>
</div>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <!-- <a class="navbar-brand" href="#">Navbar</a> -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
     
      <li class="nav-item">
        <a class="nav-link ml-3 h5 mr-5" href="accueil.php">Accueil</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link h5 mr-5 dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Espace Administrateur 
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item h5" href="liste_utilisateurs.php">Liste des utilisateurs</a>
          <a class="dropdown-item h5" href="message_contact_us.php">Messages (Contact Us)</a>
          <a class="dropdown-item h5" href="mes_articles_admin.php">Liste des articles</a>
          <a class="dropdown-item h5" href="ajout_article.php">Ajouter un article</a>
          <a class="dropdown-item h5" href="signal.php">signal</a>
          <!-- <a class="dropdown-item" href="deconnexion.php">Déconnexion</a> -->
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link mr-5 h5 dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          profil
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item h5" href="profil_admin.php">Voir profil</a>
          <a class="dropdown-item h5" href="deconnexion.php">Déconnexion</a>
        </div>
      </li>
      
    </ul>
    
  </div>
 <ul class="navbar-nav ml-auto nav-flex-icons">
 <li class="nav-item">
                     <p style="color:gray" class="mr-3 mt-4 h5"> <?php  echo $_SESSION['username'] ?> </p>
                    </li>
      <li class="nav-item avatar">
        <a class="nav-link p-0" href="#">
        <!-- <p> je dois metre ici l'immage du admin</p> -->
           <!-- <p> je dois metre ici l'immage du admin</p> -->
              <!-- <p> je dois metre ici l'immage du admin</p> -->
          <img style=" width: 60px; height: 60px; border: none; border-radius: 70px;" src="   <?php echo  $_SESSION['immageutilisateur'] ?>" alt="immage" 
            alt="avatar image" height="35">
        </a>
      </li>
    </ul> 
</nav>
    
  
    </header>
    <main class="bg_white">
       

    <section class="  mt-5  mb-5 p-5">
          <table>
            <th class=" border border-muted p-2" >id_article_signalé</th>
            <th class=" border border-muted p-2" >date du signal</th>
            <th class=" border border-muted p-2" >email du créateur(article signalé)</th>
          </table>
          <table>
          <?php  while ($afficher333=$select->fetch()) { ?>
            <tr>
                 <td class=" border border-muted p-2" ><?php echo $afficher333['id_article_signale'] ?></td>
                 <td class=" border border-muted p-2" ><?php echo $afficher333['date_signal'] ?></td>
                 <td class=" border border-muted p-2" ><?php echo $afficher333['email_createur_du_article_signale'] ?></td>
                 <td class=" border border-muted p-2" ><a href=" ">contacter l'utilisateur</a></td>
            </tr>
            <?php   } ?>
          </table>
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

<script> </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>