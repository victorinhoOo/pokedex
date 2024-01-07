<?php if (!empty($pokemon)) : ?>
    <h1>Modification de <?= htmlspecialchars($pokemon->getNomEspece()) ?></h1>
<?php else : ?>
    <h1>Ajouter un Pokémon</h1>
<?php endif; ?>

<?php if (isset($message)): ?>
    <h3><?= $message ?></h3>
<?php endif; ?>


<form action="index.php?action=<?= !empty($pokemon) ? 'update-pokemon' : 'add-pokemon'; ?>" method="post">


    <div class="form-group">
        <label for="nomEspece">Nom de l'espèce :</label>
        <input type="text" id="nomEspece" name="nomEspece" required value="<?= !empty($pokemon) ? htmlspecialchars($pokemon->getNomEspece()) : '' ?>">
    </div>

    <div class="form-group">
        <label for="description">Description :</label>
        <textarea id="description" name="description" rows="6"><?= !empty($pokemon) ? htmlspecialchars($pokemon->getDescription()) : '' ?></textarea>
    </div>

    <div class="form-group">
        <label for="typeOne">Type principal :</label>
        <input type="text" id="typeOne" name="typeOne" required value="<?= !empty($pokemon) ? htmlspecialchars($pokemon->getTypeOne()) : '' ?>">
    </div>

    <div class="form-group">
        <label for="typeTwo">Type secondaire :</label>
        <input type="text" id="typeTwo" name="typeTwo" value="<?= !empty($pokemon) ? htmlspecialchars($pokemon->getTypeTwo()) : '' ?>">
    </div>

    <div class="form-group">
        <label for="urlImg">URL de l'image :</label>
        <input type="text" id="urlImg" name="urlImg" required value="<?= !empty($pokemon) ? htmlspecialchars($pokemon->getUrlImg()) : '' ?>">
    </div>

    <?php if (!empty($pokemon)) : ?>
        <input type="hidden" id="idPokemon" name="idPokemon" value="<?= $pokemon->getIdPokemon() ?>">
    <?php endif; ?>

    <input type="submit" value="<?= !empty($pokemon) ? 'Modifier' : 'Ajouter' ?>">


</form>