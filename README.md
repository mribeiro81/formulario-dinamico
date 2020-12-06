SOBRE ESSE DIRETÓRIO
====================

### Aqui consta um pacote que pode ser utilizado para criar formulário de forma dinâmica.

#### Tipos suportados:
 
- form => para definir o formulário  
- button
- submit
- text
- textarea
- select
- radio
- checkbox
- tel
- email
- password
- file
- hidden
- number
- image
- month
- range
- reset
- color
- search
- date
- datetime-local
- time
- url
- week

**Observação: Alguns inputs HTML5 não são suportados pelos browsers, verifique antes de utilizar.**

**Além de inputs de formulário, é possível criar:**   
- div     
Pode ser utilizada para criar div para envolver o input do formulário.      
Opcionalmente, pode ser utilizada para criar uma div para envovler um atributo &#60;p>.     
Ao utilizar a tag div, você deve abrir, passar atributos necessários(class, id) e depois fechá-la.   
Veja exemplos no array de exemplo **$dados_form**.    
- p   
Pode ser utilizado para inserir um parágrafo antes ou depois do input do formulário.   
É possível passar atributos como class e id. Não é necessário fechar da tag p.     
- span   
Pode ser inserido antes ou depois do input do formulário.   
É possível passar atributos como class e id para o span.     
Não é necessário fechar tag span.    


#### Informações sobre como os atributos devem ser passados no array:

Cada item do array deve ser composto por <chave:valor|>:    
- chave: é o identificador    
- (:) dois pontos: é o separador entre a chave e o valor    
- valor: é o valor a ser associado a chave. Pode passar mais de um valor em parâmetros onde fizer sentido, como por exemplo duas ou mais classes para um input ou uma div.    
- (|) pipe: é o separador entre um atributo e outro	    			

**Adicione os itens no array na ordem em que você deseja que seja exibido no formulário.**  

**Todos os itens do array devem conter o tipo do atributo que será criado.**  

**Exemplo 1**      
"**type:form**|action:gravar.php|method:post|name:frmContato|id:frmContato",  

**Exemplo 2**     
"**type:p**|class:paragrafo-form mt-4|value:Informe como prefere ser informado sobre nossas novidades",  

**Exemplo 3**    
"**type:div**|class:form-group mt-3", //abrindo div que irá envolver o input  
"**type:div**", //fechando a div 

**Exemplo 4**    
"**type:label**|for:sexo|value:Sexo|obrigatorio:*", //Label do input  

**Exemplo 5**    
"**type:select**|name:sexo|id:sexo|**options**:*Selecione-Selecione F-Feminino M-Masculino*|class:form-control required",      


**Não deve haver espaço entre a chave e o valor, exceto se o parâmetro possuir mais de um valor, como é o caso de classes e options de input select.**     

**Exemplos**        
**&#60;chave:valor|>** => modo aceito      
**&#60;chave:valor1 valor2 valor3|>** => modo aceito SOMENTE para classes e options     
**&#60;options:Selecione-Selecione F-Feminino M-Masculino>** => Exemplo de como devem ser passadas as options de input select     

**Você pode passar qualquer valor que seja válido, ou seja, de acordo com o suportado pelo campo input ou tag a ser criado**

**No momento de passar os atributos, você deve se perguntar:**   

**- Quais atributos esse input ou tag suporta?**

**Atributos mais comuns utilizados**
- name
- id
- value
- placeholder
- title
- pattern
- checked
- readonly
- class
- id

		
#### Exemplo prático para utilização:

Crie um array no seguinte formato, listando os campos que você deseja no formulário.  

Criei um array grande, para que possa ver a utilização prática de campos input, div, p.


$dados_form= [

	//Exemplo de como criar a tag form
	"type:form|action:gravar.php|method:post|name:frmContato|id:frmContato",

	//inut hidden
	"type:hidden|name:token|id:token|value:".md5(date("Y-m-d h:i:s"))."",


	"type:div|class:form-group mt-3", //abrindo div que irá envolver o input
		"type:label|for:nome|value:Nome|obrigatorio:*", //Label do input
		//input text
		"type:text|name:nome|id:nome|class:form-control required|placeholder:Informe o seu nome|title:Informe o seu nome", 
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
	"type:p|class:paragrafo-form|value:Selecione uma opção",

	"type:div|class:form-check",  //abrindo div que irá envolver o input
		//input radio
		"type:radio|name:item|id:servico|value:1|title:Serviço|class:form-check-input required-radio",
		"type:label|for:servico|value:Serviço|class:form-check-label|obrigatorio:*", //Label do input
	"type:div",	//fechando a div que envolve o input 

	"type:div|class:form-check", //abrindo div que irá envolver o input	
	    //input radio									
		"type:radio|name:item|id:desenvolvimento|value:2|title:Desenvolvimento|class:form-check-input required-radio",
		"type:label|for:desenvolvimento|value:Desenvolvimento|class:form-check-label|obrigatorio:*", //Label do input
	"type:div",	//fechando a div que envolve o input 	

	"type:div|class:form-check",  //abrindo div que irá envolver o input
		//input radio
		"type:radio|name:item|id:suporte|value:3|title:Suporte|class:form-check-input required-radio",
		"type:label|for:suporte|value:Suporte|class:form-check-label|obrigatorio:*", //Label do input					
	"type:div",	//fechando a div que envolve o input 


	//Parágrafo
	"type:p|class:paragrafo-form mt-4|value:Informe como prefere ser informado sobre nossas novidades",
	
	"type:div|class:form-check",  //abrindo div que irá envolver o input
	    //input checkbox
		"type:checkbox|name:contatoEmail|id:contatoEmail|value:1|checked:|label:E-mail|title:Contato por e-email|class:form-check-input required-checkbox",	
		"type:label|for:contatoEmail|value:Desejo receber novidades por e-mail|class:form-check-label|obrigatorio:*", //Label do input
	"type:div",	//fechando a div que envolve o input

	"type:div|class:form-check",  //abrindo div que irá envolver o input
	    //input checkbox
		"type:checkbox|name:contatoSms|id:contatoSms|value:2|title:Contato por SMS|class:form-check-input required-checkbox",	
		"type:label|for:contatoSms|value:Desejo receber novidades por SMS|class:form-check-label|obrigatorio:*", //Label do input
	"type:div",	//fechando a div que envolve o input								

	
	"type:div|class:form-group mt-3",  //abrindo div que irá envolver o input
		//input color
		"type:label|for:cor|value:Clique para selecionar uma cor", //Label do input
		"type:color|name:cor|id:cor|value:#A52A2A|class:form-control cor",
	"type:div",	//fechando a div que envolve o input

	//Input submit	
	"type:submit|name:enviar|id:enviar|value:Enviar|class:btn btn-primary btn-lg btn-block mt-4 mb-5",    
];


**use Core&#92;{CriaArrayTrait,GeraFormularioClass};**  

**$dados_form = CriaArrayTrait::geraArray($dados_form);**  
**$formulario = new GeraFormularioClass();**  
**$formulario->render($dados_form);**   

  



  

