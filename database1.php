<?php
session_start();
    $_SESSION['id']==0;
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
			if($_SESSION['id']==1) header("location:database.php");
		

	       		

	}

else if($_SESSION['id']==0) header("location:database.php");
			

?>


	

	

