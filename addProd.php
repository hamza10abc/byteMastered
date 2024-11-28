<?php
include 'includes/_topbar.php';

$insert = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $sizes = $_POST['sizes'];
    $type = $_POST['type'];
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
                            <option value="gr">GR(UNKNOWN)</option>
                            <option value="kg">Kilograms</option>
                        </select>
                    </div>

                    <div class="mb-6">
                        <label for="quantity" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Quantity</label>
                        <select id="quantity" name="quantity" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required disabled>
                            <option value="">--Select the Quantity--</option>
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


<?php include 'includes/_bottombar.php' ?>
<script>
    // Define quantity options for each product type
    const productQuantities = {
        tablets: ["9", "10", "25", "50", "100", "1000"],
        ml: ["5", "10", "15", "20", "40", "50", "100", "125", "200", "300", "380", "500", "750"],
        liter: ["1"],
        gm: ["1", "3", "5", "10", "25", "30", "50", "60", "80", "125", "250", "380", "500"],
        gr: ["60"],
        kg: ["1"]
    };

    // Get references to the dropdown elements
    const productTypeSelect = document.getElementById("product-type");
    const quantitySelect = document.getElementById("quantity");

    // Function to enable/disable quantity dropdown
    function toggleQuantityDropdown() {
        if (productTypeSelect.value) {
            quantitySelect.disabled = false; // Enable quantity dropdown
        } else {
            quantitySelect.disabled = true; // Disable quantity dropdown if no product type selected
        }
    }

    // Event listener for product type change
    productTypeSelect.addEventListener("change", function() {
        const selectedProduct = productTypeSelect.value;

        // Clear current quantity options
        quantitySelect.innerHTML = '<option value="">--Select the Quantity--</option>';

        // If a valid product type is selected, update the quantity options
        if (selectedProduct && productQuantities[selectedProduct]) {
            const quantities = productQuantities[selectedProduct];
            quantities.forEach(quantity => {
                const option = document.createElement("option");
                option.value = quantity;
                option.textContent = quantity;
                quantitySelect.appendChild(option);
            });
        }

        // Toggle the state of the quantity dropdown (enabled/disabled)
        toggleQuantityDropdown();
    });

    // Initial call to set the correct state of the quantity dropdown
    toggleQuantityDropdown();
</script>