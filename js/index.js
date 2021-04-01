$(document).ready(function () {
 
    $("#nuevaE").validetta({

        //bubblePosition: 'bottom',
        //bubbleGapTop: 10,
        // bubbleGapLeft: -5,
        display: 'inline',
        errorTemplateClass: 'validetta-inline',

        onValid: function (e) {
            
            e.preventDefault();
            $('#alert').empty()
                .append('');
            var meses = new Array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
            var diasSemana = new Array("Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado");
            var Aedif = new Array("Vivienda Familiar", "Vivienda Adosada", "Vivienda Multifamiliar", "Vivienda Residencial", "Oficinas y Locales", "Comercial", "administrativo", "Estacionamientos", "Pública concurrencia", "Docencia", "Salud", "Industrial");
            var AreaPB, NumeroNiv, AreaNiv, NumSot, AreaSot, Edif1, Edif2, Edif3, Edif4, Edif5, Edif6, Edif7, Edif8, Edif9, Edif10, Edif11, Edif12, TiempoEjec, TiempoEjec2, TiempoEjecT = 0, TiempoEjec3, NumProy, TiempoEjecSub = 0;
            // var AreaTot, Factura1, Factor2, Factor3, Tab1, Tab2, Tab3, Tab4, Tab5, Tabulador1, Tabulador2, Tabulador3, Tabulador4, Tabulador5, ResTabulador1 = 0;
            var Textop = "",
                Textoim = "";
            var ImporteTotal = 0,
                Importe1, Importe2, Importe3, Importe4, Importe5;
            var Proyecto = new Array(),
                Importe = new Array(edificaciones.length);
            var valueEdif = [0,5206.38, 12432.12, 11576.7, 20241.45, 16263.76, 14119.76, 22000, 6206.63, 13162.54, 6908.8, 25000, 5269.43];
            var edificacionElem = document.getElementsByName("edificacion");
            var proyectos = document.getElementsByName("acheckbox[]");
            var accesibilidad = document.getElementsByName("accesibilidad");
            var topografia = document.getElementsByName("topografia");
            var ubicacion = document.getElementsByName("ubicacion");
            boxresult = document.getElementById("boxresult");
            contenido = document.getElementById("contentbox");
            contentAl = document.getElementById("contentalert");
            botonM = document.getElementById("contentB");


            boxresult.style.display = 'block';
            botonM.style.display = 'block';

            contenido.innerHTML = "";
            contentAl.innerHTML = "";

            var TiemposEjecT = [];
            var TiemposEjecSub = [];
            var ImportesTotales = [];

            for (var i = 0; i < proyectos.length; i++) { // son varios
                if (proyectos[i].checked == true) {
                    Proyecto.push(proyectos[i].value);
                }
            }

            for (var i = 0; i < accesibilidad.length; i++) {
                if (accesibilidad[i].checked == true) {
                    Accesibildad = accesibilidad[i].value;
                }
            }

            for (var i = 0; i < topografia.length; i++) {
                if (topografia[i].checked == true) {
                    Topografia = topografia[i].value;
                }
            }

            for (var i = 0; i < ubicacion.length; i++) {
                if (ubicacion[i].checked == true) {
                    Ubicacion = ubicacion[i].value;
                }
            }

            NumProy = Proyecto.length;

            Direccion = document.getElementById("dirUb").value;
            Ciudad = document.getElementById("jmr_contacto_municipio").value;
            Estado = document.getElementById("jmr_contacto_estado").value;
            CP = document.getElementById("dirCp").value;

            AreaPB = parseInt(document.getElementById("areaPb").value, 10);
            NumeroNiv = parseInt(document.getElementById("numNiv").value, 10);
            AreaNiv = parseInt(document.getElementById("areaNp").value, 10);

            NumSot = document.getElementById("Nsot").checked ? parseInt(document.getElementById("Nnums").value, 10) : parseInt(0, 10);
            AreaSot = document.getElementById("Nsot").checked ? parseInt(document.getElementById("Nareas").value, 10) : parseInt(0, 10);


            accesibilidadElem = document.getElementsByName('accesibilidad');

            Accesibilidad = '';
            accesibilidad.forEach(acces => {
                if (acces.checked) {
                    Accesibilidad = acces.value;
                }
            });

            topografiaElem = document.getElementsByName('topografia');

            Topografia = '';
            topografia.forEach(topo => {
                if (topo.checked) {
                    Topografia = topo.value;
                }
            });

            ubicacionElem = document.getElementsByName('ubicacion');

            Ubicacion = '';
            ubicacionElem.forEach(ubi => {
                if (ubi.checked) {
                    Ubicacion = ubi.value;
                }
            });

            Nombre = document.getElementById("nombreCom").value;
            Telefono = document.getElementById("numTel").value;
            Correo = document.getElementById("email").value;

            Factor1 = parseFloat(document.getElementById("f1E").value);
            Factor2 =  parseFloat(document.getElementById("f2E").value);
            Factor3 =  parseFloat(document.getElementById("f3E").value);

            FactorTie = parseFloat(document.getElementById("f1T").value);
            FactorTie2 = parseFloat(document.getElementById("f2T").value);
            FactorTie3 = parseFloat(document.getElementById("f3T").value);


            //AreaTot = AreaPB + (AreaNiv * NumeroNiv) + (AreaSot * NumSot);
            var AreaTot;

            // TODO

            edificaciones.forEach((edificacion, index) => {

                if (changeRules) {
                    AreaTot = edificacion.areaPb + (edificacion.areaNiv * edificacion.numeroNiv) + (AreaSot * NumSot);
                    console.log(AreaTot);
                } else {
                    AreaTot = AreaPB + (AreaNiv * NumeroNiv) + (AreaSot * NumSot);
                }

                var ResTabulador = [];
                Importe[index] = new Array();

                
                TiempoEjec = Math.pow(AreaTot, 0.4548);
                TiempoEjec2 = 0.2959 * TiempoEjec;
                TiempoEjec3 = TiempoEjec2.toFixed(2);

                TiempoEjecSub = (TiempoEjec3 * FactorTie * FactorTie2) + FactorTie3;
                TiempoEjecSub = Math.round(TiempoEjecSub);
                TiemposEjecSub.push(TiempoEjecSub);

                TiempoEjecT = TiempoEjecSub * edificacion.proyectos.length;
                TiempoEjecT = Math.round(TiempoEjecT);
                TiemposEjecT.push(TiempoEjecT);
                

    
                for (let j = 0; j < edificacion.proyectos.length; j++) {
                    switch (edificacion.proyectos[j]) {
                        case "Arquitectura":
                            ResTabulador.push(TabuladorFac1(AreaTot, -0.162, 23.41, Factor1));
                            break;
                        case "Estructura":
                            ResTabulador.push(TabuladorFac1(AreaTot, -0.163, 4.2727, Factor1));
                            break;
                        case "Instalalación hidrosanitaria":
                            ResTabulador.push(TabuladorFac1(AreaTot, -0.15, 3.5992, Factor1));
                            break;
                        case "Aire acondicionado sin balance térmico":
                            ResTabulador.push(TabuladorFac1(AreaTot, -0.152, 5.1894, Factor1));
                            break;
                        case "Aire acondicionado con balance térmico":
                            ResTabulador.push(TabuladorFac1(AreaTot, -0.15, 7.211, Factor1));
                            break;
                        case "Instalación eléctrica":
                            ResTabulador.push(TabuladorFac1(AreaTot, -0.164, 4.775, Factor1));
                            break;
                        case "Ventilación y extracción":
                            ResTabulador.push(TabuladorFac1(AreaTot, -0.15, 3.5992, Factor1));
                            break;
                        case "Voz y datos":
                            ResTabulador.push(TabuladorFac1(AreaTot, -0.167, 1.3448, Factor1));
                            break;
    
                    }

    
                    var aux = ResTabulador[j].toFixed(5);
                    Importe[index].push(ImporteFac23(valueEdif[parseInt(edificacion.edificacion)], AreaTot, aux, Factor2, Factor3));
                    ;
                }

                ImportesTotales[index] = 0

                for (let z = 0; z < Importe[index].length; z++) {
                    
                    ImportesTotales[index] += Importe[index][z];
                }

            });

            console.log(ImportesTotales);
            console.log(Importe);
            console.log(TiemposEjecT);
            console.log(TiemposEjecSub);


            var f = new Date();
            var date = `${diasSemana[f.getDay()]}, ${f.getDate()} de  ${meses[f.getMonth()]} de ${f.getFullYear()}`;

            Fecha = "<div class='col s6 m6 l6 right-align'><p> "  + date + "</p></div></div>";
            Titulo = "<div class='row'><div class= 'col s6 m6 l6'><h5 class='titulo'>" + "COTIZADOR ARQUITECTURA Y ESTRUCTURA" + "</h5></div>";
            //contentbox.innerHTML += Titulo;
            var firstText;
            contentbox.innerHTML += Titulo + Fecha;

            edificaciones.forEach((edificacion, index) => {

                if (edificaciones.length === 1) {
                    firstText = "<div class='s12'>" + "<p>Por este conducto, presentamos a su consideración, nuestra propuesta para la elaboración del proyecto: </p></div>";
                    contentbox.innerHTML += firstText;
                } else {
                    if (index === 0) {
                        firstText = "<div class='s12'>" + "<p>Por este conducto, presentamos a su consideración, nuestra propuesta para la elaboración del los proyectos: </p></div>";
                        contentbox.innerHTML += firstText;
                    }
                }

                

                if (edificacion.proyectos.length == 1) {

                    var areaTot = edificacion.areaPb + (edificacion.areaNiv * edificacion.numeroNiv) + (AreaSot * NumSot);

                    Texto = "<div class='s12'>" + "<p><b>Edificacion #" + (index + 1) + ": </b>" + edificacion.proyectos[0] + " de tipo " + Aedif[edificacion.edificacion - 1]  + " en " + Ciudad + " Edo. de " + Estado + ", con un área total de " + AreaTot + " m<sup>2</sup>." + "</p></div>";
                    Texto2 = "<div class='12'><b>" + "El importe de la presente propuesta es de $" + ImportesTotales[index].toFixed(2) + ", sin incluir el I. V. A." + "</b></div>";
                    Texto3 = "<div class='s12'>" + "Tiempo de entrega estimado por proyecto: " + TiemposEjecSub[index] + " Semanas";
                    Texto4 = "<div class='12'><b>" + "El tiempo total estimado de ejecución es de: " + TiemposEjecT[index] + " Semanas </b></div> <hr>";
                    contentbox.innerHTML += Texto + Texto2 + Texto3 + Texto4;
    
                } else {

                    var areaTot = edificacion.areaPb + (edificacion.areaNiv * edificacion.numeroNiv) + (AreaSot * NumSot);

                    firstText = "<div class='s12'><b>Edificacion #" + (index + 1) + ": </b></div>"
                    contentbox.innerHTML += firstText;
                    Textop = '';
                    Textoim = '';
                    for (let i = 0; i < edificacion.proyectos.length; i++) {
                        Textop += "<div class='s12'>" + edificacion.proyectos[i] + "</div>";
    
                        Textoim += "<div class='s12'>" + "     -El importe del proyecto de " + edificacion.proyectos[i] + " es de $" + Importe[index][i].toFixed(2) + ", sin incluir el I. V. A." + "</div>";
    
                    }
                    textoR = "<div class='s12'>" + "De tipo " + Aedif[edificacion.edificacion - 1] + " en " + Ciudad + " Edo. de " + Estado + ", con un área total de " + AreaTot + " m<sup>2</sup>." + "</div>";
                    Texto2 = "<div class='s12'><b>" + "El importe de la presente propuesta es de $" + ImportesTotales[index].toFixed(2) + ", sin incluir el I. V. A." + "</b></div>";
                    Texto3 = "<div class='s12'>" + "Número de proyectos: " + edificacion.proyectos.length + ", tiempo de entrega estimado por proyecto: " + TiemposEjecSub[index] + " Semanas";
                    Texto4 = "<div class='12'><b>" + "El tiempo total estimado de ejecución es de: " + TiemposEjecT[index] + " Semanas </b></div> <hr>";
                    contentbox.innerHTML += Textop + textoR + Textoim + Texto2 + Texto3 + Texto4; //+ Textop + Texto2 + textoR;
                }
            });


            textoAlert = "<h4>COTIZADOR ARQUITECTURA Y ESTRUCTURA</h4>" + "<p>Hola " + Nombre + " se envira un EMAIL a " + Correo + " en formato PDF con la cotizacion de manera desglosada</p>";
            textoAlert1 = "<p>Si el correo electronico es correcto presione enviar, de lo contrario presione cancelar y proporcione el correo electronio correcto</p>"
            contentAl.innerHTML += textoAlert + textoAlert1;
            document.getElementById("testnose").onclick = function() { myFunction(botonM) };
            document.getElementById("testpdf").onclick = function () {
                $.ajax({
                    type: "POST",
                    url: "pdf.php",
                    data: {
                        edificaciones,
                        direccion: Direccion,
                        nombre: Nombre,
                        telefono: Telefono,
                        email: Correo,
                        estado: Estado,
                        ciudad: Ciudad,
                        cp: CP,
                        areaPlantaBaja: AreaPB,
                        numeroNiveles: NumeroNiv,
                        areaNivel: AreaNiv,
                        accesibilidad: Accesibildad,
                        topografia: Topografia,
                        ubicacion: Ubicacion,
                        fecha: date,
                        areaTotal: AreaTot,
                        importesTotales: ImportesTotales,
                        importes: Importe,
                        tiemposEjecT: TiemposEjecT,
                        tiemposEjecSub: TiemposEjecSub,
                        changeRules
                    }
                }).done(function (data) {
                testsub();
                        
                });
            };

            

            //alert(edif);
            /* $.alert({
                 title: "<h4>Cotizador BIM</h4>",
                 content: "<h5>Hola " + Nombre + "<br>Se enviara un email a " + ema + "<br> confirmando la cotizacion <br>por edificacion nueva" + "</h5>",
                 icon: "fas fa-cogs fa-2x",
                 type: "green",
                 theme: "supervan"
             });*/

        },
        onError: function(event) {
            $('#alert').empty()
                .append('<div class="alert alert-danger">Algunos Campos estan vacios verificar.</div>');


        },
        realTime: true
    });
    /*
    $("#exisE").validetta({
        //bubblePosition: 'bottom',
        //bubbleGapTop: 10,
        // bubbleGapLeft: -5,
        display: 'inline',
        errorTemplateClass: 'validetta-inline',

        onValid: function(e) {
            e.preventDefault();

            var Nombre = $('#EnombreCom').val();
            var ema = $('#Eemail').val();

            //alert(edif);
            $.alert({
                title: "<h4>Cotizador BIM</h4>",
                content: "<h5>Hola " + Nombre + "<br>Se enviara un email a " + ema + "<br> confirmando la cotizacion <br>por edificacion existente" + "</h5>",
                icon: "fas fa-cogs fa-2x",
                type: "green",
                theme: "supervan"

            });

        },
        onError: function(event) {
            $('#alert').empty()
                .append('<div class="alert alert-danger">Algunos Campos estan vacios verificar.</div>');

        },
        realTime: true
    });*/

});

