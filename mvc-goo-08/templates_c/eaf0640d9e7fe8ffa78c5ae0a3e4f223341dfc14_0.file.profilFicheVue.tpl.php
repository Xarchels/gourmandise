<?php
/* Smarty version 3.1.34-dev-7, created on 2022-03-23 09:21:24
  from 'C:\laragon\www\gourmandise\mvc-goo-08\mod_profil\vue\profilFicheVue.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_623ae69409a390_35048276',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'eaf0640d9e7fe8ffa78c5ae0a3e4f223341dfc14' => 
    array (
      0 => 'C:\\laragon\\www\\gourmandise\\mvc-goo-08\\mod_profil\\vue\\profilFicheVue.tpl',
      1 => 1648027281,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:public/left.tpl' => 1,
    'file:public/header.tpl' => 1,
  ),
),false)) {
function content_623ae69409a390_35048276 (Smarty_Internal_Template $_smarty_tpl) {
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
                        <li class="active"><?php echo $_smarty_tpl->tpl_vars['titrePage']->value;?>
</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div <?php if (ProfilTable::getMessageErreur() != '') {?> class="alert alert-danger" <?php } elseif (ProfilTable::getMessageSucces() != '') {?> class="alert alert-success" <?php }?>>
        <?php if (ProfilTable::getMessageErreur() == '') {?>
            <?php echo ProfilTable::getMessageSucces();?>

        <?php }?>
        <?php echo ProfilTable::getMessageErreur();?>

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
                                <input type="hidden" name="gestion" value="profil">
                                <input type="hidden" name="action" value="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
">
                                <div class="form-group">
                                    <label class="form-control-label">Code vendeur :</label>
                                    <input class="form-control" name="codev"
                                           value="<?php echo $_smarty_tpl->tpl_vars['unProfil']->value->getCodev();?>
"
                                           readonly>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">Prénom :</label>
                                    <input class="form-control" type="text" name="prenom"
                                           value="<?php echo $_smarty_tpl->tpl_vars['unProfil']->value->getPrenom();?>
"
                                           readonly>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">Nom :</label>
                                    <input class="form-control" type="text" name="nom"
                                           value="<?php echo $_smarty_tpl->tpl_vars['unProfil']->value->getNom();?>
"
                                           readonly>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">Adresse :</label>
                                    <input class="form-control" type="text" name="adresse"
                                           value="<?php echo $_smarty_tpl->tpl_vars['unProfil']->value->getAdresse();?>
">
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">Code postal :</label>
                                    <input class="form-control" type="text" name="CP"
                                           value="<?php echo $_smarty_tpl->tpl_vars['unProfil']->value->getCP();?>
">
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">Ville :</label>
                                    <input class="form-control" type="text" name="ville"
                                           value="<?php echo $_smarty_tpl->tpl_vars['unProfil']->value->getVille();?>
">
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">Téléphone :</label>
                                    <input class="form-control" type="text" name="telephone"
                                           value="<?php echo $_smarty_tpl->tpl_vars['unProfil']->value->getTelephone();?>
">
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">Mot de passe :</label>
                                    <input class="form-control" type="password" name="password"
                                           value="">
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">Confirmation :</label>
                                    <input class="form-control" type="password" name="confirmation"
                                           value="">
                                </div>
                                <div>
                                    <input class="btn btn-submit" type="button" name="btn_retour" value="Retour"
                                           onclick="location.href='index.php?gestion=accueil'">
                                    <button class="btn btn-submit float-right" type="submit"
                                            name="btn_action">Modifier
                                    </button>
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
                                <p class="card-text">Montant total de mes ventes :</p>
                                <p class="card-text"><strong><?php echo $_smarty_tpl->tpl_vars['unProfil']->value->getMontant();?>
</strong> €</p>
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
