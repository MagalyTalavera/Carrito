
<button type="button" class="btn btn-success waves-effect waves-light" data-toggle="modal" data-target=".registrar">+ Nuevo</button>

                <div class="modal fade registrar" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title h4" id="myLargeModalLabel">Nuevo Cliente</h5>
                                <button type="button" class="close waves-effect waves-light" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="operaciones/registrar_categoria.php" method="POST">
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-md-2 col-sm-12" >Nombre de la Categoria:</label>
                                        <input type="text" name="categoria" class="form-control col-lg-10 col-md-10 col-sm-12" required>
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