<div id="bodyrigth">
    <?php
    if (isset($_GET['edit_term'])) {
        echo edit_term();
    } else {
    ?>
        <h3>Toutes les Termes et conditions</h3>
        <div id="add">
            <details>
                <summary>Ajout Nouveau terme et condition</summary>
                <form action="" method="post" enctype="multipart/form-data">
                    <select name="for_whome" required>
                        <option value="">Selctioner terme pour</option>
                        <option value="Etudiant">Etudiant</option>
                        <option value="Enseignant">Enseignant</option>
                    </select>
                    <input type="text" name="term" placeholder="T&C" id="">
                    <center><button name="add_term">Ajouter</button></center>
                </form>
            </details>
            <table style="width: 90%;" cellspacing="0">
                <tr>
                    <th>Sr No.</th>
                    <th>Termes</th>
                    <th>Termes pour</th>
                    <th>Actions</th>
                </tr>
                <?php echo view_term(); ?>
            </table>
        </div>
</div>
<?php
        echo add_term();
    }
?>