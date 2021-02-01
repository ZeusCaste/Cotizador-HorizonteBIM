let form = document.querySelector('.form-register');
let progressOptions = document.querySelectorAll('.progressbar__option');

form.addEventListener('click', function(e) {
    let element = e.target;
    let isButtonNext = element.classList.contains('step__button--next');
    let isButtonBack = element.classList.contains('step__button--back');
    if (isButtonNext || isButtonBack) {
        let currentStep = document.getElementById('step-' + element.dataset.step);
        let jumpStep = document.getElementById('step-' + element.dataset.to_step);
        currentStep.addEventListener('animationend', function callback() {
            currentStep.classList.remove('active');
            jumpStep.classList.add('active');
            if (isButtonNext) {
                currentStep.classList.add('to-left');
                progressOptions[element.dataset.to_step - 1].classList.add('active');
            } else {
                jumpStep.classList.remove('to-left');
                progressOptions[element.dataset.step - 1].classList.remove('active');
            }
            currentStep.removeEventListener('animationend', callback);
        });
        currentStep.classList.add('inactive');
        jumpStep.classList.remove('inactive');
    }
});

/*form.addEventListener('click', function(e) {
    let element = e.target;
    let isButtonNext = element.classList.contains('step__button--next');
    let isButtonBack = element.classList.contains('step__button--back');

    var tipoedif
    tipoedif= document.cotizar.tipoedif[document.cotizar.tipoedif.selectedIndex].value
    var i = 0;

    if (isButtonNext) {
        if(tipoedif == "1"){
            // Obtener hijos dentro de etiqueta <div>
            var cont = document.getElementById('ENueva').children;
            var al_menos_uno = false;
            //Recorrido de checkbox's
            while (i < cont.length) {
                // Verifica si el elemento es un checkbox
                if (cont[i].tagName == 'INPUT' && cont[i].type == 'checkbox') {
                    // Verifica si esta checked
                    if (cont[i].checked) {
                        al_menos_uno = true;
                    }
                }
                i++
            }
        
            //Valida si al menos un checkbox es checked
            if (!al_menos_uno) {
                alert('Selecciona al menos un checkbox');
            }else{
                let currentStep = document.getElementById('step-' + element.dataset.step);
                let jumpStep = document.getElementById('step-' + element.dataset.to_step);
                currentStep.addEventListener('animationend', function callback() {
                    currentStep.classList.remove('active');
                    jumpStep.classList.add('active');
                    currentStep.classList.add('to-left');
                    progressOptions[element.dataset.to_step - 1].classList.add('active');
                    currentStep.removeEventListener('animationend', callback);
                });
                currentStep.classList.add('inactive');
                jumpStep.classList.remove('inactive');
            }

        }else if(tipoedif == "2"){
            // Obtener hijos dentro de etiqueta <div>
            var cont2 = document.getElementById('EExistente').children;
            var al_menos = false;
            //Recorrido de checkbox's
            while (i < cont2.length) {
                // Verifica si el elemento es un checkbox
                if (cont2[i].tagName == 'INPUT' && cont2[i].type == 'checkbox') {
                    // Verifica si esta checked
                    if (cont2[i].checked) {
                        al_menos = true;
                    }
                }
                i++
            }
            //Valida si al menos un checkbox es checked
            if (!al_menos) {
                alert('Selecciona al menos un checkbox');
            }else{
                let currentStep = document.getElementById('step-' + element.dataset.step);
                let jumpStep = document.getElementById('step-' + element.dataset.to_step);
                currentStep.addEventListener('animationend', function callback() {
                    currentStep.classList.remove('active');
                    jumpStep.classList.add('active');
                    currentStep.classList.add('to-left');
                    progressOptions[element.dataset.to_step - 1].classList.add('active');
                    currentStep.removeEventListener('animationend', callback);
                });
                currentStep.classList.add('inactive');
                jumpStep.classList.remove('inactive');
            }
        
        }else{
            alert('Seleccione el tipo de edifiación y sus características');
        }

    } else if (isButtonBack){
        let currentStep = document.getElementById('step-' + element.dataset.step);
        let jumpStep = document.getElementById('step-' + element.dataset.to_step);
        currentStep.addEventListener('animationend', function callback() {
            currentStep.classList.remove('active');
            jumpStep.classList.add('active');
            jumpStep.classList.remove('to-left');
            progressOptions[element.dataset.step - 1].classList.remove('active');
            currentStep.removeEventListener('animationend', callback);
        });
        currentStep.classList.add('inactive');
        jumpStep.classList.remove('inactive');
    }
});*/

function Step1(){
    var tipoedif
    tipoedif= document.cotizar.tipoedif[document.cotizar.tipoedif.selectedIndex].value
    var i = 0;

    if(tipoedif == "1"){
        // Obtener hijos dentro de etiqueta <div>
        var cont = document.getElementById('ENueva').children;
        var al_menos_uno = false;
        //Recorrido de checkbox's
        while (i < cont.length) {
            // Verifica si el elemento es un checkbox
            if (cont[i].tagName == 'INPUT' && cont[i].type == 'checkbox') {
                // Verifica si esta checked
                if (cont[i].checked) {
                    al_menos_uno = true;
                }
            }
            i++
        }
    
        //Valida si al menos un checkbox es checked
        if (!al_menos_uno) {
            alert('Selecciona al menos un checkbox');
        }
    }else if(tipoedif == "2"){
        // Obtener hijos dentro de etiqueta <div>
        var cont2 = document.getElementById('EExistente').children;
        var al_menos = false;
        //Recorrido de checkbox's
        while (i < cont2.length) {
            // Verifica si el elemento es un checkbox
            if (cont2[i].tagName == 'INPUT' && cont2[i].type == 'checkbox') {
                // Verifica si esta checked
                if (cont2[i].checked) {
                    al_menos = true;
                }
            }
            i++
        }
    
        //Valida si al menos un checkbox es checked
        if (!al_menos) {
            alert('Selecciona al menos un checkbox');
        }
    
    }else{
        alert('No ha seleccionado nada');
    }

}
