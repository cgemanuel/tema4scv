<?php
/* @var $this yii\web\View */
?>

<?php if ($persona): ?>
    <h1>Ey "<?php echo $persona->nombre; ?>," Esto Requiere un Upgrade</h1>
    <p>
        Puede obtener el acceso que desea realizando un upgrade, pero 
        <?php echo $persona->nombre; ?>, eso no es todo. 
        Podrá ir a cualquier lugar, ¿no es eso genial?
    </p>
<?php else: ?>
    <h1>Ey "Invitado", Esto Requiere un Upgrade</h1>
    <p>
        Puede obtener el acceso que desea realizando un upgrade. 
        Pero aún no has creado tu perfil, por lo tanto no podemos mostrar tu nombre.
    </p>
<?php endif; ?>
