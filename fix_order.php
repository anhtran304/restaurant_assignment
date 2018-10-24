<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="description" content="Demonstrates Web developing" />
    <meta name="keywords" content="HTML5, CSS, JavaScript, PHP" />
    <meta name="author" content="Anh Tran" />
    <link href="https://fonts.googleapis.com/css?family=Lato%7COpen+Sans:100,300,400,700,900" rel="stylesheet" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="styles/style.css"/>
    <title>Swap - Money Transfer | Fix Order</title>
    <!-- <script src="scripts/fix_order.js"></script> -->
</head>
<body>
    <!-- Header -->
    <?php
    /* Author: Anh Tran - 101953626
    * Target: enquire.php
    * Purpose: PHP used to process order from 'enquire.php'
    * Created: 12/09/2018
    * Last updated: 12/10/2018
    * Credits: 
    */
        include_once ("includes/header.inc");
    ?>
    <!-- Finsih header -->
    <!-- PHP section for GET query string -->
    <?php
        // Clean up data
        function sanitise_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        $result = true;
        if (!isset($_GET["firstname"])) {
        $result = false;
        } else {
        $firstname = sanitise_input($_GET["firstname"]);
        }
        if (!isset($_GET["lastname"])) {
        $result = false;
        } else {
        $lastname = sanitise_input($_GET["lastname"]);
        }
        if (!isset($_GET["err_msg"])) {
        $result = false;
        } else {
        $err_msg = utf8_decode(urldecode($_GET["err_msg"]));
        }
        if (!isset($_GET["phone"])) {
        $result = false;
        } else {
        $phone = sanitise_input($_GET["phone"]);
        }
        if (!isset($_GET["email"])) {
        $result = false;
        } else {
        $email = sanitise_input($_GET["email"]);
        }
        if (!isset($_GET["street"])) {
        $result = false;
        } else {
        $street = utf8_decode(urldecode(sanitise_input($_GET["street"])));
        }
        if (!isset($_GET["suburb"])) {
        $result = false;
        } else {
        $suburb = sanitise_input($_GET["suburb"]);
        }
        if (!isset($_GET["postcode"])) {
        $result = false;
        } else {
        $postcode = sanitise_input($_GET["postcode"]);
        }
        if (!isset($_GET["transfer_amount"])) {
        $result = false;
        } else {
        $transfer_amount = sanitise_input($_GET["transfer_amount"]);
        }
        if (!isset($_GET["recieved_amount"])) {
        $result = false;
        } else {
        $recieved_amount = sanitise_input($_GET["recieved_amount"]);
        }
        if (!isset($_GET["fees"])) {
        $result = false;
        } else {
        $fees = sanitise_input($_GET["fees"]);
        }
        if (!isset($_GET["comment"])) {
        $result = false;
        } else {
        $comment = utf8_decode(urldecode(sanitise_input($_GET["comment"])));
        }
        if (!isset($_GET["recieved_phone"])) {
        $result = false;
        } else {
        $recieved_phone = sanitise_input($_GET["recieved_phone"]);
        }
        if (!isset($_GET["recieved_name"])) {
        $result = false;
        } else {
        $recieved_name = utf8_decode(urldecode(sanitise_input($_GET["recieved_name"])));
        }
        if (!isset($_GET["recieved_address"])) {
        $result = false;
        } else {
        $recieved_address = utf8_decode(urldecode(sanitise_input($_GET["recieved_address"])));
        }
        if (!isset($_GET["recieved_city"])) {
        $result = false;
        } else {
        $recieved_city = utf8_decode(urldecode(sanitise_input($_GET["recieved_city"])));
        }
        if (!isset($_GET["recieved_bank_acount"])) {
        $result = false;
        } else {
        $recieved_bank_acount = sanitise_input($_GET["recieved_bank_acount"]);
        }
        if (!isset($_GET["state"])) {
        $result = false;
        } else {
        $state = sanitise_input($_GET["state"]);
        }
        if (!isset($_GET["country"])) {
        $result = false;
        } else {
        $country = sanitise_input($_GET["country"]);
        }
        if (!isset($_GET["service_choice"])) {
        $result = false;
        } else {
        $service_choice = sanitise_input($_GET["service_choice"]);
        }
        if (!isset($_GET["recieved_city"])) {
        $result = false;
        } else {
        $recieved_city = utf8_decode(urldecode(sanitise_input($_GET["recieved_city"])));
        }
        if (!isset($_GET["recieved_account_name"])) {
        $result = false;
        } else {
        $recieved_account_name = utf8_decode(urldecode(sanitise_input($_GET["recieved_account_name"])));
        }
        if (!isset($_GET["recieved_bank_name"])) {
        $result = false;
        } else {
        $recieved_bank_name = utf8_decode(urldecode(sanitise_input($_GET["recieved_bank_name"])));
        }
        // Forward to enquire.php if directly access from URL
        if (!$result) {
            header('Location: enquire.php');
        }
    ?>	
    <!-- Finish PHP section for GET query string -->
    <!-- Section in HTML with PHP echo depend on values -->
    <section class="section__enquire">
        <div class="u-text-center u-margin-bottom-4">
            <h2 class="heading-secondary heading-border">
                Fix Order
            </h2>
        </div>
        <!-- Error section -->
        <fieldset class="u-margin-bottom-4">
            <legend class="heading-third">Errors</legend>
            <?php 
                echo "<div class='error-message'>$err_msg</div>";
            ?>
        </fieldset>
        <form id="enquireForm" method="post" action="process_order.php" novalidate="novalidate">
        <!--Note we have to use a special escape character to print an apostrophe on the Web page -->
        <!-- Detail section -->
        <fieldset class="u-margin-bottom-4">
            <legend class="heading-third">Your details</legend>
            <span>
                <label for="firstname">First Name</label> 
                <?php 
                    echo "<input type='text' name= 'firstname' id='firstname' value=$firstname>";
                ?>
            </span>
            <span>
                <label for="lastname">Last Name</label>
                <?php 
                    echo "<input type='text' name= 'lastname' id='lastname' value=$lastname>";
                ?> 
            </span>
            <span>
                <label for="phone">Phone</label>
                <?php 
                    echo "<input type='text' name= 'phone' id='phone' value=$phone>";
                ?>  
            </span>
            <span>
                <label for="email">Email</label>
                <?php 
                    echo "<input type='text' name= 'email' id='email' value=$email>";
                ?>   
            </span>
        </fieldset>
        <!-- Address section -->
        <fieldset class="u-margin-bottom-4">
            <legend class="heading-third">Your address</legend>
            <span>
                <label for="street">Street</label> 
                <?php 
                    echo "<input type='text' name= 'street' id='street' value='$street'>";
                ?> 
            </span>
            <span>
                <label for="suburb">Suburb</label>
                <?php 
                    echo "<input type='text' name= 'suburb' id='suburb' value=$suburb>";
                ?>  
            </span>
            <span class="section__enquire__select">
                <label for="state">State</label>
                <select name="state" id="state" required="required">
                    <option value="">Please Select</option>
                    <option value="nsw" <?php if ($state == 'NSW') echo ' selected="selected"'; ?>>NSW</option>
                    <option value="vic" <?php if ($state == 'VIC') echo ' selected="selected"'; ?>>VIC</option>
                    <option value="atc" <?php if ($state == 'ATC') echo ' selected="selected"'; ?>>ATC</option>
                    <option value="qld" <?php if ($state == 'QLD') echo ' selected="selected"'; ?>>QLD</option>
                    <option value="sa" <?php if ($state == 'SA') echo ' selected="selected"'; ?>>SA</option>
                    <option value="wa" <?php if ($state == 'WA') echo ' selected="selected"'; ?>>WA</option>
                    <option value="nt" <?php if ($state == 'NT') echo ' selected="selected"'; ?>>NT</option>
                    <option value="tas" <?php if ($state == 'TAS') echo ' selected="selected"'; ?>>TAS</option>
                </select>
            </span>
            <span>
                <label for="postcode">Postcode</label> 
                <?php 
                    echo "<input type='text' name= 'postcode' id='postcode' value=$postcode>";
                ?> 
            </span>
        </fieldset>
        <!-- Transfer amount section -->
        <fieldset class="u-margin-bottom-4">
            <legend class="heading-third">Money Transfer</legend>
            <span>
                <label for="transferAmount">Transfer Amount - AUD</label>
                <?php 
                    echo "<input type='text' name= 'transferAmount' id='transferAmount' value=$transfer_amount>";
                ?> 
            </span>
            <span class="section__enquire__select">
                <label for="country">Transfer to Country</label>
                <select name="country" id="country" required="required">
                    <option value="">Select country</option>
                    <option value="vietnam" <?php if ($country == 'vietnam') echo ' selected="selected"'; ?>>Vietnam</option>
                    <option value="canada" <?php if ($country == 'canada') echo ' selected="selected"'; ?>>Canada</option>
                    <option value="india" <?php if ($country == 'india') echo ' selected="selected"'; ?>>India</option>
                    <option value="uk" <?php if ($country == 'uk') echo ' selected="selected"'; ?>>UK</option>
                </select>
            </span>
            <span>
                <label id="lable_recievedAmount" for="recievedAmount">Recieved Amount</label>
                <?php 
                    echo "<input type='text' name= 'recievedAmount' id='recievedAmount' value=$recieved_amount>";
                ?> 
            </span>
            <span>
                <label for="banktopickup"><input type="radio" id="banktopickup" name="serviceChoice" value="banktopickup" <?php if ($service_choice == 'banktopickup') echo 'checked="checked"'; ?>>Bank to Pick up</label>
                <label for="banktobank"><input type="radio" id="banktobank" name="serviceChoice" value="banktobank" <?php if ($service_choice == 'banktobank') echo 'checked="checked"'; ?>>Bank to Bank</label>
                <label for="banktohome"><input type="radio" id="banktohome" name="serviceChoice" value="banktohome" <?php if ($service_choice == 'banktohome') echo 'checked="checked"'; ?>>Bank to Home</label>
            </span>
            <span>
                <label>Total pay - AUD</label>
                <?php 
                    echo "<label id='fees'>$fees</label>";
                ?> 
            </span>
        </fieldset>
        <!-- Reciever banktohome section -->
        <fieldset id="recievedAddressField" class="u-margin-bottom-4" 
            <?php 
                if ($service_choice == 'banktohome') echo 'style="visibility: visible; display: block;"'; 
                else echo 'style="visibility: hidden; display: none;"';
            ?>>
            <legend class="heading-third">Reciever details</legend>
            <span>
                <label for="recievedName">Name</label>
                <?php 
                    echo "<input type='text' name= 'recievedName' id='recievedName' value='$recieved_name'>";
                ?> 
            </span>
            <span>
                <label for="recievedPhone">Phone</label>
                <?php 
                    echo "<input type='text' name= 'recievedPhone' id='recievedPhone' value=$recieved_phone>";
                ?> 
            </span>
            <span>
                <label for="recievedAddress">Address</label>
                <?php 
                    echo "<input type='text' name= 'recievedAddress' id='recievedAddress' value='$recieved_address'>";
                ?> 
            </span>
            <span>
                <label for="recievedCity">City</label>
                <?php 
                    echo "<input type='text' name= 'recievedCity' id='recievedCity' value='$recieved_city'>";
                ?> 
            </span>
        </fieldset>
        <!-- Reciever banktobank section -->
        <fieldset id="recievedBankField" class="u-margin-bottom-4"
            <?php 
                if ($service_choice == 'banktobank') echo 'style="visibility: visible; display: block;"'; 
                else echo 'style="visibility: hidden; display: none;"';
            ?>>
            <legend class="heading-third">Reciever Bank details</legend>
            <span>
                <label for="recievedBankAcount">Account Number</label>
                <?php 
                    echo "<input type='text' name= 'recievedBankAcount' id='recievedBankAcount' value=$recieved_bank_acount>";
                ?> 
            </span>
            <span>
                <label for="recievedAccountName">Account Name</label>
                <?php 
                    echo "<input type='text' name= 'recievedAccountName' id='recievedAccountName' value='$recieved_account_name'>";
                ?> 
            </span>
            <span>
                <label for="recievedBankName">Bank Name</label>
                <?php 
                    echo "<input type='text' name= 'recievedBankName' id='recievedBankName' value='$recieved_bank_name'>";
                ?> 
            </span>
        </fieldset>
        <!-- Comment section -->
        <fieldset class="u-margin-bottom-4">
            <legend class="heading-third">Notes</legend>
            <span>
                <label for="comments">Comments</label> 
                <?php 
                    echo "<textarea id='comments' name='comments' rows='6' cols='40'>$comment</textarea>";
                ?> 
            </span>
        </fieldset>
        <!-- Credit Card section -->
        <fieldset id="payment" class="u-margin-bottom-4">
            <legend class="heading-third">Payment</legend>
            <div>
                <label>Credit card type</label>
                <label for="visa"><input type="radio" id="visa" name="cardType" value="visa"/>Visa</label>
                <label for="mastercard"><input type="radio" id="mastercard" name="cardType" value="mastercard" />Mastercard</label>
                <label for="american"><input type="radio" id="american" name="cardType" value="american" />American Express</label>
            </div>
            <div>
                <label>Name on card</label>
                <input type="text" name="nameOnCard" id="nameOnCard" />
            </div>
            <div>
                <label>Card Number</label>
                <input type="text" name="cardNumber" id="cardNumber"/>
            </div>
            <div>
                <label>Expiry Month - MM</label>
                <input type="text" name="expiryMonth" id="expiryMonth"/>
            </div>
            <div>
                <label>Expiry Year - YY</label>
                <input type="text" name="expiryYear" id="expiryYear" />
            </div>
            <div>
                <label>Verification Value (CVV)</label>
                <input type="text" name="verification" id="verification" />
            </div>
        </fieldset>
        <p class="u-margin-bottom-4 u-text-center display-flex">
            <input id="submitButton" class="btn btn__bold btn__success u-margin-right-2" type="submit" value="Transfer Now"/>
            <input class="btn" type="reset" value="Reset"/>
        </p>
        </form>
    </section>
    <!-- Finish section -->
    <!-- Footer -->
    <?php 
        include_once ("includes/footer.inc");
    ?>
    <!-- Finsih footer -->
</body>
</html>