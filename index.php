<?php
session_start();
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Advent of Code 2025 Solutions in PHP</title>
    <meta name="author" content="Thomas Trollope">
    <meta charset="utf-8">
    <meta name="description" content="Index page for the solutions of ">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css"
</head>

<body>
<h1>Advent of Code 2025 Solutions</h1>

    <form method="post" action="includes/process_form.php" enctype="multipart/form-data">

        <label for="problem">Select which problem you want solved:</label>
        <select name="problem" id="problem">
            <?php
                foreach (new DirectoryIterator("includes/solutions") as $file) {
                    if ($file->isDot()) continue;
                    $fileName = $file->getBasename(".php");
                    $selectorName = str_replace("_", " ", $fileName);
                    $selectorName = ucwords($selectorName);
                    echo "<option value='" . $fileName . "'>" . $selectorName . "</option>";
                }
            ?>
        </select>

        <br>

        <label for="problem-part">Select which part you want solved:</label>
        <select name="problem-part" id="problem-part">
            <option value="1">Part 1</option>
            <option value="2">Part 2</option>
        </select>

        <br>
        <label for="input-file">Please select a file to input.</label>
        <input type="file" accept=".txt"  id="input-file" name="input-file">

        <!-- TODO: Check if the input file is present, show error if not -->

        <br>
        <input type="submit">
    </form>

    <?php if (isset($_SESSION['solution'])): ?>
    <p><?php echo $_SESSION['solution']?></p>
    <?php endif; ?>
</body>
</html>

