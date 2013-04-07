<?php
//attendance.php?atendance_count=&school_code=&volunteer_id=&
if(count($_REQUEST))
{
    require "lib/db.php";
    
    $err = array();
    $atendance_count = trim($_REQUEST['atendance_count']);
    if(!$atendance_count)
    {
	$err[] = "Attendance count";
    }
    
    $school_code = trim($_REQUEST['school_code']);
    if(!$school_code)
    {
	$err[] = "School code";
    }
    $volunteer_id = trim($_REQUEST['volunteer_id']);
    if(!$volunteer_id)
    {
	$err[] = "Volunteer code";
    }
    
    if(count($err)==0)
    {
	$qry = "INSERT INTO response (volunteer_id, cell, response, school_id)
		VALUES ('$volunteer_id', '$cell', '$response', '$school_code')";
	if(mysql_query($qry))
        {
            echo "Your response has been saved.";
        }
	echo mysql_error();
    }
    else
    {
        echo "Following data is missing.\n";
        foreach($err as $k=>$v)
            echo $v. ", ";
    }
}
// here goes the HTML form
?>