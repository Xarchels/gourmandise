<?php
/* Smarty version 3.1.34-dev-7, created on 2022-03-28 13:28:48
  from 'C:\laragon\www\gourmandise\mvc-goo-08\mod_produit\vue\produitFicheVue.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_6241b810e92523_22996017',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '335634135d0f14332ed0cea32bc3b58ae0e7d5ba' => 
    array (
      0 => 'C:\\laragon\\www\\gourmandise\\mvc-goo-08\\mod_produit\\vue\\produitFicheVue.tpl',
      1 => 1648035650,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:public/left.tpl' => 1,
    'file:public/header.tpl' => 1,
  ),
),false)) {
function content_6241b810e92523_22996017 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\laragon\\www\\gourmandise\\mvc-goo-08\\include\\libs\\plugins\\modifier.capitalize.php','function'=>'smarty_modifier_capitalize',),));
?>
<!doctype html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $_smarty_tpl->tpl_vars['titreVue']->value;?>
</title>
    <meta name="description" content="<?php echo $_smarty_tpl->tpl_vars['titreVue']->value;?>
">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="public/favicon.ico">

    <link rel="stylesheet" href="public/assets/css/normalize.css">
    <link rel="stylesheet" href="public/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="public/assets/css/themify-icons.css">
    <link rel="stylesheet" href="public/assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="public/assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="public/assets/css/lib/datatable/dataTables.bootstrap.min.css">
    <!-- <link rel="stylesheet" href="template/assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="public/assets/scss/style.css">
    <link href="public/assets/css/lib/vector-map/jqvmap.min.css" rel="stylesheet">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <?php echo '<script'; ?>
 type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"><?php echo '</script'; ?>
> -->

</head>
<body>


<!-- Left Panel -->


<?php $_smarty_tpl->_subTemplateRender('file:public/left.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<!-- FIN : Left Panel -->


<!-- Right Panel -->

<div id="right-panel" class="right-panel">

    <!--Header -->

    <?php $_smarty_tpl->_subTemplateRender('file:public/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    <!-- FIN : header -->


    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>La gourmandise, ça se partage !</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="index.php">Accueil</a></li>
                        <li><a href="index.php?gestion=produit">Produits</a></li>
                        <li class="active"><?php echo $_smarty_tpl->tpl_vars['titrePage']->value;?>
</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div <?php if (ProduitTable::getMessageErreur() != '') {?> class="alert alert-danger"<?php }?>>
        <?php echo ProduitTable::getMessageErreur();?>

    </div>

    <div class="content mt-3">
        <div class="animated fadeIn">

            <div class="row">

                <div class="col-md-6">

                    <div class="card">
                        <div class="card-header"><strong><?php echo $_smarty_tpl->tpl_vars['titrePage']->value;?>
</strong></div>
                        <div class="card-body">
                            <form action="index.php" method="POST">
                                <input type="hidden" name="gestion" value="produit">
                                <input type="hidden" name="action" value="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
">
                                <?php if ($_smarty_tpl->tpl_vars['action']->value != 'ajouter') {?>
                                    <div class="form-group">
                                        <label class="form-control-label">Reference :</label>
                                        <input class="form-control" name="reference"
                                               value="<?php echo $_smarty_tpl->tpl_vars['unProduit']->value->getReference();?>
"
                                               readonly>
                                    </div>
                                <?php }?>
                                <div class="form-group">
                                    <label class="form-control-label">Désignation :</label>
                                    <input class="form-control" type="text" name="designation"
                                           value="<?php echo $_smarty_tpl->tpl_vars['unProduit']->value->getDesignation();?>
"
                                            <?php echo $_smarty_tpl->tpl_vars['readonly']->value;?>
>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">Quantité :</label>
                                    <input class="form-control" type="text" name="quantite"
                                           value="<?php echo $_smarty_tpl->tpl_vars['unProduit']->value->getQuantite();?>
"
                                            <?php echo $_smarty_tpl->tpl_vars['readonly']->value;?>
>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">descriptif :</label>
                                    <input class="form-control" type="text" name="descriptif"
                                           value="<?php echo $_smarty_tpl->tpl_vars['unProduit']->value->getDescriptif();?>
"
                                            <?php echo $_smarty_tpl->tpl_vars['readonly']->value;?>
>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">Prix unitaire HT :</label>
                                    <input class="form-control" type="text" name="prix_unitaire_HT"
                                           value="<?php echo $_smarty_tpl->tpl_vars['unProduit']->value->getPrix_unitaire_HT();?>
" <?php echo $_smarty_tpl->tpl_vars['readonly']->value;?>
>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">Stock :</label>
                                    <input class="form-control" type="text" name="stock"
                                           value="<?php echo $_smarty_tpl->tpl_vars['unProduit']->value->getStock();?>
"
                                            <?php echo $_smarty_tpl->tpl_vars['readonly']->value;?>
>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">Poids pièce :</label>
                                    <input class="form-control" type="text" name="poids_piece"
                                           value="<?php echo $_smarty_tpl->tpl_vars['unProduit']->value->getPoids_piece();?>
"
                                            <?php echo $_smarty_tpl->tpl_vars['readonly']->value;?>
>
                                </div>
                                <div>
                                    <input class="btn btn-submit" type="button" name="btn_retour" value="Retour"
                                           onclick="location.href='index.php?gestion=produit'">
                                                                        <?php if ($_smarty_tpl->tpl_vars['action']->value != 'consulter') {?>
                                        <button class="btn btn-submit float-right" type="submit"
                                                name="btn_action"><?php echo smarty_modifier_capitalize($_smarty_tpl->tpl_vars['action']->value);?>
</button>
                                    <?php }?>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <?php if ($_smarty_tpl->tpl_vars['action']->value != 'ajouter') {?>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card">
                                <div class="card-header">
                                    <strong class="card-title">Statistiques et informations</strong>
                                </div>
                                <div class="card-body">
                                    <p class="card-text">Prix au kilogramme :</p>
                                    <p class="card-text"><strong><?php echo $_smarty_tpl->tpl_vars['unProduit']->value->getPrixKilo();?>
</strong> €</p>
                                    <br>
                                    <p class="card-text">Classement :</p>
                                    <p class="card-text">L'article <strong><?php echo $_smarty_tpl->tpl_vars['unProduit']->value->getDesignation();?>
</strong> est
                                        actuellement en position <strong><?php echo $_smarty_tpl->tpl_vars['unProduit']->value->getPlace();?>
</strong> parmi les
                                        meilleures ventes</p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }?>
            </div><!-- .animated -->
        </div><!-- .content -->


    </div><!-- /#right-panel -->

    <!-- Right Panel -->
    <?php echo '<script'; ?>
 src="public/assets/js/vendor/jquery-2.1.4.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="public/assets/js/plugins.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="public/assets/js/main.js"><?php echo '</script'; ?>
>


    <?php echo '<script'; ?>
 src="public/assets/js/lib/data-table/datatables.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="public/assets/js/lib/data-table/dataTables.bootstrap.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="public/assets/js/lib/data-table/dataTables.buttons.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="public/assets/js/lib/data-table/buttons.bootstrap.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="public/assets/js/lib/data-table/jszip.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="public/assets/js/lib/data-table/pdfmake.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="public/assets/js/lib/data-table/vfs_fonts.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="public/assets/js/lib/data-table/buttons.html5.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="public/assets/js/lib/data-table/buttons.print.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="public/assets/js/lib/data-table/buttons.colVis.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="public/assets/js/lib/data-table/datatables-init.js"><?php echo '</script'; ?>
>


    <?php echo '<script'; ?>
 type="text/javascript">
        $(document).ready(function () {
            $('#bootstrap-data-table-export').DataTable();
        });
    <?php echo '</script'; ?>
>

</body>
</html>
<?php }
}
