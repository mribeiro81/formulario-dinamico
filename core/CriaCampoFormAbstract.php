<?php
namespace Core;

abstract class CriaCampoFormAbstract
{

	protected function verificaParametros($dados_obrigatorios,$dados)
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
	
	protected function form($dados){

		$dados_obrigatorios= ["action","method","name","id","enctype"];
		$this->verificaParametros($dados_obrigatorios,$dados);

		$input_class = !empty($dados["input-class"]) ?  "class='".$dados["input-class"]."'" : "";
		$autocomplete = !empty($dados["autocomplete"]) ?  "autocomplete='".$dados["autocomplete"]."'" : "";
		$target = $dados["target"] != "" ? "target='".$dados["target"]."'" : "";

		$html = "<form action='".$dados["action"]."' method='".$dados["method"]."' ".$autocomplete." ".$target." ".$input_class." enctype='".$dados["enctype"]."' name='".$dados["name"]."' id='".$dados["id"]."'>\n";

		return $html;

	}
	

	protected function button($dados){

		$dados_obrigatorios=[];
		$dados_obrigatorios= ["value","name","id"]; 
		$this->verificaParametros($dados_obrigatorios,$dados);

		$div_class = !empty($dados["div-class"]) ? "class='".$dados["div-class"]."'" : "";
		$input_class = !empty($dados["input-class"]) ?  "class='".$dados["input-class"]."'" : "";

		$thml="";
		if(!empty($dados["texto"]) && !empty($dados["tag-texto"])){ 
			$tag_class = !empty($dados["class-texto"]) ? "class='".$dados["class-texto"]."'" : "";
			$tag = str_replace(" ","", $dados["tag-texto"]);
			$html.= "\t\t\t<".$tag." ".$tag_class.">".$dados["texto"]."</".$tag.">\n";
		}

		$html.= "\t\t\t<div".$div_class.">\n";
		$html.= "\t\t\t<button type='button' name='".$dados["name"]."' id='".$dados["id"]."' ".$input_class.">".$dados['value']."</button>\n";
		$html.= "\t\t\t</div>\n";

		return $html;

	}


	protected function submit($dados){

		$dados_obrigatorios=[];
		$dados_obrigatorios= ["value","name","id"]; 
		$this->verificaParametros($dados_obrigatorios,$dados);

		$div_class = !empty($dados["div-class"]) ? "class='".$dados["div-class"]."'" : "";
		$input_class = !empty($dados["input-class"]) ?  "class='".$dados["input-class"]."'" : "";

		$thml="";
		if(!empty($dados["texto"]) && !empty($dados["tag-texto"])){ 
			$tag_class = !empty($dados["class-texto"]) ? "class='".$dados["class-texto"]."'" : "";
			$tag = str_replace(" ","", $dados["tag-texto"]);
			$html.= "\t\t\t<".$tag." ".$tag_class.">".$dados["texto"]."</".$tag.">\n";
		}

		$html.= "\t\t\t<div".$div_class.">\n";
		$html.= "\t\t\t<input type='submit' name='".$dados["name"]."' id='".$dados["id"]."' ".$input_class." value='".$dados['value']."'>\n";
		$html.= "\t\t\t</div>\n";

		return $html;

	}


