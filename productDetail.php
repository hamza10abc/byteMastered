<?php
global $prodId;
$sqlProdFind = "SELECT * FROM product ORDER BY _id DESC LIMIT 1";
$runSqlProdFind = mysqli_query($conn, $sqlProdFind);
while ($row = mysqli_fetch_assoc($runSqlProdFind)) {
    $type = $row['type'];
    $prodId = $row['_id'];
    $prodName = $row['name'];
    $size = $row['sizes'];
}
?>










<!-- Main Product Detail -->

<div class="border rounded-lg m-4">
    <div class="font-medium text-center mt-4 ">
        <h2 class="text-xl">
            Basic Product Data
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







<!-- Insider data -->
<div class="border rounded-lg m-4">
    <div class="font-medium text-center mt-4 ">
        <h2 class="text-xl">
            Product Details
        </h2>
    </div>

    <?php
    if($type == "As"){
        echo "<div style='overflow:auto' class='m-4'>
                <table class='items-center w-full bg-transparent border-collapse'>
                    <thead>
                        <tr>
                            <th class='px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left'>S.No.</th>
                            <th class='px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left'>Name</th>
                            <th class='px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px'>Unit Size</th>
                            <th class='px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px'>#Employee</th>
                            <th class='px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px'>#Days</th>
                            <th class='px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px'>Total Employee Days</th>
                            <th class='px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px'>Employee Salary/Day</th>
                            <th class='px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px'>Total Cost</th>
                            <th class='px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px'>Manage</th>
                        </tr>
                    </thead>
                    <tbody>";          
                        $sql = "SELECT * FROM `arksaji` WHERE pid = $prodId";
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
                            $totalEmpDays = $row['noe'] * $row['nod'];
                            $totalCost = $row['salPerDay'] * $totalEmpDays;
                            $sno += 1;
                            echo "<tr class='text-gray-700 dark:text-gray-100'>
                                <td class='border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4'>" . $sno . "</td>
                                <th class='border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left'>" . $name . "</th>
                                <td class='border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4'>
                                    " . $size . "
                                </td>
                                <td class='border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4'>
                                    " . $row['noe'] . "
                                </td>
                                <td class='border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4'>
                                    " . $row['nod'] . "
                                </td>
                                <td class='border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4'>
                                    " . $totalEmpDays . "
                                </td>
                                <td class='border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4'>
                                    " . $row['salPerDay'] . "
                                </td>
                                <td class='border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4'>
                                    " . $totalCost . "
                                </td>
                                <td class='border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4'>
                                    <a href='editArk.php?id=" . $idRM . "'>
                                        <button id=" . $row['_id'] . " class='edit bg-blue-300 hover:bg-blue-400 text-blue-800 font-bold py-2 px-4 rounded inline-flex items-center'>
                                            <i class='bx bxs-edit-alt'></i>
                                            <span class='ml-1'>Edit</span>
                                        </button>
                                    </a>
                                    <a href='delArk.php?id=" . $idRM . "'>
                                        <button id=" . $row['_id'] . " class='delete bg-red-300 hover:bg-red-400 text-red-800 font-bold py-2 px-4 rounded inline-flex items-center' onclick='sureDel()'>
                                            <i class='bx bx-checkbox-minus'></i>
                                            <span class='ml-1'>Delete</span>
                                        </button>
                                    </a>
                                </td>
                            </tr>";
                        }
                        
                    echo "</tbody>
                </table>

            </div>

