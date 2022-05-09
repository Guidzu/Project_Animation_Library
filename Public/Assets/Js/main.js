'use strict'

window.addEventListener("DOMContentLoaded", function() {
  // DO A 'FOR' LOOP OR A 'SWITCH'!!!!
  
  //PART FOR HTML, CSS AND RENDER CONTENT BUTTONS
  const buttonHtml = document.querySelectorAll(".buttonHtml");
  const buttonCss = document.querySelectorAll(".buttonCss");
  const buttonGif = document.querySelectorAll(".buttonGif");
  const htmlContent = document.querySelectorAll(".htmlContent");
  const cssContent = document.querySelectorAll(".cssContent");
  const gifContent = document.querySelectorAll(".gifContent");
  
  //PART FOR LIKE BUTTON
  const heartButton = document.querySelectorAll(".heartButton");
 
  // LOOP FOR EVERY BUTTON CLICK
  for(let i=0; i<buttonHtml.length ; i++) {
      buttonHtml[i].addEventListener('click', function(){
        htmlContent[i].classList.remove("Hide");
        cssContent[i].classList.add("Hide");
        gifContent[i].classList.add("Hide");
    });
      buttonCss[i].addEventListener('click', function(){
        cssContent[i].classList.remove("Hide");
        htmlContent[i].classList.add("Hide");
        gifContent[i].classList.add("Hide");
    });
      buttonGif[i].addEventListener('click', function(){
        gifContent[i].classList.remove("Hide");
        cssContent[i].classList.add("Hide");
        htmlContent[i].classList.add("Hide");
    });
      heartButton[i].addEventListener('click', function(){
        heartButton[i].classList.add("switchBlue");
        
    });
  }//CLOSING THE 'FOR' LOOP


});//ClOSING THE DOM CONTENT LOADED
    



 


 