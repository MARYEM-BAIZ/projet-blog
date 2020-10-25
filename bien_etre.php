<?php 
       

       session_start();
       try {
        $basebienetreblog= new PDO ('mysql:host=localhost;dbname=blog;charset=utf8','root','');
    } catch (exception $e) {
        echo " la connexion a échoué " ." <br>";
    }   

      //  echo "je doit changer date_parution_articles "
         $afficher3=$basebienetreblog->prepare('select *, max(id_article) as dernier_article  from articles where   id_categorie=1 order by date_creation_article desc limit 8 ');
         $afficher33=$afficher3->execute();
        $ligne1 = $afficher3->fetch() ; 
        $max = $ligne1['dernier_article']; 
        
        // $select=$basebienetreblog->prepare(' select * from articles where id_article between ? and ?');
        // $select1=$select->execute(array($max+1,$max+8));
        // var_dump($select1);
        // while ($select11=$select->fetch())
        // {
        //       var_dump($select11);
        // }

        if (isset($_POST['chercher1'])  ) {
            $mot=strip_tags($_POST['chercher']);
            $mot=htmlspecialchars($_POST['chercher']);


            $cherche=$basebienetreblog->prepare('select * from articles where titre_article like ? ');
            $cherche->execute(array("%".$_POST['chercher']."%"));

       //  var_dump($che);
     }
     $afficher5=$basebienetreblog->prepare('select * from articles where   id_categorie=1 order by date_creation_article desc  ');
     $afficher5->execute();
  
         ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catégorie bien etre</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/bien_etre.css">
    
</head>
<body>
    <header>
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
          <img name="image" src="<?php echo     $_SESSION['immageutilisateur'] ?>" alt="immage" class="immageheader"
            alt="avatar image" height="35">
        </a>
      </li>
    </ul> 
                <?php  }  ?>

    </nav>

    </header>
<main class="bg-white">

<?php      if (!isset($_POST['chercher1'])) { 

         if (isset($_POST['voirplus'])) { 
  ?>


<section class=" mb-5 p-5 ">
                   <!-- <p class="h2 mb-5 text-muted ">* Les  articles (résultat du recherche) :</p> -->
                  <div class="container">
                      <div class="row">
                      <?php  while($select11=$select->fetch()) {?>
                        <div class="col-md-3">
                          <div class="mb-4">
                              <img  style=" display: block; margin-left: auto;  margin-right: auto; width: 150px; height: 150px; border: none; border-radius: 70px;" src="<?php echo $select11['immage_article'] ?>" alt="immage">
                          </div>                        
                           <p><strong><?php echo $select11['titre_article'] ?></strong></p>
                           <hr>
                           <p><?php echo $select11['date_creation_article'] ?></p>
                           <a href="voir_article.php?id_article=<?php echo $select11['id_article']; ?>">Voir l'article</a>
                        </div>
                      <?php }   ?>
                      </div>
                  </div>
                 
                 </section>

                 <?php } ?>


    <section class="  mb-5 p-5">
    <p  class="h1 mb-5 text-muted">Bien Etre</p>
    
     <div class="container">
     <div class="row">
     <?php  while ($afficher333=$afficher5->fetch()) { ?>
         <div class="col-md-3 col-lg-3 col-sm-12">
              <div  class="immageaffiche" >
                  <img class="imgheight" src="<?php echo $afficher333['immage_article'] ?>" alt="immage">
              </div>
              <p class="mt-4"> <?php echo $afficher333['date_creation_article'] ?> </p>
              <hr>
              <p><strong> <?php echo $afficher333['titre_article'] ?></strong></p>
              <hr>
              <p> <?php echo substr($afficher333['contenu_article'],0,30) ; ?></p>
          
        <a href="voir_article.php?id_article=<?php echo $afficher333['id_article']; ?>">Voir la suite</a>
           
         </div>
        <?php   } ?>
     </div>
     </div>
     <form class="text-center mt-5 " action="#" method="post">
     <button style="color:gray " class="btn btn-info font-weight-bold  " name="voirplus" type="submit">voir plus</button>
     </form>

    </section>


    <?php     } elseif(isset($_POST['chercher1'])) {  ?>
     
    <section class=" mb-5 p-5 ">
                   <p class="h2 mb-5 text-muted ">* Les  articles (résultat du recherche) :</p>
                  <div class="container">
                      <div class="row">
                      <?php  while ($chercher1=$cherche->fetch()) {?>
                        <div class="col-md-3">
                          <div class="mb-4   ">
                              <img  style=" display: block; margin-left: auto;  margin-right: auto; width: 150px; height: 150px; border: none; border-radius: 70px;" src="<?php echo $chercher1['immage_article'] ?>" alt="immage">
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

                 <?php    } else { ?>

                

                 <?php }   ?>

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