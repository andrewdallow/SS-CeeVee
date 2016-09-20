<!-- About Section
================================================== -->
<section id="about">

    <div class="row">

        <div class="three columns">

            <img class="profile-pic"  src="$Portrait.SetSize(120, 120).URL" alt="" />

        </div>

        <div class="nine columns main-col">

            <h2>About Me</h2>

            $Biography

            <div class="row">

                <div class="columns contact-details">

                    <h2>Contact Details</h2>
                    <p class="address">
                        <span>$Name</span><br>
                        <span>$PostalAddress<br>
                            $PostalCity<br> 
                            $PostalRegion $PostalCode, $PostalCountry
                        </span><br>
                        <span>$PhoneContact</span><br>
                        <span>$Email</span>
                    </p>

                </div>

                <div class="columns download">
                    <p>
                        <a href="$Resume.URL" class="button"><i class="fa fa-download"></i>Download Resume</a>
                    </p>
                </div>

            </div> <!-- end row -->

        </div> <!-- end .main-col -->

    </div>

</section> <!-- About Section End-->


<!-- Resume Section
================================================== -->
<section id="resume">

    <!-- Education
    ----------------------------------------------- -->
    <% if $getEducation %>
    <div class="row education">

        <div class="three columns header-col">
            <h1><span>Education</span></h1>
        </div>

        <div class="nine columns main-col">
            <% loop $getEducation %>
            <div class="row item">

                <div class="twelve columns">

                    <h3>$Institution</h3>
                        <p class="info">$Qualification <span>&bull;</span> <em class="date">$QualificationDate.Month $QualificationDate.Year</em></p>

                    $QualificationDescrp

                </div>

            </div>
            <% end_loop %>
            <!-- item end -->


        </div> <!-- main-col end -->

    </div>
    <% end_if %>
    <!-- End Education -->


    <!-- Work
    ----------------------------------------------- -->
    <% if $getWork %>
    <div class="row work">

        <div class="three columns header-col">
            <h1><span>Work</span></h1>
        </div>

        <div class="nine columns main-col">
            <% loop $getWork %>
            <div class="row item">

                <div class="twelve columns">

                    <h3>$Company</h3>
                    <p class="info">$Position <span>&bull;</span> 
                        <em class="date">
                            $StartDate.Month $StartDate.Year - <% if $PresentDay %> Present <% else %> $EndDate.Month $EndDate.Year <% end_if %>
                        </em>
                    </p>

                    $JobDescrp

                </div>

            </div> 
            <% end_loop %>
            <!-- item end -->            

        </div> <!-- main-col end -->

    </div> 
    <% end_if %>
    <!-- End Work -->


    <!-- Skills
    ----------------------------------------------- -->
    <% if $getSkills %>
    <div class="row skill">

        <div class="three columns header-col">
            <h1><span>Skills</span></h1>
        </div>

        <div class="nine columns main-col">

            $SkillsIntro

            <div class="bars">

                <ul class="skills">
                    <% loop $getSkills(10) %>
                    <li><span class="bar-expand" style="width:$Rating%"></span><em>$SkillName</em></li>
                    <% end_loop %>
                </ul>

            </div><!-- end skill-bars -->

        </div> <!-- main-col end -->

    </div> 
    <% end_if %>
    <!-- End skills -->

</section> <!-- Resume Section End-->


