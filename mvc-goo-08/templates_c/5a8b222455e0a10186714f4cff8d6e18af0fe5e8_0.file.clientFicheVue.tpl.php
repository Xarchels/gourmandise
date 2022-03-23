<?php
/* Smarty version 3.1.34-dev-7, created on 2022-03-22 15:44:06
  from 'C:\laragon\www\gourmandise\mvc-goo-08\mod_client\vue\clientFicheVue.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_6239eec60141d8_96862041',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5a8b222455e0a10186714f4cff8d6e18af0fe5e8' => 
    array (
      0 => 'C:\\laragon\\www\\gourmandise\\mvc-goo-08\\mod_client\\vue\\clientFicheVue.tpl',
      1 => 1647963805,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:public/left.tpl' => 1,
    'file:public/header.tpl' => 1,
  ),
),false)) {
function content_6239eec60141d8_96862041 (Smarty_Internal_Template $_smarty_tpl) {
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
                        <li><a href="index.php?gestion=client">Clients</a></li>
                        <li class="active"><?php echo $_smarty_tpl->tpl_vars['titrePage']->value;?>
</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div <?php if (ClientTable::getMessageErreur() != '') {?> class="alert alert-danger"<?php }?>>
        <?php echo ClientTable::getMessageErreur();?>

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
                                <!-- PLACER LE FORMULAIRE EN CONSULTATION -->
                                <input type="hidden" name="gestion" value="client">
                                <input type="hidden" name="action" value="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
">
                                    <?php if ($_smarty_tpl->tpl_vars['action']->value != 'ajouter') {?>
                                        <div class="form-group">
                                            <label class="form-control-label">Code Client :</label>
                                            <input class="form-control" name="codec" value="<?php echo $_smarty_tpl->tpl_vars['unClient']->value->getCodec();?>
"
                                                   readonly>
                                        </div>
                                    <?php }?>
                                    <div class="form-group">
                                        <label class="form-control-label">Prénom Nom :</label>
                                        <input class="form-control" type="text" name="nom" value="<?php echo $_smarty_tpl->tpl_vars['unClient']->value->getNom();?>
"
                                                <?php echo $_smarty_tpl->tpl_vars['readonly']->value;?>
>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label">Adresse :</label>
                                        <input class="form-control" type="text" name="adresse"
                                               value="<?php echo $_smarty_tpl->tpl_vars['unClient']->value->getAdresse();?>
"
                                                <?php echo $_smarty_tpl->tpl_vars['readonly']->value;?>
>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label">Code postal :</label>
                                        <input class="form-control" type="text" name="cp" value="<?php echo $_smarty_tpl->tpl_vars['unClient']->value->getCp();?>
"
                                                <?php echo $_smarty_tpl->tpl_vars['readonly']->value;?>
>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label">Ville :</label>
                                        <input class="form-control" type="text" name="ville"
                                               value="<?php echo $_smarty_tpl->tpl_vars['unClient']->value->getVille();?>
" <?php echo $_smarty_tpl->tpl_vars['readonly']->value;?>
>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label">Téléphone :</label>
                                        <input class="form-control" type="text" name="telephone"
                                               value="<?php echo $_smarty_tpl->tpl_vars['unClient']->value->getTelephone();?>
"
                                                <?php echo $_smarty_tpl->tpl_vars['readonly']->value;?>
>
                                    </div>
                                <div>
                                    <input class="btn btn-submit" type="button" name="btn_retour" value="Retour"
                                           onclick="location.href='index.php?gestion=client'">
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
                <div class="col-md-6">
                    <div class="card">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Statistiques</strong>
                            </div>
                            <div class="card-body">
                                <p class="card-text">CA réalisé :</p>
                                <p class="card-text"> <strong><?php echo $_smarty_tpl->tpl_vars['unClient']->value->getCA();?>
</strong> €</p>
                                <br>
                                <p class="card-text">Pourcentage du CA :</p>
                                <p class="card-text"> <strong><?php echo $_smarty_tpl->tpl_vars['unClient']->value->getPourcCA();?>
</strong> %</p>
                                <br>
                                <p class="card-text">Ses meilleurs achats :</p>
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['unClient']->value->getListeProduit(), 'produit');
$_smarty_tpl->tpl_vars['produit']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['produit']->value) {
$_smarty_tpl->tpl_vars['produit']->do_else = false;
?>
                                    <p class="card-text"> - <strong><?php echo $_smarty_tpl->tpl_vars['produit']->value['designation'];?>
</strong> : <strong><?php echo $_smarty_tpl->tpl_vars['produit']->value['nbAchat'];?>
</strong></p>
                                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

                            </div>
                        </div>
                    </div>
                </div>
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
