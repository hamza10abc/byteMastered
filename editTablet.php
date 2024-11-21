<?php
include 'includes/_topbar.php';

$idTablet = $_GET['id'];
$sql = "SELECT * from tablet where _id = $idTablet";
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
    
    $lc_noe = $row['lc_noe'];
    $lc_nod = $row['lc_nod'];
    $mx_noe = $row['mx_noe'];
    $mx_nod = $row['mx_nod'];
    $gr_noe = $row['gr_noe'];
    $gr_nod = $row['gr_nod'];
    $tb_noe = $row['tb_noe'];
    $tb_nod = $row['tb_nod'];
    $spd = $row['spd'];
}



$update = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $lc_noe = $_POST['lc_noe'];
    $lc_nod = $_POST['lc_nod'];
    $mx_noe = $_POST['mx_noe'];
    $mx_nod = $_POST['mx_nod'];
    $gr_noe = $_POST['gr_noe'];
    $gr_nod = $_POST['gr_nod'];
    $tb_noe = $_POST['tb_noe'];
    $tb_nod = $_POST['tb_nod'];
    $spd = $_POST['spd'];

    $sql = "UPDATE `tablet` SET `lc_noe` = '$lc_noe', `lc_nod` = '$lc_nod', `mx_noe` = '$mx_noe', `mx_nod` = '$mx_nod', `gr_noe` = '$gr_noe', `gr_nod` = '$gr_nod', `tb_noe` = '$tb_noe', `tb_nod` = '$tb_nod', `spd` = '$spd' WHERE `tablet`.`_id` = $idTablet";
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
                <span class='font-medium'>Success alert!</span> Data has been added. -->
                </div>
                <div class='flex justify-end'>
                    <a href='tablet.php'>
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
                        Edit tablet Data --> <?=$name?>
                    </h2>
                </div>

            </div>

            <div>


                <form action="editTablet.php?id=<?=$idTablet?>" method="post">
                    <div class="mb-6">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name of the Product</label>
                        <input type="text" id="rate" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="123.00" value="<?= $name ?> - <?= $size?>" readonly />
                    </div>
                    <div class="mb-6">
                        <label for="lc_noe" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Number Employee in Lehi and Chashni</label>
                        <input type="number" step="any" id="rate" name="lc_noe" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="123.00" value="<?=$lc_noe?>" required />
                    </div>
                    <div class="mb-6">
                        <label for="lc_nod" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Number of Daya in Lehi and Chashni</label>
                        <input type="number" step="any" id="rate" name="lc_nod" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="123.00" value="<?=$lc_nod?>" required />
                    </div>
                    <div class="mb-6">
                        <label for="mx_noe" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Number of Employee in Mixing</label>
                        <input type="number" step="any" id="rate" name="mx_noe" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="123.00" value="<?=$mx_noe?>" required />
                    </div>
                    <div class="mb-6">
                        <label for="mx_nod" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Number of Days in Mixing</label>
                        <input type="number" step="any" id="mx_nod" name="mx_nod" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="123.00" value="<?=$mx_nod?>" required />
                    </div>
                    <div class="mb-6">
                        <label for="gr_noe" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Number of Employee in Grinding</label>
                        <input type="number" step="any" id="gr_noe" name="gr_noe" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="123.00" value="<?=$gr_noe?>" required />
                    </div>
                    <div class="mb-6">
                        <label for="gr_nod" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Number of Days in Grinding</label>
                        <input type="number" step="any" id="gr_nod" name="gr_nod" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="123.00" value="<?=$gr_nod?>" required />
                    </div>
                    <div class="mb-6">
                        <label for="tb_noe" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Number of Employee in Tablet</label>
                        <input type="number" step="any" id="tb_noe" name="tb_noe" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="123.00" value="<?=$tb_noe?>" required />
                    </div>
                    <div class="mb-6">
                        <label for="tb_nod" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Number of Days in Tablet</label>
                        <input type="number" step="any" id="tb_nod" name="tb_nod" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="123.00" value="<?=$tb_nod?>" required />
                    </div>
                    <div class="mb-6">
                        <label for="spd" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Number of Salary Per Day</label>
                        <input type="number" step="any" id="spd" name="spd" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="123.00" value="<?=$spd?>" required />
                    </div>


                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                </form>





            </div>
        </div>

    </div>
</div>
<!-- End Content -->


<?php include 'includes/_bottombar.php' ?>