        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="user-profile"> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-account-circle"></i><span class="hide-menu"> <?echo $this->session->userdata('nickname');?></span></a>
                            <ul aria-expanded="false" class="collapse">
                                <?$id = $this->session->userdata('id')?>
                                <li><a href="<?php echo base_url('usuarios/update/'.$id);?>">Mi Perfil </a></li>
                                <li><a href="<?php echo base_url('login/cerrarSesion');?>">Cerrar Sesión</a></li>
                            </ul>
                        </li>
                        <li class="nav-devider"></li>
                        <? if ($this->session->userdata('tipo') != 1) { ?>
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Principal</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?php echo base_url();?>clientes">Clientes </a></li>
                                <li><a href="<?php echo base_url();?>inmuebles">Inmuebles</a></li>
                                <? if ($this->session->userdata('tipo') != 3 ) { ?>
                                <li><a href="<?php echo base_url();?>usuarios">Vendedores</a></li>
                                <? }?>
                            </ul>
                        </li>
                        <? }?>
                        <? if ($this->session->userdata('tipo') == 1 || $this->session->userdata('tipo') == 4) { ?>
                        <li class="nav-small-cap">ADMINISTRADOR</li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-laptop-chromebook"></i><span class="hide-menu">Sistema</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?php echo base_url();?>usuarios">Usuarios</a></li>
                                <li><a href="<?php echo base_url();?>clientes">Clientes</a></li>
                                <li><a href="<?php echo base_url();?>inmuebles">Inmuebles</a></li>
                                <li><a href="<?php echo base_url();?>citas">Citas</a></li>
                                <li><a href="<?php echo base_url();?>publicidad">Medios de Publcidad</a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-account-multiple"></i><span class="hide-menu">Usuarios</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?php echo base_url();?>usuarios">Lista de Usuarios</a></li>
                                <li><a href="<?php echo base_url();?>usuarios/update">Agregar Usuarios</a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-file-chart"></i><span class="hide-menu">Medios de Publicidad</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?php echo base_url();?>publicidad">Lista de Medios</a></li>
                                <li><a href="<?php echo base_url();?>publicidad/update">Agregar Medios</a></li>
                            </ul>
                        </li>
                        <li class="nav-small-cap">VENDEDORES</li>
                        <? }?>
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-file"></i><span class="hide-menu">Clientes</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?php echo base_url();?>clientes">Lista de Clientes</a></li>
                                <li><a href="<?php echo base_url();?>clientes/update">Agregar Clientes</a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-table"></i><span class="hide-menu">Citas</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?php echo base_url();?>citas">Lista de Citas</a></li>
                                <li><a href="<?php echo base_url();?>citas/update">Agregar Cita</a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-home-variant"></i><span class="hide-menu">Inmuebles</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?php echo base_url();?>inmuebles">Lista de Inmuebles</a></li>
                                <? if ($this->session->userdata('tipo') != 3 ) { ?>
                                <li><a href="<?php echo base_url();?>inmuebles/update">Agregar Inmueble</a></li>
                                <? }?>
                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-book-open-variant"></i><span class="hide-menu">Guia de Usuario</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?php echo base_url();?>resources/CIMASUR_CRM_Guia_Usuario.pdf" target="_blank">Descargar Guia</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->