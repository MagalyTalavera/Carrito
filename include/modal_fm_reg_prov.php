<button type="button" class="btn btn-success waves-effect waves-light" data-toggle="modal" data-target=".registrar">+ Nuevo</button>

                <div class="modal fade registrar" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title h4" id="myLargeModalLabel">Nuevo Proveedor</h5>
                                <button type="button" class="close waves-effect waves-light" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="operaciones/registrar_provee.php" method="POST">
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-md-2 col-sm-12" > Ruc: </label>
                                        <input type="number" name="ruc" class="form-control col-lg-4 col-md-4 col-sm-12" required>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-md-2 col-sm-12" >Razon Social:</label>
                                        <input type="text" name="nombre" class="form-control col-lg-10 col-md-10 col-sm-12" required>
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
                                    <!---
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-md-2 col-sm-12" >Metodo de pago:</label>
                                        <input type="text" name="direccion" class="form-control col-lg-10 col-md-10 col-sm-12" required>
                                    </div>

                                    --->

                                     <div class="form-group row">
                                    <label class="col-lg-2 col-md-2 col-sm-12">Metodo de Pago</label>
                               
                                    <select name="m_p" class="form-control col-lg-4 col-md-4 col-sm-12" required>
                                    <option>----Seleccione El metodo de pago----</option>
                                    <option>BCP</option>
                                     <option>iNTERBANCK</option>
                                     <option>BVA</option>
                                      
  
                                      
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