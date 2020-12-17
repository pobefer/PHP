<header>
    <h1><?php echo ($title) ?></h1>
        <nav>
            <ul class="menu">
                <li><a <?php if ($currentGlobal === 'basedatos') {echo 'class="active"';} else{echo 'class="non-active"';} ?>  href="GenerateBaseDatos.php">Generar DB</a></li>
                <li><a <?php if ($currentGlobal === 'tecnicas') {echo 'class="active"';} else{echo 'class="non-active"';} ?>  href="#">Tecnicas</a>
                    <ul>
                        <li><a  <?php if ($currentPage === 'addTecnica') {echo 'class="active"';} else{echo 'class="non-active"';} ?> href="addTecnica.php">Añadir</a></li>
                        <li><a  <?php if ($currentPage === 'verTecnicas') {echo 'class="active"';} else{echo 'class="non-active"';} ?> href="verTecnicas.php">Ver</a></li>
                    </ul>
                </li>
                <li><a  <?php if ($currentGlobal === 'companias') {echo 'class="active"';} else{echo 'class="non-active"';} ?>  href="#">Compañias</a>
                    <ul>
                        <li><a  <?php if ($currentPage === 'verCompanias') {echo 'class="active"';} else{echo 'class="non-active"';} ?> href="verCompanias.php">Ver</a></li>
                    </ul>
                </li>
                <li><a  <?php if ($currentGlobal === 'consultas') {echo 'class="active"';} else{echo 'class="non-active"';} ?>  href="#">Consultas</a>
                    <ul>
                        <li><a  <?php if ($currentPage === 'addConsulta') {echo 'class="active"';} else{echo 'class="non-active"';} ?> href="addConsulta.php">Añadir</a></li>
                        <li><a  <?php if ($currentPage === 'verConsultas') {echo 'class="active"';} else{echo 'class="non-active"';} ?> href="verConsultas.php">Ver</a></li>
                    </ul>
                </li>
                </ul>
        </nav>
</header>