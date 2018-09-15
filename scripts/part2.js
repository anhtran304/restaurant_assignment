/* Author: Anh Tran - 101953626
* Target: clickme.html
* Purpose: JavaScript used with 'enquire.html'
* Created: 12/09/2018
* Last updated: 12/09/2018
* Credits: 
*/

"use strict";
//Global variables accessible to all functions
var recievedAddressField;
var recievedBankField;
var recievedAmountField;
var transferAmountField;
var feesField;
var service;
var serviceValue;
var transferRate;
var transferAmount = 1000;
var recievedAmount;
var countrySelect;
var country;
var currencies = ["AUD_VND", "AUD_CAD", "AUD_INR", "AUD_GBP"];
var exchangRate;
var audVnd;
var audCad;
var audInd;
var audUK;

// Return CSS visibility and display for BankField and AddressField
function visibilityDisplay(str1, str2) {
    return `visibility: ${str1}; display: ${str2}`;
}


// Change CSS visibility and display for BankField and AddressField
function serviceChoice(serviceChoice) {
    switch (serviceChoice) {
        case "banktobank":
            recievedBankField.style.cssText = visibilityDisplay("visible", "block");
            recievedAddressField.style.cssText = visibilityDisplay("hidden", "none");
            break;
        case "banktopickup":
            recievedBankField.style.cssText = visibilityDisplay("hidden", "none");
            recievedAddressField.style.cssText = visibilityDisplay("hidden", "none");  
            break;
        case "banktohome":
            recievedBankField.style.cssText = visibilityDisplay("hidden", "none");
            recievedAddressField.style.cssText = visibilityDisplay("visible", "block");  
        break;
        default:
            break;
    }
}

// Update Recieved Amount Field
function updateRecievedAmountField(trfAmount, exRate) {
    recievedAmount = Math.round(trfAmount * exRate * 100) / 100;
    recievedAmountField.value = recievedAmount;
}
// Update Transfer Amount Field
function updateTransferAmountField(reAmount, exRate) {
    transferAmount = Math.round(reAmount / exRate * 100) / 100;
    transferAmountField.value = transferAmount;
    updateFees(transferAmount, country);
}

// Update fees
function updateFees(amount, country) {
    switch (country) {
      case "vietnam":
        if (amount <= 1000) {
          feesField.innerHTML = 6;
        } else if (amount <= 3000) {
          feesField.innerHTML = 13;
        } else {
          feesField.innerHTML = 80;
        }
        break;
      case "canada":
        if (amount <= 1000) {
          feesField.innerHTML = 6;
        } else if (amount <= 3000) {
          feesField.innerHTML = 12;
        } else {
          feesField.innerHTML = 70;
        }
        break;
      case "india":
        if (amount <= 1000) {
          feesField.innerHTML = 4;
        } else if (amount <= 3000) {
          feesField.innerHTML = 10;
        } else {
          feesField.innerHTML = 50;
        }
        break;
        case "uk":
        if (amount <= 1000) {
          feesField.innerHTML = 5;
        } else if (amount <= 3000) {
          feesField.innerHTML = 11;
        } else {
          feesField.innerHTML = 70;
        }
        break;

      default:
        break;
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
                    country = "vietnam";
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
        break;
    case "canada":
        country = "canada";
        exchangRate = audCad.AUD_CAD.val;
        break;
    case "india":
        country = "india";
        exchangRate = audInd.AUD_INR.val;
        break;
    case "uk":
        country = "uk";
        exchangRate = audUK.AUD_GBP.val;
        break;
    default:
        break;
  }
    updateRecievedAmountField(transferAmount, exchangRate);
    updateFees(transferAmount, country);
}

// Handle Transfer Amount change 
function handleTransferAmount(e) {
    transferAmount = e.target.value;
    updateFees(transferAmount, country);
    updateRecievedAmountField(transferAmount, exchangRate);
}

// Handle Recieved Amount change
function handleRecievedAmount(e) {
    recievedAmount = e.target.value;
    updateTransferAmountField(recievedAmount, exchangRate);
}

// Init function
function init() {
    
    currencies.forEach(function (currrency) {        
        fetchCurrency(currrency);
    });
    
    document.getElementById("transferAmount").value = transferAmount;
    service = document.getElementsByName("service");
    for (var i = 0; i < service.length; i++) {
        service[i].onclick = function () {
            serviceChoice(this.value);
        }
    }

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

    feesField = document.getElementById("fees");
}

// Window finished load
window.onload = init;