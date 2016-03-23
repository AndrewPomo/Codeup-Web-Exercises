"use strict";

(function() {

//Step One: Make calculator visual. DONE
//Step Two: Figure out how to get a number into first input.
//Step Three: Make it possible to add multiple numbers
//Step Three:Figure out how to get operand into operand input.
//Step Four: Figure out how to get anum



 	//Fields
 	var leftOperand = document.getElementById('left_operand');
 	var rightOperand = document.getElementById('right_operand');
 	var operatorField = document.getElementById('operator');    	
 	

 	
 	//Operator Buttons
 	var addBtn = document.getElementById('addBtn');
 	var subtractBtn = document.getElementById('subtractBtn');
 	var multiplyBtn = document.getElementById('multiplyBtn');
 	var divideBtn = document.getElementById('divideBtn');
 	var equalsBtn = document.getElementById('equalsBtn');
 	var clearBtn = document.getElementById('clearBtn');

 	// //Number Buttons
 	// var zeroBtn = document.getElementById('zeroBtn')
 	// var oneBtn = document.getElementById('oneBtn')
 	// var twoBtn = document.getElementById('twoBtn')
 	// var threeBtn = document.getElementById('threeBtn')
 	// var fourBtn = document.getElementById('fourBtn')
 	// var fiveBtn = document.getElementById('fiveBtn')
 	// var sixBtn = document.getElementById('sixBtn')
 	// var sevenBtn = document.getElementById('sevenBtn')
 	// var eightBtn = document.getElementById('eightBtn')
 	// var nineBtn = document.getElementById('nineBtn')

 	 // Get all number buttons
 	var insNumber = function (event) { 
    	var operatorField = document.getElementById('operator');    	
    	if (operatorField.value == "Operator" && leftOperand.value == "First #") {
    		leftOperand.value = this.value;
	    } else if (operatorField.value == "Operator" && leftOperand.value != "First #") {
	    	leftOperand.value = leftOperand.value + this.value;
	    }
    }

    var insOperator = function (event) { 
    	var leftOperand = document.getElementById('left_operand');
 		var rightOperand = document.getElementById('right_operand');
    	if (leftOperand.value != "First #") {
    		operatorField.value = this.value;
	    } 
    }

    // Add Click Listener To Number Buttons (And Log Their Values)
    var numButtons = document.getElementsByClassName('num_button');
	    for(var i = 0; i < numButtons.length; i++) {
    	numButtons[i].addEventListener('click', insNumber);
    	console.log(numButtons[i].value);
    	}

    // // Add Click Listener To Operator Buttons
    var opButtons = document.getElementsByClassName('op_button');
	    for(var i = 0; i < opButtons.length; i++) {
    	opButtons[i].addEventListener('click', insOperator);
    	console.log(opButtons[i].value);
    	}

    // // Add Click Listener To Equals Button
    //  var numButton = document.getElementsByClassName('equals_button');
    //         numButton.addEventListener('click', calculate);

    // // Add Click Listener To Clear Button
    //  var numButton = document.getElementsByClassName('clear_button');
    //         numButton.addEventListener('click', clear);

   


})();
