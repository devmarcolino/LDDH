<?php
session_start();

include('./config.php');

function calcularTotalCarrinho() {
    $total = 0;
    if (isset($_SESSION['carrinho'])) {
        foreach ($_SESSION['carrinho'] as $produto) {
            $preco = (float) preg_replace('/[^0-9.]/', '', $produto['preco']);
            $quantidade = (int) $produto['quantidade'];

            // Ajuste de valores em centavos (ex.: 1424 se tornará 14.24)
            if ($preco >= 1000) {
                $preco = $preco / 100;
            }

            $total += $preco * $quantidade;
        }
        }
    return $total;
}

    $idUser = $_SESSION['idUser'];

    $query = mysqli_query($conexao,"SELECT*FROM userstbl WHERE idUser='$idUser'");


    while($result = mysqli_fetch_assoc($query)){
        $res_name = $result['name'];
        $res_user = $result['user'];
        $res_email = $result['email'];
        $res_tel = $result['tel'];
        $res_id = $result['idUser'];
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho | LDDH - @<?php echo $res_user ?></title>
    <link rel="stylesheet" href="./styles/style-cart.css">
</head>
<body>
    <header>
        <div class="logo">
            <a href="./index.php"><img src="./styles/assets/logo.png" alt=""><h1 class="title">Les Délices d'Héliopolis</h1></a>
        </div>
    </header>
    <div class="content">
        <div class="cart-list">
            <?php 
                if (!isset($_SESSION['carrinho']) || empty($_SESSION['carrinho'])) {
                    echo "Seu carrinho está vazio.";
                    exit;
                }

                foreach ($_SESSION['carrinho'] as $produto) {
                    
                    echo "
                    <div class='cart-item'>
                        <img width='104px' height='104px' src='". $produto['img'] ."'>
                        <div class='item-info'>
                            <p class='item-name'>" . $produto['nome'] . "</p>
                                <div class='price-qnt'>
                                    <p class='item-price'>" . $produto['preco'] . "</p>

                                    <a href='updateCart.php?id=". $produto['id']. "&action=subtract'>-</a>
                                        <p class='item-qnt'>". $produto['quantidade']. "</p>
                                    <a href='updateCart.php?id=". $produto['id'] ."&action=add'>+</a>
                                </div>
                            <a class='btn' id='btn-prod' href='delCart.php?id=" . $produto['id'] . "'>Remover do Carrinho</a>
                        </div>
                    </div>";    

                    $totalItens = +$produto['quantidade'];
                }

            ?>
        </div>

        <div class="cart-info">
            <p>Você tem 2 itens no carrinho.</p>
            <p>R$<?php echo calcularTotalCarrinho() ?></p>
        </div>
    </div>
</body>
</html>