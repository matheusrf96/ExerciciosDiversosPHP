<?php

if(isset($_POST)){
    for($i = 0; $i < 5; $i++){
        $num[$i] = $_POST['num'.$i];
    }

}

?>

<form action="" method="POST">
    Operando 1: <input type="number" name="num0" /><br />
    Operando 2: <input type="number" name="num1" /><br />
    Operando 3: <input type="number" name="num2" /><br />
    Operando 4: <input type="number" name="num3" /><br />
    Operando 5: <input type="number" name="num4" /><br />
    <input type="submit" value="Enviar" />
</form>

<?php

$maior[0] = $num[0];
$menor[0] = $num[0];

for($i = 0; $i < 5; $i++){
    if($maior[0] < $num[$i]){
        $maior[0] = $num[$i];
        $maior[1] = $i;
    }
    if($menor[0] > $num[$i]){
        $menor[0] = $num[$i];
        $menor[1] = $i;
    }
}

if(isset($_POST)){
    echo "Maior número: ".$maior[0]." - Posição: ". $maior[1]."<br />";
    echo "Menor número: ".$menor[0]." - Posição: ". $menor[1];
}



?>