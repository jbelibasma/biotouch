"user strict";
let slider=document.querySelectorAll('.item-slider');
let next=document.querySelector('.fa-chevron-left');
// next.addEventListener('click',clicked);
var pev=document.querySelector('.fa-chevron-right');

let i=0;
function clicked()
{ 
   if(i==slider.length-1){
      slider[i].classList.remove('show');
      slider[i].classList.add('hide')
    i=0
    slider[i].classList.remove('hide')
    slider[i].classList.add('show');
   }
   else{
      slider[i].classList.remove('show');
      slider[i].classList.add('hide');
    i++
    slider[i].classList.remove('hide');
    slider[i].classList.add('show');
   }
  
}
if(next != null){
   next.addEventListener('click',clicked)
}
function Prev()
{ 
   if(i==0){
      slider[i].classList.remove('show');
      slider[i].classList.add('hide');
    i=slider.length-1
    slider[i].classList.remove('hide');
    slider[i].classList.add('show')

   }
   else{
      slider[i].classList.remove('show');
      slider[i].classList.add('hide');
    i--
    slider[i].classList.remove('hide');
    slider[i].classList.add('show');
   }
   
    
}
if(next != null){
   pev.addEventListener('click',Prev)
}
let myineterval 
function play() {
   myineterval= setInterval( 
       
    
      function clicked()
      { 
         if(i==slider.length-1){
            slider[i].classList.remove('show');
            slider[i].classList.add('hide')
          i=0
          slider[i].classList.remove('hide')
          slider[i].classList.add('show');
         }
         else{
            if(slider[i] != undefined){
               slider[i].classList.remove('show');
               slider[i].classList.add('hide');
               i++
               slider[i].classList.remove('hide');
               slider[i].classList.add('show');
            }
            
         }
        
      },4000);
}
play()

function mouseOver(){
   clearInterval(myineterval);

}
for(let i=0; i<slider.length;i++){

slider[i].addEventListener('mouseover',mouseOver);
}
function mouseAout(){
   play();

}
for(let i=0; i<slider.length;i++){

   slider[i].addEventListener('mouseout',mouseAout)
}
   


