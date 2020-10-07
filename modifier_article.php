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
    <title>Page administrateur</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  
    <link rel="stylesheet" type="text/css" href="css/modifier_article.css">
</head>
<body>
   <main>
     <p class="h1"> Modufication du article </p>
      <form class="text-center   p-5" action="#" method="post" enctype="multipart/form-data">
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
   </main>
<script> </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>