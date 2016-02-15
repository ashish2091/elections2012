
if(isset($_POST['ldapid']))
	{
		$ldap_uid = mysql_escape_string($_POST['ldapid']);
		$ldap_pass = mysql_escape_string($_POST['ldappwd']);
		$ds = ldap_connect("ldap.iitb.ac.in") or die("Unable to connect to LDAP server. Please try again later.");
		if($ldap_uid=='') die("You have not entered any LDAP ID. Please go back and fill it up.");
	
		$sr = ldap_search($ds,"dc=iitb,dc=ac,dc=in","(uid=$ldap_uid)");
		$info = ldap_get_entries($ds, $sr);
		for($i=0;$i<10;$i++){		
			$info[$i];
		}
		$ldap_uid = $info[0]['dn'];
		$do_bind = @ldap_bind($ds,$ldap_uid,$ldap_pass) or die("<form id=\"ldapform\" method=\"POST\" name=\"ldapform\" action=\"home.php\">
			<table>
			<tr>
				<td>Login:</td>
				<td><input id=\"ldapid\" name=\"ldapid\" type=\"input\" /></td>
			</tr>
			<tr>
				<td>Password:</td>
				<td><input id=\"ldappwd\" name=\"ldappwd\" type=\"password\"/></td>
			</tr>
			<tr>
				<td  colspan=\"2\" align=\"right\"><input id=\"ldapsubmit\" name=\"ldapsubmit\" value=\"Sign In\" type=\"button\"/></td>
			</tr>
			</table>
			
		</form><br/><br/>Wrong Username and/or Password. ");

			$_SESSION['loginid'] = $_POST['ldapid'];