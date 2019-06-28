<div class="sidebar cx-base-home">
   <a href="#"><img src="<?php echo URL_BASE ?>assets/imagens/img-publicidade.png"></a>
   <div class="ultimo-lanc">
      <h2>ÚLTIMOS LANÇAMENTOS</h2>
      <?php 
         $prod = new Produto(); 
         $produtos = $prod->getProdutosLimit(3, 'id DESC');
         foreach($produtos as $produto):
      ?>
      <div class="caixa">
         <a href="<?php echo URL_BASE."produto/".$produto->slug; ?>" title="Ir para página detalhes do produto">
            <img src="<?php echo URL_BASE.$produto->thumbnail; ?>" alt="<?php echo $produto->nome;?>" title="<?php  echo $produto->nome;?>">
         </a>
         <div class="del">
            <h4 class="text-center"><a href="<?php echo URL_BASE."produto/".$produto->slug; ?>" title="Ir para página detalhes do produto"><?php echo mb_strimwidth($produto->nome, 0, 40, "..."); ?></a></h4>
            <div class="prc-ant">De <small> R$ <?php echo number_format($produto->preco_alto, 2, ',', '.');?></small><font> Por</font></div>
            <span>R$ <?php echo number_format($produto->preco, 2, ',','.'); ?></span>
            <form id="form1" name="frmcarrinho" method="post" action="<?php echo URL_BASE ?>carrinho">
               <input name="txt_preco" type="hidden" id="txt_preco" value="<?php echo $produto->preco;?>">
               <input name="txt_qtde" type="hidden" id="txt_qtde" value="1">
               <input type="hidden" name="id_produto" value="<?php echo $produto->id;?>">
               <input type="submit" name="imageField" class="comprar" value="Comprar">
            </form>
         </div>
      </div>
      <?php endforeach; ?>
   </div>

   <a href="#"><img src="<?php echo URL_BASE ?>assets/imagens/img-publicidade.png"></a>
   <a href="#"><img src="<?php echo URL_BASE ?>assets/imagens/img-publicidade.png"></a>
   <a href="#"><img src="<?php echo URL_BASE ?>assets/imagens/img-publicidade.png"></a>
</div>