<?php
Declare(strict_types=1);
/*Test 2
This task is to test your skills in manipulating arrays and file handling.
In this test you will be making a CSV file of variable length, a form will ask for the amount of data to generate.
Check the requirements on how to generate the file. The file will have the following header fields
Id, Name, Surname, Initials, Age, DateOfBirth
The data will look like this
"1","Andre","van Zuydam", "A", "33","13/02/1979"
"2","Tyron James", "Hall", "TJ", "32", "03/06/1980";
After this you will import the file into a database and output a count of all the records imported.
REQUIREMENTS:
1) Create two arrays, one for names and one for surnames. There should be 20 Names and 20 Surnames in each array.
Use these arrays to generate random names, ages & birthdates to populate a CSV file. The initials are the first character of the name always. Write a function to perform the task of creating the CSV file, you should pass it the number of variations you need.
2) The CSV file should be outputted to an output folder, the name of the file must be output.csv.
3) An input field will take the amount of records to be generated.
4) There should be NO DUPLICATE ROWS IN THE CSV. I.e. The name, surname, age, date of birth must be unique.
5) Output a CSV file of 1 000 000 records.
 Copyright © 2019 DEVPROX (Pty) Ltd. All Rights Reserved.
2
 Unit 9, Block B, Canal Edge 2, Tyger Waterfront, Stellenbosch Satellite Campus, Carl Cronje Drive, Bellville 7530 +27
83 631 1059 | info@devprox.com
6) Import the file using a form variable of file type. One should browse for the file and upload it to the website.
7) Create a table called “csv_import” with the relevant fields and types to hold the data of the CSV file. Use code to
create the table.
PASS:
• The file is outputted to the correct folder with the correct name, with the correct number of records.  
• IE: A 100 record file will have 101 lines to include the headers.  
• The code will have the correct arrays of Names and Surnames.  
• The file is generated according to the specification of no duplicate rows.  
• All the instructions are completed 1 - 7.  
FAIL:  
• The data imported to the database is not correct (check dates)  
• There are duplicate rows in the CSV file  
• The test file to generate 1000 000 fails for whatever reason.  
• The import of this large file fails for whatever reason.  */
//
//       <!--Create two arrays, one for names and one for surnames. There should be 20 Names and 20 Surnames
//                in each array. Use these arrays to generate random names, ages & birthdates to populate a CSV file.
//                 The initials are the first character of the name always. Write a function
//                to perform the task of creating the CSV file, you should pass it the number of variations you need. -->
//       <!--The CSV file should be outputted to an output folder, the name of the file must be output.csv. -->
?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>ProxServer</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-grid.css">
    <link rel="stylesheet" href="css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="css/bootstrap-reboot.css">
    <link rel="stylesheet" href="css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="css/style.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <meta name="description" content="ProxServer , Save: Name, Surname, Id No, Date of Birth,
     POST button, CANCEL button">
    <meta name="keywords" content="ProxServer, Name, Surname, Id No, Date of Birth, POST button, CANCEL button, WhatsappMan">
    <meta name="author" content="Gundo San Sifhufhi">
    <!-- BOTS -->
    <meta name="robots" content="index, follow">
    <meta name="revisit-after" content="7 days">
    <meta name="distribution" content="global">
    <meta name="rating" content="general">

    <!-- Mobile Specific Metas -->
    <meta name="language" content="English">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Browser Specific Metas -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="content-type" content="text/html; charset=utf-8">

</head>

<body>
<?php include_once "includes/navbar.php"; ?>

<!-- jumbotron -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="jumbotron">
                <h1 class="display-4">Welcome to Test 2</h1>
                <p class="lead">PHP Proficiency Test</p>
                <hr class="my-4">
                <p>"Talk Is Cheap, Show Me The Code..."</p>
                <a class="btn btn-primary btn-lg" href="http://gundo.ml" target="_blank" role="button">Learn more</a>
            </div>
        </div>
    </div>
</div>
<?php if (isset($_GET['success'])): ?>
    <?php if ($_GET['success'] == '1'): ?>
    <div class="alert alert-success">
        <li>File Uploaded Successfully</li>
    </div>
    <?php endif; ?>

<div class="alert alert-success">
    <?php echo $_GET['success']; ?>
    <?php unset($_GET['success']); ?>
    <?php endif; ?>

    <?php if (isset($_GET['error'])): ?>
    <div class="alert alert-danger">
        <?php echo $_GET['error']; ?>
        <?php unset($_GET['error']); ?>
        <?php endif; ?>
        <?php if (isset($errors)): ?>
        <div class="alert alert-danger">
            <?php foreach ($errors as $error): ?>
             <li><?php echo $error; ?></li>
            <?php endforeach; ?>
            <?php endif; ?>
            </div>
        </div>
    </div>

