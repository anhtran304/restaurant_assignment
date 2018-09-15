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
var service;
var serviceValue;
var transferRate;
var transferAmount = 1000;
var audVnd;
var audCan;
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

function fetchCurrency() {
    return fetch(`http://free.currencyconverterapi.com/api/v5/convert?q=AUD_VND&compact=y`)
    .then(function(response) {
      return response.json();
    })
    .then(function(data) {
        audVnd = data.AUD_VND.val;
    })
    .catch(function() {
      console.log("Something went wrong");
    });
}

// Init function
function init() {

    fetchCurrency("AUD_VND").then(function() {
        console.log(audVnd);
        document.getElementById("recievedAmount").value = Math.round(audVnd);
    });

    recievedAddressField = document.getElementById("recievedAddressField");
    recievedAddressField.style.cssText = visibilityDisplay("hidden", "none");   

    recievedBankField = document.getElementById("recievedBankField");
    recievedBankField.style.cssText = visibilityDisplay("hidden", "none");  

    service = document.getElementsByName("service");
    for (var i = 0; i < service.length; i++) {
        service[i].onclick = function () {
            serviceChoice(this.value);
        }
    }

    document.getElementById("transferAmount").value = transferAmount;
}

// Window finished load
window.onload = init;