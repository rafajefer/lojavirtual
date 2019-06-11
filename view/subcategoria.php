
<div class="conteudo">

    <!-- Menu sidebar -->
    <?php require_once './view/template/menu-lateral.php';?>
    <?php
    $slug = addslashes($page[1]);

    // Busca subcategoria referente a url
    $sub = new Subcategoria();
    $subcategoria = $sub->find($slug);

    // Busca todos os produtos referete a subcategoria informada
    $prod = new Produto();
    $produtos = $prod->getProdutos($subcategoria->id);
    ?>
        <div class="lado-dir">
            <div class="base-home">
            <!-- com tres produtos-->
                <div class="cx-base-home categoria">
                    <h1><span><?php echo $subcategoria->nome; ?></span></h1>
                    <?php  foreach($produtos as $produto): ?>
                    <!-- Start .\ Produto -->
                    <div class="quatro-colunas-cat sub">
                        <div class="cx-img">
                            <a href="<?php echo $produto->slug; ?>"><img src="<?php echo $produto->thumbnail; ?>"></a>
                        </div>
                        <h2><a href="<?php echo URL_BASE."produto/".$produto->slug; ?>"><?php echo $produto->nome; ?></a></h2>
                        <div class="prc-ant"><small>De R$ 10460.94</small> <font>Por</font></div>
                        <h3> 9000.00</h3>

                        <div class="cx-botoes">
                            <form id="form1" name="frmcarrinho" method="post" action="<?php echo URL_BASE ?>/carrinho">
                                <input name="txt_preco" 	type="hidden" id="txt_preco" value = "9000.00" />
                                <input name="txt_qtde" 		type="hidden" id="txt_qtde" value = "1" />
                                <input type="hidden" 		name="id_produto" value = "1"/>
                                <input type="submit" 		name="imageField" class="bot-comprar" value="Comprar"  />
                            </form>
                            <a href="<?php echo URL_BASE ?>produto/<?php echo $produto->slug; ?>" class="bot-detalhe">Detalhes</a>
                            <div class="cx-frete"><b class="frete">FRETE</b><b class="val-frete">GRÁTIS</b></div>
                            <div class="bandeiras none"><font>Em até <b>10x</b> nos cartões</font><img src="<?php echo URL_BASE ?>/imagens/bandeiras2.png"></div>
                        </div>
                    </div>
                    <!-- End .\ Produto -->
                    <?php endforeach; ?>

                    </div>

                </div>



      <!--sidebar-->
      <?php require_once './view/template/sidebar.php';?>

    </div>
</div>