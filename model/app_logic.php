<?php
define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__."/databases/test_db.php");

function getProducts(){
    try
    {
        $conn = OpenConnection();
        $tsql = "SELECT * FROM Inventory";
        $getProducts = sqlsrv_query($conn, $tsql);
        if ($getProducts == FALSE)
            die(FormatErrors(sqlsrv_errors()));
        $productCount = 0;
        while($row = sqlsrv_fetch_array($getProducts, SQLSRV_FETCH_ASSOC))
        {
            // echo($row['name']);
            // echo("<br/>");
            echo("
                <tr>
                    <td>{$row['id']}</td>
                    <td>{$row['name']}</td>
                    <td>{$row['quantity']}</td>
                    <td>edit 
                        <a href='/PHP-basics/?delete={$row['id']}'>
                            delete
                        </>
                    </td>
                </tr>
            ");
            $productCount++;
        }
        sqlsrv_free_stmt($getProducts);
        sqlsrv_close($conn);
    }
    catch(Exception $e)
    {
        echo("Error!");
    }
}

function addProduct(){
    $productName =  $_POST['productName'];
    $quantity =  $_POST['quantity'];
    $conn = OpenConnection();
    $tsql = "INSERT INTO Inventory (name, quantity) VALUES (?,?)";
    $params = array($productName, $quantity);

    // print_r($params);
    $insertReview = sqlsrv_prepare($conn, $tsql, $params);
    $insertResult = sqlsrv_execute($insertReview);

    if ( $insertResult == FALSE)
        // die(FormatErrors(sqlsrv_errors()));
        print_r(sqlsrv_errors());
    sqlsrv_free_stmt($insertReview );
}

function deleteAProduct(){
    $id = $_GET['delete'];
    $conn = OpenConnection();
    $tsql = "DELETE FROM Inventory WHERE id = $id";

    $deleteResult = sqlsrv_query($conn, $tsql);

    // echo $id;
    if ( $deleteResult== FALSE)
        // die(FormatErrors(sqlsrv_errors()));
        print_r(sqlsrv_errors());
}