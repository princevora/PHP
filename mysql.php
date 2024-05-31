<?php

$host = "localhost";
$password = "";
$username = "root";
$dbname = "crmdb";

// we will use pdo to increase security of your app.

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

    // check if the table exists.
    //$sql="CREATE TABLE Students(id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,firstname VARCHAR(30) NOT NULL,lastname VARCHAR(30) NOT NULL,email VARCHAR(50)";
    // $sql="INSERT INTO Students(id,firstname,lastname,email)VALUES(1,'John','Doe','dh@dd.com')";



} catch (\PDOException $th) {
    echo $th->getMessage();
}

/**
 * @param PDO $pdo
 */
function tableExists(PDO $pdo): bool
{
    if (!$pdo instanceof PDO) {
        return false;
    }

    $query = "SELECT 1 FROM Students LIMIT 1";
    try {
        $result = $pdo->query($query);
    } catch (\PDOException $th) {
        return false;
    }

    // return false bydefault
    return false;

}
