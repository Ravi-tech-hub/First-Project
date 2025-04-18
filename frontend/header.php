<?php
    session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Luxor Aura</title>
    <link rel="icon" href="title.jpg">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
   
    <?php if (!isset($_SESSION['id'])): ?>
        <nav>
            <div
                class="h-16 bg-white shadow-lg text-black  font-serif font-bold text-3xl py-3 flex  justify-between">
                <div class="flex">
                    <img src="../images/title.jpg" alt="Logo" class=" h-8 w-16 object-cover">
                    LuxorAura
                    <div class="flex flex-wrap">
                    <a href="women.php" class="font-bold text-2xl pt-1 ml-4"> Women</a>
                    <a href="men.php" class="font-bold text-2xl pt-1 mx-3"> Men</a>
                    <a href="kid.php" class="font-bold text-2xl pt-1 mx-3"> Kid</a>
                    </div>
                    
                </div>

                <div>
                    
                </div>
                <div class="flex flex-wrap">
                    <!-- <img src="../images/2.png" alt="" class="object-cover h-10 w-10"> -->
                    <a href="women.php" class="font-bold text-2xl pt-1 mx-3">Home</a>
                    <a href="sign.php" class="font-bold text-2xl pt-1 mx-3">Signup</a>
                    <a href="cart.php" class="font-bold text-2xl pt-1 mx-3">
                        Cart
                    </a>
                   
                </div>
            </div>
        </nav>
        <?php else: ?>
            <nav>
            <div
                class="h-16 bg-white shadow-lg text-black  font-serif font-bold text-3xl py-3 flex flex-wrap justify-between">
                <div class="flex">
                    <img src="../images/title.jpg" alt="Logo" class=" h-8 w-16 object-cover">
                    LuxorAura
                    <a href="women.php" class="font-bold text-2xl pt-1 ml-6"> Women</a>
                    <a href="men.php" class="font-bold text-2xl pt-1 mx-3"> Men</a>
                    <a href="kid.php" class="font-bold text-2xl pt-1 mx-3"> Kid</a>
                    
                </div>

                <div>
                    
                </div>
                <div class="flex">
                    <!-- <img src="../images/2.png" alt="" class="object-cover h-10 w-10"> -->
                    <a href="women.php" class="font-bold text-2xl pt-1 mx-3">Home</a>
                    <a href="cart.php" class="font-bold text-2xl pt-1 mx-3">
                        Cart
                    </a> 
                    <a href="../backend/orderhistory_backend.php" class="font-bold text-2xl pt-1 mx-3">
                        Order
                    </a>

                    <a href="../backend/logout.php" class="font-bold text-2xl pt-1 mx-3">Logout</a>
                   
                </div>
            </div>
        </nav>
        <?php endif; ?>
    </body>
</html>