";
            

    }else if($type == "Ds"){
        echo "
    <div class='m-4' style='overflow: auto;'>
                <table class='items-center w-full bg-transparent border-collapse'>
                    <thead>
                        <tr>
                            <th class='px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left'>S.No.</th>
                            <th class='px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left'>Name</th>
                            <th class='px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px'>Unit Size</th>
                            <th class='px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px'>#Employee</th>
                            <th class='px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px'>#Days</th>
                            <th class='px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px'>Total Employee Days</th>
                            <th class='px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px'>Employee Salary/Day</th>
                            <th class='px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px'>Total Cost</th>
                            <th class='px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px'>Manage</th>
                        </tr>
                    </thead>
                    <tbody>";




                        
                        $sql = "SELECT * FROM `dawasaji` where pid = $prodId";
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
                            $totalEmpDays = $row['noe'] * $row['nod'];
                            $totalCost = $row['salPerDay'] * $totalEmpDays;
                            $sno += 1;
                            echo "<tr class='text-gray-700 dark:text-gray-100'>
                                <td class='border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4'>" . $sno . "</td>
                                <th class='border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left'>" . $name . "</th>
                                <td class='border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4'>
                                    " . $size . "
                                </td>
                                <td class='border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4'>
                                    " . $row['noe'] . "
                                </td>
                                <td class='border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4'>
                                    " . $row['nod'] . "
                                </td>
                                <td class='border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4'>
                                    " . $totalEmpDays . "
                                </td>
                                <td class='border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4'>
                                    " . $row['salPerDay'] . "
                                </td>
                                <td class='border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4'>
                                    " . $totalCost . "
                                </td>
                                <td class='border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4'>
                                    <a href='editDawa.php?id=" . $idRM . "'>
                                        <button id=" . $row['_id'] . " class='edit bg-blue-300 hover:bg-blue-400 text-blue-800 font-bold py-2 px-4 rounded inline-flex items-center'>
                                            <i class='bx bxs-edit-alt'></i>
                                            <span class='ml-1'>Edit</span>
                                        </button>
                                    </a>
                                    <a href='delDawa.php?id=" . $idRM . "'>
                                        <button id=" . $row['_id'] . " class='delete bg-red-300 hover:bg-red-400 text-red-800 font-bold py-2 px-4 rounded inline-flex items-center' onclick='sureDel()'>
                                            <i class='bx bx-checkbox-minus'></i>
                                            <span class='ml-1'>Delete</span>
                                        </button>
                                    </a>
                                </td>
                            </tr>";
                        }
                    echo "</tbody>
                </table>

            </div>
";

    }else if($type == "T"){
        echo "
    <div style='overflow:auto' class='m-4'>
                    <table class='items-center w-full bg-transparent border-collapse'>
                        <thead>
                            <tr>
                                <th class='px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left'>S.No.</th>
                                <th class='px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left'>Name</th>
                                <th class='px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px'>Unit Size</th>
                                <th class='px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px'>Lehi Chasni NOE</th>
                                <th class='px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px'>Lehi Chasni NOD</th>
                                <th class='px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px'>Mixing NOE</th>
                                <th class='px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px'>Mixing NOD</th>
                                <th class='px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px'>Grinding NOE</th>
                                <th class='px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px'>Grinding NOD</th>
                                <th class='px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px'>Tablet NOE</th>
                                <th class='px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px'>Tablet NOD</th>
                                <th class='px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px'>Total NOE</th>
                                <th class='px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px'>Total NOD</th>
                                <th class='px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px'>Total Employee Salary</th>
                                <th class='px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px'>Emp Sal/Day</th>
                                <th class='px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px'>Total Cost</th>
                                <th class='px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px'>Manage</th>
                            </tr>
                        </thead>
                        <tbody>";

                            
                            $sql = "SELECT * FROM `tablet` where pid = $prodId";
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
                                $totalEmp = $row['lc_noe'] + $row['mx_noe'] + $row['gr_noe'] + $row['tb_noe'];
                                $totalDays = $row['lc_nod'] + $row['mx_nod'] + $row['gr_nod'] + $row['tb_nod'];
                                $totalEmpDays = ($row['lc_noe'] * $row['lc_nod']) + ($row['mx_noe'] * $row['mx_nod']) + ($row['gr_noe'] * $row['gr_nod']) + ($row['tb_noe'] * $row['tb_nod']);
                                $totalCost = 1; //????
                                $sno += 1;
                                echo "<tr class='text-gray-700 dark:text-gray-100'>
                                <td class='border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4'>" . $sno . "</td>
                                <th class='border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left'>" . $name . "</th>
                                <td class='border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4'>
                                    " . $size . "
                                </td>
                                <td class='border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4'>
                                    " . $row['lc_noe'] . "
                                </td>
                                <td class='border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4'>
                                    " . $row['lc_nod'] . "
                                </td>
                                <td class='border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4'>
                                    " . $row['mx_noe'] . "
                                </td>
                                <td class='border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4'>
                                    " . $row['mx_nod'] . "
                                </td>
                                <td class='border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4'>
                                    " . $row['gr_noe'] . "
                                </td>
                                <td class='border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4'>
                                    " . $row['gr_nod'] . "
                                </td>
                                <td class='border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4'>
                                    " . $row['tb_noe'] . "
                                </td>
                                <td class='border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4'>
                                    " . $row['tb_nod'] . "
                                </td>
                                <td class='border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4'>
                                    " . $totalEmp . "
                                </td>
                                <td class='border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4'>
                                    " . $totalDays . "
                                </td>
                                <td class='border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4'>
                                    " . $totalEmpDays . "
                                </td>
                                <td class='border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4'>
                                    " . $row['spd'] . "
                                </td>
                                <td class='border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4'>
                                    " . $totalCost . "
                                </td>
                                <td class='border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4'>
                                    <a href='editTablet.php?id=" . $idRM . "'>
                                        <button id=" . $row['_id'] . " class='edit bg-blue-300 hover:bg-blue-400 text-blue-800 font-bold py-2 px-4 rounded inline-flex items-center'>
                                            <i class='bx bxs-edit-alt'></i>
                                            <span class='ml-1'>Edit</span>
                                        </button>
                                    </a>
                                    <a href='delTablet.php?id=" . $idRM . "'>
                                        <button id=" . $row['_id'] . " class='delete bg-red-300 hover:bg-red-400 text-red-800 font-bold py-2 px-4 rounded inline-flex items-center' onclick='sureDel()'>
                                            <i class='bx bx-checkbox-minus'></i>
                                            <span class='ml-1'>Delete</span>
                                        </button>
                                    </a>
                                </td>
                            </tr>";
                            }
                        echo "</tbody>
                    </table>
                </div>
