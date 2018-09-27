/* Author: Anh Tran - 101953626
* Target: payment.html
* Purpose: JavaScript used with 'enquire.html'
* Created: 12/09/2018
* Last updated: 12/09/2018
* Credits: 
*/

"use strict";
//Global variables accessible to all functions

// Return CSS visibility and display for BankField and AddressField
function visibilityDisplay(str1, str2) {
    return `visibility: ${str1}; display: ${str2}`;
}

// Fill in label for lable_recievedAmount
function lableRecievedAmount(params) {
    var lableRecievedAmount = document.getElementById("lable_recievedAmount");
    switch (params) {
      case "vietnam":
            lableRecievedAmount.innerHTML = "Recieved Amount - VND";
        break;
      case "canada":
            lableRecievedAmount.innerHTML = "Recieved Amount - CAD";
        break;
      case "india":
            lableRecievedAmount.innerHTML = "Recieved Amount - INR";
        break;
      case "uk":
            lableRecievedAmount.innerHTML = "Recieved Amount - GBP";
        break;
      default:
        break;
    }
};

// Confirm service choice 
function confirmServiceChoice(params) {
    var confirmServiceChoice = document.getElementById("confirm_serviceChoice");
    document.getElementById("serviceChoice").value = params;

    switch (params) {
        case "banktopickup":
            confirmServiceChoice.innerHTML = "Bank to Pick Up";
            break;
        case "banktobank":
            confirmServiceChoice.innerHTML = "Bank to Bank";
            break;
        case "banktohome":
            confirmServiceChoice.innerHTML = "Bank to Home";
            break;
        default:
            break;
    }
}

// Fill Recieved Address Field 
function fillRecievedAddressField() {
    var jsonReciever = JSON.parse(sessionStorage.dataReciever);

    document.getElementById("recievedAddressField").style.cssText = visibilityDisplay("visible", "block");
    
    // Confirmation text for Bank to Home
    document.getElementById("confirm_recievedName").textContent = jsonReciever.recievedName;
    document.getElementById("confirm_recievedPhone").textContent = jsonReciever.recievedPhone;
    document.getElementById("confirm_recievedAddress").textContent = jsonReciever.recievedAddress;
    document.getElementById("confirm_recievedCity").textContent = jsonReciever.recievedCity;

    // Fill hidden input for Bank to Home
    document.getElementById("recievedName").value = jsonReciever.recievedName;
    document.getElementById("recievedPhone").value = jsonReciever.recievedPhone;
    document.getElementById("recievedAddress").value = jsonReciever.recievedAddress;
    document.getElementById("recievedCity").value = jsonReciever.recievedCity;
    
}

// Fill Recieved Bank Field 
function fillRecievedBankField() {
    var jsonRecieverBank = JSON.parse(sessionStorage.dataRecieverBank);

    document.getElementById("recievedBankField").style.cssText = visibilityDisplay("visible", "block");

    // Confirmation text for Bank to Bank
    document.getElementById("confirm_recievedBankAcount").textContent = jsonRecieverBank.recievedBankAcount;
    document.getElementById("confirm_recievedAccountName").textContent = jsonRecieverBank.recievedAccountName;
    document.getElementById("confirm_recievedBankName").textContent = jsonRecieverBank.recievedBankName;

    // Fill hidden input for Bank to Bank
    document.getElementById("recievedBankAcount").value = jsonRecieverBank.recievedBankAcount;
    document.getElementById("recievedAccountName").value = jsonRecieverBank.recievedAccountName;
    document.getElementById("recievedBankName").value = jsonRecieverBank.recievedBankName;

}

// Get Storage Data 
function getStorageDta() {
    var jsonDetail = JSON.parse(sessionStorage.dataDetail);
    var jsonAddress = JSON.parse(sessionStorage.dataAddress);
    var jsonAmount = JSON.parse(sessionStorage.dataAmount);
    
    // Confirmation text for Your Details
    document.getElementById("confirm_name").textContent = jsonDetail.firstName + " " + jsonDetail.lastName;
    document.getElementById("confirm_phone").textContent = jsonDetail.phone;
    document.getElementById("confirm_email").textContent = jsonDetail.email;
    document.getElementById("confirm_dress").textContent = jsonAddress.street + ", " + jsonAddress.suburb + ", " + jsonAddress.state.toUpperCase() + ", " + jsonAddress.postcode;
    document.getElementById("confirm_comments").textContent = sessionStorage.dataComments;

    // Fill hidden input for Your Details
    document.getElementById("firstname").value = jsonDetail.firstName;
    document.getElementById("lastname").value = jsonDetail.lastName;
    document.getElementById("phone").value = jsonDetail.phone;
    document.getElementById("email").value = jsonDetail.email;
    document.getElementById("street").value = jsonAddress.street;
    document.getElementById("suburb").value = jsonAddress.suburb;
    document.getElementById("state").value = jsonAddress.state;
    document.getElementById("postcode").value = jsonAddress.postcode;
    document.getElementById("comments").value = sessionStorage.dataComments;

    // Confirmation text for Money Transfer
    document.getElementById("confirm_transferAmount").textContent = "$" + jsonAmount.transferAmount.toLocaleString();
    document.getElementById("confirm_country").textContent = jsonAmount.country.replace(/\b\w/g, u => u.toUpperCase());
    lableRecievedAmount(jsonAmount.country);
    document.getElementById("confirm_recievedAmount").textContent = jsonAmount.recievedAmount.toLocaleString();
    confirmServiceChoice(jsonAmount.serviceChoice);
    document.getElementById("confirm_fees").textContent = (Number(jsonAmount.fees) + Number(jsonAmount.transferAmount)).toLocaleString();
    
    // Fill hidden input for Money Transfer
    document.getElementById("transferAmount").value = jsonAmount.transferAmount;
    document.getElementById("country").value = jsonAmount.country;
    document.getElementById("recievedAmount").value = jsonAmount.recievedAmount;
    document.getElementById("fees").value = jsonAmount.fees;

    // Fill in recieved Address Field or recieved Bank Field
    switch (jsonAmount.serviceChoice) {
      case "banktobank":
        fillRecievedBankField();
      break;
      case "banktohome":
        fillRecievedAddressField();
      break;
      default:
        break;
    }
}

