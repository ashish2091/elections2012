<?php
session_start();
    $_SESSION['id']=0;
	if(isset($_POST['submit']))

	{

		

		$ldap_uid = $_POST['user'];

		$ldap_pass = $_POST['pwd'];

		

		$ds = ldap_connect("ldap.iitb.ac.in") or die("Unable to connect to LDAP server. Please try again later.");

		

		if($ldap_uid=='') die("You have not entered any LDAP ID. Please go back and fill it up.");

		

		

			$sr = ldap_search($ds,"dc=iitb,dc=ac,dc=in","(uid=$ldap_uid)");

			$info = ldap_get_entries($ds, $sr);

			$ldap_uid = $info[0]['dn'];

			$do_bind = @ldap_bind($ds,$ldap_uid,$ldap_pass) or die("<html><body>Wrong Username and/or Password. Please go back and try again.</body></html>");
         
			$_SESSION['id']=1;

	}

if($_SESSION['id']==1)
{
		//$_SESSION['id']=0;

		//#####################################voted or not###################################################################
			$con = mysql_connect("localhost","ashish","ashish");		//remember
			if (!$con)
			{
			die('Could not connect: ' . mysql_error());
			}

			mysql_select_db("election", $con);
			$result = mysql_query("SELECT username FROM voted");
			while($row=mysql_fetch_array($result))
			{
				if($row['username']==$ldap_uid)
				{$voted=1;
				// header('location:index.php');                      // error
				}   
			}
			mysql_close($con);
		//####################################################################################################################


	//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!voting!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	if($voted==0)
			{
			$dgsec=$_POST['dgsec'];
			$mgsec=$_POST['mgsec'];
			$pgnom=$_POST['pgnom'];
			$web=$_POST['web'];
			$assoc=$_POST['assoc'];
			$pgsnom=$_POST['pgsnom'];
			$pgcnom=$_POST['pgcnom'];
			$alsec=$_POST['alsec'];
			
			$con = mysql_connect("localhost","ashish","ashish");   // Problem 1???????
			mysql_select_db("election", $con);
			
			$result=mysql_query("SELECT * FROM votecount");			// remember
			while($row=mysql_fetch_array($result))         
			{
			if($row['name']==$dgsec)
				{mysql_select_db("election", $con);
				mysql_query("UPDATE votecount SET count=$row[count]+1
				WHERE name= '$dgsec' ");}
			
			if($row['name']==$mgsec)
				{mysql_select_db("election", $con);
				mysql_query("UPDATE votecount SET count=$row[count]+1
				WHERE name= '$mgsec' ");}
				
			if($row['name']==$pgnom)
				{mysql_select_db("election", $con);
				mysql_query("UPDATE votecount SET count=$row[count]+1
				WHERE name= '$pgnom' ");}
				
			if($row['name']==$web)
				{mysql_select_db("election", $con);
				mysql_query("UPDATE votecount SET count=$row[count]+1
				WHERE name= '$web' ");}
				
			if($row['name']==$assoc)
				{mysql_select_db("election", $con);
				mysql_query("UPDATE votecount SET count=$row[count]+1
				WHERE name= '$assoc' ");}
				
			if($row['name']==$pgsnom)
				{mysql_select_db("election", $con);
				mysql_query("UPDATE votecount SET count=$row[count]+1
				WHERE name= '$pgsnom' ");}
				
			if($row['name']==$pgcnom)
				{mysql_select_db("election", $con);
				mysql_query("UPDATE votecount SET count=$row[count]+1
				WHERE name= '$pgcnom' ");}
				
			if($row['name']==$alsec)
				{mysql_select_db("election", $con);
				mysql_query("UPDATE votecount SET count=$row[count]+1
				WHERE name= '$alsec' ");}
				
			}
			mysql_query("INSERT INTO voted (username) VALUES ('$ldap_uid')");	//remember
			
			mysql_close($con);
			header("location:success.php");
			}
			
	else if($voted==1) die("<html><body>You have already voted You cannot vote again.</body></html>");
	//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		

}


else if($_SESSION['id']==0) header("location:vote.php");
			

?>

