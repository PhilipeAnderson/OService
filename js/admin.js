$(document).ready(function(){
    $('#filtro-departamento, #filtro-status').change(function(evento){
        
        var dados = {
          departamento: $('#filtro-departamento').val(),
          status: $('#filtro-status').val()
          
        };
        
        carregaOS(dados);
        
    });
    
    $('#pesquisa').keyup(function(){
        
        var dados = {
          num: $(this).val()      
        };
        
         carregaOS(dados);
        
    });
    
    $('#btn-salvar').click(function(){
        
        var oldComentario = $('.campo-comentario').html();
        
        
        
       var dados = {
          num: $('.campo-numero').html(),
          status: $('.campo-status').val(),
          comentario: $('.campo-novo-comentario').val() + '<br>----<br>' + oldComentario
       };
       $.post('/model/altera-os.php', dados, function(retorno){
           
           var retorno = JSON.parse(retorno);
           
           if (retorno.status == 'ok')
               {
                   $('#modal-os').modal('hide');
                   carregaOS();
                   
               }else if(retorno.status == 'erro')
               {
                   $('#alert-form').removeClass('hide');
                   $('#alert-form').html(retorno.msg);
               }
           
       });
    });
    
    carregaOS(function(){
        var btnDel = $('<button><span class="glyphicon glyphicon-remove-circle"></span></button>');
        
        $(btnDel).off();
        
        var td = $('<td></td>').append(btnDel);
        $('#lista-os tbody tr').append(td);
        
    });
});