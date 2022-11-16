"use strict";

function ShowPanier(s = 0) {
  const carts = loadpanier("panier");
  var product = document.getElementById("product");

  if (carts == null) {
    var p = document.createElement("p");

    product.append(p.textContent("panier vide !"));
    return;
  } else {
    // var new_row = document.createElement('tr');
    // new_row.innerHTML="<td>test</td>";
    // insertAfter(document.getElementById("insert"), new_row);

    carts.forEach(function (cart) {
      var tr = document.createElement("tr");
      tr.insertCell(0).innerHTML = "<td>" + cart.id + "</td>";
      tr.insertCell(1).innerHTML = '<td><img  src="' + cart.img + '"></td>';
      tr.insertCell(2).innerHTML = "<td>" + cart.nom + "</td>";
      tr.insertCell(3).innerHTML = "<td>" + cart.prix + "</td>";
      tr.insertCell(4).innerHTML = "<td>" + cart.quantity + "</td>";
      tr.insertCell(5).innerHTML = "<td>" + cart.quantity * cart.prix + "</td>";

      // insertAfter(document.getElementById("product"), tr);
      if (product != null) {
        product.appendChild(tr);
      }

      s += parseInt(cart.quantity * cart.prix);
    });

    var sum = [];
    sum.push(s);
    var total = document.getElementById("total");
    var header_panier = document.getElementById("total_basket");
    var commande_panier = document.createTextNode(sum + ".00DT");
    header_panier.appendChild(commande_panier);
    var btn = document.querySelector(".btn_basket");
    var div = document.getElementById("panier_vide");

    if (sum == "0" && div != null) {
      var p = document.createElement("p");
      var linkText = document.createTextNode("panier est vide!");
      p.appendChild(linkText);
      div.appendChild(p);
      document.getElementById("title_basket").style.display = "none";
      document.querySelector(".table_panier").style.borderStyle = "none";
    } else if (sum != "0") {
      var tr = document.createElement("tr");
      tr.insertCell(0).innerHTML = "<td> <strong>TOTAL</strong></td>";
      tr.insertCell(1).innerHTML = "<td></td>";
      tr.insertCell(2).innerHTML = "<td></td>";
      tr.insertCell(3).innerHTML = "<td></td>";
      tr.insertCell(4).innerHTML = "<td></td>";
      tr.insertCell(5).innerHTML = "<td><strong>" + sum + "</strong></td>";
    }
    if (product != null) {
      total.appendChild(tr);
      var a = document.createElement("a");
      var linkText = document.createTextNode("commander");
      a.appendChild(linkText);
      a.title = "commander";
      a.id = "checkout";
      a.href = "#";
      btn.appendChild(a);
    }
  }
}
ShowPanier();
