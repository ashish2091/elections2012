<?php
session_start();
    $_SESSION['id']=0;
	if(isset($_POST['submit']))

	{

		$user = $_POST['user'];

		$ldap_uid = $_POST['user'];

		$ldap_pass = $_POST['pwd'];

		

		$ds = ldap_connect("ldap.iitb.ac.in") or die("Unable to connect to LDAP server. Please try again later.");

		

		if($ldap_uid=='') die("You have not entered any LDAP ID. Please go back and fill it up.");

		

		

			$sr = ldap_search($ds,"dc=iitb,dc=ac,dc=in","(uid=$ldap_uid)");

			$info = ldap_get_entries($ds, $sr);

			$ldap_uid = $info[0]['dn'];

			$ldap_uid = 'uid='.$user.',ou=ug,ou=ME,ou=people,dc=iitb,dc=ac,dc=in';
			
			$ug=0;
			$pg=0;
			$rs=0;
			$dd=0;
			$do_bind = @ldap_bind($ds,$ldap_uid,$ldap_pass);
			if($do_bind) $ug=1;
			
			if($ug==0)
			{
			$ldap_uid = 'uid='.$user.',ou=dd,ou=ME,ou=people,dc=iitb,dc=ac,dc=in';
			$do_bind = @ldap_bind($ds,$ldap_uid,$ldap_pass);
			if($do_bind) $dd=1;
			}
			
			if($ug==0 && $dd==0)
			{
			$ldap_uid = 'uid='.$user.',ou=rs,ou=ME,ou=people,dc=iitb,dc=ac,dc=in';
			$do_bind = @ldap_bind($ds,$ldap_uid,$ldap_pass);
			if($do_bind) $rs=1;
			}
			
			if($ug==0 && $dd==0 && $rs==0)
			{
			$ldap_uid = 'uid='.$user.',ou=pg,ou=ME,ou=people,dc=iitb,dc=ac,dc=in';
			$do_bind = @ldap_bind($ds,$ldap_uid,$ldap_pass) or die("<html><body>Wrong Username and/or Password. Please go back and try again.</body></html>");
			$pg=1;
			}
			
			//$do_bind = @ldap_bind($ds,$ldap_uid,$ldap_pass) or die("<html><body>Wrong Username and/or Password. Please go back and try again.</body></html>");



			$_SESSION['id']=1;

	}