	/*
		O método coringa cria os seguintes campos input
		=> text, email, password, date, file, search, url e Week
		Fiz dessa forma porque esses iputs aceitam os mesmo parâmetros, mudando apenas o type

	*/
	protected function coringa($dados)
	{	
		$dados_obrigatorios=[];
	    $dados_obrigatorios= $dados["type"] != 'hidden' ? ["label","name","id"] :  ["name","id"];
		$this->verificaParametros($dados_obrigatorios,$dados);

		$div_class = !empty($dados["div-class"]) ? "class='".$dados["div-class"]."'" : "";
		$label_class = !empty($dados["label-class"]) ? "class='".$dados["class-label"]."'" : "";
		$input_class = !empty($dados["input-class"]) ?  "class='".$dados["input-class"]."'" : "";
		$placeholder = !empty($dados["placeholder"]) ?  "placeholder='".ucfirst($dados["placeholder"])."'" : "";
		$size = !empty($dados["size"]) ?  "size='".$dados["size"]."'" : "";
		$maxlength = !empty($dados["maxlength"]) ?  "maxlength='".$dados["maxlength"]."'" : "";
		$title = !empty($dados["title"]) ?  "title='".ucfirst($dados["title"])."'" : "";
		$value = !empty($dados["value"]) ?  "value='".$dados["value"]."'" : "";	
		$pattern = !empty($dados["pattern"]) ?  "pattern='".$dados["pattern"]."'" : "";	
		$min = !empty($dados["min"]) ?  "min='".$dados["min"]."'" : "";	
		$max = !empty($dados["max"]) ?  "max='".$dados["max"]."'" : "";
		$accept = !empty($dados["accept"]) && $dados["type"] == 'file' ?  "accept='".$dados["accept"]."'" : "";

		$inputs_exibir_placeholder = ['text', 'email', 'tel', 'password', 'search', 'url'];
		$placeholder = in_array($dados["type"],$inputs_exibir_placeholder) ? $placeholder : "";

		$inputs_exibir_maxlength = ['text', 'email', 'password', 'search', 'url'];
		$maxlength = in_array($dados["type"],$inputs_exibir_maxlength) ? $maxlength : "";

		$inputs_exibir_pattern = ['text', 'email', 'tel', 'password'];
		$pattern = in_array($dados["type"],$inputs_exibir_pattern) ? $pattern : "";

		$min_e_max = $dados["type"] == 'date' ? $min." ".$max : "";
		
		$thml="";
		if(!empty($dados["texto"]) && !empty($dados["tag-texto"])){ 
			$tag_class = !empty($dados["class-texto"]) ? "class='".$dados["class-texto"]."'" : "";
			$tag = str_replace(" ","", $dados["tag-texto"]);
			$html.= "\t\t\t<".$tag." ".$tag_class.">".$dados["texto"]."</".$tag.">\n";
		}

		$html.= "\t\t\t<div ".$div_class.">\n";
		$html.= "\t\t\t\t<label for='".$dados["label"]."' ".$label_class.">".ucfirst($dados["label"]).$dados["obrigatorio"]."</label>\n";
		$html.= "\t\t\t\t<input type='".$dados['type']."' name='".$dados["name"]."' ".$accept." ".$min_e_max." ".$pattern." ".$maxlength." ".$input_class." ".$placeholder." ".$title." ".$value." id='".$dados["id"]."'>\n";
		$html.= "\t\t\t</div>\n";			

		return $html;

	}

	protected function textarea($dados)
	{	
		$dados_obrigatorios=[];
		$dados_obrigatorios= ["label","name","id"];
		$this->verificaParametros($dados_obrigatorios,$dados);

		$div_class = !empty($dados["div-class"]) ? "class='".$dados["div-class"]."'" : "";
		$label_class = !empty($dados["label-class"]) ? "class='".$dados["class-label"]."'" : "";
		$input_class = !empty($dados["input-class"]) ?  "class='".$dados["input-class"]."'" : "";
		$placeholder = !empty($dados["placeholder"]) ?  "placeholder='".ucfirst($dados["placeholder"])."'" : "";
		$maxlength = !empty($dados["maxlength"]) ?  "maxlength='".$dados["maxlength"]."'" : "";		
		$title = !empty($dados["title"]) ?  "title='".ucfirst($dados["title"])."'" : "";
		$rows = !empty($dados["rows"]) ?  "rows='".$dados["rows"]."'" : "";
		$cols = !empty($dados["cols"]) ?  "cols='".$dados["cols"]."'" : "";

		$thml="";		
		if(!empty($dados["texto"]) && !empty($dados["tag-texto"])){ 
			$tag_class = !empty($dados["class-texto"]) ? "class='".$dados["class-texto"]."'" : "";
			$tag = str_replace(" ","", $dados["tag-texto"]);
			$html.= "\t\t\t<".$tag." ".$tag_class.">".$dados["texto"]."</".$tag.">\n";
		}

		$html.= "\t\t\t<div ".$div_class.">\n";
		$html.= "\t\t\t\t<label for='".$dados["label"]."' ".$label_class.">".ucfirst($dados["label"]).$dados["obrigatorio"]."</label>\n";
		$html.= "\t\t\t\t<textarea type='textarea' id='".$dados["id"]."' ".$rows." ".$cols." ".$input_class." ".$maxlength." ".$placeholder." ".$title." name='".$dados["name"]."'></textarea>\n";
		$html.= "\t\t\t</div>\n";		

		return $html;

	}

