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
    <select name="pro_cat"  placeholder="Choose sub category" class="h-20 w-96 border-2  rounded-lg m-8
    focus:outline-blue-400 p-4">
    <option value="">Select category</option>
    <option value="men">Men</option>
    <option value="women">Women</option>
    <option value="kid">Kid</option>
    </select>
    <select name="pro_sub_cat"  placeholder="Choose sub category" class="h-20 w-96 border-2  rounded-lg m-8
    focus:outline-blue-400 p-4">
    <option value="">Select sub-category</option>
    <?php 
    include 'db.php';
    
    $sql="SELECT * FROM sub_cat ";
    $result=$conn->query($sql);

    if($result->num_rows>0)
    {  while($row=$result->fetch_assoc())
        {
            $subcat=$row['sub_category'];
            $cat=$row['category'];
            if($cat=='women')
            {  
                echo" <option value='". $subcat."'>". $subcat."</option>";
            }
            if($cat=='men')
            { 
                echo" <option value='". $subcat."'>". $subcat."</option>";
            }
            if($cat=='kid')
            {  
                echo" <option value='". $subcat."'>". $subcat."</option>";
            }
           
        }
    }
    
    ?>
    </select>
       
    <button class="text-center h-10 w-96 bg-yellow-400 rounded-lg mx-64">Add</button>
    </form>
    
</html>