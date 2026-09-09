<?php

$protocol = "000012";
$donor = "Maria Oliveira";
$collectionType = "Item Único";
$status = "PENDENTE";

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        Detalhes da Solicitação
    </title>

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
            width: 621px;
            height: 512px;

            background-color: #ffffff;

            display: flex;
            flex-direction: column;
        }

        header {
            height: 45px;

            border-bottom: 1px solid #bdbdbd;

            position: relative;

            flex-shrink: 0;
        }

        .logo {
            position: absolute;

            left: 86px;
            top: 12px;

            width: 41px;
            height: 18px;

            border: 1px solid #bdbdbd;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 7px;

            color: #555555;
        }

        .header-title {
            position: absolute;

            left: 138px;
            top: 18px;

            font-size: 8px;
        }

        .curator {
            position: absolute;

            right: 86px;
            top: 18px;

            font-size: 7px;
        }

        main {
            width: 449px;

            margin: 0 auto;

            flex: 1;

            padding-top: 19px;

            position: relative;
        }

        h1 {
            font-size: 14px;

            margin-bottom: 4px;
        }

        .date {
            font-size: 6px;

            color: #aaaaaa;

            margin-bottom: 17px;
        }

        .status {
            position: absolute;

            right: 0;
            top: 24px;

            height: 17px;

            padding: 0 7px;

            border: 1px solid #999999;

            background-color: #ffffff;

            display: flex;
            align-items: center;

            font-size: 7px;
        }

        .grid {
            display: grid;

            grid-template-columns: 260px 174px;

            gap: 16px;
        }

        h3 {
            font-size: 6px;

            color: #888888;

            letter-spacing: 1px;

            margin-bottom: 7px;
        }

        .box {
            border: 1px solid #bbbbbb;

            padding: 9px;

            margin-bottom: 14px;

            font-size: 7px;

            line-height: 11px;
        }

        .donor-data {
            height: 76px;
        }

        .item-data {
            height: 109px;
        }

        .item-data p {
            margin-bottom: 2px;
        }

        .photos {
            display: grid;

            grid-template-columns: 1fr 1fr;

            gap: 7px;
        }

        .photo {
            height: 84px;

            border: 1px solid #cccccc;

            background-color: #f5f5f5;

            display: flex;

            align-items: center;
            justify-content: center;

            flex-direction: column;

            color: #999999;

            font-size: 6px;

            text-align: center;
        }

        .history {
            margin-top: 2px;
        }

        .history-box {
            height: 41px;

            border: 1px solid #bbbbbb;

            padding: 7px;

            font-size: 6px;

            line-height: 13px;
        }

        .actions {
            display: flex;

            justify-content: space-between;

            margin-top: 15px;
        }

        .actions button {
            height: 19px;

            padding: 0 11px;

            border: 1px solid #999999;

            background-color: #ffffff;

            font-size: 6px;

            font-weight: bold;

            cursor: pointer;
        }

        .actions .approve {
            background-color: #000000;

            color: #ffffff;

            border-color: #000000;
        }

        footer {
            height: 27px;

            border-top: 1px solid #bdbdbd;

            position: relative;

            flex-shrink: 0;

            display: flex;
            align-items: center;

            font-size: 7px;

            color: #999999;
        }

        .footer-museum {
            position: absolute;

            left: 86px;
        }

        .footer-system {
            position: absolute;

            left: 300px;
        }

        .footer-logo {
            position: absolute;

            right: 86px;

            width: 41px;
            height: 15px;

            border: 1px solid #bdbdbd;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 6px;

            color: #555555;
        }

        @media (max-width: 650px) {

            .page {
                width: 100%;
                height: 100vh;
            }

            main {
                width: 90%;
            }

            .grid {
                grid-template-columns: 1fr;
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
            Painel de Curador • Solicitação #<?php echo $protocol; ?>
        </strong>

        <div class="curator">
            Curador: Dr. Ana Santos
        </div>

    </header>


    <main>

        <h1>
            Detalhes da Doação #<?php echo $protocol; ?>
        </h1>

        <p class="date">
            Enviada em 15 de Março de 2025 às 14:32
        </p>


        <div class="status">
            STATUS <?php echo $status; ?>⌄
        </div>


        <div class="grid">

            <section>

                <h3>
                    DADOS DO DOADOR
                </h3>

                <div class="box donor-data">

                    <p>
                        <b>Nome:</b>
                        <?php echo $donor; ?>
                    </p>

                    <p>
                        <b>CPF:</b>
                        123.456.789-00
                    </p>

                    <p>
                        <b>Telefone:</b>
                        (14) 99676-5432
                    </p>

                    <p>
                        <b>E-mail:</b>
                        maria.oliveira@email.com
                    </p>

                    <p>
                        <b>Endereço:</b>
                        Rua das Flores, 123 - Centro - Marília/SP
                    </p>

                </div>


                <h3>
                    INFORMAÇÕES DO ITEM
                </h3>


                <div class="box item-data">

                    <p>
                        <b>TIPO DE ACERVO</b>
                    </p>

                    <p>
                        <b>
                            <?php echo $collectionType; ?>
                        </b>
                    </p>

                    <p>
                        <b>
                            HISTÓRICO E PROCEDÊNCIA:
                        </b>
                    </p>

                    <p>
                        Fóssil encontrado em escavação na região
                        de Marília em 1998, sob sedimentos da
                        Formação Marília.
                    </p>

                    <p>
                        Provável fragmento de carapaça de
                        invertebrado.
                    </p>

                </div>

            </section>


            <section>

                <h3>
                    FOTOS DO ITEM
                </h3>


                <div class="photos">

                    <div class="photo">
                        ▧
                        <br>
                        Foto 01
                    </div>

                    <div class="photo">
                        ▧
                        <br>
                        Foto 02
                    </div>

                    <div class="photo">
                        ▧
                        <br>
                        Foto 03
                    </div>

                    <div class="photo">
                        ▧
                        <br>
                        Foto 04
                    </div>

                    <div class="photo">
                        ▧
                        <br>
                        Foto 05
                    </div>

                </div>

            </section>

        </div>


        <section class="history">

            <h3>
                HISTÓRICO DA SOLICITAÇÃO
            </h3>

            <div class="history-box">

                • Solicitação recebida
                — 11/03/2025 às 14:32

                <br>

                • Em análise pelo curador
                — 12/03/2025 às 10:15

            </div>

        </section>


        <div class="actions">

            <button>
                VOLTAR
            </button>

            <button class="approve">
                APROVAR INCORPORAÇÃO
            </button>

            <button>
                NÃO INCORPORAR
            </button>

            <button>
                ENCAMINHAR
            </button>

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