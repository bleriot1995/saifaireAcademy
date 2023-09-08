<div id="bodyrigth">
    <?php
    if (isset($_GET['edit_sub_cat'])) {
        echo edit_sub_cat();
    } else { ?>
        <h3>Toutes les sous-catégoiries</h3>
        <div id="add">
            <details>
                <summary>Ajout sous-catégorie</summary>
                <form action="" method="post" enctype="multipart/form-data">
                    <select name="cat_id" id="">
                        <option value="">Sélecioner un catégorie</option>
                        <?php echo select_cat(); ?>
                    </select>
                    <input type="text" name="sub_cat_name" placeholder="Nom du sous-catégorie" id="">
                    <center><button name="add_sub_cat">Ajouter</button></center>
                </form>
            </details>
            <table cellspacing="0">
                <tr>
                    <th>Sr No.</th>
                    <th>Sous-catégorie</th>
                    <th>Catégorie principal</th>
                    <th>Actions</th>
                </tr>
                <?php echo view_sub_cat(); ?>
            </table>
        </div>
    <?php } ?>
</div>
<?php
echo add_sub_cat();
?>