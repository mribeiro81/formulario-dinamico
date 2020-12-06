<!doctype html>
<html>
<head>
<title>Exemplo de formulário criado de forma dinâmica</title>
<link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sticky-footer-navbar/">
<link href="assets/css/bootstrap/bootstrap.min.css" rel="stylesheet" />
<link href="assets/css/stylo.css" rel="stylesheet" />
</head>
<body>

<main class="container">
		
	<div class="row">
		
		<div class="col-sm mb-4">

			<h2 class="mt-5">Exemplo de formulário criado de forma dinâmica.</h2>

			<?php				

				require_once("vendor/autoload.php");

				$dados_form= [				

					"type:form|name:frmTeste|id:frmTeste|autocomplete:off|action:gravar.php|method:post|enctype:multipart/form-data|target:_self|input-class:mt-2",

					"type:submit|name:enviar|id:enviar|value:Enviar|input-class:btn btn-primary btn-lg btn-block mt-4 mb-5|texto:Ao clicar no botão, o formulário será submetido, mas, a paǵina de destino não foi criada.<br>Você receberá a mensagem de página não encontrada.|tag-texto:div|class-texto:alert alert-warning mt-5|",

					"type:hidden|name:token|id:token|value:",


					"type:text|name:nome|id:nome|maxlength:30|label:Nome|obrigatorio:*|value:|pattern:[a-z\s]+$|title:Preencha esse campo com o seu nome|placeholder:Informe o seu nome|div-class:form-group mt-3|label-class:|input-class:form-control required|texto:|tag-texto:|class-texto:|",

					"type:text|name:sobrenome|id:sobrenome|maxlength:30|label:Sobrenome|obrigatorio:*|value:|pattern:[a-z\s]+$|title:Preencha esse campo com o seu sobrenome|placeholder:Informe o seu sobrenome|div-class:form-group mt-3|label-class:|input-class:form-control required|texto:|tag-texto:|class-texto:|",

					"type:email|name:email|id:email|maxlength:80|label:E-mail|obrigatorio:*|value:|pattern:[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$|title:Preencha esse campo com o seu e-mail|placeholder:Informe o seu e-mail|div-class:form-group mt-3|label-class:|input-class:form-control required|texto:|tag-texto:|class-texto:|",

					"type:password|name:senha|id:senha|maxlength:12|label:Senha para futuros acessos|obrigatorio:*|value:|pattern:|title:Informe uma senha para futuros acessos|placeholder:Informe uma senha para futuros acessos|div-class:form-group mt-3|label-class:|input-class:form-control required|texto:|tag-texto:|class-texto:|",

					"type:tel|name:celular|id:celular|maxlength:|label:Celular|obrigatorio:*|value:|pattern:\([0-9]{2}\)[0-9]{5}-[0-9]{4}$|title:Preencha esse campo com o número do seu celular|placeholder:(00)00000-0000|div-class:form-group mt-3|label-class:|input-class:form-control required|texto:|tag-texto:|class-texto:|",

					"type:date|name:data_nascimento|id:data_nascimento|maxlength:10|min:1940-01-01|max:2020-12-04|label:Data de nascimento|obrigatorio:*|value:|pattern:[0-9]{2}\/[0-9]{2}\/[0-9]{4}$|title:Preencha esse campo com a sua data de nascimento|placeholder:|div-class:form-group mt-3|label-class:|input-class:form-control required|texto:|tag-texto:|class-texto:|",

					"type:select|name:sexo|id:sexo|label:Sexo|options:Selecione-Selecione F-Feminino M-Masculino|obrigatorio:*|title:Selecione uma opção|div-class:form-group mt-3|label-class:|input-class:form-control required|texto:|tag-texto:|class-texto:|",

					"type:textarea|name:menagem|id:mensagem|maxlength:120|label:Mensagem|obrigatorio:*|value:|title:Preencha esse campo com a sua mensagem|placeholder:Escreva a sua mensagem|div-class:form-group mt-3|label-class:|input-class:form-control required|texto:|tag-texto:|class-texto:|",

					"type:radio|name:itenServico|id:servico|value:1|checked:|label:Serviço|obrigatorio:*|title:Serviço|div-class:form-check|label-class:form-check-label|input-class:form-check-input required-radio|texto:Selecione uma opção|tag-texto:h5|class-texto:mt-4|",

					"type:radio|name:itenServico|id:desenvolvimento|value:2|checked:|label:Desenvolvimento|obrigatorio:*|title:Desenvolvimento|div-class:form-check|label-class:form-check-label|input-class:form-check-input required-radio|texto:|tag-texto:|class-texto:|",

					"type:radio|name:itenServico|id:suporte|value:3|checked:|label:Suporte|obrigatorio:*|title:Suporte|div-class:form-check|label-class:form-check-label|input-class:form-check-input required-radio|texto:|tag-texto:|class-texto:|",

					"type:checkbox|name:contatoEmail|id:contatoEmail|value:1|checked:|label:E-mail|obrigatorio:*|title:Contato por e-email|div-class:form-check|label-class:form-check-label|input-class:form-check-input required-checkbox|texto:Informe como prefere que façamos contato|tag-texto:h5|class-texto:mt-4|",

					"type:checkbox|name:contatoSms|id:contatoSms|value:2|checked:|label:SMS|obrigatorio:*|title:Contato por SMS|div-class:form-check|label-class:form-check-label|input-class:form-check-input required-checkbox|texto:|tag-texto:|class-texto:|",


					"type:file|name:foto|id:foto|label:Envie uma foto sua|obrigatorio:*|accept:image/*|title:Envie uma foto sua|placeholder:Envie uma foto sua|div-class:form-group mt-3|label-class:|input-class:form-control required|texto:|tag-texto:|class-texto:|",

				];

				
				use Core\{CriaArrayTrait,GeraFormularioClass};

				$dados_form = CriaArrayTrait::geraArray($dados_form);
				$formulario = new GeraFormularioClass();
				$formulario->render($dados_form); 
			?>
			
		</div>	
	</div>	

</main>

</body>
</html>

