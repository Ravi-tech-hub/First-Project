<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <?php
include 'header.php';
include '../backend/db.php';

if (!isset($_SESSION['name'])) {
    echo "<script>alert('Login first'); window.location.href='login.php'</script>";
}
?>
    <div class="max-w-4xl mx-auto px-4 py-10">
        <h1 class="font-semibold text-4xl mb-10 font-serif text-center  text-blue-600">Delivery Detail</h1>
        <form action="orderhistory.php" method="POST"
            class="bg-white shadow-lg rounded-lg grid  grid-cols-1 md:grid-cols-2 gap-6 p-8">
            <div class="flex flex-col">
                <label for="name_" class="text-sm font-medium mb-1">Full Name <span class="text-red-500">*</span></label>
                <input type="text" name="name_" minlength="4" placeholder="Ravi Prakash"
                    class="bg-gray-100 p-3 rounded-md border border-gray-300 focus:outline-blue-400">
            </div>

            <div class="flex flex-col">
                <label for="number_" class="text-sm font-medium mb-1">Mobile Number <span
                        class="text-red-500">*</span></label>
                <input type="number" name="number_" placeholder="10 digit mobile number" pattern="[0-9]{10}" required
                    class="bg-gray-100 p-3 rounded-md border border-gray-300 focus:outline-blue-400">
            </div>


            <div class="flex flex-col">
                <label for="pincode" class="text-sm font-medium mb-1">Pincode <span
                        class="text-red-500">*</span></label>
                <input type="number" name="pincode" placeholder="e.g. 847228" pattern="[0-9]{6}" required
                    class="bg-gray-100 p-3 rounded-md border border-gray-300 focus:outline-blue-400">
            </div>
            <div class="flex flex-col">
                <label for="locality" class="text-sm font-medium mb-1">Locality <span
                        class="text-red-500">*</span></label>
                <input type="text" name="locality" minlength="4" placeholder="e.g. Kaluahi" required
                    class="bg-gray-100 p-3 rounded-md border border-gray-300 focus:outline-blue-400">
            </div>
            <div class="flex flex-col col-span-1 md:col-span-2">
                <label for="address" class="text-sm font-medium mb-1">Full Address <span
                        class="text-red-500">*</span></label>
                <textarea name="address" minlength="4" rows="3" placeholder="House number, Street, Area"
                    class="bg-gray-100 p-3 rounded-md border border-gray-300 focus:outline-blue-400 resize-none"
                    required></textarea>
            </div>
            <div class="flex flex-col">
                <label for="city" class="text-sm font-medium mb-1">City/District/Town <span
                        class="text-red-500">*</span></label>
                <input type="text" name="city" minlength="4" placeholder="e.g. patna" required
                    class="bg-gray-100 p-3 rounded-md border border-gray-300 focus:outline-blue-400">
            </div>
            <div class="flex flex-col">
                <label for="state" class="text-sm font-medium mb-1">State <span class="text-red-500">*</span></label>
                <select name="state" required
                    class="bg-gray-100 p-3 rounded-md border border-gray-300 focus:outline-blue-400">
                    <option value="">--Select a state--</option>
                    <option value="andhra-pradesh">Andhra Pradesh</option>
                    <option value="arunachal-pradesh">Arunachal Pradesh</option>
                    <option value="assam">Assam</option>
                    <option value="bihar">Bihar</option>
                    <option value="chhattisgarh">Chhattisgarh</option>
                    <option value="goa">Goa</option>
                    <option value="gujarat">Gujarat</option>
                    <option value="haryana">Haryana</option>
                    <option value="himachal-pradesh">Himachal Pradesh</option>
                    <option value="jharkhand">Jharkhand</option>
                    <option value="karnataka">Karnataka</option>
                    <option value="kerala">Kerala</option>
                    <option value="madhya-pradesh">Madhya Pradesh</option>
                    <option value="maharashtra">Maharashtra</option>
                    <option value="manipur">Manipur</option>
                    <option value="meghalaya">Meghalaya</option>
                    <option value="mizoram">Mizoram</option>
                    <option value="nagaland">Nagaland</option>
                    <option value="odisha">Odisha</option>
                    <option value="punjab">Punjab</option>
                    <option value="rajasthan">Rajasthan</option>
                    <option value="sikkim">Sikkim</option>
                    <option value="tamil-nadu">Tamil Nadu</option>
                    <option value="telangana">Telangana</option>
                    <option value="tripura">Tripura</option>
                    <option value="uttar-pradesh">Uttar Pradesh</option>
                    <option value="uttarakhand">Uttarakhand</option>
                    <option value="west-bengal">West Bengal</option>
                </select>
            </div>
            <div class="flex flex-col">
                <label for="landmark" class="text-sm font-medium mb-1">Landmark</label>
                <input type="text" name="landmark" placeholder="Near mall, park, etc."
                    class="bg-gray-100 p-3 rounded-md border border-gray-300 focus:outline-blue-400">
            </div>
            <div class="flex flex-col">
                <label for="alt_number" class="text-sm font-medium mb-1">Alternate Mobile Number</label>
                <input type="tel" name="alt_number" placeholder="10 digit alternate number" pattern="[0-9]{10}"
                    class="bg-gray-100 p-3 rounded-md border border-gray-300 focus:outline-blue-400">
            </div>
            <div class="col-span-1 md:col-span-2">
                <button type="submit"
                    class="w-full h-12 bg-yellow-400 hover:bg-yellow-500 transition-colors duration-300 rounded-full text-lg font-semibold text-white">
                    Place Order
                </button>
            </div>
        </form>
    </div>
</body>

</html>