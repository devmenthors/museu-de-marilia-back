<?php

$email = $_POST['email'] ?? 'curador@museu.com';

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Painel do Curador</title>

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
            top: 8px;

            width: 59px;
            height: 20px;

            border: 1px solid #bdbdbd;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 8px;
            color: #555555;
        }

        .header-title {
            position: absolute;

            left: 201px;
            top: 13px;

            font-size: 10px;
        }

        .curator {
            position: absolute;

            right: 128px;
            top: 13px;

            font-size: 9px;
        }

        .content {
            width: 670px;

            margin: 0 auto;

            flex: 1;

            padding-top: 31px;
        }

        .content h1 {
            font-size: 19px;

            margin-bottom: 5px;
        }

        .description {
            font-size: 10px;

            color: #999999;

            margin-bottom: 20px;
        }

        .cards {
            display: flex;

            gap: 10px;

            margin-bottom: 19px;
        }

        .card {
            width: 160px;
            height: 69px;

            border: 1px solid #c9c9c9;

            padding: 12px;
        }

        .card-title {
            display: block;

            font-size: 8px;

            color: #777777;

            letter-spacing: 0.6px;

            margin-bottom: 8px;
        }

        .card-number {
            font-size: 21px;

            font-weight: bold;
        }

        .filters {
            width: 670px;
            height: 46px;

            border: 1px solid #c9c9c9;

            padding: 10px;

            display: flex;

            gap: 10px;

            margin-bottom: 17px;
        }

        .search {
            width: 345px;
            height: 25px;

            border: 1px solid #c9c9c9;

            display: flex;
            align-items: center;

            padding-left: 7px;
        }

        .search-icon {
            color: #999999;

            font-size: 15px;

            margin-right: 5px;
        }

        .search input {
            width: 100%;
            height: 23px;

            border: none;
            outline: none;

            font-size: 9px;
        }

        select {
            width: 128px;
            height: 25px;

            border: 1px solid #c9c9c9;

            background-color: #ffffff;

            font-size: 9px;

            padding-left: 7px;
        }

        .period {
            width: 165px;
            height: 25px;

            border: 1px solid #c9c9c9;

            display: flex;
            align-items: center;
        }

        .period input {
            width: 100%;
            height: 23px;

            border: none;
            outline: none;

            padding-left: 7px;

            font-size: 9px;

            color: #999999;
        }

        table {
            width: 670px;

            border-collapse: collapse;

            font-size: 9px;
        }

        thead {
            height: 30px;

            background-color: #f1f1f5;
        }

        th {
            text-align: left;

            padding: 0 10px;

            font-size: 8px;
        }

        td {
            height: 36px;

            padding: 0 10px;

            border-bottom: 1px solid #d4d4d4;

            color: #777777;
        }

        .protocol {
            color: #111111;

            font-weight: bold;
        }

        .donor {
            color: #333333;
        }

        .status {
            display: inline-block;

            border: 1px solid #c5c5c5;

            padding: 3px 5px;

            font-size: 8px;

            color: #555555;

            background-color: #fafafa;
        }

        .details {
            color: #111111;

            font-size: 8px;

            font-weight: bold;

            text-decoration: underline;
        }

        .bottom {
            display: flex;

            justify-content: space-between;

            align-items: center;

            margin-top: 13px;
        }

        .result {
            font-size: 8px;

            color: #aaaaaa;
        }

        .pagination {
            display: flex;

            gap: 5px;
        }

        .pagination button {
            height: 20px;

            min-width: 20px;

            border: 1px solid #c9c9c9;

            background-color: #ffffff;

            font-size: 8px;

            cursor: pointer;
        }

        .pagination .wide {
            width: 61px;
        }

        .pagination .active {
            background-color: #111111;

            color: #ffffff;

            border-color: #111111;
        }

        footer {
            height: 30px;

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

            width: 59px;
            height: 18px;

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

            .content {
                width: 90%;
            }

            .filters,
            table {
                width: 100%;
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

        <strong class="header-title">
            Painel do Curador
        </strong>

        <div class="curator">
            Curador: Dr. Ana Santos
        </div>

    </header>


    <main class="content">

        <h1>
            Painel de Controle
        </h1>

        <p class="description">
            Monitore e gerencie novas propostas de doações de acervo paleontológico
        </p>


        <section class="cards">

            <div class="card">
                <span class="card-title">
                    TOTAL DE SOLICITAÇÕES
                </span>

                <strong class="card-number">
                    24
                </strong>
            </div>

            <div class="card">
                <span class="card-title">
                    PENDENTES
                </span>

                <strong class="card-number">
                    12
                </strong>
            </div>

            <div class="card">
                <span class="card-title">
                    INCORPORADAS
                </span>

                <strong class="card-number">
                    8
                </strong>
            </div>

            <div class="card">
                <span class="card-title">
                    NÃO INCORPORADAS
                </span>

                <strong class="card-number">
                    4
                </strong>
            </div>

        </section>


        <section class="filters">

            <div class="search">

                <span class="search-icon">
                    ⌕
                </span>

                <input
                    type="text"
                    placeholder="Buscar por protocolo ou doador"
                >

            </div>

            <select>

                <option>
                    Todos os status
                </option>

                <option>
                    Pendente
                </option>

                <option>
                    Em Análise
                </option>

                <option>
                    Aprovada
                </option>

                <option>
                    Não Incorporada
                </option>

            </select>

            <div class="period">

                <input
                    type="text"
                    value="Período: Últimos 30 dias"
                    readonly
                >

            </div>

        </section>


        <table>

            <thead>

                <tr>

                    <th>PROTOCOLO</th>
                    <th>DOADOR</th>
                    <th>DATA DE ENVIO</th>
                    <th>TIPO DE ACERVO</th>
                    <th>STATUS</th>
                    <th>AÇÕES</th>

                </tr>

            </thead>

            <tbody>

                <tr>

                    <td class="protocol">
                        #000012
                    </td>

                    <td class="donor">
                        Maria Oliveira
                    </td>

                    <td>
                        15/03/2025
                    </td>

                    <td>
                        Item Único
                    </td>

                    <td>
                        <span class="status">
                            Aguardando Doc.
                        </span>
                    </td>

                    <td>
                        <a
                            class="details"
                            href="detalhes-solicitacao.php"
                        >
                            VER DETALHES
                        </a>
                    </td>

                </tr>


                <tr>

                    <td class="protocol">
                        #000011
                    </td>

                    <td class="donor">
                        Carlos Eduardo Santos
                    </td>

                    <td>
                        14/03/2025
                    </td>

                    <td>
                        Coleção
                    </td>

                    <td>
                        <span class="status">
                            Em Análise
                        </span>
                    </td>

                    <td>
                        <a
                            class="details"
                            href="detalhes-solicitacao.php"
                        >
                            VER DETALHES
                        </a>
                    </td>

                </tr>


                <tr>

                    <td class="protocol">
                        #000010
                    </td>

                    <td class="donor">
                        Roberto de Souza
                    </td>

                    <td>
                        10/03/2025
                    </td>

                    <td>
                        Item Único
                    </td>

                    <td>
                        <span class="status">
                            Aprovada
                        </span>
                    </td>

                    <td>
                        <a
                            class="details"
                            href="detalhes-solicitacao.php"
                        >
                            VER DETALHES
                        </a>
                    </td>

                </tr>


                <tr>

                    <td class="protocol">
                        #000009
                    </td>

                    <td class="donor">
                        Juliana Andrade
                    </td>

                    <td>
                        08/03/2025
                    </td>

                    <td>
                        Coleção
                    </td>

                    <td>
                        <span class="status">
                            Não Incorporada
                        </span>
                    </td>

                    <td>
                        <a
                            class="details"
                            href="detalhes-solicitacao.php"
                        >
                            VER DETALHES
                        </a>
                    </td>

                </tr>


                <tr>

                    <td class="protocol">
                        #000008
                    </td>

                    <td class="donor">
                        Fernando Costa Prado
                    </td>

                    <td>
                        05/03/2025
                    </td>

                    <td>
                        Item Único
                    </td>

                    <td>
                        <span class="status">
                            Encaminhada
                        </span>
                    </td>

                    <td>
                        <a
                            class="details"
                            href="detalhes-solicitacao.php"
                        >
                            VER DETALHES
                        </a>
                    </td>

                </tr>

            </tbody>

        </table>


        <div class="bottom">

            <span class="result">
                Exibindo 5 de 12 solicitações pendentes
            </span>

            <div class="pagination">

                <button class="wide">
                    ← Anterior
                </button>

                <button class="active">
                    1
                </button>

                <button>
                    2
                </button>

                <button>
                    3
                </button>

                <button class="wide">
                    Próximo →
                </button>

            </div>

        </div>

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