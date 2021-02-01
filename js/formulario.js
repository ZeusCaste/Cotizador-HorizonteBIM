function showContent() {

    var tipoedif
    tipoedif= document.cotizar.tipoedif[document.cotizar.tipoedif.selectedIndex].value
    element = document.getElementById("ENueva");
    element2 = document.getElementById("EExistente");

    if (tipoedif == "1") {
        element.style.display='block';
        element2.style.display='none';
        for (i=0;i<document.cotizar.elements.length;i++)
            if(document.cotizar.elements[i].type == "checkbox")
                document.cotizar.elements[i].checked=0
        
        for (i=0;i<document.cotizar.elements.length;i++)
            if(document.cotizar.elements[i].type == "radio")
                document.cotizar.elements[i].checked=0
    }
    else if (tipoedif == "2"){
      element2.style.display='block';
      element.style.display='none';
    }
    else {
      element.style.display='none';
      element2.style.display='none';
    }
}

function mensaje(){
  alert("¡Muchas gracias! En un momento recibirá su cotización via correo electrónico");
}

