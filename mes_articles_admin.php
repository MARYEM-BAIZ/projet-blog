<?php 
      session_start();
      try {
       $basemesarticlesblog= new PDO ('mysql:host=localhost;dbname=blog;charset=utf8','root','');
   } catch (exception $e) {
       echo " la connexion a échoué " ." <br>";
   }   

   if(isset($_GET['id'])) {
    $supprimercat1=$basemesarticlesblog->prepare(' delete from articles where id_article = ?');
    $supprimercat11=$supprimercat1->execute(array($_GET['id']));
    

  }
                                                   //  echo "je doit changer date_parution_articles "
     $afficher1=$basemesarticlesblog->prepare('select * from articles where id_utilisateur=? and  id_categorie=1  ');
     $afficher11=$afficher1->execute(array($_SESSION['idutilisateur']));
     var_dump($afficher11);
     echo " <br>";
                                                 //  echo "je doit changer date_parution_articles "
     $afficher2=$basemesarticlesblog->prepare('select * from articles where id_utilisateur=? and  id_categorie=2   ');
     $afficher22=$afficher2->execute(array($_SESSION['idutilisateur']));
     var_dump($afficher22);
     echo " <br>";
                           //  echo "je doit changer date_parution_articles "
     $afficher3=$basemesarticlesblog->prepare('select * from articles where id_utilisateur=? and  id_categorie=3  ');
     $afficher33=$afficher3->execute(array($_SESSION['idutilisateur']));
     var_dump($afficher33);
     echo " <br>";

      //  echo "partie suppression des articles"


     


  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Articles admin</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  
    <link rel="stylesheet" type="text/css" href="css/mes_articles_admin.css">
</head>
<body>
<header>
    <p class="h5">Lorem, ipsum dolor.</p>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <!-- <a class="navbar-brand" href="#">Navbar</a> -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
     
      <li class="nav-item">
        <a class="nav-link ml-3 mr-5" href="accueil.php">Accueil</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link mr-5 dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Espace Administrateur 
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="liste_utilisateurs.php">Liste des utilisateurs</a>
          <a class="dropdown-item" href="message_contact_us.php">Messages (Contact Us)</a>
          <a class="dropdown-item" href="mes_articles_admin.php">Liste des articles</a>
          <a class="dropdown-item" href="ajout_article.php">Ajouter un article</a>
          <!-- <a class="dropdown-item" href="deconnexion.php">Déconnexion</a> -->
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link mr-5 dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          profil
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="profil_admin.php">Voir profil</a>
          <a class="dropdown-item" href="deconnexion.php">Déconnexion</a>
        </div>
      </li>
      
    </ul>
    
  </div>
 <ul class="navbar-nav ml-auto nav-flex-icons">
      <li class="nav-item avatar">
        <a class="nav-link p-0" href="#">
        <!-- <p> je dois metre ici l'immage du admin</p> -->
           <!-- <p> je dois metre ici l'immage du admin</p> -->
              <!-- <p> je dois metre ici l'immage du admin</p> -->
          <img src="   <?php echo  $_SESSION['immageutilisateur'] ?>" alt="immage" class="immageheader"
            alt="avatar image" height="35">
        </a>
      </li>
    </ul> 
</nav>
    
      <!-- <nav class=" navbar navbar-expand-md navbar-dark bg-dark"> 
          <a href="#" class="navbar-brand"> bootstrap</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
        <span class="navbar-toggler-icon"> </span>

           <div class="collapse navbar-collapse" id="navbarSupportedContent">
               <ul class="navbar-nav ml-auto">
                   <li class="nav-item active">
                       <a class="nav-link" href="#">Homme</a>
                   </li>
               </ul>
           </div>
          </button>
      </nav> -->
    <!-- <ul class="navbar-nav ml-auto nav-flex-icons">
      <li class="nav-item avatar">
        <a class="nav-link p-0" href="#">
          <img src="https://mdbootstrap.com/img/Photos/Avatars/avatar-5.jpg" alt="immage" class="rounded-circle z-depth-0"
            alt="avatar image" height="35">
        </a>
      </li>
    </ul> -->
  
    </header>

