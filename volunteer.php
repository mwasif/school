<?php
//if($_POST['submit']=='submit')

if(count($_REQUEST))
{
    require "lib/db.php";
    
    $err = array();
    $name = trim($_REQUEST['name']);
    if(!$name)
    {
	$err[] = "Please provide your name";
    }
    
    $cell = trim($_REQUEST['cell']);
    if(!$cell)
    {
	$err[] = "Please provide your cell number";
    }
    $address = trim($_REQUEST['address']);
    $city = trim($_REQUEST['city']);
    $email = trim($_REQUEST['email']);
    
    if(count($err)==0)
    {
	$qry = "INSERT INTO volunteer (name, email, cell, address, city)
		VALUES ('$name', '$email', '$cell', '$address', '$city')";
	mysql_query($qry);
    }
}
// here goes the HTML form
?>
<html>
<body>
	<head>Volunteer Signup Form</head>
<?php
if(is_array($err) && count($err)>0)
{
    echo "<p><b>Somthing is missing</b>";
    foreach($err as $k=>$v)
	echo "<p> $v ";
	
}
?>
<table>
<form method="post" name="vol_reg">
<tr><td>Name*:</td><td><input type=text name="name"/></td></tr>
<tr><td>Cell #*:</td><td><input type=text name="cell"/></td></tr>
<tr><td>Email:</td><td><input type=text name="email"/></td></tr>
<tr><td>Address:</td><td><input type=text name="address"/></td></tr>
<tr><td>City:</td><td><input type=text name="city"/></td></tr>
<tr><td></td><td><input type=submit text="Submit" name="submit" value="submit"><input type=reset /></td><tr>
<tr><td>* Required fields<td></tr>
</form>
</table>
</body>
</html>