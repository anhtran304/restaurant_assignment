/* Author: Anh Tran - 101953626
* Target: enquire.html
* Purpose: JavaScript used with 'enquire.html'
* Created: 12/09/2018
* Last updated: 12/09/2018
* Credits: 
*/

"use strict";
//Global variables accessible to all functions
var formField;
var recievedAddressField;
var recievedBankField;
var recievedAmountField;
var transferAmountField;
var recievedAmountLable;
var serviceChoice;
var feesField;
var transferAmount = 1000;
var country = "vietnam";
var recievedAmount;
var countrySelect;
var currencies = ["AUD_VND", "AUD_CAD", "AUD_INR", "AUD_GBP"];
var exchangRate;
var audVnd;
var audCad;
var audInd;
var audUK;


var service;
var banktopickup;
var banktobank;
var banktohome;

// Return CSS visibility and display for BankField and AddressField
function visibilityDisplay(str1, str2) {
    return `visibility: ${str1}; display: ${str2}`;
}


// Change CSS visibility and display for BankField and AddressField
function handleServiceChoice(e) {    
  switch (e.target.value) {
    case "banktobank":
        recievedBankField.style.cssText = visibilityDisplay("visible", "block");
        recievedAddressField.style.cssText = visibilityDisplay("hidden", "none");
        serviceChoice = "banktobank";
      break;
    case "banktopickup":
        recievedBankField.style.cssText = visibilityDisplay("hidden", "none");
        recievedAddressField.style.cssText = visibilityDisplay("hidden", "none");
        serviceChoice = "banktopickup";
      break;
    case "banktohome":
        recievedBankField.style.cssText = visibilityDisplay("hidden", "none");
        recievedAddressField.style.cssText = visibilityDisplay("visible", "block");
        serviceChoice = "banktohome";
      break;
  }
}

// Update Recieved Amount Field
function updateRecievedAmountField(trfAmount, exRate) {
    recievedAmount = Math.round(trfAmount * exRate * 100) / 100;
    recievedAmountField.value = recievedAmount.toLocaleString();
}
// Update Transfer Amount Field
function updateTransferAmountField(reAmount, exRate) {
    transferAmount = Math.round(reAmount / exRate * 100) / 100;
    transferAmountField.value = transferAmount.toLocaleString();
}

// Update fees
function updateFees(amount, country) {
    if (isNaN(amount) || (amount <= 0)) {
        feesField.innerHTML = 0;
    } else {
        switch (country) {
        case "vietnam":
            if ((0 < amount) && (amount<= 1000)) {                
            feesField.innerHTML = 6;
            } else if ((1000 < amount) && (amount <= 3000)) {    
            feesField.innerHTML = 13;
            } else if (amount > 3000) {
            feesField.innerHTML = 80;
            }
            break;
        case "canada":
            if (0 < amount && amount <= 1000) {
              feesField.innerHTML = 6;
            } else if (1000 < amount && amount <= 3000) {
              feesField.innerHTML = 12;
            } else if (amount > 3000) {
              feesField.innerHTML = 70;
            }
            break;
        case "india":
                if (0 < amount && amount <= 1000) {
            feesField.innerHTML = 4;
                } else if (1000 < amount && amount <= 3000) {
            feesField.innerHTML = 10;
                } else if (amount > 3000) {
            feesField.innerHTML = 50;
            }
            break;
        case "uk":
                if (0 < amount && amount <= 1000) {
                  feesField.innerHTML = 5;
                } else if (1000 < amount && amount <= 3000) {
                  feesField.innerHTML = 11;
                } else if (amount > 3000) {
                  feesField.innerHTML = 70;
                }
            break;
        default:
            break;
        }
    }
    
}

// Fetching data for exchange rate
function fetchCurrency(currencyPair) {
    fetch(`http://free.currencyconverterapi.com/api/v5/convert?q=${currencyPair}&compact=y`)
        .then(function(response) {
            return response.json();
        })
        .then(function(data) {
            switch (currencyPair) {
                case "AUD_VND":
                    audVnd = data;
                    updateRecievedAmountField(transferAmount, data.AUD_VND.val);
                    exchangRate = audVnd.AUD_VND.val;
                    recievedAmountLable.innerHTML = "Recieved Amount - VND";
                    serviceChoice = "banktopickup";
                break;
                case "AUD_CAD":
                    audCad = data;
                break;
                case "AUD_INR":
                    audInd = data;
                break;
                case "AUD_GBP":
                    audUK = data;
                break;
                default:
                break;
            }
        })
        .catch(function() {
            console.log("Something went wrong");
        });
}

// Handle Select country 
function handleSelectCountry(e) {
  var select = e.target.options[e.target.options.selectedIndex].value;
  switch (select) {
    case "vietnam":
        country = "vietnam";
        exchangRate = audVnd.AUD_VND.val;
        recievedAmountLable.innerHTML = "Recieved Amount - VND";
        break;
    case "canada":
        country = "canada";
        exchangRate = audCad.AUD_CAD.val;
        recievedAmountLable.innerHTML = "Recieved Amount - CAD";
        break;
    case "india":
        country = "india";
        exchangRate = audInd.AUD_INR.val;
        recievedAmountLable.innerHTML = "Recieved Amount - INR";
        break;
    case "uk":
        country = "uk";
        exchangRate = audUK.AUD_GBP.val;
        recievedAmountLable.innerHTML = "Recieved Amount - GBP";
        break;
    default:
        break;
  }
    updateRecievedAmountField(transferAmount, exchangRate);
    updateFees(transferAmount, country);
}

