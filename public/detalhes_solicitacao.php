<?php
// Detalhes da solicitação

$protocolo = "000012";
$doador = "Maria Oliveira";
$tipoAcervo = "Item Único";
$status = "PENDENTE";
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

<meta charset="UTF-8">

<meta name="viewport"
      content="width=device-width, initial-scale=1.0">

<title>Detalhes da Solicitação</title>

<style>

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    /* FUNDO CINZA REMOVIDO */
    background-color: #ffffff;

    font-family: Arial, Helvetica, sans-serif;

    min-height: 100vh;

    display: flex;
    justify-content: center;
    align-items: center;
}

.pagina {
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

    display: flex;
    align-items: center;
}

.logo {
    position: absolute;

    left: 86px;

    width: 41px;
    height: 18px;

    border: 1px solid #bdbdbd;

    display: flex;
    align-items: center;
    justify-content: center;

    font-size: 7px;

    color: #555;
}

.titulo-header {
    position: absolute;

    left: 138px;

    font-size: 8px;
}

.curador {
    position: absolute;

    right: 86px;

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

.data {
    font-size: 6px;

    color: #aaa;

    margin-bottom: 17px;
}

.badge {
    position: absolute;

    right: 0;
    top: 24px;

    border: 1px solid #999;

    background-color: #fafafa;

    height: 17px;

    padding: 0 7px;

    font-size: 7px;

    display: flex;

    align-items: center;
}

.grid {
    display: grid;

    grid-template-columns: 260px 174px;

    gap: 16px;
}

h3 {
    font-size: 6px;

    color: #888;

    letter-spacing: 1px;

    margin-bottom: 7px;
}

.box {
    border: 1px solid #bbb;

    padding: 9px;

    margin-bottom: 14px;

    font-size: 7px;

    line-height: 11px;
}

.dados {
    height: 76px;
}

.item {
    height: 109px;
}

.item p {
    margin-bottom: 2px;
}

.fotos {
    display: grid;

    grid-template-columns: 1fr 1fr;

    gap: 7px;
}

.foto {
    height: 84px;

    border: 1px solid #ccc;

    background-color: #f5f5f9;

    display: flex;

    align-items: center;

    justify-content: center;

    color: #999;

    font-size: 6px;

    text-align: center;
}

.historico {
    margin-top: 2px;
}

.historico-box {
    height: 41px;

    border: 1px solid #bbb;

    padding: 7px;

    font-size: 6px;

    line-height: 13px;
}

.acoes {
    display: flex;

    justify-content: space-between;

    margin-top: 15px;
}

.acoes button {
    height: 19px;

    padding: 0 11px;

    border: 1px solid #999;

    background-color: #fff;

    font-size: 6px;

    font-weight: bold;

    cursor: pointer;
}

.acoes .aprovar {
    background-color: #000;

    color: #fff;

    border-color: #000;
}

footer {
    height: 27px;

    border-top: 1px solid #bdbdbd;

    position: relative;

    display: flex;

    align-items: center;

    font-size: 7px;

    color: #999;
}

footer span:first-child {
    position: absolute;

    left: 86px;
}

footer span:nth-child(2) {
    position: absolute;

    left: 300px;
}

.logo-footer {
    position: absolute;

    right: 86px;

    width: 41px;
    height: 15px;

    border: 1px solid #bdbdbd;

    display: flex;

    align-items: center;

    justify-content: center;

    font-size: 6px;

    color: #555;
}

</style>

</head>

<body>

<div class="pagina">

<header>

<div class="logo">
[ LOGO ]
</div>

<strong class="titulo-header">
Painel de Curador • Solicitação #<?php echo $protocolo; ?>
</strong>

<div class="curador">
Curador: Dr. Ana Santos　♧
</div>

</header>


<main>

<h1>
Detalhes da Doação #<?php echo $protocolo; ?>
</h1>

<p class="data">
Enviada em 15 de Março de 2025 às 14:32
</p>


<div class="badge">
STATUS <?php echo $status; ?>⌄
</div>


<div class="grid">


<section>

<h3>
DADOS DO DOADOR
</h3>

<div class="box dados">

<p>
<b>Nome:</b>
　<?php echo $doador; ?>
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

<div class="box item">

<b>TIPO DE ACERVO</b>

<p>
<b><?php echo $tipoAcervo; ?></b>
</p>

<p>
<b>HISTÓRICO E PROCEDÊNCIA:</b>
</p>

<p>
Fóssil encontrado em escavação na região de
Marília em 1998, sob sedimentos da Formação
Marília. Provável fragmento de carapaça de
invertebrado.
</p>

<p>
Deseja contribuir para o acervo paleontológico
do museu, cadastrando-se e enviando-o.
</p>

</div>

</section>


<section>

<h3>
FOTOS DO ITEM
</h3>

<div class="fotos">

<div class="foto">
▧<br>
Foto 01
</div>

<div class="foto">
▧<br>
Foto 02
</div>

<div class="foto">
▧<br>
Foto 03
</div>

<div class="foto">
▧<br>
Foto 04
</div>

<div class="foto">
▧<br>
Foto 05
</div>

</div>

</section>

</div>


<section class="historico">

<h3>
HISTÓRICO DA SOLICITAÇÃO
</h3>

<div class="historico-box">

•　Solicitação recebida
— 11/03/2025 às 14:32

<br>

•　Em análise pelo curador
— 12/03/2025 às 10:15

</div>

</section>


<div class="acoes">

<button>
VOLTAR
</button>

<button class="aprovar">
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

<span>
Museu de Paleontologia de Marília
</span>

<span>
Sistema de Gestão de Acervo
</span>

<div class="logo-footer">
[ LOGO ]
</div>

</footer>

</div>

</body>
</html>