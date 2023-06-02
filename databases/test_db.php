<?php
function OpenConnection(){
        $serverName = "localhost,1433";
        $connectionOptions = array("Database"=>"TestDB",
            "Uid"=>"sa", "PWD"=>"password123",
            "TrustServerCertificate"=>true, "Encrypt"=>true
          );
        $conn = sqlsrv_connect($serverName, $connectionOptions);
        if($conn == false)
            // die(FormatErrors(sqlsrv_errors()));
            die( print_r( sqlsrv_errors(), true)); 
        // return $conn;
        return $conn;
}