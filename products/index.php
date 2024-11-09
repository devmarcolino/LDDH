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
           </div>
    </main>


    <script src="script.js"></script>

    <footer>
        <div class="logo-footer">
        <a href=""><img src="styles/assets/logo.png" alt=""><h1 class="title" id="title-footer">Les Délices d'Héliopolis</h1></a>

        <p class="content-text" id="endereco">Estr. das Lágrimas, 1478 - Ipiranga, São Paulo - SP, 04231-015</p>
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
    
</body>
</html>