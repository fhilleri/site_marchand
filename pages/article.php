<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Page <?php echo"test";?></title>
        <link rel="stylesheet" href="../css/style_article.css">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet"> 
        <script src="../js/side_nav.js"></script>
    </head>

    <?php
	//connexion à la base de données en PDO
	try
	{
		// On se connecte à MySQL
		$bdd = new PDO('mysql:host=localhost;dbname=ppe - db - test1', 'root', '');
	}
	catch(Exception $e)
	{
		// En cas d'erreur, on affiche un message et on arr�te tout
        die('Erreur : '.$e->getMessage());
    }
    $reponse = $bdd->query('select * from article where id_article=1');
    $ligne = $reponse->fetch();
    ?>	

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
        

        <h1>Page <?php echo $ligne["nom_article"]?></h1>
        
            <div style="width: 100%; height: 1500px; background-color: gray;">
            
                <div id="flexarticle">
                    
                    <div class="img_article">
                    <img class="img_article" src="../img/article/1/1.jfif">
                    </div>
                    <div>
                    <p id="nomarticle"> 
                        <?php echo $ligne["nom_article"]?>
                    </p>

                    <p id="prixarticle"> 
                        <?php echo $ligne["prix"]?> € 
                    </p>

                    <p id="stock">
                        <?php
                        $Stock = $bdd->query('select stock from article where id_article=1');
                        $Stock = $Stock->fetch();
                        if($Stock > 0) {
                        ?><img id="checkmark" src="../img/check.svg"><?php echo "Produit en stock";
                        }
                        ?>
                    </p>

                    <button id="ajout_panier">
                    <img id="cart" src="../img/cart.svg">
                    Ajouter au panier
                    </button>
                </div>
            </div>
            <div>
                <h1>Description :</h1>
                <p>TEXT</p>
            </div>
            <div>
                <h1>Caractéristique :</h1>
                <table border="2">
                    <tr><td width="150">TEXT</td><td width="250">TEXT</td></tr>
                </table>
                
                
            </div>
            <div>
                <h1>Avis :</h1>
                <p>
                <table>
                <?php
                $resavis = $bdd->query("Select * from commentaire where id_article=1");


                while($avis = $resavis->fetch())
                {
                $resuser = $bdd->query("Select * from a_ecrit where id_commentaire=".$avis["id_commentaire"]);
                $user = $resuser->fetch();
                $resnote = $bdd->query("Select AVG(avis) from note where id_commentaire=".$avis["id_commentaire"]);
                $note = $resnote->fetch();
                ?>
                <div class="commentaire">
                    <div class="commentaire_flex1">
                        <p class="auteur_commentaire">
                            <?php
                            echo $user[0];
                            ?>
                        </p>
                        <p class="note_commentaire">
                            <?php
                            echo "Note : ".round($note[0], 1);
                            ?>
                        </p>
                    </div>

                    <div class="commentaire_flex2">
                        <p class="valeur_commentaire">
                            <?php
                            echo $avis["valeur_commentaire"];
                            ?>
                        </p>
                    </div>
                </div>
                <?php
                }
                ?>
                </table>
                </p>
            </div>

        </main>

        <footer>
            <div style="width: 100%; height: 200px; background-color: red;"></div>
        </footer>
    </body>
</html>