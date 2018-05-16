<?php

class Pessoa{
    private $nome;
    private $idade;

    public function __construct($nome, $idade){
        $this->nome = $nome;
        $this->idade = $idade;
    }

    public function getNome()
    {
        return $this->nome;
    }
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    public function getIdade()
    {
        return $this->idade;
    }
    public function setIdade($idade)
    {
        $this->idade = $idade;

        return $this;
    }
    
    public function toString(){
        return "
            Nome: ".$this->getNome()."<br />
            Idade: ".$this->getIdade()  ."<br />
            <br />
        ";
    }
}

?>

<form action="" method="POST">
    <?php 
        for($i = 0; $i < 5; $i++){
            echo "
                Pessoa ".($i+1)."<br />
                Nome: <input type='text' name='nome".$i."' /><br />
                Idade: <input type='number' name='idade".$i."' /><br />
                <br />
            ";
        }
    ?>
    <input type="submit" name="submit" value="Enviar" />
</form>

<?php 

if(isset($_POST)){
    $listaPessoas = array();

    for($i = 0; $i < 5; $i++){
        $listaPessoas[$i] = new Pessoa("", 0);
    }

    $maior[0] = 0;

    for ($i=0; $i < 5; $i++) { 
        $listaPessoas[$i]->setNome($_POST['nome'.$i]);
        $listaPessoas[$i]->setIdade($_POST['idade'.$i]);

        if($maior[0] < $listaPessoas[$i]->getIdade()){
            $maior[0] = $listaPessoas[$i]->getIdade();
            $maior[1] = $i;
        }
    }

    for ($i=0; $i < 5; $i++) {      

        if($i == $maior[1]){
            echo "<b>Pessoa ".($i + 1)."<br />";
            echo $listaPessoas[$i]->toString()."</b>";
        }
        else{
            echo "Pessoa ".($i + 1)."<br />";
            echo $listaPessoas[$i]->toString();
        }
    }
}

?>