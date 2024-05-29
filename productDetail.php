<?php include 'includes/_topbar.php' ?>


<!-- Content -->
<div class="p-6">
    TO BE DONE
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
        <div class="bg-white border border-gray-100 shadow-md shadow-black/5 p-6 rounded-md lg:col-span-3">
            <div class="flex justify-between mb-4 items-start">
                <div class="font-medium">
                    <h2 class="text-xl">
                        Product Details
                    </h2>
                </div>

            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-4">
                <div class="p-4">
                    <button class="bg-blue-300 hover:bg-blue-400 text-blue-800 font-bold py-2 px-4 rounded inline-flex items-center">
                        <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z" />
                        </svg>
                        <span>Download</span>
                    </button>
                    
                </div>
                <div class="border-gray-200 p-4 col-start-4">
                    <button class="bg-green-300 hover:bg-green-400 text-green-800 font-bold py-2 px-4 rounded inline-flex items-center">
                        <i class='bx bx-plus-medical'></i>
                        <span class="mx-1">Add Item</span>
                    </button>
                    
                </div>
            </div>
            <div>



                <div style="overflow:auto">
                    <table class="items-center w-full bg-transparent border-collapse">
                        <thead>
                            <tr>
                                <th class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">S.No.</th>
                                <th class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">Name</th>
                                <th class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px">Unit Size</th>
                                <th class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px">Raw Material</th>
                                <th class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px">Quantity</th>
                                <th class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px">Rate</th>
                                <th class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px">Amount</th>
                                
                                <th class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px">Manage</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="text-gray-700 dark:text-gray-100">
                                <td class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">1</td>
                                <th class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">Administrator</th>
                                <td class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                    340.00
                                </td>
                                <td class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                    500.00
                                </td>
                                <td class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                    500.00
                                </td>
                                <td class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                    500.00
                                </td>
                                <td class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                    500.00
                                </td>
                                
                                <td class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                    <button class="bg-blue-300 hover:bg-blue-400 text-blue-800 font-bold py-2 px-4 rounded inline-flex items-center">
                                        <i class="bx bxs-edit-alt"></i>
                                        <span class="ml-1">Edit</span>
                                    </button>
                                    <button class="bg-red-300 hover:bg-red-400 text-red-800 font-bold py-2 px-4 rounded inline-flex items-center">
                                        <i class="bx bx-checkbox-minus"></i>
                                        <span class="ml-1">Delete</span>
                                    </button>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>

            </div>
        </div>

    </div>
</div>
<!-- End Content -->


<?php include 'includes/_bottombar.php' ?>