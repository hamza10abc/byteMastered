<?php
include 'includes/_topbar.php';

$insert = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    // $sizes = $_POST['sizes'];
    $type = $_POST['type'];

    if (isset($_POST['sizes_t']) && $_POST['sizes_t'] != "") {
        $sizes = $_POST['sizes_t'];
    } else if (isset($_POST['sizes_ml']) && $_POST['sizes_ml'] != "") {
        $sizes = $_POST['sizes_ml'];
    } else if (isset($_POST['sizes_l']) && $_POST['sizes_l'] != "") {
        $sizes = $_POST['sizes_l'];
    } else if (isset($_POST['sizes_gm']) && $_POST['sizes_gm'] != "") {
        $sizes = $_POST['sizes_gm'];
    } else if (isset($_POST['sizes_kg']) && $_POST['sizes_kg'] != "") {
        $sizes = $_POST['sizes_kg'];
    } else {
        $sizes = 'NULL';
    }

    $wholeSalePrice = $_POST['wholeSalePrice'];
    if ($type === 'As') {
        $actionLink = 'addArk.php?updateType=new';
    } else if ($type === 'T') {
        $actionLink = 'addTablet.php?updateType=new';
    } else if ($type === 'Ds') {
        $actionLink = 'addDawa.php?updateType=new';
    } else if ($type === 'S') {
        $actionLink = 'addSyrup.php?updateType=new';
    } else if ($type === 'P') {
        $actionLink = 'addGrind.php?updateType=new';
    } else {
        $actionLink = "404NotFound.php";
    }
    $sql = "INSERT INTO `product` (`name`, `sizes`, `type`, `wholeSalePrice`) VALUES ('$name', '$sizes', '$type', '$wholeSalePrice')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $insert = true;
    } else {
        echo "try again";
    }
}
?>


