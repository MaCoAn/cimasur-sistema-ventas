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
                    <h4 class="card-title">Seguimiento de citas</h4>
                    <h6 class="card-subtitle">Exportar las citas a Excel, PDF o imprimirlas</h6>
                    <div type="button" class="btn waves-effect waves-light btn-secondary">
                        <a href="<?php echo base_url('/citas/update/') ?>">Agregar Nueva Cita</a>
                    </div>
                    <div class="table-responsive m-t-40">
                        <table id="table" class="display nowrap table table-hover table-striped table-bordered" 
                            cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                <th>Cliente</th>
                                <th>NoCita</th>
                                <th>Comentarios</th>
                                <th>Fecha</th>
                                <? if ($this->session->userdata('tipo') == 1 || $this->session->userdata('tipo') == 4) { ?> 
                                 <th>Eliminar</th>
                                <?}?>
                                </tr>
                            </thead>
                            <tbody>                            
                                <? foreach($Citas as $d) { ?>
                                    <tr>
                                        <th><a href="<?php echo base_url('/citas/update/'.$d->id);?>"><?echo $d->Nombres . " " . $d->Apellidos?></a></th>
                                        <th><?echo $d->NoCita?></th>
                                        <th><?echo $d->Comentarios?></th>
                                        <th><?echo $d->Fecha?></th>      
                                        <? if ($this->session->userdata('tipo') == 1 || $this->session->userdata('tipo') == 4) { ?>                                
                                            <th>
                                                <a class="btn waves-effect waves-light btn-secondary" 
                                                    onclick="if (confirm('¿Desea elimiar la seleccion?')) { location.href = '<?php echo base_url('/citas/delete/'.$d->id) ?>'; } return false;">
                                                    Eliminar
                                                </a>
                                            </th>
                                        <?}?>
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