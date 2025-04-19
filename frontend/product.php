<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Add Product</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
  <div class="bg-white p-10 rounded-2xl shadow-xl w-full max-w-lg">
    <h1 class="text-3xl font-bold font-serif text-center text-gray-800 mb-8">Add Product</h1>
    
    <form action="../backend/pro_backend.php" method="POST" enctype="multipart/form-data" class="space-y-6">
      
      <div>
        <label class="block text-sm font-medium text-gray-700 mb-2">Product Price</label>
        <input type="text" name="pro_price" placeholder="Enter product price"
          class="w-full h-12 border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-400"/>
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700 mb-2">Product Detail</label>
        <input type="text" name="pro_det" placeholder="Enter product detail"
          class="w-full h-12 border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-400"/>
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700 mb-2">Product Image</label>
        <input type="file" name="image"
          class="w-full border border-gray-300 rounded-lg p-3 file:bg-yellow-400 file:border-none file:rounded file:px-4 file:py-2 file:text-white file:font-medium file:cursor-pointer hover:file:bg-yellow-500"/>
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700 mb-2">Select Category</label>
        <select name="pro_cat"
          class="w-full h-12 border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-400">
          <option value="">Select category</option>
          <option value="men">Men</option>
          <option value="women">Women</option>
          <option value="kid">Kid</option>
        </select>
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700 mb-2">Select Sub-category</label>
        <select name="pro_sub_cat"
          class="w-full h-12 border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-400">
          <option value="">Select sub-category</option>
          <?php 
          include '../backend/db.php';
          $sql = "SELECT * FROM sub_cat";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                  $subcat = $row['sub_category'];
                  echo "<option value='$subcat'>$subcat</option>";
              }
          }
          ?>
        </select>
      </div>

      <div class="pt-4">
        <button type="submit"
          class="w-full bg-yellow-400 hover:bg-yellow-500 transition-colors text-white font-semibold py-3 rounded-lg shadow-md">
          Add Product
        </button>
      </div>
    </form>
  </div>
</body>
</html>
