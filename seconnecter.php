<?php 
session_start();
   //  echo "dans ce fichier il ya 2 sessions $_SESSION['immageutilisateur'] = $utiliser['avatar_utilisateur']; et $_SESSION['idutilisateur']=$utiliser['id_utilisateur']; "
           try {
               $base2blog= new PDO ('mysql:host=localhost;dbname=blog;charset=utf8',"root",'');
           } catch (excepion $e) {
            echo " la connexion a échoué " ." <br>";
           }


            $password="";
            $email="";
           if (isset($_POST['seconnecter']) ) {
            header('Location:seconnecter.php');
             $password=strip_tags($_POST['password']);
               $password=htmlspecialchars($_POST['password']);
              

               $email=strip_tags($_POST['email']);
               $email=htmlspecialchars($_POST['email']);
  

               $verif=$base2blog->prepare('select * from utilisateur where email_utilisateur= ? and password_utilisateur = ? ');
               $verif->execute(array($email, $password));
            //    var_dump($verif->rowCount()) ; 
               $ligne = $verif->fetch(); 
              //  echo "<pre>";
              //   var_dump($ligne);
              //   echo "</pre>";
             if(isset($ligne['email_utilisateur']))
             {
                   if($ligne['id_role']== 1) {
                        $_SESSION['username'] = $ligne['username_utilisateur']; 
                       $_SESSION['idutilisateur'] = $ligne['id_utilisateur']; 
                       $_SESSION['immageutilisateur'] = $ligne['avatar_utilisateur']; 
                       $_SESSION['roleutilisateur'] = $ligne['id_role']; 
                       $_SESSION['emailutilisateur'] = $ligne['email_utilisateur']; 
                      

                    header('Location:utilisateur.php'); 
                   }
                   else {
                    $_SESSION['username'] = $ligne['username_utilisateur']; 
                    $_SESSION['idutilisateur'] = $ligne['id_utilisateur']; 
                    $_SESSION['immageutilisateur'] = $ligne['avatar_utilisateur']; 
                    $_SESSION['roleutilisateur'] = $ligne['id_role'];
                    $_SESSION['emailutilisateur'] = $ligne['email_utilisateur'];  
                 

                    header('Location:administrateur.php'); 
                   }
             }
            //  else {
            //      echo "connexion echouée"; 
            //  }

            //     while ($ver=$verif->fetch()) {
            //         if ( $ver['password_utilisateur'] == $password and  $ver['email_utilisateur'] ==  $email and $ver['id_role'] ) {
            //             header('Location:utilisateur.php'); 
            //         }
                  
            //     }

            //     if (  $password = 1234 and   $email == "baiz.maryem@gmail.com"  ) {
            //         header('Location:administrateur.php'); 
            //     }
                     
            //     $utilisersessions=$base2blog->prepare('select * from utilisateur where password_utilisateur=? and email_utilisateur=?');
            //    $util=$utilisersessions->execute(array($password,$email));
            //     var_dump($util);
            //     echo " <br>";

            //     $utiliser=$utilisersessions->fetch();
            //      $_SESSION['idutilisateur']=$utiliser['id_utilisateur'];
            //      $_SESSION['immageutilisateur'] =$utiliser['avatar_utilisateur'] ;
            //      $_SESSION['roleutilisateur'] = $utiliser['id_role'] ;

           }


        //    $passwordadmin="";
        //    $emailadmin="";
        //    if (isset($_POST['seconnecter']) and $_POST['select']== 2) {
        //     $passwordadmin=htmlspecialchars($_POST['password']);
        //     $passwordadmin=strip_tags($_POST['password']);

        //     $emailadmin=htmlspecialchars($_POST['email']);
        //     $emailadmin=strip_tags($_POST['email']);

                   
        //     $verif444=$base2blog->prepare('select username_administrateur,password_administrateur,email_administrateur from administrateur  ');
        //     $verif00=$verif444->execute(array());
        //      var_dump($verif00);
        //      echo " <br>";
            
        //      while ($ver555=$verif444->fetch()) {
        //         if ( $ver555['password_administrateur'] == $passwordadmin and  $ver555['email_administrateur'] ==  $emailadmin ) {
        //             header('Location:administrateur.php'); 
        //         }
        //      }
             
            

        //    }
            
             $role=$base2blog->prepare('select * from role');
     $role1=$role->execute(array());
    //  var_dump($role1);
    //   echo "  <br> ";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/seconnecter.css">


    <style>

    </style>
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
  
<section class=" mt-5  mb-5 p-5">
<div class="container">
    <div class="row">
    
<div class="col-12">
           <!-- Default form subscription -->
<form class="text-center  " action="#" method="post">


<p style=" color:  #ea899a"  class="h4 mb-4">Connexion</p>



<!-- <p>Join our mailing list. We write rarely, but only the best content.</p> -->

<!-- <p>
    <a href="" target="_blank">See the last newsletter</a>
</p> -->


<!-- Email -->
<input style="color:gray " type="email" id="defaultSubscriptionFormEmail" class="form-control mb-4" name="email" placeholder="E-mail">

<!-- Password -->
<input style="color:gray " type="password" id="defaultSubscriptionFormPassword" class="form-control mb-4" name="password" placeholder="Mot de passe">

<!-- <select name="select" id="" class="form-control  mb-4" >
       <?php while ($ro=$role->fetch()){  ?>
             <option value="<?php echo $ro['id_role'] ?>"> <?php echo $ro['type_role'] ?></option>
        <?php  } ?> 
     </select>  -->

<!-- Sign in button -->
<div class="h4">
<button style="color:gray " class="btn btn-info font-weight-bold  btn-block" name="seconnecter" type="submit">Se Connecter</button>

</div>
 


 
</form>
<!-- Default form subscription -->
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