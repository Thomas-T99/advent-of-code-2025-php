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

<form method="post" action="includes/proceesss_form.php">

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

    <!-- TODO: Select the present input file or upload a file
    Check if the input file is present, show error if not
    -->

    <input type="submit">
</form>

    <!-- TODO: Out put of the problem should be returned here. -->

</body>
</html>