// Handle Transfer Amount change 
function handleTransferAmount(e) {
    transferAmount = parseFloat(e.target.value.replace(/,/g, ""));
    if (!isNaN(transferAmount)) {
        updateRecievedAmountField(transferAmount, exchangRate);
        transferAmountField.value = transferAmount.toLocaleString();
    }
    updateFees(transferAmount, country);
}

// Handle Recieved Amount change
function handleRecievedAmount(e) {
    recievedAmount = parseFloat(e.target.value.replace(/,/g, ""));
    if (!isNaN(recievedAmount)) {
        updateTransferAmountField(recievedAmount, exchangRate);
        recievedAmountField.value = recievedAmount.toLocaleString();
    }
}

// Validate Form
function validateForm(e) {
    var errMsg = "";
    var result = true;
    var recievedBankAcount = document.getElementById("recievedBankAcount").value;
    var firstName = document.getElementById("firstname").value;
    var lastName = document.getElementById("lastname").value;
    var phone = document.getElementById("phone").value;
    var email = document.getElementById("email").value;
    var street = document.getElementById("street").value;
    var suburb = document.getElementById("suburb").value;
    var state = document.getElementById("state").value;
    var postcode = document.getElementById("postcode").value;
    var recievedAccountName = document.getElementById("recievedAccountName").value;
    var recievedBankName = document.getElementById("recievedBankName").value;
    var recievedName = document.getElementById("recievedName").value;
    var recievedPhone = document.getElementById("recievedPhone").value;
    var recievedAddress = document.getElementById("recievedAddress").value;
    var recievedCity = document.getElementById("recievedCity").value;  
    var dataDetail, dataAddress, dataAmount;   

    if (transferAmount <= 0) { 
        errMsg += "Please enter transfer amount.\n";
    } 
    if (serviceChoice == "banktobank") {
        if (recievedBankAcount == "") {
            errMsg += "Please enter recieved bank account.\n";
        }
        if (recievedAccountName == "") {
          errMsg += "Please enter recieved account name.\n";
        }
        if (recievedBankName == "") {
          errMsg += "Please enter recieved bank name.\n";
        }
    }
    if (serviceChoice == "banktohome") {
        if (recievedName == "") {
          errMsg += "Please enter reciever name.\n";
        }
        if (recievedPhone == "") {
          errMsg += "Please enter reciever phone number.\n";
        }
        if (recievedAddress == "") {
            errMsg += "Please enter reciever address.\n";
        }
        if (recievedCity == "") {
          errMsg += "Please enter reciever city.\n";
        }
    }
    if (errMsg != "") {
        alert(errMsg);
        result = false;
    }

    dataDetail = { 
        firstName,
        lastName, 
        phone,
        email
    };    

    dataAddress = {
        street,
        suburb,
        state,
        postcode
    };

    dataAmount = { transferAmount, country, recievedAmount, serviceChoice, fees: feesField.innerText };

    if (result) {
        storeEnquire(JSON.stringify(dataDetail), JSON.stringify(dataAddress), JSON.stringify(dataAmount));
    }

    return result;
}

function storeEnquire(dataDetail, dataAddress, dataAmount) {
    sessionStorage.dataDetail = dataDetail;
    sessionStorage.dataAddress = dataAddress;
    sessionStorage.dataAmount = dataAmount;
}

// Init function
function init() {
    
    currencies.forEach(function (currrency) {        
        fetchCurrency(currrency);
    });
    
    document.getElementById("transferAmount").value = transferAmount.toLocaleString();

    banktopickup = document.getElementById("banktopickup");
    banktobank = document.getElementById("banktobank");
    banktohome = document.getElementById("banktohome");
    banktopickup.onclick = handleServiceChoice;
    banktobank.onclick = handleServiceChoice;
    banktohome.onclick = handleServiceChoice;

    recievedAddressField = document.getElementById("recievedAddressField");
    recievedAddressField.style.cssText = visibilityDisplay("hidden", "none");   
    
    recievedBankField = document.getElementById("recievedBankField");
    recievedBankField.style.cssText = visibilityDisplay("hidden", "none");

    recievedAmountField = document.getElementById("recievedAmount");
    recievedAmountField.oninput = handleRecievedAmount;

    countrySelect = document.getElementById("country");
    countrySelect.onchange = handleSelectCountry;
    
    transferAmountField = document.getElementById("transferAmount");
    transferAmountField.oninput = handleTransferAmount;

    recievedAmountLable = document.getElementById("lable_recievedAmount");

    feesField = document.getElementById("fees");

    formField = document.getElementById("enquireForm");
    formField.onsubmit = validateForm;
}

// Window finished load
window.onload = init;