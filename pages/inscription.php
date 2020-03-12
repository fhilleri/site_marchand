<?php
    session_start();

    //connexion à la base de données en PDO
    try
    {
        if ($_SERVER['SERVER_NAME'] == 'localhost')
        {
            $bdd = new PDO('mysql:host=localhost;dbname=itake;charset=utf8', 'root', 'root');
            $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        else
        {
            $bdd = new PDO('mysql:host=db672809222.db.1and1.com; dbname=db672809222;charset=utf8', 'dbo672809222', 'BMw1234*');
            $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
    }
    catch(Exception $e)
    {
        // En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
    }

    if (isset($_POST["identifiant"]) &&
        isset($_POST["email"]) &&
        isset($_POST["mdp"]))
    {
        $utilisateurs = $bdd->prepare("SELECT comptes.identifiant
        FROM comptes
        WHERE comptes.identifiant = :id");
        $utilisateurs->bindValue(':id', $_POST["identifiant"]);
        $utilisateurs->execute();
        if ($utilisateurs->rowCount() != 0)
        {
            $erreur_inscription = "Cet identifiant est déjà attribué !";
        }
        else
        {
            $new_compte = $bdd->prepare("INSERT INTO `comptes` (`identifiant`, `mot_de_passe`) VALUES (:id, :mdp);");
            $new_compte->bindValue(':id', $_POST["identifiant"]);
            $new_compte->bindValue(':mdp', $_POST["mdp"]);
            $new_compte->execute();
            
            $new_compte = $bdd->prepare("INSERT INTO `utilisateur` (`identifiant`, `point_de_fidelite`, `email`) VALUES (:id, 0, :email);");
            $new_compte->bindValue(':id', $_POST["identifiant"]);
            $new_compte->bindValue(':email', $_POST["email"]);
            $new_compte->execute();

            $_SESSION["identifiant"] = $_POST["identifiant"];

            $erreur_inscription = "";
        }
    }
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Page d'inscription</title>
        <link rel="stylesheet" href="../css/style.css">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet"> 
        <script src="../js/side_nav.js"></script>
    </head>
    <head>
    <body>
    <header>
            <div id="nav_bar">
                <img id="side_nav_button" onclick="openSideNav()" src="../img/menu.png">
                <a href="">
                    <img src="../img/logo.png" id="logo">
                </a>
                <form>
                    <input type="text" name="search">
                </form>

                <?php if (!isset($_SESSION["identifiant"]))
                {
                ?>
                    <a id="connect">
                    Se connecter
                    </a>
                <?php
                }
                else
                {
                ?>
                    <div id="profile_panel">
                        <button id="profile_panel_button">
                            <img src="../img/arrow.svg"><?php echo $_SESSION["identifiant"] ?>
                        </button>
                        <div id="profile_panel_content">
                            <a href=""><img src="../img/user.svg">Mon compte</a>
                            <a href=""><img src="../img/cart.svg">Mon panier</a>
                            <a href=""><img src="../img/logout.svg">Déconnection</a>
                        </div>
                    </div>
                <?php
                }?>
            </div>
        </header>
        <div id="side_nav_container">
            <nav id="side_nav">
                <h2>Multimédia</h2>
                <ul>
                    <li><a href="">Ordinateurs fixes</a></li>
                    <li><a href="">Ordinateurs portables</a></li>
                    <li><a href="">Smartphones</a></li>
                    <li><a href="">Tablettes</a></li>
                    <li><a href="">Enceintes</a></li>
                </ul>
                <h2>Électroménagé</h2>
                <ul>
                    <li><a href="">Machines à café</a></li>
                    <li><a href="">Machines à laver</a></li>
                    <li><a href="">Micro ondes</a></li>
                    <li><a href="">Blenders</a></li>
                </ul>
            </nav>
        </div>

        <main>
            <?php
                

                if (isset($erreur_inscription))
                {
                    if ($erreur_inscription == "")
                    {
                        echo "<h1>Votre inscritption a été prises en compte !</h1>";
                    }
                    else
                    {
                        echo $erreur_inscription;
                    }
                }
                else
                {
                    ?>

                        <div id="connexion">
                            <form method=post>
                                <h4>Inscription</h4></br>
                                <table id="table_connexion">
                                    <tr>
                                        <td><label>Identifiant :</label></td>
                                        <td><input required type="text" name="identifiant"></td>
                                    </tr>
                                    <tr>
                                        <td><label>Email :</label></td>
                                        <td><input required type="email" name="email"></td>
                                    </tr>
                                    <tr>
                                        <td><label>Mot de passe :</label></td>
                                        <td><input required type="password" name="mdp" ></td></br>
                                    </tr>
                                    <tr>
                                        <td><label>Répéter le Mot de passe :</label></td>
                                        <td><input required type="password" name="mdp2" ></td></br>
                                    </tr>
                                    <?php 
                                    /*    if ("mdp" == "mdp2")
                                        {
                                            echo "OK";
                                        } 
                                        else
                                        {
                                            echo "";
                                        }
                                    */
                                    ?>
                                    <tr>
                                        <td></td><td><input required type="checkbox" name="cgu">J'accepte les conditions générales d'utilisations</td></br>
                                        <?php 
                                        /* 
                                        if (empty($_POST["cgu"]))
                                        {
                                            echo "Vous n'avez pas accepter les cgu"
                                        }
                                        */
                                        ?>
                                    </tr>
                                </table>
                                <div>
                                    <input class="case" type="submit" value="S'inscrire">
                                </div>
                            </form>
                                
                            
                            
                        </div>

                    <?php
                }
            ?>
            
        </main>

        <footer>
            <div style="width: 100%; height: 200px; background-color: red;"></div>
        </footer>


    </body>
</html>