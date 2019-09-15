<?php

 if(ehPost()){
        foreach ($errors as $erro){
            echo "$erro<br>";
        }
    }

?>
<form action="" method="POST">

    
    <label>Descrição:</label><input type="text" name="descricao" value="<?=@$cupom['descricao']?>"><br><br>
  
    
   
    <button type="submit">Cadastrar Forma de Pagamento</button><br>


</form>

