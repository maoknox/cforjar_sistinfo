<?php
/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class LoginForm extends CFormModel
{
	public $nombreusuario;
	public $claveusr;
	//public $rememberMe;
	public $cedulaUsr;
	private $_identity;

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			// username and password are required
			array('nombreusuario, claveusr', 'required'),
			// password needs to be authenticated
			array('claveusr', 'authenticate','claveusr'=>$this->claveusr),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	/*public function attributeLabels()
	{
		return array(
			'rememberMe'=>'Remember me next time',
		);
	}*/

	/**
	 * Authenticates the password.
	 * This is the 'authenticate' validator as declared in rules().
	 */
	public function authenticate($attribute,$params)
	{
		if(!$this->hasErrors())
		{
			$this->_identity=new UserIdentity($this->nombreusuario,$this->claveusr);
			if(!$this->_identity->authenticate())
				$this->addError('claveusr','Nombre o clave de usuario incorrecta.');
		}
	}

	/**
	 * Logs in the user using the given username and password in the model.
	 * @return boolean whether login is successful
	 */
	public function login()
	{
		if($this->_identity===null)
		{
			$this->_identity=new UserIdentity($this->nombreusuario,$this->claveusr);
			$this->_identity->authenticate();
		}
		if($this->_identity->errorCode===UserIdentity::ERROR_NONE)
		{	
			//Yii::app()->getSession()->add('cedula',$this->_identity->cedula);
			$duration=30; // 30 segs
			Yii::app()->user->login($this->_identity,$duration);
			
			return true;
		}
		else
			return false;
	}
}
