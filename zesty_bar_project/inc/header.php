<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Zesty Cocktail Bar website">
    <script src="https://kit.fontawesome.com/4d6a8fe7eb.js" crossorigin="anonymous"></script>
    <link rel="icon" type="./image/x-icon" href="./images/zesty_logo/favicon_dark.png">
    <link rel="stylesheet" href="./css/global.css">
    <link rel="stylesheet" href="./css/nav.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/home.css">
    <link rel="stylesheet" href="./css/footer.css">
    <link rel="stylesheet" href="./css/menu.css">
    <link rel="stylesheet" href="./css/about.css">
    <link rel="stylesheet" href="./css/contact.css">
    <link rel="stylesheet" href="./css/reservation.css">
    

    <title>Zesty Cocktail Bar</title>
</head>
<body>
<div>
    <header>
        

        <div><a href="index.php"><img src="./images/zesty_logo/logo_light.png" alt="Zesty Bar Logo" class="logo"></a></div>

    </header>
        <nav>
            <a id="open" href="#open" class="open"><img src="./images/hamburger.png" alt="hamburger menu"></a>
            <a href="#" class="close"><img src="./images/hamburger.png" alt="hamburger menu"></a>

            <ul class="main-menu">
                <li><a href="index.php" class="<?=empty($page)?'active': '';?>">Home</a></li>
                <li><a href="?menu" class="<?=($page === 'menu')?'active': '';?>">Menu</a></li>
                <li><a href="?about" class="<?=($page === 'about')?'active': '';?>">About</a></li>
                <li><a href="?reservation" class="<?=($page === 'reservation')?'active': '';?>">Reservation</a></li>
                <li><a href="?contact" class="<?=($page === 'contact')?'active': '';?>">Contact</a></li>
            </ul>
        </nav>
</div>
</body>