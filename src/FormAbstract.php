<?php
namespace Src;

abstract class FormAbstract
{
	
	use UtilFormTrait;

	protected function form(array $dados){
		
		$dados_obrigatorios= ["action","method","id"];
		$this->verificaParametros($dados_obrigatorios,$dados);
		$dados = $this->valida->valida($dados);		
		$parametros = $this->organizaParametros($dados);

		$html = "<form ".$parametros.">\n";

		return $html;

	}
	

	protected function label(array $dados){

		$dados_obrigatorios= ["for","value"]; 
		$this->verificaParametros($dados_obrigatorios,$dados);
		$dados_omitir = ["for" => $dados["for"], "value" => $dados["value"]];
		$parametros = $this->organizaParametros($dados, $dados_omitir);
		
		$html = "\t\t\t\t<label ".$parametros." for=".trim($dados["for"]).">&nbsp;".trim(ucfirst($dados["value"])).$dados["obrigatorio"]."</label>\n";		

		return $html;
	}

	
	protected function coringa(array $dados)
	{	
		$dados_obrigatorios=[];
	    $dados_obrigatorios= (($dados["type"] == "submit") || ($dados["type"] == "button")) ? ["name","id","value"] : ["name","id"];
		$this->verificaParametros($dados_obrigatorios,$dados);
		$dados = $this->valida->valida($dados);
		$parametros = $this->organizaParametros($dados,"");
		
		$html= "\t\t\t\t<input type=".strtolower(trim($dados["type"]))." ".$parametros.">\n";					

		return $html;
	}	


	protected function textarea(array $dados)
	{	
		$dados_obrigatorios=[];
		$dados_obrigatorios= ["name","id"];
		$this->verificaParametros($dados_obrigatorios,$dados);
		$dados = $this->valida->valida($dados);
		$parametros = $this->organizaParametros($dados);
		
		$html= "\t\t\t\t<textarea type=\"textarea\" ".$parametros."></textarea>\n";	

		return $html;

	}


	protected function select(array $dados)
	{	
		$dados_obrigatorios=[];
		$dados_obrigatorios= ["name","id","options"];		
		$this->verificaParametros($dados_obrigatorios,$dados);
		$dados = $this->valida->valida($dados);

		$parametros = $this->organizaParametros($dados);
		
		$html.= "\t\t\t\t<select ".$parametros.">\n";		
		$options = explode(" ", $dados["options"]);
		foreach ($options as $option) {
			$option = explode("-",$option);
			$html.= "\t\t\t\t<option value='".trim($option[0])."'>".trim(ucfirst($option[1]))."</option>\n";
		}
		$html.= "\t\t\t\t</select>\n";			

		return $html;
	}	


	protected function div(array $dados) 
	{

		if(count($dados) > 1){
			$dados = $this->valida->valida($dados);
			$parametros = $this->organizaParametros($dados,"");

			if(!empty($parametros)){
				$html = "\t\t\t<div ".$parametros.">\n";
			}else{
				$html = "\t\t\t<div>\n";
			}
			return $html;
		}
		return "\t\t\t</div>\n";
	}


	protected function paragrafoESpan(array $dados) 
	{
		$dados_obrigatorios= [];
		$parametros = $this->organizaParametros($dados);
		$dados_omitir = ["value" => $dados["value"]];		
		$parametros = $this->organizaParametros($dados, $dados_omitir);	
		$dados = $this->valida->valida($dados);		

		$html = "\t\t\t<".strtolower(trim($dados["type"]))." ".$parametros.">".$dados["value"]."</".trim($dados["span"]).">\n";
		return $html;
	}


	protected function inputsMetodoCoringa()
	{

		return ['submit', 'button', 'text', 'radio', 'checkbox', 'hidden', 'email', 'tel', 'number', 'password', 'date', 'file', 'range', 'color', 'reset' , 'week', 'image', 'month', 'time', 'datetime-local', 'search', 'url'];
	}

}