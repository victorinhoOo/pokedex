<h1>Rechercher un Pokémon</h1>

<form action="index.php" method="post">
    <div class="form-group">
        <input type="text" id="recherche" name="recherche" placeholder="Rechercher">
    </div>

    <div class="form-group">
        <select name="champrecherche" id="champrecherche" required>
            <?php
            $reflectionClass = new ReflectionClass('Pokemon');
            $properties = $reflectionClass->getProperties();
            foreach ($properties as $property) {
                echo '<option value="' . $property->getName() . '">' . $property->getName() . '</option>';
            }
            ?>
        </select>
    </div>

    <input type="text" name="searchoption" value="1" hidden>


    <input class="button" type="submit" value="valider">


</form>