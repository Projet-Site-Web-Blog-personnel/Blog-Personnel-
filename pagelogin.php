<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="pagelogin.css">
</head>

<body>
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
    <div class="box"> <!-- creating a div element with class "box" -->

        <form action="pagelogin.php" method="post"> <!-- opening tag for form element -->

            <h2>Login </h2> <!-- heading with text "Login Form" -->

            <div class="inputBox"> <!-- creating a div element with class "inputBox" -->

                <input type="text" name="email" required="required">

                <!-- input field of type text with required attribute set to true -->

                <span>Email address</span> <!-- label for the input field with text "UserName" -->

                <i></i> <!-- empty i element used for styling purposes -->

            </div> <!-- closing tag for inputBox div -->

            <div class="inputBox"> <!-- creating another div element with class "inputBox" -->

                <input type="password" name="mot_de_passe" required="required">

                <!-- input field of type password with required attribute set to true -->

                <span>Password</span> <!-- label for the input field with text "Password" -->

                <i></i> <!-- empty i element used for styling purposes -->

            </div> <!-- closing tag for inputBox div -->

            <div class="links"> <!-- creating a div element with class "links" -->

                <a href="forgotpassword.html">Forgot password ?</a>
                <!-- link with text "Forgot Password" and href attribute set to "#" -->

                <a href="enregistrement.php">SignUp</a> <!-- link with text "SignUp" and href attribute set to "#" -->

            </div> <!-- closing tag for links div -->

            <input type="submit" value="login"> <!-- submit button with value "Login" -->

        </form> <!-- closing tag for form element -->
    </div>

    <?php
    if (isset($_POST['email']) && isset($_POST['mot_de_passe'])) {

        $email = $_POST['email'];
        $mot_de_passe = $_POST['mot_de_passe'];
        $db = new PDO('mysql:host=localhost;dbname=projetannuel;charset=utf8', 'root', '');
        $stmt = $db->prepare("SELECT * FROM utilisateur WHERE email = :email AND mot_de_passe = :mot_de_passe");
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':mot_de_passe', $mot_de_passe);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $ID_Role = $row['ID_Role'];
            if ($ID_Role == 1) {
                header("Location: pageadmin.php");
            } elseif ($ID_Role == 2) {
                header("Location: pagecompta.php");
            } elseif ($ID_Role == 3) {
                header("Location: pageuser.php");
            }
        } else {

            // Pour afficher un message d'alerte si la connexion est impossible
            echo '<div class="alert alert-danger" role="alert"> Connexion impossible, êtes vous inscrit ? <a href="mailto:?to=admin@entreprise.com &subject=Identifiant%20non%20enregistré &body=Bonjour,%20mes%20identifiants%20n ont%20pas%20été%20saisi."> Si vous n\'avez pas d\'identifiant </a>. Cliquez pour vous inscrire. </div>';
        }

        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>C est nickel</strong> l ajout est OK.
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
    }
    ?>

</body>

</html>