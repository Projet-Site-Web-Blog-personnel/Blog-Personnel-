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

<body class="test">
    <header>
        <div class="logo left">
            <img src="img/logo.png" alt="logo's picture" class="left2">
        </div>
        <div class="title">
            <h1> WINOX</h1>
        </div>
        <div class="about">
            <h2>About us</h2>
        </div>
    </header>
    <div class="container">
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

            <form action="enregistrement.php" method="post" onsubmit="return checkPassword()">
                <h2> Sign up </h2>
                <div class="inputBox">
                    <input type="text" name="email" required>
                    <Label> Email <Address></Address></Label>
                    <i></i>
                </div>
                <!-- <div class="inputBox">
                    <input type="password" name="mot_de_passe" id="mot_de_passe" >
                    <label for="">Fistname</label>
                    <i></i>
                </div> -->
                <div class="inputBox">
                    <input type="password" name="mot_de_passe" id="mot_de_passe2" required>
                    <label for=""> Password </label>
                    <i></i>
                </div>
                <div class="inputBox">
                    <input type="text" name="nom" required>
                    <label for=""> Name</label>
                    <i></i>
                </div>
                <div class="inputBox">
                    <input type="text" name="prenom" required>
                    <label for=""> Prenom</label>
                    <i></i>
                </div>
                <div class="inputBox">
                    <input type="text" name="ville" required="required">
                    <label for=""> City </label>
                    <i></i>
                </div>
                <div class="links">
                    <a href="pagelogin.php">Login</a>
                </div>
                <input type="submit" value="Create">
        </div>
        <?php
        if (isset($_POST['email']) && isset($_POST['mot_de_passe']) && isset($_POST['ville']) && isset($_POST['nom']) && isset($_POST['prenom'])) {

            $email = $_POST['email'];
            $mot_de_passe = $_POST['mot_de_passe'];
            // $hashed_password = password_hash($mot_de_passe, PASSWORD_DEFAULT);
            $Nom = $_POST['nom'];
            $Prenom = $_POST['prenom'];
            $ville = $_POST['ville'];
            $db = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');
            $stmt = $db->prepare("INSERT INTO utilisateur (email,mot_de_passe,nom,prenom,ville) VALUES (:email, :mot_de_passe,:nom, :prenom, :ville)");
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':mot_de_passe', $mot_de_passe);
            $stmt->bindParam(':Nom', $Nom);
            $stmt->bindParam(':Prenom', $Prenom);
            $stmt->bindParam(':ville', $ville);
            if ($stmt->execute()) {
                // Affichage d'un message de succès
                echo "L'insertion a été effectuée avec succès !";
            } else {
                // Affichage d'un message d'erreur
                echo "Une erreur est survenue lors de l'insertion des données.";
            }
        }
        // if (isset($_POST['mot_de_passe']) && validatePassword($_POST['mot_de_passe'])) {
        // } else {
        //     echo "Le mot de passe doit comporter au moins huit caractères, une lettre minuscule, une lettre majuscule, un chiffre et un caractère spécial.";
        // }

        ?>

        <!-- <?php
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
                ?> -->

        </form> <!-- closing tag for form element -->



    </div> <!-- closing tag for box div -->
</body>

</html>