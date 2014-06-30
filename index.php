,<html>
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
$dbhost = 'localhost:3036';
$dbuser = 'heroines';
$dbpass = 'fatkid';
$conn = mysql_connect($dbhost, $dbuser, $dbpass);
if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}
$sql = 'INSERT INTO IP'. '(IPadd)'. 'VALUES ("$ip")';
mysql_select_db('test_db');
$retval = (mql_query ($sql, $conn);
if(! $retval )
{
die ('could not enter data:' . mysql_error());

}
echo  "entered successfully\n";
mysql_close($conn);
?>
</body>
</html>