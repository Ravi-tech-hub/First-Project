<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Add Sub-category</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">

  <div class="bg-white p-10 rounded-2xl shadow-xl w-full max-w-md">
    <h1 class="text-3xl font-bold text-center font-serif text-gray-800 mb-8">Add Sub-category</h1>
    
    <form action="../backend/sub_cat_backend.php" method="POST" enctype="multipart/form-data" class="space-y-6">
      
      <div>
        <label class="block text-sm font-medium text-gray-700 mb-2">Select Category</label>
        <select name="cat" class="w-full h-12 border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-yellow-400">
          <option value="">Select category</option>
          <option value="women">Women</option>
          <option value="men">Men</option>
          <option value="kid">Kid</option>
        </select>
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700 mb-2">Sub-category Name</label>
        <input type="text" name="sub_cat" placeholder="Enter sub-category" class="w-full h-12 border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-yellow-400"/>
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700 mb-2">Upload Image</label>
        <input type="file" name="image" class="w-full border border-gray-300 rounded-lg p-3 file:bg-yellow-400 file:border-none file:rounded file:px-4 file:py-2 file:text-white file:font-medium file:cursor-pointer hover:file:bg-yellow-500"/>
      </div>

      <div class="pt-4">
        <button type="submit" class="w-full bg-yellow-400 hover:bg-yellow-500 transition-colors text-white font-semibold py-3 rounded-lg shadow-md">Add Sub-category</button>
      </div>
    </form>
  </div>
</body>
</html>
