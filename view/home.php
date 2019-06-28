<?php 
// Carousel principal
$carousel = new Carousel('principal', 1); 
$itens = $carousel->getItens();
?>
<!--banner topo-->
<div class="cx-banner-topo">
   <div class="conteudo">
      <section class="slide">
         <div class="slide_nav">
            <div class="slide_nav_item b"></div>
            <div class="slide_nav_item g"></div>
         </div>
         <?php $first = 1; ?>
         <?php foreach($itens as $item): ?>
         <article class="slide_item <?=$first==1 ? 'first' : ''; ?>">
            <div class="base-bn">
               <a href="<?php echo URL_BASE.$item->getUrl();?>"><img src="<?php echo URL_BASE.$item->getImagem();?>" alt="banner 01" title="<?php echo $item->getTitulo();?>"></a>
            </div>    
         </article>
         <?php $first = 0;?>
         <?php endforeach; ?>


      </section>

   </div>
</div>

<!-- Start .\ produtos em detasque -->
<div class="conteudo">	
   <div class="base-maisvendido">
      <h1><span>Destaques</span></h1>
      <?php $prod = new Produto(); ?>
      <?php foreach ($prod->getDestaque() as $destaque): ?>
         <div class="cx-maisvendido">
            <div class="prod"><a href="<?php echo URL_BASE ?>produto/&p=2" title="<?php echo $destaque->nome;?>"><img src="<?php echo $destaque->thumbnail; ?>"></a></div>
            <div class="del">
               <h2><a href="<?php echo URL_BASE ?>produto/&p=2" title="<?php echo $destaque->nome;?>"><?php echo mb_strimwidth($destaque->nome, 0, 40, "..."); ?></a></h2>
               <div class="prc-ant">De <small> R$ <?php echo number_format($destaque->preco_alto,2,",","."); ?></small><font> Por</font></div>
               <span>R$ <?php echo number_format($destaque->preco,2,",","."); ?></span>
               <form id="form1" name="frmcarrinho" method="post" action="<?php echo URL_BASE ?>carrinho">
                  <input name="txt_preco" 	type="hidden" id="txt_preco" value = "<?php echo $destaque->preco; ?>" />
                  <input name="txt_qtde" 		type="hidden" id="txt_qtde" value = "1" />
                  <input type="hidden" 		name="id_produto" value = "<?php echo $destaque->id; ?>"/>
                  <input type="submit" 		name="imageField" class="comprar" value="Comprar"  />
               </form>
               <div class="cx-frete"><b class="frete">FRETE</b><b class="val-frete">GRÁTIS</b></div>

            </div>
         </div>
      <?php endforeach; ?>
   </div>
</div>
<!-- End .\ produto destaque -->

