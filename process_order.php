<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="description" content="Demonstrates some basic HTML content elements" />
    <meta name="keywords" content="HTML5, CSS, JavaScript" />
    <meta name="author" content="Anh Tran" />
    <link href="https://fonts.googleapis.com/css?family=Lato%7COpen+Sans:100,300,400,700,900" rel="stylesheet" />
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ"
        crossorigin="anonymous" /> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="styles/style.css" />
    <title>Swap - Money Transfer | Process Order</title>
</head>
<body>
<?php
    // Clean up data
    function sanitise_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    function calculate_fees($to_country, $amount) {
        $total_fees = 0;
        switch ($to_country) {
            case 'vietnam':
                if ((0 < $amount) && ($amount <= 1000)) {                
                    $total_fees = 6;
                } else if ((1000 < $amount) && ($amount <= 3000)) {    
                    $total_fees = 13;
                } else if ($amount > 3000) {
                    $total_fees = 80;
                }
                break;
            case 'canada':
                if ((0 < $amount) && ($amount <= 1000)) {                
                    $total_fees = 6;
                } else if ((1000 < $amount) && ($amount <= 3000)) {    
                    $total_fees = 12;
                } else if ($amount > 3000) {
                    $total_fees = 70;
                }
                break;
            case 'india':
                if ((0 < $amount) && ($amount <= 1000)) {                
                    $total_fees = 4;
                } else if ((1000 < $amount) && ($amount <= 3000)) {    
                    $total_fees = 10;
                } else if ($amount > 3000) {
                    $total_fees = 50;
                }
                break;
            case 'uk':
                if ((0 < $amount) && ($amount <= 1000)) {                
                    $total_fees = 5;
                } else if ((1000 < $amount) && ($amount <= 3000)) {    
                    $total_fees = 11;
                } else if ($amount > 3000) {
                    $total_fees = 70;
                }
                break;
            default:
                break;
        }
        return $total_fees;
    }

    date_default_timezone_set('Australia/Melbourne');
    require_once "settings.php";	// Load MySQL log in credentials
    $conn = mysqli_connect($host,$user,$pwd,$sql_db);	// Log in and use database
    // Set up status
    $status = "PENDING";
    $err_msg = "";
    // Get variables
    // $fees = sanitise_input($_POST["fees"]);
    $fees = 0;

    $recieved_name = sanitise_input($_POST["recievedName"]);
    $recieved_phone = sanitise_input($_POST["recievedPhone"]);
    $recieved_address = sanitise_input($_POST["recievedAddress"]);
    $recieved_city = sanitise_input($_POST["recievedCity"]);

    $recieved_bank_acount = sanitise_input($_POST["recievedBankAcount"]);
    $recieved_account_name = sanitise_input($_POST["recievedAccountName"]);
    $recieved_bank_name = sanitise_input($_POST["recievedBankName"]);

    $verification = sanitise_input($_POST["verification"]);

    // Validate firstname
    if (isset($_POST["firstname"])) {
            $firstname = sanitise_input($_POST["firstname"]);
        if (!preg_match("/^[a-zA-Z]{2,25}$/", $firstname)){
            $err_msg .= "<p>Only letters are allowed in first name.</p>";
        }
    } else {
        $err_msg .= "<p>Please enter first name. </p>";
    }
    if (trim($firstname == "")) {
        header ("location: enquire.php");
    }
    // Validate lastname
    if (isset($_POST["lastname"])) {
            $lastname = sanitise_input($_POST["lastname"]);
        if (!preg_match("/^[a-zA-Z]{2,25}$/", $lastname)){
            $err_msg .= "<p>Only letters are allowed in last name.</p>";
        }
    } else {
        $err_msg .= "<p>Please enter last name. </p>";
    } 
    // Validate email
    if (isset($_POST["email"])) {
        $email = sanitise_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $err_msg .= "<p>Email is not valid.</p>";
        }
    } else {
        $err_msg .= "<p>Please enter your email</p>";
    }
    // Validate phone 
    if (isset($_POST["phone"])) {
        $phone = sanitise_input($_POST["phone"]);
        if (!preg_match("/^[0-9]{10}$/", $phone)){
            $err_msg .= "<p>Phone number should be 10 digits.</p>";
        }
    } else {
        $err_msg .= "<p>Please enter your phone number</p>";
    }
    // Validate street
    if (isset($_POST["street"])) {
        $street = sanitise_input($_POST["street"]);
        if ($street == "") {
            $err_msg .= "<p>Please enter your street.</p>";
        }
    } else {
        $err_msg .= "<p>Please enter your street.</p>";
    }
    // Validate suburb
    if (isset($_POST["suburb"])) {
        $suburb = sanitise_input($_POST["suburb"]);
        if ($suburb == "") {
            $err_msg .= "<p>Please enter your suburb.</p>";
        }
    } else {
        $err_msg .= "<p>Please enter your suburb.</p>";
    }
    // Validate postcode 
    if (isset($_POST["postcode"])) {
        $postcode = sanitise_input($_POST["postcode"]);
        if (!preg_match("/^[0-9]{4}$/", $postcode))
            $err_msg .= "<p>Postcode should be 4 digits</p>";
    } else {
        $err_msg .= "<p>Please enter your postcode</p>";
    }
    // Validate state
    if (isset($_POST["state"])) {
        $state = strtoupper(sanitise_input($_POST["state"]));
        if ($state == "") {
            $err_msg .= "<p>Please enter your state.</p>";
        } else {
            switch ($state) {
                case "vic":
                    if (!($postcode == 3) || ($postcode == 8)) {
                        $err_msg .= "<p>Postcode for VIC must start with 3 or 8</p>";
                    }
                    break;
                case "nsw":
                    if (!($postcode == 1) || ($postcode == 2)) {
                        $err_msg .= "<p>Postcode for NSW must start with 1 or 2</p>";
                    }
                    break;
                case "qld":
                    if (!($postcode == 4) || ($postcode == 9)) {
                        $err_msg .= "<p>Postcode for QLD must start with 4 or 9</p>";
                    }
                    break;
                case "nt":
                    if (!($postcode == 0)) {
                        $err_msg .= "<p>Postcode for NT must start with 0</p>";
                    }
                    break;
                case "wa":
                    if (!($postcode == 6)) {
                        $err_msg .= "<p>Postcode for WA must start with 6</p>";
                    }
                    break;
                case "sa":
                    if (!($postcode == 5)) {
                        $err_msg .= "<p>Postcode for SA must start with 5</p>";
                    }
                    break;
                case "tas":
                    if (!($postcode == 7)) {
                        $err_msg .= "<p>Postcode for TAS must start with 7</p>";
                    }
                    break;
                case "atc":
                    if (!($postcode == 0)) {
                        $err_msg .= "<p>Postcode for ATC must start with 0</p>";
                    }
                    break;
                default:
                    break;
                    }
        }
    } else {
        $err_msg .= "<p>Please enter your state.</p>";
    }
    // Validate recieved amount
    if (isset($_POST["recievedAmount"])) {
        $recieved_amount = sanitise_input($_POST["recievedAmount"]);
        if (!(is_numeric($recieved_amount) and $recieved_amount > 0)) { 
            $err_msg .= "<p>Please enter a positive recieved amount</p>";
        } 
    } else {
        $err_msg .= "<p>Please enter a positive recieved amount</p>";
    }
    // Validate country
    if (isset($_POST["country"])) {
        $country = sanitise_input($_POST["country"]);
        if ($country == "") {
            $err_msg .= "<p>Please enter country to transfer to</p>";        
        }
        // Validdate transfer 
        if (isset($_POST["transferAmount"])) {
            $transfer_amount = sanitise_input($_POST["transferAmount"]);
            if (!(is_numeric($transfer_amount) and $transfer_amount > 0)) { 
                $err_msg .= "<p>Please enter a positive transfer amount</p>";
                $fees = calculate_fees($country, $transfer_amount);
            } 
        } else {
            $err_msg .= "<p>Please enter a positive transfer amount</p>";
        }
    }
    // Validate service choice
    if (isset($_POST["serviceChoice"])) {
        $service_choice = sanitise_input($_POST["serviceChoice"]);
        if ($service_choice == "banktobank") {
            if ($recieved_bank_acount == "") {
                $err_msg .= "<p>Please enter recieved bank account</p>";
            }
            if ($recieved_account_name == "") {
                $err_msg .= "<p>Please enter recieved account name</p>";
            }
            if ($recieved_bank_name == "") {
                $err_msg .= "<p>Please enter recieved bank name</p>";
            }
        }
        if ($service_choice == "banktohome") {
            if ($recieved_name == "") {
                $err_msg .= "<p>Please enter reciever name</p>";
            }
            if ($recieved_phone == "") {
                $err_msg .= "<p>Please enter reciever phone number</p>";
            }
            if ($recieved_address == "") {
                $err_msg .= "<p>Please enter reciever address</p>";
            }
            if ($recieved_city == "") {
                $err_msg .= "<p>Please enter reciever city</p>";
            }
        }
    } else {
        $err_msg .= "<p>Please select service</p>";        
    }
    // Validate comment 
    if (isset($_POST)) {
        $comment = sanitise_input($_POST["comments"]);
    } else {
        $comment = "";
    }
    // Validate Card Number
    if (isset($_POST["cardNumber"])) {
        $card_number = sanitise_input($_POST["cardNumber"]);
        if (!preg_match("/^[0-9]{15,16}$/", $card_number)) {
            $err_msg .= "<p>Card number must be 15 or 16 digits</p>";
        } 
        // Validate Card type
        if (isset($_POST["cardType"])) {
            $card_type = sanitise_input($_POST["cardType"]);
            if ($card_type == "") {
                $err_msg .= "<p>Please select Credit Card type</p>";
            } else {
                switch ($card_type) {
                    case 'visa':
                        if (!preg_match("/^[0-9]{16}$/", $card_number))
                        {
                            $err_msg .= "<p>Visa card number must be 16 digits</p>";
                        }
                        if (substr($card_number, 0, 1) != '4') {
                            $err_msg .= "<p>Visa card number must start with 4</p>";
                        }
                        if (!preg_match("/^[0-9]{3}$/", $verification)) {
                            $err_msg .= "<p>Visa card verification number must be 3 digits</p>";
                        }
                    break;
                    case 'mastercard':
                        if (!preg_match("/^[0-9]{16}$/", $card_number))
                        {
                            $err_msg .= "<p>Master card number must be 16 digits</p>";
                        }
                        if ((substr($card_number, 0, 2) < 51) || (substr($card_number, 0, 2) > 55)) {
                            $err_msg .= "<p>Master card number must start with digits 51 through 55</p>";
                        }
                        if (!preg_match("/^[0-9]{3}$/", $verification)) {
                            $err_msg .= "<p>Master card verification number must be 3 digits</p>";
                        }
                    break;
                    case 'american':
                        if (!preg_match("/^[0-9]{15}$/", $card_number))
                        {
                            $err_msg .= "<p>American card number must be 15 digits</p>";
                        }
                        if ((substr($card_number, 0, 2) == 34) || (substr($card_number, 0, 2) == 37)) {
                            $err_msg .= "<p>American card number must start with digits 34 or 37</p>";
                        }
                        if (!preg_match("/^[0-9]{4}$/", $verification)) {
                            $err_msg .= "<p>American card verification number must be 4 digits</p>";
                        }
                    break;
                    default:
                    break;
                }
            }
        } else {
            $err_msg .= "<p>Please select Credit Card type</p>";
        }
    } else {
        $err_msg .= "<p>Please enter Card number</p>";
    }
        // Validate Name on Card
    if (isset($_POST["nameOnCard"])) {
        $name_on_card = htmlspecialchars($_POST["nameOnCard"]);
        if (!preg_match("/^[a-zA-Z\s]+$/", $name_on_card)) {
            $err_msg .= "<p>Name on card must be alpha characters and/or space</p>";
            if (strlen($name_on_card) > 40) {
                $err_msg .= "<p>Name on card must be no more than 40 characters</p>";
            }
        }
    } else {
        $err_msg .= "<p>Please enter Name on Card</p>";
    }
    // Validate Expiry Month
    if (isset($_POST["expiryMonth"])) {
        $expiry_month = sanitise_input($_POST["expiryMonth"]);
        if (!preg_match("/^[0-9]{2}$/", $expiry_month)) {
            $err_msg .= "<p>Expire month must be 2 digits</p>";
        } else if (($expiry_month <= 0) || ($expiry_month > 12)) {
            $err_msg .="<p>Credit card expiry month must be from 01 to 12</p>";
        } 
        if (isset($_POST["expiryYear"])) {
            $expiry_year = sanitise_input($_POST["expiryYear"]);
            if (!preg_match("/^[0-9]{2}$/", $expiry_year)) {
                $err_msg .= "<p>Expire Year must be 2 digits</p>";
            } else {
                $dateString = "{$expiry_year}-{$expiry_month}";
                $expiry = DateTime::createFromFormat('y-m', $dateString);
                $current = date('y-m');
                if ($expiry <= $current) {
                    $err_msg .= "<p>Credit card expiry must be after the current time</p>";
                }
            }
        } else {
            $err_msg .= "<p>Please enter Expire Year</p>";
        }
    } else {
        $err_msg .= "<p>Please enter Expire month</p>";
    }

    if ($err_msg != "") {
        echo $err_msg;
    } else {
        if ($conn) { // check is database is available for use
            $query = "CREATE TABLE IF NOT EXISTS orders (order_id int(11) unsigned not null auto_increment primary key,
                                order_time timestamp, order_cost float, order_status varchar(20), 
                                firstname varchar(25), lastname varchar(25), phone varchar(12), email varchar(20),
                                street varchar(30), suburb varchar(10), state varchar(10), postcode int(4),
                                transfer_amount float, country varchar(10), recieved_amount float, service_choice varchar(10),
                                fees float, comment varchar(500), recieved_name varchar(20), recieved_phone varchar(12), 
                                recieved_address varchar(100), recieved_city varchar(10), recieved_bank_acount varchar(12),
                                recieved_account_name varchar(20), recieved_bank_name varchar(12),
                                card_type varchar(10), name_on_card varchar(20), card_number varchar(20), 
                                expiry_month int(2), expiry_year int(2), verification int(4)
                                )";
            $result = mysqli_query ($conn, $query);
            if ($result) {								// check if query was successfully executed
                $sql_table = "orders";
                $query = "INSERT INTO 
                            $sql_table(order_cost, order_status, 
                                        firstname, lastname, phone, email, street, suburb, state, postcode,
                                        transfer_amount, country, recieved_amount, service_choice, fees, comment, 
                                        recieved_name, recieved_phone, recieved_address, recieved_city, 
                                        recieved_bank_acount, recieved_account_name, recieved_bank_name,
                                        card_type, name_on_card, card_number, expiry_month, expiry_year, verification
                                        ) 
                            VALUES ('$fees', '$status', 
                                    '$firstname', '$lastname', '$phone', '$email', '$street', '$suburb', '$state', '$postcode',
                                    '$transfer_amount', '$country', '$recieved_amount', '$service_choice', '$fees', '$comment', 
                                    '$recieved_name', '$recieved_phone', '$recieved_address', '$recieved_city', 
                                    '$recieved_bank_acount', '$recieved_account_name', '$recieved_bank_name',
                                    '$card_type', '$name_on_card', '$card_number', '$expiry_month', '$expiry_year', '$verification'
                                    )";		// Assign appropriate query here
                $result = mysqli_query($conn, $query);
                if (!$result) {
                    echo "<p>Something is wrong with ", $query, "</p>";
                } else {
                    echo "<p> Added </p>";
                }
                echo "<p>Create table operation successful.</p>";
            } else {
                echo "<p>Create table operation unsuccessful.</p>";
            }
            mysqli_close ($conn);					// Close the database connect
        } else {
            echo "<p>Unable to connect to the database.</p>";
        }
    }
?>	
</body>
</html>

