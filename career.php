<?php
$strname		=ucfirst($_REQUEST["yname"]);
    $qualification	=ucfirst($_REQUEST["qln"]);
    $phone			=ucfirst($_REQUEST["cno"]);
    $place			=ucfirst($_REQUEST["place"]);  
	$iphone			=$_REQUEST['ios'];
	$android		=$_REQUEST['android'];
	$web			=$_REQUEST['web']; 
	$message		= $_REQUEST['msg'];
	if($iphone)
	{ 
	 $applyfor=$iphone;
	}   
	else if($android)
	{ 
	 $applyfor=$android;
	} 
	else 
	{ 
	 $applyfor=$web;
	}   
$logoimgpath="testUpload/";
		$logo_path="";
		if($_POST['hidstlogo']!="")
		{
			$filteredData=substr($_POST['hidstlogo'], strpos($_POST['hidstlogo'], ",")+1);
			$unencodedData=base64_decode($filteredData);
			$target_pathbck = $logoimgpath .time().'.docx';
			file_put_contents($target_pathbck, $unencodedData);
			
			$logo_path=$target_pathbck;
			 $u_doc = $target_pathbck;
		}
 $message= '
   
   
            <table cellspacing="0" cellpadding="8" border="0" width="400">
            <tr>
                <td colspan="2"></td>
            </tr>
            <tr bgcolor="#eeeeee">
                <td style="font-family:Verdana, Arial; font-size:11px; color:#333333;"><strong>Name</strong></td>
                <td style="font-family:Verdana, Arial; font-size:11px; color:#333333;">'.$strname.'</td>
            </tr>
            <tr><td colspan="2" style="padding:0px;"><img src="images/whitespace.gif" alt="" width="100%" height="1" /></td></tr>
            <tr bgcolor="#eeeeee">
              <td style="font-family:Verdana, Arial; font-size:11px; color:#333333;"><strong>Qualification</strong></td>
              <td style="font-family:Verdana, Arial; font-size:11px; color:#333333;">'.$qualification.'</td>
              </tr>
            <tr><td colspan="2" style="padding:0px;"><img src="images/whitespace.gif" alt="" width="100%" height="1" /></td></tr>
            <tr bgcolor="#eeeeee">
              <td style="font-family:Verdana, Arial; font-size:11px; color:#333333;"><strong>Place</strong></td>
              <td style="font-family:Verdana, Arial; font-size:11px; color:#333333;">'.$place.'</td>
              </tr>
              <tr><td colspan="2" style="padding:0px;"><img src="images/whitespace.gif" alt="" width="100%" height="1" /></td></tr>
            <tr bgcolor="#eeeeee">
              <td style="font-family:Verdana, Arial; font-size:11px; color:#333333;"><strong>Apply For</strong></td>
              <td style="font-family:Verdana, Arial; font-size:11px; color:#333333;">'.$applyfor.'</td>
              </tr>
              <tr><td colspan="2" style="padding:0px;"><img src="images/whitespace.gif" alt="" width="100%" height="1" /></td></tr>
            <tr bgcolor="#eeeeee">
              <td style="font-family:Verdana, Arial; font-size:11px; color:#333333;"><strong>Contact No.</strong></td>
              <td style="font-family:Verdana, Arial; font-size:11px; color:#333333;">'.$phone.'</td>
              </tr>
            <tr><td colspan="2" style="padding:0px;"><img src="images/whitespace.gif" alt="" width="100%" height="1" /></td></tr>
           
            <tr bgcolor="#eeeeee">
                <td colspan="2" style="font-family:Verdana, Arial; font-size:11px; color:#333333;"><strong>Comments</strong></td>
            </tr>               
            <tr bgcolor="#eeeeee">
                <td colspan="2" style="font-family:Verdana, Arial; font-size:11px; color:#333333;">'.$message.'</td>
            </tr>               
                                   
            <tr><td colspan="2" style="padding:0px;"><img src="images/whitespace.gif" alt="" width="100%" height="1" /></td></tr>
         </table>


';

    // MAIL SUBJECT

    $subject = "Careers Enquiry";
   
    // TO MAIL ADDRESS
   
   
    $to="creace.web@gmail.com";


 /*   // MAIL HEADERS
                       
    $headers  = "MIME-Version: 1.0\n";
    $headers .= "Content-type: text/html; charset=iso-8859-1\n";
    $headers .= "From: Name <info@creace.in>\n";
*/


    // MAIL HEADERS with attachment

  //Open a file
  $file = fopen( $u_doc, "r" );
  if( $file == false )
  {
     echo "Error in opening file";
     exit();
  }
  # Read the file into a variable
  $size = filesize($u_doc);
  $content = fread( $file, $size);

  # encode the data for safe transit
  # and insert \r\n after every 76 chars.
  $encoded_content = chunk_split( base64_encode($content));
  
  # Get a random 32 bit number using time() as seed.
  $num = md5( time() );
   
        //Normal headers

 
$exts = "doc";
$rsq='resume_'.time().".".$exts;
   	   $headers  = "From: info@creace.in<info@creace.in>\r\n";
       $headers  .= "MIME-Version: 1.0\r\n";
       $headers  .= "Content-Type: multipart/mixed; ";
       $headers  .= "boundary=".$num."\r\n";
       $headers  .= "--$num\r\n";

        // This two steps to help avoid spam   

    //$headers .= "Message-ID: <".$now." TheSystem@".$_SERVER['SERVER_NAME'].">\r\n";
    //$headers .= "X-Mailer: PHP v".phpversion()."\r\n";         

        // With message
       
    $headers .= "Content-Type: text/html; charset=iso-8859-1\r\n";
       $headers .= "Content-Transfer-Encoding: 8bit\r\n";
       $headers .= "".$message."\n";
       $headers .= "--".$num."\n"; 

         //Attachment headers

    $headers  .= "Content-Type:".$rsq." ";
       $headers  .= "name=\"".$rsq."\"r\n";
       $headers  .= "Content-Transfer-Encoding: base64\r\n";
       $headers  .= "Content-Disposition: attachment; ";
       $headers  .= "filename=\"".$rsq."\"\r\n\n";
       $headers  .= "".$encoded_content."\r\n";
       $headers  .= "--".$num."--";
	   
	/*   
	    # Define the attachment section
  $header .= "Content-Type:  multipart/mixed; ";
  $header .= "name=\.$rsq.\r\n";
  $header .= "Content-Transfer-Encoding:base64\r\n";
  $header .= "Content-Disposition:attachment; ";
  $header .= "filename=\.$rsq.\r\n\n";
  $header .= "$encoded_content\r\n";
  $header .= "--$num--";
*/
    // SEND MAIL
      if( @mail($to, $subject, $message, $headers))
	   
		{
			echo'Your resume posted successfully';
		}
	else
		{
			echo'Error while submitting';
		}
?>		