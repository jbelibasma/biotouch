"use strict";
var regist=document.querySelector('.bi-chevron-compact-up');
var p=document.querySelectorAll('.slider_text');

var j=0;
let rgisterslid ;

function register() {
      if(j==p.length-1){
         p[j].classList.remove('show');
         p[j].classList.add('hide')
         j=0
         p[j].classList.remove('hide')
         p[j].classList.add('show');
      }
      else{
         p[j].classList.remove('show');
         p[j].classList.add('hide');
          j++
          p[j].classList.remove('hide');
          p[j].classList.add('show');
      }
     
}

regist.addEventListener('click', register)


function playreg() {
    rgisterslid=setInterval(
        function register() {
            if(j==p.length-1){
               p[j].classList.remove('show');
               p[j].classList.add('hide')
               j=0
               p[j].classList.remove('hide')
               p[j].classList.add('show');
            }
            else{
               p[j].classList.remove('show');
               p[j].classList.add('hide');
                j++
                p[j].classList.remove('hide');
                p[j].classList.add('show');
            }
      
    }, 2000);
}
    playreg();
