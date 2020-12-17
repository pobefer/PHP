<header>
    <h1><?php echo ($title) ?></h1>
        <nav>
            <ul class="menu">
                <li><a <?php if ($currentGlobal === 'dbManagement') {echo 'class="active"';} else{echo 'class="non-active"';} ?>  href="#">Opciones DB</a>
                    <ul>
                        <li><a  <?php if ($currentPage === 'createDataBase') {echo 'class="active"';} else{echo 'class="non-active"';} ?> href="CreateDataBase.php">Create DB</a></li>
                        <li><a  <?php if ($currentPage === 'createTable') {echo 'class="active"';} else{echo 'class="non-active"';} ?> href="CreateTable.php">Create Table</a></li>
                    </ul>
                </li>
                <li><a  <?php if ($currentGlobal === 'tableManagement') {echo 'class="active"';} else{echo 'class="non-active"';} ?>  href="#">Opciones T</a>
                    <ul>
                        <li><a  <?php if ($currentPage === 'insert') {echo 'class="active"';} else{echo 'class="non-active"';} ?> href="Insert.php">Insert</a></li>
                        <li><a  <?php if ($currentPage === 'search') {echo 'class="active"';}else{echo 'class="non-active"';}  ?> href="Search.php">Search</a></li>
                        <li><a  <?php if ($currentPage === 'update') {echo 'class="active"';} else{echo 'class="non-active"';} ?> href="Update.php">Update</a></li>
                        <li><a  <?php if ($currentPage === 'delete') {echo 'class="active"';} else{echo 'class="non-active"';} ?> href="Delete.php">Delete</a></li>
                    </ul>
                </li>
                <li><a  <?php if ($currentGlobal === 'import') {echo 'class="active"';} else{echo 'class="non-active"';} ?>  href="#">Opciones I/E</a>
                    <ul>
                        <li><a  <?php if ($currentPage === 'generateInforme') {echo 'class="active"';} else{echo 'class="non-active"';} ?> href="GenerateInforme.php">Generate I</a></li>
                        <li><a  <?php if ($currentPage === 'loadData') {echo 'class="active"';} else{echo 'class="non-active"';} ?> href="LoadData.php">Load</a></li>
                        <li><a  <?php if ($currentPage === 'exportData') {echo 'class="active"';} else{echo 'class="non-active"';} ?> href="ExportData.php">Export</a></li>
                    </ul>
                </li>
                <li><a  <?php if ($currentGlobal === 'informe') {echo 'class="active"';} else{echo 'class="non-active"';} ?>  href="Informe.php">Informe</a></li>
            </ul>
        </nav>
</header>