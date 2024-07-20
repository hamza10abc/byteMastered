<?php
include 'includes/_topbar.php';

$idPack = $_GET['id'];
$sql = "SELECT * from packaging_material where _id = $idPack";
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
    $cover_box=$row['cover_box'];
    $label=$row['label'];
    $jar=$row['jar'];
    $cartoon=$row['cartoon'];
    $cap=$row['cap'];
    $qty=$row['qty'];
}



$update = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $cover_box=$_POST['cover_box'];
    $label=$_POST['label'];
    $jar=$_POST['jar'];
    $cartoon=$_POST['cartoon'];
    $cap=$_POST['cap'];
    $qty=$_POST['qty'];
    $sql = "UPDATE `packaging_material` SET `cover_box` = '$cover_box', `label` = '$label', `jar` = '$jar', `cartoon` = '$cartoon', `cap` = '$cap', `qty` = '$qty' WHERE `packaging_material`.`_id` = $idPack";
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
                    <a href='packaging.php'>
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
                        Add Packaging Material Data
                    </h2>
                </div>

            </div>

            <div>


                <form action="editPack.php?id=<?=$idPack?>" method="post">
                    <div class="mb-6">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name of the Product</label>
                        <input type="text" id="rate" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="123.00" value="<?= $name ?> - <?= $size?>" readonly />
                    </div>
                    <div class="mb-6">
                        <label for="qty" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Quantity</label>
                        <select name="qty" id="qty"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                            <option value="<?=$qty?>">
                                <?=$qty?>
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
                        <label for="input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cover Box</label>
                        <input type="number" id="rate" name="cover_box" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="123.00" value="<?=$cover_box?>" required />
                    </div>
                    <div class="mb-6">
                        <label for="output" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Label</label>
                        <input type="number" id="rate" name="label" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="123.00" value="<?=$label?>" required />
                    </div>
                    <div class="mb-6">
                        <label for="jar" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jar/Dabba</label>
                        <input type="number" id="rate" name="jar" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="123.00" value="<?=$jar?>" required />
                    </div>
                    <div class="mb-6">
                        <label for="cartoon" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cartoon</label>
                        <input type="number" id="cartoon" name="cartoon" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="123.00" value="<?=$cartoon?>" required />
                    </div>
                    <div class="mb-6">
                        <label for="cap" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cap</label>
                        <input type="number" id="cap" name="cap" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="123.00" value="<?=$cap?>" required />
                    </div>
                    
                    
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                </form>





            </div>
        </div>

    </div>
</div>
<!-- End Content -->


<?php include 'includes/_bottombar.php' ?>