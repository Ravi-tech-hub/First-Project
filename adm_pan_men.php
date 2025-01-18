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
            <a href="adm_pan_women.php" class="hover:underline font-serif ml-28">WOMEN</a>
            <a href="adm_pan_men.php" class="hover:underline px-10 font-serif">MEN</a>
            <a href="adm_pan_kid.php" class="hover:underline  font-serif">KID</a>
        </div>

        <section class="flex flex-wrap  justify-center mt-5">
            <div class="px-6">
                <a href=""><img src="images/winters.jpg" alt="" class="object-cover rounded-full h-12 w-12"></a>
                <figcaption>Winter</figcaption>
            </div>
            <div class="px-6">
                <a href=""><img src="images/tshirts.jpg" alt="" class="object-cover rounded-full h-12 w-12"></a>
                <figcaption>Tshirt</figcaption>
            </div>
            <div class="px-6">
                <a href=""><img src="images/shirts.jpg" alt="" class="object-cover rounded-full h-12 w-12"></a>
                <figcaption>Shirt</figcaption>
            </div>
            <div class="px-6">
                <a href=""><img src="images/jeans.jpg" alt="" class="object-cover rounded-full h-12 w-12"></a>
                <figcaption>Jeans</figcaption>
            </div>
            <div class="px-6">
                <a href=""><img src="images/trousers.jpg" alt="" class="object-cover rounded-full h-12 w-12"></a>
                <figcaption>Trouser</figcaption>
            </div>
            <div class="px-6">
                <a href=""><img src="images/ethnicset.jpg" alt="" class="object-cover rounded-full h-12 w-12"></a>
                <figcaption>Ethnic set</figcaption>
            </div>
            <div class="px-6">
                <a href=""><img src="images/blazer.jpg" alt="" class="object-cover rounded-full h-12 w-12"></a>
                <figcaption>Blazer</figcaption>
            </div>
            <div class="px-6">
                <a href=""><img src="images/cargo.jpg" alt="" class="object-cover rounded-full h-12 w-12"></a>
                <figcaption>Cargo</figcaption>
            </div>
        </section>

        <section>
            <?php
                include 'db.php';
                $procat='men';
                $cate="SELECT * FROM sub_cat WHERE category=?";
                $stmt=$conn->prepare($cate);
                $stmt->bind_param("s",$procat);
                $stmt->execute();
                $result=$stmt->get_result();
                echo "<div class='grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6 mt-10 px-4'>";
                if($result->num_rows>0)
                {   
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
                        echo "<div class='flex flex-row justify-between mx-2'>";
                        echo "<form action='del_sub.php' method='POST'>";
                        echo " <input type='hidden' name='image' value='".$imagepath."'>";
                        echo " <button class='bg-yellow-500 text-white px-3 py-1 rounded hover:bg-orange-600'>Delete</button>";
                        echo " </form>";
                        echo "<form action='sub_upd.php' method='POST'>";
                        echo " <input type='hidden' name='image' value='".$imagepath."'>";
                        echo "<button class='bg-orange-500 text-white px-3 py-1 rounded hover:bg-orange-600'>Update</button>";
                        echo "</form>";
                        echo "</div>";
                       // echo "<img src='images/".$imagepath."' alt='' class='h-80 w-full'>";
                        echo "<div class='flex flex-row p-3'>";
                        echo "<img src='images/image20.avif' alt='' class=' h-6 w-6 rounded-full'>";
                        echo "<p class='px-2 font-semibold font-serif'>By Trend Expert</p>";
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";
                      
                    }
                   
                        
                }
                echo "</div>";
            ?>
        </section>
        </main>
</body>

</html>