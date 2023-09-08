<?php
include 'inc/db.php';
if (
    !empty($_POST['cat_id'])
    && !empty($_POST['sub_cat_id'])
    && !empty($_POST['ebook'])
) {

    $sql = "INSERT into ebookstype(cat_id,sub_cat_id,ebook) value(?,?,?)";
    $req = $conn->prepare($sql);

    $req->execute(array(
        $_POST['cat_id'],
        $_POST['sub_cat_id'],
        $_POST['ebook']

    ));
    if ($req->rowCount() != 0) {
        echo "<script>alert('type a pas  ajouter corrèctement')</script>";
        echo "<script>window.open('index.php?type', '_self')</script>";
    }
}
