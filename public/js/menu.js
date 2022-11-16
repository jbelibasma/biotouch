let butn=document.querySelector('.mobil-nav');
let menu=document.getElementById('menu-nav');
function showmenu(){
    menu.classList.toggle('menu-nav');
    menu.classList.toggle('active-menu');

}
butn.addEventListener('click', showmenu);
