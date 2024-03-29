 <!-- Content Header (Page header) -->
<section class="content-header">  
	<h1>
		Modulo Administracion
	</h1>
	<ol class="breadcrumb">
		<li><a href="index.php"><i class="fa fa-dashboard"></i> Inicio</a></li>           
	    <li class="active">Personal</li>
	</ol>
</section>

<section class="content">
	<div class="row">
		<div class="col-xs-12">
	  		<div class="box">
	    		<div class='box-header with-border'>
	      			<h3 class='box-title'><i class="fa fa-briefcase"></i> Lista de Alumnos</h3> 
	      			<a class="btn btn-sm btn-primary pull-right" href="?c=Alumno&a=v_Registrar"> Nuevo Alumno</a>
	    		</div>
	    		<div class="box-body box-body_table">
	    		 <?php  $alumno = $this->Listar();  ?>
                  	<table id="TablaEntidad" class="table table-bordered table-hover dataTable no-footer" width="100%">
	                    <thead>
	                      	<tr>                      
		                    	<th>ID</th>                    
	
			                    <th style="vertical-align: middle;">Nombres y Apellidos</th>
								<th style="vertical-align: middle;">Curso</th>
								<th style="vertical-align: middle;">Carrera</th>
			                    <th style="vertical-align: middle;">Estado</th>
			                    <th style="vertical-align: middle;">Acciones</th>
	                     	</tr>
	                    </thead>
	                    <tbody>
	                    	<?php foreach ($alumno as $alumno): ?>
	                    	<tr>
	                    		<td><?php echo $alumno['idAlumno']; ?></td>
	                    		<td><?php echo ucwords(strtolower($alumno['apellido_paterno'])).' '.$alumno['apellido_materno'].' '.$alumno['primer_nombre']; ?></td>
	                    		<td><?php echo $alumno['curso']; ?></td>
	                    		<td><?php echo $alumno['carrera']; ?></td>
	                    		
	                
	                    		<?php if ($alumno['activo']==1): ?>
                                <td class=""><span class="label label-success"><i class="fa fa-check-square-o" aria-hidden="true"></i> Activo</span></td>
                                <?php else: ?>
                                <td class=""><span class="label label-danger"><i class="fa fa-square-o" aria-hidden="true"></i> Inactivo</span></td>
                                <?php endif ?>
                            	<td class="a_center">                            		
                            		<a href="?c=Alumno&a=v_Actualizar&idAlumno=<?php echo $alumno['idAlumno']; ?>" class="btn btn-primary btn-xs " data-toggle="tooltip" data-placement="top" title="Actualizar">
                                   		<i class="fa fa-pencil"></i>   
                               		</a>
                               		<a class="btn btn-danger btn-xs EliminarAlumno" data-id="<?php echo $alumno['idAlumno']; ?>" data-alumno="<?php echo $alumno['apellido_paterno'].' '.$alumno['apellido_materno'].' '.$alumno['primer_nombre']; ?>" data-toggle="tooltip" data-placement="top" title="Eliminar">
                                   		<i class="fa fa-trash"></i>   
                               		</a>

                               	</td>
	                    	</tr>
	                    	<?php endforeach; ?>
	                    </tbody>
                	</table>                    
                </div>
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.content -->
<!-- /. Ventana Modal Foto de Perfil persona-->

<!-- /.Ventana Modal Foto de Perfil -->
<script>
	
	$(document).ready(function() {
		$(".EliminarAlumno").click(function(event) {
			idAlumno=$(this).attr('data-id');
			bootbox.dialog({
            message: "¿Estas seguro de eliminar a <b>"+$(this).attr('data-alumno')+"</b>?",
            title: "Eliminar Alumno",
            buttons: {
                main: {
                    label: "Eliminar",
                    className: "btn-primary",
                    callback: function() {
                        //console.log('Eliminado al usuario');
                        window.location.href = "?c=Alumno&a=Eliminar&idAlumno="+idAlumno;
                    }
                },
                danger: {
                    label: "Cancelar",
                    className: "btn-danger",
                    callback: function() {
                        bootbox.hideAll();
                    }
                }
            }
        });
		});
	});


</script>