<!-- Content -->
<div class="p-6">

    <?php
    if ($insert) {
        echo "
            <div class='flex items-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800' role='alert'>
                <svg class='flex-shrink-0 inline w-4 h-4 me-3' aria-hidden='true' xmlns='http://www.w3.org/2000/svg' fill='currentColor' viewBox='0 0 20 20'>
                    <path d='M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z'/>
                </svg>
                <span class='sr-only'>Info</span>
                <div>
                    <span class='font-medium'>Success alert!</span> You will be redirected in 3 secs.
                </div>
            </div>
                ";
        echo "<meta http-equiv='refresh' content='3;url=" . $actionLink . "' />";
    }
    ?>


    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
        <div class="bg-white border border-gray-100 shadow-md shadow-black/5 p-6 rounded-md lg:col-span-3">

            <div class="my-4">

                <ol class="flex items-center w-full p-3 space-x-2 text-sm font-medium text-center text-gray-500 bg-white border border-gray-200 rounded-lg shadow-sm dark:text-gray-400 sm:text-base dark:bg-gray-800 dark:border-gray-700 sm:p-4 sm:space-x-4 rtl:space-x-reverse">
                    <li class="flex items-center text-blue-600 dark:text-blue-500">
                        <span class="flex items-center justify-center w-5 h-5 me-2 text-xs border border-blue-600 rounded-full shrink-0 dark:border-blue-500">
                            1
                        </span>
                        Basic <span class="hidden sm:inline-flex sm:ms-2">Info</span>
                        <svg class="w-3 h-3 ms-2 sm:ms-4 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 12 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m7 9 4-4-4-4M1 9l4-4-4-4" />
                        </svg>
                    </li>
                    <li class="flex items-center">
                        <span class="flex items-center justify-center w-5 h-5 me-2 text-xs border border-gray-500 rounded-full shrink-0 dark:border-gray-400">
                            2
                        </span>
                        Raw <span class="hidden sm:inline-flex sm:ms-2">Material</span>
                        <svg class="w-3 h-3 ms-2 sm:ms-4 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 12 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m7 9 4-4-4-4M1 9l4-4-4-4" />
                        </svg>
                    </li>
                    <li class="flex items-center">
                        <span class="flex items-center justify-center w-5 h-5 me-2 text-xs border border-gray-500 rounded-full shrink-0 dark:border-gray-400">
                            3
                        </span>
                        Product <span class="hidden sm:inline-flex sm:ms-2">Details</span>
                        <svg class="w-3 h-3 ms-2 sm:ms-4 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 12 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m7 9 4-4-4-4M1 9l4-4-4-4" />
                        </svg>
                    </li>
                    <li class="flex items-center">
                        <span class="flex items-center justify-center w-5 h-5 me-2 text-xs border border-gray-500 rounded-full shrink-0 dark:border-gray-400">
                            4
                        </span>
                        Labour <span class="hidden sm:inline-flex sm:ms-2">in Packing</span>
                        <svg class="w-3 h-3 ms-2 sm:ms-4 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 12 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m7 9 4-4-4-4M1 9l4-4-4-4" />
                        </svg>
                    </li>
                    <li class="flex items-center">
                        <span class="flex items-center justify-center w-5 h-5 me-2 text-xs border border-gray-500 rounded-full shrink-0 dark:border-gray-400">
                            5
                        </span>
                        Packaging <span class="hidden sm:inline-flex sm:ms-2">Material</span>
                        <svg class="w-3 h-3 ms-2 sm:ms-4 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 12 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m7 9 4-4-4-4M1 9l4-4-4-4" />
                        </svg>
                    </li>
                    <li class="flex items-center">
                        <span class="flex items-center justify-center w-5 h-5 me-2 text-xs border border-gray-500 rounded-full shrink-0 dark:border-gray-400">
                            6
                        </span>
                        Review
                    </li>
                </ol>


            </div>




            <div class="flex justify-between mb-4 items-start">
                <div class="font-medium">
                    <h2 class="text-xl">
                        Add Product
                    </h2>
                </div>

            </div>

            <div>


                <form action="addProd.php?updateType=new" method="post">
                    <div class="mb-6">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Name</label>
                        <input type="text" id="name" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="xyz" required />
                    </div>


                    <div class="mb-6">
                        <label for="product-type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Output Type</label>
                        <select id="product-type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                            <option value="">--Select Output Type--</option>
                            <option value="tablets">TABLETS / PILLS</option>
                            <option value="ml">Mililiters</option>
                            <option value="liter">Liters</option>
                            <option value="gm">Grams</option>
                            <option value="kg">Kilograms</option>
                        </select>
                    </div>

                    <div id="tablets-dropdown" class="mb-6" style="display:none;">
                        <label for="sizes_t" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tablets / Pills Quantity</label>
                        <select name="sizes_t" id="sizes_t" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                            <option value="">
                                --Select the Quantity--
                            </option>
                            <option value="9 pcs">9</option>
                            <option value="10 pcs">10</option>
                            <option value="25 pcs">25</option>
                            <option value="50 pcs">50</option>
                            <option value="100 pcs">100</option>
                            <option value="1000 pcs">1000</option>
                        </select>
                    </div>

                    <div id="ml-dropdown" class="mb-6" style="display:none;">
                        <label for="sizes_ml" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ML Quantity</label>
                        <select name="sizes_ml" id="sizes_ml" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                            <option value="">
                                --Select the Quantity--
                            </option>
                            <option value="5 ML">5</option>
                            <option value="10 ML">10</option>
                            <option value="15 ML">15</option>
                            <option value="20 ML">20</option>
                            <option value="40 ML">40</option>
                            <option value="50 ML">50</option>
                            <option value="100 ML">100</option>
                            <option value="125 ML">125</option>
                            <option value="200 ML">200</option>
                            <option value="300 ML">300</option>
                            <option value="380 ML">380</option>
                            <option value="500 ML">500</option>
                            <option value="750 ML">750</option>
                        </select>
                    </div>

                    <!-- 1L -->
                    <div id="oneL-dropdown" class="mb-6" style="display:none;">
                        <label for="sizes_l" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">1L Quantity</label>
                        <select name="sizes_l" id="sizes_l" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                            <option value="">
                                --Select the Quantity--
                            </option>
                            <option value="1 L">1</option>
                        </select>
                    </div>

                    <!-- GM -->
                    <div id="gm-dropdown" class="mb-6" style="display:none;">
                        <label for="sizes_gm" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">GM Quantity</label>
                        <select name="sizes_gm" id="sizes_gm" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                            <option value="">
                                --Select the Quantity--
                            </option>
                            <option value="1 g">1</option>
                            <option value="3 g">3</option>
                            <option value="5 g">5</option>
                            <option value="10 g">10</option>
                            <option value="25 g">25</option>
                            <option value="30 g">30</option>
                            <option value="50 g">50</option>
                            <option value="60 g">60</option>
                            <option value="80 g">80</option>
                            <option value="125 g">125</option>
                            <option value="250 g">250</option>
                            <option value="380 g">380</option>
                            <option value="500 g">500</option>
                        </select>
                    </div>

                    <!-- KG -->
                    <div id="kg-dropdown" class="mb-6" style="display:none;">
                        <label for="sizes_kg" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">KG Quantity</label>
                        <select name="sizes_kg" id="sizes_kg" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                            <option value="">
                                --Select the Quantity--
                            </option>
                            <option value="1 Kg">1</option>
                        </select>
                    </div>


                    <div class="mb-6">
                        <label for="type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Type</label>
                        <select name="type" id="type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
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

                    <div class="mb-6">
                        <label for="wholeSalePrice" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Whole Sale Price</label>
                        <input type="number" step="any" id="wholeSalePrice" name="wholeSalePrice" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="123.45" required />
                    </div>

                    <div style="display: flex; justify-content: space-between; margin: 10px;">

                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Next</button>
                        <!-- <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Previous</button> -->
                    </div>

                </form>





            </div>
        </div>

    </div>
