<?php
function add_cat()
{
    include('inc/db.php');
    if (isset($_POST['add_cat'])) {
        $cat_name = $_POST['cat_name'];

        $check = $conn->prepare("select * from categorie where cat_name='$cat_name'");
        $check->setFetchMode(PDO::FETCH_ASSOC);
        $check->execute();
        $count = $check->rowCount();

        if ($count == 1) {
            echo "<script>alert('Catégoirie $cat_name a été ajouter corrèctement')</script>";
            echo "<script>window.open('index.php?categorie', '_self')</script>";
        } else {
            $add_cat = $conn->prepare("insert into categorie(cat_name) values('$cat_name')");
            if ($add_cat->execute()) {
                echo "<script>alert('Catégoirie $cat_name a été ajouter corrèctement')</script>";
                echo "<script>window.open('index.php?categorie', '_self')</script>";
            } else {
                echo "<script>alert('Catégoirie  $cat_name n'a pas été ajouter corrèctement')</script>";
                echo "<script>window.open('index.php?categorie', '_self')</script>";
            }
        }
    }
}


function select_cat()
{
    include('inc/db.php');
    $get_cat = $conn->prepare("select * from categorie");
    $get_cat->setFetchMode(PDO::FETCH_ASSOC);
    $get_cat->execute();
    while ($row = $get_cat->fetch()) :
        echo "<option value='" . $row['cat_id'] . "'>" . $row['cat_name'] . "</option>";
    endwhile;
}

function add_term()
{
    include('inc/db.php');
    if (isset($_POST['add_term'])) {
        $cat_name = $_POST['term'];
        $cat_id = $_POST['for_whome'];

        $check = $conn->prepare("select * from terme where term='$cat_name'");
        $check->setFetchMode(PDO::FETCH_ASSOC);
        $check->execute();
        $count = $check->rowCount();

        if ($count == 1) {
            echo "<script>alert('Terme $cat_name a été ajouter corrèctement')</script>";
            echo "<script>window.open('index.php?terms', '_self')</script>";
        } else {
            $add_cat = $conn->prepare("insert into terme(term,for_whome) values('$cat_name', '$cat_id')");
            if ($add_cat->execute()) {
                echo "<script>alert('Terme $cat_name a été ajouter corrèctement')</script>";
                echo "<script>window.open('index.php?terms', '_self')</script>";
            } else {
                echo "<script>alert('Terme  $cat_name n'a pas été ajouter corrèctement')</script>";
                echo "<script>window.open('index.php?terms', '_self')</script>";
            }
        }
    }
}


function view_term()
{
    include('inc/db.php');

    $get_c = $conn->prepare("select * from terme ");
    $get_c->setFetchMode(PDO::FETCH_ASSOC);
    $get_c->execute();
    $i = 1;

    while ($row = $get_c->fetch()) :
        echo "<tr>
                  <td>" . $i++ . "</td>
                  <td>" . $row['term'] . "</td>
                  <td>" . $row['for_whome'] . "</td>
                  <td><a href='index.php?terms&edit_term=" . $row['t_id'] . "' title='Modifier'><i class='far fa-edit' ></i></a>
                      <a style='color: #f00;' href='index.php?terms&del_term=" . $row['t_id'] . "' title='Supprimer'><i class='far fa-trash-alt' ></i></a>
                  </td>
         </tr>";
    endwhile;

    if (isset($_GET['del_term'])) {
        $id = $_GET['del_term'];

        $del = $conn->prepare("delete from terme where t_id ='$id'");
        if ($del->execute()) {
            echo "<script>alert('Terme a été supprimer correctement')</script>";
            echo "<script>window.open('index.php?terms', '_self')</script>";
        } else {
            echo "<script>alert('Terme n'a pas été supprimer')</script>";
            echo "<script>window.open('index.php?terms', '_self')</script>";
        }
    }
}

