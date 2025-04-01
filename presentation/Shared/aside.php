<aside class="sidebar navbar-default" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="sidebar-search">
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                        <button class="btn btn-primary" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                </div>
            </li>

            <!-- # 1 ACCESO Y SEGURIDAD -->
            <li class="menu-item">
                <a href="#" class="menu-toggle"><i class="fa fa-lock fa-fw"></i> ACCESO Y SEGURIDAD <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level" style="display: none;">
                    <li><a href="../User/index.php">ADMINISTRAR USUARIO</a></li>
                    <li><a href="../Roles/index.php">ADMINISTRAR ROLES</a></li>
                </ul>
            </li>

            <!-- # 2 PARAMETRIZACIÓN -->
            <li class="menu-item">
                <a href="#" class="menu-toggle"><i class="fa fa-cogs fa-fw"></i> PARAMETRIZACIÓN <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level" style="display: none;">
                    <li><a href="../niño/index.php">ADMINISTRAR NIÑOS</a></li>
                    <li><a href="../personal/index.php">ADMINISTRAR PERSONAL</a></li>
                    <li><a href="../autorizados/index.php">ADMINISTRAR AUTORIZADOS</a></li>
                    <li><a href="../enfermedad/index.php">ADMINISTRAR ENFERMEDAD</a></li>
                </ul>
            </li>

            <!-- # 3 TRANSACCIONAL -->
            <li class="menu-item">
                <a href="#" class="menu-toggle"><i class="fa fa-exchange fa-fw"></i> TRANSACCIONAL <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level" style="display: none;">
                    <li><a href="../inscripcion/index.php">GESTIONAR INSCRIPCIONES</a></li>
                    <li><a href="../asistencias/index.php">CONTROL DE ASISTENCIAS</a></li>
                </ul>
            </li>

            <!--# 4  REPORTES -->
            <li class="menu-item">
                <a href="#" class="menu-toggle"><i class="fa fa-bar-chart fa-fw"></i> REPORTES <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level" style="display: none;">
                    <li><a href="../reportes/asistencias.php">REPORTE DE ASISTENCIAS</a></li>
                    <li><a href="../reportes/niños.php">REPORTE NIÑOS</a></li>
                </ul>
            </li>
        </ul>
    </div>
</aside>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $(".menu-toggle").click(function (e) {
            e.preventDefault();
            
            $(".nav-second-level").not($(this).next()).slideUp();

            $(this).next(".nav-second-level").slideToggle();
        });
    });
</script>

