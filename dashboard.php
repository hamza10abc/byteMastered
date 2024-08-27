<?php include 'includes/_topbar.php' ?>
<script>var exportFilename = 'Costing Sheet';</script>
<?php
$sql = "SELECT count(*) from `raw_material`";
$result = mysqli_query($conn, $sql);
?>


<!-- Content -->
<div class="p-6">
  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
    <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
      <div class="flex justify-between mb-6">
        <div>
          <div class="flex items-center mb-1">
            <div class="text-2xl font-semibold">
              <?php
              $sql = "SELECT count(*) from `raw_material`";
              $result = mysqli_query($conn, $sql);
              $row = mysqli_fetch_array($result);
              $total = $row[0];
              if ($result) {
                echo $total;
              } else {
                echo "Error";
              }
              ?>
            </div>
          </div>
          <div class="text-sm font-medium text-gray-400">Raw Materials</div>
        </div>

      </div>

      <a href="rawMaterial.php" class="text-[#f84525] font-medium text-sm hover:text-red-800">View</a>
    </div>
    <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
      <div class="flex justify-between mb-4">
        <div>
          <div class="flex items-center mb-1">
            <div class="text-2xl font-semibold">
              <?php
              $sql = "SELECT count(*) from `product`";
              $result = mysqli_query($conn, $sql);
              $row = mysqli_fetch_array($result);
              $total = $row[0];
              if ($result) {
                echo $total;
              } else {
                echo "Error";
              }
              ?>
            </div>

          </div>
          <div class="text-sm font-medium text-gray-400">Products</div>
        </div>

      </div>
      <a href="product.php" class="text-[#f84525] font-medium text-sm hover:text-red-800">View</a>
    </div>
    <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
      <div class="flex justify-between mb-6">
        <div>
          <div class="text-2xl font-semibold mb-1">
            <?php
            $sql = "SELECT count(*) from `employee`";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result);
            $total = $row[0];
            if ($result) {
              echo $total;
            } else {
              echo "Error";
            }
            ?>
          </div>
          <div class="text-sm font-medium text-gray-400">Employee</div>
        </div>

      </div>
      <a href="employee.php" class="text-[#f84525] font-medium text-sm hover:text-red-800">View</a>
    </div>
  </div>

  <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
    <div class="bg-white border border-gray-100 shadow-md shadow-black/5 p-6 rounded-md lg:col-span-3">
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-4">
        <div class="flex justify-between mb-4 items-start">
          <div class="font-medium">Costing Sheet</div>
        </div>
        <div class="p-4 col-start-4">
          <a href="#">
            <button type="submit" onclick="doit('xlsx');" class="bg-blue-300 hover:bg-blue-400 text-blue-800 font-bold py-2 px-4 rounded inline-flex items-center">
              <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z" />
              </svg>
              <span>Download</span>
            </button>
          </a>
        </div>
      </div>
      <!-- <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mb-4">
        <div class="rounded-md border border-dashed border-gray-200 p-4">
          <button class="bg-blue-300 hover:bg-blue-400 text-blue-800 font-bold py-2 px-4 rounded inline-flex items-center">
            <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
              <path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z" />
            </svg>
            <span>Download</span>
          </button>
          <span class="text-gray-400 text-sm ml-2">Last year data</span>
        </div>
        <div class="rounded-md border border-dashed border-gray-200 p-4">
          <button class="bg-green-300 hover:bg-green-400 text-green-800 font-bold py-2 px-4 rounded inline-flex items-center">
            <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
              <path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z" />
            </svg>
            <span>Download</span>
          </button>
          <span class="text-gray-400 text-sm ml-2">This year data</span>
        </div>
        <div class="rounded-md border border-dashed border-gray-200 p-4">
          <button class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">
            <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
              <path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z" />
            </svg>
            <span>Download</span>
          </button>
          <span class="text-gray-400 text-sm ml-2">Custom download</span>
        </div>
      </div> -->
      <div>
        <?php include 'costingSheet.php' ?>
        <!-- <table class="items-center w-full bg-transparent border-collapse">
              <thead>
                <tr>
                  <th class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">Role</th>
                  <th class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">Amount</th>
                  <th class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px"></th>
                </tr>
              </thead>
              <tbody>
                <tr class="text-gray-700 dark:text-gray-100">
                  <th class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">Administrator</th>
                  <td class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">1</td>
                  <td class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                    <div class="flex items-center">
                      <span class="mr-2">70%</span>
                      <div class="relative w-full">
                        <div class="overflow-hidden h-2 text-xs flex rounded bg-blue-200">
                          <div style="width: 70%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-600"></div>
                        </div>
                      </div>
                    </div>
                  </td>
                </tr>
                <tr class="text-gray-700 dark:text-gray-100">
                  <th class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">User</th>
                  <td class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">6</td>
                  <td class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                    <div class="flex items-center">
                      <span class="mr-2">40%</span>
                      <div class="relative w-full">
                        <div class="overflow-hidden h-2 text-xs flex rounded bg-blue-200">
                          <div style="width: 40%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-500"></div>
                        </div>
                      </div>
                    </div>
                  </td>
                </tr>
                <tr class="text-gray-700 dark:text-gray-100">
                  <th class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">User</th>
                  <td class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">5</td>
                  <td class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                    <div class="flex items-center">
                      <span class="mr-2">45%</span>
                      <div class="relative w-full">
                        <div class="overflow-hidden h-2 text-xs flex rounded bg-pink-200">
                          <div style="width: 45%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-pink-500"></div>
                        </div>
                      </div>
                    </div>
                  </td>
                </tr>
                <tr class="text-gray-700 dark:text-gray-100">
                  <th class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">User</th>
                  <td class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">4</td>
                  <td class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                    <div class="flex items-center">
                      <span class="mr-2">60%</span>
                      <div class="relative w-full">
                        <div class="overflow-hidden h-2 text-xs flex rounded bg-red-200">
                          <div style="width: 60%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-red-500"></div>
                        </div>
                      </div>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table> -->

      </div>
    </div>

  </div>
  <!-- <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
    <div class="p-6 relative flex flex-col min-w-0 mb-4 lg:mb-0 break-words bg-gray-50 dark:bg-gray-800 w-full shadow-lg rounded">
      <div class="rounded-t mb-0 px-0 border-0">
        <div class="flex flex-wrap items-center px-4 py-2">
          <div class="relative w-full max-w-full flex-grow flex-1">
            <h3 class="font-semibold text-base text-gray-900 dark:text-gray-50">Users</h3>
          </div>
        </div>
        <div class="block w-full overflow-x-auto">
          <table class="items-center w-full bg-transparent border-collapse">
            <thead>
              <tr>
                <th class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">Role</th>
                <th class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">Number</th>
                <th class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px"></th>
              </tr>
            </thead>
            <tbody>
              <tr class="text-gray-700 dark:text-gray-100">
                <th class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">Administrator</th>
                <td class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">1</td>

              </tr>
              <tr class="text-gray-700 dark:text-gray-100">
                <th class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">User</th>
                <td class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">6</td>

              </tr>
              <tr class="text-gray-700 dark:text-gray-100">
                <th class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">User</th>
                <td class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">5</td>

              </tr>
              <tr class="text-gray-700 dark:text-gray-100">
                <th class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">User</th>
                <td class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">4</td>

              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="bg-white border border-gray-100 shadow-md shadow-black/5 p-6 rounded-md">
      <div class="flex justify-between mb-4 items-start">
        <div class="font-medium">Activities</div>

      </div>
      <div class="overflow-hidden">
        <table class="w-full min-w-[540px]">
          <tbody>
            <tr>
              <td class="py-2 px-4 border-b border-b-gray-50">
                <div class="flex items-center">
                  <a href="#" class="text-gray-600 text-sm font-medium hover:text-blue-500 ml-2 truncate">Insert</a>
                </div>
              </td>
              <td class="py-2 px-4 border-b border-b-gray-50">
                <span class="text-[13px] font-medium text-gray-400">02-02-2024</span>
              </td>
              <td class="py-2 px-4 border-b border-b-gray-50">
                <span class="text-[13px] font-medium text-gray-400">17.45</span>
              </td>

            </tr>
            <tr>
              <td class="py-2 px-4 border-b border-b-gray-50">
                <div class="flex items-center">
                  <a href="#" class="text-gray-600 text-sm font-medium hover:text-blue-500 ml-2 truncate">Delete</a>
                </div>
              </td>
              <td class="py-2 px-4 border-b border-b-gray-50">
                <span class="text-[13px] font-medium text-gray-400">02-02-2024</span>
              </td>
              <td class="py-2 px-4 border-b border-b-gray-50">
                <span class="text-[13px] font-medium text-gray-400">17.45</span>
              </td>

            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div> -->
</div>
<!-- End Content -->


<?php include 'includes/_bottombar.php' ?>