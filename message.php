<?php 
$errors = '';
$myemail = 'john@jmfreight.co.ug';//<-----Put Your email address here.
if(empty($_POST['name'])  || 
   empty($_POST['email']) || 
   empty($_POST['message']))
{
    $errors .= "\n Error: All fields are required";
}

$name = $_POST['name']; 
$email_address = $_POST['email']; 
$message = $_POST['message']; 

if (!preg_match(
"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", 
$email_address))
{
    $errors .= "\n Error: Invalid email address";
}

if( empty($errors))
{
	$to = $myemail; 
	$email_subject = "Message from www.jmfreight.co.ug: $name";
	$email_body = "You have received a new message from a website user. ".
	" Here are the details:\n Name: $name \n Email: $email_address \n Message \n $message"; 
	
	$headers = "From: $myemail\n"; 
	$headers .= "Reply-To: $email_address";
	
	mail($to,$email_subject,$email_body,$headers);
	//redirect to the 'thank you' page
	header('Location: thankyou.php');
} 
?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US"><head>
    <meta charset="utf-8">
    <title>Error occured while sending message</title>
        <meta name="viewport" content="initial-scale = 1.0, maximum-scale = 1.0, user-scalable = no, width = device-width">

    <!--[if lt IE 9]><script src="https://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <link rel="stylesheet" href="style.css" media="screen">
    <!--[if lte IE 7]><link rel="stylesheet" href="style.ie7.css" media="screen" /><![endif]-->
    <link rel="stylesheet" href="style.responsive.css" media="all">
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Droid+Sans&amp;subset=latin">

    <script src="jquery.js"></script>
    <script src="script.js"></script>
    <script src="script.responsive.js"></script>



<style>.art-content .art-postcontent-0 .layout-item-old-0 { padding-right: 10px;padding-left: 10px;  }
.ie7 .art-post .art-layout-cell {border:none !important; padding:0 !important; }
.ie6 .art-post .art-layout-cell {border:none !important; padding:0 !important; }

</style></head>
<body>
<div id="art-main">
<header class="art-header">


    <div class="art-shapes">

            </div>
<h1 class="art-headline" data-left="13.66%">
    <img src="images/logo.png" align="top" />
   <!-- <a href="#">JM</a>&nbsp;<a href="#" style="font-style:normal; font-family: 'Droid Sans', 'Helvetica', Sans-Serif;; font-size:22px; font-weight:600">Freight Services Ltd</a>--></h1>
<h3 class="art-slogan" data-left="23.2%">We Keep Your Business Moving</h3>




<nav class="art-nav">
    <ul class="art-hmenu"><li><a href="index.php" class="">Home</a></li><li><a href="services.php" class="">Services</a></li><li><a href="contact-us.php" class="active">Contact Us</a></li></ul> 
    </nav>

                    
</header>
<div class="art-sheet clearfix">
            <div class="art-layout-wrapper">
                <div class="art-content-layout">
                    <div class="art-content-layout-row">
                        <div class="art-layout-cell art-content"><article class="art-post art-article">
                                
                                                
         <div class="art-postcontent art-postcontent-0 clearfix">
          	<div class="art-content-layout error">
				<!-- This page is displayed only if there is some error -->
<?php
echo nl2br($errors);
?>

	</div>
         </div>
</article></div>
                        <?php include('sidebar.php'); ?>
                        <!--(To add specifi sidebar content to a page)Close sidebar div here--></div>
                        
                    </div>
                </div>
            </div>
    </div>
<?php include('footer.php'); ?>

</div>


</body></html>