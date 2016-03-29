"use strict";

(function() {

//Fields
 	var leftOperand = document.getElementById('left_operand');
 	var rightOperand = document.getElementById('right_operand');
 	var operatorField = document.getElementById('operator');    	
 	var displayField = document.getElementById('display_field');

//Other Buttons
 	var equalsBtn = document.getElementById('equalsBtn');
 	var clearBtn = document.getElementById('clearBtn');


//Number or Decimal Input Field Decider
var insNumber = function (event) {
	console.log('Event target is ' + event.target.id); 
	if (operatorField.value == "" && leftOperand.value == "") {
		leftOperand.value = this.value; 
		displayField.value = leftOperand.value;
    } else if (operatorField.value == "" && leftOperand.value != "") {
    	checkAndInsert(this.value, leftOperand);
    	checkAndInsert(this.value, displayField);
    } else if (operatorField.value != "" && leftOperand.value != "" && rightOperand.value == "") {
    	rightOperand.value = this.value;
    	displayField.value = rightOperand.value;
	} else if (operatorField.value != "" && leftOperand.value != "" && rightOperand.value != "") {
		checkAndInsert(this.value, rightOperand);
		checkAndInsert(this.value, displayField);
    }
}	

//Check For Decimal and Insert Item
var checkAndInsert = function(inputBtnValue, targetField){
	if (targetField.value.indexOf(".") > -1 && inputBtnValue == '.') {
	} else if(inputBtnValue == '.') { 
		targetField.value += '.';
	}
	else{
		targetField.value += inputBtnValue;
	}    
 }

//Insert Operator
var insOperator = function (event) { 
	if (leftOperand.value != "") {
		operatorField.value = this.value;
		displayField.value = leftOperand.value;
    } 
}

//Calculate
var calculate = function (event) { 
	var rightNumber = parseFloat(rightOperand.value);
	var leftNumber = parseFloat(leftOperand.value);

	if (leftOperand.value == "") {
		var answer = "0";
	} else if (operatorField.value == "") {
		var answer = leftNumber;
	} else if (operatorField.value == "+" && rightOperand.value == "") {
		var answer = leftNumber + leftNumber;
	} else if(operatorField.value == "-" && rightOperand.value == "") {
		var answer = leftNumber - leftNumber;
	} else if(operatorField.value == "*" && rightOperand.value == "") {
		rightOperand.value == leftNumber;
		var answer = leftNumber * leftNumber;
	} else if(operatorField.value == "/" && rightOperand.value == "") {
		var answer = leftNumber / leftNumber;
	} else if(operatorField.value == "+") {
		var answer = leftNumber + rightNumber;
	} else if(operatorField.value == "-") {
		var answer = leftNumber - rightNumber;
	} else if(operatorField.value == "*") {
		var answer = leftNumber * rightNumber;
	} else if(operatorField.value == "/") {
		var answer = leftNumber / rightNumber;
	}
	leftOperand.value = answer;
	rightOperand.value = "";
	displayField.value = answer;
}

//Clear Everything
var clear = function (event) { 
	leftOperand.value = "";
	rightOperand.value = "";
	operatorField.value = "";
	displayField.value = "";
}
    		
// Positive/Negative
var changePosNeg = function (event) { 
    if (operatorField.value == "" && leftOperand.value != "") {
    	leftOperand.value = (leftOperand.value * -1);
    	displayField.value = leftOperand.value;
    } else if (operatorField.value != "" && leftOperand.value != "" && rightOperand.value == "") {
    	rightOperand.value = (rightOperand.value * -1);
    	displayField.value = rightOperand.value;
	} else if (operatorField.value != "" && leftOperand.value != "" && rightOperand.value != "") {
    	(rightOperand.value = rightOperand.value * -1);
    	displayField.value = rightOperand.value;
    }
}	

// Make Percentage
var percentify = function (event) { 
    if (operatorField.value == "" && leftOperand.value != "") {
    	leftOperand.value = (leftOperand.value * .01);
    	displayField.value = leftOperand.value;
    } else if (operatorField.value != "" && leftOperand.value != "" && rightOperand.value == "") {
    	rightOperand.value = (rightOperand.value * .011);
    	displayField.value = rightOperand.value;
	} else if (operatorField.value != "" && leftOperand.value != "" && rightOperand.value != "") {
    	(rightOperand.value = rightOperand.value * .01);
    	displayField.value = rightOperand.value;
    }
}

// Add Click Listener To Number Buttons
var numButtons = document.getElementsByClassName('num_button');
    for(var i = 0; i < numButtons.length; i++) {
	numButtons[i].addEventListener('click', insNumber);
	}

// // Add Click Listener To Operator Buttons
var opButtons = document.getElementsByClassName('op_button');
    for(var i = 0; i < opButtons.length; i++) {
	opButtons[i].addEventListener('click', insOperator);
	}

// Add Click Listener To Equals Button
var equalsBtn = document.getElementById('equalsBtn');
	equalsBtn.addEventListener('click', calculate);

// Add Click Listener To Clear Button
var clearBtn = document.getElementById('clearBtn');
	clearBtn.addEventListener('click', clear);

// Add Click Listener To PosNeg Button
var posNegButton = document.getElementById('pos_neg');
    posNegButton.addEventListener('click', changePosNeg);

// Add Click Listener To Percent Button
var percentButton = document.getElementById('percent');
    percentButton.addEventListener('click', percentify);

})();
