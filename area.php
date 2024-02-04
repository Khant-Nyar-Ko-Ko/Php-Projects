<?php

if (empty($_POST["home-width"]) || empty($_POST["home-breadth"])) {
    // die("need all input");
    header("Location: index.php");
}


?>
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
                href="./index.php">
                Area Calculator
            </a>
            <svg class="flex-shrink-0 mx-2 overflow-visible h-4 w-4 text-gray-400 dark:text-neutral-600"
                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="m9 18 6-6-6-6" />
            </svg>
        </li>
        <li class="inline-flex items-center">
            <a class="flex items-center text-sm font-semibold text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600 dark:focus:text-blue-500"
                href="./area.php">
                Calculate Result
            </a>
        </li>
    </ol>
    <hr class=" my-3 border-gray-300">
    <?php

    $width = $_POST["home-width"];
    $breadth = $_POST["home-breadth"];

    $area = $width * $breadth;

    $fileName = "saveRecord.txt";

    if (!file_exists($fileName)) {
        touch($fileName);
    }

    $fileStream = fopen($fileName, "a");
    fwrite($fileStream, "\n$width * $breadth = $area");
    fclose($fileStream);
    ?>

    <p class="text-3xl text-center mb-4">
        <?= $area ?> Sqft
    </p>
    <div class="flex gap-3">
        <a href="./index.php" type="button"
            class=" flex-grow py-3 px-4 justify-center inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
            Calculate Again
        </a>
        <a href="./record-list.php" type="button"
            class=" flex-grow py-3 px-4 justify-center inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-gray-200 text-gray-500 hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none dark:border-gray-700 dark:text-gray-400 dark:hover:text-blue-500 dark:hover:border-blue-600 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
            Check Record
        </a>
    </div>
</section>
<?php include("./template/footer.php") ?>