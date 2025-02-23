        <!DOCTYPE html>
        <html lang="pt-br">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="../css/style.css">
            <script src="https://kit.fontawesome.com/67492479d6.js" crossorigin="anonymous"></script>
            <title>Login</title>
        </head>

        <body class="login-background">
            <header>
            <?php
                if (isset($_GET['erro'])) {
                    echo '<p class = "erro">' . $_GET["erro"] . '<p>';
                } 

            ?>
            </header>

            <main>
                <div class="login-container">
                    <form class="login-form" action="../../back-end/verificacaoLogin.php" method="get">
                        <h1 class="login-h1">Login</h1>

                        <div class="login-email">
                            <label class="login-label" for="email">Email</label>
                            <input class="login-input" type="email" name="email" id="email" pattern=".+@(gmail\.com|outlook\.com|hotmail\.com|live\.com|msn\.com)" size="25" required oninvalid="alert('Email invalido, digite um email valido')">
                            <div class="login-icon">
                                <i class="fa-solid fa-envelope"></i>
                            </div>

                        </div>

                        <div class="login-password">
                            <label class="login-label" for="password">Senha</label>
                            <input class="login-input" type="password" name="password" id="password" size="25" required oninvalid="alert('Senha invalida, digite uma senha válida')">
                            <div class="login-icon">
                                <i class="fa-solid fa-lock"></i>
                            </div>

                        </div>


                        <div class="login-submit">
                            <button class="btn-submit" type="submit">Enviar</button>
                        </div>

                        <div class="login-links">
                            <a href="">Sou visitante</a>
                            <a href="">Alterar senha</a>
                        </div>

                    </form>
                </div>

                <?php



                ?>
            </main>

            <footer>

            </footer>
        </body>