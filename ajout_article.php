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
           $titre=strip_tags($_POST['titrearticle']);
           $titre=htmlspecialchars($_POST['titrearticle']);
           
           $contenu=strip_tags($_POST['contenuarticle']);
           $contenu=htmlspecialchars($_POST['contenuarticle']);
          

           
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
                  
               
                   $inserer=$base1blog->prepare(' insert into articles(titre_article,contenu_article,immage_article,id_categorie,id_utilisateur) values(?,?,?,?,?)');
                   $inserer1=$inserer->execute(array($_POST['titrearticle'],$_POST['contenuarticle'],$chemain ,$_POST['select'],$_SESSION['idutilisateur'] ));
                   var_dump($inserer1);
                   echo "  <br> ";
                   
                     
              }
              if ( $_SESSION['roleutilisateur'] == 1) {
                header('Location:mes_articles.php');
              }
              elseif ( $_SESSION['roleutilisateur'] == 2) {
                header('Location:mes_articles_admin.php');
              }
              
          }
       
  

       }

          $select_id_article=$base1blog->prepare('select * from articles');
          $sel=$select_id_article->execute(array());
          $seleee=$select_id_article->fetch();
          $_SESSION['id_article']=$seleee['id_article'];
   
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
  
 
  <main>
  <section>
   <form class="text-center  p-5" action="#!" method="post"  enctype="multipart/form-data">
   <p class="h4 mb-4">Création D'article</p>
   <input type="text" id="defaultTitleArticle" name="titrearticle" class="form-control mb-4" placeholder="Titre d'article">
   <div class="form-group shadow-textarea">
  <!-- <label for="exampleFormControlTextarea6">Shadow and placeholder</label> -->
  <textarea name="contenuarticle"  class="form-control z-depth-1" id="exampleFormControlTextarea6" rows="3" placeholder="Contenu d'article"></textarea>
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
<script src="ckeditor5-build-classic/ckeditor.js"></script>
<script>
  ClassicEditor.create(document.getElementById("exampleFormControlTextarea6"))
 
</script>
</body>
</html>