<!DOCTYPE html>
<html lang="cs-cz">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="martinHeiler">
        <meta name="description" content="čalounictví Michal Heiler">
        <meta name="keywords" content="čalounictví, oprava nábytku, přečalounění">
        <link rel="shortcut icon" href="obrazky/sofaico.ico">
        <link rel="stylesheet" href="styl.css" >
        <link rel="stylesheet" href="responsive.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <title>Čalounictví Michal Heiler</title>
    </head>
    <body>
        <header>
              <div class="company">   
                <h1><img class="logo" src="obrazky/logoCalounictvi.png" alt="logo">
                    ČALOUNICTVÍ<br/><small>Michal Heiler</small></h1>
                
                    <div class="container-contact">
                        <a href="https://www.facebook.com/profile.php?id=100089204494468" target="_blank"><i class="fa-brands fa-square-facebook" style="color: #326dd2;"></i></a>            
                        <i class="fa-solid fa-phone-volume"></i>
                        <span>+420 605 265 293</span>
                    </div>
            </div>
        </header>
    <nav>
        <ul>
            <li><a href="index.php">Úvodní&nbsp;stránka</a></li>
            <li><a href="galerie.php">Galerie</a></li>
            <li><a href="vzorníky.php">Vzorníky&nbsp;látek</a></li>
            <li class="active"><a href="poptavka.php">Nezávazná&nbsp;poptávka</a></li>
            <li><a href="kontakt.php">Kontakt</a></li>
        </ul>
    </nav>
    <?php
         mb_internal_encoding("UTF-8");
         $hlaska = '';
         if ($_POST){
            if (
                isset($_POST['jmeno']) && $_POST['jmeno'] &&
                isset($_POST['email']) && $_POST['email'] &&
                isset($_POST['text']) && $_POST['text'] //&&
               
            ) {
                $hlavicka = 'From:' . $_POST['email'];
                $hlavicka .= "\nMIME-Version: 1.0\n";
                $hlavicka .= "Content-Type: text/html; charset=\"utf-8\"\n";
                $adresa = 'martin.heiler@seznam.cz';
                $predmet = 'Poptávka';
                $uspech = mb_send_mail($adresa, $predmet, $_POST['text'], $hlavicka);
                if ($uspech) {
                    $hlaska = 'Email byl úspěšně odeslán.';
                } else
                    $hlaska = 'Email se nepodařilo odeslat. Zkontrolujte adresu.';
            } else
                $hlaska = 'Formulář není správně vyplněný!';  
         }
         ?>   
        
         <?php
            if (isset($hlaska)){
                echo ('<p>' . $hlaska . '</p>');
            }
        ?>
        
        <div class="formular">
            <form method="post">
                <label for="jmeno"> Jméno a Přijmení </label><br>
                <input type="text" id="jmeno" name="jmeno" required><br>
                <label for="email">Email</label><br>
                <input type="email" id="email" name="email" required><br>
                <label for="text">Text</label><br>
                <textarea name="text" id="text" cols="35" rows="10"></textarea><br>
                <input type="file" name="attachment" accept=".jpg, .png"><br>
                <input type="submit" value="odeslat">
            </form>
        </div>    
    <footer>
        &copy; čalounictví Michal Heiler
    </footer>
</body>
</html>