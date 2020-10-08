<?php 
session_start();
   
   try {
    $baseblog= new PDO ('mysql:host=localhost;dbname=blog;charset=utf8','root','');
  } catch (exception $e) {
    echo " la connexion a échoué " ." <br>";
  } 

  if (isset($_POST['modifier'])) {

          $nom=strip_tags($_POST['nomutilisateur']);
          $nom=htmlspecialchars($_POST['nomutilisateur']);

          $password=strip_tags($_POST['password']);
          $password=htmlspecialchars($_POST['password']);

          echo "<pre>";
          print_r($_FILES['immageprofil']);
          echo "  </pre> ";
          echo "  <br> ";


          if (isset($_FILES['immageprofil']) and $_FILES['immageprofil']['error']==0 ) {
            if ($_FILES['immageprofil']['error'] < 1000000) {
                
             $details= pathinfo($_FILES['immageprofil']['name']);
             $extension=$details['extension'];
             $liste_extensions_acceptables=array('png',"jpg");
             $resultat=in_array($extension,$liste_extensions_acceptables);
 
             echo "<pre>";
             print_r($details);
             echo "  </pre> ";
             echo "  <br> ";
   
                       if ($resultat == true) {
                           move_uploaded_file($_FILES['immageprofil']['tmp_name'] , "immages/" .$details['basename']);
                       }
                       $chemain= "immages/" .$details['basename'];
 
      
            }
            
            $modifiertitre3=$baseblog->prepare(' update utilisateur set  avatar_utilisateur=? where id_utilisateur=? ');
            $modifiertitre33=$modifiertitre3->execute(array($chemain, $_GET['id'] ));
     
        }
 
 
 
        
 
 
 
        $modifiertitre=$baseblog->prepare(' update utilisateur set username_utilisateur=?  where id_utilisateur=? ');
        $modifiertitre1=$modifiertitre->execute(array($_POST['nomutilisateur'], $_GET['id'] ));
 
        
        $modifiertitre2=$baseblog->prepare(' update utilisateur set password_utilisateur=? where id_utilisateur=? ');
        $modifiertitre22=$modifiertitre2->execute(array($_POST['password'], $_GET['id'] ));
 
                   
       
 
       
        var_dump($modifiertitre1);



        if ( $_SESSION['roleutilisateur']==1) {
            header('Location:profil_utilisateur.php');
    
           }
    
    
           elseif ( $_SESSION['roleutilisateur']==2) {
            header('Location:profil_admin.php');
           } 
           


  }

  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page utilisateur</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  
    <link rel="stylesheet" type="text/css" href="">
</head>
<body>

   <p class="h1"> Modufication du profil </p>
    <section>

    <form class="text-center  p-5" action="#!" method="post"  enctype="multipart/form-data">

    <input class="form-control mb-4" type="text" name="nomutilisateur" value="<?php echo $_GET['nom_utilisateur']  ?>">

    <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted mb-2">
    vous voulez changer votre mot de passe ?
</small>              
         <input class="form-control mb-4" type="text"  name="password" value="<?php echo $_GET['password_utilisateur']  ?> ">

         <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted mb-2">
    vous voulez changer votre photo de profil ?
</small>
    <div class="input-group">
  
  <div class="mb-4  custom-file">
    <input  type="file" name="immageprofil" class=" custom-file-input" id="inputGroupFile01"
      aria-describedby="inputGroupFileAddon01">
    <label class="custom-file-label" for="inputGroupFile01">Seléctionner une immage</label>
  </div>
</div>

    <button class="btn btn-info btn-block" name="modifier" type="submit">Modifier</button>

   </form>

    </section>
   
    
<script> </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>