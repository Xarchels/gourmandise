<?php
/* Smarty version 3.1.34-dev-7, created on 2022-03-28 13:28:40
  from 'C:\laragon\www\gourmandise\mvc-goo-08\mod_commande\vue\commandeFicheAjouterVue.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_6241b80849fbc6_44691317',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ba21b636fc90bc70e6c165975a3c06f20b50887f' => 
    array (
      0 => 'C:\\laragon\\www\\gourmandise\\mvc-goo-08\\mod_commande\\vue\\commandeFicheAjouterVue.tpl',
      1 => 1648474117,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:public/left.tpl' => 1,
    'file:public/header.tpl' => 1,
  ),
),false)) {
function content_6241b80849fbc6_44691317 (Smarty_Internal_Template $_smarty_tpl) {
?><!doctype html>
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
    <meta name="description" content=<?php echo $_smarty_tpl->tpl_vars['titreVue']->value;?>
>
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
                    <h1>Gourmandise...</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="index.php">Accueil</a></li>
                        <li><a href="index.php?gestion=commande">Commandes</a></li>
                        <li class="active"><?php echo $_smarty_tpl->tpl_vars['titrePage']->value;?>
</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div <?php if (CommandeTable::getMessageErreur() != '') {?> class="alert alert-danger" <?php } elseif (CommandeTable::getMessageSucces() != '') {?> class="alert alert-success" <?php }?>>
        <?php if (CommandeTable::getMessageErreur() == '') {?>
            <?php echo CommandeTable::getMessageSucces();?>

        <?php }?>
        <?php echo CommandeTable::getMessageErreur();?>

    </div>

    <div class="content mt-3">
        <div class="animated fadeIn">

            <div class="row">
                <div class="col-md-12">

                    <div class="card">
                        <div class="card-header">
                            <form action="index.php" method="post">
                                <label>
                                    <strong class="card-title">Voir le panier :</strong>
                                    <input type="hidden" name="gestion" value="commande">
                                    <input type="hidden" name="action" value="panier">
                                    <input type="hidden" name="numero" value="<?php echo $_smarty_tpl->tpl_vars['uneCommande']->value->getNumero();?>
">
                                    <input type="image" src="public/images/icones/p16.png"
                                           name="btn-panier">
                                </label>
                            </form>
                        </div>

                        <div class="card-body card-block">

                            <div class="form-group">
                                <div class="col-md-5">
                                    Total HT (en €) :
                                </div>
                                <div class="col-md-7">
                                    <form action="index.php" method="post">
                                        <input class="form-control" type="text" name="txt_total"
                                               value="<?php echo $_smarty_tpl->tpl_vars['uneCommande']->value->getTotal_ht();?>
"
                                               readonly>
                                    </form>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-5">
                                    Quantité d'article(s) dans le panier :
                                </div>
                                <div class="col-md-7">
                                    <form action="index.php" method="post">
                                        <input class="form-control" type="text" name="txt_qte" value="" readonly>
                                    </form>
                                </div>
                            </div>


                        </div>
                    </div>


                </div>

                <div class="col-md-12">

                    <!-- Liste lignes de commande -->

                    <div class="card-body">
                        <div class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Référence</th>
                                    <th>Désignation</th>
                                    <th>Stock</th>
                                    <th>Prix HT</th>
                                    <th>Prix Vente</th>
                                    <th>Quantité</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['listeProduits']->value, 'produit');
$_smarty_tpl->tpl_vars['produit']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['produit']->value) {
$_smarty_tpl->tpl_vars['produit']->do_else = false;
?>
                                    <tr>
                                        <td><?php echo $_smarty_tpl->tpl_vars['produit']->value->getReference();?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['produit']->value->getDesignation();?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['produit']->value->getStock();?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['produit']->value->getPrix_unitaire_HT();?>
</td>
                                        <td><input type="text" name="f_prixVente" value="<?php echo number_format($_smarty_tpl->tpl_vars['produit']->value->getPrix_unitaire_HT()*1.357,2);?>
" size="5"></td>
                                        <td><input type="number" name="f_quantite" value="" size="1"></td>
                                        <td>
                                            <form method="post" action="index.php">
                                                <input type="hidden" name="gestion" value="produit">
                                                <input type="hidden" name="action" value="form_consulter">
                                                <input type="hidden" name="reference"
                                                       value="<?php echo $_smarty_tpl->tpl_vars['produit']->value->getReference();?>
">
                                                <input type="image" src="public/images/icones/a16.png"
                                                       name="btn-ajouter">
                                            </form>
                                        </td>
                                    <?php
}
if ($_smarty_tpl->tpl_vars['produit']->do_else) {
?>
                                    <tr>
                                        <td colspan="7">
                                            Aucun enregistrement trouvé
                                        </td>
                                    </tr>
                                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                    <div class="card-body card-block">
                        <div class="col-md-6">
                            <input type="button" class="btn btn-submit" name="btn_retour" value="Retour"
                                   onclick="location.href ='index.php?gestion=commande'">
                        </div>
                    </div>
                </div>

            </div>
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
