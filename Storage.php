<?php
declare(strict_types=1);
include_once 'includes/settings.php';
/**
 * This file is part of the Prox Test .
 *
 * (c) SanHacks <
 */
/**
 * @return PDO
 */

/**
 * Establishes a connection to the database
 */
function getPdo(): PDO
{
    $host = 'localhost';//Your DB host here, e.g. localhost
    $db = 'proxserver';//Your DB name here, e.g. proxserver
    $user = 'gundo';//Your DB username
    $pass = '1234';//Your DB password
    $port = "8889";//"3306"
    $charset = 'utf8mb4';//Your DB charset, e.g. utf8mb4
    $options = [
        \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
        \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
        \PDO::ATTR_EMULATE_PREPARES => false,
    ];
    $dsn = "mysql:host=$host;dbname=$db;charset=$charset;port=$port";
    try {
        $pdo = new \PDO($dsn, $user, $pass, $options);
    } catch (\PDOException $e) {
        throw new \PDOException($e->getMessage(), (int)$e->getCode());
    }
    return $pdo;
}

/**
 * @param PDO $pdo
 * @param $idNo
 * @return mixed
 */
function checkForID(PDO $pdo, $idNo)
{
    $sql = "SELECT * FROM csv_import WHERE id_number = :id_number";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id_number' => $idNo]);
    return $stmt->fetch();
}

/**
 * @param PDO $pdo
 * @param $name
 * @param $surname
 * @param $idNo
 * @param $dob
 * @return bool
 */
function insertIntoDB(PDO $pdo, $name, $surname, $idNo, $dob): bool
{
    try {
        $sql = "INSERT INTO csv_import (name, surname, id_number, DOB) VALUES (:name, :surname, :id_number, :DOB)";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute(['name' => $name, 'surname' => $surname, 'id_number' => $idNo, 'DOB' => $dob]);
    } catch (\PDOException $e) {
        throw new \PDOException($e->getMessage(), (int)$e->getCode());
    }
}

/**
 * Check if a CSV file was uploaded
 * Get the temporary file location
 * fopen() Opens file or URL
 * fgetcsv() Gets line from file pointer and parse for CSV fields
 * Loop through the CSV rows
 * array_search() Searches the array for a given value and returns the corresponding key if successful
 * Check if the ID number already exists in the database
 */
/**
 * @param string $message
 * @return false|resource
 */
function dataLogger(string $message)
{
//Log error with $pdo->errorInfo() and values to proxCSV.log
    if (!file_exists('proxCSV.log')) {
        //Sets access and modification time of file
        touch('proxCSV.log');
    }
    $log = fopen('proxCSV.log', 'a');

    fwrite($log, $message);
    return $log;
}

if (isset($_POST['upload_csv'])) {

    if (!empty($_FILES['csvfile']['name'])) {

        $tmpFilePath = $_FILES['csvfile']['tmp_name'];

        if (($handle = fopen($tmpFilePath, "r")) !== false) {

            $headers = fgetcsv($handle);

            while (($row = fgetcsv($handle)) !== false) {
                $name = $row[array_search('Name', $headers)];
                $surname = $row[array_search('Surname', $headers)];
                $idNumber = $row[array_search('ID Number', $headers)];
                $dob = $row[array_search('Date of Birth', $headers)];

                $pdo = getPdo();
                $result = checkForID($pdo, $idNumber);
                if ($result) {
                    $message = "ID number already exists in the database";
                    dataLogger($message);
                } else {
                    $pdo = getPdo();
                    $result = insertIntoDB($pdo, $name, $surname, $idNumber, $dob);
                    if ($result) {
                        $message = "Row with values: " . $name . ", " . $surname . ", " . $idNumber . ", " . $dob . "
                        inserted successfully";
                    } else {
                        $message = "Failed to insert row with values: " . $name . ", " . $surname . ", " . $idNumber .
                            ", " . $dob . " with error: " . $pdo->errorInfo();
                    }
                    //Log error with $pdo->errorInfo() and values to proxCSV.log
                    $log = dataLogger($message);
                }

            }
             $csvRows = count(file($tmpFilePath));
            // Close the CSV file

            fclose($handle);
            header("Location: index.php?success=1&rows=$csvRows");
            exit();
        } else {
            header("Location: index.php?success=0&reason=failed_to_open_csv_file");
        }
    } else {
        header("Location: index.php?success=0&reason=no_csv_file_uploaded");
        exit();
    }
}