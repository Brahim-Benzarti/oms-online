<?php

$servername="sql5.freesqldatabase.com";
$username="sql5426001";
$password="BfXiJhKS9a";
$dbname="sql5426001";

$conn=mysqli_connect($servername, $username, $password, $dbname);

//creating database if doesn't exits.. 
if(!$conn){
    $pre_conn=mysqli_connect($servername, $username, $password);
    mysqli_query($pre_conn,"CREATE Database oms;")or die("wtf");
    $conn=mysqli_connect($servername, $username, $password, $dbname);
    if(!$conn){die("shit")};
    if(mysqli_multi_query($conn,file_get_contents("../oms.sql"))){
        do {
            // Store first result set
            if ($result = mysqli_store_result($conn)) {
                $result -> free_result();
            };
            // if there are more result-sets, the print a divider
            if (mysqli_more_results($conn)) {
                continue;
            };
             //Prepare next result set
          } while (mysqli_next_result($conn));
    }
}
?>