";
    }else if($type == "S"){
        echo "
    <div style='overflow:auto' class='m-4'>
                    <table class='items-center w-full bg-transparent border-collapse'>
                        <thead>
                            <tr>
                                <th class='px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left'>S.No.</th>
                                <th class='px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left'>Name</th>
                                <th class='px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px'>Unit Size</th>
                                <th class='px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px'>#Supervise</th>
                                <th class='px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px'>Supervise Days</th>
                                <th class='px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px'>#Ghan Employee</th>
                                <th class='px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px'>Ghan Days</th>
                                <th class='px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px'>#Filling Employees</th>
                                <th class='px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px'>Filling Days</th>
                                <th class='px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px'>#Sealing Employees</th>
                                <th class='px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px'>Sealing Days</th>
                                <th class='px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px'>#Checking Employees</th>
                                <th class='px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px'>Check Days</th>
                                <th class='px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px'>Total Cost</th>
                                <th class='px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px'>Emp Sal/Day</th>
                                <th class='px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px'>Total Employee Cost</th>
                                <th class='px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px'>Manage</th>
                            </tr>
                        </thead>
                        <tbody>";
                            
                            $sql = "SELECT * FROM `syrup` where pid = $prodId";
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
                                $totalEmpDays = ($row['sup_noe'] * $row['sup_nod']) + ($row['igp_noe'] * $row['igp_nod']) + ($row['if_noe'] * $row['if_nod']) + ($row['is_noe'] * $row['is_nod']) + ($row['ic_noe'] * $row['ic_nod']);
                                $empPerDay = 2; //?????
                                $totalCost = $empPerDay * $totalEmpDays;
                                $sno += 1;
                                echo "<tr class='text-gray-700 dark:text-gray-100'>
                                <td class='border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4'>" . $sno . "</td>
                                <th class='border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left'>" . $name . "</th>
                                <td class='border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4'>
                                    " . $size . "
                                </td>
                                <td class='border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4'>
                                    " . $row['sup_noe'] . "
                                </td>
                                <td class='border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4'>
                                    " . $row['sup_nod'] . "
                                </td>
                                <td class='border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4'>
                                    " . $row['igp_noe'] . "
                                </td>
                                <td class='border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4'>
                                    " . $row['igp_nod'] . "
                                </td>
                                <td class='border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4'>
                                    " . $row['if_noe'] . "
                                </td>
                                <td class='border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4'>
                                    " . $row['if_nod'] . "
                                </td>
                                <td class='border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4'>
                                    " . $row['is_noe'] . "
                                </td>
                                <td class='border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4'>
                                    " . $row['is_nod'] . "
                                </td>
                                <td class='border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4'>
                                    " . $row['ic_noe'] . "
                                </td>
                                <td class='border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4'>
                                    " . $row['ic_nod'] . "
                                </td>
                                <td class='border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4'>
                                    " . $totalEmpDays . "
                                </td>
                                <td class='border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4'>
                                    " . $empPerDay . "
                                </td>
                                <td class='border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4'>
                                    " . $totalCost . "
                                </td>
                                <td class='border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4'>
                                    <a href='editSyrup.php?id=" . $idRM . "'>
                                        <button id=" . $row['_id'] . " class='edit bg-blue-300 hover:bg-blue-400 text-blue-800 font-bold py-2 px-4 rounded inline-flex items-center'>
                                            <i class='bx bxs-edit-alt'></i>
                                            <span class='ml-1'>Edit</span>
                                        </button>
                                    </a>
                                    <a href='delSyrup.php?id=" . $idRM . "'>
                                        <button id=" . $row['_id'] . " class='delete bg-red-300 hover:bg-red-400 text-red-800 font-bold py-2 px-4 rounded inline-flex items-center' onclick='sureDel()'>
                                            <i class='bx bx-checkbox-minus'></i>
                                            <span class='ml-1'>Delete</span>
                                        </button>
                                    </a>
                                </td>
                            </tr>";
                            }
                            




                        echo "</tbody>
                    </table>
                </div>
    ";

    }else if($type == "P"){
        echo "
<div style='overflow:auto' class='m-4'>
                    <table class='items-center w-full bg-transparent border-collapse display' id='example'>
                        <thead>
                            <tr>
                                <th class='px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left'>S.No.</th>
                                <th class='px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left'>Name</th>
                                <th class='px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px'>Unit Size</th>
                                <th class='px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px'>Input(kg)</th>
                                <th class='px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px'>Output(kg)</th>
                                <th class='px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px'>#Employee</th>
                                <th class='px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px'>Hours/Days</th>
                                <th class='px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px'>Hour</th>
                                <th class='px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px'>#Days</th>
                                <th class='px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px'>Total Emp Days</th>
                                <th class='px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px'>Employee Salary/Day</th>
                                <th class='px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px'>Total Cost</th>
                                <th class='px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px'>Manage</th>
                            </tr>
                        </thead>
                        <tbody>";




                            
                            $sql = "SELECT * FROM `grinding` where pid = $prodId";
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
                                $totalDays = $row['hid'] / 8;
                                $totalEmpDays = $totalDays * $row['noe'];
                                $totalCost = $row['spd'] * $totalEmpDays;
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
                                    " . $row['output'] . "
                                </td>
                                <td class='border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4'>
                                    " . $row['noe'] . "
                                </td>
                                <td class='border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4'>
                                    " . $row['hid'] . "
                                </td>
                                <td class='border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4'>
                                    8
                                </td>
                                <td class='border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4'>
                                    " . $totalDays . "
                                </td>
                                <td class='border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4'>
                                    " . $totalEmpDays . "
                                </td>
                                <td class='border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4'>
                                    " . $row['spd'] . "
                                </td>
                                <td class='border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4'>
                                    " . $totalCost . "
                                </td>
                                <td class='border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4'>
                                    <a href='editGrind.php?id=" . $idRM . "'>
                                        <button id=" . $row['_id'] . " class='edit bg-blue-300 hover:bg-blue-400 text-blue-800 font-bold py-2 px-4 rounded inline-flex items-center'>
                                            <i class='bx bxs-edit-alt'></i>
                                            <span class='ml-1'>Edit</span>
                                        </button>
                                    </a>
                                    <a href='delGrind.php?id=" . $idRM . "'>
                                        <button id=" . $row['_id'] . " class='delete bg-red-300 hover:bg-red-400 text-red-800 font-bold py-2 px-4 rounded inline-flex items-center' onclick='sureDel()'>
                                            <i class='bx bx-checkbox-minus'></i>
                                            <span class='ml-1'>Delete</span>
                                        </button>
                                    </a>
                                </td>
                            </tr>";
                            }
                        
                        echo "</tbody>
                    </table>
                </div>
";
    }else{
        echo "Error in fetching data";
    }
    ?>

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
        <a href='editLabPack.php?id=<?= $idRM ?>'>
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
                    while ($prodRow = mysqli_fetch_assoc($resultProd)) {
                        $name = $prodRow['name'];
                        $type = $prodRow['type'];
                        $size = $prodRow['sizes'];
                    }
                    $idPack = $row['_id'];
                    $totalCost = $row['cover_box'] + $row['jar'] + $row['label'] + $row['cartoon'] + $row['cap'];
                    $unitLot = 3; //??
                    $totalCostLot = $totalCost * $unitLot;
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
        <a href='editPack.php?id=<?= $idPack ?>'>
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