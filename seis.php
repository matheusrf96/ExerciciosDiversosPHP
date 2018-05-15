<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class Dependente{
    private $nome;
    private $email;

    public function __construct($nome, $email){
        $this->nome = $nome;
        $this->email = $email;
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

    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    public function toString(){
        return "
            Nome: ".$this->getNome()."<br />
            E-mail: ".$this->getEmail()."<br />
        ";
    }

}

class Pessoa{
    private $nome;
    private $email;
    private $dep = array();

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

    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    public function getDep()
    {
        return $this->dep;
    }
    public function setDep($dep)
    {
        $this->dep[] = $dep;

        return $this;
    }

    public function toString(){
        return "
            Nome: ".$this->getNome()."<br />
            E-mail: ".$this->getEmail()."<br />
            Dependente 1: <br />
            ".$this->getDep()[0]->toString()."
            Dependente 2: <br />
            ".$this->getDep()[1]->toString()."
            Dependente 3: <br />
            ".$this->getDep()[2]->toString()."
        ";
    }

}
?>


<form action="" method="POST">
    <?php
        for($i = 0; $i < 5; $i++){
            echo "
                <b>Registro ".($i + 1)."</b><br />
                Nome: <input type='text' name='reg".$i."' /><br />
                E-mail: <input type='text' name='email".$i."' /><br />
            ";
            # Coloquei os emails como tipo 'text' para facilitar os testes...

            for($j = 0; $j < 3; $j++){
                echo "
                    Dependente ".($j + 1)."<br />
                    Nome: <input type='text' name='reg".$i."-".$j."' /><br />
                    E-mail: <input type='text' name='email".$i."-".$j."' /><br />
                ";
            }

            echo "<br />";
        }
    ?>
    <input type="submit" name="submit" value="Enviar" />
</form>

<?php

if(isset($_POST)){
    $listaPessoas = array();

    for($i = 0; $i < 5; $i++){
        $listaPessoas[$i] = new Pessoa("", "*", NULL, NULL, NULL);
    }

    for ($i=0; $i < 5; $i++) { 
        $listaPessoas[$i]->setNome($_POST['reg'.$i]);
        $listaPessoas[$i]->setEmail($_POST['email'.$i]);
    
        $listaPessoas[$i]->setDep(new Dependente($_POST['reg'.$i.'-0'], $_POST['email'.$i.'-0']));
        $listaPessoas[$i]->setDep(new Dependente($_POST['reg'.$i.'-1'], $_POST['email'.$i.'-1']));
        $listaPessoas[$i]->setDep(new Dependente($_POST['reg'.$i.'-2'], $_POST['email'.$i.'-2']));
    }

    for ($i=0; $i < 5; $i++) {      
        echo "<b>Registro ".($i + 1)."</b><br />";
        echo $listaPessoas[$i]->toString();
        echo "<br />";
    }
}
?>