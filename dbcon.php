<?php

$servername="sql5.freesqldatabase.com";
$username="sql5426001";
$password="BfXiJhKS9a";
$dbname="sql5426001";

$conn=mysqli_connect($servername, $username, $password, $dbname);

//creating database if doesn't exits.. 
if(!$conn){
    echo("<script>alert('creating data base');</script>");
    $pre_conn=mysqli_connect($servername, $username, $password);
    mysqli_query($pre_conn,"CREATE Database '$dbname';")or die("wtf");
    $conn=mysqli_connect($servername, $username, $password, $dbname);
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
}else{
    echo("<script>alert('creating data base v2');</script>");
    $req="select * from users limit 1;";
    $res=mysqli_query($conn,$req);
    echo("<script>alert('nice');</script>");
    if(mysqli_error($conn)){
        $conn=mysqli_connect($servername, $username, $password, $dbname);
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
}
?>