<main>
<section class="section1">
    <p class="h1">Bien Etre</p>

     <table>
        <th> article</th>
        <th> Modifier</th>
        <th>Supprimer</th>
     </table>
     <table>
     <?php  while ($afficher111=$afficher1->fetch()) { ?>
       <tr>
       <td>
       <div  class="immageaffiche" >
                  <img class="imgheight" src="<?php echo $afficher111['immage_article'] ?>" alt="immage">
              </div>
              <p> <?php echo $afficher111['date_creation_article'] ?> </p>
              <p> <?php echo $afficher111['titre_article'] ?></p>
              <p> <?php echo $afficher111['contenu_article'] ?></p>
       </td>
        <td>
        <a href="modifier_article.php?id=<?php echo $afficher111['id_article']?>&titre_article= <?php echo $afficher111['titre_article']?>&contenu_article=<?php echo $afficher111['contenu_article'] ?>&immage_article=<?php echo $afficher111['immage_article']?>   ">Modifier</a>
        </td>
        <td>
        <a href="mes_articles_admin.php?id= <?php echo $afficher111['id_article'] ?> ">Supprimer</a>
        </td>
       </tr>
      <?php   } ?>
     </table>

    </section>
    
    <section class="section2">
    <p class="h1">Cheuveux</p>

   

     <table>
        <th> article</th>
        <th> Modifier</th>
        <th>Supprimer</th>
     </table>
     <table>
     <?php  while ($afficher222=$afficher2->fetch()) { ?>
     <tr>
     <td>
     <div  class="immageaffiche">
                  <img class="imgheight" src="<?php echo $afficher222['immage_article'] ?>" alt="immage">
              </div>
              <p> <?php echo $afficher222['date_creation_article'] ?> </p>
              <p> <?php echo $afficher222['titre_article'] ?></p>
              <p> <?php echo $afficher222['contenu_article'] ?></p>
     </td>
     <td>
        <a href="modifier_article.php?id=<?php echo $afficher222['id_article']?>&titre_article= <?php echo $afficher222['titre_article']?>&contenu_article=<?php echo $afficher222['contenu_article'] ?>&immage_article=<?php echo $afficher222['immage_article']?>   ">Modifier</a>
        </td>
        <td>
        <a href="mes_articles_admin.php?id= <?php echo $afficher222['id_article'] ?> ">Supprimer</a>
        </td>
     </tr>
      <?php   } ?>
     </table>

    </section>
    

    <section class="section3">
    <p class="h1">Bien Maquillage</p>

     <table>
        <th> article</th>
        <th> Modifier</th>
        <th>Supprimer</th>
     </table>
    <table>
    <?php  while ($afficher333=$afficher3->fetch()) { ?>
    <tr>
        <td>
        <div  class="immageaffiche">
                  <img class="imgheight" src="<?php echo $afficher333['immage_article'] ?>" alt="immage">
              </div>
              <p> <?php echo $afficher333['date_creation_article'] ?> </p>
              <p> <?php echo $afficher333['titre_article'] ?></p>
              <p> <?php echo $afficher333['contenu_article'] ?></p>
        </td>

        <td>
        <a href="modifier_article.php?id=<?php echo $afficher333['id_article']?>&titre_article= <?php echo $afficher333['titre_article']?>&contenu_article=<?php echo $afficher333['contenu_article'] ?>&immage_article=<?php echo $afficher333['immage_article']?>   ">Modifier</a>
        </td>
        <td>
        <a href="mes_articles_admin.php?id= <?php echo $afficher333['id_article'] ?> ">Supprimer</a>
        </td>
    </tr>

      <?php   } ?>

    </table>

    </section>
    </main>
<footer>
    <article class="article1">
    <a href="contact_us.php">Contact Us </a>
    </article>
    <article class="article2">
    <p>Follow us </p>
    <div class="div_article2_footer">
    <a href=""><i class="fa fa-instagram" aria-hidden="true"></i></a>
    <a href=""><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
    <a href=""> <i class="fa fa-twitter-square" aria-hidden="true"></i></a>
    <a href=""><i class="fa fa-linkedin-square" aria-hidden="true"></i></a>
    </div>
    </article>
  </footer>
<script> </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>