<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * The public controller for the Pages module.
 *
 * @author		PyroCMS Dev Team
 * @package		PyroCMS\Core\Modules\Pages\Controllers
 */
class Avisos extends Public_Controller
{
    public function __construct()
	{
		parent::__construct();
		$this->load->model('aviso_m');
        $this->template->set_breadcrumb('Avisos','avisos');
	}
    function details($id)
	{
	   
        
		if(!$aviso=$this->aviso_m->get($id))
		{
			return $this->template->build_json(array(
					'status'	=> false,
					'message'	=> 'El aviso no existe o fue borrada'));
		}
        
        $avisos = $this->aviso_m->where('publicar','1')
                ->where_not_in('id',$id)->get_all();
        
       	$this->input->is_ajax_request() AND  $this->template->set_layout('modal.html');
        
		$this->template->title($aviso->titulo)
             ->append_css('module::aviso.css')
			 ->set('aviso',$aviso)
             ->set('avisos',$avisos)
			->build($this->input->is_ajax_request()?'ajax/view':'view');
	}
}
?>