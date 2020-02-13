<?php
    $s=$_GET["s"];


    try
        {
            // On se connecte à MySQL
            $bdd = new PDO('mysql:host=localhost;dbname=site_marchand', 'root', 'root');
            
            $request = "SELECT article.id_article, article.nom_article, article.prix FROM article";
            $answer = $bdd->prepare($request);
            $answer->execute();
        }
        catch(Exception $e)
        {
            // En cas d'erreur, on affiche un message et on arrête tout
            die('Erreur : '.$e->getMessage());
        }

?>

<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=0.9">
        <title>Site marchand</title>
        <link rel="stylesheet" href="../css/style.css">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet"> 
        <script src="../js/side_nav.js"></script>
    </head>

    <body>
        <header>
            <div id="nav_bar">
                <img id="side_nav_button" onclick="openSideNav()" src="../img/menu.png">
                <a href="">
                    <img src="../img/logo.png" id="logo">
                </a>
                <form>
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
            <h1>Résultats pour la recherche "<?php echo $s ?>"</h1>
            
            <div id="result_box">
            <?php

                while ($row = $answer->fetch())
                {
                    ?>
                        <div class="article">
                            <div class="front_image_contener">
                                <img class="front_image" src="../img/article/<?php echo $row["id_article"] ?>/0.jpg"/>
                            </div>
                            <div class="description_preview">
                                <div>
                                    <h3><a href="article.php?article=<?php echo $row["id_article"] ?>"><?php echo $row["nom_article"] ?></a></h3>
                                    <div class="rating_stars_container">
                                        <?php

                                            $request = "SELECT AVG(note_article.avis_article) as average, COUNT(*) as rateCount
                                            FROM note_article 
                                            WHERE note_article.id_article = :id_article
                                            GROUP BY note_article.id_article";

                                            $rateAnswer = $bdd->prepare($request);
                                            $rateAnswer->bindValue("id_article", $row["id_article"]);
                                            $rateAnswer->execute();

                                            $starId = 0;
                                            $rateCount = 0;
                                            if ($rateAnswer->rowCount() == 0) $starId = -1;
                                            else 
                                            {
                                                $elements = $rateAnswer->fetch();
                                                $rate = $elements["average"];
                                                $rateCount = $elements["rateCount"];
                                            }

                                            for ($i = 1; $i<6; $i++)
                                            {
                                                if ($starId != -1)
                                                {
                                                    if ($rate >= $i) $starId = 2;
                                                    else if ($rate >= $i - 0.5) $starId = 1;
                                                    else $starId = 0;
                                                }

                                                echo ('<img class="rating_stars" src="../img/stars/' . ($starId == -1 ? "null" : $starId) . '.svg"/>');
                                            }
                                            echo ("<span>($rateCount avis)</span>");
                                        ?>
                                    </div>
                                </div>
                                <span><?php echo $row["prix"] . "€" ?></span>
                            </div>
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