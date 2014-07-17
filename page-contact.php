<?php
/*
 Template Name: Contact Template
*/
?>
<?php get_header(); ?>

<div class="container">
    <div class="home-left">
        <section class="panel panel-contact">
            <div class="panel__inner panel-contact__inner">
                <h2>Get in Touch</h2>

                <p>Whether you'd like to request a free quote or ask a question, please don't hesitate to get in touch</p>

                <div class="row">
                    <div class="form-half">
                        <input type="text" name="name" value="" placeholder="Name">
                    </div>

                    <div class="form-half">
                        <input type="text" name="email" value="" placeholder="Email">
                    </div>

                    <div class="form-full">
                        <p>
                            <textarea name="describeJob" cols="45" rows="4" placeholder="How can we help?">
                            </textarea></p><button class="btn btn-lg btn-success" type="button"><i class="fa fa-hand-o-right"></i> Send Your Message</button>
                    </div>
                </div>
            </div>
        </section>

        <section class="panel panel-testimonials">
            <div class="panel__inner panel-testimonials__inner">
                <h2>Testimonials</h2>

                <div>
                    <div class="panel-testimonials__block">
                        <i class="fa fa-quote-left fa-2x pull-left"></i>

                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

                        <p class="panel-testimonials__author">James Blunt, <span>Bournemouth</span></p>
                    </div>

                    <div class="panel-testimonials__block">
                        <i class="fa fa-quote-left fa-2x pull-left"></i>

                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

                        <p class="panel-testimonials__author">James Blunt, <span>Bournemouth</span></p>
                    </div>

                    <div class="panel-testimonials__block">
                        <i class="fa fa-quote-left fa-2x pull-left"></i>

                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

                        <p class="panel-testimonials__author">James Blunt, <span>Bournemouth</span></p>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div class="home-right">
        <div id="sidebar">
            <div class="panel__inner sidebar__inner">
                <div class="sidebar__block">
                    <h3>Our location</h3>

                    <div class="google-maps">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d10103.2539158264!2d-1.791201999999985!3d50.723399449999896!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNTDCsDQzJzI0LjIiTiAxwrA0NycyOC4zIlc!5e0!3m2!1sen!2suk!4v1404864017291" width="400" height="300" frameborder="0" style="border:0"></iframe>
                    </div>

                    <address>
                        5 Seacote, 6 Warren Edge Rd,<br>
                        Bournemouth,<br>
                        BH6 4AU
                    </address>
                </div>

                <div class="sidebar__block">
                    <h3>Our services</h3>

                    <ul class="fa-ul">
                        <li><i class="fa-li fa fa-check-square-o"></i> Immersion heaters</li>

                        <li><i class="fa-li fa fa-check-square-o"></i> Leaks</li>

                        <li><i class="fa-li fa fa-check-square-o"></i> Waste disposals</li>

                        <li><i class="fa-li fa fa-check-square-o"></i> Water tank installs</li>

                        <li><i class="fa-li fa fa-check-square-o"></i> Burst pipes</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>