function edit_term()
{
    include('inc/db.php');
    if (isset($_GET['edit_term'])) {

        $id = $_GET['edit_term'];
        $get_cat = $conn->prepare("select * from terme where t_id='$id'");
        $get_cat->setFetchMode(PDO::FETCH_ASSOC);
        $get_cat->execute();
        $row = $get_cat->fetch();

        echo "<h3>Modifier terme et condition</h3>
        <form id='edit_form' action='' method='post' enctype='multipart/form-data'>
            <select name='for_whome' id=''>
                <option value='" . $row['for_whome'] . "'>" . $row['for_whome'] . "</option>
                <option value='Etudiant'>Etudiant</option>
                <option value='Enseignant'>Enseignant</option>";
        echo "</select>
           <input type='text' name='term' value='" . $row['term'] . "' placeholder='Nom de la catégorie' id=''>
           <center><button name='edit_t'>Modifier</button></center>
          </form>";

        if (isset($_POST['edit_t'])) {
            $cat_name = $_POST['term'];
            $cat_id = $_POST['for_whome'];

            $up = $conn->prepare("update terme set term=' $cat_name', for_whome='$cat_id' where t_id='$id'");
            if ($up->execute()) {
                echo "<script>alert('Terme $cat_name a été modifié corrèctement')</script>";
                echo "<script>window.open('index.php?terms', '_self')</script>";
            } else {
                echo "<script>alert('Terme  $cat_name n'a pas été modifié corrèctement')</script>";
                echo "<script>window.open('index.php?terms', '_self')</script>";
            }
        }
    }
}



function add_sub_cat()
{
    include('inc/db.php');
    if (isset($_POST['add_sub_cat'])) {
        $cat_name = $_POST['sub_cat_name'];
        $cat_id = $_POST['cat_id'];

        $check = $conn->prepare("select * from sub_cat where sub_cat_name='$cat_name'");
        $check->setFetchMode(PDO::FETCH_ASSOC);
        $check->execute();
        $count = $check->rowCount();

        if ($count == 1) {
            echo "<script>alert('Sous-catégoirie $cat_name a été ajouter corrèctement')</script>";
            echo "<script>window.open('index.php?sub_cat', '_self')</script>";
        } else {
            $add_cat = $conn->prepare("insert into sub_cat(sub_cat_name,cat_id) values('$cat_name', '$cat_id')");
            if ($add_cat->execute()) {
                echo "<script>alert('Sous-catégoirie $cat_name a été ajouter corrèctement')</script>";
                echo "<script>window.open('index.php?sub_cat', '_self')</script>";
            } else {
                echo "<script>alert('Sous-catégoirie  $cat_name n'a pas été ajouter corrèctement')</script>";
                echo "<script>window.open('index.php?sub_cat', '_self')</script>";
            }
        }
    }
}

function view_cat()
{
    include('inc/db.php');
    $get_cat = $conn->prepare("select * from categorie");
    $get_cat->setFetchMode(PDO::FETCH_ASSOC);
    $get_cat->execute();
    $i = 1;
    while ($row = $get_cat->fetch()) :
        echo "<tr>
                  <td>" . $i++ . "</td>
                  <td>" . $row['cat_name'] . "</td>
                  <td>
                      <a href='index.php?categorie&edit_cat=" . $row['cat_id'] . "' title='Modifier'><i class='far fa-edit' ></i></a>
                      <a style='color: #f00;' href='index.php?categorie&del_cat=" . $row['cat_id'] . "' title='Supprimer'><i class='far fa-trash-alt' ></i></a>
                  </td>
              </tr>";
    endwhile;

    if (isset($_GET['del_cat'])) {
        $id = $_GET['del_cat'];

        $del = $conn->prepare("delete from categorie where cat_id='$id'");
        if ($del->execute()) {
            echo "<script>alert('Catégorie a été supprimer correctement')</script>";
            echo "<script>window.open('index.php?categorie', '_self')</script>";
        } else {
            echo "<script>alert('Catégorie n'a pas été supprimer')</script>";
            echo "<script>window.open('index.php?categorie', '_self')</script>";
        }
    }
}

