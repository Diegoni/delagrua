<?php
$idtaller = $_GET['idtaller'];

?>
<!-- Juan 2015 -->



<div class="uno">
    <a class="fa fa-map-marker"></a>
    DIRECCIÓN Y MAPA
</div>

<?php
if (!$row_registro['lat']) {
    echo "<p class=''> <span style='color:red;'>No hay un mapa para este taller!</span> Anteriormente figuraba como " .$row_registro['domicilio'] .' ' . $row_registro['idlocalidad'] . ". </p>";
} else {
    echo '<p>'. getAddress($row_registro) . '</p>';
}

?>



<a class="button" href="<?php echo "locationNew.php?&taller=$idtaller" ?>">
    <?php echo $row_registro['direction'] ? 'Modificar' : 'Agregar' ?> dirección
</a>
<br>
