<?php
include 'includes/_topbar.php';

$idArk = $_GET['id'];
$sql = "SELECT * from labour_in_packing where _id = $idArk";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)) {
    $productId = $row['pid'];
    $sqlProduct = "SELECT name, type, sizes FROM product WHERE _id = $productId";
    $resultProd = mysqli_query($conn, $sqlProduct);
    while ($prodRow = mysqli_fetch_assoc($resultProd)) {
        $name = $prodRow['name'];
        $type = $prodRow['type'];
        $size = $prodRow['sizes'];
    }
    $input=$row['input'];
    $filling=$row['filling'];
    $sealing=$row['sealing'];
    $packing=$row['packing'];
    $other=$row['other'];
    $unit_prod_per_ghan=$row['unit_prds_per_ghan'];
}



$update = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $input=$_POST['input'];
    $filling=$_POST['filling'];
    $sealing=$_POST['sealing'];
    $packing=$_POST['packing'];
    $other=$_POST['other'];
    $unit_prod_per_ghan=$_POST['unit_prod_per_ghan'];

    $sql = "UPDATE `labour_in_packing` SET `input` = '$input', `filling` = '$filling', `sealing` = '$sealing', `packing` = '$packing', `other` = '$other', `unit_prds_per_ghan` = '$unit_prod_per_ghan' WHERE `labour_in_packing`.`_id` = $idArk";
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
        if($update){
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
                    <a href='labourPack.php'>
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
                        Edit Labour in Packaging Data --> <?=$name?>
                    </h2>
                </div>

            </div>

            <div>


                <form action="editLabPack.php?id=<?=$idArk?>" method="post">
                    <div class="mb-6">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name of the Product</label>
                        <input type="text" id="rate" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="123.00" value="<?= $name ?> - <?= $size?>" readonly />
                    </div>
                    <div class="mb-6">
                        <label for="input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Input in kg</label>
                        <input type="number" id="rate" name="input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="123.00" value="<?=$input?>" required />
                    </div>
                    <div class="mb-6">
                        <label for="unit_prod_per_ghan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Unit produced per Ghan</label>
                        <input type="number" id="unit_prod_per_ghan" name="unit_prod_per_ghan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="123.00" value="<?=$unit_prod_per_ghan?>" required />
                    </div>
                    <div class="mb-6">
                        <label for="filling" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Karguzari for Filling</label>
                        <input type="number" id="rate" name="filling" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="123.00" value="<?=$filling?>" required />
                    </div>
                    <div class="mb-6">
                        <label for="sealing" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Karguzari for Sealing</label>
                        <input type="number" id="sealing" name="sealing" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="123.00" value="<?=$sealing?>" required />
                    </div>
                    <div class="mb-6">
                        <label for="packing" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Karguzari for Packing</label>
                        <input type="number" id="packing" name="packing" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="123.00" value="<?=$packing?>" required />
                    </div>
                    <div class="mb-6">
                        <label for="other" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Other</label>
                        <input type="number" id="other" name="other" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="123.00" value="<?=$other?>" required />
                    </div>
                    
                    
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                </form>





            </div>
        </div>

    </div>
</div>
<!-- End Content -->


<?php include 'includes/_bottombar.php' ?>