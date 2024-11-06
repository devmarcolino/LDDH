<?php
session_start();

// Obtém o ID do produto da URL
$id = intval($_GET['id']); // Converte para inteiro

// Verifica se o produto existe no carrinho
if (isset($_SESSION['carrinho'][$id])) {
    // Remove o produto do carrinho
    unset($_SESSION['carrinho'][$id]);
}

// Redireciona de volta para a página do carrinho
header("Location: carrinho.php");
exit;
?>