<div id="feature" >
<div class="container">
<div class="site-container">
        <section class="contato">
                


            <?php 
             $Contato = filter_input_array(INPUT_POST, FILTER_DEFAULT);
                    if ($Contato && $Contato['SendFormContato']):
                         unset($Contato['SendFormContato']);

                        
                        $Contato['DestinoNome'] = 'Contato - Buscatudo Serviço';
                        $Contato['DestinoEmail'] = 'contato@buscatudoservicos.com.br';

                        $SendMail = new Email;
                        $SendMail->Enviar($Contato);
             
                        if ($SendMail->getError()):
                            WSErro($SendMail->getError()[0], $SendMail->getError()[1]);
                        endif;

                    endif;

            ?>
       



            <div class="container">
        <div class="row">
            <div class="col-lg-12">
    
        <form  name="FormContato" action="#contato" method="post" class="register-form">
          
            <h1 style="color:#333; text-align:center;"><p><b> Olá, entre em contanto deixando uma mensagem usando o formulário abaixo e entraremos em contato em breve<br></b> </p><small> 

            <p style="margin-bottom: 40px;"> ou Prefere ligar? <i class="fa fa-phone"></i> (82) 9.9170-0732</p></small></h1>

            <hr class="colorgraph">
         
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <div class="form-group">
                      <input style="border: 1px solid #04b0f0;" class="form-control input-md" type="text" title="Informe seu nome" name="RemetenteNome" " placeholder="Informe Seu Nome" required>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <div class="form-group">
                        <input style="border: 1px solid #04b0f0;" class="form-control input-md" type="email" title="Informe seu e-mail"  name="RemetenteEmail" placeholder="Informe Seu Email" required >
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <div class="form-group">
                        <input style="border: 1px solid #04b0f0;" class="form-control input-md" type="text" title="Informe o assunto" name="Assunto"   placeholder="Informe o Assunto" required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <textarea style="border: 1px solid #04b0f0;" class="form-control" rows="8" title="Envie sua mensagem" name="Mensagem"  required placeholder="* Escreva o que precisa e envie sua mensagem"></textarea>
            </div>

            
            <hr class="colorgraph">
            <div class="row">
                <div class="col-xs-12 col-md-4"><input style="background:#04b0f0; color:#f5f5f5;" type="submit" value="Enviar" name="SendFormContato"" class="btn btn-theme btn-block btn-md"></div>
                <div class="col-xs-12 col-md-8">*Todos os campos são de preenchimento obrigatório.</div>
            </div>
        </form>

            </div>
        </div>
    </div>

        </section>

 
</div>     
</div>   
</div>