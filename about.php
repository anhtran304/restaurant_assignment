<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="description" content="Demonstrates some basic HTML content elements" />
    <meta name="keywords" content="HTML5, CSS, JavaScript" />
    <meta name="author" content="Anh Tran" />
    <link href="https://fonts.googleapis.com/css?family=Lato%7COpen+Sans:100,300,400,700,900" rel="stylesheet" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="styles/style.css"/>
    <title>Swap - Money Transfer | About</title>
</head>
<body>
    <!-- Header -->
    <?php
        include_once ("includes/header.inc");
    ?>
    <section class="section__enquire">
        <div class="u-text-center">
            <h2 class="heading-secondary heading-border">
                About
            </h2>
            <div class="breadcrumb u-margin-top-1">
                <a href="#details">Details</a>  
                <a href="#timetable">Timetable</a>  
                <a href="#education">Education</a>  
                <a href="#reflection">Reflection</a>  
            </div>
            <fieldset id="details" class="about__details u-margin-top-4 u-margin-bottom-4">
                <legend class="heading-third">Details</legend>
                <div class="about__details__left">
                    <div>
                        <p>First name</p>
                        <p>Anh</p>
                    </div>
                    <div>
                        <p>Last name</p>
                        <p>Tran</p>    
                    </div>
                    <div>
                        <p>Email</p>
                        <a href="mailto:tranmr@gmail.com">tranmr@gmail.com</a>
                    </div>
                </div>
                <div class="about__details__right">
                    <img class="about__details__avatar" src="images/avatar.jpg" alt="Picture"/>
                </div>
            </fieldset>

            <fieldset id="timetable" class="about__details u-margin-top-4 u-margin-bottom-4">
                <legend class="heading-third">Timetable</legend>
                    <table>
                        <tr>
                            <th scope="col">Class</th>
                            <th scope="col">Time - Room</th>
                        </tr>
                        <tbody>
                        <tr>
                        <th scope="row">
                            <i class="fa fa-book"></i>Lecture
                        </th>
                        <td>12.30 - 2.30 EN313</td>
                        </tr>
                        <tr>
                        <th scope="row">
                            <i class="fa fa-magic"></i>Lab
                        </th>
                        <td>2.30 - 4.30 BA604</td>
                        </tr>
                        </tbody>
                    </table>
            </fieldset>

            <fieldset id="education" class="about__details u-margin-top-4 u-margin-bottom-4">
                <legend class="heading-third">Education</legend>
                <dl class="u-margin-bottom-2">
                    <dt>Master of Information Technology</dt>
                        <dd>Feb 2018 - Current</dd>
                    <dt>Master of Business Administration</dt>
                        <dd>Sep 2010 - Dec 2011</dd>
                    <dt>BSc in Engineering</dt>
                        <dd>Aug 2004 - July 2009</dd>
                </dl> 
            </fieldset>

            <fieldset id="reflection" class="about__details u-margin-top-4 u-margin-bottom-4">
                <legend class="heading-third">Reflection</legend>
                <p class="reflextion">
                I have been learning about the use of HTML to marking up the web pages. Along the way, I learn how to apply my analysis skills and use it in my assignment to determine how do I design the website, and connect everything together. I also learn how to use CSS to present website better. My assignment is a website for money transfer, I apply my skill set from design stage until this point. However, I can see that a lot of learning need to be done more in order to catch up with the real world. I get the ideal from the lecture and lab, and sometimes try to find more relevant information around that issue that I came across, but I did not have enough time to go deeper in the issue. In order to improve it, I believed it will be better for me to put more quiz questions after finishing lab class. I also think it could be an idea to make the other website based on whatever I learn. I hope to see my knowledge get improved in the next reflection.                </p>
            </fieldset>
        </div>
    </section>
    <!-- Finsh main -->
    <!-- Footer -->
    <?php 
        include_once ("includes/footer.inc");
    ?>
    <!-- Finsih footer -->
</body>
</html>