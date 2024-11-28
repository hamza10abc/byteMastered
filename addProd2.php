<?php
include 'includes/_topbar.php';
// $sqlProdFind = "SELECT * from product";
$sqlProdFind = "SELECT * FROM product ORDER BY _id DESC LIMIT 1";
$runSqlProdFind = mysqli_query($conn, $sqlProdFind);
while ($row = mysqli_fetch_assoc($runSqlProdFind)) {
    $type = $row['type'];
    $prodId = $row['_id'];
    $prodName = $row['name'];
}
// echo $type; 
// echo $prodId;
//this is kind of a neusence it is not showing correct data might need to check
if ($type === 'As') {
    $actionLink = "addProdArk.php?updateType=new&id=" . $prodId . "";
} else if ($type === "T") {
    $actionLink = "addProdTab.php?updateType=new&id=" . $prodId . "";
} else if ($type === "Ds") {
    $actionLink = "addProdDawa.php?updateType=new&id=" . $prodId . "";
} else if ($type === "S") {
    $actionLink = "addProdSyrup.php?updateType=new&id=" . $prodId . "";
} else if ($type === "P") {
    $actionLink = "addProdPowder.php?updateType=new&id=" . $prodId . "";
} else {
    $actionLink = "404NotFound.php";
}

$insert = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $rawMatIds = json_decode($_POST['rawMat']);
    $prodId = $_POST['productId'];

    $stmt = $conn->prepare("INSERT INTO product_details (raw_id, pid) VALUES (?, ?)");
    $stmt->bind_param("si", $element, $prodId);

    foreach ($rawMatIds as $element) {
        $stmt->execute();
    }
    $stmt->close();
    $insert = true;
}

?>


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
                    <span class='font-medium'>Success alert!</span> You will be redirected.
                </div>
            </div>
                ";
        echo "<meta http-equiv='refresh' content='3;url=" . $actionLink . "' />";
    }
    ?>


    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
        <div class="bg-white border border-gray-100 shadow-md shadow-black/5 p-6 rounded-md lg:col-span-3">


            <div class="my-4">

                <ol class="flex items-center w-full p-3 space-x-2 text-sm font-medium text-center text-gray-500 bg-white border border-gray-200 rounded-lg shadow-sm dark:text-gray-400 sm:text-base dark:bg-gray-800 dark:border-gray-700 sm:p-4 sm:space-x-4 rtl:space-x-reverse">
                    <li class="flex items-center">
                        <span class="flex items-center justify-center w-5 h-5 me-2 text-xs border border-gray-500 rounded-full shrink-0 dark:border-gray-400">
                            1
                        </span>
                        Basic <span class="hidden sm:inline-flex sm:ms-2">Info</span>
                        <svg class="w-3 h-3 ms-2 sm:ms-4 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 12 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m7 9 4-4-4-4M1 9l4-4-4-4" />
                        </svg>
                    </li>
                    <li class="flex items-center text-blue-600 dark:text-blue-500">
                        <span class="flex items-center justify-center w-5 h-5 me-2 text-xs border border-blue-600 rounded-full shrink-0 dark:border-blue-500">
                            2
                        </span>
                        Raw <span class="hidden sm:inline-flex sm:ms-2">Material</span>
                        <svg class="w-3 h-3 ms-2 sm:ms-4 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 12 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m7 9 4-4-4-4M1 9l4-4-4-4" />
                        </svg>
                    </li>
                    <li class="flex items-center">
                        <span class="flex items-center justify-center w-5 h-5 me-2 text-xs border border-gray-500 rounded-full shrink-0 dark:border-gray-400">
                            3
                        </span>
                        Product <span class="hidden sm:inline-flex sm:ms-2">Details</span>
                        <svg class="w-3 h-3 ms-2 sm:ms-4 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 12 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m7 9 4-4-4-4M1 9l4-4-4-4" />
                        </svg>
                    </li>
                    <li class="flex items-center">
                        <span class="flex items-center justify-center w-5 h-5 me-2 text-xs border border-gray-500 rounded-full shrink-0 dark:border-gray-400">
                            4
                        </span>
                        Labour <span class="hidden sm:inline-flex sm:ms-2">in Packing</span>
                        <svg class="w-3 h-3 ms-2 sm:ms-4 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 12 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m7 9 4-4-4-4M1 9l4-4-4-4" />
                        </svg>
                    </li>
                    <li class="flex items-center">
                        <span class="flex items-center justify-center w-5 h-5 me-2 text-xs border border-gray-500 rounded-full shrink-0 dark:border-gray-400">
                            5
                        </span>
                        Packaging <span class="hidden sm:inline-flex sm:ms-2">Material</span>
                        <svg class="w-3 h-3 ms-2 sm:ms-4 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 12 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m7 9 4-4-4-4M1 9l4-4-4-4" />
                        </svg>
                    </li>
                    <li class="flex items-center">
                        <span class="flex items-center justify-center w-5 h-5 me-2 text-xs border border-gray-500 rounded-full shrink-0 dark:border-gray-400">
                            6
                        </span>
                        Review
                    </li>
                </ol>


            </div>



            <div class="flex justify-between mb-4 items-start">
                <div class="font-medium">
                    <h2 class="text-xl">
                        Add Raw Material for <mark><i><?= $prodName ?></i></mark>
                    </h2>
                </div>

            </div>


            <!-- Search Box for Name Column -->
            <div class="flex items-center mb-4">
                <label for="nameSearch" class="mr-2 font-medium">Search by Name:</label>
                <input type="text" id="nameSearch" placeholder="Search for a name..." class="border border-gray-300 p-2 rounded">
            </div>

            <!-- Tabulator Table Placeholder -->
            <div id="rawMaterialTable"></div>

            <div>
                <form id="rawMatForm" action="addProd2.php?updateType=new" method="post">
                    <!-- Hidden input to store raw material IDs -->
                    <input type="hidden" id="rawMatInput" name="rawMat">
                    <input type="hidden" name="addComplete" value="addComplete">
                    <input type="hidden" name="productId" value="<?= $prodId ?>">
                    <div style="display: flex; justify-content: space-between; margin: 10px;">

                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Next</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>

