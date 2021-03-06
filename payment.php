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
    <title>Swap - Money Transfer | Payment</title>
    <script src="scripts/payment.js"></script>
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
    <section class="section__enquire">
        <div class="u-text-center u-margin-bottom-4">
            <h2 class="heading-secondary heading-border">
                Payment
            </h2>
        </div>
        <form id="paymentForm" method="post" action="process_order.php" novalidate="novalidate">
            <!--Note we have to use a special escape character to print an apostrophe on the Web page -->
            <fieldset class="u-margin-bottom-4">
                <legend class="heading-third">Your details</legend>
                <div>
                    <label>Your Name</label>
                    <p id="confirm_name"></p>
                    <input type="hidden" name="firstname" id="firstname" />
                    <input type="hidden" name="lastname" id="lastname" />
                </div>
                <div>
                    <label>Phone</label>
                    <p id="confirm_phone"></p>
                    <input type="hidden" name="phone" id="phone" />
                </div>
                <div>
                    <label>Email</label>
                    <p id="confirm_email"></p>
                    <input type="hidden" name="email" id="email"/>
                </div>
                <div>
                    <label>Address</label>
                    <p id="confirm_dress"></p>
                    <input type="hidden" name="street" id="street"/>
                    <input type="hidden" name="suburb" id="suburb"/>
                    <input type="hidden" name="state" id="state"/>
                    <input type="hidden" name="postcode" id="postcode"/>
                </div>
                <div>
                    <label>Comments</label>
                    <p id="confirm_comments"></p>
                    <input type="hidden" name="comments" id="comments" />
                </div>
            </fieldset>
            <fieldset class="u-margin-bottom-4">
                <legend class="heading-third">Money Transfer</legend>
                <div>
                    <label>Transfer Amount - AUD</label>
                    <p id="confirm_transferAmount"></p>
                    <input type="hidden" name="transferAmount" id="transferAmount"/>
                </div>
                <div>
                    <label>Transfer to</label>
                    <p id="confirm_country"></p>
                    <input type="hidden" name="country" id="country"/>
                </div>
                <div>
                    <label id="lable_recievedAmount">Recieved Amount</label>
                    <p id="confirm_recievedAmount"></p>
                    <input type="hidden" name="recievedAmount" id="recievedAmount"/>
                </div>
                <div>
                    <label>Service choice</label>
                    <p id="confirm_serviceChoice"></p>
                    <input type="hidden" name="serviceChoice" id="serviceChoice" />
                </div>
                <div>
                    <label>Total payment - AUD</label>
                    <p id="confirm_fees"></p>
                    <input type="hidden" name="fees" id="fees" />
                </div>
            </fieldset>
            <fieldset id="recievedAddressField" class="u-margin-bottom-4">
                <legend class="heading-third">Reciever details</legend>
                <div>
                    <label>Name</label>
                    <p id="confirm_recievedName"></p>
                    <input type="hidden" name="recievedName" id="recievedName"/>
                </div>
                <div>
                    <label>Phone</label>
                    <p id="confirm_recievedPhone"></p>
                    <input type="hidden" name="recievedPhone" id="recievedPhone"/>
                </div>
                <div>
                    <label>Address</label>
                    <p id="confirm_recievedAddress"></p>
                    <input type="hidden" name="recievedAddress" id="recievedAddress"/>
                </div>
                <div>
                    <label>City</label>
                    <p id="confirm_recievedCity"></p>
                    <input type="hidden" name="recievedCity" id="recievedCity"/>
                </div>
            </fieldset>
            <fieldset id="recievedBankField" class="u-margin-bottom-4">
                <legend class="heading-third">Reciever Bank details</legend>
                <div>
                    <label>Account Number</label>
                    <p id="confirm_recievedBankAcount"></p>
                    <input type="hidden" name="recievedBankAcount" id="recievedBankAcount" />
                </div>
                <div>
                    <label>Account Name</label>
                    <p id="confirm_recievedAccountName"></p>
                    <input type="hidden" name="recievedAccountName" id="recievedAccountName"/>
                </div>
                <div>
                    <label>Bank Name</label>
                    <p id="confirm_recievedBankName"></p>
                    <input type="hidden" name="recievedBankName" id="recievedBankName"/>
                </div>
            </fieldset>
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
                <input id="submitButton" class="btn btn__bold btn__success u-margin-right-2" type="submit" value="Check Out" />
                <input class="btn u-text-center" id="cancelButton" value="Cancel" />
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