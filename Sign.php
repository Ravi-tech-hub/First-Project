<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> sign in</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<div class="flex flex-row justify-center mt-8">
    <img src="images/title.jpg" alt="LOGO" class="h-10 w-20  object-cover">
   <h2 class="text-center font-bold text-3xl ">LuxorAura.in</h2>
</div>
    <section class="flex flex-row justify-center p-6">
    <form action="sign_backend.php" method="POST" class="h-96 w-80 bg-white shadow-lg rounded-lg border-2 border-b-zinc-100">
        <h2 class="text-black font-serif text-2xl text-center p-4">Sign In</h2>
        <label for="user_name"> </label>
            <input type="text" name="user_name" placeholder="Enter your name" required 
            class=" px-4 my-2  mx-3 rounded-lg bg-white h-10 w-72 border-2 border-black placeholder-black font-normal">
       
        <label for="user_email"></label>
            <input type="text" name="user_email" placeholder="Enter your email" required 
            class="  px-4 my-2 mx-3 rounded-lg bg-white h-10 w-72 border-2 border-black placeholder-black font-normal">
        
        <label for="user_password"></label>
            <input type="password" name="user_password" placeholder="Enter your password" required 
            class=" px-4 my-2 mx-3  rounded-lg bg-white h-10 w-72 border-2 border-black placeholder-black font-normal">

        <button class="bg-yellow-400 h-10 w-72 mx-3 rounded-full"> sign in</button>
        <p class="text-center pt-2">Already have account?
            <a href="login.php" class="font-bold"> Login</a>
        </p>
         <p class="text-center pt-2">
            <a href="admin.php" class="font-bold"> Login as admin</a>
        </p>
    </form>

</section>
</body>
</html>