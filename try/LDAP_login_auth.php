<?php
	session_start();
	if( !(isset($_POST['username'])) || !(isset($_POST['password'])))
	{
		echo '<H3>You are not logged in! <BR> Click <a href="index.php">here</a> to go to Login. </H3>';
		exit;
	} 
	$username = $_POST["username"];
	$ldappass = $_POST["password"];  // associated password

	//echo $username;
	
	$ldaprdn1 = 'uid='.$username.',ou=pg,ou=CSE,ou=people,dc=iitb,dc=ac,dc=in'; // change "ou=CSE" to the Dept code of the new RA's Dept (if he/she is not from ME)
     	$ldaprdn2 = 'uid='.$username.',ou=stf,ou=ME,ou=People,dc=iitb,dc=ac,dc=in';
        $ldaprdn3 = 'uid='.$username.',ou=pg,ou=ME,ou=People,dc=iitb,dc=ac,dc=in';
	$ldaprdn4 = 'uid='.$username.',ou=FAC,ou=ME,ou=People,dc=iitb,dc=ac,dc=in';
        $ldaprdn5 = 'uid='.$username.',ou=RS,ou=ME,ou=People,dc=iitb,dc=ac,dc=in';

                                                             

	// connect to ldap server
       	$ldapconn = ldap_connect("ldap.iitb.ac.in")
    		or die("Could not connect to LDAP server.");

	//echo "successfully connectedto ldap";

	if ($ldapconn) 
	{

    		// binding to ldap server
		 if ( $username == 'hitesh.mazumdar' || $username == 'aganguly') //Adarsha or Hitesh or Aganguly 
			$ldapbind = @ldap_bind($ldapconn, $ldaprdn3, $ldappass);

                else if ($username == 'aadarsha')  $ldapbind = @ldap_bind($ldapconn, $ldaprdn5, $ldappass);

		else //for Faculty
			$ldapbind = @ldap_bind($ldapconn, $ldaprdn4, $ldappass);
    		// verify binding
		
    		if ($ldapbind) 
        	{	
			echo "LDAP bind successful...";
			session_start();
			$_SESSION['auth'] = 1;
			$_SESSION['username'] = $username;
			if ( $username == 'hitesh.mazumdar' || $username == 'aganguly' || $username == 'aadarsha' )
			{
				$_SESSION['staff'] = 1;
				//echo "Here";
				header( 'Location: ./test.php' );
				exit;
			}
			else
			
				$_SESSION['prof'] = 1;
                                header( 'Location: ./test2.php' );
                                exit;
                        

    		}
 
		else 
		{       echo "binding:".$ldapbind;
        		echo '<H3>LDAP authentication failed.<BR> Click <a href="index.php">here</a> to go to Login. </H3>';
    		}
	}
?>


