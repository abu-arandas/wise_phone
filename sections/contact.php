<section class="contact" id="contact">
    <div class="container">
        <div class="title"><h3>Contact</h3></div>
        <div class="row">
            <div class="col-md-12">
                <form id="contactForm" action="php/contact.php">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" class="form-control"
                                    id="name" name="name" placeholder="Your Name"
                                    required data-error="Please enter your name">
                                <div class="help-block with-errors"></div>
                            </div>                                 
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" class="form-control"
                                    id="email" name="email" placeholder="Your Email"
                                    required data-error="Please enter your Email">
                                <div class="help-block with-errors"></div>
                            </div> 
                        </div>
                        <div class="col-md-12">
                            <div class="form-group"> 
                                <textarea class="form-control" id="message" name="message" placeholder="Your Message" rows="4" data-error="Write your message" required></textarea>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="submit-button text-center">
                                <button class="btn custome-fill-btn" id="contact" type="submit">Send Message</button>
                                <div id="msgSubmit" class="h3 text-center hidden"></div> 
                                <div class="clearfix"></div> 
                            </div>
                        </div>
                    </div>            
                </form>
            </div>
        </div>
    </div>
</section>