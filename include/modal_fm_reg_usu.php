
<button type="button" class="btn btn-success waves-effect waves-light" data-toggle="modal" data-target=".registrar">+ Nuevo</button>

                <div class="modal fade registrar" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title h4" id="myLargeModalLabel">Nuevo Usuario</h5>
                                <button type="button" class="close waves-effect waves-light" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="operaciones/registrar_usuario.php" method="POST" enctype="multipart/form-data">
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-md-2 col-sm-12" > DNI: </label>
                                        <input type="number" name="dni" class="form-control col-lg-4 col-md-4 col-sm-12" required>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-md-2 col-sm-12" >Apellidos y Nombres:</label>
                                        <input type="text" name="ape_nom" class="form-control col-lg-10 col-md-10 col-sm-12" required>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-md-2 col-sm-12" >Correo:</label>
                                        <input type="email" name="correo" class="form-control col-lg-10 col-md-10 col-sm-12" required>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-md-2 col-sm-12" >Telefono:</label>
                                        <input type="number" name="telefono" class="form-control col-lg-4 col-md-4 col-sm-12" required>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-md-2 col-sm-12" >Direccion:</label>
                                        <input type="text" name="direccion" class="form-control col-lg-10 col-md-10 col-sm-12" required>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-md-2 col-sm-12" >Fecha de Nacimiento:</label>
                                        <input type="date" name="fecha_naci" class="form-control col-lg-4 col-md-4 col-sm-12" required>
                                    </div>   
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-md-2 col-sm-12" >Foto:</label>
                                        <input type="file" name="foto" class="form-control col-lg-4 col-md-4 col-sm-12" required accept="image/*">
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-md-2 col-sm-12" >Rol:</label>
                                        <select name="rol" id="" class="form-control col-lg-4 col-md-4 col-sm-12">
                                        <option></option>
                                            <?php
                                            $b_roles = "SELECT * FROM roles";
                                            $r_b_roles = mysqli_query($conn, $b_roles);
                                            while ($datos_roles = mysqli_fetch_array($r_b_roles)) {?>
                                                <option value="<?php echo $datos_roles['id'];?>"><?php echo $datos_roles['nombre'];?></option>
                                            <?php }?>                                         
                                        </select>
                                    </div>    

                                    <div class="form-group row">
                                    <label class="col-lg-2 col-md-2 col-sm-12"></label>
                                        <button type="submit" class="btn btn-danger">Guardar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>