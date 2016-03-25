<!-- app/View/Users/index.ctp -->
<div class="users form">
<!-- start main -->
<div class="TituloSec">Administracion de Usuarios</div>
<div id="ContenidoSec">
<div class="row">
  <div class="col-xs-12 col-sm-10 col-md-12">
     <div id="second-nav">
			 <div class="unit text-center">
			 	  	  <span class="link"><?php echo $this->Html->link('AGREGAR', array('action' => 'add'), array('class' => 'btn btn-info')); ?></span>
			 </div>
     </div>
             <div class="unit text-center">
			   <?php echo $this->element('formSearch_user'); ?>
             </div>   
 <div class="table-responsive">
  <table class="table table-condensed">
    <thead>
		<tr>
			<th><?php echo $this->Form->checkbox('all', array('name' => 'CheckAll',  'id' => 'CheckAll')); ?></th>
			<th><?php echo $this->Paginator->sort('username', 'Usuario');?>  </th>
			<th><?php echo $this->Paginator->sort('role','Rol');?></th>
			<th><?php echo $this->Paginator->sort('email', 'E-Mail');?></th>
   			<th><?php echo $this->Paginator->sort('puesto', 'Puesto');?></th>
			<!--<th><?php echo $this->Paginator->sort('centro_id', 'Centro');?></th>-->
            <th><?php echo $this->Paginator->sort('empleado_id', 'Agente');?></th>
            <th><?php echo $this->Paginator->sort('created', 'Creado');?></th>
			<th><?php echo $this->Paginator->sort('modified','Modificado');?></th>
			<th><?php echo $this->Paginator->sort('status','Estado');?></th>
			<th>Acciones</th>
		</tr>
	</thead>
	<tbody>						
		<?php $count=0; ?>
		<?php foreach($users as $user): ?>				
		<?php $count ++;?>
		<?php if($count % 2): echo '<tr>'; else: echo '<tr class="zebra">' ?>
		<?php endif; ?>
			<td><?php echo $this->Form->checkbox('User.id.'.$user['User']['id']); ?></td>
			<td><?php echo $this->Html->link( $user['User']['username']  ,   array('action'=>'edit', $user['User']['id']),array('escape' => false) );?></td>
			<td style="text-align: center;"><?php echo $user['User']['role']; ?></td>
			<td style="text-align: center;"><?php echo $this->Html->link($user['User']['email'], 'mailto:'.$user['User']['email']); ?></td>
            <td style="text-align: center;"><?php echo $user['User']['puesto']; ?></td>
            <!--<td style="text-align: center;"><?php echo $user['User']['centro_id']; ?></td>-->
            <td style="text-align: center;"><?php echo $this->Html->link($user['User']['empleado_id'], array('controller' => 'empleados', 'action' => 'view', $user['User']['empleado_id'])); ?></td>
			<td style="text-align: center;"><?php echo $this->Html->formatTime($user['User']['created']); ?></td>
			<td style="text-align: center;"><?php echo $this->Html->formatTime($user['User']['modified']); ?></td>
			<td style="text-align: center;"><?php echo $user['User']['status']; ?></td>
			<td >
   		     <span class="link"><?php echo $this->Html->link('Editar', array('action' => 'edit', $user['User']['id']), array('class' => 'btn btn-warning')); ?></span>
			<?php
				if( $user['User']['status'] != 0){ 
			?><span class="link"><?php echo $this->Html->link('Ver', array('action' => 'view', $user['User']['id']), array('class' => 'btn btn-default')); ?></span>
			  <span class="link"><?php echo $this->Html->link('Borrar', array('action' => 'delete', $user['User']['id']), array('confirm' => 'Está seguro de borrar a '.$user['User']['username'], 'class' => 'btn btn-danger')); ?></span>
	        <?php 
				} 
				else{
			?>		<span class="link"><?php echo $this->Html->link('Reactivar', array('action' => 'activate', $user['User']['id']), array('class' => 'btn btn-danger')); ?></span>
            <?php	}
			?>
			</td>
		</tr>
		<?php endforeach; ?>
		<?php unset($user); ?>
	</tbody>
</table>
</div>

<!--<div id="second-nav">

<!--<?php echo $this->Html->link( "Crear usuario",   array('action'=>'add'),array('escape' => false) ); ?>-->
<br/>
			 <div class="unit text-center">
			 	 <?php echo $this->element('pagination'); ?> 
			 </div>
         </div>
      </div>    
</div>