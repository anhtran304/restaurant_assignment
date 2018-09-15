/* Author: Anh Tran - 101953626
* Target: clickme.html
* Purpose: JavaScript used with 'enquire.html'
* Created: 12/09/2018
* Last updated: 12/09/2018
* Credits: 
*/

"use strict";
//Global variables accessible to all functions
var recievedAddressField = null;
var recievedBankField = null;
var service = null;
var serviceValue = null;

/* Calculate the sum and average of the array of number
*  Display the results on the web page
*/

function enterNumber() {
    var number = prompt("Enter your number");
    var number = Number(number);   
    if (isFinite(number)) {    
        numbers.push(number);    
    }
    else {
        alert("Please enter a valid number");
    }
    document.getElementById("numberList").innerHTML = "The numbers you have entered so far are: " + numbers;  
    enterButton.textContent = "Enter your next number";	
    calculateButton.style.visibility = "visible";     
}
/* Calculate the sum and average of the array of number
*  Display the results on the web page
*/
function calculateAverage() {
    var average = 0;
    var total = 0;
    for (var i = 0; i < numbers.length; i++) {
        total += numbers[i];  
    }
    average = total / i;
    document.getElementById("result").innerHTML = "The total of your numbers is " + total + " and their average is " + average;
}

function serviceChoice(serviceChoice) {
    switch (serviceChoice) {
        case "banktobank":
            recievedBankField.style.cssText = "visibility: visible; display: block;";
            recievedAddressField.style.cssText = "visibility: hidden; display: none";
        break;
        case "banktopickup":
            recievedBankField.style.cssText = "visibility: hidden; display: none";
            recievedAddressField.style.cssText = "visibility: hidden; display: none";  
        break;
        case "banktohome":
            recievedBankField.style.cssText = "visibility: hidden; display: none";
            recievedAddressField.style.cssText = "visibility: visible; display: block;";   
        break;
        default:
        break;
    }
}

function init() {
    
    recievedAddressField = document.getElementById("recievedAddressField");
    recievedAddressField.style.cssText = "visibility: hidden; display: none";   

    recievedBankField = document.getElementById("recievedBankField");
    recievedBankField.style.cssText = "visibility: hidden; display: none";  

    service = document.getElementsByName("service");
    for (var i = 0; i < service.length; i++) {
        service[i].onclick = function () {
            serviceChoice(this.value);
        }
    }
}

window.onload = init;