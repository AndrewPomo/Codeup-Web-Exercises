"use strict"
// ignore these lines for now
// just know that the variable 'color' will end up with a random value from the colors array
var colors = ['red', 'orange', 'yellow', 'green', 'blue', 'indigo', 'violet'];
var color = colors[Math.floor(Math.random()*colors.length)];

var favorite = 'blue'; // TODO: change this to your favorite color from the list


// For the assignment, this is wrong. I still think it it's cool, though.

// if (colors.indexOf('red') > -1){
// 	console.log('Red is here. It is the color of stop signs.')
// }

// if (colors.indexOf('orange') > -1){
// 	console.log('Orange is here. It is the color of oranges.')
// }

// if (colors.indexOf('yellow') > -1){
// 	console.log('Yellow is here. It is the color of lemons.')
// }

// if (colors.indexOf('green') > -1){
// 	console.log('Green is here. It is the color of grass.')
// }

// if (colors.indexOf('blue') > -1){
// 	console.log('Blue is here. It is the color of the best snow cone flavor.')
// }

// TODO: Create a block of if/else statements to check for every color except indigo and violet.
// TODO: When a color is encountered log a message that tells the color, and an object of that color.
//       Example: Blue is the color of the sky.

// TODO: Have a final else that will catch indigo and violet.
// TODO: In the else, log: I do not know anything by that color.

if (color == 'red') {
	console.log('This is red - the color of apples.');
} else if (color == 'orange') {
	console.log('This is orange - the color of oranges.');
} else if (color == 'yellow') {
	console.log('This is yellow - the color of lemons.');
} else if (color == 'green') {
	console.log('This is green - the color of limes.');
} else if (color == 'blue') {
	console.log('This is blue - the color of the objectively best snow cone flavor.');
} else {
	console.log('I do not know anything by that color.');
} 

// TODO: Using the ternary operator, conditionally log a statement that
//       says whether the random color matches your favorite color.
console.log(color == favorite ? "That's why it's my favorite color." : "But it's not my favorite color.");




