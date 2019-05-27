<?php
include 'menu.php';
include 'banco/conectaBanco.php';
?>
<body id="background-image">
    <div class = "container login-container">
        <div class = "row col-md-offset-4">
            <div class = "col-md-6 login-form-1">
                <h3>Acesso Restrito</h3>
                <form action = "validaLogin.php" method = "POST">
                    <div class = "form-group">
                        <input type = "text" class = "form-control" name = "usuario" placeholder = "Usuário *" value = "" />
                    </div>
                    <div class = "form-group">
                        <input type = "password" name = "senha" class = "form-control" placeholder = "Senha *" value = "" />
                    </div>
                    <div class = "form-group">
                        <input type = "submit" name = "validaLogin" class = "btnSubmit" value = "Login" />
                    </div>
                    <div class = "form-group">
                        <a href = "#" class = "ForgetPwd">Perdi minha senha?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>