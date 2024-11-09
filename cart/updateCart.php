<?php
session_start();

if (isset($_GET['id']) && isset($_GET['action'])) {
    $id = $_GET['id'];
    $action = $_GET['action'];

    foreach ($_SESSION['carrinho'] as &$produto) {
        if ($produto['id'] == $id) {
            if ($action == 'add') {
                $produto['quantidade'] += 1;
            } elseif ($action == 'subtract' && $produto['quantidade'] > 1) {
                $produto['quantidade'] -= 1;
            }
            break;
        }
    }
}
header('Location: index.php');
exit;
?>