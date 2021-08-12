<?php

$servername="sql200.epizy.com";
$username="epiz_29168269";
$password="d95ETj3hIN";
$dbname="epiz_29168269_test";

$conn=mysqli_connect($servername, $username, $password, $dbname);

//creating database if doesn't exits.. 
if(!$conn){
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
    $req="SELECT * FROM users LIMIT 1;";
    $res=mysqli_query($conn,$req);
    if(!$res){
        echo("<script>alert('Creating!!');</script>");
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
        echo("<script>alert('Done!!');</script>");
    }
}
?>