<?php namespace app\modules\content\widget\input; 

/**
* 
* @author Sun < mincms@outlook.com >
*/
class Widget extends \app\modules\content\Widget
{  
 	
	function run(){  
		 $name = $this->name;  
 		 echo $this->form->field($this->model,$name)->textInput(); 
	}
}