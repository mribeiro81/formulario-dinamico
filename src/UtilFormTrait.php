<?php
namespace Src;

trait UtilFormTrait
{
	
	public function preparaArray(array $dados_form)
	{

		$array_retornar= [];
		foreach ($dados_form as $value) {
			$dados_campo = explode("|",$value);
			
			$array_campo= [];			
			foreach ($dados_campo as $campo) {	
				
				$item_config = explode(":",$campo);		
				$array_campo[$item_config[0]] = $item_config[1];
			}

			$array_retornar[] = $array_campo;
			
		}

		return $array_retornar;
	}


	public function verificaParametros(array $dados_obrigatorios, array $dados)
	{
	
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
			throw new Exception($html);
		}

	}

	
	public function organizaParametros(array $dados, $dados_omitir = "")
	{		

		if(is_array($dados_omitir)){					
			$dados = array_diff($dados,	$dados_omitir);
		}	

		$parametros="";
		foreach ($dados as $key => $value) {	
			$parametros.= ' '.strtolower($key).'="'.strtolower($value).'"';				
		}

		return substr($parametros,1);

	} 


}
