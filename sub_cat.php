<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sub-category</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <h1 class="font-bold text-center text-3xl mt-4 font-serif">Add Sub category</h1>
    <form action="sub_cat_backend.php" method="POST" enctype="multipart/form-data">
        <select name="cat" class="h-20 w-96 border-2 rounded-lg  m-8 p-4">
            <option value="">select category</option>
            <option value="women">women</option>
            <option value="men">men</option>
            <option value="kid">kid</option>
        </select>

        <input type="text" name="sub_cat" placeholder="Enter sub-category"
            class="h-10 w-96 border-2 rounded-lg  m-8 p-4">
         <input type="file" name="image"
            class="h-20 w-96 border-2 rounded-lg  m-8 p-4">

        <button class="text-center h-10 w-96 bg-yellow-400 rounded-lg mx-56">Add</button>
    </form>
</body>
</html>