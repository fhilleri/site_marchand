<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Site marchand - Panier</title>
        <link rel="stylesheet" href="../css/style.css">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet"> 
        <script src="../js/side_nav.js"></script>
        <script src="../js/suppression_panier.js"></script>
    </head>

    <?php
	//connexion à la base de données en PDO
	try
	{
        // On se connecte à MySQL
        if ($_SERVER['SERVER_NAME'] == 'localhost')
        {
            $bdd = new PDO('mysql:host=localhost;dbname=itake;charset=utf8', 'root', '');
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
		// En cas d'erreur, on affiche un message et on arr�te tout
        die('Erreur : '.$e->getMessage());
    }
    $bdd->query("SET NAMES UTF8");
    ?>

    <?php
    $_SESSION['identifiant'] = "User";
    if(isset($_GET['idsup'])){
        $delreq = $bdd->query("delete from panier where panier.id_article='".$_GET['idsup']."' and panier.identifiant='".$_SESSION['identifiant']."'");
        $_GET['idsup'] = null;
    }
    $i = 1;
    $cat = $bdd->query("select id_article from panier where panier.identifiant='".$_SESSION['identifiant']."'");
    while($ligne = $cat->fetch()){
        $panier[$i] = $ligne[0];
        $i += 1;

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
            <h1>Contenu du panier</h1>
            <!-- Boucle div article de panier -->
            <?php
            if(isset($panier) && sizeof($panier) >= 1){
                foreach ($panier as $value) {
                ?>
                <div>

                    <div class="flexaccueil">
                    <?php
                    $req = $bdd->query("select article.* from article where article.id_article='".$value."'");
                    while($ligne = $req->fetch()){
                    ?>
                        <div>
                        <a href=<?php echo "article.php?article=".$ligne['id_article'].""?>>
                        <img src=<?php echo "../img/article/".$ligne["id_article"]."/0.jpg"?>>
                        </a>
                        <p><?php echo $ligne["nom_article"];
                        echo $ligne['prix']?></p>
                        <form method="get">
                        <input type="hidden" name="idsup" value=<?php echo "".$ligne['id_article'].""?>>
                        <button class="supart" type="submit"><img class="supart" src="../img/uncheck.svg"></button>
                        </form>
                        </div>
                    <?php
                    }
                    ?>
                </div>
                <?php
                }
            }
            else {
                echo "Panier vide";
            }
            ?>
        </main>

        <footer>
            <div style="width: 100%; height: 200px; background-color: red;"></div>
        </footer>
    </body>
</html>