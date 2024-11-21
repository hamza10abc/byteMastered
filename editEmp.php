<?php
include 'includes/_topbar.php';

$idEmp = $_GET['id'];
$sql = "SELECT * from employee where _id = $idEmp";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)) {
    $name = $row['name'];
    $desig = $row['desig'];
    $gross_salary = $row['gross_salary'];
}



$update = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $name = $_POST['name'];
    $desig = $_POST['desig'];
    $gross_salary = $_POST['gross_salary'];
    $sql = "UPDATE `employee` SET `name` = '$name', `desig` = '$desig', `gross_salary` = '$gross_salary' WHERE `employee`.`_id` = $idEmp";
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
                <span class='font-medium'>Success alert!</span> Data has been edited. -->
                </div>
                <div class='flex justify-end'>
                    <a href='employee.php'>
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
                        Edit Employee Data --> <?= $name ?>
                    </h2>
                </div>

            </div>

            <div>


                <form action="editEmp.php?id=<?= $idEmp ?>" method="post">
                    
                    <div class="mb-6">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name of the Employee</label>
                        <input type="text" id="rate" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="123.00" value="<?= $name ?>" required />
                    </div>
                    
                    <div class="mb-6">
                        <label for="desig" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Employee Designation</label>
                        <select name="desig" id="desig"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                            <option value="<?=$desig?>">
                                <?=$desig?>
                            </option>
                            <option value="UDC">
                                UDC
                            </option>
                            <option value="MTS">
                                MTS
                            </option>
                            <option value="Daily Wager">
                                Daily Wager
                            </option>
                        </select>
                    </div>

                    <div class="mb-6">
                        <label for="gross_salary" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gross Salary</label>
                        <input type="number" step="any" id="gross_salary" name="gross_salary" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="123.00" value=<?= $gross_salary ?> required />
                    </div>

                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                </form>





            </div>
        </div>

    </div>
</div>
<!-- End Content -->


<?php include 'includes/_bottombar.php' ?>