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
    <title>Swap - Money Transfer | Receipt</title>
    <!-- <script src="scripts/fix_order.js"></script> -->
</head>
<body>
    <!-- Header -->
    <?php
        include_once ("includes/header.inc");
    ?>
    <!-- Finsih header -->
    <!-- PHP section for GET query string -->
    <?php
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
        if (!isset($_GET["order_id"])) {
        $result = false;
        } else {
        $order_id = sanitise_input($_GET["order_id"]);
        }
        if (!isset($_GET["order_status"])) {
        $result = false;
        } else {
        $order_status = sanitise_input($_GET["order_status"]);
        }
        if (!isset($_GET["card_type"])) {
        $result = false;
        } else {
        $card_type = utf8_decode(urldecode(sanitise_input($_GET["card_type"])));
        }
        if (!isset($_GET["name_on_card"])) {
        $result = false;
        } else {
        $name_on_card = utf8_decode(urldecode(sanitise_input($_GET["name_on_card"])));
        }
        if (!isset($_GET["card_number"])) {
        $result = false;
        } else {
        $card_number = str_repeat('*', (strlen($_GET["card_number"]) - 3)) . substr($_GET["card_number"], -3, 3);
        }
        if (!isset($_GET["expiry_month"])) {
        $result = false;
        } else {
        $expiry_month = sanitise_input($_GET["expiry_month"]);
        }
        if (!isset($_GET["expiry_year"])) {
        $result = false;
        } else {
        $expiry_year = sanitise_input($_GET["expiry_year"]);
        }
        if (!isset($_GET["verification"])) {
        $result = false;
        } else {
        $verification = sanitise_input($_GET["verification"]);
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
                Receipt
            </h2>
        </div>
        <form id="enquireForm" method="post" action="process_order.php" novalidate="novalidate">
        <!--Note we have to use a special escape character to print an apostrophe on the Web page -->
        <!-- Detail section -->
        <fieldset class="u-margin-bottom-4">
            <legend class="heading-third">Your details</legend>
            <span>
                <label for="firstname">First Name</label> 
                <?php 
                    echo "<label id='firstname'>$firstname</label>";
                ?>
            </span>
            <span>
                <label for="lastname">Last Name</label>
                <?php 
                    echo "<label id='lastname'>$lastname</label>";
                ?> 
            </span>
            <span>
                <label for="phone">Phone</label>
                <?php 
                    echo "<label id='phone'>$phone</label>";
                ?>  
            </span>
            <span>
                <label for="email">Email</label>
                <?php 
                    echo "<label id='email'>$email</label>";
                ?>   
            </span>
        </fieldset>
        <!-- Address section -->
        <fieldset class="u-margin-bottom-4">
            <legend class="heading-third">Your address</legend>
            <span>
                <label for="street">Street</label> 
                <?php 
                    echo "<label id='street'>$street</label>";
                ?> 
            </span>
            <span>
                <label for="suburb">Suburb</label>
                <?php 
                    echo "<label id='suburb'>$suburb</label>";
                ?>  
            </span>
            <span class="section__enquire__select">
                <label for="state">State</label>
                <?php 
                    echo "<label id='state'>$state</label>";
                ?>            
            </span>
            <span>
                <label for="postcode">Postcode</label> 
                <?php 
                    echo "<label id='postcode'>$postcode</label>";
                ?> 
            </span>
        </fieldset>
        <!-- Transfer amount section -->
        <fieldset class="u-margin-bottom-4">
            <legend class="heading-third">Money Transfer</legend>
            <span>
                <label for="transferAmount">Transfer Amount - AUD</label>
                <?php 
                    echo "<label id='transferAmount'>$transfer_amount</label>";
                ?> 
            </span>
            <span class="section__enquire__select">
                <label for="country">Transfer to Country</label>
                <?php 
                    echo "<label id='country'>" . ucfirst($country) . "</label>";
                ?> 
            </span>
            <span>
                <label id="lable_recievedAmount" for="recievedAmount">Recieved Amount</label>
                <?php 
                    echo "<label id='recievedAmount'>$recieved_amount</label>";
                ?> 
            </span>
            <span>
                <label id="label_service_choice" for="service_choice">Service choice</label>                
                <?php 
                    if ($service_choice == 'banktopickup') echo "<label id='transferAmount'>Bank to Pick up</label>";
                    if ($service_choice == 'banktobank') echo "<label id='transferAmount'>Bank to Bank</label>";
                    if ($service_choice == 'banktohome') echo "<label id='transferAmount'>Bank to Home</label>";
                ?>
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
                    echo "<label id='recieved_name'>$recieved_name</label>"; 
                ?> 
            </span>
            <span>
                <label for="recievedPhone">Phone</label>
                <?php
                    echo "<label id='recievedPhone'>$recieved_phone</label>";  
                ?> 
            </span>
            <span>
                <label for="recievedAddress">Address</label>
                <?php
                    echo "<label id='recievedAddress'>$recieved_address</label>";   
                ?> 
            </span>
            <span>
                <label for="recievedCity">City</label>
                <?php
                    echo "<label id='recievedCity'>$recieved_city</label>";    
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
                    echo "<label id='recievedBankAcount'>$recieved_bank_acount</label>";     
                ?> 
            </span>
            <span>
                <label for="recievedAccountName">Account Name</label>
                <?php
                    echo "<label id='recievedAccountName'>$recieved_account_name</label>";      
                ?> 
            </span>
            <span>
                <label for="recievedBankName">Bank Name</label>
                <?php
                    echo "<label id='recievedBankName'>$recieved_bank_name</label>";       
                ?> 
            </span>
        </fieldset>
        <!-- Comment section -->
        <fieldset class="u-margin-bottom-4">
            <legend class="heading-third">Notes</legend>
            <span>
                <label for="comments">Comments</label> 
                <?php
                    echo "<label id='comments'>$comment</label>";        
                ?> 
            </span>
        </fieldset>
        <!-- Credit Card section -->
        <fieldset id="payment" class="u-margin-bottom-4">
            <legend class="heading-third">Payment</legend>
            <div>
                <label>Credit card type</label>
                <?php 
                    if ($card_type == 'visa') echo "<label id='visa'>Visa</label>";
                    if ($card_type == 'mastercard') echo "<label id='mastercard'>Mastercard</label>";
                    if ($card_type == 'american') echo "<label id='american'>American Express</label>";
                ?>
            </div>
            <div>
                <label>Name on card</label>
                <?php
                    echo "<label id='nameOnCard'>$name_on_card</label>";        
                ?> 
            </div>
            <div>
                <label>Card Number</label>
                <?php
                    echo "<label id='cardNumber'>$card_number</label>";        
                ?> 
            </div>
            <div>
                <label>Expiry Month - MM</label>
                <?php
                    echo "<label id='expiryMonth'>$expiry_month</label>";        
                ?> 
            </div>
            <div>
                <label>Expiry Year - YY</label>
                <?php
                    echo "<label id='expiryYear'>$expiry_year</label>";        
                ?> 
            </div>
            <div>
                <label>Verification Value (CVV)</label>
                <?php
                    echo "<label id='verification'>$verification</label>";        
                ?> 
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