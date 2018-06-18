 $(function () {

        //Agrega estilo al checbkox de registro
        $('#registerCheckbox').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%',
            id: 'registerCheckbox' // optional

        });

        //Habilitar botón de submit según el valor del checkbox
        $('.iCheck-helper').click(function(){

            //Hay un solo checkbox en la pantalla
            var checkbox = $('input:checkbox')[0];
            if ($(checkbox).prop('checked')){

                $('#registerButton').prop('disabled', false);
            } 
            else {
                $('#registerButton').prop('disabled', true);
            }
          });

        //Checkeo que las contraseñas coincidan
        $('#registerForm').submit(function(e){
            e.preventDefault();
            var pass = $('#password').val();
            var pass_conf = $('#password_conf').val();
            if (pass != pass_conf){
                alert ("NO coincidan las pass");
            }
        });

    });