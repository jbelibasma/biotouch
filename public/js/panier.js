function loadpanier(panier) {
    var storage = JSON.parse(localStorage.getItem(panier));
    if (storage == null)
        storage = [];
    return storage
}

function saveStorage(data, panier) {
    var storage = JSON.stringify(data);
    localStorage.setItem(panier, storage);
}

/*** panier */
var save_carte=document.getElementById('add');
var id=document.getElementById('id');
var nom=document.getElementById('title');
var img=document.getElementById("imageId");
var prix= document.getElementById('prix');

var quantity=document.getElementById('quantity');
// $('#save').on('click', onClickSave); 
   var carts = loadpanier('panier');

  function onClickSave() {
  
// Création d'un objet cart .
          const cart = {
              id: id.value,
              nom: nom.innerHTML,
              img: img.getAttribute("src"),
              prix:parseInt(prix.innerHTML),
              quantity: quantity.value
               
          }
         
     // id produit qui ajouter = id produit ds panier      
          let qt= carts.find(key=>key.id==cart.id);
       
          if(qt!=undefined){
              cart.quantity=parseInt( cart.quantity);
              qt.quantity=parseInt( qt.quantity);
              let index = carts.indexOf(qt);
              carts[index]['quantity']+=cart.quantity;
        

          }
         
          else{
            
              carts.push(cart);

          }
          saveStorage(carts, 'panier');
          alert("produit ajouté avec succès");

       
          // refreshpanier();
  }
  

if(save_carte!=null){
  save_carte.addEventListener('click', onClickSave);
}
  
 


