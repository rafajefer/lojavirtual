<?php 
   $slug = addslashes($page[1]);
   
   $prod = new Produto();
   $produto = $prod->getProduto($slug);   
?>
<div class="conteudo margin-topo">
	<!-- menu lateral-->
	<?php require_once './view/template/menu-lateral.php'; ?>
	
	<div class="lado-dir">
	<div class="migalha">Loja Virtual / <a href="<?php echo URL_BASE."categoria/".$produto->categoria_slug; ?>" title="Acessa a categoria <?php echo $produto->categoria_nome; ?>"><?php echo $produto->categoria_nome; ?></a> / <a href="<?php echo URL_BASE."subcategoria/".$produto->subcategoria_slug; ?>" title="Acessa a subcategoria <?php echo $produto->subcategoria_nome; ?>"><?php echo $produto->subcategoria_nome; ?></a></div>
		<div class="base-detalhes">
		
			<div class="imagem"><img src="<?php echo $produto->thumbnail; ?>"></div>
			<div class="cx-opcoes">
				<h3><?php echo $produto->nome; ?></h3>
				<div class="cx-preco">
					<span class="preco-antigo">de R$ <?php echo $produto->preco_alto; ?></span> <span class="desconto">por apenas</span>
					<h2>R$ <?php echo $produto->preco; ?></h2>
					<span>em até 10x nos cratões</span>
					<i class="bandeiras"></i>
				</div>
				
				<form id="form1" name="frmcarrinho" method="post" action="<?php echo URL_BASE ?>carrinho">
					<input name="txt_preco" 	type="hidden" id="txt_preco" value = "<?php echo $produto->preco; ?>" />
					<input name="txt_qtde" 		type="hidden" id="txt_qtde" value = "1" />
					<input type="hidden" 		name="id_produto" value = "<?php echo $produto->id; ?>"/>
					<input type="submit" 		name="imageField" class="carrinho" value="Adicionar ao carrinho"  />
				</form>
			</div>
		</div>
		
		<div id="caixa">
			<p id="abas">
				<a href="#aba1" class="selected">descrição</a>
				<a href="#aba2">Detalhes</a>
				<a href="#aba3">Fotos do produto</a>
								
			</p>

			<ul id="conteudos" class="descricao">				
				<li id="aba1">
					<?php echo $produto->descricao; ?>
				</li>
				
				<li id="aba2">
               <?php echo $produto->detalhes; ?>
				</li>	
				
				<li id="aba3">
				<div class="descricao">
				<strong>Fotos do produto</strong>
            
				<div class="fotos">
					<img src="<?php echo URL_BASE ?>assets/imagens/produtos/smartphone_samsung.jpg">
				</div>
				<div class="fotos">
					<img src="<?php echo URL_BASE ?>assets/imagens/produtos/smartphone_samsung.jpg">
				</div>
				</div>
				</li>				
				
			</ul>
		</div>
		
		<!--Recomendados para você-->	
		<div class="recomendamos">
						
		<div class="cx-base-home">
			<h1><span>Recomendados para você</span></h1>
							<div class="caixa-prod-home quatro-colunas">
				<div class="cx-img">
						<a href="<?php echo URL_BASE ?>produto/&p=41"><img src="<?php echo URL_BASE ?>assets/imagens/produtos/smartphone_samsung.jpg"></a>
				</div>
				<div class="limpar"></div>		
					<h2><a href="<?php echo URL_BASE ?>produto/&p=41">produto</a></h2>
						<div class="prc-ant">De <small>R$ 1046.94</small>&nbsp; Por</div>
							<h3>R$ 900.00</h3>
										
					<div class="cx-botoes">
						<form id="form1" name="frmcarrinho" method="post" action="<?php echo URL_BASE ?>carrinho">
							<input name="txt_preco" 	type="hidden" id="txt_preco" value = "900.00" />
							<input name="txt_qtde" 		type="hidden" id="txt_qtde" value = "1" />
							<input type="hidden" 		name="id_produto" value = "41"/>
							<input type="submit" 		name="imageField" class="bot-comprar" value="Comprar"  />
						</form>
						<div class="cx-frete"><b class="frete">FRETE</b><b class="val-frete">GRÁTIS</b></div>
					</div>
				</div>				
								<div class="caixa-prod-home quatro-colunas">
				<div class="cx-img">
						<a href="<?php echo URL_BASE ?>produto/&p=40"><img src="<?php echo URL_BASE ?>assets/imagens/produtos/smartphone_samsung.jpg"></a>
				</div>
				<div class="limpar"></div>		
					<h2><a href="<?php echo URL_BASE ?>produto/&p=40">produto</a></h2>
						<div class="prc-ant">De <small>R$ 1046.94</small>&nbsp; Por</div>
							<h3>R$ 900.00</h3>
										
					<div class="cx-botoes">
						<form id="form1" name="frmcarrinho" method="post" action="<?php echo URL_BASE ?>carrinho">
							<input name="txt_preco" 	type="hidden" id="txt_preco" value = "900.00" />
							<input name="txt_qtde" 		type="hidden" id="txt_qtde" value = "1" />
							<input type="hidden" 		name="id_produto" value = "40"/>
							<input type="submit" 		name="imageField" class="bot-comprar" value="Comprar"  />
						</form>
						<div class="cx-frete"><b class="frete">FRETE</b><b class="val-frete">GRÁTIS</b></div>
					</div>
				</div>				
								<div class="caixa-prod-home quatro-colunas">
				<div class="cx-img">
						<a href="<?php echo URL_BASE ?>produto/&p=43"><img src="<?php echo URL_BASE ?>assets/imagens/produtos/motorola01.png"></a>
				</div>
				<div class="limpar"></div>		
					<h2><a href="<?php echo URL_BASE ?>produto/&p=43">Smartphone Motorola Moto E 2ª Geração...</a></h2>
						<div class="prc-ant">De <small>R$ 7990.00</small>&nbsp; Por</div>
							<h3>R$ 6999.00</h3>
										
					<div class="cx-botoes">
						<form id="form1" name="frmcarrinho" method="post" action="<?php echo URL_BASE ?>carrinho">
							<input name="txt_preco" 	type="hidden" id="txt_preco" value = "6999.00" />
							<input name="txt_qtde" 		type="hidden" id="txt_qtde" value = "1" />
							<input type="hidden" 		name="id_produto" value = "43"/>
							<input type="submit" 		name="imageField" class="bot-comprar" value="Comprar"  />
						</form>
						<div class="cx-frete"><b class="frete">FRETE</b><b class="val-frete">GRÁTIS</b></div>
					</div>
				</div>				
								<div class="caixa-prod-home quatro-colunas">
				<div class="cx-img">
						<a href="<?php echo URL_BASE ?>produto/&p=37"><img src="<?php echo URL_BASE ?>assets/imagens/produtos/smartphone_samsung.jpg"></a>
				</div>
				<div class="limpar"></div>		
					<h2><a href="<?php echo URL_BASE ?>produto/&p=37">produto</a></h2>
						<div class="prc-ant">De <small>R$ 1046.94</small>&nbsp; Por</div>
							<h3>R$ 900.00</h3>
										
					<div class="cx-botoes">
						<form id="form1" name="frmcarrinho" method="post" action="<?php echo URL_BASE ?>carrinho">
							<input name="txt_preco" 	type="hidden" id="txt_preco" value = "900.00" />
							<input name="txt_qtde" 		type="hidden" id="txt_qtde" value = "1" />
							<input type="hidden" 		name="id_produto" value = "37"/>
							<input type="submit" 		name="imageField" class="bot-comprar" value="Comprar"  />
						</form>
						<div class="cx-frete"><b class="frete">FRETE</b><b class="val-frete">GRÁTIS</b></div>
					</div>
				</div>				
								<div class="caixa-prod-home quatro-colunas">
				<div class="cx-img">
						<a href="<?php echo URL_BASE ?>produto/&p=30"><img src="<?php echo URL_BASE ?>assets/imagens/produtos/smartphone_samsung.jpg"></a>
				</div>
				<div class="limpar"></div>		
					<h2><a href="<?php echo URL_BASE ?>produto/&p=30">produto</a></h2>
						<div class="prc-ant">De <small>R$ 1046.94</small>&nbsp; Por</div>
							<h3>R$ 900.00</h3>
										
					<div class="cx-botoes">
						<form id="form1" name="frmcarrinho" method="post" action="<?php echo URL_BASE ?>carrinho">
							<input name="txt_preco" 	type="hidden" id="txt_preco" value = "900.00" />
							<input name="txt_qtde" 		type="hidden" id="txt_qtde" value = "1" />
							<input type="hidden" 		name="id_produto" value = "30"/>
							<input type="submit" 		name="imageField" class="bot-comprar" value="Comprar"  />
						</form>
						<div class="cx-frete"><b class="frete">FRETE</b><b class="val-frete">GRÁTIS</b></div>
					</div>
				</div>				
								<div class="caixa-prod-home quatro-colunas">
				<div class="cx-img">
						<a href="<?php echo URL_BASE ?>produto/&p=32"><img src="<?php echo URL_BASE ?>assets/imagens/produtos/smartphone_samsung.jpg"></a>
				</div>
				<div class="limpar"></div>		
					<h2><a href="<?php echo URL_BASE ?>produto/&p=32">produto</a></h2>
						<div class="prc-ant">De <small>R$ 1046.94</small>&nbsp; Por</div>
							<h3>R$ 900.00</h3>
										
					<div class="cx-botoes">
						<form id="form1" name="frmcarrinho" method="post" action="<?php echo URL_BASE ?>carrinho">
							<input name="txt_preco" 	type="hidden" id="txt_preco" value = "900.00" />
							<input name="txt_qtde" 		type="hidden" id="txt_qtde" value = "1" />
							<input type="hidden" 		name="id_produto" value = "32"/>
							<input type="submit" 		name="imageField" class="bot-comprar" value="Comprar"  />
						</form>
						<div class="cx-frete"><b class="frete">FRETE</b><b class="val-frete">GRÁTIS</b></div>
					</div>
				</div>				
								<div class="caixa-prod-home quatro-colunas">
				<div class="cx-img">
						<a href="<?php echo URL_BASE ?>produto/&p=5"><img src="<?php echo URL_BASE ?>assets/imagens/produtos/multilaser.jpg"></a>
				</div>
				<div class="limpar"></div>		
					<h2><a href="<?php echo URL_BASE ?>produto/&p=5">Smartphone Multilaser MS2 Android 4.2 Wi...</a></h2>
						<div class="prc-ant">De <small>R$ 10346.94</small>&nbsp; Por</div>
							<h3>R$ 9800.00</h3>
										
					<div class="cx-botoes">
						<form id="form1" name="frmcarrinho" method="post" action="<?php echo URL_BASE ?>carrinho">
							<input name="txt_preco" 	type="hidden" id="txt_preco" value = "9800.00" />
							<input name="txt_qtde" 		type="hidden" id="txt_qtde" value = "1" />
							<input type="hidden" 		name="id_produto" value = "5"/>
							<input type="submit" 		name="imageField" class="bot-comprar" value="Comprar"  />
						</form>
						<div class="cx-frete"><b class="frete">FRETE</b><b class="val-frete">GRÁTIS</b></div>
					</div>
				</div>				
								<div class="caixa-prod-home quatro-colunas">
				<div class="cx-img">
						<a href="<?php echo URL_BASE ?>produto/&p=2"><img src="<?php echo URL_BASE ?>assets/imagens/produtos/motog3g.jpg"></a>
				</div>
				<div class="limpar"></div>		
					<h2><a href="<?php echo URL_BASE ?>produto/&p=2">Smartphone Motorola Moto G 3ª Geração...</a></h2>
						<div class="prc-ant">De <small>R$ 10460.94</small>&nbsp; Por</div>
							<h3>R$ 9000.00</h3>
										
					<div class="cx-botoes">
						<form id="form1" name="frmcarrinho" method="post" action="<?php echo URL_BASE ?>carrinho">
							<input name="txt_preco" 	type="hidden" id="txt_preco" value = "9000.00" />
							<input name="txt_qtde" 		type="hidden" id="txt_qtde" value = "1" />
							<input type="hidden" 		name="id_produto" value = "2"/>
							<input type="submit" 		name="imageField" class="bot-comprar" value="Comprar"  />
						</form>
						<div class="cx-frete"><b class="frete">FRETE</b><b class="val-frete">GRÁTIS</b></div>
					</div>
				</div>				
							</div>
		</div>
		
	</div>
</div>
