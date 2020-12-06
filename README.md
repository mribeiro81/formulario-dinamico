SOBRE ESSE DIRETÓRIO
====================

### Aqui consta um pacote que pode ser utilizado para criar formulário de forma dinâmica.

#### Como utilizar:
Crie um array no seguinte formato, listando os campos que deseja no formulário:  

$dados_form= [  
"type:form|name:frmTeste|id:frmTeste|autocomplete:off|action:gravar.php|method:post|enctype:multipart/form-data|target:_self|input-class:mt-2",  
"type:submit|name:enviar|id:enviar|value:Enviar|input-class:btn btn-primary btn-lg btn-block mt-4 mb-5|texto:Ao clicar no botão, o formulário será submetido, mas, a paǵina de destino não foi criada.&#60;br>Você receberá a mensagem de página não encontrada.|tag-texto:div|class-texto:alert alert-warning mt-5|", 
"type:text|name:nome|id:nome|maxlength:30|label:Nome|obrigatorio:*|value:|pattern:[a-z\s]+$|title:Preencha esse campo com o seu nome|placeholder:Informe o seu nome|div-class:form-group mt-3|label-class:|input-class:form-control required|texto:|tag-texto:|class-texto:|",  
"type:text|name:sobrenome|id:sobrenome|maxlength:30|label:Sobrenome|obrigatorio:*|value:|pattern:[a-z\s]+$|title:Preencha esse campo com o seu sobrenome|placeholder:Informe o seu sobrenome|div-class:form-group mt-3|label-class:|input-class:form-control required|texto:|tag-texto:|class-texto:|",  
"type:textarea|name:menagem|id:mensagem|maxlength:120|label:Mensagem|obrigatorio:*|value:|title:Preencha esse campo com a sua mensagem|placeholder:Escreva a sua mensagem|div-class:form-group mt-3|label-class:|input-class:form-control required|texto:|tag-texto:|class-texto:|",  
"type:radio|name:itenServico|id:servico|value:1|checked:|label:Serviço|obrigatorio:*|title:Serviço|div-class:form-check|label-class:form-check-label|input-class:form-check-input required-radio|texto:Selecione uma opção|tag-texto:h5|class-texto:mt-4|",  
"type:radio|name:itenServico|id:desenvolvimento|value:2|checked:|label:Desenvolvimento|obrigatorio:*|title:Desenvolvimento|div-class:form-check|label-class:form-check-label|input-class:form-check-input required-radio|texto:|tag-texto:|class-texto:|",  
"type:radio|name:itenServico|id:suporte|value:3|checked:|label:Suporte|obrigatorio:*|title:Suporte|div-class:form-check|label-class:form-check-label|input-class:form-check-input required-radio|texto:|tag-texto:|class-texto:|", 
"type:checkbox|name:contatoEmail|id:contatoEmail|value:1|checked:|label:E-mail|obrigatorio:*|title:Contato por e-email|div-class:form-check|label-class:form-check-label|input-class:form-check-input required-checkbox|texto:Informe como prefere que façamos contato|tag-texto:h5|class-texto:mt-4|",  
];	  						


**use Core&#92;{CriaArrayTrait,GeraFormularioClass};**  

**$dados_form = CriaArrayTrait::geraArray($dados_form);**  
**$formulario = new GeraFormularioClass();**  
**$formulario->render($dados_form);**   

#### Tipos suportados:
- form: para configurar as tags de abertura e fechamento do formulário    
- button: para configurar botão do formulário  
- submit: para configurar botão do formulário   
- text 
- textearea
- radio  
- checkbox  
- select 
- file 
- hidden   
- email   
- tel   
- password   
- date 
- search   
- url  



#### Informações sobre como os parâmetros devem ser passados no array:

Cada item do array deve ser composto por <chave:valor|>:  
- chave: é o identificador  
- (:) dois pontos: é o separador entre a chave e o valor  
- valor: é o valor a ser associado a chave. Pode passar mais de um valor em parâmetros onde fizer sentido, como: &#60;div-class:>, &#60;label-class:>,   
&#60;input-class>, &#60;options:>. Verifique todas as opções em LISTA DE PARÂMETROS ACEITOS.  
- (|) pipe: é o separador entre um parâmetro e outro	  			

Chaves e valores podem ser omitidos na criação do array, no entanto, atente-se para não omitir dados essenciais, como: name, id entre outros.   
Exemplo de chaves e valores que podem ser omitidos: placeholder, title.  

A ordem dos parâmetros no array não interferem na criação do formulário.  

Não deve haver espaço entre a chave e o valor, exceto se o parâmetro possuir mais de um valor, como é o caso de classes e options.  
Exemplos:  
&#60;chave:valor|> => modo aceito  
&#60;chave:valor1 valor2 valor3|> => modo aceito SOMENTE para classes e options  
&#60;options:Selecione-Selecione F-Feminino M-Masculino> => Exemplo de como devem ser passadas as options  

