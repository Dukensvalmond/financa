
<header>
    <div class="login_header">
       <div class="login_header_title">Faça seu login</div>
    </div>
</header>
<div class="container">
    <div class="container_form">
        <div class="container_form_body">
            <form method="POST" action="<?= BASE;?>Login/loginSave">
                <?php if(!empty($flash)):?>
                <div><?= $flash;?></div>
                <?php endif;?>
                <lable>
                    E-mail </br>
                    <input class="input" type="text" name="email"/>
                </lable></br></br>
                <lable>
                    Senha </br>
                    <input class="input" type="password" name="senha"/>
                </lable></br></br>
                <lable>
                    <input type="submit" value="Entrar"/>
                </lable>
            </form>
            <a href="<?= BASE;?>User/cadastraUser">Ainda não tem cadastro? Cadasre-se.</a>
        </div>
    </div>
</div>
        