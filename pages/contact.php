<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Contact</title>
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

                <?php if (false)
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
                            <img src="../img/arrow.svg">Username
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
            /*    //connexion à la base de données en PDO
                try
                {
                    // On se connecte à MySQL
                    $bdd = new PDO('mysql:host=localhost;dbname=itake', 'root', 'root');
                }
                catch(Exception $e)
                {
                    // En cas d'erreur, on affiche un message et on arrête tout
                    die('Erreur : '.$e->getMessage());
                }
            */
            ?>
            <div id="contact">
                <h1>Page Contact</h1>
            </div> 
            <form>
                <div id="adresse">
                    <label>Numéro de téléphone :</label></br></br>
                    <label>Adresse : 3 rue Henri Huré 49300 Cholet </label></br></br>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3231.8110347218744!2d-0.8656981842343004!3d47.04917373431027!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48064424376fb649%3A0xfb0f0ed4e900de3f!2s3%20Rue%20Henri%20Hure%2C%2049300%20Cholet!5e1!3m2!1sfr!2sfr!4v1583421386087!5m2!1sfr!2sfr" width="500" height="400" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                </div>    
            </form>
            <form id="table_contact">
                    <div>
                        </br>
                        <label id="email">Email :</label></td>
                        <input id="ecart" type="email" name="email"></td></br></br>
                    </div>
                    <div>
                        <label id="email">Nom : </label>
                        <input type="nom" name="nom"></td></br></br>
                    </div>
                    <div>
                        <label for="message">Message : </label></br>
                        <textarea id="message" name="message" rows=10 cols=50></textarea></br></br>
                    </div>
                    <div>
                        <input class="case" type="submit" value="Envoyer">
                    </div>
            </form>

        </main>

        <footer>
            <div style="width: 100%; height: 200px; background-color: turquoise;"></div>
        </footer>


    </body>
</html>