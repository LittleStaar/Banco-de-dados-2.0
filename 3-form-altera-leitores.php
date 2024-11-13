<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Alterar/Excluir Cadastro de Leitores</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <div class="container-leitores">
      <div class="box-leitores">
      <a href="index.html"><button title="Voltar ao início">Home</button></a>
        <center>
            <h1>SISTEMA BIBLIOTECA</h1>
            <h3>CADASTRO DE LEITORES</h3>
        </center>
        <hr>
  </header>
  <div class="container">
    <h3>ALTERAR/EXCLUIR</h3>


    <?php
include "config.php";

$codleitor = isset($_POST['codleitor'])? (int)$_POST['codleitor'] : null;

if ($codleitor > 0) {
    $sql ="select * from leitores where CodLeitor=$codleitor";
    $resultado = mysqli_query($conn,$sql) or die ("Não foi possível realizar a consulta");

    $linha = mysqli_fetch_array($resultado);

    if (!$linha) {
        die("Registro não encontrado.");
    }
};
?>
        <form action="5-altera-leitor.php" method="post">
        <div>
        <label for="codleitor">Código:</label>
        <input type="text" id="codleitor" name="codleitor" readonly value="<?php 
                    echo isset($linha['CodLeitor']) ? htmlspecialchars($linha['CodLeitor']) : '' ?>" required />
      </div>
        <div>
        <label for="Nome">Nome:</label>
        <input type="text" id="nome" name="Nome" value="<?php 
                    echo isset($linha['Nome']) ? htmlspecialchars($linha['Nome']) : '' ?>" required />
      </div>
      <div>
        <label for="DtNasc">Data de Nascimento:</label>
        <input type="date" id="dtnasc" name="DtNasc" value="<?php echo isset($linha['DtNasc']) ? htmlspecialchars($linha['DtNasc']) : ''; ?>" required />
      </div>
      <div>
        <label for="Celular">Celular:</label>
        <input type="tel" id="celular" name="Celular" value="<?php echo isset($linha['Celular']) ? htmlspecialchars($linha['Celular']) : ''; ?>" required />
      </div>
      <div>
        <label for="Email">E-mail:</label>
        <input type="email" id="email" name="Email" value="<?php echo isset($linha['Email']) ? htmlspecialchars($linha['Email']) : ''; ?>" required />
      </div>
      <div>
        <label for="RA">RA:</label>
        <input type="ra" id="ra" name="RA" value="<?php echo isset($linha['RA']) ? htmlspecialchars($linha['RA']) : ''; ?>" required />
      </div>
      <div>
        <label for="Endereco">Endereço:</label>
        <input type="text" id="endereco" name="Endereco" value="<?php echo isset($linha['Endereco']) ? htmlspecialchars($linha['Endereco']) : ''; ?>" required />
      </div>
      <div>
        <label for="NumEnd">Número:</label>
        <input type="number" id="num_end" name="NumEnd" value="<?php echo isset($linha['NumEnd']) ? htmlspecialchars($linha['NumEnd']) : ''; ?>" required />
      </div>
      <div>
        <label for="bairro">Bairro:</label>
        <input type="text" id="bairro" name="Bairro" value="<?php echo isset($linha['Bairro']) ? htmlspecialchars($linha['Bairro']) : ''; ?>" required />
      </div>
      <div>
        <label for="CidadeUF">Cidade:</label>
        <input type="text" id="cidade" name="CidadeUF" value="<?php echo isset($linha['CidadeUF']) ? htmlspecialchars($linha['CidadeUF']) : ''; ?>" required />
      </div>
      <div>
        <button type="submit">Atualizar</button>
        <button type="button" onclick="excluirLeitor()">Excluir</button>
      </div>
    </form>
  </div>

  <script>
    function excluirLeitor() {
      if (confirm('Tem certeza que deseja excluir este cadastro?')) {
        // Aqui você pode adicionar a lógica para excluir o leitor, talvez redirecionando para uma página PHP
        window.location.href = '6-excluir-leitor.php?codleitor=' + document.getElementById('codleitor').value;
      }
    }
  </script>
      </div>
      </div>
        

</body>
</html>
