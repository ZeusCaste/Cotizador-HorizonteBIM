<?php
    include('config.php');

    $sql_fac = "SELECT * FROM factores";
    $result = pg_query($conexion,$sql_fac) or die("Error en select: ".pg_last_error());

   //se despliega el resultado
   while ($row = pg_fetch_assoc($result)){
        $f1E = $row['factorredproyecto'];  
        $f2E = $row['factormerproyecto'];  
        $f3E = $row['factorsitemproyecto']; 
        $f1T = $row['factorredtiempo'];  
        $f2T = $row['factorefictiempo'];  
        $f3T = $row['factorcartiempo'];
        $fC = $row['factorcomision'];
        $fCC = $row['factorcomcoordinador'];
    }
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Cotizador BIM</title>
    <meta name='viewport' content='width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no' />
    <meta name="description" content="">
    <meta name="keywords" content="">
    <link href="./images/logo.jpeg" rel="icon">
    <link href="./images/logo.jpeg" rel="apple-touch-icon">

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="./plugins/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="./plugins/materialize/css/materialize.min.css">
    <link rel="stylesheet" href="./plugins/validetta/validetta.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">

    <link href="./css/general.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- <script src="./plugins//jquery-3.4.1.min.js"></script> -->
    <script src="./plugins/materialize/js/materialize.min.js"></script>
    <script src="./plugins/validetta/validetta.js"></script>
    <script src="./plugins/validetta/validetta.min.js"></script>
    <script src="./plugins/validetta/validettaLang-es-ES.js"></script>
    <script src="./plugins/confirm/jquery-confirm.min.js"></script>
   <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-195285569-1">
    </script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-195285569-1');
    </script>

</head>

