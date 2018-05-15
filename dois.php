<form action="" method="POST">
    <?php 
        for($i = 0; $i < 10; $i++){
           echo "Operando ".($i + 1).": <input type='number' name='num".$i."' /><br />";
        }
    ?>
    <input type="submit" name="submit" value="Enviar" />
</form>

<?php

if(isset($_POST)){
    for($i = 0; $i < 10; $i++){
        $num += $_POST['num'.$i];
    }

    if(isset($_POST['submit'])){
        $num /= 10;
        echo "Média: ".$num."<br />";

        if($num >= 60){
            echo "<b style='color: #00aa00;'>Aprovado!</b>";
        }
        else{
            echo "<b style='color: #aa0000;'>Reprovado!</b>";
        }
    }
}

?>