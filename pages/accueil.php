<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Site marchand</title>
        <link rel="stylesheet" href="../css/style.css">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet"> 
        <script src="../js/side_nav.js"></script>
    </head>

    <?php
	//connexion à la base de données en PDO
	try
	{
		// On se connecte à MySQL
        $bdd = new PDO('mysql:host=localhost;dbname=ppe - db - test1', 'root', '');
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(Exception $e)
	{
		// En cas d'erreur, on affiche un message et on arr�te tout
        die('Erreur : '.$e->getMessage());
    }
    ?>

    <body>
        <header>
            <div id="nav_bar">
                <img id="side_nav_button" onclick="openSideNav()" src="../img/menu.png">
                <a href="">
                    <img src="../img/logo.png" id="logo">
                </a>
                <form action="search.php" method="get">
                    <input type="text" name="s">
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
            <h1>Contenu</h1>
            <!-- Première div article -->
            <div>
            <?php $categorie1 = "Ordinateurs"; ?>
                <p> <?php echo $categorie1 ?></p>
                <div id="flex1accueil">
                <?php
                $req = $bdd->query("select article.* from article where nom_categorie='".$categorie1."'");
                while($ligne = $req->fetch()){
                ?>
                    <div>
                    <img src=<?php echo "../img/article/".$ligne["id_article"]."/0.jpg"?>>
                    <p><?php echo $ligne["nom_article"] ?></p>
                    </div>
                <?php

                }


                ?>
                </div>
            </div>
            <div>
            <?php $categorie2 = "Smartphones"; ?>
                <p> <?php echo $categorie2 ?></p>
                <div id="flex2accueil">
                <?php
                $req = $bdd->query("select article.* from article where nom_categorie='".$categorie2."'");
                while($ligne = $req->fetch()){
                ?>
                    <div>
                    <img src=<?php echo "../img/article/".$ligne["id_article"]."/0.jpg"?>>
                    <p><?php echo $ligne["nom_article"] ?></p>
                    </div>
                <?php

                }


                ?>
            </div>
            <div>
            <?php $categorie3 = "Ordinateurs"; ?>
                <p> <?php echo $categorie3 ?></p>
                <div id="flex3accueil">
                <?php
                $req = $bdd->query("select article.* from article where nom_categorie='".$categorie3."'");
                while($ligne = $req->fetch()){
                ?>
                    <div>
                    <img src=<?php echo "../img/article/".$ligne["id_article"]."/0.jpg"?>>
                    <p><?php echo $ligne["nom_article"] ?></p>
                    </div>
                <?php

                }


                ?>
            </div>
            <div>
            <?php $categorie4 = "Ordinateurs"; ?>
                <p> <?php echo $categorie4 ?></p>
                <div id="flex4accueil">
                <?php
                $req = $bdd->query("select article.* from article where nom_categorie='".$categorie4."'");
                while($ligne = $req->fetch()){
                ?>
                    <div>
                    <img src=<?php echo "../img/article/".$ligne["id_article"]."/0.jpg"?>>
                    <p><?php echo $ligne["nom_article"] ?></p>
                    </div>
                <?php

                }


                ?>
            </div>
        </main>

        <footer>
            <div style="width: 100%; height: 200px; background-color: red;"></div>
        </footer>
    </body>
</html>