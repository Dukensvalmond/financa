<header>
    <div class="cadastro_header">
       <div class="cadastro_header_title">Faça seu Cadsatro</div>
    </div>
</header>
<div class="form">
    <div class="form_body">
        <?php if(!empty($flash)):?>
            <div class="flash"> <?=$flash;?> </div>
        <?php endif;?>
        <form method="POST" action="<?=BASE;?>User/save">
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" class="form-control" placeholder="Enter nome" name="nome">
            </div>
        
            <div class="form-group">
                <label for="email">E-mail:</label>
                <input type="email" class="form-control" placeholder="Enter email" name="email">
            </div>
            <div class="form-group">
                <label for="senha">Senha:</label>
                <input type="password" class="form-control" placeholder="Enter password" name="senha">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>

        </form>
    </div>
<div class="form">
