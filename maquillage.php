<?php 
       

       session_start();
       try {
        $basemaquillageblog= new PDO ('mysql:host=localhost;dbname=blog;charset=utf8','root','');
    } catch (exception $e) {
        echo " la connexion a échoué " ." <br>";
    }   

      //  echo "je doit changer date_parution_articles "
         $afficher3=$basemaquillageblog->prepare('select * from articles where   id_categorie=3  ');
         $afficher33=$afficher3->execute();
          var_dump($afficher33);
          echo " <br>";
         ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catégorie Maquillage</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/maquillage.css">
</head>
<body>

<section class="section1">
    <p class="h1">maquillage</p>

     <div class="container">
     <div class="row">
     <?php  while ($afficher333=$afficher3->fetch()) { ?>
         <div class="col-md-3 col-lg-3 col-sm-12">
              <div  class="immageaffiche" >
                  <img class="imgheight" src="<?php echo $afficher333['immage_article'] ?>" alt="immage">
              </div>
              <p> <?php echo $afficher333['date_creation_article'] ?> </p>
              <p> <?php echo $afficher333['titre_article'] ?></p>
        
              <p> <?php echo substr($afficher333['contenu_article'],0,30)?></p>
              <a href="voir_article.php?id_article=<?php echo $afficher333['id_article']; ?>">Voir la suite</a>
         
         </div>
        <?php   } ?>
     </div>
     </div>

    </section>
    

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</body>
</html>