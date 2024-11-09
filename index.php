<?php 
include("./config.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LDD'H</title>
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="./styles/style-responsive.css">
    <link rel="stylesheet" href="./config.css">
    <link rel="shortcut icon" href="./assets/favicon.ico" type="image/x-icon">
</head>
<body>
    <!-- Cabeçalho atualização 09/10-->
    <header>
        <div class="logo">
            <a href=""><img src="./assets/logo.png" alt=""><h1 class="title">Les Délices d'Héliopolis</h1></a>
        </div>
        <nav>
            <div class="nav-list">
            <ul>
                <li class="nav-item"><a href="#content-one">Ínicio</a></li>
                <li class="nav-item"><a href="#content-three">Exclusivos</a></li>
                <li class="nav-item"><a href="#content-four">Produtos</a></li>
                <li class="nav-item"><a href="#contact-us">Contato</a></li>
                <li class="nav-item"><a href="#location">Localização</a></li>
                <li class="nav-item-a"><a href="./register/" target="_blank" class="btn-primary" id="btn-reg">Cadastre-se</a></li>
            </ul>

            

            <div class="mobile-menu-icon">
                <button onclick="showMenu()" id="menu-icon"><img src="./styles/assets/menu.svg"></button>
            </div>
        </div>
        </nav>

        <div class="mobile-menu">
            <div class="nav-list">
                <ul>
                    <li class="nav-item"><a href="#content-one">Ínicio</a></li>
                    <li class="nav-item"><a href="#content-three">Exclusivos</a></li>
                    <li class="nav-item"><a href="#content-four">Produtos</a></li>
                    <li class="nav-item"><a href="#contact-us">Contato</a></li>
                    <li class="nav-item"><a href="#location">Localização</a></li>
                    <a href="./register/" target="_blank" class="btn-primary"><button id="btn-mobile">Cadastre-se</button></a>
                </ul>
        </div>
        </div>
    </header>
    
    
    
    <!-- Conteudo 1 atualização 09/10-->
    <div class="content">
    <main id="content-one">
        
        <div class="text">
            <h2 class="subtitle">
                Les Délices d'Héliopolis
            </h2>
        <h1 class="title">
            Onde o sabor do sol encontra a arte do vinho.
        </h1>

        <p class="content-text">
            Bem-vindo à Les Delices d'Héliopolis, onde<wbr> cada taça revela a essência dos nossos<wbr> vinhos e a paixão pela arte de vinificar, e<wbr> tudo isso com o brilho do sol.
        </p>
        
        <a href="./register/" target="_blank" class="btn-primary" id="btn-home-one"><button>Cadastre-se</button></a>
        <a href="#content-four" class="btn-secundary" id="btn-home-two"><button>Ver variedades</button></a>
    </div>
        <img src="./assets/wine-woman.svg" alt="">
    </main>

    <main id="content-two">

        <div class="rate" id="rate-one">
            <img src="./assets/user-one.svg" div="img-rate" alt="avatar">
            <div class="text-rate">
            <p class="rate-text">
                “Que lugar incrível! Vinhos com gostos únicos!”
            </p>
            <p class="rate-user">Henrique</p>

            <img src="./assets/Star.svg" alt="">
        </div>
        </div>

        <div class="rate" id="rate-two">
            <div class="rate-text">
            <img src="./assets/user-two.svg" div="img-rate" alt="avatar">
        </div>
            <div class="text-rate">
            <p class="rate-text">
                “Ideia interessante e inovadora de adega!”
            </p>
            <p class="rate-user">Eduardo</p>

            <img src="./assets/Star.svg" alt="">
            </div>
        </div>

        <div class="rate" id="rate-three">
            <img src="./assets/user-three.svg" div="img-rate" alt="avatar">
            <div class="text-rate">
            <p class="rate-text">
                “Irei voltar e levar todos os vinhos, incríveis!”
            </p>
            <p class="rate-user">Lucas Andrade</p>

            <img src="./assets/Star.svg" alt="">
        </div>
        </div>
    </main>

    <main id="content-three">
        <h1 class="title">O que temos de diferente?</h1>

        <img src="./assets/wines.jpg" alt="" class="vine-img">

        <div class="group-text">
            <div id="group-text-one">
                <h2 class="subtitle">Vinhos produzidos artesanalmente</h2>
                <p class="content-text">
                    Nossos vinhos tem uma especialidade única e sustentável<wbr> que respeita desde o plantil das uvas, a colheita e o seu envelhecimento<wbr> e o que deixa ainda mais exclusivo, é ser feito totalmente artesanal.
                </p>
            </div>

            <div id="group-text-two">
                <h2 class="subtitle">A adega mais animada que você já viu</h2>
                <p class="content-text">
                    Nossa adega principal localizada na Estrada das Lágrimas -<wbr>Héliopolis (Zona Sul de São Paulo) conta com<wbr> diversos eventos todo fim de semana que incluem de<wbr> shows ao vivo até o nosso “Barril do Sol”.
                </p>
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
                $sql = "SELECT DISTINCT idProd, nomeProd, precoProd, descProd, imgProd, catProd FROM prodstbl WHERE catProd = 'LDDH'";
                $result = $conexao->query($sql);


                if ($result->num_rows > 0) {

                    while($row = $result->fetch_assoc()) {
                        echo "<a class='box-link' href='../lddh/product/?nameProd=" .$row["nomeProd"]. "%?idProd=" . $row['idProd'] . "'>
                            <div class='prod-item' style='background: url(" .$row["imgProd"]. ") no-repeat top/cover;' id='prod-item-one'>
                                    <div class='title-prod'>
                                        <h3 class='prod-name'>" .$row["nomeProd"]. "</h3>
                                    </div>
                                <div class='buy'>
                                    <p class='prod-price'>" .$row["precoProd"]. "</p>
                
                                    <form action='../lddh/product/?nameProd=" .$row["nomeProd"]. "%?idProd=" . $row['idProd'] . "' method='post'>
                                        <input type='hidden' id='idProd' name='idProd' value='" . $row['idProd'] . "'>
                                        <input type='submit' class='btn-buy' value='Comprar'>
                                    </form>
                                    </div>
                                </div>
                                </a> ";
                    }
                } else {
                    echo "<div class='message'>
                       <img src='./assets/warn-error.svg'><p>Nenhum produto encontrado.</p>
                  </div> <br>";
                }
                ?>
            </div>

            <div id="ex" class="cat">
            <?php
                $sql = "SELECT DISTINCT idProd, nomeProd, precoProd, descProd, imgProd, catProd FROM prodstbl WHERE catProd = 'Exclusivo'";
                $result = $conexao->query($sql);

                if ($result->num_rows > 0) {

                    while($row = $result->fetch_assoc()) {
                        echo "<a class='box-link' href='../lddh/product/?nameProd=" .$row["nomeProd"]. "%?idProd=" . $row['idProd'] . "'>
                            <div class='prod-item' style='background: url(" .$row["imgProd"]. ") no-repeat top/cover;' id='prod-item-one'>
                                    <div class='title-prod'>
                                        <h3 class='prod-name'>" .$row["nomeProd"]. "</h3>
                                    </div>
                                <div class='buy'>
                                    <p class='prod-price'>" .$row["precoProd"]. "</p>
                
                                    <form action='../lddh/product/?nameProd=" .$row["nomeProd"]. "%?idProd=" . $row['idProd'] . "' method='post'>
                                        <input type='hidden' id='idProd' name='idProd' value='" . $row['idProd'] . "'>
                                        <input type='submit' class='btn-buy' value='Comprar'>
                                    </form>
                                    </div>
                                </div>
                                </a> ";
                    }
                } else {
                    echo "<div class='message'>
                       <img src='./assets/warn-error.svg'><p>Nenhum produto encontrado.</p>
                  </div> <br>";
                }
                ?>
            </div>

            <div id="whisky" class="cat">
            <?php
                $sql = "SELECT DISTINCT idProd, nomeProd, precoProd, descProd, imgProd, catProd FROM prodstbl WHERE catProd = 'Whisky'";
                $result = $conexao->query($sql);

               
                if ($result->num_rows > 0) {
                   
                    while($row = $result->fetch_assoc()) {
                        echo "<a class='box-link' href='../lddh/product/?nameProd=" .$row["nomeProd"]. "%?idProd=" . $row['idProd'] . "'>
                            <div class='prod-item' style='background: url(" .$row["imgProd"]. ") no-repeat top/cover;' id='prod-item-one'>
                                    <div class='title-prod'>
                                        <h3 class='prod-name'>" .$row["nomeProd"]. "</h3>
                                    </div>
                                <div class='buy'>
                                    <p class='prod-price'>" .$row["precoProd"]. "</p>
                
                                    <form action='../lddh/product/?nameProd=" .$row["nomeProd"]. "%?idProd=" . $row['idProd'] . "' method='post'>
                                        <input type='hidden' id='idProd' name='idProd' value='" . $row['idProd'] . "'>
                                        <input type='submit' class='btn-buy' value='Comprar'>
                                    </form>
                                    </div>
                                </div>
                                </a> ";
                    }
                } else {
                    echo "<div class='message'>
                       <img src='./assets/warn-error.svg'><p>Nenhum produto encontrado.</p>
                  </div> <br>";
                }
                ?>
            </div>

            <div id="champ" class="cat">
            <?php
                $sql = "SELECT DISTINCT idProd, nomeProd, precoProd, descProd, imgProd, catProd FROM prodstbl WHERE catProd = 'Champagne'";
                $result = $conexao->query($sql);

                
                if ($result->num_rows > 0) {
                    
                    while($row = $result->fetch_assoc()) {
                        echo "<a class='box-link' href='../lddh/product/?nameProd=" .$row["nomeProd"]. "%?idProd=" . $row['idProd'] . "'>
                            <div class='prod-item' style='background: url(" .$row["imgProd"]. ") no-repeat top/cover;' id='prod-item-one'>
                                    <div class='title-prod'>
                                        <h3 class='prod-name'>" .$row["nomeProd"]. "</h3>
                                    </div>
                                <div class='buy'>
                                    <p class='prod-price'>" .$row["precoProd"]. "</p>
                
                                    <form action='../lddh/product/?nameProd=" .$row["nomeProd"]. "%?idProd=" . $row['idProd'] . "' method='post'>
                                        <input type='hidden' id='idProd' name='idProd' value='" . $row['idProd'] . "'>
                                        <input type='submit' class='btn-buy' value='Comprar'>
                                    </form>
                                    </div>
                                </div>
                                </a> ";
                    }
                } else {
                    echo "<div class='message'>
                       <img src='./assets/warn-error.svg'><p>Nenhum produto encontrado.</p>
                  </div> <br>";
                }
                ?>
            </div>
        </div>
        <a href="./login/" target="_blank" class="btn-secundary"><button>Ver mais produtos</button></a>
           </div>
    </main>

    <main id="contact-us">
        <div class="contact-text">
            <h1 class="title">Fale Conosco</h1>
            <p class="content-text">Faça reclamações, sugira novas novidades para nossa empresa entrando em contato conosco!</p>
        </div>

        <div class="contact-content">
            <img src="./assets/contact.svg" alt="">

            <div class="contact-form">
            <?php
                if (isset($_POST['submit']))
                {

                    $name = $_POST['name'];
                    $tel = $_POST['telefone'];
                    $msg = $_POST['text'];

                    $result = mysqli_query($conexao, "INSERT INTO contactstbl(name, tel, msg) 
                        VALUES ('$name', '$tel', '$msg')"); 

                    echo "<div class='sucess'>
                    <img src='./assets/warn-sucess.svg'><p>Enviado com sucesso!</p>
                    </div> <br>";
                }

            ?>
                <form action="./#contact-us" method="post">
                    <label for="name" class="title-input">Nome</label>
                    <input type="text" name="name" id="name" placeholder="Nome" required>
    
                    <label for="telefone" class="title-input">Telefone</label>
                    <input type="tel" name="telefone" id="telefone" placeholder="(00)-00000-0000" required>
    
                    <label for="text" class="title-input">O que tem para nos dizer?</label>
                    <textarea type="text" name="text" id="text" placeholder="Insira sua mensagem aqui" required></textarea>
                    <label for="text" class="p-input">Essa mensagem será encaminhada a equipe LDD’H S.A.</label>
    
                    <input type="submit" name="submit" id="submit" value="Enviar" class="btn-primary">    
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

        <p class="content-text" id="endereco">Estr. das Lágrimas, 1478 - Ipiranga, São Paulo - SP, 04231-015</p>
        <p class="content-text" id="footer-text">LDD'H S.A. &copy; 2024 - Todos os direitos reservados</p>
        </div>

        

        <div class="social-list">
            <ul>
                <li class="social-item"><a href="http://" target="_blank"><button class="btn-social"><img src="./assets/Twitter.svg" alt=""></a></button></li>
                <li class="social-item"><a href="http://" target="_blank"><button class="btn-social"><img src="./assets/YouTube.svg" alt=""></a></button></li>
                <li class="social-item"><a href="http://" target="_blank"><button class="btn-social"><img src="./assets/Instagram.svg" alt=""></a></button></li>
                <li class="social-item"><a href="http://" target="_blank"><button class="btn-social"><img src="./assets/LinkedIn.svg" alt=""></a></button></li>
            </ul>
        </div>
    </footer>
    <script src="script.js"></script>
</body>
</html>