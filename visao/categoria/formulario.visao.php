<?php
    
    if(ehPost()){
        foreach ($errors as $erro){
            echo "$erro<br>";
        }
    }

?>
<form action="" method="POST">
    

    Descrição: <input type="text" name="descricao" value="<?=@$categoria['descricao']?>">
        <button type="submit">Cadastrar</button>     
		
</form>
