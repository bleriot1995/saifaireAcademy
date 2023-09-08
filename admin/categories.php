<div id="bodyrigth">
    <?php
    if (isset($_GET['edit_cat'])) {
        echo edit_cat();
    } else {
    ?>
        <h3>Toutes les catégoiries</h3>
        <div id="add">
            <details>
                <summary>Ajout catégorie</summary>
                <form action="" method="post" enctype="multipart/form-data">
                    <input type="text" name="cat_name" placeholder="Nom de la catégorie" id="">
                    <center><button name="add_cat">Ajouter</button></center>
                </form>
            </details>
            <table cellspacing="0">
                <tr>
                    <th>Sr No.</th>
                    <th>Nom catégorie</th>
                    <th>Actions</th>
                </tr>
                <?php echo view_cat(); ?>
            </table>
        </div>
</div>
<?php
        echo add_cat();
    }
?>