<div id="bodyrigth">
    <?php
    if (isset($_GET['edit_lang'])) {
        echo edit_lang();
    } else {
    ?>
        <h3>Toutes les Langues disponibles</h3>
        <div id="add">
            <details>
                <summary>Ajout language</summary>
                <form action="" method="post" enctype="multipart/form-data">
                    <input type="text" name="lang_name" placeholder="Nom de la catégorie" id="">
                    <center><button name="add_lang">Ajouter</button></center>
                </form>
            </details>
            <table cellspacing="0">
                <tr>
                    <th>Sr No.</th>
                    <th>Nom de language</th>
                    <th>Actions</th>
                </tr>
                <?php echo view_lang(); ?>
            </table>
        </div>
</div>
<?php
        echo add_lang();
    }
?>