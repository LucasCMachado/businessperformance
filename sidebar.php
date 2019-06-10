<!-- Navbar Start -->
<nav class="navigation">
    <ul class="list-unstyled">
        <li <?php if ($page=='inicio') {
            echo 'class="active"';
        } ?>><a href="inicio"><i class="ion-home"></i> <span class="nav-label">Inicio</span></a></li>
        <li class=" <?php if($page=='formularios'){echo 'active';}?>"><a href="listar-formularios"><i class="ion-clipboard"></i> <span class="nav-label">Assessments</span></a></li>
        <li class=" <?php if($page=='gerar-certificados'){echo 'active';}?>"><a href="gerar-certificados"><i class="ion-android-download"></i> <span class="nav-label">Certificados</span></a></li>
        <li class=" <?php if($page=='turma'){echo 'active';}?>"><a href="listar-turma"><i class="ion-ios7-people"></i> <span class="nav-label">Turmas</span></a></li>
        <li class=" <?php if($page=='formacao'){echo 'active';}?>"><a href="listar-formacao"><i class="ion-ios7-people"></i> <span class="nav-label">Formação</span></a></li>
        <li class=" <?php if($page=='clientes'){echo 'active';}?>"><a href="listar-cliente"><i class="ion-ios7-people"></i> <span class="nav-label">Clientes</span></a></li>
        <li class=" <?php if($page=='emails'){echo 'active';}?>"><a href="emails"><i class="ion-email"></i> <span class="nav-label">E-mails</span></a></li>
        <li class="<?php if($page=='config'){echo 'active';}?>"><a href="configuracoes"><i class="ion-gear-a"></i> <span class="nav-label">Configurações</span></a></li>

    </ul>
</nav>