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
     $afficher1=$basemesarticlesblog->prepare('select * from articles where   id_categorie=1  ');
     $afficher11=$afficher1->execute(array());
    //  var_dump($afficher11);
    //  echo " <br>";
                                                 //  echo "je doit changer date_parution_articles "
     $afficher2=$basemesarticlesblog->prepare('select * from articles where  id_categorie=2   ');
     $afficher22=$afficher2->execute(array());
    //  var_dump($afficher22);
    //  echo " <br>";
                           //  echo "je doit changer date_parution_articles "
     $afficher3=$basemesarticlesblog->prepare('select * from articles where  id_categorie=3  ');
     $afficher33=$afficher3->execute(array());
    //  var_dump($afficher33);
    //  echo " <br>";

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
        <a class="nav-link mr-5 h5 dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Espace Administrateur 
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item h5" href="liste_utilisateurs.php">Liste des utilisateurs</a>
          <a class="dropdown-item h5" href="message_contact_us.php">Messages (Contact Us)</a>
          <a class="dropdown-item h5" href="mes_articles_admin.php">Liste des articles</a>
          <a class="dropdown-item h5" href="ajout_article.php">Ajouter un article</a>
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

<main class="bg-white">
<section class=" mt-5 p-5">
    <p class="h1 mb-5 text-muted">Bien Etre</p>

     <table class="w-100">
        <th style="text-align:center" class=" border border-muted text-muted p-2"> article</th>
        <th style="text-align:center" class=" border border-muted text-muted p-2"> Modifier</th>
        <th style="text-align:center" class=" border border-muted text-muted p-2">Supprimer</th>
     </table>
     <table class="w-100">
     <?php  while ($afficher111=$afficher1->fetch()) { ?>
       <tr>
       <td class=" border border-muted p-2">
       <div class="mb-4 mt-4"  >
                  <img style="width:150px ; height:150px ; border-radius: 70px ; border: none ; display:block ; margin-left:auto ;margin-right:auto  " src="<?php echo $afficher111['immage_article'] ?>" alt="immage">
              </div>
              <p style="text-align:center"> <?php echo $afficher111['date_creation_article'] ?> </p>
              <hr>
              <p style="text-align:center"> <?php echo $afficher111['titre_article'] ?></p>
              <hr>
              <p style="text-align:center"> <?php echo $afficher111['contenu_article'] ?></p>
       </td>
        <td style="text-align:center" class=" border border-muted p-2">
        <a href="modifier_article.php?id=<?php echo $afficher111['id_article']?>&titre_article= <?php echo $afficher111['titre_article']?>&contenu_article=<?php echo $afficher111['contenu_article'] ?>&immage_article=<?php echo $afficher111['immage_article']?>   ">Modifier</a>
        </td>
        <td style="text-align:center" class=" border border-muted p-2">
        <a href="mes_articles_admin.php?id= <?php echo $afficher111['id_article'] ?> ">Supprimer</a>
        </td>
       </tr>
      <?php   } ?>
     </table>

    </section>
    <hr>
    <section class="    p-5">
    <p class="h1 mb-5 text-muted">Cheuveux</p>

   

     <table class="w-100">
        <th style="text-align:center" class=" border border-muted text-muted p-2"> article</th>
        <th style="text-align:center" class=" border border-muted text-muted p-2"> Modifier</th>
        <th style="text-align:center" class=" border border-muted text-muted p-2">Supprimer</th>
     </table>
     <table class="w-100">
     <?php  while ($afficher222=$afficher2->fetch()) { ?>
     <tr>
     <td class=" border border-muted p-2">
     <div  class="mb-4 mt-4">
                  <img style="width:150px ; height:150px ; border-radius: 70px ; border: none ; display:block ; margin-left:auto ;margin-right:auto  " src="<?php echo $afficher222['immage_article'] ?>" alt="immage">
              </div>
              <p style="text-align:center"> <?php echo $afficher222['date_creation_article'] ?> </p>
              <hr>
              <p style="text-align:center"> <?php echo $afficher222['titre_article'] ?></p>
              <hr>
              <p style="text-align:center"> <?php echo $afficher222['contenu_article'] ?></p>
     </td>
     <td style="text-align:center" class=" border border-muted p-2">
        <a href="modifier_article.php?id=<?php echo $afficher222['id_article']?>&titre_article= <?php echo $afficher222['titre_article']?>&contenu_article=<?php echo $afficher222['contenu_article'] ?>&immage_article=<?php echo $afficher222['immage_article']?>   ">Modifier</a>
        </td>
        <td style="text-align:center" class=" border border-muted p-2">
        <a href="mes_articles_admin.php?id= <?php echo $afficher222['id_article'] ?> ">Supprimer</a>
        </td>
     </tr>
      <?php   } ?>
     </table>

    </section>
    
<hr>
    <section class="  mb-5 p-5">
    <p class="h1 mb-5 text-muted">Maquillage</p>

     <table class="w-100">
        <th style="text-align:center" class=" border border-muted text-muted p-2"> article</th>
        <th style="text-align:center" class=" border border-muted text-muted p-2"> Modifier</th>
        <th style="text-align:center" class=" border border-muted text-muted p-2">Supprimer</th>
     </table>
    <table class="w-100">
    <?php  while ($afficher333=$afficher3->fetch()) { ?>
    <tr>
        <td class=" border border-muted p-2">
        <div class="mb-4 mt-4" >
                  <img style="width:150px ; height:150px ; border-radius: 70px ; border: none ; display:block ; margin-left:auto ;margin-right:auto  " src="<?php echo $afficher333['immage_article'] ?>" alt="immage">
              </div>
              <p style="text-align:center"> <?php echo $afficher333['date_creation_article'] ?> </p>
              <hr>
              <p style="text-align:center"> <?php echo $afficher333['titre_article'] ?></p>
              <hr>
              <p style="text-align:center"> <?php echo $afficher333['contenu_article'] ?></p>
        </td>

        <td style="text-align:center" class=" border border-muted p-2">
        <a href="modifier_article.php?id=<?php echo $afficher333['id_article']?>&titre_article= <?php echo $afficher333['titre_article']?>&contenu_article=<?php echo $afficher333['contenu_article'] ?>&immage_article=<?php echo $afficher333['immage_article']?>   ">Modifier</a>
        </td>
        <td style="text-align:center" class=" border border-muted p-2">
        <a href="mes_articles_admin.php?id= <?php echo $afficher333['id_article'] ?> ">Supprimer</a>
        </td>
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