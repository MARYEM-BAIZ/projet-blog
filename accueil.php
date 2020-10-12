<?php   
 
 session_start();
//  if (isset($_POST['revenir']) and  $_SESSION['roleutilisateur']==1) {
//   header('Location:utilisateur.php');
// }
// if (isset($_POST['revenir']) and $_SESSION['roleutilisateur']==2) {
//   header('Location:administrateur.php');
// }

try {
    $base1blog= new PDO ('mysql:host=localhost;dbname=blog;charset=utf8','root','');
} catch (exception $e) {
    echo " la connexion a échoué " ." <br>";
}           
         
$select1=$base1blog->prepare('select * from articles where id_categorie=1 order by id_article desc limit 4');
$select1->execute(array());
//  var_dump();
//  echo "  <br> ";

$select2=$base1blog->prepare('select * from articles where id_categorie=2 order by id_article desc limit 4');
$select2->execute(array());


$select3=$base1blog->prepare('select * from articles where id_categorie=3 order by id_article desc limit 4');
$select3->execute(array());
               
          if (isset($_POST['chercher1'])) {
                 $mot=strip_tags($_POST['chercher']);
                 $mot=htmlspecialchars($_POST['chercher']);


                 $cherche=$base1blog->prepare('select * from articles where titre_article like ? ');
                 $cherche->execute(array("%".$_POST['chercher']."%"));

            //  var_dump($che);
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

            <!-- <form class="text-center   p-5" action="#" method="post">
            <input class="btn btn-info my-4 btn-block" name="revenir" value="revenir à votre page"  type="submit">
            </form> -->
       
            <?php      if (!isset($_POST['chercher1'])) {  ?>
                   
                   <section class=" mb-2 p-5 ">
                   <p class="h2 mb-5 text-muted ">* Les derniers articles de la categorie ( bien etre ) :</p>
                  <div class="container">
                      <div class="row">
                      <?php  while ($afficher1=$select1->fetch()) {?>
                        <div class="col-md-3">
                          <div class="mb-4   ">
                              <img class="imgimg" src="<?php echo $afficher1['immage_article'] ?>" alt="immage">
                          </div>                        
                           <p><strong><?php echo $afficher1['titre_article'] ?></strong></p>
                           <hr>
                           <p><?php echo $afficher1['date_creation_article'] ?></p>
                           <hr>
                           <p> <?php echo substr($afficher1['contenu_article'],0,30) ; ?></p>
                           <a href="voir_article.php?id_article=<?php echo $afficher1['id_article']; ?>">Voir l'article</a>
                        </div>
                        <?php }   ?>
                      </div>
                  </div>
                 
                 </section>
                 <hr>
            
                 <section class=" mb-2 p-5 ">
                 <p class="h2 mb-5 text-muted ">* Les derniers articles de la categorie ( cheuveux ) :</p>
                 <div class="container">
                      <div class="row ">
                      <?php  while ($afficher2=$select2->fetch()) {?>
                        <div class="col-md-3">
                          <div class="mb-4 ">
                              <img class="imgimg" src="<?php echo $afficher2['immage_article'] ?>" alt="immage">
                          </div>                        
                           <p><strong><?php echo $afficher2['titre_article'] ?></strong></p>
                           <hr>
                           <p><?php echo $afficher2['date_creation_article'] ?></p>
                           <hr>
                           <p> <?php echo substr($afficher2['contenu_article'],0,30) ; ?></p>
                           <a href="voir_article.php?id_article=<?php echo $afficher2['id_article']; ?>">Voir l'article</a>
                        </div>
                        <?php }   ?>
                      </div>
                  </div>
            
                 </section>
                 <hr>
            
                
                 <section class="  mb-5 p-5 text-muted ">
                 <p class="h2 mb-5">* Les derniers articles de la categorie ( maquillage ) :</p>
                 <div class="container">
                      <div class="row ">
                      <?php  while ($afficher3=$select3->fetch()) {?>
                        <div class="col-md-3">
                          <div class="mb-4 ">
                              <img class="imgimg" src="<?php echo $afficher3['immage_article'] ?>" alt="immage">
                          </div>                        
                           <p><strong><?php echo $afficher3['titre_article'] ?></strong></p>
                           <hr>
                           <p><?php echo $afficher3['date_creation_article'] ?></p>
                           <hr>
                           <p> <?php echo substr($afficher3['contenu_article'],0,30) ; ?></p>
                           <a href="voir_article.php?id_article=<?php echo $afficher3['id_article']; ?>">Voir l'article</a>
                        </div>
                        <?php }   ?>
                      </div>
                  </div>
            
                 </section>

                 <?php     } else {  ?>
                    
                  <section class=" mb-5 p-5 ">
                   <p class="h2 mb-5 text-muted ">* Les  articles :</p>
                  <div class="container">
                      <div class="row">
                      <?php  while ($chercher1=$cherche->fetch()) {?>
                        <div class="col-md-3">
                          <div class="mb-4   ">
                              <img class="imgimg" src="<?php echo $chercher1['immage_article'] ?>" alt="immage">
                          </div>                        
                           <p><strong><?php echo $chercher1['titre_article'] ?></strong></p>
                           <hr>
                           <p><?php echo $chercher1['date_creation_article'] ?></p>
                           <a href="voir_article.php?id_article=<?php echo $chercher1['id_article']; ?>">Voir l'article</a>
                        </div>
                      <?php }   ?>
                      </div>
                  </div>
                 
                 </section>

                   <?php    }   ?>
    
          
          
     
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