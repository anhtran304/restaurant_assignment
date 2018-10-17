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
    <title>Swap - Money Transfer | Enquire</title>
    <script src="scripts/part2.js"></script>
</head>
<body>
    <header class="header">
        <div class="header__logo-box">
            <img class="header__logo" src="images/logo.png" alt="Logo"/>
        </div>
        <nav>
            <ul>
                <li>
                    <a href="index.html">Home</a>
                </li>
                <li>
                    <a href="product.html">Products</a>
                </li>
                <li>
                    <a href="enquire.html">Enquire</a>
                </li>
                <li>
                    <a href="enhancements2.html">Enhancements</a>
                </li>
                <li>
                    <a href="about.html">About</a>
                </li>
            </ul>
        </nav>
    </header>
    <!-- Finsih header -->
    <section class="section__enquire">
        <div class="u-text-center u-margin-bottom-4">
            <h2 class="heading-secondary heading-border">
                Enquire
            </h2>
        </div>
        <!-- <form method="post" action="http://mercury.swin.edu.au/it000000/formtest.php"> -->
        <form id="enquireForm" method="post" action="payment.html">
        <!--Note we have to use a special escape character to print an apostrophe on the Web page -->
        <fieldset class="u-margin-bottom-4">
            <legend class="heading-third">Your details</legend>
            <span>
                <label for="firstname">First Name</label> 
                <input type="text" name= "firstname" id="firstname" maxlength="25" pattern="^[a-zA-Z]+$" required="required"/>
            </span>
            <span>
                <label for="lastname">Last Name</label> 
                <input type="text" name= "lastname" id="lastname" maxlength="25" pattern="^[a-zA-Z]+$" required="required"/>
            </span>
            <span>
                <label for="phone">Phone</label> 
                <input type="text" name= "phone" id="phone" pattern="^[0-9]{10}$" placeholder="04xx xxx xxx"/>
            </span>
            <span>
                <label for="email">Email</label> 
                <input id="email" type="email" name= "email" required="required"/>
            </span>
        </fieldset>
        <fieldset class="u-margin-bottom-4">
            <legend class="heading-third">Your address</legend>
            <span>
                <label for="street">Street</label> 
                <input type="text" name= "street" id="street" maxlength="40" required="required"/>
            </span>
            <span>
                <label for="suburb">Suburb</label> 
                <input type="text" name= "suburb" id="suburb" maxlength="20" required="required"/>
            </span>
            <span class="section__enquire__select">
                <label for="state">State</label>
                <select name="state" id="state" required="required">
                    <option value="">Please Select</option>
                    <option value="nsw">NSW</option>
                    <option value="vic">VIC</option>
                    <option value="atc">ATC</option>
                    <option value="qld">QLD</option>
                    <option value="sa">SA</option>
                    <option value="wa">WA</option>
                    <option value="nt">NT</option>
                    <option value="tas">TAS</option>
                </select>
            </span>
            <span>
                <label for="postcode">Postcode</label> 
                <input type="text" name= "postcode" id="postcode" pattern="^[0-9]{4}$" required="required"/>
            </span>
        </fieldset>
        <fieldset class="u-margin-bottom-4">
            <legend class="heading-third">Money Transfer</legend>
            <span>
                <label for="transferAmount">Transfer Amount - AUD</label>
                <input id="transferAmount" type="text" name="transferAmount"/>
            </span>
            <span class="section__enquire__select">
                <label for="country">Transfer to Country</label>
                <select name="country" id="country" required="required">
                    <option value="">Select country</option>
                    <option value="vietnam" selected="selected">Vietnam</option>
                    <option value="canada">Canada</option>
                    <option value="india">India</option>
                    <option value="uk">UK</option>
                </select>
            </span>
            <span>
                <label id="lable_recievedAmount" for="recievedAmount">Recieved Amount</label>
                <input id="recievedAmount" type="text" name="recievedAmount"/>
            </span>
            <span>
                <label for="banktopickup"><input type="radio" id="banktopickup" name="service" value="banktopickup" required="required" checked="checked"/>Bank to Pick up</label>
                <label for="banktobank"><input type="radio" id="banktobank" name="service" value="banktobank"/>Bank to Bank</label>
                <label for="banktohome"><input type="radio" id="banktohome" name="service" value="banktohome" />Bank to Home</label>
            </span>
            <span>
                <label>Fees - AUD</label>
                <label id="fees">6</label>
            </span>
        </fieldset>
        <fieldset id="recievedAddressField" class="u-margin-bottom-4">
            <legend class="heading-third">Reciever details</legend>
            <span>
                <label for="recievedName">Name</label>
                <input type="text" name="recievedName" id="recievedName"/>
            </span>
            <span>
                <label for="recievedPhone">Phone</label>
                <input type="text" name="recievedPhone" id="recievedPhone" pattern="^[0-9]{10}$"/>
            </span>
            <span>
                <label for="recievedAddress">Address</label>
                <input type="text" name="recievedAddress" id="recievedAddress"/>
            </span>
            <span>
                <label for="recievedCity">City</label>
                <input type="text" name="recievedAddress" id="recievedCity"/>
            </span>
        </fieldset>
        <fieldset id="recievedBankField" class="u-margin-bottom-4">
            <legend class="heading-third">Reciever Bank details</legend>
            <span>
                <label for="recievedBankAcount">Account Number</label>
                <input type="text" name="recievedBankAcount" id="recievedBankAcount" pattern="[0-9]+"/>
            </span>
            <span>
                <label for="recievedAccountName">Account Name</label>
                <input type="text" name="recievedAccountName" id="recievedAccountName"/>
            </span>
            <span>
                <label for="recievedBankName">Bank Name</label>
                <input type="text" name="recievedBankName" id="recievedBankName" />
            </span>
        </fieldset>
        <fieldset class="u-margin-bottom-4">
            <legend class="heading-third">Notes</legend>
            <span>
                <label for="comments">Comments</label> 
                <textarea placeholder="Your comments..." id="comments" name="comments" rows="6" cols="40"></textarea>
            </span>
        </fieldset>
        <p class="u-margin-bottom-4 u-text-center display-flex">
            <!-- <span class="btn btn__bold btn__success u-margin-right-2"><a href="">Transfer Now</a></span> -->
            <input id="submitButton" class="btn btn__bold btn__success u-margin-right-2" type="submit" value="Transfer Now"/>
            <input class="btn" type="reset" value="Reset"/>
        </p>
        </form>
    </section>
    <!-- Finish section -->
    <footer class="footer u-text-center">
        <span>
            <small><a href="mailto:tranmr@gmail.com">Mark up by: Anh Tran</a></small>
        </span>
        <span>
            <small><a href="https://www.swinburne.edu.au">&#169; Swinburne University of Technology</a></small>
        </span>
    </footer>
    <!-- Finsih footer -->
</body>
</html>