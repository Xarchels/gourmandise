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
    <title>{$titreVue}</title>
    <meta name="description" content={$titreVue}>
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

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body>


<!-- Left Panel -->


{include file='public/left.tpl'}

<!-- FIN : Left Panel -->


<!-- Right Panel -->

<div id="right-panel" class="right-panel">

    <!--Header -->

    {include file='public/header.tpl'}

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
                        <li class="active">{$titrePage}</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div {if CommandeTable::getMessageErreur() neq ""} class="alert alert-danger" {elseif CommandeTable::getMessageSucces() neq ""} class="alert alert-success" {/if}>
        {if CommandeTable::getMessageErreur() eq ""}
            {CommandeTable::getMessageSucces()}
        {/if}
        {CommandeTable::getMessageErreur()}
    </div>

    <div class="content mt-3">
        <div class="animated fadeIn">

            <div class="row">
                <div class="col-md-12">

                    <!-- Liste lignes de commande -->

                    <div class="card-body">
                        <div class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Référence</th>
                                    <th>Désignation</th>
                                    <th>Quantité</th>
                                    <th>Prix HT</th>
                                    <th>Prix Vente</th>
                                    <th>Total</th>
                                    <th>Modifier</th>
                                    <th>Supprimer</th>
                                </tr>
                                </thead>
                                <tbody>
                                {foreach from=$lignes item=ligne}
                                    <tr>
                                        <form method="post" action="index.php">
                                            <td>{$ligne->getReference()}</td>
                                            <td>{$ligne->getDesignation()}</td>
                                            <td>
                                                <input type="number" name="quantite"
                                                       value="{$ligne->getQuantite_demandee()}">
                                            </td>
                                            <td>{$ligne->getPrix_ht()}</td>
                                            <td>
                                                <input type="text" name="prixVente"
                                                       value="{$ligne->getPrix()}" size="5">
                                            </td>
                                            <td>{$ligne->getPrix() * $ligne->getQuantite_Demandee()}</td>
                                            <td>
                                                <input type="hidden" name="gestion" value="commande">
                                                <input type="hidden" name="action" value="modifier_ligne">
                                                <input type="hidden" name="reference"
                                                       value="{$ligne->getReference()}">
                                                <input type="image" src="public/images/icones/m16.png"
                                                       name="btn-modifier">
                                            </td>
                                        </form>
                                        <form method="post" action="index.php">
                                            <td>
                                                <input type="hidden" name="gestion" value="commande">
                                                <input type="hidden" name="action" value="supprimer_ligne">
                                                <input type="hidden" name="reference"
                                                       value="{$ligne->getReference()}">
                                                <input type="image" src="public/images/icones/s16.png"
                                                       name="btn-supprimer">
                                            </td>
                                        </form>
                                    </tr>
                                    {foreachelse}
                                    <tr>
                                        <td colspan="7">
                                            Aucun enregistrement trouvé
                                        </td>
                                    </tr>
                                {/foreach}
                                </tbody>
                            </table>

                        </div>
                    </div>
                    <div class="card-body card-block">
                        <div class="col-md-6">
                            <input type="button" class="btn btn-submit" name="btn_retour" value="Retour"
                                   onclick="location.href ='index.php?gestion=commande&action=form_ajouter'">
                        </div>
                        <div class="col-md-6">
                            <input type="button" class="btn btn-submit float-right" name="btn_retour" value="Enregistrer la commande"
                                   onclick="location.href ='index.php?gestion=commande&action=form_enregistrer'">
                        </div>

                    </div>
                </div>
            </div>
        </div><!-- .content -->

    </div><!-- /#right-panel -->

    <!-- Right Panel -->
    <script src="public/assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="public/assets/js/plugins.js"></script>
    <script src="public/assets/js/main.js"></script>


    <script src="public/assets/js/lib/data-table/datatables.min.js"></script>
    <script src="public/assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="public/assets/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="public/assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
    <script src="public/assets/js/lib/data-table/jszip.min.js"></script>
    <script src="public/assets/js/lib/data-table/pdfmake.min.js"></script>
    <script src="public/assets/js/lib/data-table/vfs_fonts.js"></script>
    <script src="public/assets/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="public/assets/js/lib/data-table/buttons.print.min.js"></script>
    <script src="public/assets/js/lib/data-table/buttons.colVis.min.js"></script>
    <script src="public/assets/js/lib/data-table/datatables-init.js"></script>


    <script type="text/javascript">
        $(document).ready(function () {
            $('#bootstrap-data-table-export').DataTable();
        });
    </script>

</body>
</html>
