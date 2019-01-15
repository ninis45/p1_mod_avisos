<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin extends Admin_Controller {
	protected $section='avisos';
	protected $error=array();
	protected $file_data=false;
	public function __construct()
	{
		parent::__construct();
		
		$this->template->set_breadcrumb('Avisos','avisos');
		$this->load->model('aviso_m');
		$this->lang->load('avisos');
		$this->rules =$this->template->rules= array(
			
			array(
				'field' => 'titulo',
				'label' => 'Titulo',
				'rules' => 'trim|required'
				),
		    array(
				'field' => 'descripcion',
				'label' => 'Descripcion',
				'rules' => 'trim|required'
				),
			array(
				'field' => 'publicar',
				'label' => 'Publicar',
				'rules' => 'required'
				),
   	        array(
				'field' => 'tipo',
				'label' => 'Tipo',
				'rules' => 'trim|required'
				),
            array(
				'field' => 'class',
				'label' => 'Clase',
				'rules' => 'trim'
				)
		);
		
	}
	function index(){
		$items=$this->aviso_m->get_all();
		
		$this->template->title($this->module_details['name'])
			->set('items',$items)
			//->append_js('module::banner.js')
			->build('admin/index');
	}
	
	function create()
	{
		
		
		role_or_die('avisos','create');
		$aviso=new StdClass();
        
        // Get the blog stream.
		/*$this->load->driver('Streams');
		$stream = $this->streams->streams->get_stream('banner', 'banner');
		$stream_fields = $this->streams_m->get_stream_fields($stream->id, $stream->stream_namespace);
        
        $banner_validation = $this->streams->streams->validation_array($stream->stream_slug, $stream->stream_namespace, 'new');
        
        */
        $this->form_validation->set_rules($this->rules);
		
				
		if($this->form_validation->run())
		{
			unset($_POST['btnAction']);
			
			
			$post = $this->input->post();
            
			$extra = array(
					'titulo'     => $post['titulo'],
					'descripcion'=> $post['descripcion'],
					'tipo'       => $post['tipo'],
					'publicar'   => $post['publicar']
			);
			if($id = $this->aviso_m->insert($extra)){
				
				$this->session->set_flashdata('success','El aviso  ha sido agregado satisfactoriamente');
				
			}else{
				$this->session->set_flashdata('error','Error al tratar de guardar los datos del aviso');
				
			}
			redirect('admin/avisos');
		}
		foreach ($this->rules as $rule)
		{
			$aviso->{$rule['field']} = $this->input->post($rule['field']);
		}
		
		$this->template->set_partial('buttons','partials/buttons',array('buttons'=>array('create','cancel')))
			->title($this->module_details['name'],'Agregar aviso')
			->set_breadcrumb('Agregar aviso','aviso/agregar')
			->set('aviso',$aviso)
			
			->build('admin/form');
	}
	function delete($id=0)
	{
		role_or_die('avisos', 'delete');
		$ids = ($id) ?array(0=>$id) : $this->input->post('action_to');
		
		/*if($this->aviso_m->delete_many($ids))
		{
			$this->session->set_flashdata('success','El aviso ha sido eliminado satisfactoriamente');
			redirect('admin/avisos');
		}
		else
		{
			$this->session->set_flashdata('error','Error al tratar de eliminar el aviso');
			redirect('admin/avisos');
		}*/
        
        
		
        if ( ! empty($ids))
		{
		  
   	        foreach ($ids as $id)
			{
				// Get the current page so we can grab the id too
				if ($aviso = $this->aviso_m->get($id))
				{
				    
                    //Files::delete_file($aviso->portada);
                    $this->aviso_m->delete($id);
                    $deletes[]=$aviso->titulo;
                }
            }
        }
        if ( ! empty($deletes))
		{
		    $this->session->set_flashdata('success', sprintf(lang('avisos:delete_success'), implode('", "', $deletes)));
        }
        else
        {
            $this->session->set_flashdata('error',lang('avisos:delete_error'));
        }
        redirect('admin/avisos');
	}
	function edit($id=0)
	{
		if(!$aviso= $this->aviso_m->get($id))
		{
			$this->session->set_flashdata('error', 'Los datos del banner no se encuentran disponibles o fue borrada');
			redirect('admin/avisos');
		}
		
		$this->form_validation->set_rules($this->rules);
		
		if($this->form_validation->run()){
			unset($_POST['btnAction']);			
			
			$post = $this->input->post();
            
			$extra = array(
					'titulo'     => $post['titulo'],
					'descripcion'=> $post['descripcion'],
					
					'publicar'   => $post['publicar']
			);
			
			if($this->aviso_m->update($id, $post))
            {
				$this->session->set_flashdata('success','El aviso ha sido modificado satisfactoriamente');
				redirect('admin/avisos');
			}
            else
            {
				$this->session->set_flashdata('error','Error al tratar de guardar los cambios al banner');
				redirect('admin/avisos/edit/'.$aviso->Id);
			}
		}
		
		$this->template->title($this->module_details['name'],'Modificar banner')
			->set_partial('buttons','partials/buttons',array('buttons'=>array('save','cancel')))
			->set('aviso',$aviso)
			->set_breadcrumb('Modificar aviso','aviso/modificar/'.$id)
			
			->build('admin/form');
	}
	
	
}
?>