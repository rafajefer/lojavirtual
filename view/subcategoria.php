
<div class="conteudo">

    <!-- Menu sidebar -->
    <?php require_once './view/template/menu-lateral.php';?>
    <?php
        $slug = addslashes($page[1]);

        $sub = new Subcategoria();
        $subcategoria = $sub->find($slug);
        $prod = new Produto();
        //$prod->
        ?>
        <div class="lado-dir">
            <div class="base-home">
            <!-- com tres produtos-->
                <div class="cx-base-home categoria">
                    <h1><span><?php echo $subcategoria->nome; ?></span></h1>
                    <div class="quatro-colunas-cat sub">
                        <div class="cx-img">
                            <a href="<?php echo URL_BASE ?>/produto/&p=1"><img src="<?php echo URL_BASE ?>/produtos/smartphone_samsung.jpg"></a>
                        </div>
                        <h2><a href="<?php echo URL_BASE ?>/produto/&p=1">Smartphone Samsung Galaxy J5 Duos SM-J50...</a></h2>
                        <div class="prc-ant"><small>De R$ 10460.94</small> <font>Por</font></div>
                        <h3> 9000.00</h3>

                        <div class="cx-botoes">
                            <form id="form1" name="frmcarrinho" method="post" action="<?php echo URL_BASE ?>/carrinho">
                                <input name="txt_preco" 	type="hidden" id="txt_preco" value = "9000.00" />
                                <input name="txt_qtde" 		type="hidden" id="txt_qtde" value = "1" />
                                <input type="hidden" 		name="id_produto" value = "1"/>
                                <input type="submit" 		name="imageField" class="bot-comprar" value="Comprar"  />
                            </form>
                            <a href="<?php echo URL_BASE ?>/produto" class="bot-detalhe">Detalhes</a>
                            <div class="cx-frete"><b class="frete">FRETE</b><b class="val-frete">GRÁTIS</b></div>
                            <div class="bandeiras none"><font>Em até <b>10x</b> nos cartões</font><img src="<?php echo URL_BASE ?>/imagens/bandeiras2.png"></div>
                            </div>
                        </div>
                    </div>
                </div>



      <!--sidebar-->
      <?php require_once './view/template/sidebar.php';?>

    </div>
</div>