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
                <div class="slides active" style="background-image: url(images/car1.jpeg);"></div>
                <div class="slide" style="background-image: url(images/car2.jpeg);"></div>
                <div class="slide" style="background-image: url(images/car3.jpeg);"></div>
            </div>
            <div class="controls">
                <button id="prev">Previous</button>
                <button id="next">Next</button>
            </div>
 
</section>
<section class = "products">
    <h1>top products</h1>
    <div class="cards">
     <div class="product1">
        <div class="image">
            <img src="car1.jpeg">
        </div>
         <div class="text">
            <h1>car</h1>
            <p>Lorem ipsum dolor sit amet.</p>
         </div>
     </div> 
     <div class="product1">
        <div class="image">
            <img src="car1.jpeg">
        </div>
         <div class="text">
            <h1>car</h1>
            <p>Lorem ipsum dolor sit amet.</p>
         </div>
     </div>
     <div class="product1">
        <div class="image">
            <img src="car1.jpeg">
        </div>
         <div class="text">
            <h1>car</h1>
            <p>Lorem ipsum dolor sit amet.</p>
         </div>
     </div> 
     <div class="product1">
        <div class="image">
            <img src="car1.jpeg">
        </div>
         <div class="text">
            <h1>car</h1>
            <p>Lorem ipsum dolor sit amet.</p>
         </div>
     </div>
     

    </div>
</section>
</main>

<footer>

</footer>





</body>