<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <link rel="stylesheet" href="style3.css">

</head>

<body>
    <div class="container">
        <form action="stk_initiate.php">
            <div class="row">
                <div class="column">
                    <h3 class="title">Billing Address</h3>
                    <div class="input-box">
                        <span>Full Name:</span>
                        <input type="text" placeholder="Enter full name">
                    </div>

                </div>



                <div class="column">
                    <h3 class="title">Payment</h3>
                    <div class="input-box">
                        <span>Cards Accepted:</span>
                        <img src="xampp/online-shopping-webvsite-in-php-master/shopping/images/card_img.png">
                    </div>
                    <div class="input-box">
                        <span>Amount:</span>
                        <input type="text" name="Amount" placeholder="Enter Amount">

                    </div>
                    <div class="input-box">
                        <span>Phone:</span>
                        <input type="text" name="Phone" placeholder="Enter Phone">

                    </div>

                </div>
            </div>
    </div>

    <button type="submit" class="btn"><a href="checkout.php">Proceed To Checkout</a></button>
    </form>
    </div>

</body>

</html>