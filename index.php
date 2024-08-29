<?php
require 'db.php';
?>
<!DOCTYPE>
    <html>
    <head>
        <meta charset = "UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <link rel="stylesheet" href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css'>
        <title>
        shopping
        </title>
        <link rel="stylesheet" href="style2.css">
    </head>
<body>
<header>
    <div>
    <h1>shopping</h1>
</div>

<div>
<nav>
    <ul> 
        
        <li>
            <a href="">
        <i class='bx bx-cart'></i>
        <p>cart</p>
    </a>
        </li>
    
    
        <li>
             <a href="">
        <i class='bx bx-cog' ></i>
        <p>setting</p>
    </a>
        </li>


        <li>
            <a href="">
        <i class='bx bx-log-out' ></i>
        <p>logout</p>
    </a>
        </li>

    </ul>

</nav>
</div>

</header>

<main>

<section class = "hero">
<div class="hero">
                <div class="slides active" style="background-image: url(car1.jfif);"></div>
                <div class="slide" style="background-image: url(car2.jfif);"></div>
                <div class="slide" style="background-image: url(car3.jfif);"></div>
            </div>
            <div class="controls">
                <button id="prev">Previous</button>
                <button id="next">Next</button>
            </div>
 
</section>
<section class = "products">
</section>
</main>

<footer>

</footer>





</body>