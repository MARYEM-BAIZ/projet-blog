<?php   
 
 session_start();
//  if (isset($_POST['revenir']) and  $_SESSION['roleutilisateur']==1) {
//   header('Location:utilisateur.php');
// }
// if (isset($_POST['revenir']) and $_SESSION['roleutilisateur']==2) {
//   header('Location:administrateur.php');
// }


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

<img  class="immageheader" src="immages/logo-blog.png" alt="immage">
        
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <!-- <a class="navbar-brand" href="#">Navbar</a> -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                    
                    <li class="nav-item">
                        <a class="nav-link ml-3 mr-5 h4" href="accueil.php">Accueil</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link mr-5 dropdown-toggle h4" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Catégories
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item h5" href="bien_etre.php">Bien etre </a>
                        <a class="dropdown-item h5" href="cheuveux.php">Cheveux</a>
                        <a class="dropdown-item h5" href="maquillage.php">Maquillage</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link h4" href="contact_us.php">Contact Us</a>
                    </li>
                    </ul>
                    
                </div>
              

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
    </nav>
</header>

<main class="bg-white">

            <!-- <form class="text-center   p-5" action="#" method="post">
            <input class="btn btn-info my-4 btn-block" name="revenir" value="revenir à votre page"  type="submit">
            </form> -->
       
  
    
     <section class=" w-75 bg-white section1">
       
      
     
     </section>

     <section class=" w-75 bg-white section2">

     </section>
     

     
</main>
<footer>

      <div class="container">
      <div class="row">


      <div class="col-md-2 ">
     
      </div>
      
        <div class="col-md-6 ">
        <article class="article1 ">
    <a class=" h2"  href="contact_us.php">Contact Us </a>
    </article>
        </div>

        <div class="col-md-4 ">
        <article class="article2">
    <p class="h2">Follow us </p>
    <div class="  ">
    <a href=""><i class="fa fa-instagram text-info fa-3x" aria-hidden="true"></i></a>
    <a href=""><i class="fa fa-facebook-square text-info fa-3x" aria-hidden="true"></i></a>
   <a href=""> <i class="fa fa-twitter-square text-info fa-3x" aria-hidden="true"></i></a>
    <a href=""><i class="fa fa-linkedin-square text-info fa-3x" aria-hidden="true"></i></a>
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