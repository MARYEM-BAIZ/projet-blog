<?php 
           try {
               $base2blog= new PDO ('mysql:host=localhost;dbname=blog;charset=utf8',"root",'');
           } catch (excepion $e) {
            echo " la connexion a échoué " ." <br>";
           }


           $password="";
           $email="";
           if (isset($_POST['seconnecter']) and $_POST['select']== 1) {
               $password=htmlspecialchars($_POST['password']);
               $password=strip_tags($_POST['password']);

               $email=htmlspecialchars($_POST['email']);
               $email=strip_tags($_POST['email']);

               $verif=$base2blog->prepare('select password_utilisateur,email_utilisateur from utilisateur');
               $verif1=$verif->execute(array());

                var_dump($verif1);
                echo " <br>";

                while ($ver=$verif->fetch()) {
                    if ( $ver['password_utilisateur'] == $password and  $ver['email_utilisateur'] ==  $email ) {
                        header('Location:utilisateur.php'); 
                    }
                  
                }
                // else {
                //     echo " le mot de passe ou l'email n'existe pas " . "<br>";
                // }

                // while ($ver=$verif->fetch()) {
                //     if ( $ver['password_utilisateur'] ==! $password and  $ver['email_utilisateur'] ==!  $email ) {
                //         header('Location:revenirpageaccueil.php');
                //     }
                    
                  
                // }
               
           }


           $passwordadmin="";
           $emailadmin="";
           if (isset($_POST['seconnecter']) and $_POST['select']== 2) {
            $passwordadmin=htmlspecialchars($_POST['password']);
            $passwordadmin=strip_tags($_POST['password']);

            $emailadmin=htmlspecialchars($_POST['email']);
            $emailadmin=strip_tags($_POST['email']);

                   
            $verif444=$base2blog->prepare('select username_administrateur,password_administrateur,email_administrateur from administrateur  ');
            $verif00=$verif444->execute(array());
             var_dump($verif00);
             echo " <br>";
            
             while ($ver555=$verif444->fetch()) {
                if ( $ver555['password_administrateur'] == $passwordadmin and  $ver555['email_administrateur'] ==  $emailadmin ) {
                    header('Location:administrateur.php'); 
                }
             }
             
            

           }
            
             $role=$base2blog->prepare('select * from role');
     $role1=$role->execute(array());
     var_dump($role1);
      echo "  <br> ";

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
    
<div class="container">
    <div class="row">
    <div class="col-6 ">
<img class="imgimg" src="immages/bg-blog.jpg" alt="immage">
</div>
<div class="col-6">
           <!-- Default form subscription -->
<form class="text-center   p-5" action="#" method="post">

<p class="h4 mb-4">Connexion</p>

<!-- <p>Join our mailing list. We write rarely, but only the best content.</p> -->

<!-- <p>
    <a href="" target="_blank">See the last newsletter</a>
</p> -->


<!-- Email -->
<input type="email" id="defaultSubscriptionFormEmail" class="form-control mb-4" name="email" placeholder="E-mail">

<!-- Password -->
<input type="password" id="defaultSubscriptionFormPassword" class="form-control mb-4" name="password" placeholder="Mot de passe">

<select name="select" id="" class="form-control  mb-4" >
       <?php while ($ro=$role->fetch()){  ?>
             <option value="<?php echo $ro['id_role'] ?>"> <?php echo $ro['type_role'] ?></option>
        <?php  } ?> 
     </select> 

<!-- Sign in button -->
<button class="btn btn-info btn-block" name="seconnecter" type="submit">Se Connecter</button>

 


 
</form>
<!-- Default form subscription -->
</div>
    </div>
</div>

<script></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</body>
</html>