<?php
include 'includes/_topbar.php';

$idProd = $_GET['pid'];
$idRM = $_GET['rmid'];
$page = $_GET['page'];
$updateType = $_GET['updateType'];
if ($page == 'As') {
    $actionLink = "addProdArk.php?id=".$idProd."&type=".$page."&updateType=".$updateType."";
} else if ($page == 'T') {
    $actionLink = "addProdTab.php?id=".$idProd."&type=".$page."&updateType=".$updateType."";
} else if ($page == "Ds") {
    $actionLink = "addProdDawa.php?id=".$idProd."&type=".$page."&updateType=".$updateType."";
} else if ($page == "S") {
    $actionLink = "addProdSyrup.php?id=".$idProd."&type=".$page."&updateType=".$updateType."";
} else if ($page == "P") {
    $actionLink = "addProdPowder.php?id=".$idProd."&type=".$page."&updateType=".$updateType."";
} else {
    $actionLink = "404NotFound.php";
}
$sql = "SELECT * from raw_material where _id = $idRM";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)) {
    $name = $row['name'];
    $final_rate = $row['final_rate'];
}



$update = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $qty = $_POST['qty'];
    $sql = "UPDATE `product_details` SET `qty` = '$qty' WHERE `product_details`.`pid` = $idProd AND `product_details`.`raw_id` = $idRM";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $update = true;
    } else {
        echo "try again";
    }
}
?>


<!-- Content -->
<div class="p-6">
    <?php
    if ($update) {
        echo "
            <div class='flex items-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800' role='alert'>
                <svg class='flex-shrink-0 inline w-4 h-4 me-3' aria-hidden='true' xmlns='http://www.w3.org/2000/svg' fill='currentColor' viewBox='0 0 20 20'>
                    <path d='M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z'/>
                </svg>
            <span class='sr-only'>Info</span>
                <div>
                <span class='font-medium'>Success alert!</span> Data has been added. You will be redirected.
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
                        Enter amount of --> <?= $name ?>
                    </h2>
                </div>

            </div>

            <div>


                <form action="editRawMatCost.php?pid=<?= $idProd ?>&rmid=<?= $idRM ?>&page=<?= $page ?>&updateType=<?=$updateType?>" method="post">

                    <div class="mb-6">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name of the raw material</label>
                        <input type="text" id="rate" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="123.00" value="<?= $name ?>" readonly />
                    </div>
                    <div class="mb-6">
                        <label for="rate" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rate of the raw material</label>
                        <input type="text" id="rate" name="rate" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="123.00" value="<?= $final_rate ?>" readonly />
                    </div>



                    <div class="mb-6">
                        <label for="qty" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Amount Required</label>
                        <input type="number" step="any" id="qty" name="qty" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Input in KG" required />
                    </div>

                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                </form>





            </div>
        </div>

    </div>
</div>
<!-- End Content -->


<?php include 'includes/_bottombar.php' ?>