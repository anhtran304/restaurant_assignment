<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="description" content="Demonstrates some basic HTML content elements" />
    <meta name="keywords" content="HTML5, CSS, JavaScript" />
    <meta name="author" content="Anh Tran" />
    <link href="https://fonts.googleapis.com/css?family=Lat%7COpen+Sans:100,300,400,700,900" rel="stylesheet" />
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous"/> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="styles/style.css"/>
    <title>Swap - Money Transfer | Enhancements</title>
</head>
<body>
    <!-- Header -->
    <?php
        include_once ("includes/header.inc");
    ?>
    <section class="section__enquire">
        <div class="u-text-center u-margin-bottom-4">
            <h2 class="heading-secondary heading-border u-margin-bottom-4">
                Animation
            </h2>
            <div class="u-margin-bottom-4">
                <span class="heading-primary--main">Primary</span>
                <span class="heading-primary--sub">Sub</span>
                <p class="u-margin-bottom-4">Animation is built on heading by CSS Animation keyframes as below</p>
                <img class="animation" src="images/animation.jpg" alt="Animation"/>
            </div>
        </div>
        <div class="u-text-center u-margin-bottom-4">
            <h2 class="heading-secondary heading-border u-margin-bottom-4">
                Responsive
            </h2>
            <p class="u-margin-bottom-4">
                I built a Responsive grid base on calc function in SASS. I calculate the width base on 100% width screen then minus the gutter between every collum, which is base on the font size of screen. In order to center the element, I used CSS "margin: 0 auto". Based on the way screen divided, the col is named "col-1-of-" as below.
            </p>
            <div class="grid-test"> 
                <div class="row">
                    <div class="col-1-of-2">
                        Col 1 of 2
                    </div>
                    <div class="col-1-of-2">
                        Another Col 1 of 2
                    </div>
                </div>

                <div class="row">
                    <div class="col-1-of-3">
                        Col 1 of 3
                    </div>
                    <div class="col-1-of-3">
                        Another Col 1 of 3
                    </div>
                    <div class="col-1-of-3">
                        Another Col 1 of 3
                    </div>
                </div>

                <div class="row">
                    <div class="col-1-of-3">
                        Col 1 of 3
                    </div>
                    <div class="col-2-of-3">
                        Another Col 2 of 3
                    </div>
                </div>

                <div class="row">
                    <div class="col-1-of-4">
                        Col 1 of 4
                    </div>
                    <div class="col-1-of-4">
                        Col 1 of 4
                    </div>
                    <div class="col-1-of-4">
                        Col 1 of 4
                    </div>
                    <div class="col-1-of-4">
                        Col 1 of 4
                    </div>
                </div>

                <div class="row">
                    <div class="col-1-of-4">
                        Col 1 of 4
                    </div>
                    <div class="col-1-of-4">
                        Col 1 of 4
                    </div>
                    <div class="col-2-of-4">
                        Col 2 of 4
                    </div>
                </div>

                <div class="row">
                    <div class="col-1-of-4">
                        Col 1 of 4
                    </div>
                    <div class="col-3-of-4">
                        Another Col 3 of 4
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer -->
    <?php 
        include_once ("includes/footer.inc");
    ?>
    <!-- Finsih footer -->
</body>
</html>