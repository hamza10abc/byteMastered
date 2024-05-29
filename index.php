<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Login DKTC</title>
</head>
<body>
<div class="flex h-screen bg-green-700">
<div class="w-full max-w-xs m-auto bg-green-100 p-5" style="border-radius: 3%;">   
      <header>
        <img class="w-20 mx-auto mb-5" src="assets/dktc logo.jpg" style="border-radius: 50%;"/>
      </header>   
      <form action="validation.php" method="post">
        <div>
          <label class="block mb-2 text-green-500" for="username">Username</label>
          <input class="w-full p-2 mb-6 text-green-700 border-b-2 border-green-500 outline-none focus:bg-gray-300" type="text" name="username">
        </div>
        <div>
          <label class="block mb-2 text-green-500" for="password">Password</label>
          <input class="w-full p-2 mb-6 text-green-700 border-b-2 border-green-500 outline-none focus:bg-gray-300" type="password" name="password">
        </div>
        <div>          
          <button class="w-full bg-green-700 hover:bg-pink-700 text-white font-bold py-2 px-4 mb-6 rounded" type="submit"><a href="dashboard.php">Submit</a></button>
        </div>       
      </form>  
      <footer>
        <a class="text-green-700 hover:text-pink-700 text-sm float-left" href="#">Forgot Password?</a>
      </footer>   
    </div>
</div>
</body>
</html>