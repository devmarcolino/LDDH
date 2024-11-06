<?php 
   session_start();

   include("config.php");
   if(!isset($_SESSION['valid'])){
    header("Location: login.php");
   }

            $idUser = $_SESSION['idUser'];
            $idProd = $_POST['idProd'];

            $query = mysqli_query($conexao,"SELECT*FROM userstbl WHERE idUser='$idUser'");
            $query_prod = mysqli_query($conexao,"SELECT*FROM prodstbl WHERE idProd='$idProd'");

            while($result = mysqli_fetch_assoc($query)){
                $res_name = $result['name'];
                $res_user = $result['user'];
                $res_email = $result['email'];
                $res_tel = $result['tel'];
                $res_id = $result['idUser'];
            }

            while($result_prod = mysqli_fetch_assoc($query_prod)){
                $idProd = $result_prod['idProd'];
                $prodName = $result_prod['nomeProd'];
                $precoProd = $result_prod['precoProd'];
                $descProd = $result_prod['descProd'];
                $imgProd = $result_prod['imgProd'];
                $catProd = $result_prod['catProd'];
                $codProd = $result_prod['codProd'];
                $estoqueProd = $result_prod['estoqueProd'];
            }
?>

<!DOCTYPE html>
<html lang="php">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $prodName ?> | LDDH</title>
    <link rel="stylesheet" href="./styles/style-product.css">
    <link rel="shortcut icon" href="./styles/assets/favicon.ico" type="image/x-icon">
</head>
<body>
<header>
        <div class="logo">
            <a href="./home.php"><img src="styles/assets/logo.png" alt=""><h1 class="title">Les Délices d'Héliopolis</h1></a>
        </div>
        <nav>
            <div class="nav-list">
            <ul>
                <li class="nav-item"><a href="./home.php#search-content">Ínicio</a></li>
                <li class="nav-item"><a href="./home.php#content-four">Produtos</a></li>
                <li class="nav-item"><a href="./home.php#content-two">Avaliação</a></li>
                <li class="nav-item"><a href="./home.php#contact-us">Contato</a></li>
                <li class="nav-item"><a href="./home.php#location">Localização</a></li>


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


  <div class="content">
    <section class="prod">
        <img src="<?php echo $imgProd ?>" alt="" width="504px" height="455px">
        
        <div class="product">
            <div class="prod-infos">
                <h1 class="title"><?php echo $prodName ?></h1>
                <div class="prod-cat">
                    <p><?php echo $catProd ?></p>
                </div>
                <h3 class="priceProd"><?php echo $precoProd ?></h3>
                <p class="codProd">#RFLDDH_<?php echo $codProd ?></p>
            </div>
            <div class="buy-prod">
                <form action="cart.php" method="post">
                    <select name="qnt" id="qnt">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                    </select>

                    
                        <input type="hidden" name="idProd" id="idProd" value="<?php echo $idProd ?>">
                        <input type="hidden" name="nomeProd" id="nomeProd" value="<?php echo $prodName ?>">
                        <input type="hidden" name="precoProd"  id="precoProd" value="<?php echo $precoProd ?>">
                        <input type="hidden" name="descProd" id="descProd" value="<?php echo $descProd ?>">
                        <input type="hidden" name="imgProd" name="imgProd" value="<?php echo $imgProd ?>">
                        <input type="hidden" name="catProd" name="catProd" value="<?php echo $catProd ?>">
                        <input type="hidden" name="codProd" name="codProd" value="<?php echo $codProd ?>">
                        <input type="submit" class="btn" id="btn-more" name="comprar" value="Comprar">
                </form>

                <div class="desc-prod">
                    <h3>Descrição do produto</h3>
                    <p><?php echo $descProd ?></p>
                </div>
            </div>
        </div>    
    </section>
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