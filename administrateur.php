<?php 
session_start();
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catégorie Beauté</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  
    <link rel="stylesheet" type="text/css" href="utilisateur.css">
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
          <a class="dropdown-item" href="#">Liste des utilisateurs</a>
          <a class="dropdown-item" href="">Ajouter un utilisateur</a>
          <a class="dropdown-item" href="">Messages (Contact Us)</a>
          <a class="dropdown-item" href="#">Liste des articles</a>
          <a class="dropdown-item" href="">Ajouter un article</a>
          <a class="dropdown-item" href="accueil.php">Déconnexion</a>
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
          <img src="   <?php echo  $_SESSION['file'] ?>" alt="immage" class="rounded-circle mr-3 z-depth-0"
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
        <section>
           
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