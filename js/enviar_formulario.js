window.addEventListener("load", (evento) => {

   //obtener formulario
   const formulario = document.getElementById("formulariocontacto");
   //capturar evento de envio
   formulario.addEventListener('submit', (evento) => {
       //evitar propagacion del evento
       evento.preventDefault();
       //llama func recap
       grecaptcha.ready(function () {
           grecaptcha.execute('tu_clave_publica_de_recaptcha', 
           {
               action: 'enviar_correo'
           }).then(function (token) {
               const datos = new FormData(formulario);
               datos.append("token", token);
               datos.append("action", "enviar_correo");
               console.log("pass")
               fetch('../php/enviocorreo.php', {
                   method: 'POST',
                   body: datos
               }).then(respuesta => respuesta.json())
                   .then(datosrecibidos => {
                       if (datosrecibidos == 'Mensaje enviado') {
                        alert('¡El mensaje ha sido enviado!');
                       } else {
                        alert('¡Error al enviar el mensaje!');
                       }
                   })
           })
       });
   });

});

