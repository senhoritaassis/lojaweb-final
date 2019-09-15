<?php

 if(ehPost()){
        foreach ($errors as $erro){
            echo "$erro<br>";
        }
    }

?>
<form action="" method="POST">

    
    <label>Logradouro:</label><input type="text" name="logradouro" value="<?=@$endereco['logradouro']?>"><br><br>
    <label>Numero:</label><input type="text" name="numero" value="<?=@$endereco['numero']?>"><br><br>
    <label>Complemento:</label><input type="text" name="complemento" value="<?=@$endereco['complemento']?>"><br><br>
    <label>Bairro:</label><input type="text" name="bairro" value="<?=@$endereco['bairro']?>"><br><br>
    <label>Cidade:</label><input type="text" name="cidade" value="<?=@$endereco['cidade']?>"><br><br>
    <label>Cep:</label><input type="text" name="cep" value="<?=@$endereco['cep']?>"><br><br>
            
  
    
  
    <button type="submit">Cadastrar Endereço</button><br>


</form>



