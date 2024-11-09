<?php
session_start();
include '../config.php'; // Inclui sua conexão com o banco de dados

// Obtém o ID do produto pela URL e converte para inteiro
$id = intval($_POST['idProd']); // Converte para inteiro para evitar problemas

// Busca o produto na base de dados usando o ID
if ($id > 0) {
    // Prepara a consulta para buscar o produto com o ID especificado
    $query = "SELECT * FROM prodstbl WHERE idProd = ?";
    $stmt = $conexao->prepare($query);

    if ($stmt) {
        // Associa o parâmetro
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $produto = $result->fetch_assoc();

            // Adiciona o produto ao carrinho na sessão
            $_SESSION['carrinho'][$id] = [
                'id' => $produto['idProd'],
                'nome' => $produto['nomeProd'],
                'img' => $produto['imgProd'],
                'preco' => $produto['precoProd'],
                'quantidade' => isset($_SESSION['carrinho'][$id]) ? $_SESSION['carrinho'][$id]['quantidade'] + $_POST['qnt'] : $_POST['qnt']
            ];

            // Redireciona para a página do carrinho
            header("Location: ../cart/");
        } else {
            echo "Produto não encontrado.";
        }
    } else {
        echo "Erro na preparação da consulta.";
    }
} else {
    echo "ID do produto inválido.";
}
?>