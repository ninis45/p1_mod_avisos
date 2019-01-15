<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Groups module
 *
 * @author PyroCMS Dev Team
 * @package PyroCMS\Core\Modules\Groups
 */
 class Module_Avisos extends Module
{

	public $version = '1.0';

	public function info()
	{
		$info= array(
			'name' => array(
				'en' => 'Ads',
				
				'es' => 'Avisos',
				
			),
			'description' => array(
				'en' => 'Information, news or warning which alerts someone of something.',
				
				'es' => 'Informacion, noticia o advertencia con la que se avisa a alguien de algo.',
				
			),
			'frontend' => false,
			'backend' => true,
			'menu' => 'content',
            'sections'=>array(
                'avisos'=>array(
                    'name'=>'avisos:title',
                    'uri' => 'admin/avisos',
        			'shortcuts' => array(
        				array(
        					'name' => 'avisos:create',
        					'uri' => 'admin/avisos/create',
        					'class' => 'btn btn-success'
        				),
        			)
                )
           )
		);
        
        /*if (function_exists('group_has_role'))
		{
			if(group_has_role('avisos', 'admin_avisos_fields'))
			{
			    
				$info['sections']['fields'] = array(
							'name' 	=> 'global:custom_fields',
							'uri' 	=> 'admin/avisos/fields',
							'shortcuts' => array(
									'create' => array(
										'name' 	=> 'streams:add_field',
										'uri' 	=> 'admin/avisos/fields/create',
										'class' => 'add'
										)
							)
				);
			}
		}*/
        
        
        return $info;
	}

	public function install()
	{
	    $this->dbforge->drop_table('avisos');

		$tables = array(
		    'avisos'=>array(
				'id' => array('type' => 'INT', 'constraint' => 11, 'auto_increment' => true, 'primary' => true,),
				'titulo' => array('type' => 'VARCHAR', 'constraint' => 100,),
				'descripcion' => array('type' => 'TEXT',  'null' => true,),
				'tipo' => array('type' => 'ENUM',  'constraint' => array('aviso'=>'aviso','memorandun'=>'memorandun'),),
				'publicar' => array('type' => 'INT', 'constraint' => 11, 'null' => true,'default'=>'0'),
            )
			
		);

        if ( ! $this->install_tables($tables))
		{
			return false;
		}
        return true;
        
		

		
	}

	public function uninstall()
	{
	  
        $this->dbforge->drop_table('avisos');
		return true;
	}

	public function upgrade($old_version)
	{
		return true;
	}

}