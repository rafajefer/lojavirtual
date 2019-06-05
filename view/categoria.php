<?php
print_r($page);

$categoria = addslashes($page[1]);

$cat = new Categoria();
$categoria = $cat->find($categoria);


$sub = new Subcategoria();
$subcategorias = $sub->findSubcategoria($categoria->id);
?>
<div class="conteudo">
   <?php require_once './view/template/menu-lateral.php'; ?>
   <div class="lado-dir">
      <div class="base-home">
         <!-- com tres produtos-->	

         <div class="cx-base-home categoria">
            <?php
            foreach ($subcategorias as $subcategoria):
               ?>
               <h1><span><?php echo $subcategoria->nome; ?></span></h1>
               <?php 
               $prod = new Produto();
               foreach($prod->getProdutos($subcategoria->id) as $produto):
               ?>
               <div class="quatro-colunas-cat">
                  <div class="cx-img">	
                     <a href="<?php echo URL_BASE."produto/".$produto->id;?>"><img src="<?php echo $produto->thumbnail; ?>"></a>
                  </div>						
                  <h2><a href="<?php echo URL_BASE."produto/".$produto->id;?>"><?php echo mb_strimwidth($produto->nome, 0, 50, "..."); ?></a></h2>
                  <div class="prc-ant"><small>De R$ <?php echo $produto->preco_alto; ?></small> <font>Por</font></div>
                  <h3> <?php echo $produto->preco; ?></h3>

                  <div class="cx-botoes">
                     <form id="form1" name="frmcarrinho" method="post" action="<?php echo URL_BASE ?>carrinho">
                        <input name="txt_preco" 	type="hidden" id="txt_preco" value = "9000.00" />
                        <input name="txt_qtde" 		type="hidden" id="txt_qtde" value = "1" />
                        <input type="hidden" 		name="id_produto" value = "<?php echo $produto->id; ?>"/>
                        <input type="submit" 		name="imageField" class="bot-comprar" value="Comprar"  />
                     </form>

                     <a href="<?php echo URL_BASE."produto/".$produto->id;?>" class="bot-detalhe">Detalhes</a>
                     <div class="cx-frete"><b class="frete">FRETE</b><b class="val-frete">GRÁTIS</b></div>
                     <div class="bandeiras none"><font>Em até <b>10x</b> nos cartões</font><img src="<?php echo URL_BASE ?>imagens/bandeiras2.png"></div>			
                  </div>
               </div>
               <?php endforeach; ?>
               <div class="limpar"></div>	
               <?php
            endforeach;
            ?>
            


         </div>


      </div>		


      <!--sidebar-->
   <?php require_once './view/template/sidebar.php'; ?>
   </div>	
</div>