<div class="conteudo">
   <?php include"./view/template/menu-lateral.php" ?>	
   <div class="lado-dir">
      <div class="base-home">		


         <!-- com quatro produtos-->	

         <div class="cx-base-home">
            <h1><span>Hardware</span></h1>
            <div class="caixa-prod-home quatro-colunas">
               <div class="cx-img">
                  <a href="<?php echo URL_BASE ?>produto/&p=4"><img src="assets/imagens/produtos/core_I7.jpg"></a>
               </div>		
               <h2><a href="<?php echo URL_BASE ?>produto/&p=4">Processador Intel Core i7-4790K  Haswell...</a></h2>
               <div class="prc-ant">De <small>20235.18</small> Por</div>
               <h3>9000.00</h3>

               <div class="cx-botoes">
                  <form id="form1" name="frmcarrinho" method="post" action="<?php echo URL_BASE ?>carrinho">
                     <input name="txt_preco" 	type="hidden" id="txt_preco" value = "9000.00" />
                     <input name="txt_qtde" 		type="hidden" id="txt_qtde" value = "1" />
                     <input type="hidden" 		name="id_produto" value = "4"/>
                     <input type="submit" 		name="imageField" class="bot-comprar" value="Comprar"  />
                  </form>
                  <div class="cx-frete"><b class="frete">FRETE</b><b class="val-frete">GRÁTIS</b></div>
                  <div class="bandeiras none" ><font><b>10x</b> nos cartões</font><img src="assets/imagens/bandeiras2.png"></div>
               </div>
            </div>		

            <div class="caixa-prod-home quatro-colunas">
               <div class="cx-img">
                  <a href="<?php echo URL_BASE ?>produto/&p=6"><img src="assets/imagens/produtos/seagate_HD.jpg"></a>
               </div>		
               <h2><a href="<?php echo URL_BASE ?>produto/&p=6">HD Seagate SATA 3,5´ Desktop HDD 1TB 72...</a></h2>
               <div class="prc-ant">De <small>10446.94</small> Por</div>
               <h3>9080.00</h3>

               <div class="cx-botoes">
                  <form id="form1" name="frmcarrinho" method="post" action="<?php echo URL_BASE ?>carrinho">
                     <input name="txt_preco" 	type="hidden" id="txt_preco" value = "9080.00" />
                     <input name="txt_qtde" 		type="hidden" id="txt_qtde" value = "1" />
                     <input type="hidden" 		name="id_produto" value = "6"/>
                     <input type="submit" 		name="imageField" class="bot-comprar" value="Comprar"  />
                  </form>
                  <div class="cx-frete"><b class="frete">FRETE</b><b class="val-frete">GRÁTIS</b></div>
                  <div class="bandeiras none" ><font><b>10x</b> nos cartões</font><img src="assets/imagens/bandeiras2.png"></div>
               </div>
            </div>		

            <div class="caixa-prod-home quatro-colunas">
               <div class="cx-img">
                  <a href="<?php echo URL_BASE ?>produto/&p=7"><img src="assets/imagens/produtos/VGA_Gigabyte.jpg"></a>
               </div>		
               <h2><a href="<?php echo URL_BASE ?>produto/&p=7">Placa de Vídeo VGA GigaByte GTX750TI 1g...</a></h2>
               <div class="prc-ant">De <small>11046.94</small> Por</div>
               <h3>9100.00</h3>

               <div class="cx-botoes">
                  <form id="form1" name="frmcarrinho" method="post" action="<?php echo URL_BASE ?>carrinho">
                     <input name="txt_preco" 	type="hidden" id="txt_preco" value = "9100.00" />
                     <input name="txt_qtde" 		type="hidden" id="txt_qtde" value = "1" />
                     <input type="hidden" 		name="id_produto" value = "7"/>
                     <input type="submit" 		name="imageField" class="bot-comprar" value="Comprar"  />
                  </form>
                  <div class="cx-frete"><b class="frete">FRETE</b><b class="val-frete">GRÁTIS</b></div>
                  <div class="bandeiras none" ><font><b>10x</b> nos cartões</font><img src="assets/imagens/bandeiras2.png"></div>
               </div>
            </div>		

            <div class="caixa-prod-home quatro-colunas">
               <div class="cx-img">
                  <a href="<?php echo URL_BASE ?>produto/&p=8"><img src="assets/imagens/produtos/MB_Asus.jpg"></a>
               </div>		
               <h2><a href="<?php echo URL_BASE ?>produto/&p=8">Placa-Mãe ASUS p/ Intel LGA 1155 mATX H...</a></h2>
               <div class="prc-ant">De <small>10446.94</small> Por</div>
               <h3>9070.00</h3>

               <div class="cx-botoes">
                  <form id="form1" name="frmcarrinho" method="post" action="<?php echo URL_BASE ?>carrinho">
                     <input name="txt_preco" 	type="hidden" id="txt_preco" value = "9070.00" />
                     <input name="txt_qtde" 		type="hidden" id="txt_qtde" value = "1" />
                     <input type="hidden" 		name="id_produto" value = "8"/>
                     <input type="submit" 		name="imageField" class="bot-comprar" value="Comprar"  />
                  </form>
                  <div class="cx-frete"><b class="frete">FRETE</b><b class="val-frete">GRÁTIS</b></div>
                  <div class="bandeiras none" ><font><b>10x</b> nos cartões</font><img src="assets/imagens/bandeiras2.png"></div>
               </div>
            </div>		



         </div>

         <div class="cx-base-home">
            <h1><span>Gamer</span></h1>
            <div class="caixa-prod-home quatro-colunas">
               <div class="cx-img">
                  <a href="<?php echo URL_BASE ?>produto/&p=10"><img src="assets/imagens/produtos/joystick.jpg"></a>
               </div>		
               <h2><a href="<?php echo URL_BASE ?>produto/&p=10">Controle Dazz Dualshock Bluetooth PS3 Pr...</a></h2>
               <div class="prc-ant">De <small>5046.94</small> Por</div>
               <h3>5000.00</h3>

               <div class="cx-botoes">
                  <form id="form1" name="frmcarrinho" method="post" action="<?php echo URL_BASE ?>carrinho">
                     <input name="txt_preco" 	type="hidden" id="txt_preco" value = "5000.00" />
                     <input name="txt_qtde" 		type="hidden" id="txt_qtde" value = "1" />
                     <input type="hidden" 		name="id_produto" value = "10"/>
                     <input type="submit" 		name="imageField" class="bot-comprar" value="Comprar"  />
                  </form>
                  <div class="cx-frete"><b class="frete">FRETE</b><b class="val-frete">GRÁTIS</b></div>
                  <div class="bandeiras none" ><font><b>10x</b> nos cartões</font><img src="assets/imagens/bandeiras2.png"></div>
               </div>
            </div>		

            <div class="caixa-prod-home quatro-colunas">
               <div class="cx-img">
                  <a href="<?php echo URL_BASE ?>produto/&p=11"><img src="assets/imagens/produtos/pes2016.jpg"></a>
               </div>		
               <h2><a href="<?php echo URL_BASE ?>produto/&p=11">Game Pro Evolution Soccer - PES 2016 Xbo...</a></h2>
               <div class="prc-ant">De <small>10246.94</small> Por</div>
               <h3>9020.00</h3>

               <div class="cx-botoes">
                  <form id="form1" name="frmcarrinho" method="post" action="<?php echo URL_BASE ?>carrinho">
                     <input name="txt_preco" 	type="hidden" id="txt_preco" value = "9020.00" />
                     <input name="txt_qtde" 		type="hidden" id="txt_qtde" value = "1" />
                     <input type="hidden" 		name="id_produto" value = "11"/>
                     <input type="submit" 		name="imageField" class="bot-comprar" value="Comprar"  />
                  </form>
                  <div class="cx-frete"><b class="frete">FRETE</b><b class="val-frete">GRÁTIS</b></div>
                  <div class="bandeiras none" ><font><b>10x</b> nos cartões</font><img src="assets/imagens/bandeiras2.png"></div>
               </div>
            </div>		

            <div class="caixa-prod-home quatro-colunas">
               <div class="cx-img">
                  <a href="<?php echo URL_BASE ?>produto/&p=12"><img src="assets/imagens/produtos/cadeira_dt3.jpg"></a>
               </div>		
               <h2><a href="<?php echo URL_BASE ?>produto/&p=12">Cadeira Gamer DT3 Sports GTS Red</a></h2>
               <div class="prc-ant">De <small>10426.94</small> Por</div>
               <h3>9200.00</h3>

               <div class="cx-botoes">
                  <form id="form1" name="frmcarrinho" method="post" action="<?php echo URL_BASE ?>carrinho">
                     <input name="txt_preco" 	type="hidden" id="txt_preco" value = "9200.00" />
                     <input name="txt_qtde" 		type="hidden" id="txt_qtde" value = "1" />
                     <input type="hidden" 		name="id_produto" value = "12"/>
                     <input type="submit" 		name="imageField" class="bot-comprar" value="Comprar"  />
                  </form>
                  <div class="cx-frete"><b class="frete">FRETE</b><b class="val-frete">GRÁTIS</b></div>
                  <div class="bandeiras none" ><font><b>10x</b> nos cartões</font><img src="assets/imagens/imagens/bandeiras2.png"></div>
               </div>
            </div>		

            <div class="caixa-prod-home quatro-colunas">
               <div class="cx-img">
                  <a href="<?php echo URL_BASE ?>produto/&p=13"><img src="assets/imagens/produtos/joystick2.jpg"></a>
               </div>		
               <h2><a href="<?php echo URL_BASE ?>produto/&p=13">Logitech Joystick USB Extreme 3D Pro Twi...</a></h2>
               <div class="prc-ant">De <small>11046.94</small> Por</div>
               <h3>9100.00</h3>

               <div class="cx-botoes">
                  <form id="form1" name="frmcarrinho" method="post" action="<?php echo URL_BASE ?>carrinho">
                     <input name="txt_preco" 	type="hidden" id="txt_preco" value = "9100.00" />
                     <input name="txt_qtde" 		type="hidden" id="txt_qtde" value = "1" />
                     <input type="hidden" 		name="id_produto" value = "13"/>
                     <input type="submit" 		name="imageField" class="bot-comprar" value="Comprar"  />
                  </form>
                  <div class="cx-frete"><b class="frete">FRETE</b><b class="val-frete">GRÁTIS</b></div>
                  <div class="bandeiras none" ><font><b>10x</b> nos cartões</font><img src="assets/imagens/bandeiras2.png"></div>
               </div>
            </div>		



         </div>

         <div class="cx-base-home">
            <h1><span>Computadores</span></h1>
            <div class="caixa-prod-home quatro-colunas">
               <div class="cx-img">
                  <a href="<?php echo URL_BASE ?>produto/&p=14"><img src="assets/imagens/produtos/lenovo.jpg"></a>
               </div>		
               <h2><a href="<?php echo URL_BASE ?>produto/&p=14">Computador Lenovo 63 TW com Intel Core I...</a></h2>
               <div class="prc-ant">De <small>10146.94</small> Por</div>
               <h3>9010.00</h3>

               <div class="cx-botoes">
                  <form id="form1" name="frmcarrinho" method="post" action="<?php echo URL_BASE ?>carrinho">
                     <input name="txt_preco" 	type="hidden" id="txt_preco" value = "9010.00" />
                     <input name="txt_qtde" 		type="hidden" id="txt_qtde" value = "1" />
                     <input type="hidden" 		name="id_produto" value = "14"/>
                     <input type="submit" 		name="imageField" class="bot-comprar" value="Comprar"  />
                  </form>
                  <div class="cx-frete"><b class="frete">FRETE</b><b class="val-frete">GRÁTIS</b></div>
                  <div class="bandeiras none" ><font><b>10x</b> nos cartões</font><img src="assets/imagens/imagens/bandeiras2.png"></div>
               </div>
            </div>		

            <div class="caixa-prod-home quatro-colunas">
               <div class="cx-img">
                  <a href="<?php echo URL_BASE ?>produto/&p=15"><img src="assets/imagens/produtos/epson_printer.jpg"></a>
               </div>		
               <h2><a href="<?php echo URL_BASE ?>produto/&p=15">Impressora Multifuncional Epson EcoTank...</a></h2>
               <div class="prc-ant">De <small>10346.94</small> Por</div>
               <h3>3900.00</h3>

               <div class="cx-botoes">
                  <form id="form1" name="frmcarrinho" method="post" action="<?php echo URL_BASE ?>carrinho">
                     <input name="txt_preco" 	type="hidden" id="txt_preco" value = "3900.00" />
                     <input name="txt_qtde" 		type="hidden" id="txt_qtde" value = "1" />
                     <input type="hidden" 		name="id_produto" value = "15"/>
                     <input type="submit" 		name="imageField" class="bot-comprar" value="Comprar"  />
                  </form>
                  <div class="cx-frete"><b class="frete">FRETE</b><b class="val-frete">GRÁTIS</b></div>
                  <div class="bandeiras none" ><font><b>10x</b> nos cartões</font><img src="assets/imagens/bandeiras2.png"></div>
               </div>
            </div>		

            <div class="caixa-prod-home quatro-colunas">
               <div class="cx-img">
                  <a href="<?php echo URL_BASE ?>produto/&p=16"><img src="assets/imagens/produtos/note_lenovo.jpg"></a>
               </div>		
               <h2><a href="<?php echo URL_BASE ?>produto/&p=16">Notebook Lenovo B40-70 com Intel Core i3...</a></h2>
               <div class="prc-ant">De <small>14046.94</small> Por</div>
               <h3>4900.00</h3>

               <div class="cx-botoes">
                  <form id="form1" name="frmcarrinho" method="post" action="<?php echo URL_BASE ?>carrinho">
                     <input name="txt_preco" 	type="hidden" id="txt_preco" value = "4900.00" />
                     <input name="txt_qtde" 		type="hidden" id="txt_qtde" value = "1" />
                     <input type="hidden" 		name="id_produto" value = "16"/>
                     <input type="submit" 		name="imageField" class="bot-comprar" value="Comprar"  />
                  </form>
                  <div class="cx-frete"><b class="frete">FRETE</b><b class="val-frete">GRÁTIS</b></div>
                  <div class="bandeiras none" ><font><b>10x</b> nos cartões</font><img src="assets/imagens/bandeiras2.png"></div>
               </div>
            </div>		

            <div class="caixa-prod-home quatro-colunas">
               <div class="cx-img">
                  <a href="<?php echo URL_BASE ?>produto/&p=17"><img src="assets/imagens/produtos/scanner.jpg"></a>
               </div>		
               <h2><a href="<?php echo URL_BASE ?>produto/&p=17">Scanner Portátil Epson WorkForce DS-30</a></h2>
               <div class="prc-ant">De <small>12046.94</small> Por</div>
               <h3>9200.00</h3>

               <div class="cx-botoes">
                  <form id="form1" name="frmcarrinho" method="post" action="<?php echo URL_BASE ?>carrinho">
                     <input name="txt_preco" 	type="hidden" id="txt_preco" value = "9200.00" />
                     <input name="txt_qtde" 		type="hidden" id="txt_qtde" value = "1" />
                     <input type="hidden" 		name="id_produto" value = "17"/>
                     <input type="submit" 		name="imageField" class="bot-comprar" value="Comprar"  />
                  </form>
                  <div class="cx-frete"><b class="frete">FRETE</b><b class="val-frete">GRÁTIS</b></div>
                  <div class="bandeiras none" ><font><b>10x</b> nos cartões</font><img src="assets/imagens/bandeiras2.png"></div>
               </div>
            </div>		



         </div>

         <div class="cx-base-home">
            <h1><span>Tablet</span></h1>
            <div class="caixa-prod-home quatro-colunas">
               <div class="cx-img">
                  <a href="<?php echo URL_BASE ?>produto/&p=22"><img src="assets/imagens/produtos/tablet_samsung.jpg"></a>
               </div>		
               <h2><a href="<?php echo URL_BASE ?>produto/&p=22">Tablet Samsung Galaxy Tab E 7´ WI-FI SM...</a></h2>
               <div class="prc-ant">De <small>11046.94</small> Por</div>
               <h3>9100.00</h3>

               <div class="cx-botoes">
                  <form id="form1" name="frmcarrinho" method="post" action="<?php echo URL_BASE ?>carrinho">
                     <input name="txt_preco" 	type="hidden" id="txt_preco" value = "9100.00" />
                     <input name="txt_qtde" 		type="hidden" id="txt_qtde" value = "1" />
                     <input type="hidden" 		name="id_produto" value = "22"/>
                     <input type="submit" 		name="imageField" class="bot-comprar" value="Comprar"  />
                  </form>
                  <div class="cx-frete"><b class="frete">FRETE</b><b class="val-frete">GRÁTIS</b></div>
                  <div class="bandeiras none" ><font><b>10x</b> nos cartões</font><img src="assets/imagens/bandeiras2.png"></div>
               </div>
            </div>		

            <div class="caixa-prod-home quatro-colunas">
               <div class="cx-img">
                  <a href="<?php echo URL_BASE ?>produto/&p=23"><img src="assets/imagens/produtos/kindle.jpg"></a>
               </div>		
               <h2><a href="<?php echo URL_BASE ?>produto/&p=23">E-Reader Kindle Paperwhite, Wi-Fi, 4 GB<...</a></h2>
               <div class="prc-ant">De <small>10146.94</small> Por</div>
               <h3>9100.00</h3>

               <div class="cx-botoes">
                  <form id="form1" name="frmcarrinho" method="post" action="<?php echo URL_BASE ?>carrinho">
                     <input name="txt_preco" 	type="hidden" id="txt_preco" value = "9100.00" />
                     <input name="txt_qtde" 		type="hidden" id="txt_qtde" value = "1" />
                     <input type="hidden" 		name="id_produto" value = "23"/>
                     <input type="submit" 		name="imageField" class="bot-comprar" value="Comprar"  />
                  </form>
                  <div class="cx-frete"><b class="frete">FRETE</b><b class="val-frete">GRÁTIS</b></div>
                  <div class="bandeiras none" ><font><b>10x</b> nos cartões</font><img src="assets/imagens/bandeiras2.png"></div>
               </div>
            </div>		

            <div class="caixa-prod-home quatro-colunas">
               <div class="cx-img">
                  <a href="<?php echo URL_BASE ?>produto/&p=24"><img src="assets/imagens/produtos/tablet_positivo.jpg"></a>
               </div>		
               <h2><a href="<?php echo URL_BASE ?>produto/&p=24">Tablet Positivo Mini com Android 4.2 8GB...</a></h2>
               <div class="prc-ant">De <small>10146.94</small> Por</div>
               <h3>9010.00</h3>

               <div class="cx-botoes">
                  <form id="form1" name="frmcarrinho" method="post" action="<?php echo URL_BASE ?>carrinho">
                     <input name="txt_preco" 	type="hidden" id="txt_preco" value = "9010.00" />
                     <input name="txt_qtde" 		type="hidden" id="txt_qtde" value = "1" />
                     <input type="hidden" 		name="id_produto" value = "24"/>
                     <input type="submit" 		name="imageField" class="bot-comprar" value="Comprar"  />
                  </form>
                  <div class="cx-frete"><b class="frete">FRETE</b><b class="val-frete">GRÁTIS</b></div>
                  <div class="bandeiras none" ><font><b>10x</b> nos cartões</font><img src="assets/imagens/bandeiras2.png"></div>
               </div>
            </div>		

            <div class="caixa-prod-home quatro-colunas">
               <div class="cx-img">
                  <a href="<?php echo URL_BASE ?>produto/&p=25"><img src="assets/imagens/produtos/tablet_asus.jpg"></a>
               </div>		
               <h2><a href="<?php echo URL_BASE ?>produto/&p=25">Tablet Asus Fonepad 7 8GB Wi Fi 3G Tela...</a></h2>
               <div class="prc-ant">De <small>5046.94</small> Por</div>
               <h3>9500.00</h3>

               <div class="cx-botoes">
                  <form id="form1" name="frmcarrinho" method="post" action="<?php echo URL_BASE ?>carrinho">
                     <input name="txt_preco" 	type="hidden" id="txt_preco" value = "9500.00" />
                     <input name="txt_qtde" 		type="hidden" id="txt_qtde" value = "1" />
                     <input type="hidden" 		name="id_produto" value = "25"/>
                     <input type="submit" 		name="imageField" class="bot-comprar" value="Comprar"  />
                  </form>
                  <div class="cx-frete"><b class="frete">FRETE</b><b class="val-frete">GRÁTIS</b></div>
                  <div class="bandeiras none" ><font><b>10x</b> nos cartões</font><img src="assets/imagens/bandeiras2.png"></div>
               </div>
            </div>		



         </div>

         <div class="cx-base-home">
            <h1><span>Periféricos</span></h1>
            <div class="caixa-prod-home quatro-colunas">
               <div class="cx-img">
                  <a href="<?php echo URL_BASE ?>produto/&p=26"><img src="assets/imagens/produtos/pendrive_multilaser.jpg"></a>
               </div>		
               <h2><a href="<?php echo URL_BASE ?>produto/&p=26">Pen Drive Multilaser 32GB USB Preto PD58...</a></h2>
               <div class="prc-ant">De <small>10146.94</small> Por</div>
               <h3>9100.00</h3>

               <div class="cx-botoes">
                  <form id="form1" name="frmcarrinho" method="post" action="<?php echo URL_BASE ?>carrinho">
                     <input name="txt_preco" 	type="hidden" id="txt_preco" value = "9100.00" />
                     <input name="txt_qtde" 		type="hidden" id="txt_qtde" value = "1" />
                     <input type="hidden" 		name="id_produto" value = "26"/>
                     <input type="submit" 		name="imageField" class="bot-comprar" value="Comprar"  />
                  </form>
                  <div class="cx-frete"><b class="frete">FRETE</b><b class="val-frete">GRÁTIS</b></div>
                  <div class="bandeiras none" ><font><b>10x</b> nos cartões</font><img src="assets/imagens/bandeiras2.png"></div>
               </div>
            </div>		

            <div class="caixa-prod-home quatro-colunas">
               <div class="cx-img">
                  <a href="<?php echo URL_BASE ?>produto/&p=27"><img src="assets/imagens/produtos/webcam_multi.jpg"></a>
               </div>		
               <h2><a href="<?php echo URL_BASE ?>produto/&p=27">WebCam Multilaser USB c/ Microfone Preta...</a></h2>
               <div class="prc-ant">De <small>10246.94</small> Por</div>
               <h3>9200.00</h3>

               <div class="cx-botoes">
                  <form id="form1" name="frmcarrinho" method="post" action="<?php echo URL_BASE ?>carrinho">
                     <input name="txt_preco" 	type="hidden" id="txt_preco" value = "9200.00" />
                     <input name="txt_qtde" 		type="hidden" id="txt_qtde" value = "1" />
                     <input type="hidden" 		name="id_produto" value = "27"/>
                     <input type="submit" 		name="imageField" class="bot-comprar" value="Comprar"  />
                  </form>
                  <div class="cx-frete"><b class="frete">FRETE</b><b class="val-frete">GRÁTIS</b></div>
                  <div class="bandeiras none" ><font><b>10x</b> nos cartões</font><img src="assets/imagens/bandeiras2.png"></div>
               </div>
            </div>		

            <div class="caixa-prod-home quatro-colunas">
               <div class="cx-img">
                  <a href="<?php echo URL_BASE ?>produto/&p=28"><img src="assets/imagens/produtos/teclado_mouse.jpg"></a>
               </div>		
               <h2><a href="<?php echo URL_BASE ?>produto/&p=28">Teclado e Mouse Gamer Multilaser Lightni...</a></h2>
               <div class="prc-ant">De <small>10246.94</small> Por</div>
               <h3>9020.00</h3>

               <div class="cx-botoes">
                  <form id="form1" name="frmcarrinho" method="post" action="<?php echo URL_BASE ?>carrinho">
                     <input name="txt_preco" 	type="hidden" id="txt_preco" value = "9020.00" />
                     <input name="txt_qtde" 		type="hidden" id="txt_qtde" value = "1" />
                     <input type="hidden" 		name="id_produto" value = "28"/>
                     <input type="submit" 		name="imageField" class="bot-comprar" value="Comprar"  />
                  </form>
                  <div class="cx-frete"><b class="frete">FRETE</b><b class="val-frete">GRÁTIS</b></div>
                  <div class="bandeiras none" ><font><b>10x</b> nos cartões</font><img src="assets/imagens/bandeiras2.png"></div>
               </div>
            </div>		

            <div class="caixa-prod-home quatro-colunas">
               <div class="cx-img">
                  <a href="<?php echo URL_BASE ?>produto/&p=29"><img src="assets/imagens/produtos/mesa_genius.jpg"></a>
               </div>		
               <h2><a href="<?php echo URL_BASE ?>produto/&p=29">Mesa Digitalizadora Genius I608X GT10000...</a></h2>
               <div class="prc-ant">De <small>11046.94</small> Por</div>
               <h3>9100.00</h3>

               <div class="cx-botoes">
                  <form id="form1" name="frmcarrinho" method="post" action="<?php echo URL_BASE ?>carrinho">
                     <input name="txt_preco" 	type="hidden" id="txt_preco" value = "9100.00" />
                     <input name="txt_qtde" 		type="hidden" id="txt_qtde" value = "1" />
                     <input type="hidden" 		name="id_produto" value = "29"/>
                     <input type="submit" 		name="imageField" class="bot-comprar" value="Comprar"  />
                  </form>
                  <div class="cx-frete"><b class="frete">FRETE</b><b class="val-frete">GRÁTIS</b></div>
                  <div class="bandeiras none" ><font><b>10x</b> nos cartões</font><img src="assets/imagens/bandeiras2.png"></div>
               </div>
            </div>		



         </div>



      </div>

      <?php include"./view/template/sidebar.php" ?>
   </div>			
</div>