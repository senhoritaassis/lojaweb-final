<?php
    
    if(ehPost()){
        foreach ($errors as $erro){
            echo "$erro<br>";
        }
    }

?>
<form action="" method="POST">

    <h1>Cadastre-se</h1>
    E-mail: <input type="email" placeholder="Ex: liviaassis2002@gmail.com" name="email" value="<?=@$cliente['email']?>"><br><br>
    Senha: <input type="password" name="senha" value="<?=@$cliente['senha']?>"><br><br>
    CPF: <input type="tel" mask="___.___.___-__" placeholder="Ex: 555.222.777-16" name="cpf" value="<?=@$cliente['cpf']?>"><br><br>
    Seu nome: <input type="text" placeholder="Ex: Livia" name="nome" value="<?=@$cliente['nome']?>"><br><br>
    Data de nascimento: <input type="ola" mask="__/__/____" placeholder="Ex: 30/07/2002" name="nascimento" value="<?=@$cliente['nascimento']?>"><br><br>
    Sexo:<br><br>
    <?php if(isset($cliente['sexo']) && $cliente['sexo']=="F"):?>
    Feminino <input type="radio" name="sexo" value="F" checked="cheked">
    Masculino <input type="radio" name="sexo" value="M"><br><br>
    <?php else:?>
    Feminino <input type="radio" name="sexo" value="F">
    Masculino <input type="radio" name="sexo" value="M" checked="cheked"><br><br>
    <?php endif;?>
    
    Telefone: <input type="tel" mask="(__) _____-____" placeholder="Ex: (99) 99999-9999" name="telefone" value="<?=@$cliente['telefone']?>"> <br><br>
    <button type="submit">Criar seu cadastro</button><br>


</form>