// Cancel payment
function cancelPayment() {
    sessionStorage.clear();
    window.location = "index.html";
}

// Validate Payment Form
function validatePayment() {
    var errMsg = "";
    var result = true;
    var mmCurrent = new Date().getMonth() + 1;
    var yyCurrent = new Date().getFullYear();
    var currentTime = new Date(yyCurrent, mmCurrent);

    var isVisa = document.getElementById("visa").checked;
    var isMastercard = document.getElementById("mastercard").checked;
    var isAmerican = document.getElementById("american").checked;
    var nameOnCard = document.getElementById("nameOnCard").value;
    var cardNumber = document.getElementById("cardNumber").value;
    var expiryMonth = document.getElementById("expiryMonth").value;
    var expiryYear = document.getElementById("expiryYear").value;
    var verification = document.getElementById("verification").value;

    var expiry = new Date("20" + expiryYear, expiryMonth);

    console.log("Expiry date: ", expiry);
    
    if (!(isVisa || isMastercard || isAmerican)) {
      errMsg = errMsg + "Please select Credit Card type\n";
      result = false;
    }
    if (!nameOnCard.match(/^[a-zA-Z\s]+$/)) {
      errMsg = errMsg + "Name on card must be alpha characters and/or space\n";
      result = false;
    }
    if (nameOnCard.length > 40) {
      errMsg = errMsg + "Name on card must be no more than 40 characters\n";
      result = false;
    }
    if (!cardNumber.match(/^[0-9]{15,16}$/)) {
      errMsg = errMsg + "Credit card number must be 15 or 16 digits\n";
      result = false;
    }
    if (!expiryMonth.match(/^[0-9]{2}$/)) {
      errMsg = errMsg + "Credit card expiry month must be 2 digits\n";
      result = false;
    }
    if ((expiryMonth <= 0) || (expiryMonth >12)) {
      errMsg = errMsg + "Credit card expiry month must be from 01 to 12\n";
      result = false;
    }

    if (!expiryYear.match(/^[0-9]{2}$/)) {
      errMsg = errMsg + "Credit card expiry year must be 2 digits\n";
      result = false;
    }

    if (expiry <= currentTime) {
        errMsg = errMsg + "Credit card expiry must be after the current time\n";
        result = false;
    }

    if (isVisa) {
        if (!cardNumber.match(/^[0-9]{16}$/)) {
            errMsg = errMsg + "Visa card number must be 16 digits\n";
            result = false;
        }
        if (cardNumber.toString()[0] != 4) {
            errMsg = errMsg + "Visa card number must start with 4\n";
            result = false;
        }
        if (!verification.match(/^[0-9]{3}$/)) {
            errMsg = errMsg + "Visa card verification number must be 3 digits\n";
            result = false;
        }
    }

    if (isMastercard) {
        if (!cardNumber.match(/^[0-9]{16}$/)) {
            errMsg = errMsg + "Master card number must be 16 digits\n";
            result = false;
        }
        if ((cardNumber.toString().slice(0, 2) < 51 || (cardNumber.toString().slice(0, 2) > 55))) {
            errMsg = errMsg + "Master card number must start with digits 51 through 55\n";
            result = false;
        }
        if (!verification.match(/^[0-9]{3}$/)) {
            errMsg = errMsg + "Master card verification number must be 3 digits\n";
            result = false;
        }
    }

    if (isAmerican) {
        if (!cardNumber.match(/^[0-9]{15}$/)) {
            errMsg = errMsg + "American Express card number must be 15 digits\n";
            result = false;
        }
        if (!(cardNumber.toString().slice(0, 2) == 34 || (cardNumber.toString().slice(0, 2) == 37))) {
            errMsg = errMsg + "American Express card number must start with digits 34 or 37\n";
            result = false;
        }
        if (!verification.match(/^[0-9]{4}$/)) {
            errMsg = errMsg + "Visa card verification number must be 4 digits\n";
            result = false;
        }
    }

    if (errMsg != "") {
        alert(errMsg);
        result = false;
    }
    return result;
}


// Init function
function init() {
    var paymentForm = document.getElementById("paymentForm");
    var cancelButton = document.getElementById("cancelButton");
    document.getElementById("recievedAddressField").style.cssText = visibilityDisplay("hidden", "none");
    document.getElementById("recievedBankField").style.cssText = visibilityDisplay("hidden", "none");
    
    getStorageDta();
    cancelButton.onclick = cancelPayment;
    paymentForm.onsubmit = validatePayment;          
}

// Window finished load
window.onload = init;