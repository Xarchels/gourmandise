<?php
/* Smarty version 3.1.34-dev-7, created on 2022-03-24 16:06:56
  from 'C:\laragon\www\gourmandise\mvc-goo-08\mod_commande\vue\commandeFicheVue.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_623c9720a60432_09772343',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e9076f86ef0cd8493e3ed8d3cf06499aa49e15b4' => 
    array (
      0 => 'C:\\laragon\\www\\gourmandise\\mvc-goo-08\\mod_commande\\vue\\commandeFicheVue.tpl',
      1 => 1648137922,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:public/left.tpl' => 1,
    'file:public/header.tpl' => 1,
  ),
),false)) {
function content_623c9720a60432_09772343 (Smarty_Internal_Template $_smarty_tpl) {
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

                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title"><?php echo $_smarty_tpl->tpl_vars['titrePage']->value;?>
</strong>
                            </div>

                            <div class="card-body card-block">

                                <div class="form-group">Numéro : <?php echo $_smarty_tpl->tpl_vars['uneCommande']->value->getNumero();?>
</div>
                                <div class="form-group">Vendeur
                                    : <?php echo $_smarty_tpl->tpl_vars['uneCommande']->value->getVendeurPrenom();?>
 <?php echo $_smarty_tpl->tpl_vars['uneCommande']->value->getVendeurNom();?>
</div>
                                <div class="form-group">Code Client : <?php echo $_smarty_tpl->tpl_vars['uneCommande']->value->getCodec();?>
</div>
                                <div class="form-group">Client : <?php echo $_smarty_tpl->tpl_vars['uneCommande']->value->getClient();?>
</div>


                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">

                        <div class="card">
                            <div class="card-header"><strong>Etat de la commande</strong></div>
                            <div class="card-body card-block">
                                <div class="form-group">Date de commande :
                                    <?php echo $_smarty_tpl->tpl_vars['uneCommande']->value->getDate_commande()->format('d/m/Y');?>
</div>
                                <?php if ($_smarty_tpl->tpl_vars['action']->value == 'modifier' || $_smarty_tpl->tpl_vars['action']->value == 'form_modifier') {?>
                                    <form action="index.php" method="post">
                                        <input type="hidden" name="gestion" value="commande">
                                        <input type="hidden" name="action" value="maj_date">
                                        <input type="hidden" name="numero" value="<?php echo $_smarty_tpl->tpl_vars['uneCommande']->value->getNumero();?>
">
                                        <input type="hidden" name="date_commande" value="<?php echo $_smarty_tpl->tpl_vars['uneCommande']->value->getDate_commande()->format('Y-m-d');?>
">
                                        <div class="form-group">
                                            Date de livraison :
                                            <input type="date" name="date_livraison"
                                                   value="<?php echo $_smarty_tpl->tpl_vars['uneCommande']->value->getDate_livraison()->format('Y-m-d');?>
">
                                            <input type="image" name="btn_modifier" src="public/images/icones/p16.png"">

                                        </div>
                                    </form>
                                <?php } else { ?>
                                    <div class="form-group">Date de livraison : <?php echo $_smarty_tpl->tpl_vars['uneCommande']->value->getDate_livraison()->format('d/m/Y');?>
</div>
                                <?php }?>
                                <div class="form-group">Total HT : <?php echo $_smarty_tpl->tpl_vars['uneCommande']->value->getTotal_ht();?>
</div>
                                <div class="form-group">Statut de la commande :
                                    <?php if ($_smarty_tpl->tpl_vars['uneCommande']->value->getStatut() == 'V') {?>
                                        Validée
                                    <?php } elseif ($_smarty_tpl->tpl_vars['uneCommande']->value->getStatut() == 'NV') {?>
                                        Non validée
                                    <?php } elseif ($_smarty_tpl->tpl_vars['uneCommande']->value->getStatut() == 'A') {?>
                                        Annulée
                                    <?php }?>
                                </div>

                            </div>
                        </div>
                    </div>


                </div>

                <div class="col-md-12">
                    <!-- Liste lignes de commande -->

                    <div class="card-body">
                        <table class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>N° Ligne</th>
                                <th>Référence</th>
                                <th>Désignation</th>
                                <th>Quantité</th>
                                <th>prix</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['uneCommande']->value->getListeLigneCommande(), 'ligne');
$_smarty_tpl->tpl_vars['ligne']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['ligne']->value) {
$_smarty_tpl->tpl_vars['ligne']->do_else = false;
?>
                                <tr>
                                    <td><?php echo $_smarty_tpl->tpl_vars['ligne']->value->getNumero_ligne();?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['ligne']->value->getReference();?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['ligne']->value->getDesignation();?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['ligne']->value->getQuantite_demandee();?>
</td>
                                    <td><?php echo number_format(round($_smarty_tpl->tpl_vars['ligne']->value->getPrix()*1.357,2),2);?>
</td>
                                </tr>
                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            <tr>
                                <td colspan="3"> Montant de la commande : <?php echo $_smarty_tpl->tpl_vars['uneCommande']->value->getTotal_ht();?>
 €</td>
                                <td colspan="2"> Total TVA : <?php echo $_smarty_tpl->tpl_vars['uneCommande']->value->getTotal_tva();?>
 €</td>
                            </tr>
                            </tbody>
                        </table>


                    </div>
                    <div class="card-body card-block">
                        <div class="col-md-6">
                            <input type="button" class="btn btn-submit" name="btn_retour" value="Retour"
                                   onclick="location.href ='index.php?gestion=commande'">
                        </div>
                        <div class="col-md-6 ">
                            <?php if ($_smarty_tpl->tpl_vars['action']->value == 'modifier') {?>
                                <form action="index.php" method="POST">
                                    <input type="hidden" name="gestion" value="commande">
                                    <input type="hidden" name="action" value="finaliser">
                                    <input type="submit" class="btn btn-submit pos-btn-action" name="btn_finaliser"
                                           value="Finaliser">
                                </form>
                            <?php }?>
                        </div>

                        <br>
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
