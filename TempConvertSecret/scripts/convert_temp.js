window.addEventListener("DOMContentLoaded", domLoaded);

// When the DOM has finished loading, add the event listeners.
function domLoaded() {
   const convertButton = document.getElementById("convertButton");
   const fahrenheitInput = document.getElementById("F_in");
   const celsiusInput = document.getElementById("C_in");
   // TODO: Use addEventListener() to register a click event handler for the convert button.
   // https://developer.mozilla.org/en-US/docs/Web/API/EventTarget/addEventListener#add_a_simple_listener
   convertButton.addEventListener("click", convert);

   // Add event listeners to handle clearing the box that WAS NOT clicked,
   fahrenheitInput.addEventListener("input", () => {celsiusInput.value = ''; });
   celsiusInput.addEventListener("input", () => {fahrenheitInput.value = ''; });
   
   // e.g., the element C_in listens for 'input', with a callback fn to
   // execute after that event does happen. 
   // You don't send arguments to the event handler function.
   // So, if you want the event handler to call another function that
   // DOES take arguments, you can send that other function as a callback.
   // https://developer.mozilla.org/en-US/docs/Web/API/EventTarget/addEventListener#event_listener_with_anonymous_function
   // Here is an example of anonymous event handler fn that calls alert with an argument:
   // document.getElementById("weatherIcon").addEventListener("click", function() {alert("You clicked the icon.")})

}
// TODO: (Part of the above is to write the functions to be executed when the event handlers are invoked.)
function convert(){
   const weatherIcon = document.getElementById("weatherIcon");
   const C_in = parseFloat(document.getElementById("C_in").value)
   const F_in = parseFloat(document.getElementById("F_in").value)
   const message = document.getElementById("message");


   let far, cel
   message.textContent = ''; 

   if (F_in) {
      cel = convertFtoC(F_in);
      message.textContent = `${F_in}°F is ${cel.toFixed(2)}°C`;
      weatherDisICON(F_in);
   } else if (C_in) {
      far = convertCtoF(C_in);
      message.textContent = `${C_in}°C is ${far.toFixed(2)}°F`;
      weatherDisICON(C_in);
   } else {
      message.textContent = 'Please enter a temperature to convert.';
      weatherIcon.src = 'images/C-F.png'; // Reset icon if both inputs are empty
   }
}

function convertCtoF(C) {
   // TODO: Return temp in °F. 
   // °F = °C * 9/5 + 32
   return C * (9/5) + 32
}

function convertFtoC(F) {
   // TODO: Return temp in °C. 
   // °C = (°F - 32) * 5/9
   return (F-32) * (5/9)
}

// TODO: write a fn that can be called with every temp conversion
// to display the correct weather icon.
// Based on degrees Fahrenheit:
// 32 or less, but above -200: cold
// 90 or more, but below 200: hot
// between hot and cold: cool
// 200 or more, -200 or less: dead
// both input fields are blank: C-F

function weatherDisICON(temp){
   const weatherIcon = document.getElementById("weatherIcon");

   if(temp > -200 && temp <= 32){
      weatherIcon.src = "images/cold.png";
   }
   else if(temp >= 90 && temp < 200){
      weatherIcon.src = "images/hot.png";
   }
   else if(temp > 32 && temp < 90){
      weatherIcon.src = "images/cool.png";
   }
   else if(temp >= 200 || temp <= -200){
      weatherIcon.src = "images/dead.png";
   }
   else{
      weatherIcon.src = "images/C-F.png";
   }

}
