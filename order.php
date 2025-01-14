<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <h1 class="font-bold text-3xl font-serif text-center mt-6 text-blue-500">Delivery Detail</h1>
    <form action="orderhistory.php"  method="POST" class="mx-28">


        <label for="name_"></label>
        <input type="text" name="name_" placeholder="Full name(Required)" class="bg-white tetx-black font-normal   rounded-lg m-4 p-4 border-2 h-10  w-96 
        focus:outline-blue-400">

        <label for="number"> </label>
        <input type="text" name="number" placeholder="10 digit mobile number"   required class="bg-white font-normal m-4 p-4 rounded-lg border-2 h-10 w-96
            focus:outline-blue-400">
        

        <label for="pincode">
            <input type="text" name="pincode" placeholder="pincode" required class="bg-white font-normal m-4 p-4 rounded-lg border-2 h-10 w-96
            focus:outline-blue-400">
        </label>

        <label for="Locality">
            <input type="text" name="locality" placeholder="Locality" required class="bg-white font-normal m-4 p-4 rounded-lg border-2 h-10 w-96
            focus:outline-blue-400">
        </label>
        <label for="address">
            <input type="text" name="address" placeholder="address"  required class="bg-white font-normal m-4 p-4 rounded-lg h-28 w-96 border-2
            focus:outline-blue-400 ">
        </label>

        <label for="city">
            <input type="text" name="city" placeholder="city/district/town" required class="bg-white font-normal m-4 p-4 rounded-lg h-10 w-96 border-2
            focus:outline-blue-400 ">
        </label>

        <label for="state" class="bg-white text-black font-normal">
            <select name="state" id="state" class=" w-96 m-4 p-2 border-2 h-10 rounded-lg focus:outline-blue-400">
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
        </label>

        <label for="Landmark">
            <input type="text" name="landmark" placeholder="Landmark" class="bg-white font-normal m-4 p-4 rounded-lg h-10 w-96 border-2
        focus:outline-blue-400 ">
        </label>

        <label for="alt_number">
            <input type="tel" name="alt_number" placeholder="Alternate number" pattern="[0-9]{10}" class="bg-white font-normal m-4 p-4 rounded-lg border-2 h-10 w-96
         focus:outline-blue-400">
        </label>
        <button class="h-10 w-full bg-yellow-400 rounded-full">Order now</button>
    </form>
</body>

</html>