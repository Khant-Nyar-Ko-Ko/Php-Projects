<?php include("./template/header.php") ?>
<?php include("./template/sidebar.php") ?>

<section class=" bg-gray-100 p-10 rounded-lg ">
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
                href="./exchange.php">
                Exchange Calculator
            </a>
            <svg class="flex-shrink-0 mx-2 overflow-visible h-4 w-4 text-gray-400 dark:text-neutral-600"
                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="m9 18 6-6-6-6" />
            </svg>
        </li>
        <li class="inline-flex items-center">
            <a class="flex items-center text-sm font-semibold text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600 dark:focus:text-blue-500"
                href="./exchange-record.php">
                Exchanged Record
            </a>
        </li>
    </ol>
    <hr class=" my-3 border-gray-300">
    <?php
    $fileName = "exchangeRecord.txt";

    if (!file_exists($fileName)) {
        touch($fileName);
    }

    $fileStream = fopen($fileName, "r");

    while (!feof($fileStream)):
        $content = fgets($fileStream);
        if ($content == "\n")
            continue;
        ?>

        <p class=" font-mono text-gray-700 bg-white p-4 rounded-lg mb-2">
            <?=
                $content;
            ?>
        </p>
    <?php endwhile; ?>
    <div class="flex gap-3">
        <a href="./exchange.php" type="button"
            class=" flex-grow py-3 px-4 justify-center inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
            Convert More
        </a>

    </div>
</section>
<?php include("./template/footer.php") ?>