var edificaciones = [];
var changeRules = false;

initDomEdificacion();

function TabuladorFac1(Area, exp, con, Factor1) {
    Tab1 = Math.pow(Area, exp);
    TabuladorSub1 = (con * Tab1) / 100;
    Tabulador1 = TabuladorSub1.toFixed(5);
    ResTabulador1 = Tabulador1 * Factor1;
    return ResTabulador1;
}

function ImporteFac23(edif, areat, ResT, Factor2, Factor3) {

    return edif * areat * ResT * Factor2 * Factor3;
}

function myFunction(test12) {

    botonM.style.display = 'none';

}

function testsub() {
    document.getElementById("nuevaE").submit();
}


function initDomEdificacion() {
    document.querySelector('#add-edificaciones').addEventListener("click", function(event)  {
        event.preventDefault();
        addEdificacion();
    });

    document.querySelector('#clean-edificaciones').addEventListener("click", function(event)  {
        event.preventDefault();
        cleanDomEdificacion();
    });

    document.querySelector('#add-edificaciones').disabled = true;
    document.querySelector('#clean-edificaciones').disabled = true;

    var checkEdif = document.getElementsByName('edificacion')
    
    checkEdif.forEach( checkBox => {
        checkBox.addEventListener("click", function(event) {
            document.querySelector('#add-edificaciones').disabled = !verifyEdificacion(0);
            document.querySelector('#clean-edificaciones').disabled = !verifyEdificacion(1);
        })
    });

    var checkProy = document.getElementsByName("acheckbox[]");

    checkProy.forEach( checkBox => {
        checkBox.addEventListener("click", function(event) {
            document.querySelector('#add-edificaciones').disabled = !verifyEdificacion(0);
            document.querySelector('#clean-edificaciones').disabled = !verifyEdificacion(1);
        })
    });

    var changeRulesElem = document.getElementById('change');


    changeRulesElem.addEventListener("change", function (event) {


       
        var areaNivel = document.getElementById('areaNp');
        var direccionElem = document.getElementById('dirUb');
        var areaPbElem = document.getElementById('areaPb');
        var numeroNiveles = document.getElementById('numNiv');  
        var estadosElem = document.getElementById('jmr_contacto_estado');
        var municipiosElem = document.getElementById('jmr_contacto_municipio');
        var codigoPostalElem = document.getElementById('dirCp');


        var m2Elems = document.getElementsByName('longitud');
        var direccionElems = document.getElementsByName('direcciones');

        var selectEstados = document.getElementsByName('selectEstados');
        var selectMunicipios = document.getElementsByName('selectMunicipios');

        var codigosPostales = document.getElementsByName('codigosPostales');
        var areasPb = document.getElementsByName('areasPb');
        var numeroNivs = document.getElementsByName('numeroNivs');


        if (!changeRules) {

            areaNivel.value = "";
            direccionElem.value = "";
            areaPbElem.value = "";
            numeroNiveles.value = "";
            codigoPostalElem.value = "";
            areaNivel.placeholder = "Introduce el valor en la edificación";
            direccionElem.placeholder = "Introduce el valor en la edificación";
            areaPbElem.placeholder = "Introduce el valor en la edificación";
            numeroNiveles.placeholder = "Introduce el valor en la edificación";
            codigoPostalElem.placeholder = "Introduce el valor en la edificación";
            
            

            areaNivel.disabled = true;
            direccionElem.disabled = true;
            areaPbElem.disabled = true;
            numeroNiveles.disabled = true;
            codigoPostalElem.disabled = true;
            estadosElem.disabled = true;
            municipiosElem.disabled = true;

            m2Elems.forEach(mElem => {
                mElem.placeholder = "3400";
                mElem.disabled = false;
            });

            direccionElems.forEach(dirElem => {
                dirElem.placeholder = "Calle 6 No. 517, Col.";
                dirElem.disabled = false;
            });

            selectEstados.forEach(selectEstado => {
                selectEstado.disabled = false;
            });

            selectMunicipios.forEach(selectMunicipio => {
                selectMunicipio.disabled = false;
            });

            codigosPostales.forEach(codigoPostal => {
                codigoPostal.placeholder = "0123"
                codigoPostal.disabled = false;
            });

            areasPb.forEach(areaPb => {
                areaPb.placeholder = "123";
                areaPb.disabled = false;
            });

            numeroNivs.forEach(numeroNiv => {
                numeroNiv.placeholder = "2";
                numeroNiv.disabled = false;
            });


        } else {
            areaNivel.placeholder = "3400";
            direccionElem.placeholder = "Calle 6 No. 517, Col.";
            areaPbElem.placeholder = "123";
            numeroNiveles.placeholder = "2";
            codigoPostalElem.placeholder = "0123";

            areaNivel.value = "";
            direccionElem.value = "";
            areaPbElem.value = "";
            numeroNiveles.value = "";
            codigoPostalElem.value = "";
        

            m2Elems.forEach(mElem => {
                mElem.value = "";
                mElem.placeholder = "Por ahora es un valor único";
                mElem.disabled = true;
            });

            direccionElems.forEach(dirElem => {
                dirElem.value = "";
                dirElem.placeholder = "Por ahora es un valor único";
                dirElem.disabled = true;
            });

             selectEstados.forEach(selectEstado => {
                selectEstado.disabled = true;
            });

            selectMunicipios.forEach(selectMunicipio => {
                selectMunicipio.disabled = true;
            });

            codigosPostales.forEach(codigoPostal => {
                codigoPostal.value = "";
                codigoPostal.placeholder = "Por ahora es un valor único"
                codigoPostal.disabled = true;
            });

            areasPb.forEach(areaPb => {
                areaPb.value = "";
                areaPb.placeholder = "Por ahora es un valor único";
                areaPb.disabled = true;
            });

            numeroNivs.forEach(numeroNiv => {
                numeroNiv.value = "";
                numeroNiv.placeholder = "Por ahora es un valor único";
                numeroNiv.disabled = true;
            });

            areaNivel.disabled = false;
            direccionElem.disabled = false;
            areaPbElem.disabled = false;
            numeroNiveles.disabled = false;
            codigoPostalElem.disabled = false;
            estadosElem.disabled = false;
            municipiosElem.disabled = false;
        }

        changeRules = !changeRules;

    });

}

