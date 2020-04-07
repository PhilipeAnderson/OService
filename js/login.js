$(document).ready(function(){
    
    $('#form-login').submit(function(evento){
       evento.preventDefault();
       $('#alert-form').addClass('hide');
       
       var dados = {
           usuario : $('#email').val(),
           senha : $('#senha').val()
       };
       
       $.post('/model/login.php', dados, function(retorno){
                   
           var retorno = JSON.parse(retorno);
           
           if (retorno.status != 'ok')
               {
                   $('#alert-form').html(retorno.msg);
                   $('#alert-form').removeClass('hide');
               }else{
                   
                   if(retorno.tipo == 'admin')
                   {
                       location.href = "admin.php";
                   }else{
                       location.href = "index.php";
                   }
                   
               }
           
           
           
       });
       
    });
    
});


