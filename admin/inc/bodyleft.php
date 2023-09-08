<div id="bodyleft">
    <h3>Gestion des catégoiries</h3>
    <ul>
        <li><a href="index.php"><i class="fas fa-home"></i> Dashboard</a></li>
        <li> <a href="index.php?categorie"><i class="fas fa-th"></i> Catégories</a></li>
        <li> <a href="index.php?sub_cat"><i class="fas fa-th"></i> Sous-catégories</a></li>
        <li> <a href="index.php?langue">Vue languages</a></li>
        <li> <a href="index.php?type">Type d'ebook</a></li>
    </ul>
    <h3>Gestion des cours</h3>
    <ul>
        <li><a href="#">Cours Actifs</a></li>
        <li> <a href="#">Pending cours</a></li>
        <li> <a href="#">Cours non publiés</a></li>
        <li> <a href="#">Rechèche avancée du cours</a></li>
    </ul>
    <h3>Gestion des utilisateurs</h3>
    <ul>
        <li><a href="#">Voir tout les éudiants</a></li>
        <li> <a href="#">Voir tout les ensegnants</a></li>
        <li> <a href="#">Rechèche avancée</a></li>
    </ul>
    <h3>Gestion des payemants</h3>
    <ul>
        <li><a href="#">Payé au ensegnants</a></li>
        <li> <a href="#">Payement complet</a></li>
        <li> <a href="#">Rechèche de payemants</a></li>
    </ul>
    <h3>Gestion des pages</h3>
    <ul>
        <li><a href="index.php?terms">Page térmes et conditions</a></li>
        <li> <a href="index.php?contact">Page nous contacé</a></li>
        <li> <a href="index.php?about">Page à propos</a></li>
        <li> <a href="index.php?faqs">FAQs page</a></li>
        <li> <a href="#">Page modifier slider</a></li>
        <li> <a href="#">Page modifier slider</a></li>
    </ul>
</div>

<?php
if (isset($_GET['categorie'])) {
    include("categories.php");
}

if (isset($_GET['langue'])) {
    include("langue.php");
}

if (isset($_GET['sub_cat'])) {
    include("sousCategorie.php");
}

if (isset($_GET['terms'])) {
    include("terms.php");
}

if (isset($_GET['contact'])) {
    include("contact.php");
}

if (isset($_GET['faqs'])) {
    include("faqs.php");
}

if (isset($_GET['about'])) {
    include("about.php");
}

if (isset($_GET['type'])) {
    include("type.php");
}
