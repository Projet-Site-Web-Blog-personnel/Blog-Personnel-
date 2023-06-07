<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title> Liste utilisateurs </title>
    </head>

    <body>

        <section class="section-user" id="content">
            <h3>Utilisateurs enregistrés</h3>
            <table id="table1" class="autumn-text1 tableuser" style="width: 100%">
                <thead>
                    <tr class="tableuser">
                        <th scope="col">Email</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Prénom</th>
                        <th scope="col">Rôle</th>
                        <th scope="col">Modifier</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    require('utils.php');

                    $base = getDB();
                    $donnees = $base->query("SELECT email ,  Nom, Prenom, ID_Role FROM utilisateur")->fetchAll();

                    foreach ($donnees as $row) 
                    {
                            if ($row['email'] != NULL) {
                        ?>
                        <tr>
                            <td><h5><?=$row['email'];?></h5></td>
                            <td><h5><?=$row['Nom']?></h5></td>
                            <td><h5><?=$row['Prenom']?></h5></td>
                            <td><h5><?=$row['ID_Role']?></h5></td>
                            <td>
                                <form method="post" action="modifier_utilisateur.php">
                                    <input type="hidden" name="email" value="<?=$row['email']?>">
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></button>
                                </form>
                            </td>
                            <td>
                                <form method="post" action="supprimer_utilisateur.php">
                                    <input type="hidden" name="email" value="<?=$row['email']?>">
                                    <button type="submit" class="btn btn-danger"><i class="fas fa-times"></i></button>
                                </form>
                            </td>
                        </tr>
                        <?php
                            }
                    }
                    ?>
                </tbody>
            </table>
        </section>
    </body>
</html>