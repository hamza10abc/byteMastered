<?php include 'includes/_topbar.php' ?>


<!-- Content -->
<div class="p-6">

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
        <div class="bg-white border border-gray-100 shadow-md shadow-black/5 p-6 rounded-md lg:col-span-3">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-4">
                <div class="flex justify-between mb-4 items-start">
                    <div class="font-medium">
                        <h2 class="text-xl">
                            Lot Ghan Details
                        </h2>
                    </div>
                </div>
                <div class="p-4 col-start-4">
                    <a href="#">
                        <button class="bg-blue-300 hover:bg-blue-400 text-blue-800 font-bold py-2 px-4 rounded inline-flex items-center">
                            <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z" />
                            </svg>
                            <span>Download</span>
                        </button>
                    </a>
                </div>
            </div>




            <div>



                <div style='overflow:auto' class='m-4'>
                    <table class='items-center w-full bg-transparent border-collapse display' id='example'>
                        <thead>
                            <tr>
                                <th class='px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left'>S.No.</th>
                                <th class='px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left'>Name</th>
                                <th class='px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px'>Unit Size</th>
                                <th class='px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px'>Store Input</th>
                                <th class='px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px'>Store Output</th>
                                <th class='px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px'>Production Input</th>
                                <th class='px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px'>Production Output</th>
                                <th class='px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px'>Packaging Input</th>
                                <th class='px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px'>Packaging Output</th>
                                <th class='px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px'>Raw Material Cost</th>
                                <th class='px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px'>Raw material Used</th>
                                <th class='px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px'>Manage</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            // global $productId;
                            $sql = "SELECT a.*, c.name, c.sizes from `lot_ghan` a join `product` c on a.pid = c._id;";
                            $result = mysqli_query($conn, $sql);
                            $sno = 0;
                            while ($row = mysqli_fetch_assoc($result)) {
                                $productId = $row['pid'];
                                // echo $productId;
                                $sqlProdRawMat = "SELECT z.*, y.* from product_details z join raw_material y on z.raw_id = y._id where z.pid = $productId";
                                $runSqlProdRawMat = mysqli_query($conn, $sqlProdRawMat);
                                $totalCostOfRawMat = 0;
                                $totalRawMatUsed = 0;
                                while ($rowTest = mysqli_fetch_assoc($runSqlProdRawMat)) {

                                    $quantity = $rowTest['qty'];
                                    $final_rate = $rowTest['final_rate'];
                                    // $final_rate = 10;
                                    // echo $final_rate;
                                    $costOfRM = $quantity * $final_rate;
                                    $totalCostOfRawMat += $costOfRM;
                                    $totalRawMatUsed += $quantity;
                                }
                                $idRM = $row['_id'];
                                $sno += 1;
                                echo "<tr class='text-gray-700 dark:text-black'>
                                <td class='border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4'>" . $sno . "</td>
                                <th class='border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left'>" . $row['name'] . "</th>
                                <td class='border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4'>
                                    " . $row['sizes'] . "
                                </td>
                                <td class='border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4'>
                                    " . $row['sts_input'] . "
                                </td>
                                <td class='border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4'>
                                    " . $row['sts_output'] . "
                                </td>
                                <td class='border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4'>
                                    " . $row['prs_input'] . "
                                </td>
                                <td class='border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4'>
                                    " . $row['prs_output'] . "
                                </td>
                                <td class='border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4'>
                                    " . $row['pks_input'] . "
                                </td>
                                <td class='border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4'>
                                    " . $row['pks_output'] . "
                                </td>
                                <td class='border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4'>
                                    " . $totalCostOfRawMat . "
                                </td>
                                <td class='border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4'>
                                    " . $totalRawMatUsed . "
                                </td>
                                
                                <td class='border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4'>
                                    <a href='editLot.php?id=" . $row['_id'] . "'>
                                        <button id=" . $row['_id'] . " class='edit bg-blue-300 hover:bg-blue-400 text-blue-800 font-bold py-2 px-4 rounded inline-flex items-center'>
                                            <i class='bx bxs-edit-alt'></i>
                                            <span class='ml-1'>Edit</span>
                                        </button>
                                    </a>
                                    <a href='delLot.php?id=" . $row['_id'] . "'>
                                        <button id=" . $row['_id'] . " class='delete bg-red-300 hover:bg-red-400 text-red-800 font-bold py-2 px-4 rounded inline-flex items-center' onclick='sureDel()'>
                                            <i class='bx bx-checkbox-minus'></i>
                                            <span class='ml-1'>Delete</span>
                                        </button>
                                    </a>
                                </td>
                            </tr>";
                            }
                            ?>












                        </tbody>
                    </table>
                </div>

            </div>
        </div>

    </div>
</div>
<!-- End Content -->

<script>
    function sureDel() {
        alert("Are you sure you want to delete the item?");
    }
</script>


<?php include 'includes/_bottombar.php' ?>
