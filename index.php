<html>
<head>
 <title>love</title>
</head>
<body>
<?php
 
 if (getenv('HTTP_X_FORWARDED_FOR')) {
        $pipaddress = getenv('HTTP_X_FORWARDED_FOR');
        $ipaddress = getenv('REMOTE_ADDR');
echo "Your Proxy IP address is : ".$pipaddress. "(via $ipaddress)" ;
    } else {
        $ipaddress = getenv('REMOTE_ADDR');
        echo "Your IP address is : $ipaddress";
		echo "<br />\n";
    }
	$ip=ip2long($ipaddress);
echo $ip;

// Databse Connectivity
$conn = mysql_connect('localhost', 'root', '');
if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}
$sql = 'INSERT INTO store_ip'. '(ip_addresses)'. 'VALUES ("$ip")';
mysql_select_db('test_db');
mysql_query($sql,$conn);
mysql_close($conn);
?>
</body>
</html>