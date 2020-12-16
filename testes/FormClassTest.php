<?php
namespace Src;
use PHPUnit\Framework\TestCase;

class FormClassTest extends TestCase
{
	
	public function testaMetodoRenderHtmlRetornadoInputRadio()
	{
		
		$dados_form= ["type:radio|name:item|id:suporte|value:3|title:Suporte|class:form-check-input required-radio"];		
				
		$form_class = new \Src\FormClass();		
		
		$this->expectOutputString("".($form_class->render(new \Src\ValidaFormClass(), $dados_form))."");		
		print '				<input type="radio" name="item" id="suporte" value="3" title="suporte" class="form-check-input required-radio">
			</form>';

    }

    public function testaMetodoRenderHtmlRetornadoButton()
	{
		
		$dados_form= ["type:button|name:enviar|id:enviar|value:Enviar|title:Enviar|class:btn btn-success btn-lg btn-block mt-4 mb-4"];		
				
		$form_class = new \Src\FormClass();		
		
		$this->expectOutputString("".($form_class->render(new \Src\ValidaFormClass(), $dados_form))."");		
		print '				<input type="button" name="enviar" id="enviar" class="btn btn-success btn-lg btn-block mt-4 mb-4">
			</form>';

    } 

    /**
     * @expectedExceptionMessage InvalidArgumentException
     */
    public function testaMetodoRenderHtmlRetornadoSelectSemOption()
	{
		
		$dados_form= ["type:select|name:sexo|id:sexo|title:Informe o seu gênero|class:btn btn-success btn-lg btn-block mt-4 mb-4"];		
				
		$form_class = new \Src\FormClass();		
		
		$this->expectExceptionMessage(Exception::class);
		$this->expectOutputString("".($form_class->render(new \Src\ValidaFormClass(), $dados_form))."");		
		print '';

    }

    public function testaMetodoRenderHtmlRetornadoSelectComOptions()
	{
		
		$dados_form= ["type:select|name:sexo|id:sexo|title:Informe o seu genero|options:Selecione-Selecione F-Feminino M-Masculino|class:form-control required"];
				
		$form_class = new \Src\FormClass();		
		
		$this->expectOutputString("".($form_class->render(new \Src\ValidaFormClass(), $dados_form))."");		
		print '				<select name="sexo" id="sexo" title="informe o seu genero" class="form-control required">
				<option value="Selecione">Selecione</option>
				<option value="F">Feminino</option>
				<option value="M">Masculino</option>
				</select>
			</form>';
    }  


    public function testaMetodoRenderHtmlRetornadoDiv()
	{
		
		$dados_form= ["type:div|class:form-group mt-3"];
				
		$form_class = new \Src\FormClass();		
		
		$this->expectOutputString("".($form_class->render(new \Src\ValidaFormClass(), $dados_form))."");		
		print '			<div class="form-group mt-3">
			</form>';
    } 


    public function testaMetodoRenderHtmlRetornadoParagrafo()
	{
		
		$dados_form= ["type:p|class:mt-3|value:Esse é um teste de parágrafo"];
				
		$form_class = new \Src\FormClass();		
		
		$this->expectOutputString("".($form_class->render(new \Src\ValidaFormClass(), $dados_form))."");		
		print '			<p class="mt-3">Esse é um teste de parágrafo</p>
			</form>';
    }


    /**
     * @expectedExceptionMessage InvalidArgumentException
     */
    public function testaMetodoRenderHtmlRetornadoTextareaExceptionFaltandoId()
	{
		
		$dados_form= ["type:textarea|name:mensagem|class:form-control required|placeholder:Escreva a sua mensagem|title:Escreva a sua mensagem"];
				
		$form_class = new \Src\FormClass();			

		$this->expectExceptionMessage(Exception::class);
		$this->expectOutputString("".($form_class->render(new \Src\ValidaFormClass(), $dados_form))."");		
		print '				<textarea type="textarea" name="mensagem" class="form-control required" placeholder="escreva a sua mensagem" title="escreva a sua mensagem"></textarea>
			</form>';
    } 


    public function testaMetodoRenderHtmlRetornadoTextarea()
	{
		
		$dados_form= ["type:textarea|name:mensagem|id:mensagem|class:form-control required|placeholder:Escreva a sua mensagem|title:Escreva a sua mensagem"];
				
		$form_class = new \Src\FormClass();			

		$this->expectOutputString("".($form_class->render(new \Src\ValidaFormClass(), $dados_form))."");		
		print '				<textarea type="textarea" name="mensagem" id="mensagem" class="form-control required" placeholder="escreva a sua mensagem" title="escreva a sua mensagem"></textarea>
			</form>';
    }


    public function testaMetodoRenderHtmlRetornadoLabel()
	{
		
		$dados_form= ["type:label|for:cor|value:Clique para selecionar uma cor*"];
				
		$form_class = new \Src\FormClass();			

		$this->expectOutputString("".($form_class->render(new \Src\ValidaFormClass(), $dados_form))."");		
		print '				<label  for="cor">&nbsp;Clique para selecionar uma cor*</label>
			</form>';
    }   

	
}


