<?php 
   session_start();

   include("config.php");
   if(!isset($_SESSION['valid'])){
    header("Location: login.php");
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
    <link rel="stylesheet" href="./styles/style-login.css">
    <link rel="stylesheet" href="./styles/style-login-responsive.css">
    <link rel="shortcut icon" href="./styles/assets/favicon.ico" type="image/x-icon">
</head>
<body>
    <!-- Cabeçalho atualização 09/10-->
    <header>
        <div class="logo">
            <a href="home.php"><img src="./styles/assets/logo.png" alt=""><h1 class="title">Les Délices d'Héliopolis</h1></a>
        </div>
    </header>

    <div class="register">
        <main class="content">
        <?php 
               if(isset($_POST['submit'])){
                $name = $_POST['name'];
                $user = $_POST['user'];
                $email = $_POST['email'];


                $edit_query = mysqli_query($conexao,"UPDATE userstbl SET name='$name',User='$user', email='$email' WHERE idUser='$idUser' ") or die("error occurred");

                if($edit_query){
                    echo "<div class='sucess'>
                       <img src='./styles/assets/warn-sucess.svg'><p>Dados atualizados com sucesso!</p>
                  </div> <br>";
       
                }
               }else{

                $query = mysqli_query($conexao,"SELECT*FROM userstbl WHERE idUser='$idUser' ");

                while($result = mysqli_fetch_assoc($query)){
                    $res_name = $result['name'];
                    $res_user = $result['user'];
                    $res_email = $result['email'];
                    $res_tel = $result['tel'];
                }
            }
            ?>
            <form action="" method="post">
            <label for="name" class="title-input">Seu nome</label>
                <input type="text" name="name" id="name" placeholder="<?php echo $res_name ?>" >
                <label for="name" class="p-input">Altere seu nome</label>

                <label for="user" class="title-input">Usuário</label>
                <input type="text" name="user" id="user" placeholder="<?php echo $res_user ?>">
                <label for="user" class="p-input">Altere seu nome de usuário</label>

                <label for="email" class="title-input">E-mail</label>
                <input type="text" name="email" id="email" placeholder="<?php echo $res_email ?>">
                <label for="email" class="p-input">Altere seu e-mail</label>

                <label for="telefone" class="title-input">Telefone</label>
                <input type="tel" name="telefone" maxlength="15" id="telefone" placeholder="<?php echo $res_tel ?>" onkeyup="handlePhone(event)" required>
                <label for="telefone" class="p-input">Altere seu número de telefone</label>

                <label for="passsword" class="title-input">Senha</label>
                <input type="password" name="password" id="password" placeholder="**********" disabled>
                <label for="email" class="p-input">Você deve entrar em contato com o suporte LDD'H para alterar sua senha.</label>

                <div class="btns">
                    <input type="submit" name="submit" id="submit" value="Atualizar dados" class="btn">
                    <a href="./user.php"><img src="./styles/assets/arrow-left.svg" alt="">Voltar</a>
                </div>
            </form>
        </main>
    </div>
    <script src="script.js"></script>
</body>
</html>