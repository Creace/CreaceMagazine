<?PHP
$name=$_POST['author'];
$phone=$_POST['phone'];
$mailid=$_POST['email'];
$subject=$_POST['subject'];
$message=$_POST['text'];
$date = date("Y-m-d");
$email=" creace.web@gmail.com";

/*if(($name!='') && ($email!='') && ($subject!='') && ($message!='') && ($date!=''))
{

mysql_query("INSERT INTO contact(name, phone, email, subject, message, date) VALUES ('$name', '$phone', '$email', '$subject', '$message', '$date')");
			if(mysql_affected_rows()==1)
			{
				echo'<script laguage ="javascript">window.location="contact.php" </script>';
			}

}
else
{
				echo'<script laguage ="javascript">alert("All fields are mandatory!!!") </script>';
}	*/	
		
	
	
	
	
	$headers = "MIME-Version: 1.0 \n"; 
	$headers .= "Content-type: text/html; charset=iso-8859-1 \n"; 
	$headers .= "From:info@creace.in\r\n";
	 
	
	$mailbody = <<< EOPAGE
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>Quick Contact Form</title>
	<style type="text/css">
	<!--
	.form-text {	font-family: Verdana, tahoma, arial;
		font-size: 11px;
		color: #036;
	}
	.style1 {	font-family: Arial, Helvetica, sans-serif;
		font-size: 12px;
	}
	.style2 {font-family: Arial, Helvetica, sans-serif; font-size: 12px; font-weight: bold; }
	.style3 {font-family: Verdana, tahoma, arial; font-size: 11px; color: #036; font-weight: bold; }
	-->
	</style>
	</head>
	
	<body>
<table width="800" border="0" align="center" cellpadding="10" cellspacing="1" bgcolor="#CCCCCC">
	  <tr>
		<td colspan="2" align="right" bgcolor="#F7F7F7" class="style3"><div align="center">Quick Contact Data for Creace</div></td>
	  </tr>
	  <tr>
		<td colspan="2" align="left" bgcolor="#FFFFFF" class="form-text"><span class="style2"></span></td>
	  </tr>
	
	  <tr>
		<td align="right" bgcolor="#F7F7F7" class="form-text">Name : </td>
		<td align="left" bgcolor="#F7F7F7" class="style2">$name</td>
	  </tr>
	 
	  <tr>
		<td align="right" bgcolor="#F7F7F7" class="form-text">Phone Number:</td>
		<td width="54%" align="left" bgcolor="#F7F7F7" class="style2">$phone</td>
	  </tr>
      <tr>
		<td align="right" bgcolor="#F7F7F7" class="form-text">Email : </td>
		<td align="left" bgcolor="#F7F7F7" class="style2">$mailid</td>
	  </tr>
      <tr>
		<td align="right" bgcolor="#F7F7F7" class="form-text">Subject : </td>
		<td align="left" bgcolor="#F7F7F7" class="style2">$subject</td>
	  </tr>
      <tr>
		<td align="right" bgcolor="#F7F7F7" class="form-text">Message : </td>
		<td align="left" bgcolor="#F7F7F7" class="style2">$message</td>
	  </tr>
      <tr>
		<td align="right" bgcolor="#F7F7F7" class="form-text">Date : </td>
		<td align="left" bgcolor="#F7F7F7" class="style2">$date</td>
	  </tr>

	  <tr>
		<td colspan="2" align="right" bgcolor="#FFFFFF" class="grey-bold">&nbsp;&nbsp;<font face="Verdana" size="1" color="#000000"><strong>All Rights Reserved</strong>&nbsp;</font></td>
	  </tr>
	</table>
	</body>
	</html>
EOPAGE;

	if (@mail ($email, $subject, $mailbody, $headers)) 
	{ 
			
			echo "Mail sent successfully";
	} 
	else
	{ 
			
			echo "Message senting failed";
	}	
			


?>