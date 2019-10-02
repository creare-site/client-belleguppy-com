<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Belle Guppy - Always Care for You">
    <meta name="author" content="Burzware.com">
    <title>Belle Guppy - Always Care for You</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="../css/freelancer.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

        <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

</head>

<body id="page-top" class="index">
<div id="skipnav"><a href="#maincontent">Skip to main content</a></div>

    <!-- Navigation -->
    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top navbar-custom">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <a class="navbar-brand" href="../"><img class="img-responsive" alt="Belle Guppy" src="../img/logo.png"></a>
            </div>
            

            <!-- Collect the nav links, forms, and other content for toggling -->
            
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <!-- Header -->
   <header>
<div class="container" id="maincontent" tabindex="-1">
<div class="row">
<div class="col-lg-12">
<img class="img-responsive" src="../img/profile.png" alt="">
<?php /* <div class="intro-text">
<h1 class="name">Ankle Cuffs for Cable Machines with Adjustable Foam Padded</h1>
<span class="skills">Premium Quality Straps for Men &amp; Women</span>
</div> */ ?>
</div>
</div>
</div>
</header>

    <!-- Portfolio Grid Section -->
    <section id="product">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Thank you for buying. Get your bonus now by subscribing to our newsletter!</h2>
                    <p>&nbsp;<br />&nbsp;</p>
                </div>
            </div>
            <div class="row spatiere">
             <div class="col-sm-12 bonus-form">
                    <?php //if (isset($_POST['contactForm'])) : ?>
                        <?php

                            require_once '../inc/sendmail/PHPMailerAutoload.php';
                            require_once '../inc/sendmail/email.c.php';

                            $name = $_POST['name'];
                            $email = $_POST['email'];
                                    
                            $mail = new PHPMailer;
                            
                            $mail->CharSet = "UTF-8";
                            $mail->isSMTP();                                      // Set mailer to use SMTP
                            $mail->Host = constant('SMTP_SERVER'); //'smtp.mandrillapp.com:587';  // Specify main and backup SMTP servers
                            $mail->SMTPAuth = true;                               // Enable SMTP authentication
                            $mail->Username = constant('SMTP_USR');                 // SMTP username
                            $mail->Password = constant('SMTP_PASS');                           // SMTP password
                            $mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted
                            
                            $mail->From = constant('EMAIL_SENDER');
                            $mail->FromName = constant('EMAIL_FROM');
                            $mail->addAddress($email);     // Add a recipient
                            //$mail->addAddress('ellen@example.com');               // Name is optional
                            $mail->addReplyTo(constant('EMAIL_FROM_ADDRESS'), constant('EMAIL_FROM'));
                            //$mail->addCC($email);
                            //$mail->addBCC('bcc@example.com');
                            
                            //$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
                            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
                            $mail->isHTML(false);                                  // Set email format to HTML


                            $mail->Subject = constant('EMAIL_SUBJECT');
                            

                            $mail->Body    =  'Hello ' . $name . ',' . PHP_EOL . PHP_EOL . 'Thank you for buying our product from Amazon.com and subscribing to our newsletter using the form you just visited.' . PHP_EOL . PHP_EOL . 'If you haven’t visited that form, please ignore this email, otherwise, please find bellow the link to download our complementary e-book. If you got this email in your Spam or Junk folder, thank you for marking this e-mail as clean (Not Spam).' . PHP_EOL . PHP_EOL . 'Download the e-book from: ' . constant('WEBSITE_URL') . constant('EBOOK_URL') . PHP_EOL . PHP_EOL . 'Should you want to send us your feedback or just tell us something related to our product, please contact us at ' . constant('EMAIL_FROM_ADDRESS') . ' or reply to this e-mail.' . PHP_EOL . PHP_EOL . 'We really appreciate you and thank you once again for buying from us.' . PHP_EOL . PHP_EOL . 'All the best,' . PHP_EOL . constant('EMAIL_FROM');

                            //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                            
                             if ((!empty($name)) && (!empty($email))) {
                                $csv_list = file_put_contents('subscribers.csv', $name . ',' . $email . PHP_EOL , FILE_APPEND | LOCK_EX);
                                if(!$mail->send()) {
                                    //echo $mail->ErrorInfo;
                                   
                                } else {
                                     echo "<script>$(document).ready(function () { $('.control-group').hide(); $('.btn-success').hide(); $('#success').html('<p>Thank you! Please check your e-mail (including your Junk/Spam folder) for the bonus content.</p>'); });</script>"; 
                                }
                            }


                        ?>
                    <?php //else: ?>

                    <form name="contactForm" id="contactForm" action="index.php" method="POST" novalidate>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" placeholder="Name" id="name" name="name" required data-validation-required-message="Please enter your name.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label for="email">Email Address</label>
                                <input type="email" class="form-control" placeholder="Email Address" id="email" name="email" required data-validation-required-message="Please enter your email address.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        
                        <br>
                        <div id="success"></div>
                        <div class="row">
                            <div class="form-group col-xs-12">
                                <button type="submit" class="btn btn-success btn-lg">Send</button>
                            </div>
                        </div>
                    </form>

                <?php //endif; ?>
            </div>
            </div>

            

          
        </div>
    </section>

  

    <!-- Footer -->
    <footer class="text-center">
        
        <div class="footer-below">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        Copyright &copy; <?php echo date('Y'); ?> Belle Guppy. <span class="powered-by">Premium Website Design and Hosting by <a href="https://www.burzware.com" title="Burzware - Empower Your Futureproof Lovemark!">Burzware&trade;</a>.</span>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-top page-scroll hidden-sm hidden-xs hidden-lg hidden-md">
        <a class="btn btn-primary" href="#page-top">
            <i class="fa fa-chevron-up"></i>
        </a>
    </div>




    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="../js/jqBootstrapValidation.js"></script>
 

    <!-- Theme JavaScript -->
    <script src="../js/freelancer.min.js"></script>

</body>

</html>
