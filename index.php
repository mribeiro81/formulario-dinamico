<!doctype html>
<html>
<head>
<title>Exemplo de formulário criado de forma dinâmica</title>
<link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sticky-footer-navbar/">
<link href="assets/css/bootstrap/bootstrap.min.css" rel="stylesheet" />
<link href="assets/css/stylo.css" rel="stylesheet" />
</head>
<body>

<header class="container header-background mt-1 mb-1">
	
	<h2 class="mt-5">Exemplo de formulário criado de forma dinâmica.</h2>

</header>	

<main class="container">
		
	<div class="row">
		
		<div class="col-sm mb-4">			

			<?php				

				require_once("vendor/autoload.php");	


				$dados_form= [

					//form
					"type:form|action:gravar.php|method:post|enctype:multipart/form-data|autocomplete:off|target:_self|name:frmContato|id:frmContato",

					//inut hidden
					"type:hidden|name:token|id:token|value:".md5(date("Y-m-d h:i:s"))."",


					"type:div|class:form-group mt-3", //abrindo div que irá envolver o input
						"type:label|for:nome|value:Nome|obrigatorio:*", //Label do input
						//input text
						"type:TEXT|name:nome|id:nome|class:form-control required|placeholder:Informe o seu nome|title:Informe o seu nome", 
					"type:div", //fechando a div que envolve o input

					"type:div|class:form-group mt-3",  //abrindo div que irá envolver o input
						"type:label|for:sobrenome|value:Sobrenome|obrigatorio:*", //Label do input
						//input text
						"type:text|name:sobrenome|id:sobrenome|class:form-control required|placeholder:Informe o seu sobrenome|title:Informe o seu sobrenome", 
					"type:div", //fechando a div que envolve o input


					"type:div|class:form-group mt-3",  //abrindo div que irá envolver o input
						"type:label|for:email|value:E-mail|obrigatorio:*", //Label do input
						//input email
						"type:email|name:email|id:email|maxlength:80|label:E-mail|obrigatorio:*|pattern:[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$|title:Preencha esse campo com o seu e-mail|placeholder:Informe o seu e-mail|class:form-control required|",
					"type:div", //fechando a div que envolve o input

					"type:div|class:form-group mt-3",  //abrindo div que irá envolver o input
						"type:label|for:senha|value:Informe uma senha para futuros acessos|obrigatorio:*", //Label do input
						"type:password|name:senha|id:senha|maxlength:12|label:Senha para futuros acessos|obrigatorio:*|title:Informe uma senha para futuros acessos|placeholder:Informe uma senha para futuros acessos|class:form-control required", //
					"type:div", //fechando a div que envolve o input

					"type:div|class:form-group mt-3",  //abrindo div que irá envolver o input
						"type:label|for:celular|value:Celular|obrigatorio:*", //Label do input
						//input tel
						"type:tel|name:celular|id:celular|label:Celular|obrigatorio:*|pattern:\([0-9]{2}\)[0-9]{5}-[0-9]{4}$|title:Preencha esse campo com o número do seu celular|placeholder:(00)00000-0000|class:form-control required",
					"type:div", //fechando a div que envolve o input

					"type:div|class:form-group mt-3",  //abrindo div que irá envolver o input
						"type:label|for:data_nascimento|value:Data de nascimento|obrigatorio:*", //Label do input
						//input date
						"type:date|name:data_nascimento|id:data_nascimento|maxlength:10|min:1940-01-01|max:2020-12-04|obrigatorio:*|value:|pattern:[0-9]{2}\/[0-9]{2}\/[0-9]{4}$|title:Preencha esse campo com a sua data de nascimento|placeholder:|div-class:form-group mt-3|class:form-control required",
					"type:div",	//fechando a div que envolve o input				

					"type:div|class:form-group mt-3",  //abrindo div que irá envolver o input
						"type:label|for:sexo|value:Sexo|obrigatorio:*", //Label do input
						//input select
						"type:select|name:sexo|id:sexo|options:Selecione-Selecione F-Feminino M-Masculino|class:form-control required",
					"type:div", //fechando a div que envolve o input

					"type:div|class:form-group mt-3",  //abrindo div que irá envolver o input
						"type:label|for:mensagem|value:Mensagem|obrigatorio:*", //Label do input
						//textearea
						"type:textarea|name:mensagem|id:mensagem|class:form-control required|placeholder:Escreva a sua mensagem|title:Escreva a sua mensagem",
					"type:div", //fechando a div que envolve o input


					//Parágrafo
					"type:p|class:paragrafo-form|value:Selecione uma opção*",

					"type:div|class:form-check",  //abrindo div que irá envolver o input
						//input radio
						"type:radio|name:item|id:servico|value:1|title:Serviço|class:form-check-input required-radio",
						"type:label|for:servico|value:Serviço|class:form-check-label", //Label do input
					"type:div",	//fechando a div que envolve o input 

					"type:div|class:form-check", //abrindo div que irá envolver o input	
					    //input radio									
						"type:radio|name:item|id:desenvolvimento|value:2|title:Desenvolvimento|class:form-check-input required-radio",
						"type:label|for:desenvolvimento|value:Desenvolvimento|class:form-check-label", //Label do input
					"type:div",	//fechando a div que envolve o input 	

					"type:div|class:form-check",  //abrindo div que irá envolver o input
						//input radio
						"type:radio|name:item|id:suporte|value:3|title:Suporte|class:form-check-input required-radio",
						"type:label|for:suporte|value:Suporte|class:form-check-label", //Label do input					
					"type:div",	//fechando a div que envolve o input 


					//Parágrafo
					"type:p|class:paragrafo-form mt-4|value:Informe como prefere ser informado sobre nossas novidades*",
					
					"type:div|class:form-check",  //abrindo div que irá envolver o input
					    //input checkbox
						"type:checkbox|name:contatoEmail|id:contatoEmail|value:1|checked:|label:E-mail|title:Contato por e-email|class:form-check-input required-checkbox",	
						"type:label|for:contatoEmail|value:Desejo receber novidades por e-mail|class:form-check-label", //Label do input
					"type:div",	//fechando a div que envolve o input

					"type:div|class:form-check",  //abrindo div que irá envolver o input
					    //input checkbox
						"type:checkbox|name:contatoSms|id:contatoSms|value:2|title:Contato por SMS|class:form-check-input required-checkbox",	
						"type:label|for:contatoSms|value:Desejo receber novidades por SMS|class:form-check-label", //Label do input
					"type:div",	//fechando a div que envolve o input								

					
					"type:div|class:form-group mt-3",  //abrindo div que irá envolver o input
						//input color
						"type:label|for:cor|value:Clique para selecionar uma cor*", //Label do input
						"type:color|name:cor|id:cor|value:#8B008B|class:form-control cor",
					"type:div",	//fechando a div que envolve o input

					"type:div|class:alert alert-warning mt-4",
					"type:p|value:Esse é apenas um exemplo de como criar um formulário dinâmico.<br>- Não há validação de dados;<br>- Não foi criada a página seguinte a essa para receber e processar os dados.",
					"type:div",

					//Input submit	
					"type:submit|name:enviar|id:enviar|value:Enviar|class:btn btn-success btn-lg btn-block mt-4 mb-4",

						];

				
				use Src\{FormFacadeClass};				
				$formulario = new FormFacadeClass($dados_form);
				
			?>


		</div>	
	</div>	

</main>

</body>
</html>