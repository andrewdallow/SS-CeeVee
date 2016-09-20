<header id="home" style="background: #161415 url($BannerImage.URL) no-repeat top center;">

    <% include Navigation %>

    <div class="row banner">
        <div class="banner-text">
            <h1 class="responsive-headline">$Heading</h1>
            <h3>$Content</h3>
            <hr />
            <ul class="social">
                <% if $FacebookLink %>
                <li><a href="$FacebookLink"><i class="fa fa-facebook"></i></a></li>
                <% end_if %>
                <% if $TwitterLink %>
                <li><a href="$TwitterLink"><i class="fa fa-twitter"></i></a></li>
                <% end_if %>
                <% if $GoogleLink %>
                <li><a href="$GoogleLink"><i class="fa fa-google-plus"></i></a></li>
                <% end_if %>
                <% if $LinkedInLink %>
                <li><a href="$LinkedInLink"><i class="fa fa-linkedin"></i></a></li>
                <% end_if %>
                <% if $InstagramLink %>
                <li><a href="$InstagramLink"><i class="fa fa-instagram"></i></a></li>
                <% end_if %>
                <% if $DribbbleLink %>
                <li><a href="$DribbbleLink"><i class="fa fa-dribbble"></i></a></li>
                <% end_if %>
                <% if $SkypeLink %>
                <li><a href="$SkypeLink"><i class="fa fa-skype"></i></a></li>
                <% end_if %>
            </ul>
        </div>
    </div>

    <p class="scrolldown">
        <a class="smoothscroll" href="#about"><i class="icon-down-circle"></i></a>
    </p>

</header> <!-- Header End -->

