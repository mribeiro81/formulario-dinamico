<?php
namespace Core;

use Core\CriaCampoFormAbstract;

class GeraFormularioClass extends CriaCampoFormAbstract
{
	
	public function render($dados_form)
	{

		if(count($dados_form) < 1){
			echo "O método render() da classe GeraFormulario precisa receber como parâmetro um array válido.";
			exit();
		}

		$html1="";
		$html2="";
		$html3="";
		$inputs_metodo_radioCheckbox = ['radio','checkbox'];
		$inputs_metodo_coringa = ['text', 'hidden', 'email', 'tel', 'password', 'date', 'file', 'search', 'url'];
		
		foreach ($dados_form as $campo) 
		{			
			
			switch ($campo['type']) {
				
				case 'form':
						$html1.= $this->form($campo);
					break;

				case 'button':
						$html3.= $this->button($campo);
					break;

				case 'submit':
						$html3.= $this->submit($campo);
					break;								

				case (in_array($campo['type'], $inputs_metodo_coringa)):
						$html2.= $this->coringa($campo);
					break;

				case (in_array($campo['type'], $inputs_metodo_radioCheckbox)):
						$html2.= $this->radioCheckbox($campo);
					break;		
				
				case 'textarea':
						$html2.= $this->textarea($campo);
					break;

				case 'select':
						$html2.= $this->select($campo);
					break;

				default:
					echo "Erro: Tipo do campo não informado.";
					exit();
			}

			
		}	

		$html = $html1.$html2.$html3;
		$html.= "\t\t\t</form>"; //Fechando o form
		echo $html;	

	}
	
}