function view_sub_cat()
{
    include('inc/db.php');
    $get_cat = $conn->prepare("select * from sub_cat");
    $get_cat->setFetchMode(PDO::FETCH_ASSOC);
    $get_cat->execute();
    $i = 1;
    while ($row = $get_cat->fetch()) :
        $id = $row['cat_id'];
        $get_c = $conn->prepare("select * from categorie where cat_id='$id'");
        $get_c->setFetchMode(PDO::FETCH_ASSOC);
        $get_c->execute();
        $row_cat = $get_c->fetch();
        echo "<tr>
                  <td>" . $i++ . "</td>
                  <td>" . $row['sub_cat_name'] . "</td>
                  <td>" . $row_cat['cat_name'] . "</td>
                  <td><a href='index.php?sub_cat&edit_sub_cat=" . $row['sub_cat_id'] . "' title='Modifier'><i class='far fa-edit' ></i></a>
                      <a style='color: #f00;' href='index.php?sub_cat&del_sub_cat=" . $row['sub_cat_id'] . "' title='Supprimer'><i class='far fa-trash-alt' ></i></a>
                  </td>
              </tr>";
    endwhile;

    if (isset($_GET['del_sub_cat'])) {
        $id = $_GET['del_sub_cat'];

        $del = $conn->prepare("delete from sub_cat where sub_cat_id='$id'");
        if ($del->execute()) {
            echo "<script>alert('Sous-catégorie a été supprimer correctement')</script>";
            echo "<script>window.open('index.php?sub_cat', '_self')</script>";
        } else {
            echo "<script>alert('Sous-catégorie n'a pas été supprimer')</script>";
            echo "<script>window.open('index.php?sub_cat', '_self')</script>";
        }
    }
}

function view_lang()
{
    include('inc/db.php');
    $get_lang = $conn->prepare("select * from langue");
    $get_lang->setFetchMode(PDO::FETCH_ASSOC);
    $get_lang->execute();
    $i = 1;
    while ($row = $get_lang->fetch()) :
        echo "<tr>
                  <td>" . $i++ . "</td>
                  <td>" . $row['lang_name'] . "</td>
                  <td><a href='index.php?langue&edit_lang=" . $row['lang_id'] . "' title='Modifier'><i class='far fa-edit' ></i></a>
                      <a style='color: #f00;' href='index.php?langue&del_lang=" . $row['lang_id'] . "'title='Supprimer'><i class='far fa-trash-alt' ></i></a>
                  </td>
              </tr>";
    endwhile;

    if (isset($_GET['del_lang'])) {
        $id = $_GET['del_lang'];

        $del = $conn->prepare("delete from langue where lang_id='$id'");
        if ($del->execute()) {
            echo "<script>alert('Langue a été supprimer correctement')</script>";
            echo "<script>window.open('index.php?langue', '_self')</script>";
        } else {
            echo "<script>alert('Langue n'a pas été supprimer')</script>";
            echo "<script>window.open('index.php?langue', '_self')</script>";
        }
    }
}

function edit_cat()
{
    include('inc/db.php');
    if (isset($_GET['edit_cat'])) {

        $id = $_GET['edit_cat'];
        $get_cat = $conn->prepare("select * from categorie where cat_id='$id'");
        $get_cat->setFetchMode(PDO::FETCH_ASSOC);
        $get_cat->execute();
        $row = $get_cat->fetch();

        echo "<h3>Modifier catégorie</h3>
        <form id='edit_form' action='' method='post' enctype='multipart/form-data'>
            <input type='text' name='cat_name' value='" . $row['cat_name'] . "' placeholder='Nom de la catégorie' id=''>
            <center><button name='edit_cat'>Modifier</button></center>
        </form>";

        if (isset($_POST['edit_cat'])) {
            $cat_name = $_POST['cat_name'];


            $check = $conn->prepare("select * from categorie where cat_name='$cat_name'");
            $check->setFetchMode(PDO::FETCH_ASSOC);
            $check->execute();
            $count = $check->rowCount();

            if ($count == 1) {
                echo "<script>alert('Catégoirie $cat_name a été ajouter corrèctement')</script>";
                echo "<script>window.open('index.php?categorie', '_self')</script>";
            } else {

                $up = $conn->prepare("update categorie set cat_name=' $cat_name' where cat_id='$id'");
                if ($up->execute()) {
                    echo "<script>alert('Catégoirie $cat_name a été modifié corrèctement')</script>";
                    echo "<script>window.open('index.php?categorie', '_self')</script>";
                } else {
                    echo "<script>alert('Catégoirie  $cat_name n'a pas été modifié corrèctement')</script>";
                    echo "<script>window.open('index.php?categorie', '_self')</script>";
                }
            }
        }
    }
}

