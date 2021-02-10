$(document).ready(function() {
    $("#nuevaE").validetta({

        //bubblePosition: 'bottom',
        //bubbleGapTop: 10,
        // bubbleGapLeft: -5,
        display: 'inline',
        errorTemplateClass: 'validetta-inline',

        onValid: function(e) {
            e.preventDefault();
            var edif = $('input:radio[name=edificacion]:checked').val();
            var chk = $('[name="acheckbox[]"]:checked').map(function() {
                return this.value;

            }).get();
            var proes = chk.join(',');
            var dirCa = $('#dirCa').val();
            var Nombre = $('#nombreCom').val();
            var ema = $('#email').val();

            //alert(edif);
            $.alert({
                title: "<h4>Cotizador BIM</h4>",
                content: "<h5>Hola " + Nombre + "<br>Se enviara un email a " + ema + "<br> confirmando la cotizacion <br>por edificacion nueva" + "</h5>",
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
    });
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
    });
});