if($_SESSION['id']==1)
{
		//$_SESSION['id']=0;

		//#####################################voted or not###################################################################
			//$con = mysql_connect("localhost","ashish","ashish");		//remember
			$con = mysql_connect("10.7.20.20","ashish","ashish");		//remember
			if (!$con)
			{
			die('Could not connect: ' . mysql_error());
			}

			mysql_select_db("election", $con);
			$result = mysql_query("SELECT username FROM voted");
			while($row=mysql_fetch_array($result))
			{
				if($row['username']==$user)
				{$voted=1;
				// header('location:index.php');                      // error
				}   
			}
			mysql_close($con);
		//####################################################################################################################


	//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!voting!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	if($voted==0)
			{
			
			$akde=$_POST['akde'];
			$sp=$_POST['sp'];
			$ppp=$_POST['ppp'];
			$amitag=$_POST['amitag'];
			$milindat=$_POST['milindat'];
			$pgawate=$_POST['pgawate'];
			$babu=$_POST['babu'];
			$bapat=$_POST['bapat'];
			$bhandar=$_POST['bhandar'];
			$tanmay=$_POST['tanmay'];
			$arin=$_POST['arin'];
			$anildate=$_POST['anildate'];
			$ppd=$_POST['ppd'];
			$amitava=$_POST['amitava'];
			$jbdoshi=$_POST['jbdoshi'];
			$ung=$_POST['ung'];
			$venkates=$_POST['venkates'];
			$gandhi=$_POST['gandhi'];
			$guha=$_POST['guha'];
			$abgupta=$_POST['abgupta'];
			$issac=$_POST['issac'];
			$iyer=$_POST['iyer'];
			$jog=$_POST['jog'];
			$kjo=$_POST['kjo'];
			$ssj=$_POST['ssj'];
			$kpk=$_POST['kpk'];
			$salil=$_POST['salil'];
			$maiti=$_POST['maiti'];
			$manik=$_POST['manik'];
			$sspande=$_POST['sspande'];
			$pawaskar=$_POST['pawaskar'];
			$usha=$_POST['usha'];
			$prabhu=$_POST['prabhu'];
			$rane=$_POST['rane'];
			$ravi=$_POST['ravi'];
			$atulsharma=$_POST['atulsharma'];
			$rks=$_POST['rks'];
			$sree=$_POST['sree'];
			$sridharan=$_POST['sridharan'];
			$hrs=$_POST['hrs'];
			$atulsrivas=$_POST['atulsrivas'];
			$ssurya=$_POST['ssurya'];
			$tewari=$_POST['tewari'];
			$ukad=$_POST['ukad'];
			$hema=$_POST['hema'];
			$vishnu=$_POST['vishnu'];
			$nr=$_POST['nr'];
			$mallik=$_POST['mallik'];
			
			
			//$con = mysql_connect("localhost","ashish","ashish");   // Problem 1???????
			$con = mysql_connect("10.7.20.20","ashish","ashish");   // Problem 1???????
			mysql_select_db("election", $con);
			
			
//##############################################3 Rating####################################3
			$result=mysql_query("SELECT * FROM rating");			// remember
			while($row=mysql_fetch_array($result))         
			{
			if($row['name']=='sp')
				{mysql_select_db("election", $con);
				mysql_query("UPDATE rating SET number=$row[number]+1, totalrate=$row[totalrate]+$sp
				WHERE name= 'sp' ");
				//mysql_query("UPDATE rating SET count=$row[number]+1
				//WHERE name= 'mayank' ");
				}
			if($row['name']=='akde')
				{mysql_select_db("election", $con);
				mysql_query("UPDATE rating SET number=$row[number]+1, totalrate=$row[totalrate]+$akde
				WHERE name= 'akde' ");
				//mysql_query("UPDATE rating SET count=$row[number]+1
				//WHERE name= 'mayank' ");
				}
			if($row['name']=='ppp')
				{mysql_select_db("election", $con);
				mysql_query("UPDATE rating SET number=$row[number]+1, totalrate=$row[totalrate]+$ppp
				WHERE name= 'ppp' ");
				//mysql_query("UPDATE rating SET count=$row[number]+1
				//WHERE name= 'mayank' ");
				}
			if($row['name']=='amitag')
				{mysql_select_db("election", $con);
				mysql_query("UPDATE rating SET number=$row[number]+1, totalrate=$row[totalrate]+$amitag
				WHERE name= 'amitag' ");
				//mysql_query("UPDATE rating SET count=$row[number]+1
				//WHERE name= 'mayank' ");
				}
			if($row['name']=='milindat')
				{mysql_select_db("election", $con);
				mysql_query("UPDATE rating SET number=$row[number]+1, totalrate=$row[totalrate]+$milindat
				WHERE name= 'milindat' ");
				//mysql_query("UPDATE rating SET count=$row[number]+1
				//WHERE name= 'mayank' ");
				}
			if($row['name']=='pgawate')
				{mysql_select_db("election", $con);
				mysql_query("UPDATE rating SET number=$row[number]+1, totalrate=$row[totalrate]+$pgawate
				WHERE name= 'pgawate' ");
				//mysql_query("UPDATE rating SET count=$row[number]+1
				//WHERE name= 'mayank' ");
				}
			if($row['name']=='babu')
				{mysql_select_db("election", $con);
				mysql_query("UPDATE rating SET number=$row[number]+1, totalrate=$row[totalrate]+$babu
				WHERE name= 'babu' ");
				//mysql_query("UPDATE rating SET count=$row[number]+1
				//WHERE name= 'mayank' ");
				}
			if($row['name']=='bapat')
				{mysql_select_db("election", $con);
				mysql_query("UPDATE rating SET number=$row[number]+1, totalrate=$row[totalrate]+$bapat
				WHERE name= 'bapat' ");
				//mysql_query("UPDATE rating SET count=$row[number]+1
				//WHERE name= 'mayank' ");
				}
			if($row['name']=='bhandar')
				{mysql_select_db("election", $con);
				mysql_query("UPDATE rating SET number=$row[number]+1, totalrate=$row[totalrate]+$bhandar
				WHERE name= 'bhandar' ");
				//mysql_query("UPDATE rating SET count=$row[number]+1
				//WHERE name= 'mayank' ");
				}
			if($row['name']=='tanmay')
				{mysql_select_db("election", $con);
				mysql_query("UPDATE rating SET number=$row[number]+1, totalrate=$row[totalrate]+$tanmay
				WHERE name= 'tanmay' ");
				//mysql_query("UPDATE rating SET count=$row[number]+1
				//WHERE name= 'mayank' ");
				}
			if($row['name']=='arin')
				{mysql_select_db("election", $con);
				mysql_query("UPDATE rating SET number=$row[number]+1, totalrate=$row[totalrate]+$arin
				WHERE name= 'arin' ");
				//mysql_query("UPDATE rating SET count=$row[number]+1
				//WHERE name= 'mayank' ");
				}
			if($row['name']=='anildate')
				{mysql_select_db("election", $con);
				mysql_query("UPDATE rating SET number=$row[number]+1, totalrate=$row[totalrate]+$anildate
				WHERE name= 'anildate' ");
				//mysql_query("UPDATE rating SET count=$row[number]+1
				//WHERE name= 'mayank' ");
				}
			if($row['name']=='ppd')
				{mysql_select_db("election", $con);
				mysql_query("UPDATE rating SET number=$row[number]+1, totalrate=$row[totalrate]+$ppd
				WHERE name= 'ppd' ");
				//mysql_query("UPDATE rating SET count=$row[number]+1
				//WHERE name= 'mayank' ");
				}
			if($row['name']=='amitava')
				{mysql_select_db("election", $con);
				mysql_query("UPDATE rating SET number=$row[number]+1, totalrate=$row[totalrate]+$amitava
				WHERE name= 'amitava' ");
				//mysql_query("UPDATE rating SET count=$row[number]+1
				//WHERE name= 'mayank' ");
				}
			if($row['name']=='jbdoshi')
				{mysql_select_db("election", $con);
				mysql_query("UPDATE rating SET number=$row[number]+1, totalrate=$row[totalrate]+$jbdoshi
				WHERE name= 'jbdoshi' ");
				//mysql_query("UPDATE rating SET count=$row[number]+1
				//WHERE name= 'mayank' ");
				}
			if($row['name']=='ung')
				{mysql_select_db("election", $con);
				mysql_query("UPDATE rating SET number=$row[number]+1, totalrate=$row[totalrate]+$ung
				WHERE name= 'ung' ");
				//mysql_query("UPDATE rating SET count=$row[number]+1
				//WHERE name= 'mayank' ");
				}
			if($row['name']=='venkates')
				{mysql_select_db("election", $con);
				mysql_query("UPDATE rating SET number=$row[number]+1, totalrate=$row[totalrate]+$venkates
				WHERE name= 'venkates' ");
				//mysql_query("UPDATE rating SET count=$row[number]+1
				//WHERE name= 'mayank' ");
				}
			if($row['name']=='gandhi')
				{mysql_select_db("election", $con);
				mysql_query("UPDATE rating SET number=$row[number]+1, totalrate=$row[totalrate]+$gandhi
				WHERE name= 'gandhi' ");
				//mysql_query("UPDATE rating SET count=$row[number]+1
				//WHERE name= 'mayank' ");
				}
			if($row['name']=='guha')
				{mysql_select_db("election", $con);
				mysql_query("UPDATE rating SET number=$row[number]+1, totalrate=$row[totalrate]+$guha
				WHERE name= 'guha' ");
				//mysql_query("UPDATE rating SET count=$row[number]+1
				//WHERE name= 'mayank' ");
				}
			if($row['name']=='abgupta')
				{mysql_select_db("election", $con);
				mysql_query("UPDATE rating SET number=$row[number]+1, totalrate=$row[totalrate]+$abgupta
				WHERE name= 'abgupta' ");
				//mysql_query("UPDATE rating SET count=$row[number]+1
				//WHERE name= 'mayank' ");
				}
			if($row['name']=='issac')
				{mysql_select_db("election", $con);
				mysql_query("UPDATE rating SET number=$row[number]+1, totalrate=$row[totalrate]+$issac
				WHERE name= 'issac' ");
				//mysql_query("UPDATE rating SET count=$row[number]+1
				//WHERE name= 'mayank' ");
				}
			if($row['name']=='iyer')
				{mysql_select_db("election", $con);
				mysql_query("UPDATE rating SET number=$row[number]+1, totalrate=$row[totalrate]+$iyer
				WHERE name= 'iyer' ");
				//mysql_query("UPDATE rating SET count=$row[number]+1
				//WHERE name= 'mayank' ");
				}
			if($row['name']=='jog')
				{mysql_select_db("election", $con);
				mysql_query("UPDATE rating SET number=$row[number]+1, totalrate=$row[totalrate]+$jog
				WHERE name= 'jog' ");
				//mysql_query("UPDATE rating SET count=$row[number]+1
				//WHERE name= 'mayank' ");
				}
			if($row['name']=='kjo')
				{mysql_select_db("election", $con);
				mysql_query("UPDATE rating SET number=$row[number]+1, totalrate=$row[totalrate]+$kjo
				WHERE name= 'kjo' ");
				//mysql_query("UPDATE rating SET count=$row[number]+1
				//WHERE name= 'mayank' ");
				}
			if($row['name']=='ssj')
				{mysql_select_db("election", $con);
				mysql_query("UPDATE rating SET number=$row[number]+1, totalrate=$row[totalrate]+$ssj
				WHERE name= 'ssj' ");
				//mysql_query("UPDATE rating SET count=$row[number]+1
				//WHERE name= 'mayank' ");
				}
			if($row['name']=='kpk')
				{mysql_select_db("election", $con);
				mysql_query("UPDATE rating SET number=$row[number]+1, totalrate=$row[totalrate]+$kpk
				WHERE name= 'kpk' ");
				//mysql_query("UPDATE rating SET count=$row[number]+1
				//WHERE name= 'mayank' ");
				}
			if($row['name']=='salil')
				{mysql_select_db("election", $con);
				mysql_query("UPDATE rating SET number=$row[number]+1, totalrate=$row[totalrate]+$salil
				WHERE name= 'salil' ");
				//mysql_query("UPDATE rating SET count=$row[number]+1
				//WHERE name= 'mayank' ");
				}
			if($row['name']=='maiti')
				{mysql_select_db("election", $con);
				mysql_query("UPDATE rating SET number=$row[number]+1, totalrate=$row[totalrate]+$maiti
				WHERE name= 'maiti' ");
				//mysql_query("UPDATE rating SET count=$row[number]+1
				//WHERE name= 'mayank' ");
				}
			if($row['name']=='manik')
				{mysql_select_db("election", $con);
				mysql_query("UPDATE rating SET number=$row[number]+1, totalrate=$row[totalrate]+$manik
				WHERE name= 'manik' ");
				//mysql_query("UPDATE rating SET count=$row[number]+1
				//WHERE name= 'mayank' ");
				}
			if($row['name']=='sspande')
				{mysql_select_db("election", $con);
				mysql_query("UPDATE rating SET number=$row[number]+1, totalrate=$row[totalrate]+$sspande
				WHERE name= 'sspande' ");
				//mysql_query("UPDATE rating SET count=$row[number]+1
				//WHERE name= 'mayank' ");
				}
			if($row['name']=='pawaskar')
				{mysql_select_db("election", $con);
				mysql_query("UPDATE rating SET number=$row[number]+1, totalrate=$row[totalrate]+$pawaskar
				WHERE name= 'pawaskar' ");
				//mysql_query("UPDATE rating SET count=$row[number]+1
				//WHERE name= 'mayank' ");
				}
			if($row['name']=='usha')
				{mysql_select_db("election", $con);
				mysql_query("UPDATE rating SET number=$row[number]+1, totalrate=$row[totalrate]+$usha
				WHERE name= 'usha' ");
				//mysql_query("UPDATE rating SET count=$row[number]+1
				//WHERE name= 'mayank' ");
				}
			if($row['name']=='prabhu')
				{mysql_select_db("election", $con);
				mysql_query("UPDATE rating SET number=$row[number]+1, totalrate=$row[totalrate]+$prabhu
				WHERE name= 'prabhu' ");
				//mysql_query("UPDATE rating SET count=$row[number]+1
				//WHERE name= 'mayank' ");
				}
			if($row['name']=='rane')
				{mysql_select_db("election", $con);
				mysql_query("UPDATE rating SET number=$row[number]+1, totalrate=$row[totalrate]+$rane
				WHERE name= 'rane' ");
				//mysql_query("UPDATE rating SET count=$row[number]+1
				//WHERE name= 'mayank' ");
				}
			if($row['name']=='ravi')
				{mysql_select_db("election", $con);
				mysql_query("UPDATE rating SET number=$row[number]+1, totalrate=$row[totalrate]+$ravi
				WHERE name= 'ravi' ");
				//mysql_query("UPDATE rating SET count=$row[number]+1
				//WHERE name= 'mayank' ");
				}
			if($row['name']=='atulsharma')
				{mysql_select_db("election", $con);
				mysql_query("UPDATE rating SET number=$row[number]+1, totalrate=$row[totalrate]+$atulsharma
				WHERE name= 'atulsharma' ");
				//mysql_query("UPDATE rating SET count=$row[number]+1
				//WHERE name= 'mayank' ");
				}
			if($row['name']=='rks')
				{mysql_select_db("election", $con);
				mysql_query("UPDATE rating SET number=$row[number]+1, totalrate=$row[totalrate]+$rks
				WHERE name= 'rks' ");
				//mysql_query("UPDATE rating SET count=$row[number]+1
				//WHERE name= 'mayank' ");
				}
			if($row['name']=='sree')
				{mysql_select_db("election", $con);
				mysql_query("UPDATE rating SET number=$row[number]+1, totalrate=$row[totalrate]+$sree
				WHERE name= 'sree' ");
				//mysql_query("UPDATE rating SET count=$row[number]+1
				//WHERE name= 'mayank' ");
				}
			if($row['name']=='sridharan')
				{mysql_select_db("election", $con);
				mysql_query("UPDATE rating SET number=$row[number]+1, totalrate=$row[totalrate]+$sridharan
				WHERE name= 'sridharan' ");
				//mysql_query("UPDATE rating SET count=$row[number]+1
				//WHERE name= 'mayank' ");
				}
			if($row['name']=='hrs')
				{mysql_select_db("election", $con);
				mysql_query("UPDATE rating SET number=$row[number]+1, totalrate=$row[totalrate]+$hrs
				WHERE name= 'hrs' ");
				//mysql_query("UPDATE rating SET count=$row[number]+1
				//WHERE name= 'mayank' ");
				}
			if($row['name']=='atulsrivas')
				{mysql_select_db("election", $con);
				mysql_query("UPDATE rating SET number=$row[number]+1, totalrate=$row[totalrate]+$atulsrivas
				WHERE name= 'atulsrivas' ");
				//mysql_query("UPDATE rating SET count=$row[number]+1
				//WHERE name= 'mayank' ");
				}
			if($row['name']=='ssurya')
				{mysql_select_db("election", $con);
				mysql_query("UPDATE rating SET number=$row[number]+1, totalrate=$row[totalrate]+$ssurya
				WHERE name= 'ssurya' ");
				//mysql_query("UPDATE rating SET count=$row[number]+1
				//WHERE name= 'mayank' ");
				}
			if($row['name']=='tewari')
				{mysql_select_db("election", $con);
				mysql_query("UPDATE rating SET number=$row[number]+1, totalrate=$row[totalrate]+$tewari
				WHERE name= 'tewari' ");
				//mysql_query("UPDATE rating SET count=$row[number]+1
				//WHERE name= 'mayank' ");
				}
			if($row['name']=='ukad')
				{mysql_select_db("election", $con);
				mysql_query("UPDATE rating SET number=$row[number]+1, totalrate=$row[totalrate]+$ukad
				WHERE name= 'ukad' ");
				//mysql_query("UPDATE rating SET count=$row[number]+1
				//WHERE name= 'mayank' ");
				}
			if($row['name']=='ukad')
				{mysql_select_db("election", $con);
				mysql_query("UPDATE rating SET number=$row[number]+1, totalrate=$row[totalrate]+$ukad
				WHERE name= 'ukad' ");
				//mysql_query("UPDATE rating SET count=$row[number]+1
				//WHERE name= 'mayank' ");
				}
			if($row['name']=='hema')
				{mysql_select_db("election", $con);
				mysql_query("UPDATE rating SET number=$row[number]+1, totalrate=$row[totalrate]+$hema
				WHERE name= 'hema' ");
				//mysql_query("UPDATE rating SET count=$row[number]+1
				//WHERE name= 'mayank' ");
				}
			if($row['name']=='vishnu')
				{mysql_select_db("election", $con);
				mysql_query("UPDATE rating SET number=$row[number]+1, totalrate=$row[totalrate]+$vishnu
				WHERE name= 'vishnu' ");
				//mysql_query("UPDATE rating SET count=$row[number]+1
				//WHERE name= 'mayank' ");
				}
			if($row['name']=='nr')
				{mysql_select_db("election", $con);
				mysql_query("UPDATE rating SET number=$row[number]+1, totalrate=$row[totalrate]+$nr
				WHERE name= 'nr' ");
				//mysql_query("UPDATE rating SET count=$row[number]+1
				//WHERE name= 'mayank' ");
				}
			if($row['name']=='mallik')
				{mysql_select_db("election", $con);
				mysql_query("UPDATE rating SET number=$row[number]+1, totalrate=$row[totalrate]+$mallik
				WHERE name= 'mallik' ");
				//mysql_query("UPDATE rating SET count=$row[number]+1
				//WHERE name= 'mayank' ");
				}
			
			
			    
				
			}
			

//#################################################rating end###################################
			
			mysql_query("INSERT INTO voted (username) VALUES ('$user')");	//remember
			
			mysql_close($con);
			header("location:success.php");
			}
			
	else if($voted==1) die("<html><body>You have already voted You cannot vote again.</body></html>");
	//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		

}


else if($_SESSION['id']==0) header("location:vote.php");
			

?>

