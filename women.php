
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Luxor Aura</title>
    <link rel="icon" href="title.jpg">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-zinc-200">

    <?php
        include 'header.php';
    ?>
    <main>
        <div class="mt-3">
        <div class="mt-3">
            <a href="women.php" class="hover:underline font-serif ml-28">WOMEN</a>
            <a href="men.php" class="hover:underline px-10 font-serif">MEN</a>
            <a href="kid.php" class="hover:underline  font-serif">KID</a>
        </div>
        </div>

        <section class="flex flex-row  justify-center mt-5">
            <div class="px-6">
                <a href=""><img src="image/winter.jpg" alt="" class="object-cover rounded-full h-12 w-12"></a>
                <figcaption>Winter</figcaption>
            </div>
            <div class="px-6">
                <a href=""><img src="image/kurtas.jpg" alt="" class="object-cover rounded-full h-12 w-12"></a>
                <figcaption>kurtas</figcaption>
            </div>
            <div class="px-6">
                <a href=""><img src="image/tops.jpg" alt="" class="object-cover rounded-full h-12 w-12"></a>
                <figcaption>Tops</figcaption>
            </div>
            <div class="px-6">
                <a href=""><img src="image/sarees.jpg" alt="" class="object-cover rounded-full h-12 w-12"></a>
                <figcaption>Sarees</figcaption>
            </div>
            <div class="px-6">
                <a href=""><img src="image/suits.jpg" alt="" class="object-cover rounded-full h-12 w-12"></a>
                <figcaption>suits</figcaption>
            </div>
            <div class="px-6">
                <a href=""><img src="image/bottoms.jpg" alt="" class="object-cover rounded-full h-12 w-12"></a>
                <figcaption>Bottoms</figcaption>
            </div>
            <div class="px-6">
                <a href=""><img src="image/ethnicsets.jpg" alt="" class="object-cover rounded-full h-12 w-12"></a>
                <figcaption>Ethnic set</figcaption>
            </div>
            <div class="px-6">
                <a href=""><img src="image/dresses.jpg" alt="" class="object-cover rounded-full h-12 w-12"></a>
                <figcaption>Dresses</figcaption>
            </div>
            <div class="px-6">
                <a href=""><img src="image/lehenga.webp" alt="" class="object-cover rounded-full h-12 w-12"></a>
                <figcaption>Lehenga</figcaption>
            </div>
        </section>
        <section>
            <?php
                include 'db.php';
                $procat='women';
                $cate="SELECT * FROM sub_cat WHERE category=?";
                $stmt=$conn->prepare($cate);
                $stmt->bind_param("s",$procat);
                $stmt->execute();
                $result=$stmt->get_result();

                if($result->num_rows>0)
                {   echo "<div class='grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6 mt-10 px-4'>";
                    while($row=$result->fetch_assoc())
                    {
                        $imagepath=$row['image'];
                        //echo "$imagepath";
                        $prosubcat=$row['sub_category'];
                        //echo "$prosubcat";

                        //echo "<div class='grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6 mt-10 px-4'>";
                        echo " <div class='bg-white shadow-lg rounded-lg '>";
                        echo "<p class='font-serif p-4'>".$prosubcat."<p>";
                        echo "<div>";
                        echo "<form action='pro.php' method='POST'>";
                        echo " <input type='hidden' name='pro_sub' value='".$prosubcat."'>";
                        echo "<button ><img src='images/".$imagepath."' alt='' class='h-80 w-96 object-full'></button>";
                        echo "</form>";
                       // echo "<img src='images/".$imagepath."' alt='' class='h-80 w-full'>";
                        echo "<div class='flex flex-row p-3'>";
                        echo "<img src='image/image20.avif' alt='' class=' h-6 w-6 rounded-full'>";
                        echo "<p class='px-2 font-semibold font-serif'>By Trend Expert</p>";
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";
                      
                    }
                    echo "</div>";
                        
                }
            
            ?>
        </section>
        </main>
</body>

</html>