<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">Insertar Cita</h3>
        </div>
        <div class="">
            <button class="right-side-toggle waves-effect waves-light btn-inverse btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
        </div>
    </div> -->
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Clientes</h4>
                    <h6 class="card-subtitle">Exportar las citas a Excel, PDF o imprimirlas</h6>
                    <div type="button" class="btn waves-effect waves-light btn-secondary">
                        <a href="<?php echo base_url('/clientes/update/') ?>">Agregar nuevo cliente</a>
                    </div>
                    <br/><br/>
                    <form class="form-material m-t-40" method="post" action="<?php echo base_url('/clientes/filtrarClientesPorFechas/');?>" >
                        <div class="form-group" align="right">
                            <table>  
                                <tr>Para filtrar los Clientes por fecha en que fueron dados de alta, selecciona rango de fechas.</tr>                          
                                <tr>
                                    <td aling="center">
                                        <div class="col-xs-5 selectContainer">
                                            <select class="form-control" name="mesInicial">
                                                <option value="0">Mes Inicial ...</option>                             
                                                <option value="01" <?php if ($mesInicial=="01") echo "selected";?>>Enero</option>
                                                <option value="02" <?php if ($mesInicial=="02") echo "selected";?>>Febrero</option>
                                                <option value="03" <?php if ($mesInicial=="03") echo "selected";?>>Marzo</option>
                                                <option value="04" <?php if ($mesInicial=="04") echo "selected";?>>Abril</option>
                                                <option value="05" <?php if ($mesInicial=="05") echo "selected";?>>Mayo</option>
                                                <option value="06" <?php if ($mesInicial=="06") echo "selected";?>>Junio</option>
                                                <option value="07" <?php if ($mesInicial=="07") echo "selected";?>>Julio</option>
                                                <option value="08" <?php if ($mesInicial=="08") echo "selected";?>>Agosto</option>
                                                <option value="09" <?php if ($mesInicial=="09") echo "selected";?>>Septiembre</option>
                                                <option value="10" <?php if ($mesInicial=="10") echo "selected";?>>Octubre</option>
                                                <option value="11" <?php if ($mesInicial=="11") echo "selected";?>>Noviembre</option>
                                                <option value="12" <?php if ($mesInicial=="12") echo "selected";?>>Diciembre</option>
                                            </select>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col-xs-5 selectContainer">
                                            <select class="form-control" name="anioInicial">
                                            <option value="0">A&ntilde;o Inicial ...</option>
                                            <? for($a«Ðo = 2010; $a«Ðo <= 2020; $a«Ðo++ ) { ?>
                                                <option value = <?echo $a«Ðo?> <?php if ($anioInicial==$a«Ðo) echo "selected";?>><?echo $a«Ðo?></option>
                                            <?}?>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td aling="center">
                                        <div class="col-xs-5 selectContainer">
                                            <select class="form-control" name="mesFinal">
                                                <option value="0">Mes Final ...</option>                             
                                                <option value="01" <?php if ($mesFinal=="01") echo "selected";?>>Enero</option>
                                                <option value="02" <?php if ($mesFinal=="02") echo "selected";?>>Febrero</option>
                                                <option value="03" <?php if ($mesFinal=="03") echo "selected";?>>Marzo</option>
                                                <option value="04" <?php if ($mesFinal=="04") echo "selected";?>>Abril</option>
                                                <option value="05" <?php if ($mesFinal=="05") echo "selected";?>>Mayo</option>
                                                <option value="06" <?php if ($mesFinal=="06") echo "selected";?>>Junio</option>
                                                <option value="07" <?php if ($mesFinal=="07") echo "selected";?>>Julio</option>
                                                <option value="08" <?php if ($mesFinal=="08") echo "selected";?>>Agosto</option>
                                                <option value="09" <?php if ($mesFinal=="09") echo "selected";?>>Septiembre</option>
                                                <option value="10" <?php if ($mesFinal=="10") echo "selected";?>>Octubre</option>
                                                <option value="11" <?php if ($mesFinal=="11") echo "selected";?>>Noviembre</option>
                                                <option value="12" <?php if ($mesFinal=="12") echo "selected";?>>Diciembre</option>
                                            </select>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col-xs-5 selectContainer">
                                            <select class="form-control" name="anioFinal">
                                            <option value="0">A&ntilde;o Final...</option>
                                            <? for($a«Ðo = 2010; $a«Ðo <= 2020; $a«Ðo++ ) { ?>
                                                <option value = <?echo $a«Ðo?> <?php if ($anioFinal==$a«Ðo) echo "selected";?> ><?echo $a«Ðo?></option>
                                            <?}?>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                <tr padding-bottom="2em">
                                    <td colspan="100%" align="center">
                                        <button type="submit" class="btn btn-info">Filtrar Clientes</button>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </form>
                    <div class="table-responsive m-t-40">
                        <table id="table" class="display nowrap table table-hover table-striped table-bordered" 
                            cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                <th>Cliente</th>
                                <th>Email</th>
                                <th>Como se Entero</th>
                                <th>Fecha</th>
                                <th>Recorrido</th>
                                <th>Status</th>
                                <th>Seguimiento de citas</th>
                                <th>Dar de baja</th>
                                </tr>
                            </thead>
                            <tbody>                            
                                <? foreach($clientes as $d) { ?>
                                    <tr>
                                        <th><a href="<?php echo base_url('/clientes/update/'.$d->id);?>"><?echo $d->Nombres . " " . $d->Apellidos?></a></th>
                                        <th><?echo $d->Email?></th>
                                        <th><?echo $d->Enterado?></th>
                                        <th><?echo $d->FechaIngreso?></th>
                                        <th><?echo $d->HizoRecorrido?></th>
                                        <th><?echo $d->Status?></th>
                                        <th><a class="btn waves-effect waves-light btn-secondary" href="<?php echo base_url('/citas/'.$d->id);?>">Seguimiento</a></th>
                                        <th>
                                            <? if($d->Status == 'Vigente') { ?>
                                                <a class="btn waves-effect waves-light btn-secondary" onclick="if (confirm('Â¿Desea desactivar la seleccion?')) { location.href = '<?php echo base_url('/clientes/eliminarCliemte/'.$d->id) ?>'; } return false;">
                                                    Desactivar cliente
                                                </a>      
                                            <?} else { ?>
                                                <a class="btn waves-effect waves-light btn-secondary" onclick="if (confirm('Â¿Desea reactivar la seleccion?')) { location.href = '<?php echo base_url('/clientes/reactivarCliente/'.$d->id) ?>'; } return false;">
                                                    Reactivar cliente
                                                </a>      
                                            <?}  ?>
                                        </th>
                                    </tr>
                                <?}?>
                            </tbody>                            
                        </table>
                    </div>
                </div>
            </div>         
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Page Content -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Page wrapper  -->
<!-- ============================================================== -->