function addEdificacion() {

    if(verifyEdificacion(0)) {

        saveEdificacion();
        var name = `Edificacion #${edificaciones.length}`
        var pos = edificaciones.length - 1;


        var container = document.querySelector('#edificaciones');
        var formValidatta = document.querySelector('#nuevaE');


        var div = document.createElement('div');
        var button = document.createElement('button');

        
    
        var divInputs = document.createElement('div');
        var spacing = document.createElement('h5');
        spacing.textContent = " "
        var lineBreaker = document.createElement('br');


        var divM2 = document.createElement('div');
        var divDireccion = document.createElement('div');
        var divEstados = document.createElement('div');
        var divMunicipios = document.createElement('div');
        var divCp = document.createElement('div');
        var divAreaPb = document.createElement('div');
        var divNumeroNiv = document.createElement('div');


        var selectEstados = document.createElement('select');
        selectEstados.setAttribute('id', `selectEstados-${edificaciones.length}`)
        selectEstados.setAttribute('name', 'selectEstados');
        selectEstados.setAttribute("required", "");
        selectEstados.style.cssText = 'display: block;'
        if (!changeRules) {
            selectEstados.disabled = true;
        }
        var labelEstados = document.createElement('label');
        labelEstados.innerHTML = 'Estado'
        divEstados.appendChild(labelEstados);
        divEstados.appendChild(selectEstados);

        var selectMunicipios = document.createElement('select');
        selectMunicipios.setAttribute('id', `selectMunicipios-${edificaciones.length}`);
        selectMunicipios.setAttribute('name', 'selectMunicipios');
        selectMunicipios.setAttribute("required", "");
        selectMunicipios.style.cssText = 'display: block;'
         if (!changeRules) {
            selectMunicipios.disabled = true;
        }
        var labelMunicipios = document.createElement('label');
        labelMunicipios.innerHTML = 'Municipio'
        divMunicipios.appendChild(labelMunicipios);
        divMunicipios.appendChild(selectMunicipios);

        var labelCp = document.createElement('label');
        labelCp.innerHTML = 'Codigo postal'
        divCp.appendChild(labelCp);
        var inputCp = document.createElement('input');
        inputCp.setAttribute("type", "number");
        inputCp.setAttribute("name", "codigosPostales");
        inputCp.setAttribute("placeholder", "0142");
        inputCp.setAttribute("required", "");
        if (!changeRules) {
            inputCp.disabled = true;
            inputCp.setAttribute("placeholder", "Por ahora es un valor único");
        }
        divCp.appendChild(inputCp);

        var labelAreaPb = document.createElement('label');
        labelAreaPb.innerHTML = 'Área de planta baja (m2)'
        divAreaPb.appendChild(labelAreaPb);
        var inputAreaPb = document.createElement('input');
        inputAreaPb.setAttribute("type", "number");
        inputAreaPb.setAttribute("name", "areasPb");
        inputAreaPb.setAttribute("placeholder", "123");
        inputAreaPb.setAttribute("required", "");
        if (!changeRules) {
            inputAreaPb.disabled = true;
            inputAreaPb.setAttribute("placeholder", "Por ahora es un valor único");
        }
        divAreaPb.appendChild(inputAreaPb);


        var labelNumeroNiv = document.createElement('label');
        labelNumeroNiv.innerHTML = 'Número de niveles'
        divNumeroNiv.appendChild(labelNumeroNiv);
        var inputNumeroNiv = document.createElement('input');
        inputNumeroNiv.setAttribute("type", "number");
        inputNumeroNiv.setAttribute("name", "numeroNivs");
        inputNumeroNiv.setAttribute("placeholder", "2");
        inputNumeroNiv.setAttribute("required", "");
        if (!changeRules) {
            inputNumeroNiv.disabled = true;
            inputNumeroNiv.setAttribute("placeholder", "Por ahora es un valor único");
        }
        divNumeroNiv.appendChild(inputNumeroNiv);


        $(document).ready(function () {
            var target = edificaciones.length;
            $.ajax({
                type: "POST",
                url: "procesar-estados.php",
                data: {
                    estados: "Mexico"
                }
            }).done(function (data) {
                $(`#selectEstados-${target}`).html(data);
            });

            $(`#selectEstados-${target}`).change(function() {
                var estado = $(`#selectEstados-${target} option:selected`).val();
                $.ajax({
                    type: "POST",
                    url: "procesar-estados.php",
                    data: {
                        municipios: estado
                    }
                }).done(function(data) {
                    $(`#selectMunicipios-${target}`).html(data);
                });
            });
        });


        // for (var i = 0; i < estadosOptions.length; i++) {
        //     var option = document.createElement("option");
        //     option.value = estadosOptions[i].outerText;
        //     option.text = estadosOptions[i].outerText;
        //     selectEstados.appendChild(option);
        // }



        var labelM2 = document.createElement('label');
        labelM2.innerHTML = 'Área del nivel tipo (m2)'
        spacing.appendChild(labelM2)
        divM2.appendChild(spacing);

        

        var inputM = document.createElement('input');
        inputM.setAttribute("type", "number");
        inputM.setAttribute("name", "longitud");
        inputM.setAttribute("placeholder", "3400");
        inputM.setAttribute("required", "");
        if (!changeRules) {
            inputM.disabled = true;
            inputM.setAttribute("placeholder", "Por ahora es un valor único");
        }
        divM2.appendChild(inputM);


        var labelDir = document.createElement('label');
        labelDir.innerHTML = 'Ubicación del proyecto'
        divDireccion.appendChild(labelDir);

        var inputDir = document.createElement('input');
        inputDir.setAttribute("type", "text");
        inputDir.setAttribute("name", "direcciones");
        inputDir.setAttribute("placeholder", "  Call 5 No. 234 Col.");
        inputDir.setAttribute("required", "");
        if (!changeRules) {
            inputDir.disabled = true;
            inputDir.setAttribute("placeholder", "Por ahora es un valor único");
        }
        divDireccion.appendChild(inputDir);

        divInputs.appendChild(divM2);
        divInputs.appendChild(divAreaPb);
        divInputs.appendChild(divNumeroNiv);
        divInputs.appendChild(divDireccion);
        divInputs.appendChild(divEstados);
        divInputs.appendChild(divMunicipios);
        divInputs.appendChild(divCp);


        div.classList.add('col', 's6');

        button.textContent = name
        div.style.cssText = 'margin-top: 20px;'
        button.classList.add('waves-effect', 'waves-light', 'btn', 'col', 's6');
        button.style.cssText = 'width: 80%;'
        div.appendChild(button)

        
        div.appendChild(lineBreaker);
        div.appendChild(divInputs);
        


        container.appendChild(div);
        button.addEventListener('click', function (event) {
            event.preventDefault();
            completeEdificaciones(pos);
        });

        formValidatta.appendChild(container);

        document.querySelector('#add-edificaciones').disabled = true;
        document.querySelector('#clean-edificaciones').disabled = true;
    } else {
        alert('Faltan datos');
    }
}

