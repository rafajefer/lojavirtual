<?php 
   $produto_id = intval($page[1]);
   
   $prod = new Produto();
   $cat = new Categoria();
   $sub = new Subcategoria();
   $fab = new Fabricante();
   
   $produto = $prod->find($produto_id);
   $categoria = $cat->find($produto->categoria_id);
   $subcategoria = $sub->find($produto->subcategoria_id);
   $fabricante = $fab->find($produto->fabricante_id);
   
   echo "<pre>";
   print_r($categoria);
   echo "</pre>";
?>
<div class="conteudo margin-topo">
	<!-- menu lateral-->
	<?php require_once './view/template/menu-lateral.php'; ?>
	
	<div class="lado-dir">
	<title class="migalha">Loja Virtual / <?php echo $categoria->id; ?> / HP Deskjet 6870</title>
		<div class="base-detalhes">
		
			<div class="imagem"><img src="<?php echo URL_BASE ?>assets/imagens/produtos/smartphone_samsung.jpg"></div>
			<div class="cx-opcoes">
				<h3>produto</h3>
				<div class="cx-preco">
					<span class="preco-antigo">de R$ 1046.94</span> <span class="desconto">por apenas</span>
					<h2>R$ 900.00</h2>
					<span>em até 10x nos cratões</span>
					<i class="bandeiras"></i>
				</div>
				
				<form id="form1" name="frmcarrinho" method="post" action="<?php echo URL_BASE ?>carrinho">
					<input name="txt_preco" 	type="hidden" id="txt_preco" value = "900.00" />
					<input name="txt_qtde" 		type="hidden" id="txt_qtde" value = "1" />
					<input type="hidden" 		name="id_produto" value = "31"/>
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
					<strong>HP Deskjet 6870</strong>
					<p>Lorem Ipsum é simplesmente texto aleatório da indústria tipográfica e de impressão. Lorem Ipsum tem sido texto fictício padrão da indústria desde os anos 1500, quando um desconhecido impressora teve um tipo de cozinha e mexidos-lo para fazer um espécime de livro. Ele não só sobreviveu cinco séculos, mas também o salto para a tipografia electrónica, mantendo-se essencialmente inalterada. Foi popularizada nos anos 1960 com o lançamento de folhas de Letraset contendo passagens Lorem Ipsum, e mais recentemente com software de editoração eletrônica como Aldus PageMaker, incluindo versões do Lorem Ipsum.</p>
					<strong>Algum titulo aqui</strong>
					<p>Lorem Ipsum é simplesmente texto aleatório da indústria tipográfica e de impressão. Lorem Ipsum tem sido texto fictício padrão da indústria desde os anos 1500, quando um desconhecido impressora teve um tipo de cozinha e mexidos-lo para fazer um espécime de livro. Ele não só sobreviveu cinco séculos, mas também o salto para a tipografia electrónica, mantendo-se essencialmente inalterada. Foi popularizada nos anos 1960 com o lançamento de folhas de Letraset contendo passagens Lorem Ipsum, e mais recentemente com software de editoração eletrônica como Aldus PageMaker, incluindo versões do Lorem Ipsum.</p>
					<p></p>
					<p>Lorem Ipsum tem sido texto fictício padrão da indústria desde os anos 1500, quando um desconhecido impressora teve um tipo de cozinha e mexidos-lo para fazer um espécime de livro. Ele não só sobreviveu cinco séculos, mas também o salto para a tipografia electrónica, mantendo-se essencialmente inalterada. Foi popularizada nos anos 1960 com o lançamento de folhas de Letraset contendo passagens Lorem Ipsum, e mais recentemente com software de editoração eletrônica como Aldus PageMaker, incluindo versões do Lorem Ipsum.</p>
				
				</li>
				
				<li id="aba2">
				<strong>HP Deskjet 6870</strong>
				<p>Lorem Ipsum é simplesmente texto aleatório da indústria tipográfica e de impressão. Lorem Ipsum tem sido texto fictício padrão da indústria desde os anos 1500, quando um desconhecido impressora teve um tipo de </p>
				<ol>HP Deskjet 6870</ol>
				<ol>HP Deskjet 6870</ol>
				<ol>HP Deskjet 6870</ol>
				<ol>HP Deskjet 6870</ol>
				<ol>HP Deskjet 6870</ol>
				<ol>HP Deskjet 6870</ol>
				<ol>HP Deskjet 6870</ol>
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
