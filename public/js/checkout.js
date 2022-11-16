// var checkout=document.getElementById('checkout');
$('#checkout').on('click', onClickCheckout);


function onClickCheckout(){
    
    
        var carts = loadpanier('panier');
    
    $.post('/biotouch/order',{carts} ,function(){

        saveStorage([], 'panier');
        alert("produit commandé avec succès !")
        window.location.href ='/biotouch/panier';
    
    })
  

    
}
// if(checkout!=null){
//     checkout.addEventListener('click', onClickCheckout);
// }