function completeEdificaciones(pos) {

    var edificacionElem = document.getElementsByName("edificacion");
    var proyectosElem = document.getElementsByName("acheckbox[]");
    var edificacion = edificaciones[pos];

    edificacionElem.forEach( (input, index) => {
        if(index === (parseInt(edificacion.edificacion) - 1)) {
            input.checked = true;
        }
    });

    proyectosElem.forEach( proyects => {
        proyects.checked = false;
    });

    proyectosElem.forEach( proyects => {
        edificacion.proyectos.forEach( localProyect => {
            if(proyects.value === localProyect) {
                proyects.checked = true;
            }
        } )
    });
}

function saveEdificacion() {
    var edificacionElem = document.getElementsByName("edificacion");
    var proyectosElem = document.getElementsByName("acheckbox[]");


    var tempEdificacion = {
        edificacion: '',
        proyectos: [],
        areaNiv: 0,
        areaPb: 0,
        numeroNiv: 0,
        direccion: '',
        estado: '',
        municipio: '',
        codigoPostal: 0,
    };

    edificacionElem.forEach( (input, index) => {
        if(input.checked) {
            tempEdificacion.edificacion = input.value;
            input.checked = false;
        }
    });

    proyectosElem.forEach( proyects => {
        if(proyects.checked) {
            tempEdificacion.proyectos.push(proyects.value);
            proyects.checked = false;
        }
    });

    edificaciones.push(tempEdificacion);
}

function verifyEdificacion(button) {
    var edificacionElem = document.getElementsByName("edificacion");
    var proyectosElem = document.getElementsByName("acheckbox[]");

    var validEdif = false;
    var validProy = false;
    var valid;

    edificacionElem.forEach( (input, index) => {

        if(input.checked) {
            validEdif = true;
        }
    });

    proyectosElem.forEach( proyects => {
        if(proyects.checked) {
            validProy = true;
        }
    });

    if(button === 0) {
        valid = validEdif && validProy;
    } else if(button === 1) {
        valid = validEdif || validProy;
    }

    return valid;
}

function cleanDomEdificacion() {
    var checkEdif = document.getElementsByName('edificacion')
    
    checkEdif.forEach( checkBox => {
        checkBox.checked = false;
    });

    var checkProy = document.getElementsByName("acheckbox[]");

    checkProy.forEach( checkBox => {
        checkBox.checked = false;
    });

    document.querySelector('#add-edificaciones').disabled = true;
    document.querySelector('#clean-edificaciones').disabled = true;
}
