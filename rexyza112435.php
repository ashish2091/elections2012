<?php

echo "<html><body>";
	//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!voting!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	
			//$con = mysql_connect("localhost","ashish","ashish");   // Problem 1???????
			$con = mysql_connect("10.7.20.20","ashish","ashish");   // Problem 1???????
			mysql_select_db("election", $con);
			
			

			
			$result=mysql_query("SELECT * FROM rating");			// remember

			while($row=mysql_fetch_array($result))         

		{

		if($row['name']=="akde") $akde = $row['totalrate']/$row['number'] ;	
	 	if($row['name']=="sp") $sp = $row['totalrate']/$row['number']	;
	 	if($row['name']=="ppp") $appp=$row['totalrate']/$row['number']; 	
	 	if($row['name']=="amitag") $amitag=$row['totalrate']/$row['number'];
	 	if($row['name']=="milindat") $milindat=$row['totalrate'] /$row['number'];	
	 	if($row['name']=="pgawate") $pgawate=$row['totalrate']/$row['number']; 	
	 	if($row['name']=="babu") $babu=$row['totalrate']/$row['number']	;
	 	if($row['name']=="bapat") $bapat=$row['totalrate']/$row['number']	;
	 	if($row['name']=="tanmay") $tanmay=$row['totalrate']/$row['number']; 	
	 	if($row['name']=="arin") $arin=$row['totalrate']/$row['number']; 	
	 	if($row['name']=="anildate") $anildate=$row['totalrate']/$row['number']; 	
	 	if($row['name']=="ppd") $ppd=$row['totalrate']/$row['number']; 	
	 	if($row['name']=="jbdoshi") $jbdoshi=$row['totalrate']/$row['number']; 	
	 	if($row['name']=="amitava") $amitava=$row['totalrate']/$row['number']; 	
	 	if($row['name']=="ung") $ung=$row['totalrate']/$row['number']; 	
	 	if($row['name']=="venkates") $venkates=$row['totalrate']/$row['number']; 	
	 	if($row['name']=="gandhi") $gandhi=$row['totalrate']/$row['number']; 	
	 	if($row['name']=="guha") $guha=$row['totalrate']/$row['number']; 	
	 	if($row['name']=="abgupta") $abgupta=$row['totalrate']/$row['number']; 	
	 	if($row['name']=="issac") $issac=$row['totalrate']/$row['number']; 	
	 	if($row['name']=="iyer") $iyer=$row['totalrate']/$row['number']; 	
	 	if($row['name']=="jog") $jog=$row['totalrate']/$row['number']; 	
	 	if($row['name']=="kjo") $kjo=$row['totalrate']/$row['number']; 	
	 	if($row['name']=="ssj") $kpk=$row['totalrate']/$row['number']; 	
	 	if($row['name']=="salil") $salil=$row['totalrate']/$row['number']; 	
	 	if($row['name']=="maiti") $maiti=$row['totalrate']/$row['number']; 	
	 	if($row['name']=="manik") $manik=$row['totalrate']/$row['number']; 	
	 	if($row['name']=="sspande") $sspande=$row['totalrate']/$row['number']; 	
	 	if($row['name']=="usha") $usha=$row['totalrate']/$row['number']; 	
	 	if($row['name']=="prabhu") $prabhu=$row['totalrate']/$row['number']; 	
	 	if($row['name']=="rane") $rane=$row['totalrate']/$row['number']; 	
	 	if($row['name']=="ravi") $ravi=$row['totalrate']/$row['number']; 	
	 	if($row['name']=="atulsharma") $atulsharma=$row['totalrate']/$row['number']; 	
	 	if($row['name']=="rks") $rks=$row['totalrate']/$row['number']; 	
	 	if($row['name']=="sree") $sree=$row['totalrate']/$row['number']; 	
	 	if($row['name']=="sridharan") $sridharan=$row['totalrate']/$row['number']; 	
	 	if($row['name']=="hrs") $hrs=$row['totalrate']/$row['number']; 	
	 	if($row['name']=="atulsrivas") $atulsrivas=$row['totalrate']/$row['number']; 	
	 	if($row['name']=="ssurya") $ssurya=$row['totalrate']/$row['number']; 	
	 	if($row['name']=="tewari") $tewari=$row['totalrate']/$row['number']; 	
	 	if($row['name']=="ukad") $ukad=$row['totalrate']/$row['number']; 	
	 	if($row['name']=="hema") $hema=$row['totalrate']/$row['number']; 	
	 	if($row['name']=="vishnu") $vishnu=$row['totalrate']/$row['number']; 	
	 	if($row['name']=="nr") $nr=$row['totalrate']/$row['number']; 	
	 	if($row['name']=="mallik") $mallik=$row['totalrate']/$row['number']; 	
	 	}
			
			echo "<br><br></br></br><h3>Rating Results</h3>";
			
echo"
		<table border=1>
		<tr><td><h3>Mayank Gupta </h3></td><td><h3>$mayank </h3></td></tr>
		<tr><td><h3>Mayank Gupta </h3></td><td><h3>$mayank </h3></td></tr>
		<tr><td><h3>Mayank Gupta </h3></td><td><h3>$mayank </h3></td></tr>
		<tr><td><h3>Mayank Gupta </h3></td><td><h3>$mayank </h3></td></tr>
		
		</table>
		";
		

	//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		



echo "</body></html>"
			

?>

