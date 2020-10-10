<?php 
      session_start();
      try {
       $basemodifierarticle= new PDO ('mysql:host=localhost;dbname=blog;charset=utf8','root','');
   } catch (exception $e) {
       echo " la connexion a échoué " ." <br>";
   }   

   if (isset($_POST['modifier'])) {
       $titre=strip_tags($_POST['titre_article']);
       $titre=htmlspecialchars($_POST['titre_article']);

       $contenu=strip_tags($_POST['contenu_article']);
       $contenu=htmlspecialchars($_POST['contenu_article']);

       
       echo "<pre>";
       print_r($_FILES['immage_article']);
       echo "  </pre> ";
       echo "  <br> ";
     
          
       if (isset($_FILES['immage_article']) and $_FILES['immage_article']['error']==0 ) {
           if ($_FILES['immage_article']['error'] < 1000000) {
               
            $details= pathinfo($_FILES['immage_article']['name']);
            $extension=$details['extension'];
            $liste_extensions_acceptables=array('png',"jpg");
            $resultat=in_array($extension,$liste_extensions_acceptables);

            echo "<pre>";
            print_r($details);
            echo "  </pre> ";
            echo "  <br> ";
  
                      if ($resultat == true) {
                          move_uploaded_file($_FILES['immage_article']['tmp_name'] , "immages/" .$details['basename']);
                      }
                      $chemain= "immages/" .$details['basename'];

     
           }
           
           $modifiertitre3=$basemodifierarticle->prepare(' update articles set  immage_article=? where id_article=? ');
           $modifiertitre33=$modifiertitre3->execute(array($chemain, $_GET['id'] ));
    
       }



       



       $modifiertitre=$basemodifierarticle->prepare(' update articles set titre_article=?  where id_article=? ');
       $modifiertitre1=$modifiertitre->execute(array($_POST['titre_article'], $_GET['id'] ));

       
       $modifiertitre2=$basemodifierarticle->prepare(' update articles set contenu_article=? where id_article=? ');
       $modifiertitre22=$modifiertitre2->execute(array($_POST['contenu_article'], $_GET['id'] ));

                  
      

      
       var_dump($modifiertitre1);
       if ( $_SESSION['roleutilisateur']==1) {
        header('Location:mes_articles.php');

       }


       elseif ( $_SESSION['roleutilisateur']==2) {
        header('Location:mes_articles_admin.php');
       } 
       

       
    
  
   }


   ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification article</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  
    <link rel="stylesheet" type="text/css" href="css/modifier_article.css">
</head>
<body>
<header>
<div class="pl-3 pt-3 pb-3">
<a href="accueil.php"><img  class="immageheader" src="immages/logo-blog.png" alt="immage"></a>
</div>

<?php      if ($_SESSION['roleutilisateur']==1) {    ?>
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
          Espace Utilisateur 
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item h5" href="mes_articles.php">Mes articles</a>
          <a class="dropdown-item h5" href="ajout_article.php">Ajouter un article</a>
          <!-- <a class="dropdown-item" href="deconnexion.php">Déconnexion</a> -->
        </div>
      </li>
     
      <li class="nav-item dropdown">
        <a class="nav-link mr-5 h5 dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          profil
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item h5" href="profil_utilisateur.php">Voir profil</a>
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
          <img src="   <?php echo     $_SESSION['immageutilisateur'] ?>" alt="immage" class="immageheader"
            alt="avatar image" height="35">
        </a>
      </li>
    </ul> 
</nav>
<?php     }   
elseif ($_SESSION['roleutilisateur']==2) { ?>

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
        <img src="   <?php echo  $_SESSION['immageutilisateur'] ?>" alt="immage" class="immageheader"
          alt="avatar image" height="35">
      </a>
    </li>
  </ul> 
</nav>
   
<?php   }   ?>


</header>
   <main class="bg-white"> 
    
     <section class=" mt-5  mb-5 p-5">
     <p class="h1 mb-4"> Modufication du article </p>
      <form class="text-center   " action="#" method="post" enctype="multipart/form-data">
         <input class="form-control mb-4" type="text" name="titre_article" value=" <?php echo $_GET['titre_article']  ?>">
         <input class="form-control mb-4" type="text" name="contenu_article" value=" <?php echo $_GET['contenu_article']  ?>">
        
         <div class="input-group">
  
  <div class="mb-4  custom-file">
    <input  type="file" name="immage_article" class=" custom-file-input" id="inputGroupFile01"
      aria-describedby="inputGroupFileAddon01">
    <label class="custom-file-label" for="inputGroupFile01">Seléctionner une immage</label>
  </div>
</div>
         

         <button class="btn btn-info btn-block" name="modifier" type="submit">Modifier</button>
      </form>
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