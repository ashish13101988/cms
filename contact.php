   <?php include 'includes/db.php';?>
   <?php include 'includes/header.php'; ?>
    
    <!-- mailing system-->
    <?php
    if(isset($_POST['submit'])){
    	
    	$to = "ashish_1234@hotmail.com";
    	$subject = wordwrap($_POST['subject'],70);
    	$message = $_POST['message'];
    	$header = $_POST['email'];
    	
    	$result = mail($to,$subject,$message,$header);
    	
    	
    		}
   
    
    ?>

    <!-- Navigation -->
 
<?php include 'includes/navigation.php' ?>

         <!-- Contact Section -->

        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Contact Us</h2>
                    <h3 class="section-subheading text-muted"></h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                        <h2 class="text-center"></h2>
                        
                    <form name="sentMessage" id="contactForm" method="post">
                        
                        <div class="row">
                            <div class="col-md-6 col-lg-offset-3">
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control" placeholder="Your Name *" id="name" required data-validation-required-message="Please enter your name.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" placeholder="Your Email *" id="email" required data-validation-required-message="Please enter your email address.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="tel" name="subject" class="form-control" placeholder="Your subject *" id="phone" required data-validation-required-message="Please enter your phone number.">
                                    <p class="help-block text-danger"></p>
                                </div>
                            
                                <div class="form-group">
                                    <textarea class="form-control" name="message" placeholder="Your Message *" id="message" required data-validation-required-message="Please enter a message."></textarea>
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-lg-12 text-center">
                                <div id="success"></div>
                                <button type="submit" name="submit" class="btn btn-xl btn-primary">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        <hr>
    <!-- /.container -->
<?php include 'includes/footer.php' ?>