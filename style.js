console.log("hello from style.js");
//variables
var a = 1;
console.log(a);
var a = 2;
console.log(a); //can be redeclared and updated
let b = 1;
console.log(b);
b = 2;
console.log(b); //let cannot be redeclared but can be updated
const c = 1;
console.log(c); //const cannot be redeclared or updated
//data types
let name = "EcoCorners";
console.log(typeof name); //string
let num = 5;
console.log(typeof num); //number
let isEco = true;
console.log(typeof isEco); //boolean
let fruits = ["apple", "banana", "mango"];
console.log(typeof fruits); //object (array)
let person = { name: "ecoCorners", type: "website" };
console.log(typeof person); //object
let nullVar = null;
console.log(typeof nullVar); //object (null)
let undefVar;
console.log(typeof undefVar); //undefined
//alert("Welcome to EcoCorners!");
// functions
function greet(userName) {
  alert("Hello, " + userName + "! Welcome to EcoCorners.");
}
greet(prompt("enter your name:"));
