
<?php

require_once './model/config.php';

    $logado = isset($_SESSION['usuario']);
    if($logado != true)
    {
        header('Location: /login.html');
    }


?>

<!DOCTYPE html>
<html>
    <head>
        <title>OService</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/bootstrap.css"  />
        
        <script src="js/jquery-3.1.0.min.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/listagem.js"></script>
        <script src="js/criar.js"></script>
    </head>
    <body>

        <!-- Static navbar -->
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">OService</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#">Listar</a></li>
                        <li><a href="#" data-toggle="modal" data-target="#modal-abrir">Abrir</a></li>

                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a id="logout" href="#">Logout</a></li>
                    </ul>

                </div><!--/.nav-collapse -->
            </div>
        </nav>

        <div class="container">
            <h1>Listagem de OS</h1>
            

            <div class="row">
                
                    <table class="table table-condensed table-hover" id="lista-os">
                        <thead>
                            <tr>
                                <th># OS</th>
                                <th>Solicitante</th>
                                <th>Data de Registro</th>
                                <th>Departamento</th>
                                <th>Status</th>                                          
                            </tr>
                        </thead>   
                        <tbody>
                                                        
                        </tbody>
                    </table>
                </div>
            
        </div>

 <div id="modal-os" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Ordem de Serviço #<span class="campo-numero">1001</span></h4>
      </div>
      <div class="modal-body">
        
          <div class="form-horizontal">
              <div class="form-group">
                <label class="col-sm-4 control-label">Solicitante</label>
                <div class="col-sm-8">
                  <p class="form-control-static campo-solicitante">email@example.com</p>
                </div>
              </div>
              
              <div class="form-group">
                <label class="col-sm-4 control-label">Data de Registro</label>
                <div class="col-sm-8">
                  <p class="form-control-static campo-data">email@example.com</p>
                </div>
              </div>
              
              <div class="form-group">
                <label class="col-sm-4 control-label">Departamento</label>
                <div class="col-sm-8">
                  <p class="form-control-static campo-departamento">email@example.com</p>
                </div>
              </div>
              
              <div class="form-group">
                <label class="col-sm-4 control-label">Solicitação</label>
                <div class="col-sm-8">
                  <p class="form-control-static campo-solicitacao">email@example.com</p>
                </div>
              </div>
          </div>
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div id="modal-abrir" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Abrir nova Ordem de Serviço</h4>
      </div>
      <div class="modal-body">
          <div id="alert-form" class="alert alert-danger hide" role="alert">Ocorreu um erro</div>
          <form id="form-criar" class="form-horizontal">
                    <fieldset>


                        <!-- Select Basic -->
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="destino">Destino</label>
                            <div class="col-md-8">
                                <select id="departamento" name="destino" class="form-control">
                                    <option value="Manutenção">Manutenção</option>
                                    <option value="TI">TI</option>
                                    <option value="Costureira">Costureira</option>
                                    <option value="Limpeza">Limpeza</option>
                                </select>
                            </div>
                        </div>
                        
                        


                        <!-- Textarea -->
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="solicitacao">Solicitação</label>
                            <div class="col-md-8">                     
                                <textarea class="form-control" id="solicitacao" name="solicitacao"></textarea>
                            </div>
                        </div>
                        


                    </fieldset>
                </form>
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button id="btn-criar"  class="btn btn-success">Enviar Solicitação</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

    </body>
</html>
