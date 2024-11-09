<?php
session_start();

include('../config.php');

$quantidadeProdutos = isset($_SESSION['carrinho']) ? count($_SESSION['carrinho']) : 0;

function calcularTotalCarrinho() {
    $total = 0;
    if (isset($_SESSION['carrinho'])) {
        foreach ($_SESSION['carrinho'] as $produto) {
            $precoOriginal = $produto['preco'];
            $quantidade = (int) $produto['quantidade'];

            $precoLimpo = preg_replace('/[R$\s.]/', '', $precoOriginal);
            $precoLimpo = str_replace(' ','', $precoLimpo);
            $precoLimpo = str_replace(',', '.', $precoLimpo);
            
            $precoFloat = (float)$precoLimpo;

            $total += $precoFloat * $quantidade;
        }
        }
    return $total;
}

    $totalFinal = calcularTotalCarrinho() + 5.40;

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
    <link rel="stylesheet" href="../styles/style-cart.css">
    <link rel="stylesheet" href="../config.css">
</head>
<body>
    <header>
        <div class="logo">
            <a href="../home/"><img src="../assets/logo.png" alt=""><h1 class="title">Les Délices d'Héliopolis</h1></a>
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
                            <a class='btn-secundary' id='btn-prod' href='delCart.php?id=" . $produto['id'] . "'><button id='item-btn'>Remover do Carrinho</button></a>
                        </div>
                    </div>";    

                    $totalItens = +$produto['quantidade'];
                }

            ?>
        </div>

        <div class="cart-info">
            <p>Você tem <span><?php echo $quantidadeProdutos ?> itens</span> no carrinho.</p>

            <table>
                <tr>
                    <td class="tb-text">
                        Subotal
                    </td>

                    <td class="tb-value">
                    <?php echo "R$" . number_format(calcularTotalCarrinho(),2,",",".")  ?>
                    </td>
                </tr>    

                <tr>
                    <td class="tb-text">
                        Frete
                    </td>

                    <td class="tb-value">
                    R$5,40
                    </td>
                </tr>
                <tr>
                    <td class="tb-text">
                        Total
                    </td>

                    <td class="tb-value">
                    <?php echo "R$" . number_format($totalFinal,2,",",".")  ?>
                    </td>
                </tr>
            </table>

            <a href="" class="btn-primary"><button id="btn-buy">Concluir Compra</button></a>
        </div>
    </div>
</body>
</html>