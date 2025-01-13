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
                class="h-16 bg-white shadow-lg text-black  font-serif font-bold text-3xl py-3 flex flex-row  justify-evenly">
                <div class="flex">
                    <img src="images/title.jpg" alt="Logo" class=" h-10 w-20 object-cover">
                    LuxorAura
                </div>

                <div class="font-bold text-2xl pt-1">
                    Women
                </div>
                <div class="font-bold text-2xl pt-1">
                    Men
                </div>
                <div class="font-bold text-2xl pt-1">
                    Kids
                </div>
                <div>
                    <button class="flex flex-row">
                        <img src="images/search.png" alt="" class="bg-slate-100 h-10 w-10 object-cover rounded-l-md">
                        <input type="text" placeholder="  Search for Product,Brand and More "
                            class="text-lg text-black bg-slate-100  w-96 h-10 rounded-r-md font-normal outline-none">
                    </button>
                </div>
                <div class="h-10 w-10 flex mx-5">
                    <img src="images/2.png" alt="" class="object-cover">
                    <a href="sign.php" class="font-bold text-2xl pt-1">sign</a>
                   
                </div>
                <div class="h-10 w-10 mx-12 flex ">
                    <img src="images/3.png" alt="" class="object-cover">
                    <a href="login.php" class="font-bold text-2xl pt-1">
                        cart
                    </a>    
                </div>
            </div>
        </nav>
        <?php else: ?>
            <nav>
            <div
                class="h-16 bg-white shadow-lg text-black  font-serif font-bold text-3xl py-3 flex flex-row  justify-around">
                <div class="flex">
                    <img src="images/title.jpg" alt="Logo" class=" h-10 w-20 object-cover">
                    LuxorAura
                </div>

                <div class="font-bold text-2xl pt-1">
                    Women
                </div>
                <div class="font-bold text-2xl pt-1">
                    Men
                </div>
                <div class="font-bold text-2xl pt-1">
                    Kids
                </div>
                <div>
                    <button class="flex flex-row">
                        <img src="images/search.png" alt="" class="bg-slate-100 h-10 w-10 object-cover rounded-l-md">
                        <input type="text" placeholder="  Search for Product,Brand and More "
                            class="text-lg text-black bg-slate-100  w-96 h-10 rounded-r-md font-normal outline-none">
                    </button>
                </div>
                <div class="h-10 w-10 flex mx-5">
                    <img src="images/2.png" alt="" class="object-cover">
                    <a href="profile.php" class="font-bold text-2xl pt-1">Profile</a>
                   
                </div>
                <div class="h-10 w-10 mx-12 flex ">
                    <img src="images/3.png" alt="" class="object-cover">
                    <a href="cart.php" class="font-bold text-2xl pt-1">
                        cart
                    </a>    
                </div>
            </div>
        </nav>
        <?php endif; ?>
    </body>
</html>