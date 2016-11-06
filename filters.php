<?PHP


   include_once("connection.php");

   function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}


$ip = get_client_ip();




	echo "Submited! \n";
         if (isset($_POST['text'])) {
          $name = $_POST['text'];
        }

        $alt = "ALTER TABLE `$ip` ADD `$name` text";

$sql = "CREATE TABLE `$ip`
(`$name` text(30) not null)";

if ($servername->query($sql) === TRUE) {
    echo "Table $ip created successfully";
} else {
     $alt = "ALTER TABLE `$ip` ADD `$name` text";
}
if ($servername->query($alt) === TRUE) {
          echo "";
}
include 'JSONCONV.php';



?>
