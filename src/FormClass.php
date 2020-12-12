<?php
namespace Src;

use Src\FormAbstract;

class FormClass extends FormAbstract
{
	protected $valida;	
	
	public function render(ValidaFormClass $valida, $dados_form)
	{

		$this->valida = $valida;
		$dados_form = parent::preparaArray($dados_form);		
		$html = $this->htmlForm($dados_form);

		echo $html;
	}


	protected function htmlForm(array $dados_form){

		$inputs_metodo_coringa = parent::inputsMetodoCoringa();

		$html1="";
		$html2="";
		$html3="";		
		foreach ($dados_form as $campo) 
		{				
			switch (strtolower($campo['type'])) {
				
				case 'form':
						$html1.= parent::form($campo);
					break;					

				case 'label':
						$html2.= parent::label($campo);
					break;										

				case (in_array(strtolower($campo['type']), $inputs_metodo_coringa)):
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
					die("Erro: Tipo do campo não informado para o método htmlForm da classe FormClass.");
					exit();
			}
			
		}	

		$html = $html1.$html2.$html3;
		$html.= "\t\t\t</form>"; //Fechando o form

		return $html;	
	}

	
}


