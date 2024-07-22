<?php include 'includes/_topbar.php' ?>
<?php
$sqlProdFind = "SELECT * FROM product_details ORDER BY _id DESC LIMIT 1";
$runSqlProdFind = mysqli_query($conn, $sqlProdFind);
while ($row = mysqli_fetch_assoc($runSqlProdFind)) {
    $productFetchID = $row['pid'];
}
$sqlProdName = "SELECT * FROM product where _id = $productFetchID";
$runSqlProdFind = mysqli_query($conn, $sqlProdName);
while ($row = mysqli_fetch_assoc($runSqlProdFind)) {
    $productName = $row['name'];
}



// if ($_SERVER['REQUEST_METHOD'] == 'POST') {

// }

?>

<div class="p-6">


    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
        <div class="bg-white border border-gray-100 shadow-md shadow-black/5 p-6 rounded-md lg:col-span-3">

            <div class="my-4">

                <ol class="flex items-center w-full p-3 space-x-2 text-sm font-medium text-center text-gray-500 bg-white border border-gray-200 rounded-lg shadow-sm dark:text-gray-400 sm:text-base dark:bg-gray-800 dark:border-gray-700 sm:p-4 sm:space-x-4 rtl:space-x-reverse">
                    <li class="flex items-center">
                        <span class="flex items-center justify-center w-5 h-5 me-2 text-xs border border-gray-500 rounded-full shrink-0 dark:border-gray-400">
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
                    <li class="flex items-center text-blue-600 dark:text-blue-500">
                        <span class="flex items-center justify-center w-5 h-5 me-2 text-xs border border-blue-600 rounded-full shrink-0 dark:border-blue-500">
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
                        Add Product Powder - <i> <mark><?= $productName ?></mark></i>
                    </h2>
                </div>

            </div>

            <div>



                <table class="items-center w-full bg-transparent border-collapse">
                    <thead>
                        <tr>
                            <th class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">S.No.</th>
                            <th class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">Name</th>
                            <th class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px">Amount</th>
                            <th class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px">Quantity</th>
                            <th class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px">Cost - (AxQ)</th>
                            <th class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px">Manage</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <?php
                        $sql = "SELECT * FROM `product_details` WHERE pid = $productFetchID";
                        $result = mysqli_query($conn, $sql);
                        $sno = 0;
                        $totalRawMatUsed = 0;
                        $totalCostOfRawMat = 0;
                        while ($row = mysqli_fetch_assoc($result)) {
                            $rawMatID = $row['raw_id'];
                            $sqlProduct = "SELECT name, final_rate FROM raw_material WHERE _id = $rawMatID";
                            $resultProd = mysqli_query($conn, $sqlProduct);
                            while ($rawRow = mysqli_fetch_assoc($resultProd)) {
                                $name = $rawRow['name'];
                                $final_rate = $rawRow['final_rate'];
                            }
                            $quantity = $row['qty'];
                            $costOfRM;
                            if (!$quantity) {
                                $quantity = "Enter quantity";
                                $costOfRM = "To be calculated";
                            } else {
                                $costOfRM = $quantity * $final_rate;
                                $totalRawMatUsed += $quantity;
                                $totalCostOfRawMat += $costOfRM;
                            }
                            $sno += 1;
                            echo "<tr class='text-gray-700 dark:text-gray-100'>
                                <td class='border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4'>" . $sno . "</td>
                                <th class='border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left'>" . $name . "</th>
                                <td class='border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4'>
                                    " . $final_rate . "
                                </td>
                                <td class='border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4'>
                                    " . $quantity . "
                                </td>
                                <td class='border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4'>
                                    " . $costOfRM . "
                                </td>
                                <td class='border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4'>
                                    <a href='editRawMatCost.php?pid=" . $productFetchID . "&rmid=" . $rawMatID . "&page=" . 'P' . "'>
                                        <button id=" . $row['_id'] . " class='edit bg-blue-300 hover:bg-blue-400 text-blue-800 font-bold py-2 px-4 rounded inline-flex items-center'>
                                            <i class='bx bxs-edit-alt'></i>
                                            <span class='ml-1'>Edit</span>
                                        </button>
                                    </a>
                                    <a href='delRawMatCost.php?pid=" . $productFetchID . "&rmid=" . $rawMatID . "&page=" . 'P' . "'>
                                        <button id=" . $row['_id'] . " class='delete bg-red-300 hover:bg-red-400 text-red-800 font-bold py-2 px-4 rounded inline-flex items-center' onclick='sureDel()'>
                                            <i class='bx bx-checkbox-minus'></i>
                                            <span class='ml-1'>Delete</span>
                                        </button>
                                    </a>
                                </td>
                            </tr>";
                        }
                        ?>

                        <tfoot>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>Total:</td>
                                <td>
                                    &nbsp;&nbsp; <?= $totalRawMatUsed ?>
                                </td>
                                <td>
                                    &nbsp; <?= $totalCostOfRawMat ?>
                                </td>
                            </tr>
                        </tfoot>

                    </tbody>
                </table>


                <div class="flex justify-between mb-4 items-start m-4">
                    <a href="addProd4.php">
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Next</button>
                    </a>

                </div>


            </div>
        </div>

    </div>
</div>

<script>
    function sureDel() {
  alert("Are you sure you want to delete the item?");
}
</script>


<?php include 'includes/_bottombar.php' ?>