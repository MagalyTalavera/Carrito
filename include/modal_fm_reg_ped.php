<button type="button" class="btn btn-success waves-effect waves-light" data-toggle="modal" data-target=".registrar">+ Nuevo</button>

                <div class="modal fade registrar" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title h4" id="myLargeModalLabel">Nuevo Pedido</h5>
                                <button type="button" class="close waves-effect waves-light" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="operaciones/registrar_pedido.php" method="POST">
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-md-2 col-sm-12" >id_cliente:</label>
                                        <select name="id_cliente" id="" class="form-control col-lg-4 col-md-4 col-sm-12">
                                        <option></option>
                                            <?php
                                            $b_roles = "SELECT * FROM cliente";
                                            $r_b_roles = mysqli_query($conn, $b_roles);
                                            while ($datos_roles = mysqli_fetch_array($r_b_roles)) {?>
                                                <option value="<?php echo $datos_roles['id'];?>"><?php echo $datos_roles['razon_social'];?></option>
                                            <?php }?>                                         
                                        </select>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-md-2 col-sm-12" >Fecha hora de pedido:</label>
                                        <input type="date" name="fecha_h_pedi" class="form-control col-lg-4 col-md-4 col-sm-12" required>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-md-2 col-sm-12" >Fecha de entrega:</label>
                                        <input type="date" name="fecha_entrega" class="form-control col-lg-4 col-md-4 col-sm-12" required>
                                    </div>

                                    <!---
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-md-2 col-sm-12" >Metodo de pago:</label>
                                        <input type="text" name="direccion" class="form-control col-lg-10 col-md-10 col-sm-12" required>
                                    </div>

                                    --->


                                <div class="form-group row">
                                    <label class="col-lg-2 col-md-2 col-sm-12">Metodo de Pago</label>
                               
                                    <select name="metodo_p" class="form-control col-lg-4 col-md-4 col-sm-12" required>
                                    <option>----Seleccione El metodo de pago----</option>
                                    <option>BCP</option>
                                     <option>iNTERBANCK</option>
                                     <option>BVA</option>
                                      
  
                                      
                                    </select>
                                 </div>


                                    <div class="form-group row">
                                        <label class="col-lg-2 col-md-2 col-sm-12" >Monto:</label>
                                        <input type="number" name="monto" class="form-control col-lg-4 col-md-4 col-sm-12" required>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-md-2 col-sm-12" >Comprobante:</label>
                                        <input type="text" name="comprobante" class="form-control col-lg-10 col-md-10 col-sm-12" required>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-md-2 col-sm-12" >Estado:</label>
                                        <input type="text" name="estado" class="form-control col-lg-10 col-md-10 col-sm-12" required>
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