<!-- Multi level form banana hai ->raw material add hoga -> main table ka data add hoga -> labour in packaging -> packaging material add hoga -> product details  -->

<?php
include 'includes/_topbar.php';
?>
<div class="p-6">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
        <div class="bg-white border border-gray-100 shadow-md shadow-black/5 p-6 rounded-md lg:col-span-3">
            <div class="flex justify-between mb-4 items-start">
                <div class="font-medium">
                    <h2 class="text-xl">
                        Add complete data of the product
                    </h2>
                </div>

            </div>

            <div>


                <form action="#" method="post">
                    <div class="mb-6">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Name</label>
                        <select name="pid" id="pid"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                            <option value="">
                                --Select the Product--
                            </option>
                            <?php 
                                $sql = "SELECT * FROM `product`";
                                $result = mysqli_query($conn, $sql);
                                $sno=0;
                                while($row = mysqli_fetch_assoc($result)){
                                    echo "<option value='".$row['_id']."'>
                                            ".$row['_id']." - ".$row['name']." - ".$row['sizes']."
                                          </option>";
                                }
                                ?>
                        </select>
                    </div>
                    <div class="mb-6">
                        <label for="noe" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Number of Employees</label>
                        <input type="number" id="rate" name="noe" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="123.00" required />
                    </div>
                    <div class="mb-6">
                        <label for="nod" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Number of Days</label>
                        <input type="number" id="nod" name="nod" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="123.00" required />
                    </div>
                    <div class="mb-6">
                        <label for="salPerDay" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Salary Per Day</label>
                        <input type="number" id="salPerDay" name="salPerDay" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="123.00" required />
                    </div>
                    
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                </form>





            </div>
        </div>

    </div>
</div>

<?php include 'includes/_bottombar.php' ?>