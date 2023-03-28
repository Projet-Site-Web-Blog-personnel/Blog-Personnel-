<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Form</title>
    <link rel="stylesheet" href="pagelogin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="enregistrement.js"> </script>
</head>

<body class ="test">
<header>
        <div class="logo left">
            <img src="img/logo.png" alt="logo's picture" class="left2" >
        </div>
        <div class="title">
            <h1> WINOX</h1>
        </div>
        <div class="about">
            <h2>About us</h2>
        </div>
    </header>
    <div class="title2">
        <h1> WINOX</h1>
    </div>
    <div class="description">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem corrupti commodi nihil voluptatum velit atque tempore ex. Temporibus ab officiis rem numquam dicta quidem sequi iure, dignissimos hic porro eius.</p>
    </div>
    <div class="believe">
        <p>Believe in it ! </p>
    </div>
    <div class="box-sign"> 

        <form action="enregistrement.php" method="post" onsubmit="return checkPassword()"> <!-- opening tag for form element -->

            <h2> S'enregistrer </h2> 
            <div class="inputBox"> 
                <input type="text" name="email" required="required">
                <span>Votre email</span> 
                <i></i>
            </div>
            <div class="inputBox"> 
                <input type="password" name="mot_de_passe" id="mot_de_passe1" required="required">
                <span>Votre mot de passe</span> 
                <i></i>
            </div> 
            <div class="inputBox">
                <input type="password" name="mot_de_passe" id="mot_de_passe2" required="required">
                <span>Confirmer votre mot de passe</span> 
                <i></i> 
            </div> 
            <div class="inputBox"> 
                <input type="text" name="Nom" required="required">
                <span>Votre nom</span> 
                <i></i> 
            </div>
            <div class="inputBox"> 
                <input type="text" name="Prenom" required="required">
                <span>Votre prénom</span> 
                <i></i>
            </div>
            <div class="inputBox">
                <input type="text" name="ID_Role" required="required">
                <span>Rôle</span> 
                <i></i> 
            </div>
            <div class="links"> 
                <a href="pagelogin.php">Login</a>
            </div>
            <input type="submit" value="Save"> 

            <?php
            if (isset($_POST['email']) && isset($_POST['mot_de_passe']) && isset($_POST['ID_Role']) && isset($_POST['Nom']) && isset($_POST['Prenom'])) {

                $email = $_POST['email'];
                $mot_de_passe = $_POST['mot_de_passe'];
                // $hashed_password = password_hash($mot_de_passe, PASSWORD_DEFAULT);
                $ID_Role = $_POST['ID_Role'];
                $Nom = $_POST['Nom'];
                $Prenom = $_POST['Prenom'];

                $db = new PDO('mysql:host=localhost;dbname=projetannuel;charset=utf8', 'root', '');

                $stmt = $db->prepare("INSERT INTO utilisateur (email,mot_de_passe,ID_Role,Nom,Prenom) VALUES (:email, :mot_de_passe, :ID_Role, :Nom, :Prenom)");

                $stmt->bindParam(':mot_de_passe', $mot_de_passe);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':ID_Role', $ID_Role);
                $stmt->bindParam(':Nom', $Nom);
                $stmt->bindParam(':Prenom', $Prenom);


                $stmt->execute();

                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>C est nickel</strong> l ajout est OK.
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
            }
            if (isset($_POST['mot_de_passe']) && validatePassword($_POST['mot_de_passe'])) {
                // Traiter le formulaire
            } else {
                echo "Le mot de passe doit comporter au moins huit caractères, une lettre minuscule, une lettre majuscule, un chiffre et un caractère spécial.";
            }

            ?>

            <?php
            function validatePassword($password)
            {
                $uppercase = preg_match('@[A-Z]@', $password);
                $lowercase = preg_match('@[a-z]@', $password);
                $number    = preg_match('@[0-9]@', $password);
                $specialChars = preg_match('@[^\w]@', $password);

                if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
                    return false;
                } else {
                    return true;
                }
            }
            ?>

        </form> <!-- closing tag for form element -->



    </div> <!-- closing tag for box div -->
</body>

</html>