<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include "conexao.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Adicione isso para carregar o Bootstrap CSS -->
    <title>Lista de Usuários</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

<h2>Lista de Usuários</h2>
<a href="adicionar" class="btn btn-primary mb-3">Novo Usuário</a><br><br>

<table border="1" cellpadding="10" class="table table-bordered">
    <tr><th>ID</th><th>Nome</th><th>Email</th><th>Ações</th></tr>


<?php
$result = $conn->query("SELECT * FROM usuarios");
while($row = $result->fetch_assoc()){
    echo "<tr>
            <td>{$row['id']}</td>
            <td>{$row['nome']} </td>
            <td>{$row['email']} </td>
            <td>
                <a href='editar/{$row['id']}' class='btn btn-warning btn-sm'>Editar</a>
                <a href='deletar/{$row['id']}' class='btn btn-danger btn-sm' onclick='return confirm(\"Tem certeza?\")'>Excluir</a>
            </td>
        </tr>";
    } 
?>
            
</table>
            
</body>
</html>
            
<!-- 
#
#            <a href='editar.php?id={$row['id']}'>Editar</a>
#            <a href='deletar.php?id={$row['id']}'>Excluir</a>
#            <a href='deletar/{$row['id']}' class='btn btn-danger btn-sm' onclick='return confirm(\"Tem certeza?\")'>Excluir</a>
    
#  /*= htmlspecialchars?>   / desaparece com os nomes deixando mais seguro 
#          
-->