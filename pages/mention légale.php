<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Mention Légales</title>
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
            <div>
                <p>
                Conformément aux dispositions de la loi n° 2004-575 du 21 juin 2004 pour la confiance en l’économie numérique, il est précisé aux utilisateurs du site ITake.fr l’identité des différents intervenants dans le cadre de sa réalisation et de son suivi.</br></br>

                Edition du site</br></br>
                Le site ITake.fr est édité par la société ITake, société par actions simplifiée au capital de 5 000,00 euros, dont le siège social est situé 3 rue Henri Huré, 49300 Cholet.</br>
                </br>
                Responsable de publication</br>
                Frédéric HILLERITEAU</br>
                </br>
                Hébergeur</br>
                Le site ITake.fr est hébergé par la société 1&1 IONOS SARL</br>
                </br>
                Adresse: 7 place de la Gare, 57201 SARREGUEMINES</br>
                </br>
                Le stockage des données personnelles des Utilisateurs est exclusivement réalisé sur les centre de données (« clusters ») localisés dans des Etats membres de l’Union Européenne de la société 1&1 IONOS SARL</br>
                </br>
                Nous contacter</br>
                Par email : support@itake.fr</br>
                </br>
                CNIL</br>
                La société ITake conservera dans ses systèmes informatiques et dans des conditions raisonnables de sécurité une preuve de la transaction comprenant le bon de commande et la facture.</br>
                
                La société ITake a fait l’objet d’une déclaration à la CNIL.</br>
                
                Conformément aux dispositions de la loi 78-17 du 6 janvier 1978 modifiée, l’Utilisateur dispose d’un droit d’accès, de modification et de suppression des informations collectées par ITake. Pour exercer ce droit, il reviendra à l’Utilisateur d’envoyer un message à l’adresse suivante : support@itake.fr
                </p>
            </div>
        </main>

        <footer>
            <div style="width: 100%; height: 200px; background-color: red;"></div>
        </footer>


    </body>
</html>