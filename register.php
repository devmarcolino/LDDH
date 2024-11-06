<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LDD'H - Register panel</title>
    <link rel="stylesheet" href="./styles/style-login.css">
    <link rel="stylesheet" href="./styles/style-login-responsive.css">
</head>
<body>
    <!-- Cabeçalho atualização 09/10-->
    <header>
        <div class="logo">
            <a href="Index.php"><img src="./styles/assets/logo.png" alt=""><h1 class="title">Les Délices d'Héliopolis</h1></a>
        </div>
    </header>

    <div class="login-tab">
    </div>
    <div class="register">
        <main class="content">
        <?php 
         
         include("config.php");
         if(isset($_POST['submit'])){
            $name = $_POST['name'];
            $user = $_POST['user'];
            $email = $_POST['email'];
            $telefone = $_POST['telefone'];
            $password = $_POST['password'];

         //verifying the unique email

         $verify_query = mysqli_query($conexao,"SELECT email FROM userstbl WHERE email='$email'");
         $verify_query_user = mysqli_query($conexao,"SELECT user FROM userstbl WHERE user='$user'");
         $verify_query_tel = mysqli_query($conexao,"SELECT tel FROM userstbl WHERE tel='$telefone'");
         
         if(mysqli_num_rows($verify_query) !=0 ){
            echo "<div class='message'>
                       <img src='./styles/assets/warn-error.svg'><p>Esse email já está em uso, use outro!</p><button onclick='closeWarn()'><img src='./styles/assets/x.svg'></button>
                  </div> <br>";
         }

         elseif(mysqli_num_rows($verify_query_user) !=0 ){
            echo "<div class='message'>
                      <img src='./styles/assets/warn-error.svg'><p>Esse nome de usuário já está em uso, use outro!</p><button onclick='closeWarn()'><img src='./styles/assets/x.svg'></button>
                  </div> <br>";
         }

         elseif(mysqli_num_rows($verify_query_tel) !=0 ) {
            echo "<div class='message'>
                      <img src='./styles/assets/warn-error.svg'><p>Esse telefone já está em uso, use outro!</p><button onclick='closeWarn()'><img src='./styles/assets/x.svg'></button>
                  </div> <br>";
         }
         else{

            mysqli_query($conexao,"INSERT INTO userstbl(name,user,email,tel,password) VALUES('$name','$user','$email','$telefone','$password')") or die("Erroe Occured");

            echo "<div class='sucess'>
                       <img src='./styles/assets/warn-sucess.svg'><p>Registro concluído!</p><button onclick='loginRedc()'><img src='./styles/assets/login.svg'></button>
                  </div> <br>";
         
         }
         }else{

         } 
         ?>
            <form action="" method="post">
                <label for="name" class="title-input">Nome completo</label>
                <input type="text" name="name" id="name" placeholder="Nome" required>
                <label for="name" class="p-input">Insira seu nome completo</label>

                <label for="user" class="title-input">Usuário</label>
                <input type="text" name="user" id="user" placeholder="Usuário" required>
                <label for="user" class="p-input">Insira um nome de usuário para utilizar na plataforma</label>

                <label for="email" class="title-input">E-mail</label>
                <input type="text" name="email" id="email" placeholder="E-mail" onblur="validacaoEmail(f1.email)" required>
                <label for="email" class="p-input">Insira seu e-mail</label>

                <label for="telefone" class="title-input">Telefone</label>
                <input type="tel" name="telefone" minlength="11" maxlength="15" id="telefone" placeholder="(00)-00000-0000" onkeyup="handlePhone(event)" required>
                <label for="telefone" class="p-input">Insira seu número de telefone</label>

                <label for="password" class="title-input">Senha</label>
                <input type="password" name="password" id="password" placeholder="Senha" required>
                <label for="passsword" class="p-input">Crie uma senha para acessar sua conta</label>

                <input type="submit" name="submit" id="submit" value="Registrar" class="btn">

                <a href="login.php">Já tem uma conta? Acessar conta</a>
            </form>
        </main>
    </div>
    <script src="script.js"></script>
</body>
</html>