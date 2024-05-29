<?php 
    include 'includes/_topbar.php'; 
    
    $insert = false;
    if ($_SERVER['REQUEST_METHOD'] =='POST'){
        
        $name=$_POST['name'];
        $name = mysqli_real_escape_string($conn, $name);
        $type=$_POST['type'];
        $sizes=$_POST['sizes'];
        $sql = "INSERT INTO `product` (`name`, `type`, `sizes`) VALUES ('$name', '$type', '$sizes')";
        $result= mysqli_query($conn, $sql);
        if($result){
            $insert = true;
        }
        else{
            echo "try again";
        }
    }
?>


<!-- Content -->
<div class="p-6">
    <?php
        if($insert){
            echo "
            <div class='flex items-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800' role='alert'>
                <svg class='flex-shrink-0 inline w-4 h-4 me-3' aria-hidden='true' xmlns='http://www.w3.org/2000/svg' fill='currentColor' viewBox='0 0 20 20'>
                    <path d='M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z'/>
                </svg>
            <span class='sr-only'>Info</span>
                <div>
                <span class='font-medium'>Success alert!</span> Data has been added. -->
                </div>
                <div class='flex justify-end'>
                    <a href='product.php'>
                        <div>View Data</div>
                    </a>
                </div>
            </div>
                ";
        }
    ?>
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
        <div class="bg-white border border-gray-100 shadow-md shadow-black/5 p-6 rounded-md lg:col-span-3">
            <div class="flex justify-between mb-4 items-start">
                <div class="font-medium">
                    <h2 class="text-xl">
                        Add Product
                    </h2>
                </div>

            </div>

            <div>


                <form action="addProd.php" method="post">
                    <div class="mb-6">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Name</label>
                        <input type="text" id="name" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="xyz" required/>
                    </div>
                    <div class="mb-6">
                        <label for="sizes" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Quantity</label>
                        <select name="sizes" id="sizes"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                            <option value="">
                                --Select the Quantity--
                            </option>
                            <option value="10 ML">
                                10 ML
                            </option>
                            <option value="50 ML">
                                50 ML
                            </option>
                            <option value="100 ML">
                                100 ML
                            </option>
                            <option value="10 GM">
                                10 GM
                            </option>
                            <option value="50 GM">
                                50 GM
                            </option>
                            <option value="100 GM">
                                100 GM
                            </option>
                        </select>
                    </div>
                    <div class="mb-6">
                        <label for="type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Type</label>
                        <select name="type" id="type"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                            <option value="">
                                --Select the Type of Product--
                            </option>
                            <option value="As">
                                Arksaji
                            </option>
                            <option value="Ds">
                                Dawasaji
                            </option>
                            <option value="T">
                                Tablet
                            </option>
                            <option value="S">
                                Syrup
                            </option>
                            <option value="P">
                                Powder
                            </option>
                        </select>
                    </div>
                    
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                </form>





            </div>
        </div>

    </div>
</div>
<!-- End Content -->


<?php include 'includes/_bottombar.php' ?>