<?php
namespace Core;

trait CriaArrayTrait{
	
	public static function geraArray($dados_form)
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

}