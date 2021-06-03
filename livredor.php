<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Livre d'Or</title>
        <meta name="description" content="Livre d'or fictif afin d'apprendre MySQL">
        <link rel="stylesheet" href="allscreen.css">
        <link rel="shortcut icon" href="images/livredor.png" type="image/x-icon">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400;600&family=Euphoria+Script&display=swap" rel="stylesheet">
    </head>
    <body>
        <header class="header">
            <nav class="navbar">
                <ul class="social-medias">
                    <a href="http://www.github.com"><img class="nav-img" src="images/github.svg" alt="github"></a>
                    <a href="http://www.twitter.com"><img class="nav-img" src="images/twitter.svg" alt="twitter"></a>
                    <a href="http://www.linkedin.com"><img class="nav-img" src="images/linkedin.svg" alt="linkedin"></a>
                    <a href="http://www.facebook.com"><img class="nav-img" src="images/facebook.svg" alt="facebook"></a>
                
            </nav>
            <div class="banner"></div>
            <h1 class="title">Livre d'or</h1>
        </header>
        <section class="form-section">
            <form action="livredor_post.php" method="post" class="form">
                <input id="pseudo-input" type="text" name="pseudo" placeholder="Pseudo" autofocus required>
                <textarea id="text-input" type="text" name="message" placeholder="Votre message" required></textarea>
                <button id="button-form" type="submit">Envoyer</button>
            </form>
        </section>

        <section class="commentary-section">
        <?php
            try {
                $db = new PDO('mysql:host=localhost;dbname=Test;charset=utf8', 'root', 'root');
            }
            catch (Exception $e) {
                die('Erreur : ' . $e->getMessage());
            }
            
            $answer = $db->query('SELECT * FROM goldbook ORDER BY id DESC LIMIT 0, 10');

            while($datas = $answer->fetch())
            {
                echo '<div class="comment-container"> <div class="pseudo-div">' . htmlspecialchars($datas['pseudo']) . '</div>
                <div class = "commentary-div">' . htmlspecialchars($datas['message']) . '</div></div>';
            }

            if (empty($db))
            {
                echo 'Le livre d\'or est vide. Soyez le premier à commenter !';
            }
            ?>
        </section>

        <footer class="footer">
            <p class="footer-p">Coded and designed by <a href="https://github.com/Margaux-Lacheze">Margaux Lachèze </a></p>
        </footer>
    </body>
</html>
