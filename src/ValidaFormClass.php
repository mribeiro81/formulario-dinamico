<?php
namespace Src;

Class ValidaFormClass
{
	
	public function valida(array $dados)
	{
		
		$parametros_aceitos = [];
		switch (strtolower($dados['type'])) {
			case 'form':
				$parametros_aceitos = ["name", "id", "class", "action", "method", "target", "enctype", "autocomplete"];
				break;

			case 'label':
				$parametros_aceitos = ["id", "class", "type", "for"];
				break;	
			
			case 'div':
				$parametros_aceitos = ["id", "class", "type", "value"];
				break;

			case 'p':
				$parametros_aceitos = ["id", "class", "type", "value"];
				break;

			case 'span':
				$parametros_aceitos = ["id", "class", "type", "value"];
				break;	

			case 'submit':
				$parametros_aceitos = ["type", "name", "id", "value", "class" , "autofocus", "defaultChecked", "defaultValue", 
				"disabled", "form", "type"];				
				break;
				
			case 'button':
				$parametros_aceitos = ["type", "name", "id", "value", "class" , "autofocus", "defaultChecked", "defaultValue", 
				"disabled", "form", "type"];
				break;	

			case 'text':
				$parametros_aceitos= ["class", "id", "autocomplete", "autofocus", "defaultValue", "disabled", "form", "list", "maxlength", 
				 "name", "pattern", "placeholder", "readonly", "required", "size", "title", "type", "value"];
				break;
				
			case 'radio':
				$parametros_aceitos= ["class", "id", "disabled", "autofocus", "checked", "defaultChecked", "defaultValue", "form", "name", 
				"required", "title", "type", "value"];
				break;
				
			case 'checkbox':
				$parametros_aceitos= ["class", "id", "disabled", "autofocus", "checked", "defaultChecked", "defaultValue", "indeterminate", "form", "name", 
				"required", "title", "type", "value"];
				break;

			case 'hidden':
				$parametros_aceitos = ["type", "name", "id", "value", "class", "disabled", "form", "maxlength", "name", "readonly", "required", 
				"size", "title", "type", "value"];				
				break;

			case 'email':
				$parametros_aceitos= ["class", "id", "autocomplete", "autofocus", "defaultValue", "disabled", "form", "list", "multiple",
				"maxlength", "minlength", "name", "pattern", "placeholder", "readonly", "required", "size", "title", "type", "value"];
				break;	

			case 'tel':
				$parametros_aceitos= ["class", "id", "autocomplete", "autofocus", "disabled", "form", "maxlength", 
				"name", "pattern", "placeholder", "readonly", "required", "size", "title", "type", "value"];
				break;

			case 'number':
				$parametros_aceitos= ["class", "id", "autocomplete", "autofocus", "defaultValue", "disabled", "form", "list", "max", "min",
				"name", "pattern", "placeholder", "readonly", "required", "step", "title", "type", "value"];
				break;	
				
			case 'password':
				$parametros_aceitos= ["class", "id", "autocomplete", "autofocus", "disabled", "form", "maxlength", "minlength", 
				"name", "pattern", "placeholder", "readonly", "required", "size", "title", "type", "value"];
				break;
				
			case 'date':
				$parametros_aceitos= ["class", "id", "autocomplete", "autofocus", "disabled", "defaultValue", "form", "list", "max", "min", 
				"name", "pattern", "placeholder", "readonly", "required", "step", "title", "type", "value"];
				break;

			case 'file':
				$parametros_aceitos= ["class", "id", "accept", "autofocus", "disabled", "defaultValue", "files", "form", "multiple", 
				"list", "name", "placeholder", "readonly", "required", "title", "type", "value"];
				break;	

			case 'range':
				$parametros_aceitos= ["class", "id", "autocomplete", "autofocus", "disabled", "defaultValue", "form", "list",  
				"list", "max", "min", "name", "step", "title", "type", "value"];
				break;
				
			case 'color':
				$parametros_aceitos= ["class", "id", "autocomplete", "autofocus", "disabled", "defaultValue", "form", "list",  
				"list", "title", "type", "value"];
				break;
				
			case 'reset':
				$parametros_aceitos = ["type", "name", "id", "value", "class" , "autofocus", "defaultChecked", "defaultValue", 
				"disabled", "form", "type"];
				break;
				
			case 'week':
				$parametros_aceitos= ["class", "id", "defaultValue",  "max", "min", "name", "placeholder", "readonly", "required", 
				"step", "title", "type", "value"];
				break;
				
			case 'image':
				$parametros_aceitos= ["class", "id", "alt", "autofocus", "defaultValue", "disabled", "form",  "formAction", "formEnctype", 
				"formMethod", "formNoValidate", "formTarget", "height", "src", "name", "placeholder", "readonly", "required", 
				"width", "title", "type", "value"];
				break;	

			case 'month':
				$parametros_aceitos= ["class", "id", "autocomplete", "autofocus", "disabled", "defaultValue", "form", "list", "max", "min", 
				"name", "pattern", "placeholder", "readonly", "required", "step", "title", "type", "value"];
				break;	

			case 'time':
				$parametros_aceitos= ["class", "id", "autocomplete", "autofocus", "disabled", "defaultValue", "form", "list", "max", "min", 
				"name", "pattern", "placeholder", "readonly", "required", "step", "title", "type", "value"];
				break;
				
			case 'datetime-local':
				$parametros_aceitos= ["class", "id", "autocomplete", "autofocus", "disabled", "defaultValue", "form", "list", "max", "min", 
				"name", "pattern", "placeholder", "readonly", "required", "step", "title", "type", "value"];
				break;	

			case 'search':
				$parametros_aceitos= ["class", "id", "autocomplete", "autofocus", "disabled", "defaultValue", "form", "list", "maxLength",  
				"name", "pattern", "placeholder", "readonly", "required", "size", "title", "type", "value"];
				break;
				
			case 'url':
				$parametros_aceitos= ["class", "id", "autocomplete", "autofocus", "disabled", "defaultValue", "form", "list", "maxLength",  
				"name", "pattern", "placeholder", "readonly", "required", "size", "title", "type", "value"];
				break;

			case 'select':
				$parametros_aceitos= ["class", "id", "autofocus", "disabled", "form", "options", 
				"multiple", "name", "readonly", "required", "title", "type", "value"];
				break;	

			case 'textarea':
				$parametros_aceitos= ["class", "id", "autofocus", "cols", "defaultValue", "disabled", "form", "maxLength", "placeholder",   
				"name", "readonly", "required", "rows", "wrap", "title", "type", "value"];
				break;		
				
			default:
				die("Type informado é inválido para o método valida da classe ValidaFormClass.");
				break;
		}		

		return $this->removeParametrosNaoAceitos($dados, $parametros_aceitos);

	}

	
	public function removeParametrosNaoAceitos(array $dados, array $parametros_aceitos)
	{
				
		$dados_omitir = [];
		foreach ($dados as $key => $value) {		
			
			if(!in_array(strtolower($key), $parametros_aceitos)){
				$dados_omitir[$key] = $value;
			}
		}		
		
		$dados = array_diff($dados, $dados_omitir);		

		return $dados;

	}

}