<body>
    <header>
    <nav class="nav-extended ">
    <div class="nav-wrapper center-align ">
     <a href="index.php"><span> <i class="fas fa-pencil-ruler fa-4x"></i><i class="fas fa-lightbulb fa-4x"></i><i class="fas fa-user-edit fa-4x"></i></span></a>
    </div>
    <div class="nav-content center-align">
        <p><h4>BIM TECHNOLOGY SOLUTIONS</h4></p>
        <h5>COTIZADOR PARA PROYECTOS DE ARQUITECTURA E INGENIERIAS</h5>
    </div>
    </nav>
    <div class="row">
        <div class="col s6">
            <a id="login" class="waves-effect waves-light btn modal-trigger"  href="./login.php">ADMIN</a>
        </div>
        <div class="col s6" align="right">
            <a id="inicio" class="waves-effect red btn"  href="./index.php">BORRAR COTIZACIÓN</a>
        </div>
    </div>
    </header>
    <main class="valign-wrapper">
        <div class="container">
            <div id="alert"></div>
            <div class="row">
                <div class="col s12 m12 l12">
                    <ul class="tabs">
                        <li class="tab col s6 m6 l6 "><a class="active " href="#New" c>EDIFICACION NUEVA</a></li>
                        <li class="tab col s6 m6 l6"><a href="#Exis">EDIFICACION EXISTENTE</a></li>

                    </ul>

                </div>


            </div>
            <div id="New" class="col s12">
                <label>
                    <input value="1" name="change" id="change" type="checkbox" />
                    <span>Utilizar valores independientes para cada edificacion (Área del nivel y Direcciones)</span>
                </label>
                <form action="./send-mail.php" id="nuevaE" method='post'>
                    <ul class="collapsible">
                        <li>
                            <div class="collapsible-header"><i class="fas fa-building "></i>Tipo de Edificacion</div>
                            <div class="collapsible-body">
                                <div class="row">
                                    <div class="col s12 m6 l6">
                                        <h6><i class="fas fa-hard-hat"></i> Edificación #</h6>
                                        <div class="divider col s12"></div><br>
                                        <label>
                                            <input value="1" name="edificacion" type="radio"/>
                                            <span>Vivienda Familiar</span>
                                        </label>
                                        <br>
                                        <label>
                                            <input value="2" name="edificacion" type="radio"/>
                                            <span> Vivienda Adosada</span>
                                        </label>
                                        <br>
                                        <label>
                                            <input value="3" name="edificacion" type="radio"/>
                                            <span>Vivienda Multifamiliar</span>
                                        </label>
                                        <br>
                                        <label>
                                            <input value="4" name="edificacion" type="radio"/>
                                            <span>Vivienda Residencial</span>
                                        </label>
                                        <br>
                                        <label>
                                            <input value="5" name="edificacion" type="radio"/>
                                            <span>Oficinas y Locales</span>
                                        </label>

                                        <br>
                                        <label>
                                            <input value="6" name="edificacion" type="radio"/>
                                            <span>Comercial</span>
                                        </label>
                                        <br>
                                        <label>
                                            <input value="7" name="edificacion" type="radio"/>
                                            <span>Administrativo</span>
                                        </label>
                                        <br>
                                        <label>
                                            <input value="8" name="edificacion" type="radio"/>
                                            <span>Estacionamientos</span>
                                        </label>
                                        <br>
                                        <label>
                                            <input value="9" name="edificacion" type="radio"/>
                                            <span>Pública concurrencia</span>
                                        </label>
                                        <br>
                                        <label>
                                            <input value="10" name="edificacion" type="radio"/>
                                            <span>Docencia</span>
                                        </label>
                                        <br>
                                        <label>
                                            <input value="11" name="edificacion" type="radio"/>
                                            <span>Salud</span>
                                        </label>
                                        <br>
                                        <label>
                                            <input value="12" name="edificacion" type="radio" data-validetta="required"/>
                                            <span>Industrial</span>
                                        </label>

                                    </div>
                                    <div class="col s12 m6 l6">
                                        <h6><i class="fas fa-tasks"></i> Proyectos y/o Estudios:</h6>
                                        <div class="divider col s12"></div><br>
                                        <label>
                                              <input type="checkbox" name="acheckbox[]" value="Arquitectura" data-validetta="minChecked[1]"/>
                                              <span>Arquitectura</span>
                                            </label>
                                        <br>
                                        <label>
                                              <input type="checkbox" name="acheckbox[]" value="Estructura" data-validetta="minChecked[1]"/>
                                              <span>Estructura</span>
                                            </label>
                                        <br>
                                        <label>
                                              <input type="checkbox" name="acheckbox[]" value="Instalalación hidrosanitaria" data-validetta="minChecked[1]"/>
                                              <span>Instalalación hidrosanitaria</span>
                                            </label>
                                        <br>
                                        <label>
                                              <input type="checkbox" name="acheckbox[]" value="Instalación eléctrica" data-validetta="minChecked[1]"/>
                                              <span>Instalación eléctrica</span>
                                            </label>
                                        <br>
                                        <label>
                                              <input type="checkbox" name="acheckbox[]" value="Aire acondicionado sin balance térmico" data-validetta="minChecked[1]"/>
                                              <span> Aire acondicionado sin balance térmico </span>
                                            </label>
                                        <br>
                                        <label>
                                              <input type="checkbox" name="acheckbox[]" value="Aire acondicionado con balance térmico" data-validetta="minChecked[1]"/>
                                              <span> Aire acondicionado con balance térmico </span>
                                            </label>
                                        <br>
                                        <label>
                                              <input type="checkbox" name="acheckbox[]" value="Ventilación y extracción" data-validetta="minChecked[1]"/>
                                              <span>Ventilación y extracción</span>
                                            </label>
                                        <br>
                                        <label>
                                              <input type="checkbox" name="acheckbox[]" value="Voz y datos" data-validetta="minChecked[1]"/>
                                              <span>Voz y datos</span>
                                            </label>
                                        <br>

                                        <div id="edificaciones" style="margin-top: 20px;" class="row">
                                        </div>
                                        <hr>
                                        <div style="margin-top: 30px" class="row">
                                            <div class="col s6">
                                                <button id="add-edificaciones" class="waves-effect waves-light btn" style="width: 80%"> Agregar edificacion </button>
                                            </div>
                                            <div class="col s6">
                                                <button id="clean-edificaciones" class="waves-effect red btn" style="width: 80%"> Limpiar campos </button>

                                            </div>
                                        </div>

                                        <!-- USO PENDIENTE
                                        <label>
                                              <input type="checkbox" name="acheckbox[]" value="mecanica" data-validetta="minChecked[1]"/>
                                              <span> Mecánica de suelos</span>
                                            </label>
                                        <br>
                                        <label>
                                              <input type="checkbox" name="acheckbox[]" value="cambioSuelo" data-validetta="minChecked[1]"/>
                                              <span> Cambio de uso de suelo</span>
                                            </label>-->

                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="collapsible-header"><i class="fas fa-clipboard-check"></i>Datos del proyecto</div>
                            <div class="collapsible-body">
                                <div class="row">
                                    <div class="input-field col s12 m6 l6">

                                        <input placeholder="Calle 6 No. 517, Col." id="dirUb" type="text" name="calle" data-validetta="required">
                                        <label ><i class="fas fa-map-marker-alt"></i> Ubicación del proyecto</label>
                                    </div>
                                    <div class="col s12 m6 l6">
                                        <label><i class="fas fa-map-marker-alt"></i> Estado</label>
                                        <select id="jmr_contacto_estado" name="estado" class="browser-default" data-validetta="required">
                                          <option value="" >Selecciona Estado</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s12 m6 l6">
                                        <label><i class="fas fa-map-marker-alt"></i> Ciudad o Municipio</label>
                                        <select id="jmr_contacto_municipio" name="ciudad" class="browser-default" data-validetta="required" name='ciudad'>
                                          <option value="" >Selecciona una opci&oacute;n</option>
                                        </select>
                                    </div>

                                    <div class="input-field col s12 m6 l6">
                                        <input placeholder="02501" name="cp" id="dirCp" type="text" data-validetta="number,required">
                                        <label ><i class="fas fa-map-marker-alt"></i> C.P./Codigo Postal</label>
                                    </div>
                                </div>
                                <h6><i class="fas fa-ruler-combined"></i> Areas del proyecto</h6>
                                <div class="divider col s12"></div><br>
                                <div class="row">
                                    <div class="input-field col s12 m4 l4">
                                        <input placeholder="Introduce el area en m2" name="areaPb" id="areaPb" type="text" data-validetta="number,required">
                                        <label ><i class="fas fa-ruler-combined"></i> Área de planta baja (m2)</label>
                                    </div>
                                    <div class="input-field col s12 m4 l4">
                                        <input placeholder="2" name="numNiv" id="numNiv" type="text" data-validetta="number,required">
                                        <label ><i class="fas fa-kaaba"></i> Número de niveles tipo</label>
                                    </div>
                                    <div class="input-field col s12 m4 l4">
                                        <input placeholder="03400" name="areaNp" id="areaNp" type="text" data-validetta="number,required">
                                        <label ><i class="fas fa-ruler-combined"></i> Área del nivel tipo (m2)</label>
                                    </div>
                                </div>
                                <h6 style="display: inline;"><i class="fas fa-ruler-combined"></i> Sotanos</h6>
                                <label>
                                    &nbsp;
                                    <input type="checkbox" id="Nsot" value="1" onchange="javascript:showNsota()" />
                                    <span> </span>
                                </label>

                                <div class="divider col s12"></div><br>
                                <div class="row" id="Ndisps" style="display: none;">
                                    <div class="input-field col s12 m6 l6">
                                        <input placeholder="Introduce el número de sótanos" type="text" id="Nnums">
                                        <label for=""><i class="fas fa-dumpster"></i> Número de sótanos</label>
                                    </div>
                                    <div class="input-field col s12 m6 l6">
                                        <input placeholder="100" type="text" id="Nareas">
                                        <label for=""><i class="fas fa-ruler-combined"></i> Área de sótano (m2)</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s12 m4 l4">
                                        <h6><i class="fas fa-street-view"></i> Accesibilidad</h6>
                                        <div class="divider"></div>
                                        <br>
                                        <label>
                                              <input name="accesibilidad" type="radio" value="Mbuena"/>
                                              <span>Muy Buena</span>
                                            </label>
                                        <br>
                                        <label>
                                              <input name="accesibilidad" type="radio" value="buena"/>
                                              <span> Buena</span>
                                            </label>
                                        <br>
                                        <label>
                                              <input name="accesibilidad" type="radio" value="normal"/>
                                              <span>Normal</span>
                                            </label>
                                        <br>
                                        <label>
                                              <input name="accesibilidad" type="radio" value="dificil"/>
                                              <span>Dificil</span>
                                            </label>
                                        <br>
                                        <label>
                                              <input name="accesibilidad" type="radio" value="Mdificil" data-validetta="required"/>
                                              <span>Muy dificil</span>
                                            </label>

                                    </div>
                                    <div class="col s12 m4 l4">
                                        <h6><i class="fas fa-road"></i> Topografia</h6>
                                        <div class="divider"></div>
                                        <br>
                                        <label>
                                              <input name="topografia" type="radio" value="plana"/>
                                              <span>Plana</span>
                                            </label>
                                        <br>
                                        <label>
                                              <input name="topografia" type="radio" value="desnivelMin"/>
                                              <span>Con desnivel minimo</span>
                                            </label>
                                        <br>
                                        <label>
                                              <input name="topografia" type="radio" value="desnivelPron"/>
                                              <span>Con desnivel pronunciado</span>
                                            </label>
                                        <br>
                                        <label>
                                              <input name="topografia" type="radio" value="accidentada"/>
                                              <span>Accidentada</span>
                                            </label>
                                        <br>
                                        <label>
                                              <input name="topografia" type="radio" value="Maccidentada" data-validetta="required"/>
                                              <span>Muy accidentada</span>
                                            </label>
                                    </div>
                                    <div class="col s12 l4 m4">
                                        <h6><i class="fas fa-map-marked-alt"></i> Ubicación</h6>
                                        <div class="divider"></div>
                                        <br>
                                        <label>
                                              <input name="ubicacion" type="radio" value="colindancias"/>
                                              <span>Entre colindacias</span>
                                            </label>
                                        <br>
                                        <label>
                                              <input name="ubicacion" type="radio" value="esquina"/>
                                              <span>En esquina</span>
                                            </label>
                                        <br>
                                        <label>
                                              <input name="ubicacion" type="radio" value="aislada" data-validetta="required"/>
                                              <span>Aislada</span>
                                            </label>

                                    </div>
                                </div>

                            </div>
                        </li>
                        <li>
                            <div class="collapsible-header"><i class="fas fa-user-check"></i>Datos del contacto</div>
                            <div class="collapsible-body">
                                <div class="row">
                                    <div class="input-field col s12 m4 l4">
                                        <input placeholder="Francisco Martinez Del Campo" id="nombreCom" name="nombreC" type="text" data-validetta="required">
                                        <label ><i class="fas fa-user"></i> Nombre Completo</label>
                                    </div>
                                    <div class="input-field col s12 m4 l4">
                                        <input placeholder="+1 3004005000" id="numTel" type="text" name="numT"data-validetta="number,required">
                                        <label ><i class="fas fa-mobile"></i> Número de telefono</label>
                                    </div>
                                    <div class="input-field col s12 m4 l4">
                                        <input placeholder="Evangeline@ray.com" id="email" type="text" name="email" data-validetta="required,email">
                                        <label ><i class="fas fa-at"></i> Correo Electrónico</label>
                                    </div>
                                    
                                </div>
                                <div class="row" style="display: none">
                                    <div class="input-field col s12 m4 l4">
                                        <input value="<?php echo $f1E; ?>" id="f1E" type="text" name="factor1Economico">
                                        <label>Factor Reducción Tabulador</label>
                                    </div>
                                    <div class="input-field col s12 m4 l4">
                                        <input value="<?php echo $f2E; ?>" id="f2E" type="text" name="factor2Economico">
                                        <label>Factor Mercado</label>
                                    </div>
                                    <div class="input-field col s12 m4 l4">
                                        <input value="<?php echo $f3E; ?>" id="f3E" type="text" name="factor3Economico">
                                        <label>Factor Situación de la Empresa</label>
                                    </div>                
                                </div>
                                <div class="row" style="display: none">
                                    <div class="input-field col s12 m4 l4">
                                        <input value="<?php echo $f1T; ?>" id="f1T" type="text" name="factor1Tiempo">
                                        <label>Factor Reducción Tabulador</label>
                                    </div>
                                    <div class="input-field col s12 m4 l4">
                                        <input value="<?php echo $f2T; ?>" id="f2T" type="text" name="factor2Tiempo">
                                        <label>Factor Mercado</label>
                                    </div>
                                    <div class="input-field col s12 m4 l4">
                                        <input value="<?php echo $f3T; ?>" id="f3T" type="text" name="factor3Tiempo">
                                        <label>Factor Situación de la Empresa</label>
                                    </div>               
                                </div>
                                <div class="row" style="display: none">
                                    <div class="input-field col s12 m4 l4">
                                        <input value="<?php echo $fC; ?>" id="fC" type="text" name="factorComision">
                                        <label>Factor Comision</label>
                                    </div>
                                    <div class="input-field col s12 m4 l4">
                                        <input value="<?php echo $fCC; ?>" id="fCC" type="text" name="factorComCoordinador">
                                        <label>Factor Comision Coordinador</label>
                                    </div>             
                                </div>

                                <button id="cotizar" class="btn waves-effect waves-light" type="submit" name="action">Cotizar
                                <i class="fas fa-check-double"></i></button>
                            </div>
                        </li>
                    </ul>
                </form>
                <div class="row" >
                    <div class="col s12 content-result" id="boxresult">
                        <div class="card-panel grey lighten-4 " id="contentbox">
                        </div>
                    </div>
                           <div class="botonM center-align" id="contentB">
                                <a id="enviaM" class="waves-effect waves-light btn modal-trigger"  href="#modal1">ENVIAR</a>
                            </div>
                            <!-- Modal Structure -->
                            <div id="modal1" class="modal">
                                <div class="modal-content" id="contentalert"> 
                                </div>
                                <div class="modal-footer">
                                <a id="testpdf" class="modal-close waves-effect waves-green btn-flat">Enviar</a>
                                <a id="testnose" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
                                </div>
                            </div>
                </div>
            </div>
            <div id="Exis" class="col s12">
                <div class="card-panel center-align">
                    <i class="fas fa-cog fa-spin fa-10x"></i>
                    <h4>En construcci&oacute;n</h4>
                </div>

                <!-- formulario Exitente
                <form action="" id="exisE">
                    <ul class="collapsible">
                        <li>
                            <div class="collapsible-header"><i class="fas fa-building "></i>Tipo de Edificacion</div>
                            <div class="collapsible-body">
                                <div class="row">
                                    <div class="col s12 m6 l6">
                                        <h6><i class="fas fa-hard-hat"></i> Estado Actual</h6>
                                        <div class="divider col s12"></div><br>
                                        <label>
                                        <input type="checkbox" name="Eacheckbox[]" value="arqui" data-validetta="minChecked[1]"/>
                                        <span>Arquitectura</span>
                                      </label>
                                        <br>
                                        <label>
                                        <input type="checkbox" name="Eacheckbox[]" value="estructura" data-validetta="minChecked[1]"/>
                                        <span>Estructura</span>
                                      </label>
                                        <br>
                                        <label>
                                        <input type="checkbox" name="Eacheckbox[]" value="insHidra" data-validetta="minChecked[1]"/>
                                        <span>Instalalación hidráulica</span>
                                      </label>
                                        <br>
                                        <label>
                                        <input type="checkbox" name="Eacheckbox[]" value="insSani" data-validetta="minChecked[1]"/>
                                        <span> Instalación sanitaria </span>
                                      </label>
                                    </div>
                                    <div class="col s12 m6 l6">
                                        <h6><i class="fas fa-tasks"></i> Servicios</h6>
                                        <div class="divider col s12"></div><br>
                                        <label>
                                              <input type="checkbox" name="ESacheckbox[]" value="arqui" data-validetta="minChecked[1]"/>
                                              <span>Reconstrucción</span>
                                            </label>
                                        <br>
                                        <label>
                                              <input type="checkbox" name="ESacheckbox[]" value="estructura" data-validetta="minChecked[1]"/>
                                              <span>Remodelación</span>
                                            </label>
                                        <br>
                                        <label>
                                              <input type="checkbox" name="ESacheckbox[]" value="insHidra" data-validetta="minChecked[1]"/>
                                              <span> Dictamen de seguridad estructural</span>
                                            </label>
                                        <br>
                                        <label>
                                              <input type="checkbox" name="ESacheckbox[]" value="insSani" data-validetta="minChecked[1]"/>
                                              <span> Mecánica de suelos</span>
                                            </label>
                                        <br>
                                        <label>
                                              <input type="checkbox" name="ESacheckbox[]" value="insElec" data-validetta="minChecked[1]"/>
                                              <span> Cambio de uso de suelo</span>
                                            </label>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="collapsible-header"><i class="fas fa-clipboard-check"></i>Datos del proyecto</div>
                            <div class="collapsible-body">
                                <div class="row">
                                    <div class="input-field col s12 m6 l6">

                                        <input placeholder="Calle 6 No. 517, Col." id="dirCa" type="text" data-validetta="required">
                                        <label for="dirCa"><i class="fas fa-map-marker-alt"></i> Ubicación del proyecto</label>
                                    </div>
                                    <div class="col s12 m6 l6">
                                        <label><i class="fas fa-map-marker-alt"></i> Estado</label>
                                        <select id="Ejmr_contacto_estado" class="browser-default" data-validetta="required">
                                          <option value="" >Selecciona Estado</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s12 m6 l6">
                                        <label><i class="fas fa-map-marker-alt"></i> Ciudad o Municipio</label>
                                        <select id="Ejmr_contacto_municipio" class="browser-default" data-validetta="required">
                                          <option value="" >Selecciona una opci&oacute;n</option>
                                        </select>
                                    </div>
                                    <div class="input-field col s12 m6 l6">
                                        <input placeholder="02501" id="dirCp" type="text" data-validetta="number,required">
                                        <label for="first_name"><i class="fas fa-map-marker-alt"></i> C.P./Codigo Postal</label>
                                    </div>
                                </div>
                                <h6><i class="fas fa-ruler-combined"></i> Areas del proyecto</h6>
                                <div class="divider col s12"></div><br>
                                <div class="row">
                                    <div class="input-field col s12 m4 l4">
                                        <input placeholder="Introduce el area en m2" id="areaPb" type="text" data-validetta="number,required">
                                        <label for="first_name"><i class="fas fa-ruler-combined"></i> Área de planta baja (m2)</label>
                                    </div>
                                    <div class="input-field col s12 m4 l4">
                                        <input placeholder="2" id="first_name" id="numNiv" type="text" data-validetta="number,required">
                                        <label for="first_name"><i class="fas fa-kaaba"></i> Número de niveles tipo</label>
                                    </div>
                                    <div class="input-field col s12 m4 l4">
                                        <input placeholder="03400" id="first_name" id="areaNp" type="text" data-validetta="number,required">
                                        <label for="100"><i class="fas fa-ruler-combined"></i> Área del nivel tipo (m2)</label>
                                    </div>
                                </div>
                                <h6 style="display: inline;"><i class="fas fa-ruler-combined"></i> Sotanos</h6>
                                <label>
                                    &nbsp;
                                    <input type="checkbox" id="Esot" value="1" onchange="javascript:showEsota()" />
                                    <span> </span>
                                </label>

                                <div class="divider col s12"></div><br>
                                <div class="row" id="Edisps" style="display: none;">
                                    <div class="input-field col s12 m6 l6">
                                        <input placeholder="Introduce el número de sótanos" type="text" id="Enums">
                                        <label for=""><i class="fas fa-dumpster"></i> Número de sótanos</label>
                                    </div>
                                    <div class="input-field col s12 m6 l6">
                                        <input placeholder="100" type="text" id="Eareas">
                                        <label for=""><i class="fas fa-ruler-combined"></i> Área de sótano (m2)</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s12 m4 l4">
                                        <h6><i class="fas fa-street-view"></i> Accesibilidad</h6>
                                        <div class="divider"></div>
                                        <br>
                                        <label>
                                              <input name="accesibilidad" type="radio" value=""/>
                                              <span>Muy Buena</span>
                                            </label>
                                        <br>
                                        <label>
                                              <input name="accesibilidad" type="radio" value=""/>
                                              <span> Buena</span>
                                            </label>
                                        <br>
                                        <label>
                                              <input name="accesibilidad" type="radio" value=""/>
                                              <span>Normal</span>
                                            </label>
                                        <br>
                                        <label>
                                              <input name="accesibilidad" type="radio" value=""/>
                                              <span>Dificil</span>
                                            </label>
                                        <br>
                                        <label>
                                              <input name="accesibilidad" type="radio" value="" data-validetta="required"/>
                                              <span>Muy dificil</span>
                                            </label>

                                    </div>
                                    <div class="col s12 m4 l4">
                                        <h6><i class="fas fa-road"></i> Topografia</h6>
                                        <div class="divider"></div>
                                        <br>
                                        <label>
                                              <input name="topografia" type="radio" value=""/>
                                              <span>Plana</span>
                                            </label>
                                        <br>
                                        <label>
                                              <input name="topografia" type="radio" value=""/>
                                              <span>Con desnivel minimo</span>
                                            </label>
                                        <br>
                                        <label>
                                              <input name="topografia" type="radio" value=""/>
                                              <span>Con desnivel pronunciado</span>
                                            </label>
                                        <br>
                                        <label>
                                              <input name="topografia" type="radio" value=""/>
                                              <span>Accidentada</span>
                                            </label>
                                        <br>
                                        <label>
                                              <input name="topografia" type="radio" value="" data-validetta="required"/>
                                              <span>Muy accidentada</span>
                                            </label>
                                    </div>
                                    <div class="col s12 l4 m4">
                                        <h6><i class="fas fa-map-marked-alt"></i> Ubicación</h6>
                                        <div class="divider"></div>
                                        <br>
                                        <label>
                                              <input name="ubicacion" type="radio" value=""/>
                                              <span>Entre colindacias</span>
                                            </label>
                                        <br>
                                        <label>
                                              <input name="ubicacion" type="radio" value=""/>
                                              <span>En esquina</span>
                                            </label>
                                        <br>
                                        <label>
                                              <input name="ubicacion" type="radio" value="" data-validetta="required"/>
                                              <span>Aislada</span>
                                            </label>

                                    </div>
                                </div>

                            </div>
                        </li>
                        <li>
                            <div class="collapsible-header"><i class="fas fa-user-check"></i>Datos del contacto</div>
                            <div class="collapsible-body">
                                <div class="row">
                                    <div class="input-field col s12 m4 l4">
                                        <input placeholder="Francisco Martinez Del Campo" id="EnombreCom" type="text" data-validetta="required">
                                        <label for="first_name"><i class="fas fa-user"></i> Nombre Completo</label>
                                    </div>
                                    <div class="input-field col s12 m4 l4">
                                        <input placeholder="+1 3004005000" id="EnumTel" type="text" data-validetta="number,required">
                                        <label for="first_name"><i class="fas fa-mobile"></i> Número de telefono</label>
                                    </div>
                                    <div class="input-field col s12 m4 l4">
                                        <input placeholder="Evangeline@ray.com" id="Eemail" type="text" data-validetta="required,email">
                                        <label for="100"><i class="fas fa-at"></i> Correo Electrónico</label>
                                    </div>
                                </div>
                                <button class="btn waves-effect waves-light" type="submit" name="action">Enviar
                                <i class="fas fa-check-double"></i></button>
                            </div>
                        </li>
                    </ul>
                </form> -->
            </div>
        </div>
    </main>
    <footer class="page-footer">

        <div class="container center-align">
            Copyright © PGP Developer 2021
        </div>
        </div>
    </footer>

