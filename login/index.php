<?php 
   session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LDD'H | Login</title>
    <link rel="stylesheet" href="../styles/style-login.css">
    <link rel="stylesheet" href="../styles/style-login-responsive.css">
    <link rel="stylesheet" href="../config.css">
    <link rel="shortcut icon" href="../assets/favicon.ico" type="image/x-icon">
</head>
<body>
    <!-- Cabeçalho atualização 09/10-->
    <header>
        <div class="logo">
            <a href="../"><img src="../assets/logo.png" alt=""><h1 class="title">Les Délices d'Héliopolis</h1></a>
        </div>
    </header>

    <div class="login">
        <main class="content">
            <?php 
             
              include("../config.php");
              if(isset($_POST['submit'])){
                $user = mysqli_real_escape_string($conexao,$_POST['user']);
                $password = mysqli_real_escape_string($conexao,$_POST['password']);

                $result = mysqli_query($conexao,"SELECT * FROM userstbl WHERE user='$user' AND password='$password' ") or die("Select Error");
                $row = mysqli_fetch_assoc($result);

                if(is_array($row) && !empty($row)){
                    $_SESSION['valid'] = $row['user'];
                    $_SESSION['name'] = $row['name'];
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['idUser'] = $row['idUser'];
                }else{
                    echo "<div class='message'>
                    <img src='../assets/warn-error.svg'><p>Usuário ou senha incorretos</p><button onclick='closeWarn()'><img src='../assets/x.svg'></button>
               </div>";
         
                }
                if(isset($_SESSION['valid'])){
                    header("Location: ../home/");
                }
              }else{

              }
            ?>
            <form id="" action="" method="post"> 
                <label for="user" class="title-input">E-mail ou @usuário</label>
                <input type="text" name="user" id="user" placeholder="E-mail ou @usuário" required>
             
                <label for="password" class="title-input">Senha</label>
                <input type="password" name="password" id="password" placeholder="Senha" required>

                <input type="submit" name="submit" id="submit" value="Entrar" class="btn">

                <a href="../register/" id="href-reg">Não tem uma conta? Crie sua conta</a>
            </form>
        </main>
    </div>
    <script src="../script.js"></script>
</body>
</html>