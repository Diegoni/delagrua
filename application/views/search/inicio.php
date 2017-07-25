
<div class="cont960">
  <div class="resultados-busquedas">
    <!--rb-->
    <div class="uno"><a class="fa fa-search"></a> <?php echo $totalRows_registros ?> RESULTADOS PARA <?php echo strtoupper($query) ?></div>

    <?php include_once 'partials/searchForm.php'; ?>
    <div class="izquierda mobile">
      <?php include 'partials/searchLeft.php'; ?>
    </div>
    <div class="izquierda screen">
      <?php include 'partials/searchLeft.php'; ?>
    </div>

    <?php include_once 'partials/searchCenter.php'; ?>


    <div class="derecha">
      <!--derecha-->
      <div class="box2">
        <?php if ($totalRows_registros12 > 0) { // Show if recordset not empty ?>
        <a href="http://<?php echo $row_registros12['enlace']; ?>"><img src="<?php echo $url_relativa;?>img/banner/<?php echo $row_registros12['imagen']; ?>" width="280" height="210" alt=""/></a>
        <?php } // Show if recordset not empty ?>
      </div>
      <div class="box2">
        <?php if ($totalRows_registros13 > 0) { // Show if recordset not empty ?>
        <a href="http://<?php echo $row_registros13['enlace']; ?>"><img src="<?php echo $url_relativa;?>img/banner/<?php echo $row_registros13['imagen']; ?>" width="280" height="210" alt=""/></a>
        <?php } // Show if recordset not empty ?>
      </div>
      <div class="box2">
        <?php if ($totalRows_registros14 > 0) { // Show if recordset not empty ?>
        <a href="http://<?php echo $row_registros14['enlace']; ?>"><img src="<?php echo $url_relativa;?>img/banner/<?php echo $row_registros14['imagen']; ?>" width="280" height="210" alt=""/></a>
        <?php } // Show if recordset not empty ?>
      </div>


      <hr>

    </div>
    <!--derecha-->
  </div>
  <!--rb-->