<div class="container">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">

                    <h5 class="text-center">Upload CSV</h5>
                </div>

            </div>
            <div class="card-body">
            <form action="Storage.php" method="post" enctype="multipart/form-data" class="form form-group form-control form-control-lg">
                <div class="form-group">
                    <label for="name">The Number of Names to Generate</label>
                    <div>
                        <label for="csvfile" class="form-label">Upload CSV</label>
                        <input class="form-control form-control-lg" id="csvfile" type="file" name="csvfile" accept=".csv">
                    </div>
                </div>

                <div class="form-group mt-3">
                    <button type="submit" name="upload_csv" id="upload_csv" class="btn btn-primary
                            btn-block">Upload CSV</button>
                    <button type="reset" class="btn btn-danger btn-block">Clear</button>
                </div>

            </form>
           </div>
        </br>
        </br>

            <div class="card">
                <div class="card-header">

                    <h3 class="text-center">Names Generation</h3>
                </div>

                    </div>
                <div class="card-body">

                        <!--- Name, Surname, Id No, Date of Birth, POST button, CANCEL button -->
                        <form action="index.php" method="post" class="form form-group form-control form-control-lg">
                            <div class="form-group">
                                <label for="name">The Number of Names to Generate</label>
                                <input type="number" name="count" id="count" class="form-control"
                                       placeholder="Number of Names to Generate"
                                    <?php if (isset($_POST['count'])): ?>
                                        value="<?php echo $_POST['count']; ?>"
                                    <?php endif; ?>
                                >
                            </div>

                            <div class="form-group mt-3">
                                <button type="submit" name="submit" id="submit" class="btn btn-primary
                            btn-block">Generate CSV</button>
                                <button type="reset" class="btn btn-danger btn-block">Cancel</button>
                            </div>

                        </form>

                    <?php

                    if (isset($_POST['submit'])) {
                        $count = $_POST['count'];
                        $names = generateNames($count);
                    }
                    function generateNames($count)
                    {
                        $names = [
                            "Gundo",
                            "DevProx",
                            "Ava",
                            "Seth",
                            "Borat",
                            "Bill",
                            "Saint",
                            "Amelia",
                            "Ron",
                            "Evelyn",
                            "Jian",
                            "Emily",
                            "Gabe",
                            "Adrian",
                            "Helena",
                            "Gilfoyle",
                            "Sofia",
                            "Nelson",
                            "Aria",
                            "Millie",
                        ];

                        $surnames = [
                            "Sifhufhi",
                            "SanHacks",
                            "San",
                            "Hall",
                            "Sagdiev",
                            "Rogen",
                            "Burr",
                            "Bean",
                            "Carlin",
                            "Swanson",
                            "Anderson",
                            "Betram",
                            "Jackson",
                            "Bighetti",
                            "Yang",
                            "Martin",
                            "Mulalo",
                            "Garcia",
                            "Martinez",
                            "Mashudu",
                        ];


                        $outputPath = "CsvOutput/output.csv";
                        //Opens file or URL
                        $file = fopen($outputPath, "w");
                        $header = ["Name", "Surname", "ID Number", "Date of Birth"];
                        //Format line as CSV and write to file pointer
                        fputcsv($file, $header);
                        for ($i = 0; $i < $count; $i++) {
                            //Generate random names by Generating a random integer : Formula rand(min, max) where min
                            // is the minimum value and max is the maximum value
                            //output is a random integer between min and max (both included) Pointing to the index of
                            // the array
                            $name = $names[rand(0, count($names) - 1)];
                            // rand(0, count($names) - 1) is the index of the array
                            $surname = $surnames[rand(0, count($surnames) - 1)];
                            // rand(0, count($surnames) - 1) is the index of the array
                            $idNumber = rand(1000000000000, 9999999999999);
                            // rand(1000000000000, 9999999999999) is the id number 13 digits long
                            $dateOfBirth = rand(1950, 2018) . "-" . rand(1, 12) . "-" . rand(1, 28);
                            // rand(1950, 2018) is the year, rand(1,
                            // 12) is the month, rand(1, 28) is the day
                            $row = [$name, $surname, $idNumber, $dateOfBirth];
                            echo "
                        <table class='table table-striped'>
                            <thead>
                                <tr>
                                    <th scope='col'>Name</th>
                                    <th scope='col'>Surname</th>
                                    <th scope='col'>ID Number</th>
                                    <th scope='col'>Date of Birth</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>$name</td>
                                    <td>$surname</td>
                                    <td>$idNumber</td>
                                    <td>$dateOfBirth</td>
                                </tr>
                            </tbody>
                        ";

                            fputcsv($file, $row);
                        }
                        fclose($file);
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="col-md-4"></div>
    </div>
</div>

<!-- end sign up form -->

<!-- footer -->
<?php include_once 'includes/footer.php'; ?>
<!-- end footer -->

</body>
</html>