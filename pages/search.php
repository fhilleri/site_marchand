<?php
    
    if (isset($_GET["s"])) $s=$_GET["s"];
    else $s = "";

    if (isset($_GET["categories"])) $categories = $_GET["categories"];
    else $categories = ["all"];

    if (isset($_GET["stocks"])) $stock = $_GET["stocks"];
    else $stock = ["en_stock", "en_rupture_de_stock"];

    try
    {
        // On se connecte à MySQL
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
        $bdd->query("SET NAMES UTF8");
        
        $request = "SELECT article.id_article, article.nom_article, article.prix FROM article
        WHERE article.nom_article LIKE '%$s%'";
        
        if (in_array("not_empty", $categories))
        {
            $request = $request . " AND article.nom_categorie IN (";
            foreach ($_GET["categories"] as $key => $value) {
                $request = $request . ($key == 0 ? "" : ",") . '"' . $value . '"';
            }      
            $request = $request . ")";
        }

        if (!in_array("en_stock", $stock)) $request = $request . " AND article.stock = 0";
        if (!in_array("en_rupture_de_stock", $stock)) $request = $request . " AND article.stock > 0";
        
        echo $request;

        $answer = $bdd->prepare($request);
        $answer->execute();

        $requestCountCategories = "SELECT nom_categorie, COUNT(*) as compte
        FROM article
        GROUP BY nom_categorie";
        $answerCountCategories = $bdd->prepare($requestCountCategories);
        $answerCountCategories->execute();
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
        <script src="../js/filter_box.js"></script>
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
            <div id="main_box">
                
                <div id="filter_box_container" class="open">
                    <form id="filter_box">
                        <input type="hidden" name="s" value="<?php echo $s ?>">
                        <h2>Filtres</h2>

                        <input type="submit"/>

                        <div class="filter">

                            <div class="filter_header" onclick="switchFilterOption(this);">
                                <img src="../img/arrow.svg"/>
                                <h3>Catégories</h3>
                            </div>

                            <div class="filter_options">
                                <input type="hidden" name="categories[]" value="not_empty"/>
                                <?php
                                    while ($row = $answerCountCategories->fetch()) {
                                        ?>
                                        <div>
                                            <input type="checkbox" name="categories[]" value="<?php echo $row["nom_categorie"]?>" <?php if (in_array($row["nom_categorie"], $categories) || in_array("all", $categories)) echo " checked "; ?> >
                                            <label><?php echo $row["nom_categorie"] . " (" . $row["compte"] . ")"?></label>
                                        </div>
                                        <?php
                                    }
                                ?>
                            </div>
                        </div>

                        <div class="filter">

                            <div class="filter_header" onclick="switchFilterOption(this);">
                                <img src="../img/arrow.svg"/>
                                <h3>Stocks</h3>
                            </div>

                            <div class="filter_options">
                                <input type="hidden" name="stocks[]" value="not_empty"/>
                                <div>
                                    <input type="checkbox" name="stocks[]" value="en_stock" <?php if (in_array("en_stock", $stock)) echo " checked" ?> requied>
                                    <label>En stock</label>
                                </div>
                                <div>
                                    <input type="checkbox" name="stocks[]" value="en_rupture_de_stock" <?php if (in_array("en_rupture_de_stock", $stock)) echo " checked" ?>>
                                    <label>En rupture de stock</label>
                                </div>
                            </div>
                        </div>

                        <div class="filter">

                            <div class="filter_header" onclick="switchFilterOption(this);">
                                <img src="../img/arrow.svg"/>
                                <h3>Prix</h3>
                            </div>

                            <div class="filter_options">
                                <div>
                                    <label style="float:left">Minimum :</label>
                                    <input style="width:80px; float:right" type="number" name="prix_min" value="0" min="0"/>
                                    <label style="float:left">Maximum :</label>
                                    <input style="width:80px; float:right" type="number" name="prix_max" value="0" min="0"/>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                
                <div id="result_box">
                    <button onclick="switchFilterBox();">Filtres</button>
                    <h1>Résultats pour la recherche "<?php echo $s ?>"</h1>
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
            </div>
        </main>

        <footer>
            <div style="width: 100%; height: 200px;"></div>
        </footer>
    </body>
</html>