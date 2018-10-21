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
    <title>Swap - Money Transfer | Manager</title>
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
        // Clean up data
        function sanitise_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        // Set dafault time zone
        date_default_timezone_set('Australia/Melbourne');
        // Load MySQL log in credentials
        require_once "settings.php";
        // Log in and use database	
        $conn = @mysqli_connect($host,$user,$pwd,$sql_db);
        $sql_table="orders";
        $err_msg = "";

        if (!isset($_POST["firstname"])) {
            $firstname = "";
        } else {
            $firstname = sanitise_input($_POST["firstname"]);
        }
        if (!isset($_POST["lastname"])) {
            $lastname = "";
        } else {
            $lastname = sanitise_input($_POST["lastname"]);
        }
        if (!isset($_POST["serviceChoice"])) {
            $service_choice = "";
        } else {
            $service_choice = sanitise_input($_POST["serviceChoice"]);
        }
        if (!isset($_POST["order_status"])) {
            $order_status = "";
        } else {
            $order_status = sanitise_input($_POST["order_status"]);
        }
        if (!isset($_POST["order_cost"])) {
            $order_cost = 0;
        } else {
            $order_cost = sanitise_input($_POST["order_cost"]);
        }
        // GET order_id to delete
        if (isset($_GET["order_id"])) {
            $order_id = sanitise_input($_GET["order_id"]);
        } else {
            $order_id = 0;
        }
        // GET action value: 0-delete, 1-update
        if (isset($_GET["action"])) {
            $action = sanitise_input($_GET["action"]);
        } else {
            $action = 2;
        }
        // Save edit_order_status
        if (!isset($_POST["edit_order_status"])) {
            $edit_order_status = "";
        } else {
            $edit_order_status = sanitise_input($_POST["edit_order_status"]);
        }
        if (!isset($_POST["edit_order_id"])) {
            $edit_order_id = 0;
        } else {
            $edit_order_id = sanitise_input($_POST["edit_order_id"]);
            if ($conn) { // check is database is available for use
                $query = "UPDATE $sql_table SET order_status= '$edit_order_status' WHERE order_id = '$edit_order_id'";
                $result = mysqli_query ($conn, $query);
            if ($result) {								
                $err_msg .= "<p>Update operation successful</p>";
            } else {
                $err_msg .= "<p>Update operation unsuccessful. Please check again</p>";
            }
            } else {
                $err_msg .= "<p>Unable to connect to the database.</p>";
            }
        }
        // Delete order_id
        if ($action == 0) {
            if ($order_id != 0) {
                if ($conn) { // check is database is available for use
                    $query = "DELETE FROM $sql_table WHERE order_id = '$order_id' and order_status = 'PENDING'";
                    $result = mysqli_query ($conn, $query);
                if ($result) {								// check if query was successfully executed
                    $err_msg .= "<p>" . mysqli_affected_rows($conn) . " record deleted. </p>";
                } else {
                    $err_msg .= "<p>Delete operation unsuccessful. Please check again</p>";
                }
                } else {
                    $err_msg .= "<p>Unable to connect to the database.</p>";
                }
            }
        }
    ?>	
    <!-- Finish PHP section for GET query string -->
    <!-- Section in HTML with PHP echo depend on values -->
    <section class="section__enquire">
        <div class="u-text-center u-margin-bottom-4">
            <h2 class="heading-secondary heading-border">
                Managers Order
            </h2>
        </div>
        <fieldset class="u-margin-bottom-4">
            <legend class="heading-third">Alert</legend>
            <?php 
                echo "<div class='error-message'>$err_msg</div>";
            ?>
        </fieldset>
        <form id="managerForm" method="post" action="manager.php" novalidate="novalidate">
        <!--Note we have to use a special escape character to print an apostrophe on the Web page -->
        <!-- Filter section -->
        <fieldset class="u-margin-bottom-4">
            <legend class="heading-third">Filter</legend>
            <span>
                <label for="firstname">First Name</label> 
                <input type="text" name= "firstname" id="firstname"/>
            </span>
            <span>
                <label for="lastname">Last Name</label>
                <input type="text" name= "lastname" id="lastname"/>
            </span>
            <span>
                <label for="serviceChoice">Product</label>
                <select name="serviceChoice" id="serviceChoice">
                    <option value="">Select product</option>
                    <option value="banktopickup">Bank to Pick Up</option>
                    <option value="banktobank">Bank to Bank</option>
                    <option value="banktohome">Bank to Home</option>
                </select> 
            </span>
            <span>
                <label for="order_status">Order status</label>
                <select name="order_status" id="order_status">
                    <option value="">Select status</option>
                    <option value="PENDING">PENDING</option>
                    <option value="FULFILLED">FULFILLED</option>
                    <option value="PAID">PAID</option>
                    <option value="ARCHIVED">ARCHIVED</option>
                </select> 
            </span>
            <span>
                <label for="order_cost">Sorted by Total Cost</label>
                <select name="order_cost" id="order_cost">
                    <option value="0">No</option>
                    <option value="1">YES</option>
                </select> 
            </span>
            <p class="u-margin-bottom-4 u-text-center">
                <input id="submitButton" class="btn btn__bold btn__success u-margin-right-2" type="submit" value="Search"/>
                <input class="btn" type="reset" value="Reset"/>
            </p>
        </fieldset>
        </form>
        <!-- Display section -->
        <form id="editForm" method="post" action="manager.php" novalidate="novalidate">
        <fieldset class="u-margin-bottom-4">
            <legend class="heading-third">Result</legend>
            <table>
                <thead>
                    <tr>
                        <th scope="col">Order ID</th>
                        <th scope="col">Order Time</th>
                        <th scope="col">Product</th>
                        <th scope="col">Transfer</th>
                        <th scope="col">Recieved</th>
                        <th scope="col">Total Cost</th>
                        <th scope="col">Customer Name</th>
                        <th scope="col">Status</th>
                        <th scope="col">Delete</th>
                        <th scope="col">Update</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if (!$conn) {
                            $err_msg .= "<p>Database connection failure</p>";
                        } else {
                            echo $order_status;
                            $query_search = "SELECT * FROM $sql_table WHERE firstname like '%$firstname%' and lastname like '%$lastname%'";
                            if ($order_status != "") {
                                $query_search = "SELECT * FROM $sql_table WHERE firstname like '%$firstname%' and lastname like '%$lastname%' and order_status = '$order_status'";		// Assign appropriate query here                                
                            }                                
                            if ($service_choice != "") {
                                $query_search = "SELECT * FROM $sql_table WHERE firstname like '%$firstname%' and lastname like '%$lastname%' 
                                                and service_choice = '$service_choice'";			// Assign appropriate query here
                                if ($order_status != "") { 
                                    $query_search = "SELECT * FROM $sql_table WHERE firstname like '%$firstname%' and lastname like '%$lastname%' 
                                                and service_choice = '$service_choice' and order_status = '$order_status'";			// Assign appropriate query here                        
                                }
                            }                            
                            if ($order_cost == 1) {
                                $query_search = "SELECT * FROM $sql_table WHERE firstname like '%$firstname%' and lastname like '%$lastname%' ORDER BY order_cost DESC";		// Assign appropriate query here                                
                                if ($service_choice != "") {
                                    $query_search = "SELECT * FROM $sql_table WHERE firstname like '%$firstname%' and lastname like '%$lastname%' 
                                                    and service_choice = '$service_choice' ORDER BY order_cost DESC";			// Assign appropriate query here
                                    if ($order_status != "") { 
                                        $query_search = "SELECT * FROM $sql_table WHERE firstname like '%$firstname%' and lastname like '%$lastname%' 
                                                    and service_choice = '$service_choice' and order_status = '$order_status' ORDER BY order_cost DESC";			// Assign appropriate query here                                }
                                    }
                                }
                            }  
                            $result_search = mysqli_query($conn, $query_search);
                            if (!$result_search) {
                                $err_msg .= "<p>Something is wrong with " . $query_search . "</p>";
                            } else {
                                while ($row = mysqli_fetch_assoc($result_search)) {
                                    echo "<tr>\n ";
                                    echo "<td>", $row["order_id"], "</td>\n ";
                                    echo "<td>", $row["order_time"], "</td>\n ";
                                    echo "<td>", $row["service_choice"], "</td>\n ";
                                    echo "<td>", $row["transfer_amount"], "</td>\n ";
                                    echo "<td>", $row["recieved_amount"], "</td>\n ";
                                    echo "<td>", $row["order_cost"], "</td>\n ";
                                    echo "<td>", $row["firstname"] . ' ' . $row["lastname"], "</td>\n ";
                                    if ($action == 1) {
                                        if ($order_id == $row['order_id']) {
                                            echo "<td>", "<select name='edit_order_status' id='edit_order_status'>
                                                <option value=''>Select status</option>
                                                <option value='PENDING' selected='selected'>PENDING</option>
                                                <option value='FULFILLED'>FULFILLED</option>
                                                <option value='PAID'>PAID</option>
                                                <option value='ARCHIVED'>ARCHIVED</option>
                                            </select>", "</td>\n ";
                                        } else {
                                        echo "<td>", $row["order_status"], "</td>\n ";
                                        } 
                                    } else echo "<td>", $row["order_status"], "</td>\n ";
                                    echo "<td><a href='manager.php?action=0&order_id=" . $row['order_id'] . "'>Delete</a></td>";
                                    echo "<td><a href='manager.php?action=1&order_id=" . $row['order_id'] . "'>Edit</a></td>";
                                    echo "</tr>\n";
                                }
                                mysqli_free_result($result_search);	// Free up resources
                            }
                            mysqli_close($conn);					// Close the database connect
                        }
                        echo "<input type='hidden' name='edit_order_id' value='$order_id'/>";
                    ?>
                </tbody>
            </table>
            <p class="u-margin-bottom-4 u-text-center"
                <?php 
                    if (($action == 1) && ($order_id != 0)) echo 'style="visibility: visible; display: block;"'; 
                    else echo 'style="visibility: hidden; display: none;"';
                ?>>
                <input id="saveButton" class="btn btn__bold btn__success u-margin-right-2" type="submit" value="Save"/>
            </p>
        </fieldset>
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