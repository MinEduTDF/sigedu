<?php
/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       cake
 * @subpackage    cake.app
 */
App::uses('Controller', 'Controller');

class AppController extends Controller {

    // added the debug toolkit
	// sessions support
	// authorization for login and logut redirect
    public $components = array(
            'DebugKit.Toolbar',
			'RequestHandler',
			'Session',
		    'Auth' => array(
                        'loginRedirect' => array('controller' => 'users', 'action' => 'index'),
					    'logoutRedirect' => array('controller' => 'users', 'action' => 'login'),                        'authError' => 'Debe estar logueado para ver esta página.', 
					    'loginError' => 'Nombre de usuario o contraseña incorrectos, inténtelo                                         nuevamente.',
						'authorize' => array('Controller'),
			));

    // Allow the login controllers only
	public function beforeFilter() {
        $this->Auth->allow('login');
		$this->set('current_user', $this->Auth->user());
	}
	
    public function isAuthorized($user) {
		// Admin puede acceder a todo
		// Si no es así entonces se trata de un usuario común y lo redirigimos a otra página.
		// En este caso a la acción usuario del controller users

    	if ($user['status'] == 1 ) { if (isset($user['username']) == "usuario") { $this->redirect                                    ('usuario'); } } 

     		else { $this->Auth->logout(); $this->redirect('login'); }

    	return true;
	}

	/**
	* Recarga la página ubicando los valores de la matriz 'params[url]' 
	* dentro de la matriz 'params[named]'
	*/
	function redirectToNamed()
	{
		$urlArray = $this->params['url'];
		unset($urlArray['url']);
		if(!empty($urlArray))
		{
			$this->redirect($urlArray,null,true);
		}
	}
	
	/**
	* Recarga la página ubicando los valores de la matriz 'params[url]' 
	* dentro de la matriz 'params[named]'
	*/
	function ifActionIs($actions = array())
	{
		foreach($actions as $action)
		{
		   if($action == $this->params['action'])
		   {
			   return true;
		   }
		}
		return false;
	}
	
	
	/**
	* Devuelve el Id del último Ciclo cargado.  
	*/
	function getLastCicloId()
	{
	    $this->loadModel('Ciclo');
		$MaxCicloId = $this->Ciclo->find('first', array('order'=>'Ciclo.id DESC'));
	    return $MaxCicloId['Ciclo']['id'];
	}
}
