<?php
include 'menu.php';
include 'banco/conectaBanco.php';
include 'topo.php';
include 'funcoes.php';

$sql = "SELECT * FROM usuarios";
$statement = $pdo->query($sql);
$recebeDadosUsuarios = $statement->fetchall(PDO::FETCH_OBJ);
$statement->closeCursor();

if (isset($_POST['editarUsuario'])) {
    $buscarUsuarioParaEditar = $pdo->prepare("SELECT * FROM usuarios where id = :id");
    $buscarUsuarioParaEditar->bindValue(':id', $_POST['editarUsuario'], PDO::PARAM_INT);
    $buscarUsuarioParaEditar->execute();
    $listarUsuarioParaEditar = $buscarUsuarioParaEditar->fetch();
}
?>

<?php if (isset($_POST['editarUsuario'])) { ?>
    <form action="action/update.php" method="POST">
    <?php } else { ?>
        <form action="action/insert.php" method="POST">
        <?php } ?>
        <div class="section">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-offset-1 col-md-5">
                        <label class="text-center" for="nomeUsuario">Usuário</label>
                        <input type="text" class="form-control" name="nomeUsuario" id="nomeUsuario" value="<?php echo isset($listarUsuarioParaEditar['nome']) ? $listarUsuarioParaEditar['nome'] : "" ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-offset-1 col-md-5">
                        <label class="text-center" for="senhaUsuario">Senha</label>
                        <input type="password" class="form-control" name="senhaUsuario" id="senhaUsuario" value="<?php echo isset($listarUsuarioParaEditar['senha']) ? $listarUsuarioParaEditar['senha'] : "" ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-offset-1 col-md-5">
                        <label class="text-center" for="nivelUsuario">Nivel</label>
                        <select id="nivelUsuario" name="nivelUsuario" class="form-control">
                            <option selected="selected"><?php
                                if (@$listarUsuarioParaEditar['nivel'] == 1) {
                                    echo "Administrador";
                                } elseif (@$listarUsuarioParaEditar['nivel'] == 2) {
                                    echo "Supervisor";
                                } elseif (@$listarUsuarioParaEditar['nivel'] == 3) {

                                    echo "Estagiário";
                                }
                                ?></option>

                            <option value="1">Administrador</option>
                            <option value="2">Supervisor</option>
                            <option value="3">Estagiário</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-offset-1 col-md-5">
                        <label class="text-center" for="nomeCompletoUsuario">Nome Completo</label>
                        <input type="text" class="form-control" name="nomeCompletoUsuario" id="nomeCompletoUsuario" value="<?php echo isset($listarUsuarioParaEditar['nome_completo']) ? $listarUsuarioParaEditar['nome_completo'] : "" ?>">
                        <br>
                        <?php if (isset($_POST['editarUsuario'])) { ?>
                            <input type="hidden" name="idDoUsuario" value="<?php echo $listarUsuarioParaEditar['id'] ?>">
                            <input type="submit" name="alterarDadosUsuario" class="btn btn-success form-control" value="Editar">
                        <?php } else { ?>
                            <input type="submit" name="cadastrarUsuario" class="btn btn-success form-control" value="Cadastrar">
                        <?php } ?>


                    </div>
                </div>
            </div>
        </div>
    </form>    


    <div class="col-md-5">
        <table class="table ">
            <thead>
            <th scope="col">Nome</th>
            <th scope="col">Nível</th>
            <th scope="col">Nome Completo</th>
            </thead>
            <tbody> 
                <?php foreach ($recebeDadosUsuarios as $users): ?>
                    <tr>
                        <td width="25%"><?php echo $users->nome; ?></td>
                        <td width="25%"><?php
                            if ($users->nivel == 1) {
                                echo "Administrador";
                            } elseif ($users->nivel == 2) {
                                echo "Supervisor";
                            } else {
                                echo "Estagiário";
                            }
                            ?></td> 
                        <td width="40%"><?php echo $users->nome_completo; ?></td> 
                        <td width="10%">
                            <form name = "formEditar<?php echo $users->id; ?> "action="usuarios.php" method="POST">
                                <input type="hidden" name="editarUsuario" value="<?php echo $users->id; ?>">
                                <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon glyphicon-pencil" aria-hidden="true"></span></button>  
                            </form></td>
                        <td>
                            <form name = "formExcluir<?php echo $users->id; ?>"action="update.php" method="POST">
                                <input type="hidden" name="excluirProduto" value="<?php echo $users->id; ?>">
                                <button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>  
                            </form></td>
                    </tr>
                <?php endforeach; ?>
            </tbody> 
        </table>
    </div>