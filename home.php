<?php 
   session_start();

   include("config.php");
   if(!isset($_SESSION['valid'])){
    header("Location: login.php");
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
    <title>LDD'H</title>
    <link rel="stylesheet" href="./styles/style.css">
    <link rel="stylesheet" href="./styles/style-laptop.css">
    <link rel="stylesheet" href="./styles/style-responsive.css">
    <link rel="shortcut icon" href="./styles/assets/favicon.ico" type="image/x-icon">
</head>
<body>
    <!-- Cabeçalho atualização 09/10-->
    <header>
        <div class="logo">
            <a href=""><img src="styles/assets/logo.png" alt=""><h1 class="title">Les Délices d'Héliopolis</h1></a>
        </div>
        <nav>
            <div class="nav-list">
            <ul>
                <li class="nav-item"><a href="#search-content">Ínicio</a></li>
                <li class="nav-item"><a href="#content-four">Produtos</a></li>
                <li class="nav-item"><a href="#content-two">Avaliação</a></li>
                <li class="nav-item"><a href="#contact-us">Contato</a></li>
                <li class="nav-item"><a href="#location">Localização</a></li>


                <?php 
            
            
            ?>
               
               <li class='user-item'>
                    <a href='user.php?idUser=<?php echo $res_id ?>' target='_blank' class='btn-register'>
                        <img src='./styles/assets/Generic avatar.svg'>

                         @<?php echo $res_user ?> 
                         
                        <img src='./styles/assets/Arrow Right.svg'>
                    </a>
                </li>
            </ul>
            
            

            <div class="mobile-menu-icon">
                <button onclick="showMenu()" id="menu-icon"><img src="./styles/assets/menu.svg"></button>
            </div>
        </div>
        </nav>

        <div class="mobile-menu">
        <div class="nav-list">
            <ul>
                <li class="nav-item"><a href="#search-content">Ínicio</a></li>
                <li class="nav-item"><a href="#content-four">Produtos</a></li>
                <li class="nav-item"><a href="#content-two">Avaliação</a></li>
                <li class="nav-item"><a href="#contact-us">Contato</a></li>
                <li class="nav-item"><a href="#location">Localização</a></li>


                <?php 
            
            
            ?>
               
               <li class='user-item'>
                    <a href='user.php?idUser=<?php echo $res_id ?>' target='_blank' class='btn-register'>
                        <img src='./styles/assets/Generic avatar.svg'>

                         @<?php echo $res_user ?> 
                         
                        <img src='./styles/assets/Arrow Right.svg'>
                    </a>
                </li>
            </ul>
        </div>
        </div>
    </header>
    
    
    
    <!-- Conteudo 1 atualização 09/10-->
    <div class="content">
    <main id="search-content">
        
        <div class="text">
        <h1 class="title">
            Onde o sabor do sol<br> encontra a arte do vinho.
        </h1>

        <p class="content-text">
            Pesquise seus vinhos favoritos da LDD’H ou outros vinhos ou bebidas exclusivas!
        </p>
        <div class="input-search">
        <img src="./styles/assets/Search.svg" class="search-icon"><input type="search" name="search" id="search" action="produtos.php" placeholder="Pesquise seus produtos LDD'H favoritos!">
        </div>
    </div>
        
    </main>

    <main id="content-four">
        <div class="prod-title">
            <h1 class="title">Produtos</h1>
            <p class="content-text">Veja nosso catálogo oficial de vinhos e outras bebidas totalmente virtual.</p>
        </div>

        <div class="prod-tab">
            <button class="tab-btn active" content-id="lddh">Oficial d'Héliopolis</button>
            <button class="tab-btn" content-id="ex">Exclusivos</button>
            <button class="tab-btn" content-id="whisky">Whiskys</button>
            <button class="tab-btn" content-id="champ">Champagnes</button>
        </div>

        
        <div class="prods">
        <div id="lddh" class="cat">
                <?php
                include_once("./config.php");
                // Query para selecionar produtos únicos (DISTINCT)
                $sql = "SELECT DISTINCT idProd, nomeProd, precoProd, descProd, imgProd, catProd FROM prodstbl WHERE catProd = 'LDDH'";
                $result = $conexao->query($sql);

                // Verificar se existem resultados
                if ($result->num_rows > 0) {
                    // Iterar pelos produtos e exibir
                    while($row = $result->fetch_assoc()) {
                        echo "<div class='prod-item' style='background: url(" .$row["imgProd"]. ") no-repeat top/cover;' id='prod-item-one'>
                                <div class='title-prod'>
                                    <h3 class='prod-name'>" .$row["nomeProd"]. "</h3>
                                </div>
                            <div class='buy'>
                                <p class='prod-price'>" .$row["precoProd"]. "</p>
            
                                  <form action='product.php?nomeProd=" .$row["nomeProd"]. "' method='post'>
                                    <input type='hidden' id='idProd' name='idProd' value='" . $row['idProd'] . "'>
                                    <input type='submit' class='btn-buy' value='Comprar'>
                                </form>
                                </div>
                            </div> ";
                    }
                } else {
                    echo "<div class='message'>
                       <img src='./styles/assets/warn-error.svg'><p>Nenhum produto encontrado.</p>
                  </div> <br>";
                }
                ?>
            </div>

            <div id="ex" class="cat">
                <?php
                include_once("./config.php");
                // Query para selecionar produtos únicos (DISTINCT)
                $sql = "SELECT DISTINCT idProd, nomeProd, precoProd, descProd, imgProd, catProd FROM prodstbl WHERE catProd = 'Exclusivo'";
                $result = $conexao->query($sql);

                // Verificar se existem resultados
                if ($result->num_rows > 0) {
                    // Iterar pelos produtos e exibir
                    while($row = $result->fetch_assoc()) {
                        echo "<div class='prod-item' style='background: url(" .$row["imgProd"]. ") no-repeat top/cover;' id='prod-item-one'>
                                <div class='title-prod'>
                                    <h3 class='prod-name'>" .$row["nomeProd"]. "</h3>
                                </div>
                            <div class='buy'>
                                <p class='prod-price'>" .$row["precoProd"]. "</p>
            
                                <form action='product.php?nameProd=" .$row["nomeProd"]. "' method='post'>
                                    <input type='hidden' id='idProd' name='idProd' value='" . $row['idProd'] . "'>
                                    <input type='submit' class='btn-buy' value='Comprar'>
                                </form>
                                </div>
                            </div> ";
                    }
                } else {
                    echo "<div class='message'>
                       <img src='./styles/assets/warn-error.svg'><p>Nenhum produto encontrado.</p>
                  </div> <br>";
                }
                ?>
            </div>

            <div id="whisky" class="cat">
            <?php
                include_once("./config.php");
                // Query para selecionar produtos únicos (DISTINCT)
                $sql = "SELECT DISTINCT idProd, nomeProd, precoProd, descProd, imgProd, catProd FROM prodstbl WHERE catProd = 'Whisky'";
                $result = $conexao->query($sql);

                // Verificar se existem resultados
                if ($result->num_rows > 0) {
                    // Iterar pelos produtos e exibir
                    while($row = $result->fetch_assoc()) {
                        echo "<div class='prod-item' style='background: url(" .$row["imgProd"]. ") no-repeat top/cover;' id='prod-item-one'>
                                <div class='title-prod'>
                                    <h3 class='prod-name'>" .$row["nomeProd"]. "</h3>
                                </div>
                            <div class='buy'>
                                <p class='prod-price'>" .$row["precoProd"]. "</p>
            
                                <form action='product.php?nameProd=" .$row["nomeProd"]. "' method='post'>
                                    <input type='hidden' id='idProd' name='idProd' value='" . $row['idProd'] . "'>
                                    <input type='submit' class='btn-buy' value='Comprar'>
                                </form>
                                </div>
                            </div> ";
                    }
                } else {
                    echo "<div class='message'>
                       <img src='./styles/assets/warn-error.svg'><p>Nenhum produto encontrado.</p>
                  </div> <br>";
                }
                ?>
            </div>

            <div id="champ" class="cat">
            <?php
                include_once("./config.php");
                // Query para selecionar produtos únicos (DISTINCT)
                $sql = "SELECT DISTINCT idProd, nomeProd, precoProd, descProd, imgProd, catProd FROM prodstbl WHERE catProd = 'Champagne'";
                $result = $conexao->query($sql);

                // Verificar se existem resultados
                if ($result->num_rows > 0) {
                    // Iterar pelos produtos e exibir
                    while($row = $result->fetch_assoc()) {
                        echo "<div class='prod-item' style='background: url(" .$row["imgProd"]. ") no-repeat top/cover;' id='prod-item-one'>
                                <div class='title-prod'>
                                    <h3 class='prod-name'>" .$row["nomeProd"]. "</h3>
                                </div>
                            <div class='buy'>
                                <p class='prod-price'>" .$row["precoProd"]. "</p>
            
                                <form action='product.php?nameProd=" .$row["nomeProd"]. "' method='post'>
                                    <input type='hidden' id='idProd' name='idProd' value='" . $row['idProd'] . "'>
                                    <input type='submit' class='btn-buy' value='Comprar'>
                                </form>
                                </div>
                            </div> ";
                    }
                } else {
                    echo "<div class='message'>
                       <img src='./styles/assets/warn-error.svg'><p>Nenhum produto encontrado.</p>
                  </div> <br>";
                }
                ?>
            </div>
        
           </div>

           <a href="./produtos.php" target="_blank" class="btn" id="btn-more"><button>Ver mais produtos</button></a>
    </main>


    <main id="content-two">

        <div class="rate" id="rate-one">
            <img src="styles/assets/user-one.svg" div="img-rate" alt="avatar">
            <div class="text-rate">
            <p class="rate-text">
                “Que lugar incrível! Vinhos com gostos únicos!”
            </p>
            <p class="rate-user">Henrique</p>

            <img src="styles/assets/Star.svg" alt="">
        </div>
        </div>

        <div class="rate" id="rate-two">
            <div class="rate-text">
            <img src="styles/assets/user-two.svg" div="img-rate" alt="avatar">
        </div>
            <div class="text-rate">
            <p class="rate-text">
                “Ideia interessante e inovadora de adega!”
            </p>
            <p class="rate-user">Eduardo</p>

            <img src="styles/assets/Star.svg" alt="">
            </div>
        </div>

        <div class="rate" id="rate-three">
            <img src="./styles/assets/user-three.svg" div="img-rate" alt="avatar">
            <div class="text-rate">
            <p class="rate-text">
                “Irei voltar e levar todos os vinhos, incríveis!”
            </p>
            <p class="rate-user">Lucas Andrade</p>

            <img src="styles/assets/Star.svg" alt="">
        </div>
        </div>
    </main>

    <main id="contact-us">
        <div class="contact-text">
            <h1 class="title">Fale Conosco</h1>
            <p class="content-text">Faça reclamações, sugira novas novidades para nossa empresa entrando em contato conosco!</p>
        </div>

        <div class="contact-content">
            <img src="./styles/assets/contact.svg" alt="">

            <div class="contact-form">
            <?php

                include_once('config.php');



                if (isset($_POST['submit']))
                {

                    $name = $_POST['name'];
                    $tel = $_POST['telefone'];
                    $msg = $_POST['text'];

                    $result = mysqli_query($conexao, "INSERT INTO contactstbl(name, tel, msg) 
                        VALUES ('$name', '$tel', '$msg')"); 

                    echo "<div class='sucess'>
                    <img src='./styles/assets/warn-sucess.svg'><p>Enviado com sucesso!</p>
                    </div> <br>";
                }

                ?>
                <form action="./home.php/#contact-us" method="post">
                    <label for="name" class="title-input">Nome</label>
                    <input type="text" name="name" id="name" placeholder="Nome" value="<?php echo $res_name ?> " required disabled>
    
                    <label for="telefone" class="title-input">Telefone</label>
                    <input type="tel" name="telefone" id="telefone" placeholder="(00)-00000-0000" value="<?php echo $res_tel ?>" required disabled>
    
                    <label for="text" class="title-input">O que tem para nos dizer?</label>
                    <textarea type="text" name="text" id="text" placeholder="Insira sua mensagem aqui" required></textarea>
                    <label for="text" class="p-input">Essa mensagem será encaminhada a equipe LDD’H S.A.</label>
    
                    <input type="submit" name="submit" id="submit" value="Enviar" class="btn">    
                </form>
            </div>
        </div>
    </main>

    <main id="location">
        <div class="location-text">
            <h1 class="title">Nossa adega física</h1>
            <p class="content-text">
                Localizada na região do Heliópolis, ótimo local para quem<br> mora na comunidade e para quem vem do Ipiranga, Sacomâ,<br> São Caetano do Sul, e região.
                <br><br>
                <span>Estr. das Lágrimas, 1478 - Ipiranga, São Paulo - SP, 04231-015</span>
            </p>
        </div>

        
        <div class="mapouter">
            <div class="gmap_canvas">
                <iframe class="gmap_iframe" width="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=476&height=302&hl=en&q=Estr. das Lágrimas, 1478 - Ipiranga&t=&z=15&ie=UTF8&iwloc=B&output=embed"></iframe>
            </div>
        </div>
                    </main>
    </div>

    <footer>
        <div class="logo-footer">
        <a href=""><img src="styles/assets/logo.png" alt=""><h1 class="title" id="title-footer">Les Délices d'Héliopolis</h1></a>

        <p class="content-text" id="endereco">Est. das Lagrimas Nº 78 - Heliópolis</p>
        <p class="content-text" id="footer-text">LDD'H S.A. &copy; 2024 - Todos os direitos reservados</p>
        </div>

        

        <div class="social-list">
            <ul>
                <li class="social-item"><a href="http://" target="_blank"><button class="btn-social"><img src="styles/assets/Twitter.svg" alt=""></a></button></li>
                <li class="social-item"><a href="http://" target="_blank"><button class="btn-social"><img src="styles/assets/YouTube.svg" alt=""></a></button></li>
                <li class="social-item"><a href="http://" target="_blank"><button class="btn-social"><img src="styles/assets/Instagram.svg" alt=""></a></button></li>
                <li class="social-item"><a href="http://" target="_blank"><button class="btn-social"><img src="styles/assets/LinkedIn.svg" alt=""></a></button></li>
            </ul>
        </div>
    </footer>
    <script src="script.js"></script>
</body>
</html>