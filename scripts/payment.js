/* Author: Anh Tran - 101953626
* Target: payment.html
* Purpose: JavaScript used with 'enquire.html'
* Created: 12/09/2018
* Last updated: 12/09/2018
* Credits: 
*/

"use strict";
//Global variables accessible to all functions

// Get Storage Data 
function getStorageDta() {
    var jsonDetail = JSON.parse(sessionStorage.dataDetail);
    var jsonAddress = JSON.parse(sessionStorage.dataAddress);
    var jsonAmount = JSON.parse(sessionStorage.dataAmount);
    
    // Confimation text
    document.getElementById("confirm_name").textContent = jsonDetail.firstName + " " + jsonDetail.lastName;
    document.getElementById("confirm_phone").textContent = jsonDetail.phone;
    document.getElementById("confirm_email").textContent = jsonDetail.email;

    // Fill hidden input
    document.getElementById("firstname").value = jsonDetail.firstName;
    document.getElementById("lastname").value = jsonDetail.lastName;
    document.getElementById("phone").value = jsonDetail.lastName;
    document.getElementById("email").value = jsonDetail.lastName;

}

// Cancel payment
function cancelPayment() {
    window.location = "index.html";
}

// Validate Payment Form
function validatePayment() {
    console.log("Validating");
    
}


// Init function
function init() {
    var paymentForm = document.getElementById("paymentForm");
    var cancelButton = document.getElementById("cancelButton");
    
    getStorageDta();
    cancelButton.onclick = cancelPayment;
    paymentForm.onsubmit = validatePayment;          
}

// Window finished load
window.onload = init;