function enviar() {

  var nombre=$('#nombre').val();
  var email=$('#email').val();
  var telefono=$('#telefono').val();
  var mensaje=$('#mensaje').val();

  if(nombre=='' || email==""|| telefono=="" || mensaje==""){
    $('#error').html("<label class='red-msg'>Todos los campos son obligatorios.</label>");
    return false;
  }else{
    $.post("enviar.php",{nombre:nombre,telefono:telefono,email:email,mensaje:mensaje},function(respuesta){
    if(respuesta=="1"){
      document.getElementById('nombre').value="";
      document.getElementById('email').value="";
      document.getElementById('mensaje').value="";
      document.getElementById('telefono').value="";
      

    }
    $('#error').html("<label class='green-msg'>Consulta enviada. Gracias por contactarnos.</label>");
     });
    return false;
  
  }
}