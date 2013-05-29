<?php namespace app\modules\content\controllers; 
use app\modules\content\models\Field;
/** 
* @author Sun < taichiquan@outlook.com >
*/
class SiteController extends \app\core\AuthController
{ 
	function init(){
		parent::init();
		$this->active = array('content','content.site.index');
	}
	public function actionCreate()
	{  
		$this->view->title = __('create content type');
		$model = new Field();
	 	$model->scenario = 'all';
		if ($this->populate($_POST, $model) && $model->validate()) { 
		 	$model->save();
		 	flash('success',__('create sucessful'));
			refresh();
		} 
		echo $this->render('form', array(
		   'model' => $model,
		   'name'=>'content', 
		));
	}
	public function actionUpdate($id)
	{  
		$this->view->title = __('update content type') ."#".$id;
		$model = Field::find($id);
	 	$model->scenario = 'all';
		if ($this->populate($_POST, $model) && $model->validate()) { 
		 	$model->save();
		 	flash('success',__('update sucessful'));
			refresh();
		} 
		echo $this->render('form', array(
		   'model' => $model, 
		   'name'=>'content',
		));
	}
	public function actionDelete($id){
		if($_POST['action']==1){
			 
			$model = Field::find($id); 
			$model->delete();
			echo json_encode(array('id'=>array($id),'class'=>'alert-success','message'=>__('delete success')));
			exit;
		} 
	}
	public function actionIndex()
	{    
		$rt = \app\core\Pagination::run('\app\modules\content\models\Field','active');  
 		
		echo $this->render('index', array(
		   'models' => $rt->models,
		   'pages' => $rt->pages,
		));
	}

	 
}
