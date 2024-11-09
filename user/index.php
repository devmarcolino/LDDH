<?php 
   session_start();

   include("../config.php");
   if(!isset($_SESSION['valid'])){
    header("Location: ../login/");
   }
   $idUser = $_SESSION['idUser'];
   $query = mysqli_query($conexao,"SELECT*FROM userstbl WHERE idUser='$idUser' ");

                while($result = mysqli_fetch_assoc($query)){
                    $res_name = $result['name'];
                    $res_user = $result['user'];
                    $res_email = $result['email'];
                    $res_tel = $result['tel'];
                }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LDD'H |  @<?php echo $res_user ?> </title>
    <link rel="stylesheet" href="../styles/style-user.css">
    <link rel="stylesheet" href="../styles/style-user-responsive.css">
    <link rel="stylesheet" href="../config.css">
    <link rel="shortcut icon" href="./styles/assets/favicon.ico" type="image/x-icon">
</head>
<body>
    <!-- Cabeçalho atualização 09/10-->
    <header>
        <div class="logo">
            <a href="./home.php"><img src="../assets/logo.png" alt=""><h1 class="title">Les Délices d'Héliopolis</h1></a>
        </div>
    </header>

    <div class="content">
        <?php 
                $query = mysqli_query($conexao,"SELECT*FROM userstbl WHERE idUser='$idUser' ");

                while($result = mysqli_fetch_assoc($query)){
                    $res_name = $result['name'];
                    $res_user = $result['user'];
                    $res_email = $result['email'];
                }
            
        ?>
        
        <div class="user">
            <div class="user-menu">
                <div class="user-info">
                    <img src="../assets/Generic avatar.svg" alt="">
                    <p class="user-text">
                        @<?php echo $res_user ?>
                    </p>
                </div>

                <div class="logout">
                    <a href="./logout.php"><img src="../assets/exit-login.svg" alt=""></a>
                </div>
                    <p></p>
                <div class="user-content">
                    <table>
                        <tbody>
                            <tr class="table-line">
                                <td class="title-info">Nome</td>
                                <td class="info-user"><?php echo $res_name ?></td>
                            </tr>
                            <tr class="table-line">
                                <td class="title-info">Usuário</td>
                                <td class="info-user"><?php echo $res_user ?></td>
                            </tr>
                            <tr class="table-line">
                                <td class="title-info">E-mail</td>
                                <td class="info-user"><?php echo $res_email ?></td>
                            </tr>
                            <tr class="table-line">
                                <td class="title-info">Telefone</td>
                                <td class="info-user"><?php echo $res_tel ?></td>
                            </tr>
                            <tr class="table-line">
                                <td class="title-info">Senha</td>
                                <td class="info-user">******</td>
                            </tr>
                        </tbody>
                    </table>
                    <a href="./editUser.php" ><button class="btn">Atualizar perfil</button></a>
                </div>
            </div>
            <div class="tab-cards">
            <a class="box-link" href="../pedidos/">   
                <div class="card" id="card-one">
                    <div class="background" id="back-one"></div>

                    <div class="text-card">
                        <h1>Seus pedidos</h1>
                        <p>Veja seus pedidos anteriores ou que estão em andamento.</p>
                    </div>
                </div>
            </a>

            <a class="box-link" href="../cart/">
                <div class="card" id="card-two" style="margin-bottom: 0px;">
                    <div class="background" id="back-two"></div>

                    <div class="text-card">
                        <h1>Seu carrinho</h1>
                        <p>Veja os produtos que você guardou no seu carrinho!</p>
                    </div>
                </div>
            
        </div>    
        </div>
    </div>
    <script src="../script.js"></script>
</body>
</html>