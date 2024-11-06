<?php
session_start();
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

                                    <button>-</button><p class='item-qnt'>" . $produto['quantidade'] . "</p> <button>+</button>
                                </div>
                            <a class='btn' id='btn-prod' href='delCart.php?id=" . $produto['id'] . "'>Remover do Carrinho</a>
                        </div>
                    </div>";    
                }

            ?>
        </div>

        <div class="cart-info">
           
        </div>
    </div>
</body>
</html>