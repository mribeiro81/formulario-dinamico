<?php
namespace Src;

abstract class FormularioAbstract
{
	
	protected function form(array $dados){

		$dados_obrigatorios= ["action","method","id"];
		$this->verificaParametros($dados_obrigatorios,$dados);
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
		$parametros = $this->organizaParametros($dados,"");
		
		$html= "\t\t\t\t<input type=".trim($dados["type"])." ".$parametros.">\n";					

		return $html;
	}	


	protected function textarea(array $dados)
	{	
		$dados_obrigatorios=[];
		$dados_obrigatorios= ["name","id"];
		$this->verificaParametros($dados_obrigatorios,$dados);
		$parametros = $this->organizaParametros($dados);
		
		$html= "\t\t\t\t<textarea type=\"textarea\" ".$parametros."></textarea>\n";	

		return $html;

	}


	protected function select(array $dados)
	{	
		$dados_obrigatorios=[];
		$dados_obrigatorios= ["name","id","options"];
		$this->verificaParametros($dados_obrigatorios,$dados);
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


	protected function div(array $dados){

		if(count($dados) > 1){
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


	protected function paragrafoESpan(array $dados){
		
		$parametros = $this->organizaParametros($dados);
		$dados_omitir = ["value" => $dados["value"]];
		$parametros = $this->organizaParametros($dados, $dados_omitir);

		$html = "\t\t\t<".trim($dados["type"])." ".$parametros.">".$dados["value"]."</".trim($dados["span"]).">\n";
		return $html;
	}


	protected function verificaParametros(array $dados_obrigatorios, array $dados)
	{

		if(count($dados_obrigatorios) < 1 || count($dados) < 1 ){
			echo "O método verificaDados() da classe CriaCampoFormAbstract precisa receber como parâmetro arrays válidos.";
			exit();
		}		

		$html="";
		foreach($dados_obrigatorios as $key)
		{
			
			switch ($key) {
				case (!array_key_exists($key, $dados)):
					$html.="- O parâmetro {".$key."} precisa ser informado para criar o campo/input {".$dados['type']."}.\n";
					break;

				case (empty($dados[$key])):
					$html.="- O parâmetro {".$key."} não pode ser vazio para criar o campo/input {".$dados['type']."}.\n";
					break;	
				
			}
		}

		if(!empty($html)){
			echo $html;
			exit();
		}

	}

	
	protected function organizaParametros(array $dados, $dados_omitir = "")
	{
		if(count($dados) < 1 ){
			echo "O método organizaParametros() da classe CriaCampoFormAbstract precisa receber como parâmetro um array válido.";
			exit();
		}

		if(is_array($dados_omitir)){			
			$dados = array_diff($dados,	$dados_omitir);
		}

		$dados = array_diff($dados,[
				"type" => $dados["type"], 
				"options" => $dados["options"], 
				"obrigatorio" => $dados["obrigatorio"], 
				"Obrigatorio" => $dados["Obrigatorio"],
				"obrigatório" => $dados["obrigatório"],
				"Obrigatório" => $dados["Obrigatório"],
				]);			

		$parametros="";
		foreach ($dados as $key => $value) {	
			$parametros.= ' '.$key.'="'.$value.'"';				
		}

		return substr($parametros,1);

	}

}