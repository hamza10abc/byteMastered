<?php
include 'includes/_topbar.php';

$idSyrup = $_GET['id'];
$sql = "SELECT * from syrup where _id = $idSyrup";
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

    $sup_noe=$row['sup_noe'];
    $sup_nod=$row['sup_nod'];
    $igp_noe=$row['igp_noe'];
    $igp_nod=$row['igp_nod'];
    $if_noe=$row['if_noe'];
    $if_nod=$row['if_nod'];
    $is_noe=$row['is_noe'];
    $is_nod=$row['is_nod'];
    $ic_noe=$row['ic_noe'];
    $ic_nod=$row['ic_nod'];
}



$update = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $sup_noe=$_POST['sup_noe'];
    $sup_nod=$_POST['sup_nod'];
    $igp_noe=$_POST['igp_noe'];
    $igp_nod=$_POST['igp_nod'];
    $if_noe=$_POST['if_noe'];
    $if_nod=$_POST['if_nod'];
    $is_noe=$_POST['is_noe'];
    $is_nod=$_POST['is_nod'];
    $ic_noe=$_POST['ic_noe'];
    $ic_nod=$_POST['ic_nod'];

    $sql = "UPDATE `syrup` SET `sup_noe` = '$sup_noe', `sup_nod` = '$sup_nod', `igp_noe` = '$igp_noe', `igp_nod` = '$igp_nod', `if_noe` = '$if_noe', `if_nod` = '$if_nod', `is_noe` = '$is_noe', `is_nod` = '$is_nod', `ic_noe` = '$ic_noe', `ic_nod` = '$ic_nod' WHERE `syrup`.`_id` = $idSyrup";
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
                    <a href='syrup.php'>
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
                        Edit Syrup Data --> <?=$name?>
                    </h2>
                </div>

            </div>

            <div>


                <form action="editSyrup.php?id=<?=$idSyrup?>" method="post">
                    <div class="mb-6">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name of the Product</label>
                        <input type="text" id="rate" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="123.00" value="<?= $name ?> - <?= $size?>" readonly />
                    </div>
                    <div class="mb-6">
                        <label for="sup_noe" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Number of Supervisor</label>
                        <input type="number" step="any" id="rate" name="sup_noe" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="123.00" value="<?=$sup_noe?>" required />
                    </div>
                    <div class="mb-6">
                        <label for="sup_nod" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Number of Daya of Supervision</label>
                        <input type="number" step="any" id="rate" name="sup_nod" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="123.00" value="<?=$sup_nod?>" required />
                    </div>
                    <div class="mb-6">
                        <label for="igp_noe" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Number of Employee in Ghan Preperation</label>
                        <input type="number" step="any" id="rate" name="igp_noe" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="123.00" value="<?=$igp_noe?>" required />
                    </div>
                    <div class="mb-6">
                        <label for="igp_nod" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Number of Days in Ghan Preperation</label>
                        <input type="number" step="any" id="igp_nod" name="igp_nod" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="123.00" value="<?=$igp_nod?>" required />
                    </div>
                    <div class="mb-6">
                        <label for="if_noe" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Number of Employee in Filling</label>
                        <input type="number" step="any" id="if_noe" name="if_noe" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="123.00" value="<?=$if_noe?>" required />
                    </div>
                    <div class="mb-6">
                        <label for="if_nod" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Number of Days in Filling</label>
                        <input type="number" step="any" id="if_nod" name="if_nod" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="123.00" value="<?=$if_nod?>" required />
                    </div>
                    <div class="mb-6">
                        <label for="is_noe" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Number of Employee in Sealing</label>
                        <input type="number" step="any" id="is_noe" name="is_noe" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="123.00" value="<?=$is_noe?>" required />
                    </div>
                    <div class="mb-6">
                        <label for="is_nod" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Number of Days in Sealing</label>
                        <input type="number" step="any" id="is_nod" name="is_nod" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="123.00" value="<?=$is_nod?>" required />
                    </div>
                    <div class="mb-6">
                        <label for="ic_noe" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Number of Employee in Checking</label>
                        <input type="number" step="any" id="ic_noe" name="ic_noe" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="123.00" value="<?=$ic_noe?>" required />
                    </div>
                    <div class="mb-6">
                        <label for="ic_nod" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Number of Days in Checking</label>
                        <input type="number" step="any" id="ic_nod" name="ic_nod" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="123.00" value="<?=$ic_nod?>" required />
                    </div>
                    
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                </form>





            </div>
        </div>

    </div>
</div>
<!-- End Content -->


<?php include 'includes/_bottombar.php' ?>