<?php
session_start();
       try {
        $base1blog= new PDO ('mysql:host=localhost;dbname=blog;charset=utf8','root','');
    } catch (exception $e) {
        echo " la connexion a échoué " ." <br>";
    }   

       $titre="";
       $contenu="";
       if (isset($_POST['publier'])) {
           $titre=htmlspecialchars($_POST['titrearticle']);
           $titre=strip_tags($_POST['titrearticle']);

           $contenu=htmlspecialchars($_POST['contenuarticle']);
           $contenu=strip_tags($_POST['contenuarticle']);

           
          echo "<pre>";
          print_r($_FILES['file']);
          echo "  </pre> ";
          echo "  <br> ";
         
        

          if (isset($_FILES['file']) and $_FILES['file']['error'] == 0 ) {
              if ($_FILES['file']['size'] < 1000000 ) {
                  
                  $details=pathinfo($_FILES['file']['name']);

          echo "<pre>";
          print_r($details);
          echo "  </pre> ";
          echo "  <br> ";
                  $extension=$details['extension'];
                  $liste_extensions_acceptable=array('png','jpg');
                  $resultat=in_array($extension,$liste_extensions_acceptable);

                  if ($resultat == true) {
                      move_uploaded_file($_FILES['file']['tmp_name'] , "immages/" .$details['basename']);
                  }
                  $chemain= "immages/" .$details['basename'];
                  
                  $datecrea=date("d/m/y") ;
                   $inserer=$base1blog->prepare(' insert into articles(titre_article,contenu_article,immage_article,id_categorie,id_utilisateur,date_creation_article) values(?,?,?,?,?,?)');
                   $inserer1=$inserer->execute(array($_POST['titrearticle'],$_POST['contenuarticle'],$chemain ,$_POST['select'],$_SESSION['id_utilisateur'] ,$datecrea));
                   var_dump($inserer1);
                   echo "  <br> ";
                   
                     
              }
              header('Location:mes_articles.php');
          }

       }
       $categorie=$base1blog->prepare('select * from categories');
       $categorie1=$categorie->execute(array());
        var_dump($categorie1);
        echo "  <br> ";


  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout Article</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/ajout_article.css">
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
          Espace Utilisateur 
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Mes articles</a>
          <a class="dropdown-item" href="ajout_article.php">Ajouter un article</a>
          <a class="dropdown-item" href="accueil.php">Déconnexion</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="accueil.php">Q/A</a>
      </li>
    </ul>
    
  </div>
 <ul class="navbar-nav ml-auto nav-flex-icons">
      <li class="nav-item avatar">
        <a class="nav-link p-0" href="#">
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
   <form class="text-center  p-5" action="#!" method="post"  enctype="multipart/form-data">
   <p class="h4 mb-4">Création D'article</p>
   <input type="text" id="defaultTitleArticle" name="titrearticle" class="form-control mb-4" placeholder="Titre d'article">
   <div class="form-group shadow-textarea">
  <!-- <label for="exampleFormControlTextarea6">Shadow and placeholder</label> -->
  <textarea name="contenuarticle" class="form-control z-depth-1" id="exampleFormControlTextarea6" rows="3" placeholder="Contenu d'article"></textarea>
</div>

<div class="input-group">
  
  <div class="mb-4  custom-file">
    <input type="file" name="file" class=" custom-file-input" id="inputGroupFile01"
      aria-describedby="inputGroupFileAddon01">
    <label class="custom-file-label" for="inputGroupFile01">Seléctionner une immage</label>
  </div>
</div>
<select name="select" id="" class="form-control " >
       <?php while ($cat=$categorie->fetch()){  ?>
             <option value="<?php echo $cat['id_categorie'] ?>"> <?php echo $cat['type_categorie'] ?></option>
        <?php  } ?>
    </select>

<input class="btn btn-info btn-block my-4" type="submit" name="publier" value="Publier">
</form>
  </main>
   </section>
   

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</body>
</html>