<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
<?php
include "header.php";
include '../backend/db.php';

if (isset($_SESSION['user_id'])) {
    $isLoggedIn = 'true';
}
else {
    $isLoggedIn = 'false';
}

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $prosub = urldecode($_GET['pro_sub']);
    $imag = "SELECT * FROM product WHERE pro_sub_cat = ?";
    $stmt = $conn->prepare($imag);
    $stmt->bind_param("s", $prosub);    
    $stmt->execute();
    $result1 = $stmt->get_result();

    if ($result1->num_rows > 0) {
        echo "<p class='mt-12 text-center text-3xl font-serif '>" . htmlspecialchars($prosub) . " </p>";
        echo "<div class='grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 m-6'>";
        while ($row1 = $result1->fetch_assoc()) {
            $imagepath = $row1['image_path'];
            $price = $row1['pro_price'];
            $detail = $row1['pro_detail'];
            echo "<div class='bg-white shadow-lg rounded-lg p-4'>";
            echo "<img src='../images/" . htmlspecialchars($imagepath) . "' alt='' class='h-80 w-80 object-cover mt-4'>";
            echo "<p class='text-center font-semibold mt-1'>Price: $price</p>";
            echo "<p class='text-center font-semibold mt-1'>" . htmlspecialchars($detail) . "</p>";
            echo "<div class='flex justify-between items-center mt-4'>";
            echo "<button class='bg-yellow-500 text-white px-3 py-1 rounded hover:bg-orange-600 add-to-cart' 
                data-cat='" . htmlspecialchars($prosub) . "' 
                data-price='$price' 
                data-detail='" . htmlspecialchars($detail) . "' 
                data-image='images/" . htmlspecialchars($imagepath) . "'>
                Add to Cart</button>";
            echo "<form action='order.php' method='POST'>";
            echo "<button class='bg-orange-500 text-white px-3 py-1 rounded hover:bg-orange-600'>Buy Now</button>";
            echo "</form>";
            echo "</div>";
            echo "</div>";
        }
        echo "</div>";
    } else {
        echo "<p class='text-center text-lg text-red-500 mt-10'>No Product is available</p>";
    }
}
?>

<script>
    const isLoggedIn = <?php echo $isLoggedIn; ?>;

    $(document).ready(function(){
        $('.add-to-cart').click(function(){
            if (isLoggedIn=="false") {
                alert("Please log in first to add items to your cart.");
                window.location.href = "login.php";
                return;
            }
            
            else
            {
                var pro_cat = $(this).data('cat');
            var price = $(this).data('price');
            var detail = $(this).data('detail');
            var image = $(this).data('image');

            $.ajax({
                url: 'add_to_cart.php',
                type: 'POST',
                data: { pro_cat: pro_cat, price: price, pro_det: detail, image: image },
                success: function(response){
                    alert('Product added to cart successfully!');
                },
                error: function(){
                    alert('Failed to add product to cart. Please try again.');
                }
            });
            }

            
        });
    });
</script>
</body>
</html>