function edit_lang()
{
    include('inc/db.php');
    if (isset($_GET['edit_lang'])) {

        $id = $_GET['edit_lang'];
        $get_lang = $conn->prepare("select * from langue where lang_id='$id'");
        $get_lang->setFetchMode(PDO::FETCH_ASSOC);
        $get_lang->execute();
        $row = $get_lang->fetch();

        echo "<h3>Modifier langue</h3>
        <form id='edit_form' action='' method='post' enctype='multipart/form-data'>
            <input type='text' name='lang_name' value='" . $row['lang_name'] . "' placeholder='Nom du language' id=''>
            <center><button name='edit_lang'>Modifier</button></center>
        </form>";

        if (isset($_POST['edit_lang'])) {
            $lang_name = $_POST['lang_name'];


            $check = $conn->prepare("select * from langue where lang_name='$lang_name'");
            $check->setFetchMode(PDO::FETCH_ASSOC);
            $check->execute();
            $count = $check->rowCount();

            if ($count == 1) {
                echo "<script>alert('Langue $lang_name a été ajouter corrèctement')</script>";
                echo "<script>window.open('index.php?langue', '_self')</script>";
            } else {

                $up = $conn->prepare("update langue set lang_name=' $lang_name' where lang_id='$id'");
                if ($up->execute()) {
                    echo "<script>alert('La langue $lang_name a été modifié corrèctement')</script>";
                    echo "<script>window.open('index.php?langue', '_self')</script>";
                } else {
                    echo "<script>alert('La langue  $lang_name n'a pas été modifié corrèctement')</script>";
                    echo "<script>window.open('index.php?langue', '_self')</script>";
                }
            }
        }
    }
}

function edit_sub_cat()
{
    include('inc/db.php');
    if (isset($_GET['edit_sub_cat'])) {

        $id = $_GET['edit_sub_cat'];
        $get_cat = $conn->prepare("select * from sub_cat where sub_cat_id='$id'");
        $get_cat->setFetchMode(PDO::FETCH_ASSOC);
        $get_cat->execute();
        $row = $get_cat->fetch();

        $cat_id = $row['cat_id'];
        $get_c = $conn->prepare("select * from categorie where  cat_id= '$cat_id'");
        $get_c->setFetchMode(PDO::FETCH_ASSOC);
        $get_c->execute();
        $row_cat = $get_c->fetch();

        echo "<h3>Modifier sous-catégorie</h3>
        <form id='edit_form' action='' method='post' enctype='multipart/form-data'>
            <select name='cat_id' id=''>
                <option value='" . $row_cat['cat_id'] . "'>" . $row_cat['cat_name'] . "</option>";
        echo select_cat();
        echo "</select>
           <input type='text' name='sub_cat_name' value='" . $row['sub_cat_name'] . "' placeholder='Nom de la catégorie' id=''>
           <center><button name='edit_sub_cat'>Modifier</button></center>
          </form>";

        if (isset($_POST['edit_sub_cat'])) {
            $cat_name = $_POST['sub_cat_name'];
            $cat_id = $_POST['cat_id'];

            $up = $conn->prepare("update sub_cat set sub_cat_name=' $cat_name', cat_id='$cat_id' where sub_cat_id='$id'");
            if ($up->execute()) {
                echo "<script>alert('Catégoirie $cat_name a été modifié corrèctement')</script>";
                echo "<script>window.open('index.php?sub_cat', '_self')</script>";
            } else {
                echo "<script>alert('Catégoirie  $cat_name n'a pas été modifié corrèctement')</script>";
                echo "<script>window.open('index.php?sub_cat', '_self')</script>";
            }
        }
    }
}


