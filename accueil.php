<?php   
 
 session_start();
 if (isset($_POST['revenir']) and  $_SESSION['roleutilisateur']==1) {
  header('Location:utilisateur.php');
}
if (isset($_POST['revenir']) and $_SESSION['roleutilisateur']==2) {
  header('Location:administrateur.php');
}


 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/accueil.css">
</head>
<body>

<header>

<img class="immageheader" src="immages/logo-blog.png" alt="immage">
        
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
                        Catégories
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="bien_etre.php">Bien etre </a>
                        <a class="dropdown-item" href="cheuveux.php">Cheveux</a>
                        <a class="dropdown-item" href="maquillage.php">Maquillage</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact_us.php">Contact Us</a>
                    </li>
                    </ul>
                    
                </div>
    </nav>
</header>

<main>
<section>
            <form class="text-center   p-5" action="#" method="post">
            <input class="btn btn-info my-4 btn-block" name="revenir" value="revenir à votre page"  type="submit">
            </form>
        </section>
  
     <section class="section1">
       <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente illum quasi facilis esse molestias vel dolores quae accusantium magni natus sunt eligendi, fugit veniam molestiae odit autem ipsum vitae dolorum ea. Itaque, enim quo quibusdam laudantium quisquam necessitatibus tenetur adipisci.</p>
     </section>

     <section class="section2">
       <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Non, magni quisquam. Provident, debitis quidem. Saepe eligendi sed dolor officia? Cumque.</p>
       <form action="inscrire.php" method="post" enctype="multipart/form-data">
        <input type="submit" name="inscrire" value="S'inscrire" class="btninscrire">
       </form>
     </section>

     <section class="section3">
     <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Non, magni quisquam. Provident, debitis quidem. Saepe eligendi sed dolor officia? Cumque.</p>
       <form action="seconnecter.php" method="post">
       <input type="submit" name="seconnecter" value="Se Connecter" class="btnseconnecter">
       </form>
     </section>
</main>
<footer>
    <article class="article1 ">
    <a href="contact_us.php">Contact Us </a>
    </article>
    <article class="article2">
    <p>Follow us </p>
    <div class="div_article2_footer ">
    <a href=""><i class="fa fa-instagram" aria-hidden="true"></i></a>
    <a href=""><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
   <a href=""> <i class="fa fa-twitter-square" aria-hidden="true"></i></a>
    <a href=""><i class="fa fa-linkedin-square" aria-hidden="true"></i></a>
    </div>
    </article>
  </footer> 
  


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>