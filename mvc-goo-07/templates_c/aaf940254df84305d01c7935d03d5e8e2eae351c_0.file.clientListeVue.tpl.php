<?php
/* Smarty version 3.1.34-dev-7, created on 2022-03-21 14:57:41
  from 'C:\laragon\www\gourmandise\mvc-goo-07\mod_client\vue\clientListeVue.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_62389265613a60_53029853',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'aaf940254df84305d01c7935d03d5e8e2eae351c' => 
    array (
      0 => 'C:\\laragon\\www\\gourmandise\\mvc-goo-07\\mod_client\\vue\\clientListeVue.tpl',
      1 => 1647618012,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:public/left.tpl' => 1,
    'file:public/header.tpl' => 1,
  ),
),false)) {
function content_62389265613a60_53029853 (Smarty_Internal_Template $_smarty_tpl) {
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
                        <li class="active"><a href="index.php?gestion=client">Client</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div <?php if (ClientTable::getMessageSucces() != '') {?> class="alert alert-success"<?php }?>>
        <?php echo ClientTable::getMessageSucces();?>

    </div>

    <div class="content mt-3">
        <div class="animated fadeIn">

            <div class="row">

                <div class="col-md-12">

                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title"><?php echo $_smarty_tpl->tpl_vars['titrePage']->value;?>


                                <!-- PLACER LE FORMULAIRE D'AJOUT-->
                                <form action="index.php" method="post">
                                    <input type="hidden" name="gestion" value="client">
                                    <input type="hidden" name="action" value="form_ajouter">
                                    <label>Ajouter un client :
                                        <input type="image" src="public/images/icones/a16.png" name="btn_ajouter">
                                    </label>
                                </form>

                            </strong>
                        </div>
                        <div class="card-body">
                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <!-- PLACER LA LISTE DES CLIENTS -->
                                <thead>
                                <tr>
                                    <th>Code Client</th>
                                    <th>Prénom Nom</th>
                                    <th>Ville</th>
                                    <th>Téléphone</th>
                                    <th>Consulter</th>
                                    <th>Modifier</th>
                                    <th>Supprimer</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['listeClients']->value, 'client');
$_smarty_tpl->tpl_vars['client']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['client']->value) {
$_smarty_tpl->tpl_vars['client']->do_else = false;
?>
                                    <tr>
                                        <td><?php echo $_smarty_tpl->tpl_vars['client']->value->getCodec();?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['client']->value->getNom();?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['client']->value->getVille();?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['client']->value->getTelephone();?>
</td>
                                        <td>
                                            <form method="post" action="index.php">
                                                <input type="hidden" name="gestion" value="client">
                                                <input type="hidden" name="action" value="form_consulter">
                                                <input type="hidden" name="codec" value="<?php echo $_smarty_tpl->tpl_vars['client']->value->getCodec();?>
">
                                                <input type="image" src="public/images/icones/m16.png"
                                                       name="btn-consulter">
                                            </form>
                                        </td>
                                        <td>
                                            <form method="post" action="index.php">
                                                <input type="hidden" name="gestion" value="client">
                                                <input type="hidden" name="action" value="form_modifier">
                                                <input type="hidden" name="codec" value="<?php echo $_smarty_tpl->tpl_vars['client']->value->getCodec();?>
">
                                                <input type="image" src="public/images/icones/p16.png"
                                                       name="btn-modifier">
                                            </form>
                                        </td>
                                        <td>
                                            <form method="post" action="index.php">
                                                <input type="hidden" name="gestion" value="client">
                                                <input type="hidden" name="action" value="form_supprimer">
                                                <input type="hidden" name="codec" value="<?php echo $_smarty_tpl->tpl_vars['client']->value->getCodec();?>
">
                                                <input type="image" src="public/images/icones/s16.png"
                                                       name="btn-supprimer">
                                            </form>
                                        </td>
                                    </tr>
                                    <?php
}
if ($_smarty_tpl->tpl_vars['client']->do_else) {
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
