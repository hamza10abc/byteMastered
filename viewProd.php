<?php
include 'includes/_topbar.php';
?>


<!-- Content -->
<div class="p-6">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
        <div class="bg-white border border-gray-100 shadow-md shadow-black/5 p-6 rounded-md lg:col-span-3">

                <div class="font-medium text-center">
                    <h2 class="text-xl">
                       <u> <b> Product Detail </b> </u>
                    </h2>
                </div>


            <div>

            <?php
global $prodId;
$prodId = $_GET['id'];
$sqlProdFind = "SELECT * FROM product where _id = $prodId";
$runSqlProdFind = mysqli_query($conn, $sqlProdFind);
while ($row = mysqli_fetch_assoc($runSqlProdFind)) {
    $type = $row['type'];
    $prodName = $row['name'];
    $size = $row['sizes'];
}
?>










<!-- Main Product Detail -->

<div class="border rounded-lg m-4">
    <div class="font-medium text-center mt-4 ">
        <h2 class="text-xl">
            Product Details
        </h2>
    </div>

    <div class="flex justify-around">
        <div class="w-1/3 p-4 text-center">
            Name: <mark><i><?= $prodName ?></i></mark>
        </div>
        <div class="w-1/3 p-4 text-center">
            Type: <mark><i><?= $type ?></i></mark>
        </div>
        <div class="w-1/3 p-4 text-center">
            Size: <mark><i><?= $size ?></i></mark>
        </div>
    </div>

    <div class="font-medium text-center m-4 ">
        <a href='editProd.php?id=<?= $prodId ?>'>
            <button id="?" class='edit bg-blue-300 hover:bg-blue-400 text-blue-800 font-bold py-2 px-4 rounded inline-flex items-center'>
                <i class='bx bxs-edit-alt'></i>
                <span class='ml-1'>Edit</span>
            </button>
        </a>
    </div>
</div>





<!-- Raw material detail -->

<div class="border rounded-lg m-4">
    <div class="font-medium text-center mt-4 ">
        <h2 class="text-xl">
            Raw Material Involved
        </h2>
    </div>

    <div class="flex justify-around m-4">
        <table class="items-center w-full bg-transparent border-collapse">
            <thead>
                <tr>
                    <th class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">S.No.</th>
                    <th class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">Name</th>
                    <th class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px">Amount</th>
                    <th class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px">Quantity</th>
                    <th class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px">Cost - (AxQ)</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM `product_details` WHERE pid = $prodId";
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
                    echo "
                        <tr class='text-gray-700 dark:text-gray-100'>
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
                        </tr>
                    ";
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
    </div>

    <div class="font-medium text-center m-4 ">
        <a href='editRawMatCost.php?pid=<?= $prodId ?>&rmid=<?= $rawMatID ?>&page=<?= $type ?>'>
            <button id="" class='edit bg-blue-300 hover:bg-blue-400 text-blue-800 font-bold py-2 px-4 rounded inline-flex items-center'>
                <i class='bx bxs-edit-alt'></i>
                <span class='ml-1'>Edit</span>
            </button>
        </a>
    </div>
</div>








<!-- Labour in Packaging detial -->

