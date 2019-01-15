<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Plugin_Avisos extends Plugin
{
	function listing()
	{
		$limit=$this->attribute('limit','4');
		$result=$this->db->limit($limit,0)
                ->where('publicar','1')
				->get('avisos')->result();
	
		foreach($result  as &$row)
		{
			
			
			$row->url=base_url('avisos/details/'.$row->id);
		
		}
		return $result;
	}
}

/* End of file Plugin_video.php */