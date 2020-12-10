<?php
namespace Src;

use Src\FormularioAbstract;

class FormularioClass extends FormularioAbstract
{
	
	public function render(array $dados_form)
	{

		parent::verificaArray($dados_form, "render");
		$dados_form = $this->preparaArray($dados_form);		
		$html = $this->htmlForm($dados_form);

		echo $html;
	}


	protected function htmlForm(array $dados_form){

		parent::verificaArray($dados_form, "htmlForm");
		$inputs_metodo_coringa = parent::inputsMetodoCoringa();

		$html1="";
		$html2="";
		$html3="";		
		foreach ($dados_form as $campo) 
		{				
			switch ($campo['type']) {
				
				case 'form':
						$html1.= parent::form($campo);
					break;					

				case 'label':
						$html2.= parent::label($campo);
					break;										

				case (in_array($campo['type'], $inputs_metodo_coringa)):
						$html2.= parent::coringa($campo);
					break;					
				
				case 'textarea':
						$html2.= parent::textarea($campo);
					break;

				case 'select':
						$html2.= parent::select($campo);
					break;

				case 'div':
						$html2.= parent::div($campo);
					break;

				case ('p' || 'span'):
						$html2.= parent::paragrafoESpan($campo);
					break;	

				default:
					echo "Erro: Tipo do campo não informado.";
					exit();
			}
			
		}	

		$html = $html1.$html2.$html3;
		$html.= "\t\t\t</form>"; //Fechando o form

		return $html;	
	}


	protected function preparaArray(array $dados_form)
	{

		parent::verificaArray($dados_form, "preparaArray");

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


