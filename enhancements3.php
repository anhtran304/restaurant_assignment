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
                Separate Customers Table
            </h2>
            <div class="u-margin-bottom-4">
                <p class="u-margin-bottom-4">Seperate Customers Table. Using in: <a href="enquire.php">Enquire.php</a></p>
                <img class="fetching" src="images/customers_table.png" alt="Customers Table" />
            </div>
        </div>
        <div class="u-text-center u-margin-bottom-4">
            <h2 class="heading-secondary heading-border u-margin-bottom-4">
                Separate Credit Card table
            </h2>
            <p class="u-margin-bottom-4">
                Separate Credit Card table. Using in: <a href="enquire.php">Enquire.php</a>
                <img class="binding" src="images/credit_card.png" alt="Credit Card Table" />
            </p>
        </div>
        <div class="u-text-center u-margin-bottom-4">
            <h2 class="heading-secondary heading-border u-margin-bottom-4">
                Sort by heading
            </h2>
            <p class="u-margin-bottom-4">
                Sort table by click into heading. Using in: <a href="manager.php">Manager.php</a>
                <img class="json" src="images/sort.png" alt="Sort" />
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