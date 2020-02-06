<?php
    $s=$_GET["s"];
?>

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
                <div class="article">
                    <div class="front_image">
                        <img class="front_image" src="../img/article/1/1.jpg"/>
                    </div>
                    <div class="description_preview">
                        <div>
                            <h3>Honor 7A</h3>
                            <div>
                                <img class="rating_stars" src="../img/star.svg"/>
                                <img class="rating_stars" src="../img/star.svg"/>
                                <img class="rating_stars" src="../img/star.svg"/>
                                <img class="rating_stars" src="../img/star.svg"/>
                                <img class="rating_stars" src="../img/star.svg"/>
                                (15 avis)
                            </div>
                        </div>
                        <span>120€</span>
                    </div>
                </div>
                <div class="article">
                    <div class="front_image">
                        <img class="front_image" src="../img/article/2/1.jpg"/>
                    </div>
                    <div class="description_preview">
                        <div>
                            <h3>Huawei P Smart 2017 32Gb Noir Smartphone</h3>
                            <div>
                                <img class="rating_stars" src="../img/star.svg"/>
                                <img class="rating_stars" src="../img/star.svg"/>
                                <img class="rating_stars" src="../img/star.svg"/>
                                <img class="rating_stars" src="../img/star.svg"/>
                                <img class="rating_stars" src="../img/star.svg"/>
                                (15 avis)
                            </div>
                        </div>
                        <span>120€</span>
                    </div>
                </div>
            </div>

        </main>

        <footer>
            <div style="width: 100%; height: 200px; background-color: red;"></div>
        </footer>
    </body>
</html>