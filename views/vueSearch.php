<h1>Rechercher</h1>

<?php if (isset($message)): ?>
    <h3><?= $message ?></h3>
<?php endif; ?>

<form action="index.php?action=search" method="post">
    <div class="form-group">
        <input type="text" id="valeur" name="valeur" placeholder="Rechercher" required>
    </div>

    <div class="form-group">
        <label for="critere">Champ de recherche : </label>
        <select name="critere" id="critere" required>
            <option value="" disabled selected>Sélectionner un champ</option>
            <?php
            $reflectionClass = new ReflectionClass('Pokemon');
            $properties = $reflectionClass->getProperties();
            foreach ($properties as $property) {
                // Exclus "typeOne", "typeTwo" et "PokemonManager" des champs affichés à la sélection
                if ($property->getName() !== 'typeOne' && $property->getName() !== 'typeTwo' && $property->getName() !== 'typeManager' && $property->getName() !== 'urlImg') {
                    echo '<option value="' . $property->getName() . '">' . $property->getName() . '</option>';
                }
            }
            ?>
            <option value="type">Type</option>
        </select>
    </div>

    <div class="form-group">
        <input class="button" type="submit" value="Rechercher">
    </div>
</form>
