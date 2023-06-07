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
                    <input type="password" name="mot_de_passe" id="">
                    <label for="">P</label>
                    <i></i>
                </div> -->
                <div class="inputBox">
                    <input type="password" name="mot_de_passe" id="">
                    <label for=""> Password </label>
                    <i></i>
                </div>
                <div class="inputBox">
                    <input type="text" name="Nom">
                    <label for=""> Name</label>
                    <i></i>
                </div>
                <div class="inputBox">
                    <input type="text" name="Prenom">
                    <label for=""> Prenom</label>
                    <i></i>
                </div>
                <div class="inputBox">
                    <input type="text" name="ville">
                    <label for=""> City </label>
                    <i></i>
                </div>
                <div class="links">
                    <a href="pagelogin.php">Login</a>
                </div>
                <input type="submit" value="Create">
        </div>
        <?php
            use PHPMailer\PHPMailer\PHPMailer;
            use PHPMailer\PHPMailer\Exception;

            // Chargement des classes PHPMailer
            require_once 'PHPMailer/src/PHPMailer.php';
            require_once 'PHPMailer/src/SMTP.php';
            require_once 'PHPMailer/src/Exception.php';

            if (isset($_POST['email']) && isset($_POST['mot_de_passe']) && isset($_POST['ville']) && isset($_POST['Nom']) && isset($_POST['Prenom'])) 
            {
                $email = $_POST['email'];
                $mot_de_passe = $_POST['mot_de_passe'];
                $hashed_password = password_hash($mot_de_passe, PASSWORD_DEFAULT);
                $ville = $_POST['ville'];
                $Nom = $_POST['Nom'];
                $Prenom = $_POST['Prenom'];

                $db = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');
                $stmt = $db->prepare("INSERT INTO utilisateur (email, mot_de_passe, Nom, Prenom,ville) VALUES (:email, :mot_de_passe, :Nom, :Prenom, :ville)");
                $stmt->bindParam(':mot_de_passe', $mot_de_passe);
                $stmt->bindParam(':mot_de_passe', $hashed_password);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':Prenom', $Prenom);
                $stmt->bindParam(':Nom', $Nom);
                $stmt->bindParam(':ville', $ville);

                $stmt->execute();

                echo "<script> alert('Utilisateur bien ajouté') </script>";

                // Configuration de PHPMailer
                $mail = new PHPMailer(true);
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'equipedevdufutur2023@gmail.com';
                $mail->Password = 'ntdvhzvqkelbdmrm';
                $mail->SMTPSecure = 'ssl';
                $mail->Port = 465;

                // Définition des en-têtes du message électronique
                $mail->setFrom('equipeDevDuFutur2023@gmail.com', 'Equipe de choc');
                $mail->addAddress($email, $Prenom);
                $mail->isHTML (true);
                $mail->Subject = 'Bienvenue sur WINOX';
                $mail->Body    = "Bonjour $Prenom, \n\n F&eacute;licitation , tu es d&eacute;sormais chez nous !! Voici ton mot de passe pour te connecter: $mot_de_passe .";

                // Envoi de l'e-mail
                if(!$mail->send()) {
                    echo 'Erreur : ' . $mail->ErrorInfo;
                } else {
                    echo 'Message envoyé avec succès';
                }
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

        </form>



    </div> 
</body>

</html>