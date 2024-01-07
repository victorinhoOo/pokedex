<h1>Ajouter un type de Pokémon</h1>

<?php if (isset($message)): ?>
    <h3><?= $message ?></h3>
<?php endif; ?>

<form action="index.php?action=add-type" method="post">
    <div class="form-group">
        <label for="nomType">Nom du type:</label>
        <input type="text" id="nomType" name="nomType" required>
    </div>

    <div class="form-group">
        <label for="urlImg">Url de l'image : </label>
        <input type="text" id="urlImg" name="urlImg" required>
    </div>

    <input class="button" type="submit" value="Ajouter le type">
</form>