<?php include 'includes/_bottombar.php'; ?>

<!-- Include Tabulator CSS and JS -->
<link href="https://unpkg.com/tabulator-tables@5.4.4/dist/css/tabulator.min.css" rel="stylesheet">
<script src="https://unpkg.com/tabulator-tables@5.4.4/dist/js/tabulator.min.js"></script>

<script>
    // Initialize Tabulator with Selectable Rows and Ajax Data Fetch
    const table = new Tabulator("#rawMaterialTable", {
        ajaxURL: "fetchRawMaterials.php", // URL to fetch raw materials data dynamically
        layout: "fitColumns",
        selectable: true,
        columns: [{
                title: "S.No.",
                field: "sno",
                width: 100
            },
            {
                title: "Name",
                field: "name"
            },
            {
                title: "Old Rate",
                field: "old_rate"
            },
            {
                title: "Current Rate",
                field: "final_rate"
            },
            {
                title: "Choose",
                formatter: "rowSelection",
                titleFormatter: "rowSelection",
                hozAlign: "center",
                headerSort: false
            }
        ]
    });

    // Add Filter Functionality for Name Search Input
    document.getElementById("nameSearch").addEventListener("input", function() {
        const searchTerm = this.value;
        if (searchTerm) {
            table.setFilter("name", "like", searchTerm); // Apply filter to "Name" column
        } else {
            table.clearFilter(); // Clear filter if search box is empty
        }
    });

    // Handle Form Submission and Selected Rows
    document.getElementById("rawMatForm").addEventListener("submit", function(e) {
        e.preventDefault(); // Prevent form default submission
        const selectedData = table.getSelectedData(); // Get selected rows
        const selectedIds = selectedData.map(row => row._id); // Extract _id from each row

        document.getElementById("rawMatInput").value = JSON.stringify(selectedIds); // Add IDs to hidden input

        this.submit(); // Submit form after setting hidden input
    });
</script>
<script>
    // JavaScript to handle form submission
    document.getElementById("rawMatForm").addEventListener("submit", function(e) {
        e.preventDefault(); // Prevent form submission to handle it in JavaScript first

        // Get selected checkboxes
        const selectedCheckboxes = document.querySelectorAll(".rawMatCheckbox:checked");
        const selectedIds = Array.from(selectedCheckboxes).map(cb => cb.value); // Get values of selected checkboxes

        // If no checkboxes are selected, alert the user
        if (selectedIds.length === -1) {
            // alert("Please select at least one raw material.");
            // return; // Do not submit the form if no materials are selected
        }
        else{
            return;
        }

        // Populate the hidden input field with the selected raw material IDs
        document.getElementById("rawMatInput").value = JSON.stringify(selectedIds);

        // Submit the form after setting the hidden input value
        this.submit();
    });
</script>