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
    
    if (isset($_POST["firstname"])) {         
        require_once "settings.php";	// Load MySQL log in credentials
        $conn = mysqli_connect($host,$user,$pwd,$sql_db);	// Log in and use database
        // Get variables
        $firstname = sanitise_input($_POST["firstname"]);
        $lastname = sanitise_input($_POST["lastname"]);
        $phone = sanitise_input($_POST["phone"]);
        $email = sanitise_input($_POST["email"]);
    
        $street = sanitise_input($_POST["street"]);
        $suburb = sanitise_input($_POST["suburb"]);
        $state = sanitise_input($_POST["state"]);
        $postcode = sanitise_input($_POST["postcode"]);
    
        $transfer_amount = sanitise_input($_POST["transferAmount"]);
        $country = sanitise_input($_POST["country"]);
        $recieved_amount = sanitise_input($_POST["recievedAmount"]);
        $service_choice = sanitise_input($_POST["serviceChoice"]);
        $fees = sanitise_input($_POST["fees"]);
    
        $comment = sanitise_input($_POST["comments"]);
    
        $recieved_name = sanitise_input($_POST["recievedName"]);
        $recieved_phone = sanitise_input($_POST["recievedPhone"]);
        $recieved_address = sanitise_input($_POST["recievedAddress"]);
        $recieved_city = sanitise_input($_POST["recievedCity"]);
    
        $recieved_bank_acount = sanitise_input($_POST["recievedBankAcount"]);
        $recieved_account_name = sanitise_input($_POST["recievedAccountName"]);
        $recieved_bank_name = sanitise_input($_POST["recievedBankName"]);
    
        if ($conn) { // check is database is available for use
            $query = "CREATE TABLE IF NOT EXISTS orders (order_id int(11) unsigned not null auto_increment primary key,
                                order_time timestamp, order_cost float, order_status varchar(20), 
                                firstname varchar(20), lastname varchar(20), phone varchar(12), email varchar(20),
                                street varchar(30), suburb varchar(10), state varchar(10), postcode int(4),
                                transfer_amount float, country varchar(10), recieved_amount float, service_choice varchar(10),
                                fees float, comment varchar(500), recieved_name varchar(20), recieved_phone varchar(12), 
                                recieved_address varchar(100), recieved_city varchar(10), recieved_bank_acount varchar(12),
                                recieved_account_name varchar(20), recieved_bank_name varchar(12)
                                )";
            $result = mysqli_query ($conn, $query);
            if ($result) {								// check if query was successfully executed
                $sql_table = "orders";
                $status = "PENDING";
                $payment = "Visa Nunber";
                $query = "INSERT INTO 
                            $sql_table(order_cost, order_status, firstname, lastname, phone, 
                                        email, street, suburb, state, postcode, transfer_amount, country, 
                                        recieved_amount, service_choice, fees, comment, recieved_name, recieved_phone, 
                                        recieved_address, recieved_city, recieved_bank_acount, recieved_account_name, recieved_bank_name) 
                            VALUES ('$fees', '$status', '$firstname', '$lastname', '$phone', '$email', '$street'
                                    '$suburb', '$state', '$postcode', '$transfer_amount', '$country', '$recieved_amount',
                                    '$service_choice', '$fees', '$comment', '$recieved_name', '$recieved_phone', 
                                    '$recieved_address', '$recieved_city', '$recieved_bank_acount', '$recieved_account_name', '$recieved_bank_name')";		// Assign appropriate query here
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
    } else {
        header ("location:enquire.php"); //redirect to the form
    }
?>	
</body>
</html>

