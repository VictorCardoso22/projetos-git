   <article class="container">

		<div class="contato col-sm-12 col-md-8">
            <div class="section-title">
               <h3> Solicite um orçamento! Entre em contato conosco, preenchendo o formulário ou se preferir podemos nos falar por telefone, Skype ou entao... </h3>

                 <h5>O que acha de marcarmos um cafezinho?</h5>


               <h4> Estou animado em poder lhe ajudar. ;)</h4>
               </div>

    			<?php 
                 $Contato = filter_input_array(INPUT_POST, FILTER_DEFAULT);
                    if ($Contato && $Contato['SendFormContato']):
                         unset($Contato['SendFormContato']);

                        
                        $Contato['DestinoNome'] = 'Victor Cardoso - Buscatudo Serviço';
                        $Contato['DestinoEmail'] = 'contato@require.com.br';

                        $SendMail = new Email;
                        $SendMail->Enviar($Contato);
             
                        if ($SendMail->getError()):
                            WSErro($SendMail->getError()[0], $SendMail->getError()[1]);
                        endif;

                    endif;

                ?>
          <div class="">
             <form class="form-horizontal" name="FormContato" action="#contato" method="post">
                <div class="form-group">
                    <label>
                     <div class="col-md-12 col-sm-offset-1 col-md-offset-0">
                        <span>Informe eu nome:</span>                       
                        <input type="text" title="Informe seu nome" name="RemetenteNome" autofocus="autofocus" required />
                     </div>
                    </label>

                    <label>
                       <div class="col-md-12 col-sm-offset-1 col-md-offset-0">
                        <span>Informe seu E-mail:</span>
                        <input type="email" title="Informe seu e-mail" name="RemetenteEmail" required />
                        </div>
                    </label>

                    <label>
                     <div class="col-md-12 col-sm-offset-1 col-md-offset-0">
                        <span>Informe o assunto</span>
                        <input title="Informe o assunto" name="Mensagem"  required/>
                        </div>
                    </label>

                    <label>
                     <div class="col-md-12 col-sm-offset-1 col-md-offset-0">
                        <span>Conte mais sobre o que você precisa (Site, Marketing digital, Sistema)</span>
                        <textarea title="Envie sua mensagem" name="Mensagem"  required rows="8"></textarea>
                     </div>
                    </label>
                     <div class="col-md-5 col-sm-4">
                       <input type="submit" value="Enviar" name="SendFormContato" class="btn">   
                     </div>
                 </div>               
                </form>
             </div>    
        </div>
	
		<aside class="col-sm-12 col-md-4">
            <div class="section-title">
    		<h1>Outros Contatos</h1>
            </div>
    			
            <div class="box col-md-12"><a href="(82) 9 99605 - 9189"> <p>(82) 9 9605-9189</p> <img src="<?= INCLUDE_PATH; ?>/images/whatsapp.png"/> </a> </div>

            <div class="box col-md-12"><a href="victor.cardoso22"> <p>victor.cardoso22</p> <img src="<?= INCLUDE_PATH; ?>/images/skype13.png"/></a> </div>

            <div class="box col-md-12"><p>contato@require.com.br</p><img src="<?= INCLUDE_PATH; ?>/images/email118.png"/> </div>

            <div class="box col-md-12"><a href="http://www.facebook.com/requireWeb" target="_blank" ><p>facebook.com/requieWeb</p><img src="<?= INCLUDE_PATH; ?>/images/facebook2.png"/></a></div> 



		</aside>
        <div class="clear"></div>
	</article> <!-- container_ -->

