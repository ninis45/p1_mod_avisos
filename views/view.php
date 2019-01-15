<div class="container">
    <div class="row">
        <div class="col-md-4">
            <header><h2>Otros avisos</h2></header>
            
            <ul class="features-description">
                <?php foreach($avisos as $row){?>
                <li><a href="<?=base_url('avisos/details/'.$row->id)?>"><?=$row->titulo?></a></li>
                <?php }?>
                               
            </ul>
        </div>
        <div class="col-md-8">
            <header><h2><?=$aviso->titulo?></h2></header>
            <div class="content_aviso">
                <?=$aviso->descripcion?>
            </div>
            
        </div>
    	
    </div>
</div>