
<?php

require_once './model/config.php';

    $logado = isset($_SESSION['usuario']);
    
    if($logado != true)
    {
        header('Location: /login.html');
    }

    $tipo = $_SESSION['usuario']['tipo'];
    if($tipo != 'admin')
    {
        echo "Você nao tem permissão para esta tela!";
        exit();
    }

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="../../favicon.ico">
        <script src="js/jquery-3.1.0.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.js" type="text/javascript"></script>
        <script src="js/listagem.js" type="text/javascript"></script>
        <script src="js/admin.js" type="text/javascript"></script>
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <title>Admin - OService</title>
    </head>

    <body>

        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Admin - OService</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">

                        <li><a id="logout" href="#">Logout</a></li>
                    </ul>
                    <form class="navbar-form navbar-right">
                        <input id="pesquisa" type="text" class="form-control" placeholder="Search...">
                    </form>
                </div>
            </div>
        </nav><br><br><br>

        <div class="container-fluid">
            <div class="row">

                <div class="col-sm-9 col-md-12 main">
                    <h1 class="page-header">Os Abertas</h1>


                    <div class="panel panel-info">
                        <div class="panel-heading">Filtros de OS</div>
                        <div class="panel-body">
                            
                            <div class="col-md-3">
                                <label>Departamento</label><br>
                                <select id="filtro-departamento" class="form-control">
                                    <option value="">Todos</option>
                                    <option value="Manutenção">Manutenção</option>
                                    <option value="TI">TI</option>
                                    <option value="Costureira">Costureira</option>
                                    <option value="Limpeza">Limpeza</option>
                                </select>
                            </div>
                            
                            <div class="col-md-3">
                                <label>Status</label><br>
                                <select id="filtro-status" class="form-control">
                                    <option value="">Todos</option>
                                    <option value="Aberta">Aberta</option>
                                    <option value="Fechada">Fechada</option>
                                    <option value="Nova">Nova</option>
                                    <option value="Execução">Execução</option>
                                </select>
                            </div>
                        </div>
                    </div>


                    <div class="table-responsive">
                        <table id="lista-os" class="table table-striped">
                            <thead>
                                <tr>
                                    <th># OS</th>
                                    <th>Solicitante</th>
                                    <th>Data da Solicitação</th>
                                    <th>Departamento</th>
                                    <th>Status</th>
                                    <th>Remover</th>
                                </tr>
                            </thead>
                            <tbody>


                            </tbody>
                        </table>
                    </div>
                </div>
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
          
          <div id="alert-form" class="alert alert-danger hide" role="alert">Ocorreu umn erro ao registrar</div>
        
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
                <label class="col-sm-4 control-label">Data de Alteração</label>
                <div class="col-sm-8">
                  <p class="form-control-static campo-data-alteracao">email@example.com</p>
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
              
              <div class="form-group">
                <label class="col-sm-4 control-label">Status</label>
                <div class="col-sm-8">
                  <select class="form-control campo-status">
                        <option value="">Todos</option>
                        <option value="Aberta">Aberta</option>
                        <option value="Fechada">Fechada</option>
                        <option value="Nova">Nova</option>
                        <option value="Execução">Execução</option>
                  </select>
                </div>
              </div>
              
              <div class="form-group">
                <label class="col-sm-4 control-label">Comentário</label>
                <div class="col-sm-8">
                    
                    <textarea class="form-control campo-novo-comentario"></textarea>
                    <p class="form-control-static campo-comentario"></p>
                </div>
              </div>
          </div>
          
           <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <button type="button" class="btn btn-success" id="btn-salvar">Salvar</button>
          </div>
          
      </div>


    </body>
</html>