<!-- Portfolio Section
================================================== -->
<% if $getPortfolio %>
<section id="portfolio">

    <div class="row">

        <div class="twelve columns collapsed">

            <h1>$PortfolioTitle</h1>

            <!-- portfolio-wrapper -->
            <div id="portfolio-wrapper" class="bgrid-quarters s-bgrid-thirds cf">
                <% loop $getPortfolio %>
                <div class="columns portfolio-item">
                    <div class="item-wrap">

                        <a href="#modal-$Pos" title="">
                            <img alt="" src="$Photo.croppedImage(800,800).URL">
                            <div class="overlay">
                                <div class="portfolio-item-meta">
                                    <h5>$Title</h5>
                                    <p>$Subtitle</p>
                                </div>
                            </div>
                            <div class="link-icon"><i class="icon-plus"></i></div>
                        </a>

                    </div>
                </div> 
                <% end_loop %>
                <!-- item end -->                

            </div> <!-- portfolio-wrapper end -->

        </div> <!-- twelve columns end -->


        <!-- Modal Popup
             --------------------------------------------------------------- -->
        <% loop $getPortfolio %>
        <div id="modal-$Pos" class="popup-modal mfp-hide">

            <img class="scale-with-grid" src="$Photo.setSize(1050,700).URL" alt="" />

            <div class="description-box">
                <h4>$Title</h4>
                <p>$Description</p>
                <span class="categories"><i class="fa fa-tag"></i>$Tags</span>
            </div>

            <div class="link-box">
                <a href="$Website">Details</a>
                <a class="popup-modal-dismiss">Close</a>
            </div>

        </div>
        <% end_loop %>
        <!-- modal-01 End -->




    </div> <!-- row End -->

</section> 
<% end_if %>
<!-- Portfolio Section End-->





<!-- Testimonials Section
================================================== -->
<% if $getTestimonials %>
<section id="testimonials" >

    <div class="text-container">

        <div class="row">

            <div class="two columns header-col">

                <h1><span>Client Testimonials</span></h1>

            </div>

            <div class="ten columns flex-container">

                <div class="flexslider">

                    <ul class="slides">
                        
                        <% loop $getTestimonials %>
                        <li>
                            <blockquote>
                                <p>$Testimonial</p>
                                <cite>$Name</cite>
                            </blockquote>
                        </li> 
                        <% end_loop %>
                        <!-- slide ends -->

                        

                    </ul>

                </div> <!-- div.flexslider ends -->

            </div> <!-- div.flex-container ends -->

        </div> <!-- row ends -->

    </div>  <!-- text-container ends -->

</section> 
<% end_if %>
<!-- Testimonials Section End-->


<!-- Contact Section
================================================== -->
<section id="contact">

    <div class="row section-head">

        <div class="two columns header-col">

            <h1><span>Get In Touch.</span></h1>

        </div>

        <div class="ten columns">

            <p class="lead">$ContactIntro
            </p>

        </div>

    </div>

    <div class="row">

        <div class="eight columns">

            <!-- form -->
            <form action="" method="post" id="contactForm" name="contactForm">
                <fieldset>

                    <div>
                        <label for="contactName">Name <span class="required">*</span></label>
                        <input type="text" value="" size="35" id="contactName" name="contactName">
                    </div>

                    <div>
                        <label for="contactEmail">Email <span class="required">*</span></label>
                        <input type="text" value="" size="35" id="contactEmail" name="contactEmail">
                    </div>

                    <div>
                        <label for="contactSubject">Subject</label>
                        <input type="text" value="" size="35" id="contactSubject" name="contactSubject">
                    </div>

                    <div>
                        <label for="contactMessage">Message <span class="required">*</span></label>
                        <textarea cols="50" rows="15" id="contactMessage" name="contactMessage"></textarea>
                    </div>

                    <div>
                        <button class="submit">Submit</button>
                        <span id="image-loader">
                            <img alt="" src="$ThemeDir/images/loader.gif">
                        </span>
                    </div>

                </fieldset>
            </form> <!-- Form End -->

            <!-- contact-warning -->
            <div id="message-warning"> Error boy</div>
            <!-- contact-success -->
            <div id="message-success">
                <i class="fa fa-check"></i>Your message was sent, thank you!<br>
            </div>

        </div>


        <aside class="four columns footer-widgets">

            <div class="widget widget_contact">

                <h4>Address and Phone</h4>
                <p class="address">
                        <span>$Name</span><br>
                        <span>$PostalAddress<br>
                            $PostalCity<br> 
                            $PostalRegion $PostalCode, $PostalCountry
                        </span><br>
                        <span>$PhoneContact</span><br>
                        <span>$Email</span>
                </p>

            </div>

            

        </aside>

    </div>

</section> <!-- Contact Section End-->






