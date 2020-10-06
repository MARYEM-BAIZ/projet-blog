<?php
session_start();
     try {
         $baseblog= new PDO ('mysql:host=localhost;dbname=blog;charset=utf8','root','');
     } catch (exception $e) {
         echo " la connexion a échoué " ." <br>";
     }   

        $username="";
        $email="";
        $password="";
        if (isset($_POST['inscrire'])) {
            $username=htmlspecialchars($_POST['username']);
            $username=strip_tags($_POST['username']);

            $email=htmlspecialchars($_POST['email']);
            $email=strip_tags($_POST['email']);

            
            $password=htmlspecialchars($_POST['password']);
            $password=strip_tags($_POST['password']);

        

          echo "<pre>";
         print_r($_FILES['file']);
         echo "  </pre> ";
         echo "  <br> ";
       

        if ( isset($_FILES['file']) and $_FILES['file']['error']== 0 ) {
            
              if ($_FILES['file']['size'] < 1000000 ) {
                  
                    $details= pathinfo($_FILES['file']['name']);
                    $extension=$details['extension'];
                    $liste_extensions_acceptables=array('png',"jpg");
                    $resultat=in_array($extension,$liste_extensions_acceptables);

                     
          echo "<pre>";
          print_r($details);
          echo "  </pre> ";
          echo "  <br> ";

                    if ($resultat == true) {
                        move_uploaded_file($_FILES['file']['tmp_name'] , "immages/" .$details['basename']);
                    }
                            $chemain= "immages/" .$details['basename'];
                            $_SESSION['file'] = $chemain;
                $inserer=$baseblog->prepare(' insert into utilisateur(username_utilisateur,email_utilisateur,password_utilisateur,avatar_utilisateur,id_role) values(?,?,?,?,?) ');
                $inserer1=$inserer->execute(array($_POST['username'],$_POST['email'],$_POST['password'],$chemain,$_POST['select']));
                var_dump($inserer1);
                echo "  <br> ";
              }
              header('Location:seconnecter.php');
        }
       
    }

    $id=$baseblog->prepare(' select * from utilisateur');
    $id1=$id->execute(array());
    var_dump($id1);
    echo "  <br> ";
    $getid=$id->fetch();

        $yeahid=$getid['id_utilisateur'];
        $_SESSION['id_utilisateur']=$yeahid;

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
    
    
  <div class="container">
      <div class="row">
          <div class="col-6">
          <img class="imgimg" src="immages/bg-blog.jpg" alt="immage">
          </div>
          <div class="col-6">
               <!-- Default form register -->
<form class="text-center  p-5" action="#!" method="post"  enctype="multipart/form-data">

<p class="h4 mb-4">S'incrire</p>


   
        <input type="text" id="defaultRegisterFormUserName" name="username" class="form-control mb-4" placeholder="User name">
    
      

<!-- E-mail -->
<input type="email" id="defaultRegisterFormEmail" name="email" class="form-control mb-4" placeholder="E-mail">

<!-- Password -->
<input type="password" id="defaultRegisterFormPassword" name="password" class="form-control" placeholder="Mot de passe" aria-describedby="defaultRegisterFormPasswordHelpBlock">
<small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
    Au moins 8 charactéres et 1 numérique
</small>
 
<input type="file" id="defaultRegisterFormAvatar" name="file" class="form-control mb-4" >

<select name="select" id="" class="form-control" >
<option value="1">utilisateur</option>
</select>


<!-- Sign up button -->
<input class="btn btn-info my-4 btn-block" name="inscrire" value="S'inscrire"  type="submit">


</form>
<!-- Default form register -->
          </div>
      </div>
  </div>
   

     <script></script>
     <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</body>
</html>