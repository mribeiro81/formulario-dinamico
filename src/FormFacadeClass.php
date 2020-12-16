<?php
namespace Src;

use Src\ValidaFormClass;

Class FormFacadeClass
{
	
	public function __construct(array $dados_form)
	{			
		
		$valida = new ValidaFormClass();
		$form_class = new FormClass();
		echo $form_class->render($valida, $dados_form);

	}
}