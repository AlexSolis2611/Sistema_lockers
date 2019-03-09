<?php include "conn.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <head>
      <?php include("head.php");?>
    </head>
    <body>
       <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                        <i class="icon-reorder shaded"></i></a><a class="brand" href="index.php" target="_blank">Sistema de Control de Lockers</a>
                   
                   
                </div>
            </div>
            <!-- /navbar-inner -->
        </div><br />

            <div class="container">
                <div class="row">
                    <div class="span12">
                        <div class="content">
                            <?php
           $id = intval($_GET['id']);
			$sql = mysqli_query($conn, "SELECT * FROM empleados em INNER JOIN lockers lo ON lo.no_locker = em.no_locker WHERE id ='$id'");
			if(mysqli_num_rows($sql) == 0){
				header("Location: index.php");
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
			?>
            
            <blockquote>
            Actualizar datos del colaborador
            </blockquote>
                         <form name="form1" id="form1" class="form-horizontal row-fluid" action="update-edit.php" method="POST" >
										<div class="control-group">
											<label class="control-label" for="basicinput">ID</label>
											<div class="controls">
												<input type="text" name="id" id="id" value="<?php echo $row['id']; ?>" placeholder="Tidak perlu di isi" class="form-control span8 tip" readonly="readonly">
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="basicinput">Nombre completo</label>
											<div class="controls">
												<input type="text" name="nombres" id="nombres" value="<?php echo $row['nombres']; ?>" placeholder="" class="form-control span8 tip" required>
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="basicinput">Fecha de asignación</label>
											<div class="controls">
												<input name="notelp" id="notelp" value="<?php echo $row['fecha_asignacion']; ?>" class=" form-control span8 tip" type="date"   />
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="basicinput">Puesto</label>
											<div class="controls">
												<input type="text" name="puesto" id="puesto" value="<?php echo $row['puesto']; ?>" placeholder="" class="form-control span8 tip" required>
											</div>
										</div>

										
										<div class="control-group">
											<label class="control-label" for="basicinput">Sexo</label>
											<div class="controls">
												<input type="text" name="sexo" id="telefono" value="<?php echo $row['sexo']; ?>" placeholder="" class="form-control span8 tip" required>
											</div>
										</div>


										<div class="control-group">
											<label class="control-label" for="basicinput"># Locker</label>
											<div class="controls">
												<input type="hidden" readonly="" name="lock_act" value="<?php echo $row['no_locker']; ?>" placeholder="" class="form-control span8 tip" required>
												<input type="text" readonly="" value="<?php echo $row['num_locker']; ?>" placeholder="" class="form-control span8 tip" required>
												<select name="no_locker" id="no_locker
												" class=" form-control span8 tip" required >
													<option selected="" value="No" disabled="">Selecciona</option>
													<?php 
														$selLock = "SELECT * FROM lockers WHERE estado_locker = 0";
														$resLock = $conn -> query($selLock);
														while ($dt = $resLock->fetch_object()) {
													?>

														<option value="<?php echo $dt->no_locker; ?>">
															<?php echo $dt->num_locker; ?>
														</option>
													
													<?php
														}
													?>
												</select>
											</div>
										</div>


										<div class="control-group">
											<label class="control-label" for="basicinput">Area Locker</label>
											<div class="controls">
												<input type="text" name="area_locker" id="area_locker" value="<?php echo $row['area_locker']; ?>" placeholder="" class="form-control span8 tip" required>
											</div>
										</div>
                                        

										<div class="control-group">
											<div class="controls">
												<input type="submit" name="update" id="update" value="Actualizar" class="btn btn-sm btn-primary"/>
                                               <a href="index.php" class="btn btn-sm btn-danger">Cancelar</a>
											</div>
										</div>
									</form>
                        </div>
                        <!--/.content-->
                    </div>
                    <!--/.span9-->
                </div>
            </div>
            <!--/.container-->
        
        <!--/.wrapper--><br />
        <div class="footer span-12">
            <div class="container">
              <center> <b class="copyright">Alejandro Solis // Guillermo Lopez &copy; <?php echo date("Y")?> Sistema de locker v.1.1</b></center>
            </div>
        </div>

        <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        


      
    </body>
