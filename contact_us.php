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
           
            // var_dump($inserer1);
            // echo" <br>";   
         }
        
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact us</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/contact_us.css">
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
                    <li class="nav-item ml-5">
                        <a class="nav-link h5" href="discussion.php">Discussion</a>
                    </li>
                    </ul>
                    
                </div>
              
             
                
           
            <?php    if (!isset($_SESSION['idutilisateur'])) {  ?>
               <div class="">
               <form class="" action="seconnecter.php" method="post">
       <!-- <button type="button" name="seconnecter" class="btn btn-primary ">Se connecter</button> -->
       <input type="submit" name="seconnecter" value="Se Connecter" class="btn mr-4 text-muted font-weight-bold  btn-outline-info h4 ">
       </form>
               </div>

               <div class="">
               <form class=" " action="inscrire.php" method="post" enctype="multipart/form-data">
       <!-- <button type="button" name="inscrire" class="btn btn-primary ">S'inscrire</button> -->
        <input type="submit" class=" btn mr-4 text-muted font-weight-bold btn-outline-info h4 " name="inscrire" value="S'inscrire" >
       </form>
       
               </div>
               <?php  }  ?>
               <?php    if (isset($_SESSION['idutilisateur'])) {  ?>
                <ul class="navbar-nav ml-auto nav-flex-icons">
                <li class="nav-item">
                     <p style="color:gray" class="mr-3 mt-4 h5"> <?php  echo $_SESSION['username'] ?> </p>
                    </li>
      <li class="nav-item avatar">
        <a class="nav-link p-0" href=" <?php   if($_SESSION['roleutilisateur'] == 1) { echo "utilisateur.php"; }else { echo "administrateur.php"; }  ?>">
          <img style=" width: 60px; height: 60px; border: none; border-radius: 70px;" name="image" src="   <?php echo     $_SESSION['immageutilisateur'] ?>" alt="immage" class=""
            alt="avatar image" height="35">
        </a>
      </li>
    </ul> 
                <?php  }  ?>

    </nav>

    </header>
    <main class="bg-white"> 
    <section  class="   mb-5 p-5">
    <div class="container">
         <div class="row">
             <!-- <div class="col-6">
             <img class="imgimg" src="immages/bg-blog.jpg" alt="immage">
             </div> -->
             <div class="col-12 ">
                 <!-- Default form contact -->
<form class="text-center  " method="post" action="#!">

<p class="h2 mb-4 text-muted">Contact us</p>

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
<button name="envoyer" class="btn btn-info text-muted btn-block" type="submit">envoyer</button>

</form>
  
<!-- Default form contact -->
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