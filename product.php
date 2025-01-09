<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <h1 class="text-3xl font-bold font-serif text-center m-4">Add Product</h1>
    <form action="pro_backend.php" method="POST" enctype="multipart/form-data">
    <input type="text" name="pro_price" placeholder="Enter product price" class="h-10 w-96 border-2  rounded-lg m-8
    focus:outline-blue-400 p-4">
    <input type="text" name="pro_det" placeholder="Enter product detail" class="h-10 w-96 border-2  rounded-lg m-8
    focus:outline-blue-400 p-4">
    <input type="file" name="image" class="h-20 w-96 border-2 rounded-lg  m-8 p-4">
    <input type="text" name="pro_cat" placeholder="Enter product category men,women or kid" class="h-10 w-96 border-2  rounded-lg m-8
    focus:outline-blue-400 p-4">
    <input type="text" name="pro_sub_cat" placeholder="Enter product sub_category" class="h-10 w-96 border-2  rounded-lg m-8
    focus:outline-blue-400 p-4">
    <button class="text-center h-10 w-96 bg-yellow-400 rounded-lg mx-64">Add</button>
    </form>
    
</html>