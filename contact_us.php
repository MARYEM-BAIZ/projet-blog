<?php 
session_start();
              
try {
  $baseadminblog= new PDO ('mysql:host=localhost;dbname=blog;charset=utf8','root','');
} catch (exception $e) {
  echo " la connexion a échoué " ." <br>";
}   
      
    if (isset($_POST['envoyer'])) {
        
        $nom=strip_tags($_POST['nomutilisateur']);
        $nom=htmlspecialchars($_POST['nomutilisateur']);

        $email=strip_tags($_POST['email']);
        $email=htmlspecialchars($_POST['email']);

        $contenu=strip_tags($_POST['message']);
        $contenu=htmlspecialchars($_POST['message']);

         if ($_SESSION['username']== $_POST['nomutilisateur'] and $_SESSION['emailutilisateur']== $_POST['email'] ) {
            $inserer=$baseadminblog->prepare(' insert into contacter_admin(nom_utilisateur,email_utilisateur,contenu_contact) values(?,?,?) ');
            $inserer1=$inserer->execute(array($_POST['nomutilisateur'],$_POST['email'],$_POST['message']));
           
            var_dump($inserer1);
            echo" <br>";   
         }
        
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/contact_us.css">
</head>
<body>
    
     <div class="container">
         <div class="row">
             <div class="col-6">
             <img class="imgimg" src="immages/bg-blog.jpg" alt="immage">
             </div>
             <div class="col-6">
                 <!-- Default form contact -->
<form class="text-center  p-5" method="post" action="#!">

<p class="h4 mb-4">Contact us</p>

<!-- Name -->
<input name="nomutilisateur" type="text" id="defaultContactFormName" class="form-control mb-4" placeholder="Name">

<!-- Email -->
<input name="email" type="email" id="defaultContactFormEmail" class="form-control mb-4" placeholder="E-mail">

<!-- Subject
<label>Subject</label>
<select class="browser-default custom-select mb-4">
    <option value="" disabled>Choose option</option>
    <option value="1" selected>Feedback</option>
    <option value="2">Report a bug</option>
</select> -->

<!-- Message -->
<div class="form-group">
    <textarea name="message" class="form-control rounded-0" id="exampleFormControlTextarea2" rows="3" placeholder="Message"></textarea>
</div>

<!-- Send button -->
<button name="envoyer" class="btn btn-info btn-block" type="submit">envoyer</button>

</form>
  <p> <?php  echo $_SESSION['emailutilisateur'];?></p>
  <p> <?php  echo $_SESSION['username'];?></p>
<!-- Default form contact -->
             </div>
         </div>
     </div>

<script></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</body>
</html>