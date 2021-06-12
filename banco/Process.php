<?php require_once "conexao.php" ?>
<?php require_once "Doador.php" ?>

<?php

    $doadorInfo = new Doador();
    $doadorInfo->nome = $_POST['nome'];
    $doadorInfo->cpf = $_POST['cpf'];
    $doadorInfo->rg = $_POST['rg'];
    $doadorInfo->email = $_POST['email'];
    $doadorInfo->senha = $_POST['senha'];
    $doadorInfo->data_nascimento = $_POST['data_nascimento'];
    $doadorInfo->telefone = $_POST['telefone'];
    $doadorInfo->cidade = $_POST['cidade'];
    $doadorInfo->doencas = $_POST['doencas'];
    $doadorInfo->doacoes_feitas = $_POST['doacoes_feitas'];

    function insereNewDoador($conexao, $formInfo) {

        $sql = "INSERT INTO doadores(nome,cpf,rg,email,senha,data_nascimento,telefone,cidade,doencas,doadoes_feitas)
            VALUES ('$doadorInfo->nome',
                    '$doadorInfo->cpf',
                    '$doadorInfo->rg',
                    '$doadorInfo->email',
                    '$doadorInfo->senha',
                    '$doadorInfo->data_nascimento',
                    '$doadorInfo->telefone',
                    '$doadorInfo->cidade',
                    '$doadorInfo->doencas',
                    '$doadorInfo->doacoes_feitas')";

        $resultado = mysqli_query($conexao, $sql);

        return $resultado;
    }

    if (insereNewDoador($conexao, $doadorInfo)) {
        header("Location:agradecimento.html");
    } else {
        echo mysqli_error($conexao);
    }  

?>