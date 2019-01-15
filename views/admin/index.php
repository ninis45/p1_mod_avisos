<section class="title">
	<h4><?php echo $module_details['name'] ?></h4>
</section>

<section class="item">
	<div class="content">
        <?php if($items):?>
        <table   class="table table-striped" summary="catalogos"  width="100%">
             <thead>
                 <tr>
                   <th width="3%">
                   		<label>
                        <?php echo  form_checkbox(array(
                                    
                                    'class'=>'check-all',
                                    'ng-model' => 'checked_all'
                                    ));?>
                                 <span class="lbl"></span>	
                        </label>
                   </th>
                   <th width="">Titulo</th>
                 
                   
                   <th width="8%">Publicar</th>
                   <th width="14%">Acciones</th>
                 </tr>
            </thead>
            <tbody> 
              <?php foreach($items as $row){?>      	
              <tr class="row-table">
                  <td align="center" class="center">
                  	 
                      <?php echo  form_checkbox(array(
                                  
                                  'name'=>'action_to[]',
                                  'value'=>$row->id,
                                  'ng-checked' => 'checked_all'
                                  
                            ));
                 
                      ?>	
                      	 
                     	
                   </td>
                  
                   <td><?=$row->titulo?></td>
                   
                   <td class="center <?=$row->publicar?'':'text-danger'?>">
                    
                    	<?=$row->publicar?'Si':'No'?>
                         
                       
                   </td>
                   <td class="center">
                        <?php echo anchor('admin/avisos/delete/'.$row->id, lang('buttons:delete'), 'class="button" confirm-action') ?> |
                        <?php echo anchor('admin/avisos/edit/'.$row->id, lang('buttons:edit'), 'class="button edit"') ?>
                   </td>
             </tr>
             <?php }?>
          </tbody>
        </table>
        <?php else:?>
        <section class="no_data">
        				<?php echo lang('global:not_found');?>
        </section>
        <?php endif;?>
    </div>
</section>
