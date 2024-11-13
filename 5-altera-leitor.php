<!DOCTYPE html>
<html>
<head>
    <title>Agenda de Contatos</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
        <a href="index.html"><button title="Voltar ao início">Home</button></a>
        <h1 class="text-center">SISTEMA BIBLIOTECA</h1>
        <h3 class="text-center">CADASTRO DE LEITORES</h3>
        <hr>
<?php
// Conexão com o banco de dados
include "config.php";
// Verifica a conexão
if ($conn->connect_error) {
    die("Conexão falhou: {$conn->connect_error}");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cCodLeitor = $_POST['CodLeitor'];
    $Nome = $_POST['Nome'];
    $DtNasc = $_POST['DtNasc'];
    $Celular = $_POST['Celular'];
    $Email = $_POST['Email'];
    $RA = $_POST['RA'];
    $Endereco = $_POST['Endereco'];
    $NumEnd = $_POST['NumEnd'];
    $Bairro = $_POST['Bairro'];
    $CidadeUF = $_POST['CidadeUF'];

    $sql = "UPDATE leitores SET 
                Nome='$Nome', 
                DtNasc='$DtNasc', 
                Celular='$Celular', 
                Email='$Email',
                RA='$RA', 
                Endereco='$Endereco', 
                NumEnd='$NumEnd', 
                Bairro='$Bairro', 
                CidadeUF='$CidadeUF' 
            WHERE CodLeitor='$CodLeitor'";
    
    $resultado = mysqli_query($conn, $sql);


    if ($resultado) {
        echo "Cadastro atualizado com sucesso.";
    } else {
        echo "Erro ao atualizar cadastro: " . mysqli_error($conn); // Corrigido para exibir a mensagem de erro correta
    }

}
$conn->close();
?>

</body>
</html>
