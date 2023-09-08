<div id="bodyrigth">
    <?php
    if (isset($_GET['edit_cat'])) {
        echo edit_cat();
    } else {
    ?>
        <h3>Toutes les FAQS</h3>
        <div id="add">
            <details>
                <summary>Ajout FAQS</summary>
                <form action="" method="post" enctype="multipart/form-data">
                    <input type="text" name="qsn" placeholder="" id="">
                    <textarea name="ans" id="" cols="30" rows="10"></textarea>
                    <center><button name="add_faqs">Ajouter</button></center>
                </form>
            </details>
            </table>
        </div>
</div>
<?php
        echo add_faqs();
    }
?>