Caso você precise inserir um texto antes do campo do formulário que você quer criar, utilize as tags  
&#60;texto:> Texto a ser exibido antes do campo do formulário  	  		
&#60;tag-texto:> É a tag que vai envolver o parâmetro &#60;texto:> mencionado acima. Aqui você pode inserir div, h1 ao h6, p etc    
&#60;class-texto:> Classe css para ser aplicada a &#60;tag-texto>, pode passar quantas classes precisar, basta dar espaço entre uma e outra>   
			

LISTA DE PARÂMETROS ACEITOS:  

Parâmetros  para criar &#60;type:form>.   
O asteríscro (*) indica que o parâmetro deve ser informado obrigatoriamente:  
- name*: O nome do elemento form a ser criado.   
- id*: O id do elemento form a ser criado.  
- action*: Informe aqui o endereço da página para a qual os dados do seu formulário deverão ser enviados.  
- method*: O método HTTP (get ou post) que o seu formulário utilizará para enviar dados para a página que processará os dados.   
- autocomplete: informe se o formulário pode utilizar o recurso de autocomplete. Valores: on, off  
- enctype: O tipo enctype do seu formulário. Exemplos: multipart/form-data, application/x-www-form-urlencoded. Esse valor será desconsiderado caso o typo do elemento a ser criado não seja do form. Se não for informado, o formulário assumirá o valor default.  
- target: O target do seu form. Exemplos de valores: _blank, _self, _parent, _top. Se não for informado, assumirá o target default.  	
- input-class: Sua classe para o formulário. Aqui você pode passar quantas classes quiser.  


Parâmetros  para criar &#60;type:button> e &#60;type:submit>.   
O asteríscro (*) indica que o parâmetro deve ser informado obrigatoriamente:  
- name*: O nome do elemento form a ser criado.   
- id*: O id do elemento form a ser criado.   
- value*: Valor do input. Como se trata da criação de um botão, será o label exibido no botão.  
- input-class: Sua classe para o botão. Aqui você pode passar quantas classes quiser.  
- texto: Informe aqui o texto a ser exibido antes do botão, caso necessário. Esse campo não é um label, deve ser utilizado para criar um título, texto explicativo antes do botão a ser criado.	  			
- tag-texto: Esse parâmetro possibilita criar uma tag html(p, h1 ao h6, div etc) para envolver o conteúdo do parâmetro &#60;texto:>. Esse parâmetro
deve ser informado, sempre que o parâmetro texto for utilizado.  
- class-texto: Informe aqui o nome da sua classe css para a tag html criada com a classe &#60;tag-texto:>  			


Parâmetros  para criar &#60;type:textarea>.   
O asteríscro (*) indica que o parâmetro deve ser informado obrigatoriamente:  
- name*: O nome do elemento form a ser criado.   
- id*: O id do elemento form a ser criado.  
- value: Valor do input.   
- label*: O label do input do formulário.  
- rows: Informe quantas linhas o textarea deverá ter. Esse valor pode ser omitido e a classe css &#60;input-class> pode definir o tamanho do textarea.  
- cols: Informe quantas colunas o textarea deverá ter. Esse valor pode ser omitido e a classe css &#60;input-class> pode definir o tamanho do textarea.  
- maxlength: Quantidade máxima de caracteres que o campo suporta.  
- placeholder: O placeholder do elemento form a ser criado.   
- title: O title do elemento form a ser criado.   
- div-class: Sua classe css para a div que envolve o input. Aqui você pode passar quantas classes quiser, inclusive classes que possam ser utilizadas como identificação para validação de dados posterior com JavaScript.  
- label-class: Sua classe css para o label do input.  
- input-class: Sua classe para o um input a ser criado. Aqui você pode passar quantas classes quiser, inclusive classes que possam ser utilizadas como identificação para validação de dados posterior com JavaScript.   
- texto: Informe aqui o texto a ser exibido antes do input. Esse campo não é um label, deve ser utilizado para criar um título, texto explicativo antes do campo input a ser criado.  				
- tag-texto: Esse parâmetro possibilita criar uma tag html(p, h1 ao h6, div etc) para envolver o conteúdo do parâmetro &#60;texto:>. Esse parâmetro
deve ser informado, sempre que o parâmetro texto for utilizado.  
- class-texto: Informe aqui o nome da sua classe css para a tag html criada com a classe &#60;tag-texto:>  				


