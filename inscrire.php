<?php
// session_start();
    //  echo "dans ce fichier il ya 2 sessions $_SESSION['immageutilisateur'] = $chemain; et $_SESSION['idutilisateur']=$yeahid; "
     try {
         $baseblog= new PDO ('mysql:host=localhost;dbname=blog;charset=utf8','root','');
     } catch (exception $e) {
         echo " la connexion a échoué " ." <br>";
     }   

       
        if(isset($_POST['inscrire'])){
            $username=htmlspecialchars($_POST['username']);
            $username=strip_tags($_POST['username']);

            $email=htmlspecialchars($_POST['email']);
            $email=strip_tags($_POST['email']);

            $password=htmlspecialchars($_POST['password']);
            $password=strip_tags($_POST['password']);

        

        //   echo "<pre>";
        //  print_r($_FILES['file']);
        //  echo "  </pre> ";
        //  echo "  <br> ";
       

        if ( isset($_FILES['file']) and $_FILES['file']['error']== 0 ) {
            
              if ($_FILES['file']['size'] < 1000000 ) {
                  
                    $details= pathinfo($_FILES['file']['name']);
                    $extension=$details['extension'];
                    $liste_extensions_acceptables=array('png',"jpg");
                    $resultat=in_array($extension,$liste_extensions_acceptables);

                     
        //   echo "<pre>";
        //   print_r($details);
        //   echo "  </pre> ";
        //   echo "  <br> ";

                    if ($resultat == true) {
                        move_uploaded_file($_FILES['file']['tmp_name'] , "immages/" .$details['basename']);
                    }
                            $chemain= "immages/" .$details['basename'];
                            // $_SESSION['immageutilisateur'] = $chemain;
                $inserer=$baseblog->prepare(' insert into utilisateur(username_utilisateur,email_utilisateur,password_utilisateur,avatar_utilisateur,id_role) values(?,?,?,?,?) ');
                $inserer1=$inserer->execute(array($_POST['username'],$_POST['email'],$_POST['password'],$chemain,1));
                // var_dump($inserer1);
                // echo "  <br> ";
              }
              header('Location:seconnecter.php');
        }
        else {
            $avatar="immages/immage-avatar.jpg";
            $inserer=$baseblog->prepare(' insert into utilisateur(username_utilisateur,email_utilisateur,password_utilisateur,avatar_utilisateur,id_role) values(?,?,?,?,?) ');
                $inserer1=$inserer->execute(array($_POST['username'],$_POST['email'],$_POST['password'],$avatar,1));
                 
        }
        // header('Location:seconnecter.php');
    }

    $id=$baseblog->prepare(' select * from utilisateur');
    $id1=$id->execute(array());
    // var_dump($id1);
    // echo "  <br> ";
    $getid=$id->fetch();

        $yeahid=$getid['id_utilisateur'];
        // $_SESSION['idutilisateur']=$yeahid;

    // $role=$baseblog->prepare('select * from role');
    // $role1=$role->execute(array());
    //  var_dump($role1);
    //  echo "  <br> ";

     
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/inscrire.css">
</head>
<body>
    <header>
    <div class="pl-3 pt-3 pb-3">
<a href="accueil.php"><img  class="immageheader" src="immages/logo-blog.png" alt="immage"></a>
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
                    </ul>
                    
                </div>
                </nav>

    </header>
    
 <main class="bg-white">  
 
    <section class="  mb-5 p-5">
    <div class="container">
      <div class="row">
         
          <div class="col-12">
               <!-- Default form register -->
<form class="text-center  " action="#!" method="post"  enctype="multipart/form-data">

<p style=" color:  #ea899a" class="h2 mb-4">S'incrire</p>


   
        <input type="text" id="defaultRegisterFormUserName" name="username" class="form-control mb-4" placeholder="User name">
    
      

<!-- E-mail -->
<input type="email" id="defaultRegisterFormEmail" name="email" class="form-control mb-4" placeholder="E-mail">

<!-- Password -->
<input type="password" id="defaultRegisterFormPassword" name="password" class="form-control mb-4" placeholder="Mot de passe" aria-describedby="defaultRegisterFormPasswordHelpBlock">

 
<!-- <input type="file" id="defaultRegisterFormAvatar" name="file" class="form-control mb-4" > -->

<div class="input-group">
  
  <div class="mb-4  custom-file">
    <input type="file" name="file" class=" custom-file-input" id="inputGroupFile01"
      aria-describedby="inputGroupFileAddon01">
    <label class="custom-file-label" for="inputGroupFile01">Seléctionner une immage</label>
  </div>
</div>

<!-- Sign up button -->
<input style="color:gray " class="btn btn-info font-weight-bold my-4 h4 btn-block" name="inscrire" value="S'inscrire"  type="submit">


</form>
<!-- Default form register -->
          </div>
      </div>
  </div>
    </section>

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
     <script></script>
     <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</body>
</html>