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
 	var displayField = document.getElementById('display_field');    	

//Operator Buttons
 	var addBtn = document.getElementById('addBtn');
 	var subtractBtn = document.getElementById('subtractBtn');
 	var multiplyBtn = document.getElementById('multiplyBtn');
 	var divideBtn = document.getElementById('divideBtn');
//Equals Button
 	var equalsBtn = document.getElementById('equalsBtn');

//Clear Button
 	var clearBtn = document.getElementById('clearBtn');

//Insert Number Function
 	var insNumber = function (event) {
 		console.log('Event target is ' + event.target.id); 
 		if (operatorField.value == "" && leftOperand.value == "") {
	    		leftOperand.value = this.value; 
	    		displayField.value = leftOperand.value;
		    } else if (operatorField.value == "" && leftOperand.value != "") {
		    	checkAndInsert(this.value, leftOperand);
		    	checkAndInsert(this.value, displayField);
		    	//leftOperand.value += this.value;
		    	//displayField.value = leftOperand.value;
		    } else if (operatorField.value != "" && leftOperand.value != "" && rightOperand.value == "") {
		    	rightOperand.value = this.value;
		    	displayField.value = rightOperand.value;
			} else if (operatorField.value != "" && leftOperand.value != "" && rightOperand.value != "") {
				checkAndInsert(this.value, rightOperand);
				checkAndInsert(this.value, displayField);
		    	//rightOperand.value += this.value;
		    	//displayField.value = rightOperand.value;
		    }
    }	

var checkAndInsert = function(inputBtnValue, displayTarget){
		console.log('I am checking....');
		if (displayTarget.value.indexOf(".") > 0 && inputBtnValue == '.') {
			//return displayTarget.value;
			console.log('Already have a decimal!');
		} else if(inputBtnValue == '.') { 
			displayTarget.value += '.';
		}
		else{
			displayTarget.value += inputBtnValue;
		}    
 }

//Insert Operator Function
    var insOperator = function (event) { 
    	if (leftOperand.value != "First #") {
    		operatorField.value = this.value;
    		displayField.value = leftOperand.value;
	    } 
    }

//Calculate Function
	var calculate = function (event) { 
		var rightNumber = parseFloat(rightOperand.value);
		var leftNumber = parseFloat(leftOperand.value);

		if (leftOperand.value == "First #" || rightOperand.value == "Second #" || operatorField.value == "Operator") {
    		alert("You need a first number, an operator and a second number in order to use the equals sign!");
    	}else if(operatorField.value == "+") {
    		var answer = leftNumber + rightNumber;
    	}else if(operatorField.value == "-") {
    		var answer = leftNumber - rightNumber;
    	}else if(operatorField.value == "*") {
    		var answer = leftNumber * rightNumber;
    	}else if(operatorField.value == "/") {
    		var answer = leftNumber / rightNumber;
    	}
    	leftOperand.value = answer;
    	operator.value = "";
    	rightOperand.value = "";
		displayField.value = answer;
	}

	//Clear all
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

    // Positive/Negative
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

    // Insert Decimal
  //   var insDecimal = function (event) { 
  //   	if (operatorField.value == "" && leftOperand.value == "") {
  //   		if (leftOperand.value.indexOf(".") > 0) {
  //   		return;
  //   		} else { 
  //   			leftOperand.value = this.value;
  //   			displayField.value = this.value;
  //   		}
  //   	}
	 //    } else if (operatorField.value == "" && leftOperand.value != "") {
	 //    	if (leftOperand.value.indexOf(".") > 0) {
  //   		return;
  //   		} else {
	 //    		leftOperand.value = leftOperand.value + this.value;
	 //    		displayField.value = leftOperand.value;
	 //    	}
  //   	} else if (operatorField.value != "" && leftOperand.value != "" && rightOperand.value == "") {
	 //    	if (rightOperand.value.indexOf(".") > 0 ) {
	 //    		return;
	 //    	} else {
		//     	rightOperand.value = this.value;
		//     	displayField.value = rightOperand.value;
		//     }
		// } else if (operatorField.value != "" && leftOperand.value != "" && rightOperand.value != "") {
	 //    	if (rightOperand.value.indexOf(".") > 0 ) {
  //   		return;
  //   		} else {
		//     	rightOperand.value = rightOperand.value + this.value;
		//     	displayField.value = rightOperand.value;
		//     }
	 //    }
    
    // }

    	

    // Add Click Listener To Number Buttons
    var numButtons = document.getElementsByClassName('num_button');
	    for(var i = 0; i < numButtons.length; i++) {
    	numButtons[i].addEventListener('click', insNumber);
    	// console.log(numButtons[i].value);
    	}

    // // Add Click Listener To Operator Buttons
    var opButtons = document.getElementsByClassName('op_button');
	    for(var i = 0; i < opButtons.length; i++) {
    	opButtons[i].addEventListener('click', insOperator);
    	// console.log(opButtons[i].value);
    	}

    // // Add Click Listener To Equals Button
    var equalsBtn = document.getElementById('equalsBtn');
    	equalsBtn.addEventListener('click', calculate);

    // // Add Click Listener To Clear Button
    var clearBtn = document.getElementById('clearBtn');
    	clearBtn.addEventListener('click', clear);

    // Add Click Listener To PosNeg Button
	var posNegButton = document.getElementById('pos_neg');
        posNegButton.addEventListener('click', changePosNeg);

    // Add Click Listener To Percent Button
    var percentButton = document.getElementById('percent');
        percentButton.addEventListener('click', percentify);

    // Add Click Listener To Decimal Button
    // var decimalButton = document.getElementById('decimal');
    //     decimalButton.addEventListener('click', insDecimal);
   

   


})();
