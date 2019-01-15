<?php if ($this->method == 'edit'): ?>
	<section class="lead text-success">
    	<?php echo sprintf(lang('avisos:edit'), $aviso->titulo) ?>
	</section>
<?php else: ?>
	<section class="lead text-success">
    	<?php echo lang('avisos:create') ?>
	</section>
<?php endif ?>
<section class="item">
	<div class="content">
        <?php echo form_open($this->uri->uri_string(),'id="frm" ');?>
        
           	<div class="form_inputs">	
            		
                    
                    
                    <div class="form-group">
                        <label><span class="required">*</span> Titulo:</label>
                        
                               
                              
                               <?=form_input('titulo',$aviso->titulo,'class="input-large form-control"')?>
                               <?=form_error('titulo','<span class="error">','</span>')?>
                        
                    </div>
                    <div class="form-group">
                        <label><span class="required">*</span> Descripción:</label>
                                <textarea rows="6" name="descripcion" class="form-control" ng-non-bindable><?=$aviso->descripcion?></textarea>
                               
                               <?=form_error('descripcion','<span class="error">','</span>')?>
                        
                   </div>
                   <div class="row"> 
                       <div class="col-sm-6">
                             <div class="form-group">
                                <label><span class="required">*</span> Tipo:</label>
                            
                            	<?=form_dropdown('tipo',array('aviso'=>'Aviso','circular'=>'Circular','memorandun'=>'Memorandun'),$aviso->tipo,'class="form-control"');?>
                            </div>
                            <div class="form-group">
                                <label><span class="required">*</span> Clase:</label>
                                
                                	<?=form_input('class',$aviso->class,'class="form-control"');?>
                                    <p class="help-block">Clase css para el badge</p>
                                
                            </div>
                       </div>
                   
                   
                       <div class="col-sm-6">
                            <div class="form-group ">
                            <label><span class="required">*</span> Publicar:</label>
                            
                            	<?=form_dropdown('publicar',array('0'=>'No','1'=>'Si'),$aviso->publicar,'class="form-control"');?>
                            </div>
                       </div>
                   </div>
                
            </div>
         <div class="divider"></div>
         <div class="buttons float-right padding-top">
			<?php $this->load->view('admin/partials/buttons', array('buttons' => array('save', 'cancel') )) ?>
		 </div>
        <?php echo form_close();?>
    </div>
 </section>