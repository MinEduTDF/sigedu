<div class="col-md-6">
		<div class="unit">
		   	   <span class="id"><span class="glyphicon glyphicon-file"></span> <b>ID:</b> <?php echo $alumno['Alumno']['id']; ?></span><br/>
		       <span class="name"><span class="glyphicon glyphicon-user"></span> <b>Nombre:</b> <?php echo $alumno['Alumno']['apellido'].' '.$alumno['Alumno']['primerNombre']; ?></span><br/>
		       <span class="text"><span class="glyphicon glyphicon-earphone"></span> <b>Tel:</b> <?php echo $alumno['Alumno']['telefono']; ?></span><br/>
		       <span class="text"><span class="glyphicon glyphicon-envelope"></span> <b>Email:</b> <?php echo $this->Html->link($alumno['Alumno']['email'],'mailto:'.$alumno['Alumno']['email']); ?></span><br/>
		       <span class="text"><span class="glyphicon glyphicon-map-marker"></span> <b>Ciudad:</b> <?php echo $alumno['Alumno']['ciudad']; ?></span><br/>
		       <!--<span class="link"><?php echo $this->Html->link(__('Eliminar'), array('action' => 'delete', $alumno['Alumno']['id']), null, sprintf(__('Esta seguro que desea borrar al alumno %s?'), $alumno['Alumno']['apellido'])); ?></span>-->
		       <div class="text-right">
			   <span class="link"><?php echo $this->Html->link('Editar', array('controller' => 'alumnos', 'action' => 'edit', $alumno['Alumno']['id']), array('class' => 'btn btn-danger')); ?></span>
			   <span class="link"><?php echo $this->Html->link('Ver', array('controller' => 'alumnos', 'action' => 'view', $alumno['Alumno']['id']), array('class' => 'btn btn-success')); ?></span>
			   </div>
		</div>
</div>