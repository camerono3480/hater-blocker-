<?php
include ("connection.php");
//fetch table rows from mysql db
    $sql = "SHOW TABLES";
    $myadmin = "select * from information_schema.columns
    where table_schema = 'hater blocker'";
    $result = mysqli_query($servername, $sql) or die("Error in Selecting " . mysqli_error($servername));

     $wresult = mysqli_query($servername, $myadmin);
    //create an array
     $TABLES = array();
     $COLLUMNS = array();
    while($row =mysqli_fetch_assoc($result))
    {
        $TABLES[] = $row;
    }
    while ($Arow =mysqli_fetch_assoc($wresult)) {
       $COLLUMNS[] = $Arow;
    }
    //write to json file
    $fp = fopen('TABLES.json', 'c+');
    fwrite($fp, json_encode($TABLES));
    fclose($fp);

    $FTP = fopen('COLLUMNS.json', 'c+');
    fwrite($FTP, json_encode($COLLUMNS));
    fclose($FTP);

    //close the db servername
    mysqli_close($servername);
?>