Parâmetros  para criar &#60;type:text>, &#60;type:email>, &#60;type:tel>, &#60;type:password>, &#60;type:date>, &#60;type:file>, &#60;type:search>, &#60;type:url>.   
O asteríscro (*) indica que o parâmetro deve ser informado obrigatoriamente:  
- name*: O nome do elemento form a ser criado.   
- id*: O id do elemento form a ser criado.   
- value: Valor do input.   
- label*: O label do input do formulário.  
- accept: tipo de arquivo aceito em input file. Será desconsiderado, caso seja informado em campo que não seja input file.  
- pattern: Informe aqui a sua expressão regular para validar o campo. Será aplicado apenas em inputs text, email, tel e password. Nos demais campos, se informado será desconsiderado.  			
- maxlength: Quantidade máxima de caracteres que o campo suporta. Esse valor será desconsiderado, caso o elemento precise de maxlength.  
- placeholder: O placeholder do elemento form a ser criado. Esse valor será desconsiderado, caso o elemento precise de placeholder.  
- title: O title do elemento form a ser criado.  
- min: data mínima. Utilizado em campo &#60;type:date>. Se informado e o campo não for do tipo date, será desconsiderado  
- max: data máxima. Utilizado em campo &#60;type:date>. Se informado e o campo não for do tipo date, será desconsiderado  
- div-class: Sua classe css para a div que envolve o input. Aqui você pode passar quantas classes quiser, inclusive classes que possam ser utilizadas como identificação para validação de dados posterior com JavaScript.  
- label-class: Sua classe css para o label do input.  
- input-class: Sua classe para o um input a ser criado. Aqui você pode passar quantas classes quiser, inclusive classes que possam ser utilizadas como identificação para validação de dados posterior com JavaScript.  
- texto: Informe aqui o texto a ser exibido antes do input. Esse campo não é um label, deve ser utilizado para criar um título, texto explicativo antes do campo input a ser criado.  				
- tag-texto: Esse parâmetro possibilita criar uma tag html(p, h1 ao h6, div etc) para envolver o conteúdo do parâmetro &#60;texto:>. Esse parâmetro
deve ser informado, sempre que o parâmetro texto for utilizado.  
- class-texto: Informe aqui o nome da sua classe css para a tag html criada com a classe &#60;tag-texto:>  				


Parâmetros  para criar &#60;type:select>.   
O asteríscro (*) indica que o parâmetro deve ser informado obrigatoriamente:  
- name*: O nome do elemento form a ser criado.   
- id*: O id do elemento form a ser criado.   
- label*: O label do input do formulário.  
- options*: As opções para o campo do tipo select. Exemplo: &#60;options:Selecione-Selecione F-Feminino M-Masculino>				
- title: O title do elemento form a ser criado.  
- div-class: Sua classe css para a div que envolve o input. Aqui você pode passar quantas classes quiser, inclusive classes que possam ser utilizadas como identificação para validação de dados posterior com JavaScript.  
- label-class: Sua classe css para o label do input.  
- input-class: Sua classe para o um input a ser criado. Aqui você pode passar quantas classes quiser, inclusive classes que possam ser utilizadas como identificação para validação de dados posterior com JavaScript.   
- texto: Informe aqui o texto a ser exibido antes do input. Esse campo não é um label, deve ser utilizado para criar um título, texto explicativo antes do campo input a ser criado.  				
- tag-texto: Esse parâmetro possibilita criar uma tag html(p, h1 ao h6, div etc) para envolver o conteúdo do parâmetro &#60;texto:>. Esse parâmetro
deve ser informado, sempre que o parâmetro texto for utilizado.  
- class-texto: Informe aqui o nome da sua classe css para a tag html criada com a classe &#60;tag-texto:>  


Parâmetros  para criar &#60;type:radio> ou &#60;type:checkbox>.   
O asteríscro (*) indica que o parâmetro deve ser informado obrigatoriamente:  
- name*: O nome do elemento form a ser criado.   
- id*: O id do elemento form a ser criado.   
- value: Valor do input.   
- label*: O label do input do formulário.  
- checked: informe se o seu input deve ser marcado como checado. Exemplo: &#60;checked:checked>	  						
- title: O title do elemento form a ser criado. Esse valor será desconsiderado, caso o elemento a ser criado não seja um campo input.  
- div-class: Sua classe css para a div que envolve o input. Aqui você pode passar quantas classes quiser, inclusive classes que possam ser utilizadas como identificação para validação de dados posterior com JavaScript.  
- label-class: Sua classe css para o label do input.  
- input-class: Sua classe para o um input a ser criado. Aqui você pode passar quantas classes quiser, inclusive classes que possam ser utilizadas como identificação para validação de dados posterior com JavaScript.  
- texto*: Informe aqui o texto a ser exibido antes do input. Esse campo não é um label, deve ser utilizado para criar um título, texto explicativo antes do campo input a ser criado.  				
- tag-texto*: Esse parâmetro possibilita criar uma tag html(p, h1 ao h6, div etc) para envolver o conteúdo do parâmetro &#60;texto:>. Esse parâmetro
deve ser informado, sempre que o parâmetro texto for utilizado.  
- class-texto: Informe aqui o nome da sua classe css para a tag html criada com a classe &#60;tag-texto:>  

