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
                                        <th>
                                            <? if($d->Status == 'Vigente') { ?>
                                                <a class="btn waves-effect waves-light btn-secondary" onclick="if (confirm('¿Desea desactivar la seleccion?')) { location.href = '<?php echo base_url('/clientes/eliminarCliemte/'.$d->id) ?>'; } return false;">
                                                    Desactivar cliente
                                                </a>      
                                            <?} else { ?>
                                                <a class="btn waves-effect waves-light btn-secondary" onclick="if (confirm('¿Desea reactivar la seleccion?')) { location.href = '<?php echo base_url('/clientes/reactivarCliente/'.$d->id) ?>'; } return false;">
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