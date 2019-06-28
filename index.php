<?php
require_once './autoload.php';
$config = new Empresa();
?>
<!DOCTYPE html>
<html lang="pt-br">
   <head>
      <title><?=$config->getEmpresa();?></title>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
      <link href="<?php echo URL_BASE ?>assets/css/reset.css" rel="stylesheet" type="text/css">
      <link href="<?php echo URL_BASE ?>assets/css/estilo.css" rel="stylesheet" type="text/css">
      <link href="<?php echo URL_BASE ?>assets/css/estilo-m.css" rel="stylesheet" type="text/css">


   </head>

   <body>
      <div class="mn-topo">
         <div class="conteudo">
            <div class="contato-topo">
               <h1>TELEFONE &nbsp;<strong><?=$config->getTelefone();?> / <?=$config->getCelular(); ?></strong></h1>
               <h1>E-MAIL &nbsp;<strong><?=$config->getEmail();?></strong></h1>		
               <ul class="menu-topo">
                  <li><a href="<?php echo URL_BASE ?>">HOME	</a></li>    
                  <li><a href="<?php echo URL_BASE ?>cadastro">cadastrar	</a></li>

                  <li><a href="<?php echo URL_BASE ?>login">login</a></li> 
               </ul>
               <a href="#" title="usuario" class="usuario"><img src="<?php echo URL_BASE ?>assets/imagens/ico-usuario-topo.png"><p>Visitante </p></a>
            </div>
         </div>
      </div>
      <div class="base-topo">

         <div class="conteudo">
            <a href="<?php echo URL_BASE ?>" title="logo loja virtual" class="logo"><img src="<?php echo URL_BASE.$config->getLogo();?>"></a>		
            <div class="carrinho-topo">
               <ul>

                  <li><a href="<?php echo URL_BASE ?>carrinho/"><i class="ico-carrinho"></i>1 <span>Produtos</span><i class="ico-arrow"></i></a>
                     <ul>
                        <li>
                           <div class="prod-carrinho">
                              <figure>
                                 <img src="<?php echo URL_BASE ?>assets/imagens/produtos/motog3g.jpg" title="Smartphone Motorola Moto G 3ª Geração Edição Especial Cabernet Dual Chip Desbloqueado Android 5.1 Tela HD 5" rel="Pen Drive Multilaser 32GB USB Preto PD589">
                                 <span title="Pen Drive Multilaser 32GB USB Preto PD589" rel="Pen Drive Multilaser 32GB USB Preto PD589">Smartphone Motorola Moto G 3ª Geração Edição...</span>

                              </figure>
                              <a href="<?php echo URL_BASE ?>carrinho" class='comprar'>Ir para o carrinho</a>	

                           </div>
                        </li>
                     </ul>
                  </li>
               </ul>
            </div>
            <div class="cx-busca">
               <form action="<?php echo URL_BASE ?>lista-cursos" method="post">
                  <input type="text" placeholder="Pesquisa">
                  <input type="submit" class="but">
               </form>
            </div>
         </div>
      </div>
      <div class="limpar"></div>

      <nav class="navmenu">
         <a href="#" class="mobmenu">menu</a>
         <div class="cor">
            <div class="conteudo">
               <ul>
                  <!-- mostrar mobile -->
                  <li class="mostra"><a href="<?php echo URL_BASE ?>"><i class="ico-home"></i>Home	</a></li>  
                  <li class="mostra"><a href="<?php echo URL_BASE ?>login"><i class="ico-logar"></i>Login</a></li>  					
                  <li class="mostra"><a href="<?php echo URL_BASE ?>cadastro"><i class="ico-cad"></i>Cadastrar	</a></li>     


                  <li><a href="index.php?link=11"><span><img src="<?php echo URL_BASE ?>assets/imagens/ico-mb.png"></span>Informática</a>
                     <ul>
                        <li><a href="#" title="Sub Produto 1">Sub Produto 1</a>	</li>
                        <li><a href="#" title="Sub Produto 2">Sub Produto 2</a></li>
                        <li><a href="#" title="Sub Produto 3">Sub Produto 3</a></li>
                     </ul>
                  </li>
                  <li><a href="index.php?link=11"><span><img src="<?php echo URL_BASE ?>assets/imagens/ico-smt.png"></span>Smartphones</a>
                     <ul>
                        <li><a href="#" title="Sub Produto 1">Sub Produto 1</a>	</li>
                        <li><a href="#" title="Sub Produto 2">Sub Produto 2</a></li>
                        <li><a href="#" title="Sub Produto 3">Sub Produto 3</a></li>
                     </ul>
                  </li>
                  <li><a href="index.php?link=11"><span><img src="<?php echo URL_BASE ?>assets/imagens/ico-not.png"></span>Notebooks</a>
                     <ul>
                        <li><a href="#" title="Sub Produto 1">Sub Produto 1</a>	</li>
                        <li><a href="#" title="Sub Produto 2">Sub Produto 2</a></li>
                        <li><a href="#" title="Sub Produto 3">Sub Produto 3</a></li>
                     </ul>
                  </li>
                  <li><a href="index.php?link=11"><span><img src="<?php echo URL_BASE ?>assets/imagens/ico-tab.png"></span>Tablets</a>
                     <ul>
                        <li><a href="#" title="Sub Produto 1">Sub Produto 1</a>	</li>
                        <li><a href="#" title="Sub Produto 2">Sub Produto 2</a></li>
                        <li><a href="#" title="Sub Produto 3">Sub Produto 3</a></li>
                     </ul>
                  </li>
                  <li><a href="index.php?link=11"><span><img src="<?php echo URL_BASE ?>assets/imagens/ico-des.png"></span>Hardware</a>
                     <ul>
                        <li><a href="#" title="Sub Produto 1">Sub Produto 1</a>	</li>
                        <li><a href="#" title="Sub Produto 2">Sub Produto 2</a></li>
                        <li><a href="#" title="Sub Produto 3">Sub Produto 3</a></li>
                     </ul>
                  </li>
                  <li><a href="index.php?link=11"><span><img src="<?php echo URL_BASE ?>assets/imagens/ico-ace.png"></span>Acessórios</a>
                     <ul>
                        <li><a href="#" title="Sub Produto 1">Sub Produto 1</a>	</li>
                        <li><a href="#" title="Sub Produto 2">Sub Produto 2</a></li>
                        <li><a href="#" title="Sub Produto 3">Sub Produto 3</a></li>
                     </ul>
                  </li>
                  <li><a href="index.php?link=11"><span><img src="<?php echo URL_BASE ?>assets/imagens/ico-out.png"></span>Outros</a>
                     <ul>
                        <li><a href="#" title="Sub Produto 1">Sub Produto 1</a>	</li>
                        <li><a href="#" title="Sub Produto 2">Sub Produto 2</a></li>
                        <li><a href="#" title="Sub Produto 3">Sub Produto 3</a></li>
                     </ul>
                  </li>
               </ul>
            </div>
         </div>
      </nav>

      <?php
      $page = isset($_GET['url']) ? addslashes($_GET['url']) : '';
      if (!empty($page)) {
         $filename = "view/".$page.".php";
         if (file_exists($filename)) {
            require_once $filename;
         } else {
            $page = explode('/', $page);
            require_once "view/$page[0].php";
         }
         
      } else {
         require_once 'view/home.php';
      }
      ?>















      <div class="limpar"></div>
      <div class="base-rodape">
         <div class="conteudo cx-rodape">
            <div class="cx-mr">
               <strong>PRODUTOS</strong>
               <ul>

                  <li><a href="">Cartão Memória       </a></li>
                  <li><a href="">Redes                </a></li>
                  <li><a href="">Periféricos          </a></li>
                  <li><a href="">Mouse/ Teclado       </a></li>
                  <li><a href="">Fone de Ouvido       </a></li>
                  <li><a href="">Fonte de Alimentação </a></li>
                  <li><a href="">Apple/ Ipad		  </a></li>
               </ul>
               <ul>
                  <li><a href="">Notebook/ Netbook  </a></li>
                  <li><a href="">Impressoras </a></li>
                  <li><a href="">Tablets </a></li>
                  <li><a href="">Computadores </a></li>
                  <li><a href="">Hardware </a></li>
                  <li><a href="">Acessórios </a></li>
                  <li><a href="">Softwares </a></li>
               </ul>
               <ul> 
                  <li><a href="">Mochilas/ Cases</a>
                  <li><a href="">Cabo/ Adaptador    </a></li>
                  <li><a href="">GPS                </a></li>
                  <li><a href="">Monitor            </a></li>
                  <li><a href="">Placa de Video     </a></li>
                  <li><a href="">Memória            </a></li>
                  <li><a href="">Webcam             </a></li>
                  <li><a href="">HD Sata/ HD Externo</a></li>
               </ul>
            </div>

            <div class="cx-mr">
               <strong>REDES SOCIAIS</strong>
               <a href="<?=$config->getFacebook();?>" class="ico-face">facebook</a>
               <a href="#" class="ico-youtube">youtube</a>
               <a href="#" class="ico-twitter">twitter</a>

               <div class="ico-bandeira"></div>
            </div>

         </div>
         <div class="copy">
            <p>Copyright - <?=$config->getEmpresa();?></p>
            <p>CNPJ: <?=$config->getCnpj();?></p>
         </div>
      </div>

      <!-- script -->
      <script src="<?php echo URL_BASE; ?>assets/js/jquery.min.js"></script>
      <!--<script src="./assets/js/popper.min.js"></script>-->
      <!--<script src="./assets/js/bootstrap.min.js"></script>-->
      <script src="<?php echo URL_BASE; ?>assets/js/app.js"></script>
   </body>
</html>