</div>
<!-- End Content -->
<script>
    document.getElementById('product-type').addEventListener('change', function() {
        // Hide all dropdowns initially
        var allDropdowns = document.querySelectorAll('#tablets-dropdown, #ml-dropdown, #oneL-dropdown, #gm-dropdown, #kg-dropdown');
        allDropdowns.forEach(function(dropdown) {
            dropdown.style.display = 'none';
            // Remove the required attribute for hidden fields
            var select = dropdown.querySelector('select');
            if (select) {
                select.removeAttribute('required');
            }
        });

        // Get the selected output type
        var selectedType = this.value;

        // Show the appropriate dropdown based on the selected output type
        if (selectedType === 'tablets') {
            var tabletsDropdown = document.getElementById('tablets-dropdown');
            tabletsDropdown.style.display = 'block';
            tabletsDropdown.querySelector('select').setAttribute('required', 'true');
        } else if (selectedType === 'ml') {
            var mlDropdown = document.getElementById('ml-dropdown');
            mlDropdown.style.display = 'block';
            mlDropdown.querySelector('select').setAttribute('required', 'true');
        } else if (selectedType === 'liter') {
            var oneLDropdown = document.getElementById('oneL-dropdown');
            oneLDropdown.style.display = 'block';
            oneLDropdown.querySelector('select').setAttribute('required', 'true');
        } else if (selectedType === 'gm') {
            var gmDropdown = document.getElementById('gm-dropdown');
            gmDropdown.style.display = 'block';
            gmDropdown.querySelector('select').setAttribute('required', 'true');
        } else if (selectedType === 'kg') {
            var kgDropdown = document.getElementById('kg-dropdown');
            kgDropdown.style.display = 'block';
            kgDropdown.querySelector('select').setAttribute('required', 'true');
        }
    });
</script>


<?php include 'includes/_bottombar.php' ?>