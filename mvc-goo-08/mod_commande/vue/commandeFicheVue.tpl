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

                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">{$titrePage}</strong>
                            </div>

                            <div class="card-body card-block">

                                <div class="form-group">Numéro : {$uneCommande->getNumero()}</div>
                                <div class="form-group">Vendeur
                                    : {$uneCommande->getVendeurPrenom()} {$uneCommande->getVendeurNom()}</div>
                                <div class="form-group">Code Client : {$uneCommande->getCodec()}</div>
                                <div class="form-group">Client : {$uneCommande->getClient()}</div>


                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">

                        <div class="card">
                            <div class="card-header"><strong>Etat de la commande</strong></div>
                            <div class="card-body card-block">
                                <div class="form-group">Date de commande :
                                    {$uneCommande->getDate_commande()->format('d/m/Y')}</div>
                                {if $action == 'modifier' || $action == 'form_modifier'}
                                    <form action="index.php" method="post">
                                        <input type="hidden" name="gestion" value="commande">
                                        <input type="hidden" name="action" value="maj_date">
                                        <input type="hidden" name="numero" value="{$uneCommande->getNumero()}">
                                        <input type="hidden" name="date_commande"
                                               value="{$uneCommande->getDate_commande()->format('Y-m-d')}">
                                        <div class="form-group">
                                            Date de livraison :
                                            <input type="date" name="date_livraison"
                                                   value="{$uneCommande->getDate_livraison()->format('Y-m-d')}">
                                            <input type="image" name="btn_modifier" src="public/images/icones/p16.png"">

                                        </div>
                                    </form>
                                {else}
                                    <div class="form-group">Date de livraison
                                        : {$uneCommande->getDate_livraison()->format('d/m/Y')}</div>
                                {/if}
                                <div class="form-group">Total HT : {$uneCommande->getTotal_ht()}</div>
                                <div class="form-group">Statut de la commande :
                                    {if $uneCommande->getStatut() == 'V'}
                                        Validée
                                    {elseif $uneCommande->getStatut() == 'NV'}
                                        Non validée
                                    {elseif $uneCommande->getStatut() == 'A'}
                                        Annulée
                                    {/if}
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
                                {if $action == 'modifier' || $action == 'form_modifier'}
                                    <th>Modifier</th>
                                {/if}
                            </tr>
                            </thead>
                            <tbody>
                            {foreach from=$uneCommande->getListeLigneCommande() item=ligne}
                                <tr>
                                    <td>{$ligne->getNumero_ligne()}</td>
                                    <td>{$ligne->getReference()}</td>
                                    <td>{$ligne->getDesignation()}</td>
                                    {if $action == 'modifier' || $action == 'form_modifier'}
                                        <td>
                                            <form action="index.php" method="post">
                                                <input type="hidden" name="gestion" value="commande">
                                                <input type="hidden" name="action" value="modifierLigne">
                                                <input type="number" name="quantite"
                                                       value="{$ligne->getQuantite_demandee()}">
                                            </form>
                                        </td>
                                    {else}
                                        <td>{$ligne->getQuantite_demandee()}</td>
                                    {/if}

                                    <td>
                                        {if $ligne->getPrix() == 0}
                                            {number_format(round($ligne->getPrix_ht()*1.357, 2), 2)}
                                        {else}
                                            {$ligne->getPrix()}
                                        {/if}
                                    </td>
                                    {if $action == 'modifier' || $action == 'form_modifier'}
                                        <td>
                                            <form action="index.php" method="post">
                                                <input type="hidden" name="gestion" value="commande">
                                                <input type="hidden" name="action" value="modifierLigne">
                                                <input type="hidden" name="numero" value="{$uneCommande->getNumero()}">
                                                <input type="image" src="public/images/icones/p16.png"
                                                       name="btn-modifier">
                                            </form>
                                        </td>
                                    {/if}
                                </tr>
                            {/foreach}
                            <tr>
                                <td colspan="3"> Montant de la commande : {$uneCommande->getTotal_ht()} €</td>
                                <td colspan="3"> Total TVA : {$uneCommande->getTotal_tva()} €</td>
                            </tr>
                            </tbody>
                        </table>


                    </div>
                    <div class="card-body card-block">
                        <div class="col-md-6">
                            <input type="button" class="btn btn-submit" name="btn_retour" value="Retour"
                                   onclick="location.href ='index.php?gestion=commande'">
                        </div>
                        <div class="col-md-5 ">
                            {if $action == 'modifier'}
                            <form action="index.php" method="POST">
                                <input type="hidden" name="gestion" value="commande">
                                <input type="hidden" name="action" value="annuler">
                                <input type="hidden" name="numero" value="{$uneCommande->getNumero()}">
                                <input type="submit" class="btn btn-submit pos-btn-action" name="btn_annuler"
                                       value="Annuler">
                            </form>
                        </div>
                        <div class="col-md-1 ">
                            <form action="index.php" method="POST">
                                <input type="hidden" name="gestion" value="commande">
                                <input type="hidden" name="action" value="finaliser">
                                <input type="hidden" name="numero" value="{$uneCommande->getNumero()}">
                                <input type="submit" class="btn btn-submit pos-btn-action" name="btn_finaliser"
                                       value="Finaliser">
                            </form>
                            {/if}
                        </div>

                        <br>
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
