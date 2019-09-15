<html>
    <head>
        <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Foundation for Sites</title>
        <base href="<?= URL_BASE ?>"><!--Esta instrução é super importante e não deve ser mudada!-->

        <link rel="stylesheet" href="./publico/css/foundation.css">
         <link rel="stylesheet" href="./publico/css/app.css">
        <link rel="stylesheet" href="./publico/css/css1.css">
        <title></title>
    </head>
    <body>
        <div id="caixa1">
            <a href="index.html"><img id="logo1" src="./publico/imagem/logo1.jpg"></a>


            <div id="search" class="grid-x grid-padding-x">
                <div class="large-12 cell">
                    <img id="pesq"src="./publico/imagem/pesq.png">
                    <form action="produto/buscar" method="POST">
                        <input name="buscar" id="input1" type="text" placeholder="Search" />
                    </form>
                </div>
            </div>

            <a href="login.html"><img id="user"src="./publico/imagem/user.png"></a>
            <a href="carrinho2.html"><img id="car"src ="./publico/imagem/car.png"></a>
            <a href="admin.html"><img id="edit" src="./publico/imagem/edit.png"></a>
        </div>

        <div class="cor">
            <br>


            <div id="menu">
                <a href="./produto/listarProdutos">Produtos</a>
                <a href="./categoria/listarCategoriaS">Categoria</a>
                <a href="./cliente/listarClientes">Cliente</a>
                <a href="./FormaPagamento/listarFormaPagamento">Forma de Pagamento</a>
                <a href="./cupom/listarCupons">Cupom</a>
            </div>
        </div>

  
    <body class="container">




        <main class="container">
            <?php require $viewFilePath; ?>
        </main>

        <div id="rodape" class="grid-x">
            <div class="cell medium-6 large-10">
                <a href="index.html"><img id="logo1" src="./publico/imagem/logo1.jpg"></div></a>
                <div class="cell medium-6 large-2">		
                    <a href="https://www.facebook.com/"><img id="fb"src="./publico/imagem/fb.png"></a>
                    <a href="https://twitter.com/"><img id="tt"src="./publico/imagem/tt.png"></a>
                </div>	
            </div>

    </body>
</html>