<div class="border rounded-lg m-4">
    <div class="font-medium text-center mt-4 ">
        <h2 class="text-xl">
            Labour in Packaging Data
        </h2>
    </div>

    <div style="overflow:auto" class="m-4">
        <table class="items-center w-full bg-transparent border-collapse">
            <thead>
                <tr>
                    <th class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">S.No.</th>
                    <th class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">Name</th>
                    <th class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px">Unit Size</th>
                    <th class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px">Input(kg)</th>
                    <th class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px">Production Lot/Ghan</th>
                    <th class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px">Karguzari Filling</th>
                    <th class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px">Karguzari Sealing</th>
                    <th class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px">Karguzari Packaging</th>
                    <th class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px">Other</th>
                    <th class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px">Employee Cost/Day</th>
                    <th class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px">Cost Filling</th>
                    <th class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px">Cost Sealing</th>
                    <th class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px">Cost Packaging</th>
                    <th class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px">Total Cost</th>
                </tr>
            </thead>
            <tbody>


                <?php
                global $idRM;
                $sqlEmpData = "SELECT SUM(gross_salary) from employee";
                $runSqlEmpData = mysqli_query($conn, $sqlEmpData);
                $row = mysqli_fetch_array($runSqlEmpData);
                $totalEmpSal = $row[0];


                $sqlCountEmp = "SELECT count(*) from employee";
                $runSqlCountEmp = mysqli_query($conn, $sqlCountEmp);
                $row = mysqli_fetch_array($runSqlCountEmp);
                $totalEmp = $row[0];
                // echo $totalEmp;

                $middleCal = $totalEmpSal / $totalEmp;

                $final = $middleCal / 26;


                $sql = "SELECT * FROM `labour_in_packing` where pid = $prodId";
                $result = mysqli_query($conn, $sql);
                $sno = 0;
                while ($row = mysqli_fetch_assoc($result)) {
                    $productId = $row['pid'];
                    $sqlProduct = "SELECT name, type, sizes FROM product WHERE _id = $productId";
                    $resultProd = mysqli_query($conn, $sqlProduct);
                    while ($prodRow = mysqli_fetch_assoc($resultProd)) {
                        $name = $prodRow['name'];
                        $type = $prodRow['type'];
                        $size = $prodRow['sizes'];
                    }
                    $idRM = $row['_id'];
                    $empCostDay = $final;
                    $costFilling = ($row['unit_prds_per_ghan'] / $row['filling']) * $empCostDay;
                    $costSealing = ($row['unit_prds_per_ghan'] / $row['sealing']) * $empCostDay;
                    $costPacking = ($row['unit_prds_per_ghan'] / $row['packing']) * $empCostDay;
                    $totalCost = $costFilling + $costPacking + $costSealing;
                    $sno += 1;
                    echo "<tr class='text-gray-700 dark:text-gray-100'>
                                <td class='border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4'>" . $sno . "</td>
                                <th class='border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left'>" . $name . "</th>
                                <td class='border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4'>
                                    " . $size . "
                                </td>
                                <td class='border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4'>
                                    " . $row['input'] . "
                                </td>
                                <td class='border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4'>
                                    " . $row['unit_prds_per_ghan'] . "
                                </td>
                                <td class='border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4'>
                                    " . $row['filling'] . "
                                </td>
                                <td class='border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4'>
                                    " . $row['sealing'] . "
                                </td>
                                <td class='border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4'>
                                    " . $row['packing'] . "
                                </td>
                                <td class='border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4'>
                                    " . $row['other'] . "
                                </td>
                                <td class='border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4'>
                                    " . $empCostDay . "
                                </td>
                                <td class='border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4'>
                                    " . $costFilling . "
                                </td>
                                <td class='border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4'>
                                    " . $costSealing . "
                                </td>
                                <td class='border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4'>
                                    " . $costPacking . "
                                </td>
                                <td class='border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4'>
                                    " . $totalCost . "
                                </td>
                            </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <div class="font-medium text-center m-4 ">
        <a href='editLabPack.php?id=<?=$idRM?>'>
            <button id="?" class='edit bg-blue-300 hover:bg-blue-400 text-blue-800 font-bold py-2 px-4 rounded inline-flex items-center'>
                <i class='bx bxs-edit-alt'></i>
                <span class='ml-1'>Edit</span>
            </button>
        </a>
    </div>
</div>






<!-- Packing Details -->

<div class="border rounded-lg m-4">
    <div class="font-medium text-center mt-4 ">
        <h2 class="text-xl">
            Packaging Details
        </h2>
    </div>


    <div style="overflow:auto" class="m-4">
                    <table class="items-center w-full bg-transparent border-collapse">
                        <thead>
                            <tr>
                                <th class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">S.No.</th>
                                <th class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">Name</th>
                                <th class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px">Unit Size</th>
                                <th class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px">Quantity</th>
                                <th class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px">Cover Box</th>
                                <th class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px">Labour</th>
                                <th class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px">Jar/Dabba</th>
                                <th class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px">Cartoon</th>
                                <th class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px">Cap</th>
                                <th class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px">Total Cost</th>
                                <th class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px">Unit/Lot</th>
                                <th class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px">Total Cost/Lot</th>
                            </tr>
                        </thead>
                        <tbody>








                        <?php
                        $sql = "SELECT * FROM `packaging_material` where pid = $prodId";
                        $result = mysqli_query($conn, $sql);
                        $sno = 0;
                        while ($row = mysqli_fetch_assoc($result)) {
                            $productId = $row['pid'];
                            $sqlProduct = "SELECT name, type, sizes FROM product WHERE _id = $productId";
                            $resultProd = mysqli_query($conn, $sqlProduct);
                            while($prodRow = mysqli_fetch_assoc($resultProd)){
                                $name = $prodRow['name'];
                                $type = $prodRow['type'];
                                $size = $prodRow['sizes'];
                            }
                            $idPack = $row['_id'];
                            $totalCost = $row['cover_box'] + $row['jar'] + $row['label'] + $row['cartoon'] + $row['cap'];
                            $unitLot = 3; //??
                            $totalCostLot = $totalCost*$unitLot;
                            $sno += 1;
                            echo "<tr class='text-gray-700 dark:text-gray-100'>
                                <td class='border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4'>" . $sno . "</td>
                                <th class='border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left'>" . $name . "</th>
                                <td class='border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4'>
                                    " . $size . "
                                </td>
                                <td class='border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4'>
                                    " . $row['qty'] . "
                                </td>
                                <td class='border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4'>
                                    " . $row['cover_box'] . "
                                </td>
                                <td class='border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4'>
                                    " . $row['label'] . "
                                </td>
                                <td class='border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4'>
                                    " . $row['jar'] . "
                                </td>
                                <td class='border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4'>
                                    " . $row['cartoon'] . "
                                </td>
                                <td class='border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4'>
                                    " . $row['cap'] . "
                                </td>
                                <td class='border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4'>
                                    " . $totalCost . "
                                </td>
                                <td class='border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4'>
                                    " . $unitLot . "
                                </td>
                                <td class='border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4'>
                                    " . $totalCostLot . "
                                </td>
                            </tr>";
                        }
                    ?>








                        </tbody>
                    </table>
                </div>


    <div class="font-medium text-center m-4 ">
        <a href='editPack.php?id=<?=$idPack?>'>
            <button id="?" class='edit bg-blue-300 hover:bg-blue-400 text-blue-800 font-bold py-2 px-4 rounded inline-flex items-center'>
                <i class='bx bxs-edit-alt'></i>
                <span class='ml-1'>Edit</span>
            </button>
        </a>
    </div>
</div>




<div class="font-medium text-center m-4 ">
    <a href='completed.php'>
        <button id="?" class='edit bg-green-300 hover:bg-green-400 text-green-800 font-bold py-2 px-4 rounded inline-flex items-center'>
            <i class='bx bxs-check-circle'></i>
            <span class='ml-1'>Done</span>
        </button>
    </a>
</div>




            </div>
        </div>

    </div>
</div>
<!-- End Content -->


<?php include 'includes/_bottombar.php' ?>
