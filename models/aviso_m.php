<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Aviso_m extends MY_Model {

	private $folder;

	public function __construct()
	{
		parent::__construct();
		$this->_table = 'avisos';
		
	}
	/*function create($post=array())
	{
		return $this->insert(array(
					'titulo'     => $post['titulo'],
					'descripcion'=> $post['descripcion'],
					//'created_on' => now(),
					'publicar'   => $post['publicar']
				));
	}*/
	/*function update($id,$post=array())
	{
		return parent::update($id,array(
					'titulo'     => $post['titulo'],
					'descripcion'=> $post['descripcion'],
					
					'publicar'   => $post['publicar']
				));
	}*/
}
?>