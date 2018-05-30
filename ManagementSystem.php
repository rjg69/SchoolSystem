<!DOCTYPE html>
<?php
require_once('HeaderLayout.php');
?>
<body>
<?php
require_once('Navigation.php');
?>
<br />
        <p>From the list above, select the data type with which you plan to work and follow the instructions on the subsequent page.</p>

        <br/>
        <h2><center><u>Home Page</u></center></h2>
        <hr width = "75%">
        <!--
            Carousel Code
        -->
        <div class="container" align = "center">
            <h2 align = "center">Student Highlights</h2>
            <div id="myCarousel" class="carousel slide" data-ride="carousel" align = "center">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner" align = "center">
                    <div class="item active">
                        <img height = '100%' src="StudentPhotos\Admiral Akbar.jpg">
                    </div>

                    <div class="item">
                        <img height = '100%' src="StudentPhotos\Chewbacca.jpg">
                    </div>

                    <div class="item">
                        <img height = '100%' src="StudentPhotos\Darth Maul.jpg">
                    </div>
                </div>

                <!-- Left and right controls -->
                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>


        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <h2><center><u>OWL Carousel</u></center></h2>
        <br />
        <br />
        <br />

        <div class="owl-carousel">
            <div class="item">
                    <img style="left: 25%; width: 100%; padding-left: 100px;" src = "StudentPhotos\Luke Skywalker.jpg"><i class="fa fa-play" aria-hidden="true"></i>
            </div>
            <div class="item">
                    <img style="left: 25%; width: 100%; padding-left: 100px;" src = "StudentPhotos\Yoda.jpg"><i class="fa fa-play" aria-hidden="true"></i>
            </div>
            <div class="item">
                    <img style="left: 25%; width: 100%; padding-left: 100px;" src = "StudentPhotos\Admiral Akbar.jpg"><i class="fa fa-newspaper-o" aria-hidden="true"></i>
            </div>
            <div class="item">
                    <img style="left: 25%; width: 100%; padding-left: 100px;" src = "StudentPhotos\Chewbacca.jpg"><i class="fa fa-play" aria-hidden="true"></i>
            </div>
            <div class="item">
                    <img style="left: 25%; width: 100%; padding-left: 100px;" src = "StudentPhotos\Darth Maul.jpg"><i class="fa fa-newspaper-o" aria-hidden="true"></i>
            </div>
        </div>

        <script type = "text/javascript">
            $('.owl-carousel').owlCarousel({
                autoplay: true,
                autoplayHoverPause: true,
                loop: true,
                margin: 20,
                responsiveClass: true,
                nav: true,
                loop: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    500: {
                        items: 2
                    },
                    800: {
                        items: 3
                    }
                }
            });
        </script>
<br />
<br />
<br />
<br />
<br />
<br />
<br />
</body>

</html>