	protected function select($dados)
	{	
		$dados_obrigatorios=[];
		$dados_obrigatorios= ["label","name","id","options"];
		$this->verificaParametros($dados_obrigatorios,$dados);

		$div_class = !empty($dados["div-class"]) ? "class='".$dados["div-class"]."'" : "";
		$label_class = !empty($dados["label-class"]) ? "class='".$dados["class-label"]."'" : "";
		$input_class = !empty($dados["input-class"]) ?  "class='".$dados["input-class"]."'" : "";
		$title = !empty($dados["title"]) ?  "title='".ucfirst($dados["title"])."'" : "";


		$thml="";		
		if(!empty($dados["texto"]) && !empty($dados["tag-texto"])){ 
			$tag_class = !empty($dados["class-texto"]) ? "class='".$dados["class-texto"]."'" : "";
			$tag = str_replace(" ","", $dados["tag-texto"]);
			$html.= "\t\t\t<".$tag." ".$tag_class.">".$dados["texto"]."</".$tag.">\n";
		}

		$html.= "\t\t\t<div ".$div_class.">\n";
		$html.= "\t\t\t\t<label for='".$dados["label"]."' ".$label_class.">".ucfirst($dados["label"]).$dados["obrigatorio"]."</label>\n";
		$html.= "\t\t\t\t<select name='".$dados["name"]."' id='".$dados["id"]."' ".$input_class." ".$title.">\n";		
		$options = explode(" ", $dados["options"]);
		foreach ($options as $option) {
			$option = explode("-",$option);
			$html.= "\t\t\t\t<option value='".$option[0]."'>".ucfirst($option[1])."</option>\n";
		}
		$html.= "\t\t\t\t</select>\n";
		$html.= "\t\t\t</div>\n";	

		return $html;

	}

	
	protected function radioCheckbox($dados)
	{

		$dados_obrigatorios= ["label","name","id"];
		$this->verificaParametros($dados_obrigatorios,$dados);

		$div_class = !empty($dados["div-class"]) ? "class='".$dados["div-class"]."'" : "";
		$label_class = !empty($dados["label-class"]) ? "class='".$dados["label-class"]."'" : "";
		$input_class = !empty($dados["input-class"]) ?  "class='".$dados["input-class"]."'" : "";
		$checked = !empty($dados["checked"]) ?  "checked='".$dados["checked"]."'" : "";
		$title = !empty($dados["title"]) ?  "title='".ucfirst($dados["title"])."'" : "";
		$value = !empty($dados["value"]) ?  "value='".$dados["value"]."'" : "";
		
		$html="";
		if(!empty($dados["texto"]) && !empty($dados["tag-texto"])){ 
			$tag_class = !empty($dados["class-texto"]) ? "class='".$dados["class-texto"]."'" : "";
			$tag = str_replace(" ","", $dados["tag-texto"]);
			$html.= "\t\t\t<".$tag." ".$tag_class.">".$dados["texto"].$dados["obrigatorio"]."</".$tag.">\n";
		}

		$html.= "\t\t\t<div ".$div_class.">\n";		
		$html.= "\t\t\t\t<input type='".$dados["type"]."' name='".$dados["name"]."' id='".$dados["id"]."' ".$input_class." ".$title." ".$value." ".$checked.">\n";
		$html.= "\t\t\t\t<label for='".$dados["id"]."' ".$label_class.">&nbsp;".ucfirst($dados["label"])."</label>\n"; 	  
		$html.= "\t\t\t</div>\n";


		return $html;	

	}	


}