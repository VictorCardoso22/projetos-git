
	<!--start wrapper-->
	<section class="wrapper">
		<section class="page_head">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12">
						<h2>Entre em contato!</h2>
					
					</div>
				</div>
			</div>
		</section>

		<section class="content contact">
			<div class="container">
				<div class="row sub_content">
					<div class="col-lg-12 col-md-12 col-sm-12">
						<div class="maps">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3933.3984665530734!2d-35.736534934600094!3d-9.646952911433292!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x701458c1affd4eb%3A0xafdc41f8e70810f!2sEscola+T%C3%A9cnica+de+Sa%C3%BAde+Santa+B%C3%A1rbara!5e0!3m2!1spt-BR!2sbr!4v1485371887347" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
							<!-- <div id="page_maps"></div> -->
						</div>
					</div>
				</div>

				<div class="row sub_content">
					<div class="col-lg-8 col-md-8 col-sm-8">
						<div class="dividerHeading">
							<h4><span>Formulario de contato</span></h4>
						</div>
						<p>Envie-nos um e-mail </p>
							
						<div class="alert alert-success hidden alert-dismissable" id="contactSuccess">
						  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						  <strong>Success!</strong> Your message has been sent to us.
						</div>
						
						<div class="alert alert-error hidden" id="contactError">
						  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						  <strong>Error!</strong> There was an error sending your message.
						</div>
						

<?php 
                 $Contato = filter_input_array(INPUT_POST, FILTER_DEFAULT);
                    if ($Contato && $Contato['SendFormContato']):
                         unset($Contato['SendFormContato']);

                        
                        $Contato['DestinoNome'] = 'Site - escolasantabarbara.com.br';
                        $Contato['DestinoEmail'] = 'suporte@escolasantabarbara.com.br';

                        $SendMail = new Email;
                        $SendMail->Enviar($Contato);
             
                        if ($SendMail->getError()):
                            WSErro($SendMail->getError()[0], $SendMail->getError()[1]);
                        endif;

                    endif;

 ?>
 
                         

						<form id="contactForm" action="" name="FormContato" method="post" role="form" novalidate="novalidate">
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-lg-6 ">
                                        <input type="text" title="Informe seu nome" name="RemetenteNome" id="name"  class="form-control" maxlength="100" data-msg-required="Informe seu nome" value="" placeholder="Informe seu nome" >
                                    </div>
                                    <div class="col-lg-6 ">
                                        <input type="email" title="Informe seu e-mail" name="RemetenteEmail"  id="email"  class="form-control" maxlength="100" data-msg-email="Informe seu e-mail" data-msg-required="Informe seu e-mail" value="" placeholder="Informe seu e-mail" >
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input type="text" title="Informe o assunto" name="Assunto" id="subject"  class="form-control" maxlength="100" data-msg-required="Por favor informe o assunto" value="" placeholder="Informe o assunto">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <textarea title="Envie sua mensagem" name="Mensagem"  id="message" class="form-control" rows="10" cols="50" data-msg-required="Envie sua mensagem" maxlength="5000" placeholder="Envie sua mensagem"></textarea>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <input t type="submit" value="Enviar" name="SendFormContato"  class="btn btn-default btn-lg">
                                </div>
                            </div>
						</form>
					</div>
					
					<div class="col-lg-4 col-md-4 col-sm-4">
						<div class="sidebar">
							<div class="widget_info">
								<div class="dividerHeading">
									<h4><span>Informações de contato</span></h4>
									</div>
								<p>Ou, se preferir:</p>
								<ul class="widget_info_contact">
									<li><i class="fa fa-user"></i> <p><strong>Telefone</strong>: (82) 3215-4850</p></li>
									<li><i class="fa fa-envelope"></i> <p><strong>E-mail</strong>: <a href="#">contato@escolasantabarbara.com.br</a></p></li>
									
								</ul>

								<p>Polo Benedito Bentes, Maceió - AL:</p>

								<ul class="widget_info_contact">
									<li><i class="fa fa-user"></i> <p><strong>Telefone</strong>: (82) 3344-5632</p></li>
									<li><i class="fa fa-home"></i> <p><strong>Endereço</strong>: Av. Cachoeira do Meirim </p></li>
									
								</ul>
								
							</div>
							
							<div class="widget_social">
								<div class="dividerHeading">
									<h4><span>Mídias sociaiss</span></h4>
								</div>
								<ul class="widget_social">
									<li><a class="fb" href="#." data-placement="bottom" data-toggle="tooltip" title="Facbook"><i class="fa fa-facebook"></i></a></li>
									<li><a class="instagram" href="https://www.instagram.com/santabarbarao/" target="_Blank" data-placement="bottom" data-toggle="tooltip" title="Instagram"><i class="fa fa-instagram"></i></a></li>
									
								</ul>
							</div>
						</div>
					</div>
					
				</div>
			</div>
		</section>
	</section>
	<!--end wrapper-->

	
