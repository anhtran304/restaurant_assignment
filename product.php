<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="description" content="Demonstrates some basic HTML content elements" />
    <meta name="keywords" content="HTML5, CSS, JavaScript" />
    <meta name="author" content="Anh Tran" />
    <link href="https://fonts.googleapis.com/css?family=Lato%7COpen+Sans:100,300,400,700,900" rel="stylesheet" />
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous"/> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="styles/style.css"/>
    <title>Swap - Money Transfer | Products</title>
</head>
<body>
    <!-- Header -->
    <?php
        include_once ("includes/header.inc");
    ?>
    <!-- Finish header -->
    <main class="main">
        <div class="main__section">
            <section class="container">
                <div class="main__section__title">
                    <h1 class="heading-secondary heading-border u-margin-bottom-4">
                        Products
                    </h1>
                    <p>
                    Currently, money can be received in three ways: bank account, cash pickup, home delivery. The delivery options varies depending on the recipient country. In Vietnam, all three options are available. In the India, UK, Canada, only bank account and cash pickup are available. In Korea and Australia, only bank account transfer is accepted.
                    </p>
                    <p class="acknowledged u-margin-bottom-4">Acknowledged from: <a href="https://www.wirebarley.com/">Wirebarley</a></p>
                </div>
                <div class="display-flex u-margin-bottom-4">
                    <div class="main__section__body">
                        <h2 class="heading-third u-margin-left-20">
                            Banking
                        </h2>
                        <ul class="u-margin-left-20">
                            <li>Bank to Bank Deposit</li>
                            <li>Bank to Pick Up</li>
                            <li class="u-margin-bottom-2">Bank to Delivery Home</li>
                        </ul>
                        <h2 class="heading-third u-margin-left-20">
                            Cash
                        </h2>                    
                        <ol class="u-margin-left-20">
                            <li>Cash to Bank Deposit</li>
                            <li>Cash to Pick Up</li>
                            <li>Cash to Delivery Home</li>
                        </ol>
                    </div>
                    <div>
                        <img class="u-margin-right-20" src="images/chart.png" width="200" alt=""/>
                        <p class="acknowledged">Acknowledged images: <a href="https://www.garynealon.com/">Gary Nealon</a></p>
                    </div>
                </div>
            </section>
            <section class="u-margin-bottom-4">
                <div class="main__section__title">
                    <h1 class="heading-secondary heading-border u-margin-bottom-4">
                        Fees
                    </h1>
                </div>
                <div class="main__section__body">
                    <table>
                        <caption><h2 class="heading-third">Table of Transfer Fees</h2></caption>
                        <thead>
                            <tr>
                            <!-- the scope attribute assists non-visual user agents -->
                            <th rowspan="2" scope="col">Country</th>
                            <th colspan="3" scope="col">Fees</th>
                            </tr>
                            <tr>
                            <th scope="col">&#60; $1,000</th>
                            <th scope="col">$1,000 - $3,000</th>
                            <th scope="col">&#62; $3,000</th>
                            </tr>
                        </thead>
                        <tbody>
                        <tr>
                        <th scope="row">
                            <img src="images/vnd.png" alt="Vietnam"/>Vietnam
                        </th>
                        <td>$6</td>
                        <td>$13</td>
                        <td>$80</td>
                        </tr>
                        <tr>
                        <th scope="row">
                            <img src="images/cad.png" alt="Canada"/>Canada
                        </th>
                        <td>$6</td>
                        <td>$12</td>
                        <td>$70</td>
                        </tr>
                        <tr>
                        <th scope="row">
                            <img src="images/inr.png" alt="India"/>India
                        </th>
                        <td>$4</td>
                        <td>$10</td>
                        <td>$50</td>
                        </tr>
                        <tr>
                        <th scope="row">
                            <img src="images/uk.png" alt="UK"/>UK
                        </th>
                        <td>$5</td>
                        <td>$11</td>
                        <td>$70</td>
                        </tr>
                        </tbody>
                    </table>
                    <p class="acknowledged">Acknowledged images from: <a href="https://www.instarem.com/en-au/">Instarem</a></p>
                </div>
            </section>
        <!-- Finish section -->
        </div>
        <aside class="main__aside">
            <p class="u-margin-top-4">
                At Swap, we provide you Zero-Margin FX rates - mid-market rates sourced directly from Reuters, with absolutely no margins added! We also transparently display our remittance fee, and the exact amount that the recipient would receive.
                Use Swap and start saving on international money transfers. With us, your money can now <strong>#domore</strong> You can also track your desired FX rates by subscribing to our FX alerts.
            </p>
            <p class="acknowledged u-margin-bottom-4">Acknowledged from: <a href="https://www.instarem.com/en-au/">Instarem</a></p>
            <form method="post" action="http://mercury.swin.edu.au/it000000/formtest.php">
                <input  class="u-margin-bottom-2" type="email" name= "email" id="email" placeholder="Your email..." required="required"/>
                <input class="btn btn__bold" type="submit" value="Subscribe"/>
            </form>
        </aside>
        <!-- Finish aside -->
    </main>
    <!-- Finish main -->
    <!-- Footer -->
    <?php 
        include_once ("includes/footer.inc");
    ?>
    <!-- Finsih footer -->
</body>
</html>