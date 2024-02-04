<?php include("./template/header.php") ?>
<?php include("./template/sidebar.php") ?>

<section class=" bg-gray-100 p-10 rounded-lg ">
    <?php
    $content = file_get_contents("http://forex.cbm.gov.mm/api/latest");
    $obj = json_decode(($content));
    ?>

    <ol class="flex items-center whitespace-nowrap" aria-label="Breadcrumb">
        <li class="inline-flex items-center">
            <a class="flex items-center text-sm text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600 dark:focus:text-blue-500"
                href="#">
                Home
            </a>
            <svg class="flex-shrink-0 mx-2 overflow-visible h-4 w-4 text-gray-400 dark:text-neutral-600"
                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="m9 18 6-6-6-6" />
            </svg>
        </li>
        <li class="inline-flex items-center">
            <a class="flex items-center text-sm font-semibold text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600 dark:focus:text-blue-500"
                href="#">
                Exchange Calculator
            </a>
        </li>
    </ol>
    <hr class=" my-3 border-gray-300">
    <!-- form -->
    <form action="./calculate.php" method="POST">

        <div class=" mb-4 flex gap-5">

            <div class="w-full">

                <select id="from_currency" name="from_currency"
                    class="py-3 px-4 pe-9 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600">
                    <option selected>From Currency</option>
                    <?php
                    foreach ($obj->rates as $key => $value): ?>
                        <option value="<?= $key ?> - <?= $value ?>">
                            <?= $key ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class=" w-full">

                <select id="to_currency" name="to_currency"
                    class="py-3 px-4 pe-9 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600">
                    <option selected>To Currency</option>

                    <?php
                    foreach ($obj->rates as $key => $value): ?>
                        <option value="<?= $key ?> - <?= $value ?>">
                            <?= $key ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class=" mb-4 ">
            <label for="amount" class="block text-sm font-medium mb-2 dark:text-white">Exchange
                Amount</label>
            <input type="number" id="amount" name="amount"
                class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600">
        </div>
        <button type="submit"
            class="py-3 px-4 w-full inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
            Convert
        </button>
    </form>
</section>
<?php include("./template/footer.php") ?>