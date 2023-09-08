<div id="bodyrigth">
    <?php
    if (isset($_GET['edit_type'])) {
        echo edit_type();
    } else { ?>
        <h3>Toutes le types d'ebook</h3>
        <div id="add">
            <details>
                <summary>Ajout types</summary>
                <form action="ajoutType.php" method="post" enctype="multipart/form-data">
                    <select name="cat_id" id="">
                        <option value="">Sélecioner un catégorie</option>
                        <?php echo select_cat(); ?>
                    </select>
                    <select name="sub_cat_id" id="">
                        <option value="">Sélecioner un sous-categorie</option>
                        <?php echo select_sub_cat(); ?>
                    </select>
                    <input type="text" name="ebook" placeholder="Nom du type d'ebbok" id="">
                    <center><button name="add_ebook">Ajouter</button></center>
                </form>
            </details>
            <table cellspacing="0">
                <tr>
                    <th>Sr No.</th>
                    <th>Type</th>
                    <th>Catégorie principal</th>
                    <th>Sous-catégorie</th>
                    <th>Actions</th>
                </tr>
                <?php echo view_type(); ?>
            </table>
            </table>
        </div>
    <?php } ?>
</div>