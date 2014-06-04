<?
	class HolaController extends Controller{
		
		public function actionIndex(){
		
			$saludo="Prueba yii";	
			$this->render("index",array("saludo"=>$saludo));
		}
		
		public function actionPrueba($id=null,$id=null){
			$vars=array('var1'=>$id,'var2'=>$id1);
			$this->render("prueba",$vars);
		}
	}

?>