<?php     

        session_start();
 

            try {
                   $base1blog= new PDO ('mysql:host=localhost;dbname=blog;charset=utf8','root','');
                } catch (exception $e) {
                   echo " la connexion a échoué " ." <br>";
                }  
         
                if (isset($_POST['publier'])) {
                    
                  $question=strip_tags($_POST['question']);
                  $question=htmlspecialchars($_POST['question']);

                     $questionner=$base1blog->prepare('insert into question(id_utilisateur,contenu_question) values(?,?)');
                     $test=$questionner->execute(array($_SESSION['idutilisateur'],$_POST['question']));
                       var_dump($test); 
                }



  ?>


  <!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>discussion</title>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/discussion.css">
  </head>
  <body>
  <header >  

     <div class="pl-3 pt-3 pb-3">
     <a href="accueil.php"><img  class="immageheader1" src="immages/logo-blog.png" alt="immage"></a>
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
                    <li class="nav-item">
                        <form action="#" method="post">
                          <input style="border-color:gray border-radius:3px "    class="ml-5  p-2 h5 " type="text" name="chercher" placeholder="Chercher">
                          <button style="border:none" name="chercher1" type="submit" class="text-muted mt-2 ml-3 "  >
                        <i class="fa fa-search fa-2x" aria-hidden="true"></i>
                        </button>
                        </form>
                    </li>
                    
                    <li class="nav-item ml-5">
                        <a class="nav-link h5" href="discussion.php">Discussion</a>
                    </li>
                    </ul>
                    
                </div>
              
             
                
           
            <?php    if (!isset($_SESSION['idutilisateur'])) {  ?>
               <div class="">
              
       <!-- <button type="button" name="seconnecter" class="btn btn-primary ">Se connecter</button> -->
       <a href="seconnecter.php" class="btn mr-4 text-muted font-weight-bold  btn-outline-info h4 ">se connecter</a>
  
               </div>

               <div class="">
               <a href="inscrire.php" class="btn mr-4 text-muted font-weight-bold  btn-outline-info h4 ">S'inscrire</a>
               </div>
               <?php  }  ?>
               <?php    if (isset($_SESSION['idutilisateur'])) {  ?>
                <ul class="navbar-nav ml-auto nav-flex-icons">
                <li class="nav-item">
                     <p style="color:gray" class="mr-3 mt-4 h5"> <?php  echo $_SESSION['username'] ?> </p>
                    </li>
      <li class="nav-item avatar">
        <a class="nav-link p-0" href=" <?php   if($_SESSION['roleutilisateur'] == 1) { echo "profil_utilisateur.php"; }else { echo "profil_admin.php"; }  ?>">
          <img name="image" src="   <?php echo     $_SESSION['immageutilisateur'] ?>" alt="immage" class="immageheader"
            alt="avatar image" height="35">
        </a>
      </li>
    </ul> 
                <?php  }  ?>

    </nav>
     </header>




      <main class="bg-white">
      <?php    if (isset($_SESSION['idutilisateur'])) {  ?>
    <section class="p-5">
  <div class="container">
  <div class="row">
  <div class="col-2 ">
   <img name="image" src="<?php echo     $_SESSION['immageutilisateur'] ?>" alt="immage" class="immageheader"
            alt="avatar image" height="35">
   </div>
    <div class="col-8 ">
    <form class="text-center" enctype="multipart/form-data" action="#" method="POST">
    <input type="text"  name="question" class="form-control mb-4" placeholder="écrire votre question">
    <input type="submit"  name="publier" class="form-control text-muted mb-4" placeholder="publier">
    </form>
    </div>
    <div class="col-2">
    <!-- <div style="" class="btn-group ">
                           <button class="btn  btn-sm dropdown-toggle mb-3 " type="button" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                             Plus
                           </button>
                           <div class="dropdown-menu"> -->
                          <!-- <form class="dropdown-item" action="#" enctype="multipart/form-data" method="post"> -->
                                <!-- <input style="border:none;background-color:white" type="file" name="uploder" value="uploader une immage"> -->
                                <!-- <div class="input-group">
  
  <div class="mb-4  custom-file">
    <input type="file" name="file" class=" custom-file-input" value="uploder un image" id="inputGroupFile01"
      aria-describedby="inputGroupFileAddon01">
    <label class="custom-file-label" for="inputGroupFile01">uploader/immage</label>
  </div>
</div>
                          </form> -->
                                <!-- </div>
    </div> -->
  </div>
  </div>

    </section>
    <?php  }  ?>
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