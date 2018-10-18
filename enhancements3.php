<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="description" content="Demonstrates some basic HTML content elements" />
    <meta name="keywords" content="HTML5, CSS, JavaScript" />
    <meta name="author" content="Anh Tran" />
    <link href="https://fonts.googleapis.com/css?family=Lat%7COpen+Sans:100,300,400,700,900" rel="stylesheet" />
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ"
        crossorigin="anonymous" /> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="styles/style.css" />
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
                Fetching data live
            </h2>
            <div class="u-margin-bottom-4">
                <p class="u-margin-bottom-4">Fetching data live from outernal source by JavaScript Promise as below. Using in: <a href="enquire.html">Enquire.html</a></p>
                <img class="fetching" src="images/fetching.png" alt="Fetching Image" />
            </div>
        </div>
        <div class="u-text-center u-margin-bottom-4">
            <h2 class="heading-secondary heading-border u-margin-bottom-4">
                Data two-way binding
            </h2>
            <p class="u-margin-bottom-4">
                I built a Data two-way binding by adding two function to handle the transfer amount input and recieved amount input. When the input have onchange event, it will trigger the handle function and update the other field in update function. Using in: <a href="enquire.html">Enquire.html</a>
                <img class="binding" src="images/binding.png" alt="Binding Image" />
            </p>
        </div>
        <div class="u-text-center u-margin-bottom-4">
            <h2 class="heading-secondary heading-border u-margin-bottom-4">
                Store JSON data into session storage
            </h2>
            <p class="u-margin-bottom-4">
                I used JSON.stringify tp change JSON into string then store it into session storage. When retrieving data from session storage, I used JSON.parse to parse string back to JSON data. By doing that, I can store more data and easier to use it as a parameters. Using in: <a href="enquire.html">Enquire.html</a>
                <img class="json" src="images/JSON.png" alt="JSON Image" />
            </p>
        </div>
    </section>

    <!-- Footer -->
    <?php 
        include_once ("includes/footer.inc");
    ?>
    <!-- Finsih footer -->
</body>

</html>