function add_lang()
{
    include('inc/db.php');
    if (isset($_POST['add_lang'])) {
        $lang_name = $_POST['lang_name'];

        $check = $conn->prepare("select * from langue where lang_name='$lang_name'");
        $check->setFetchMode(PDO::FETCH_ASSOC);
        $check->execute();
        $count = $check->rowCount();

        if ($count == 1) {
            echo "<script>alert('Languages $lang_name a été ajouter corrèctement')</script>";
            echo "<script>window.open('index.php?langue', '_self')</script>";
        } else {
            $add_lang = $conn->prepare("insert into langue(lang_name) values('$lang_name')");
            if ($add_lang->execute()) {
                echo "<script>alert('Languages $lang_name a été ajouter corrèctement')</script>";
                echo "<script>window.open('index.php?langue', '_self')</script>";
            } else {
                echo "<script>alert('Languages  $lang_name n'a pas été ajouter corrèctement')</script>";
                echo "<script>window.open('index.php?langue', '_self')</script>";
            }
        }
    }
}

function contact()
{
    include("inc/db.php");
    $get_con = $conn->prepare("select * from contact");
    $get_con->setFetchMode(PDO::FETCH_ASSOC);
    $get_con->execute();
    $row = $get_con->fetch();

    echo "<form action='' method='post' enctype='multipart/form-data'>
    <form action=''>
        <table>
            <tr>
                <td>Modifier numéro de contact:</td>
                <td><input type='tel' value='" . $row['phn'] . "' name='phn'></td>
            </tr>
            <tr>
                <td>Modifier adresse email:</td>
                <td><input type='email' name='email'  value='" . $row['email'] . "'></td>
            </tr>
            <tr>
                <td>Modifier adresse 1:</td>
                <td><input type='text' name='add1' value='" . $row['add1'] . "'></td>
            </tr>
            <tr>
                <td>Modifier adresse 2:</td>
                <td><input type='tel' name='add2' value='" . $row['add2'] . "'></td>
            </tr>
            <tr>
                <td>Modifier lien youtube:</td>
                <td><input type='text' name='yt' value='" . $row['yt'] . "'></td>
            </tr>
            <tr>
                <td>Modifier lien facebook:</td>
                <td><input type='text' name='fb' value='" . $row['fb'] . "'></td>
            </tr>
            <tr>
                <td>Modifier lien google plus:</td>
                <td><input type='text' name='gp' value='" . $row['gp'] . "'></td>
            </tr>
            <tr>
                <td>Modifier lien twiter</td>
                <td><input type='text' name='tw' value='" . $row['tw'] . "'></td>
            </tr>
            <tr>
                <td>Modifier lien linkdlen:</td>
                <td><input type='text' name='link' value='" . $row['link'] . "'></td>
            </tr>
        </table>
        <center> <button name='up_con'>Sauvegarder</button></center>
    </form>
</form>";

    if (isset($_POST['up_con'])) {
        $phn = $_POST['phn'];
        $email = $_POST['email'];
        $add1 = $_POST['add1'];
        $add2 = $_POST['add2'];
        $fb = $_POST['fb'];
        $yt = $_POST['yt'];
        $gp = $_POST['gp'];
        $tw = $_POST['tw'];
        $link = $_POST['link'];

        $up = $conn->prepare("update contact set email='$email', add1='$add1', 
                add2='$add2', yt='$yt', fb='$fb', gp='$gp', tw='$tw',link='$link',phn='$phn'");
        if ($up->execute()) {
            // echo "<script>alert('Contact a été ajouter corrèctement')</script>";
            echo "<script>window.open('index.php?contact', '_self')</script>";
        }
    }
}


function add_faqs()
{
    include('inc/db.php');
    if (isset($_POST['add_faqs'])) {
        $qsn = $_POST['qsn'];
        $ans = $_POST['ans'];

        $check = $conn->prepare("select * from faqs where qsn='$qsn'");
        $check->setFetchMode(PDO::FETCH_ASSOC);
        $check->execute();
        $count = $check->rowCount();

        if ($count == 1) {
            echo "<script>alert('Faqs a été ajouter corrèctement')</script>";
            echo "<script>window.open('index.php?faqs', '_self')</script>";
        } else {
            $add_cat = $conn->prepare("insert into faqs(qsn,ans) values('$qsn','$ans')");
            if ($add_cat->execute()) {
                echo "<script>alert('Faqs  a été ajouter corrèctement')</script>";
                echo "<script>window.open('index.php?faqs', '_self')</script>";
            } else {
                echo "<script>alert('Faqs n'a pas été ajouter corrèctement')</script>";
                echo "<script>window.open('index.php?faqs', '_self')</script>";
            }
        }
    }
}

function about()
{
    include("inc/db.php");

    $about = $conn->prepare("select * from about");
    $about->setFetchMode(PDO::FETCH_ASSOC);
    $about->execute();
    $row = $about->fetch();

    echo "<form action='' method='post'>
    <textarea name='about' id='' cols='30' rows='10'>" . $row['about'] . "</textarea>
    <button name='up_about'>Sauvegarder</button>
    </form>";

    if (isset($_POST['up_about'])) {
        $info = $_POST['about'];

        $up_about = $conn->prepare("update about set about='$info'");
        if ($up_about->execute()) {
            # code...
            echo "<script>window.open('index.php?about', '_self')</script>";
        } else {
            echo "<script>alert('Information n'a pas été modiffier corrèctement')</script>";
            echo "<script>window.open('index.php?about', '_self')</script>";
        }
    }
}

function select_sub_cat()
{
    include "inc/db.php";
    $get_sub_cat = $conn->prepare("select * from sub_cat");
    $get_sub_cat->setFetchMode(PDO::FETCH_ASSOC);
    $get_sub_cat->execute();
    while ($row = $get_sub_cat->fetch()) :
        echo "<option value='" . $row['sub_cat_id'] . "'>" . $row['sub_cat_name'] . "</option>";
    endwhile;
}


function add_type()
{
    include('inc/db.php');
    if (isset($_POST['add_ebook'])) {
        $cat_name = $_POST['type'];
        $cat_id = $_POST['cat_id'];
        $sub_cat_id = $_POST['sub_cat_id'];

        $check = $conn->prepare("select * from type where ebook='$cat_name'");
        $check->setFetchMode(PDO::FETCH_ASSOC);
        $check->execute();
        $count = $check->rowCount();

        if ($count == 1) {
            echo "<script>alert('Le type que vous avez ajouté existe déjà')</script>";
            echo "<script>window.open('index.php?type', '_self')</script>";
        } else {
            $add_cat = $conn->prepare("insert into type(cat_id,sub_cat_id,ebook) values('$cat_id','$sub_cat_id','$cat_name')");
            if ($add_cat->execute()) {
                echo "<script>alert('Type d'ebook a été ajouter corrèctement')</script>";
                echo "<script>window.open('index.php?type', '_self')</script>";
            } else {
                echo "<script>alert('Type d'ebook  n'a pas été ajouter corrèctement')</script>";
                echo "<script>window.open('index.php?type', '_self')</script>";
            }
        }
    }
}


function view_type()
{
    include('inc/db.php');
    $get_cat = $conn->prepare("select * from ebookstype");
    $get_cat->setFetchMode(PDO::FETCH_ASSOC);
    $get_cat->execute();
    $i = 1;
    while ($row = $get_cat->fetch()) :
        $id = $row['cat_id'];
        $id_sub = $row['sub_cat_id'];

        $get_sub = $conn->prepare("select * from sub_cat where sub_cat_id='$id_sub'");
        $get_sub->setFetchMode(PDO::FETCH_ASSOC);
        $get_sub->execute();
        $row_sub_cat = $get_sub->fetch();

        $get_c = $conn->prepare("select * from categorie where cat_id='$id'");
        $get_c->setFetchMode(PDO::FETCH_ASSOC);
        $get_c->execute();
        $row_cat = $get_c->fetch();
        echo "<tr>
                  <td>" . $i++ . "</td>
                  <td>" . $row['ebook'] . "</td>
                  <td>" . $row_cat['cat_name'] . "</td>
                  <td>" . $row_sub_cat['sub_cat_name'] . "</td>
                  <td><a href='index.php?type&edit_type=" . $row['eb_id'] . "' title='Modifier'><i class='far fa-edit' ></i></a>
                      <a style='color: #f00;' href='index.php?type&del_type=" . $row['eb_id'] . "' title='Supprimer'><i class='far fa-trash-alt' ></i></a>
                  </td>
              </tr>";
    endwhile;

    if (isset($_GET['del_type'])) {
        $id = $_GET['del_type'];

        $del = $conn->prepare("delete from ebookstype where eb_id='$id'");
        if ($del->execute()) {
            echo "<script>alert('Type d'ebook a été supprimer correctement')</script>";
            echo "<script>window.open('index.php?type', '_self')</script>";
        } else {
            echo "<script>alert('Type d'ebook n'a pas été supprimer')</script>";
            echo "<script>window.open('index.php?type', '_self')</script>";
        }
    }
}

function edit_type()
{
    include('inc/db.php');
    if (isset($_GET['edit_type'])) {

        $id = $_GET['edit_type'];
        $get_cat = $conn->prepare("select * from ebookstype where eb_id='$id'");
        $get_cat->setFetchMode(PDO::FETCH_ASSOC);
        $get_cat->execute();
        $row = $get_cat->fetch();

        $cat_id = $row['cat_id'];
        $get_c = $conn->prepare("select * from categorie where  cat_id= '$cat_id'");
        $get_c->setFetchMode(PDO::FETCH_ASSOC);
        $get_c->execute();
        $row_cat = $get_c->fetch();

        $sub_cat_id = $row['sub_cat_id'];
        $get_sub = $conn->prepare("select * from sub_cat where sub_cat_id='$sub_cat_id'");
        $get_sub->setFetchMode(PDO::FETCH_ASSOC);
        $get_sub->execute();
        $row_sub_cat = $get_sub->fetch();

        echo "<h3>Modifier Type</h3>";

        echo "</select>
        <form id='edit_form' action='' method='post' enctype='multipart/form-data'>
            <select name='cat_id' id=''>
                <option value='" . $row_cat['cat_id'] . "'>" . $row_cat['cat_name'] . "</option>";
        echo select_cat();
        echo "</select>";
        echo " <select name='sub_cat_id' id=''>
        <option value='" . $row_sub_cat['sub_cat_id'] . "'>" . $row_sub_cat['sub_cat_name'] . "</option>";
        echo select_sub_cat();
        echo "</select>";
        echo "  <input type='text' name='ebook' value='" . $row['ebook'] . "' placeholder='Nom de la type d'ebbok' id=''>
           <center><button name='edit_type'>Modifier</button></center>
          </form>";

        if (isset($_POST['edit_type'])) {
            $cat_name = $_POST['ebook'];
            $cat_id = $_POST['cat_id'];
            $sub_cat_id = $_POST['sub_cat_id'];

            $up = $conn->prepare("update ebookstype set ebook=' $cat_name', cat_id='$cat_id', sub_cat_id ='$sub_cat_id'  where eb_id='$id'");
            if ($up->execute()) {
                echo "<script>alert('Type d'ebook a été modifié corrèctement')</script>";
                echo "<script>window.open('index.php?type', '_self')</script>";
            } else {
                echo "<script>alert('type d'ebook  n'a pas été modifié corrèctement')</script>";
                echo "<script>window.open('index.php?type', '_self')</script>";
            }
        }
    }
}
