<?php
include 'includes/_topbar.php';
$sqlProdFind = "SELECT * FROM product ORDER BY _id DESC LIMIT 1";
$runSqlProdFind = mysqli_query($conn, $sqlProdFind);
while ($row = mysqli_fetch_assoc($runSqlProdFind)) {
    $type = $row['type'];
    $prodId = $row['_id'];
    $prodName = $row['name'];
}

$insert = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $pid = $_POST['pid'];
    $sup_noe = $_POST['sup_noe'];
    $sup_nod = $_POST['sup_nod'];
    $igp_noe = $_POST['igp_noe'];
    $igp_nod = $_POST['igp_nod'];
    $if_noe = $_POST['if_noe'];
    $if_nod = $_POST['if_nod'];
    $is_noe = $_POST['is_noe'];
    $is_nod = $_POST['is_nod'];
    $ic_noe = $_POST['ic_noe'];
    $ic_nod = $_POST['ic_nod'];
    $sql = "INSERT INTO `syrup` (`pid`, `sup_noe`, `sup_nod`, `igp_noe`, `igp_nod`, `if_noe`, `if_nod`, `is_noe`, `is_nod`, `ic_noe`, `ic_nod`) VALUES ('$pid', '$sup_noe', '$sup_nod', '$igp_noe', '$igp_nod', '$if_noe', '$if_nod', '$is_noe', '$is_nod', '$ic_noe', '$ic_nod')";
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
                <span class='font-medium'>Success alert!</span> Data has been added. You are being redirected.
                </div>
                
            </div>
                ";
        echo "<meta http-equiv='refresh' content='3;url=addProd2.php' />";
    }
    ?>
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
        <div class="bg-white border border-gray-100 shadow-md shadow-black/5 p-6 rounded-md lg:col-span-3">
            <div class="flex justify-between mb-4 items-start">
                <div class="font-medium">
                    <h2 class="text-xl">
                        Add Syrup Data
                    </h2>
                </div>

            </div>

            <div>


                <form action="addSyrup.php" method="post">
                    <input type="hidden" name="pid" value="<?= $prodId ?>">
                    <div class="mb-6">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Number of Employees</label>
                        <input type="text" id="name" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Name" value="<?= $prodId ?> - <?= $prodName; ?> - <?= $type ?>" readonly />
                    </div>
                    <div class="mb-6">
                        <label for="sup_noe" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Number of Supervisor</label>
                        <input type="number" id="rate" name="sup_noe" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="123.00" required />
                    </div>
                    <div class="mb-6">
                        <label for="sup_nod" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Number of Daya of Supervision</label>
                        <input type="number" id="rate" name="sup_nod" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="123.00" required />
                    </div>
                    <div class="mb-6">
                        <label for="igp_noe" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Number of Employee in Ghan Preperation</label>
                        <input type="number" id="rate" name="igp_noe" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="123.00" required />
                    </div>
                    <div class="mb-6">
                        <label for="igp_nod" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Number of Days in Ghan Preperation</label>
                        <input type="number" id="igp_nod" name="igp_nod" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="123.00" required />
                    </div>
                    <div class="mb-6">
                        <label for="if_noe" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Number of Employee in Filling</label>
                        <input type="number" id="if_noe" name="if_noe" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="123.00" required />
                    </div>
                    <div class="mb-6">
                        <label for="if_nod" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Number of Days in Filling</label>
                        <input type="number" id="if_nod" name="if_nod" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="123.00" required />
                    </div>
                    <div class="mb-6">
                        <label for="is_noe" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Number of Employee in Sealing</label>
                        <input type="number" id="is_noe" name="is_noe" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="123.00" required />
                    </div>
                    <div class="mb-6">
                        <label for="is_nod" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Number of Days in Sealing</label>
                        <input type="number" id="is_nod" name="is_nod" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="123.00" required />
                    </div>
                    <div class="mb-6">
                        <label for="ic_noe" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Number of Employee in Checking</label>
                        <input type="number" id="ic_noe" name="ic_noe" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="123.00" required />
                    </div>
                    <div class="mb-6">
                        <label for="ic_nod" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Number of Days in Checking</label>
                        <input type="number" id="ic_nod" name="ic_nod" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="123.00" required />
                    </div>

                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                </form>





            </div>
        </div>

    </div>
</div>
<!-- End Content -->


<?php include 'includes/_bottombar.php' ?>