</body>

<script>

    M.AutoInit();
    $(document).ready(function() {
        $.ajax({
            type: "POST",
            url: "procesar-estados.php",
            data: {
                estados: "Mexico"
            }
        }).done(function(data) {
            $("#jmr_contacto_estado").html(data);
            $("#Ejmr_contacto_estado").html(data);
        });
        // Obtener municipios
        $("#jmr_contacto_estado").change(function() {
            var estado = $("#jmr_contacto_estado option:selected").val();
            $.ajax({
                type: "POST",
                url: "procesar-estados.php",
                data: {
                    municipios: estado
                }
            }).done(function(data) {
                $("#jmr_contacto_municipio").html(data);
            });
        });
        $("#Ejmr_contacto_estado").change(function() {
            var estado = $("#jmr_contacto_estado option:selected").val();
            $.ajax({
                type: "POST",
                url: "procesar-estados.php",
                data: {
                    municipios: estado
                }
            }).done(function(data) {
                $("#Ejmr_contacto_municipio").html(data);
            });
        });


        $('#cotizar').click(function(event) {
            var m2 = [];
            var direccions = [];
            var estados = [];
            var municipios = [];
            var areasPbs = [];
            var numeroNivelesA = [];
            var codigosPostalesA = [];

            var edificacionElem = document.getElementsByName("edificacion");
            var proyectosElem = document.getElementsByName("acheckbox[]");

            var areaNivel = document.getElementById('areaNp');
            var direccionElem = document.getElementById('dirUb');
            var areaPbElem = document.getElementById('areaPb');
            var numeroNiveles = document.getElementById('numNiv');
            var estadosElem = document.getElementById('jmr_contacto_estado');
            var municipiosElem = document.getElementById('jmr_contacto_municipio');
            var codigoPostalElem = document.getElementById('dirCp');

            var m2Elems = document.getElementsByName('longitud');
            var direccionElems = document.getElementsByName('direcciones');
            var codigosPostales = document.getElementsByName('codigosPostales');
            var areasPb = document.getElementsByName('areasPb');
            var numeroNivs = document.getElementsByName('numeroNivs');
            var selectEstados = document.getElementsByName('selectEstados');
            var selectMunicipios = document.getElementsByName('selectMunicipios');

            if (edificaciones.length > 0) {

                edificacionElem.forEach((edificacion, index) => {
                    if (index === (edificaciones[0].edificacion - 1)) {
                        edificacion.checked = true;
                    }
                });

                proyectosElem.forEach(proy => {
                    edificaciones[0].proyectos.forEach(lProy => {
                        if (lProy === proy.value) {
                            proy.checked = true;
                        }
                    });
                });

                document.querySelector('#clean-edificaciones').disabled = false;

            }

            if (changeRules) {

                areaNivel.value = "-";
                direccionElem.value = "-";
                areaPbElem.value = "-";
                numeroNiveles.value = "-";
                codigoPostalElem.value = "-";

                m2Elems.forEach(mElem => {
                    m2.push(parseInt(mElem.value, 10));
                });

                direccionElems.forEach(dirElem => {
                    direccions.push(dirElem.value);
                });

                for (var i = 0; i < selectEstados.length; i++) {
                    estados.push(selectEstados[i].value);
                }

                for (var i = 0; i < selectMunicipios.length; i++) {
                    municipios.push(selectMunicipios[i].value);
                }

                areasPb.forEach(areaPb => {
                    areasPbs.push(parseInt(areaPb.value, 10));
                });

                numeroNivs.forEach(numeroNiv => {
                    numeroNivelesA.push(parseInt(numeroNiv.value, 10));
                });

                codigosPostales.forEach(codigoPostal => {
                    codigosPostalesA.push(parseInt(codigoPostal.value, 10));
                });

            } else {
                m2Elems.forEach(mElem => {
                    mElem.value = areaNivel.value;
                    m2.push(parseInt(areaNivel.value, 10));
                });

                direccionElems.forEach(dirElem => {
                    dirElem.value = direccionElem.value;
                    direccions.push(direccionElem.value);
                });

                for (var i = 0; i < selectEstados.length; i++) {
                    estados.push(estadosElem.value);
                }

                for (var i = 0; i < selectMunicipios.length; i++) {
                    municipios.push(municipiosElem.value);
                }


                areasPb.forEach(areaPb => {
                    areaPb.value = areaPbElem.value;
                    areasPbs.push(parseInt(areaPbElem.value, 10));
                });

                numeroNivs.forEach(numeroNiv => {
                    numeroNiv.value = numeroNiveles.value;
                    numeroNivelesA.push(parseInt(numeroNiveles.value, 10));
                });

                codigosPostales.forEach(codigoPostal => {
                    codigoPostal.value = codigoPostalElem.value;
                    codigosPostalesA.push(parseInt(codigoPostalElem.value, 10));
                });

            }

            edificaciones.forEach((edificacion, index) => {
                edificacion.areaNiv = m2[index];
                edificacion.direccion = direccions[index];
                edificacion.areaPb = areasPbs[index];
                edificacion.numeroNiv = numeroNivelesA[index];
                edificacion.estado = estados[index];
                edificacion.municipio = municipios[index];
                edificacion.codigoPostal = codigosPostalesA[index];
            });
            console.log(edificaciones);
        });
    });

    function showNsota() {
        element = document.getElementById("Ndisps");
        check = document.getElementById("Nsot");
        let num = document.getElementById("Nnums");
        let area = document.getElementById("Nareas");
        if (check.checked) {
            element.style.display = 'block';
            num.setAttribute("data-validetta", "number,required");
            area.setAttribute("data-validetta", "number,required");
        } else {
            element.style.display = 'none';

            num.setAttribute("data-validetta", "");
            area.setAttribute("data-validetta", "");
        }
    }

    function showEsota() {
        element = document.getElementById("Edisps");
        check = document.getElementById("Esot");
        let num = document.getElementById("Enums");
        let area = document.getElementById("Eareas");
        if (check.checked) {
            element.style.display = 'block';
            num.setAttribute("data-validetta", "number,required");
            area.setAttribute("data-validetta", "number,required");
        } else {
            element.style.display = 'none';

            num.setAttribute("data-validetta", "");
            area.setAttribute("data-validetta", "");
        }
    }
</script>

<script src="./js/index.js"></script>

</html>