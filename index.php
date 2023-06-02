<?php
require_once("./databases/test_db.php");
// $serverName = "localhost,1433";
// $connectionInfo = array( 
//      "Database"=>"TestDB", "UID"=>"sa", 
//      "PWD"=>"password123", 
//      "TrustServerCertificate"=>true, "Encrypt"=>true
// );
// $conn = sqlsrv_connect( $serverName, $connectionInfo);

// if( $conn ) {
//      echo "Successfuly connected.<br />";
// }else{
//      echo "Connection error.<br />";
//      die( print_r( sqlsrv_errors(), true));
// }


// pdo sql

// $server   = 'localhost';
// $database = 'TestDB';
// $username = '';
// $password = 'password123';

// # Connect
// try {
//     $conn = new PDO("sqlsrv:server=$server;Database=$database; TrustServerCertificate = true", $username, $password);
//     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// } catch(PDOException $e) {
//     die("Error connecting to SQL Server: ".$e->getMessage());
// }

// test connection

// 
// phpinfo();

function ReadData(){
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
                echo($row['name']);
                echo("<br/>");
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
    
ReadData();

// $serverName = "localhost";  
  
// /* Connect using Windows Authentication. */  
// try  
// {  
// $conn = new PDO( "sqlsrv:server=$serverName ; Database=TestDB", "", "password123");  
// $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );  
// }  
// catch(Exception $e)  
// {   
// die( print_r( $e->getMessage() ) );   
// } 
?>
