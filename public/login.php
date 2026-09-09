<?php
// Tela de Login
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Painel de Login</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html,
        body {
            width: 100%;
            min-height: 100%;
            background-color: #ffffff;
            font-family: Arial, Helvetica, sans-serif;
        }

        body {
            min-height: 100vh;

            display: flex;
            justify-content: center;
            align-items: center;
        }

        .page {
            width: 928px;
            height: 659px;

            background-color: #ffffff;

            display: flex;
            flex-direction: column;
        }

        header {
            height: 37px;
            border-bottom: 1px solid #bdbdbd;
            position: relative;
            flex-shrink: 0;
        }

        .logo {
            position: absolute;
            left: 128px;
            top: 7px;

            width: 79px;
            height: 23px;

            border: 1px solid #bdbdbd;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 9px;
            color: #555555;
        }

        main {
            flex: 1;

            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-box {
            width: 330px;
        }

        .login-box h1 {
            text-align: center;

            font-size: 16px;

            margin-bottom: 11px;
        }

        .subtitle {
            text-align: center;

            font-size: 12px;
            color: #999999;

            margin-bottom: 22px;
        }

        .form-group {
            margin-bottom: 13px;
        }

        label {
            display: block;

            font-size: 12px;
            color: #888888;

            margin-bottom: 8px;
        }

        input {
            width: 330px;
            height: 27px;

            border: 1px solid #bdbdbd;

            padding: 0 9px;

            font-size: 11px;

            outline: none;
        }

        input::placeholder {
            color: #aaaaaa;
        }

        .forgot-password {
            text-align: right;

            margin-top: -4px;
            margin-bottom: 10px;
        }

        .forgot-password a {
            color: #999999;

            font-size: 10px;

            text-decoration: underline;
        }

        .enter-button {
            width: 103px;
            height: 25px;

            border: none;

            background-color: #000000;
            color: #ffffff;

            font-size: 11px;
            font-weight: bold;

            cursor: pointer;
        }

        footer {
            height: 34px;

            border-top: 1px solid #bdbdbd;

            position: relative;
            flex-shrink: 0;

            display: flex;
            align-items: center;

            font-size: 9px;
            color: #999999;
        }

        .footer-museum {
            position: absolute;
            left: 128px;
        }

        .footer-system {
            position: absolute;
            left: 449px;
        }

        .footer-logo {
            position: absolute;
            right: 128px;

            width: 49px;
            height: 17px;

            border: 1px solid #bdbdbd;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 7px;
            color: #555555;
        }

        @media (max-width: 950px) {
            .page {
                width: 100%;
                height: 100vh;
            }
        }
    </style>
</head>

<body>

    <div class="page">

        <header>

            <div class="logo">
                [ LOGO ]
            </div>

        </header>

        <main>

            <section class="login-box">

                <h1>
                    Acesso ao Sistema
                </h1>

                <p class="subtitle">
                    Entre com suas credenciais para acessar o sistema
                </p>

                <form action="painel-curador.php" method="POST">

                    <div class="form-group">

                        <label for="email">
                            E-mail
                        </label>

                        <input
                            type="email"
                            id="email"
                            name="email"
                            placeholder="Digite seu e-mail"
                            required
                        >

                    </div>

                    <div class="form-group">

                        <label for="password">
                            Senha
                        </label>

                        <input
                            type="password"
                            id="password"
                            name="password"
                            placeholder="Digite sua senha"
                            required
                        >

                    </div>

                    <div class="forgot-password">

                        <a href="#">
                            Esqueceu sua senha?
                        </a>

                    </div>

                    <button
                        type="submit"
                        class="enter-button"
                    >
                        ENTRAR
                    </button>

                </form>

            </section>

        </main>

        <footer>

            <span class="footer-museum">
                Museu de Paleontologia de Marília
            </span>

            <span class="footer-system">
                Sistema de Gestão de Acervo
            </span>

            <div class="footer-logo">
                [ LOGO ]
            </div>

        </footer>

    </div>

</body>

</html>