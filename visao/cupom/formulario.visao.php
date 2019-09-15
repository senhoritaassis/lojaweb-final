<?php
    
if(isset($errors)) {
    foreach ($errors as $erro){
        echo "$erro<br>";
    }
}

?>

<form method="POST" action="">

    
    <label>Descrição:</label><input type="text" name="descricao" value="<?=@$cupom['descricao']?>"><br><br>
    <label>Desconto:</label><input type="text" name="desconto" value="<?=@$cupom['desconto']?>"><br><br>
    
   
    <button type="submit">Cadastrar</button>     
		
</form>


