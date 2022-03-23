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


    <div class="content mt-3">
        <div class="animated fadeIn">

            <div class="row">

                <form action="index.php" method="POST">
                    <input type="hidden" name="gestion" value="commande">
                    <input type="hidden" name="action" value="">
                    <div class="col-md-12">

                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <strong class="card-title">{$titrePage}</strong>
                                </div>

                                <div class="card-body card-block">

                                    <div class="form-group">Numéro : {$uneCommande->getNumero()}</div>
                                    <div class="form-group">Vendeur : {$uneCommande->getVendeurPrenom()} {$uneCommande->getVendeurNom()}</div>
                                    <div class="form-group">Code Client : {$uneCommande->getCodec()}</div>
                                    <div class="form-group">Client : {$uneCommande->getClient()}</div>


                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">

                            <div class="card">
                                <div class="card-header"><strong>Etat de la commande</strong></div>
                                <div class="card-body card-block">

                                    <div class="form-group">Date de commande : 05/09/2017</div>
                                    <div class="form-group">Date de livraison : 05/09/2017</div>
                                    <div class="form-group">Total HT : 226.62 €</div>
                                    <div class="form-group">Commande Validée : OUI</div>


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
                                    <!--<th class="pos-actions">Consulter</th>
                                    <th class="pos-actions">Modifier</th>
                                    <th class="pos-actions">Supprimer</th>-->

                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>4015</td>
                                    <td>SOURIS REGLISSE</td>
                                    <td>1</td>
                                    <td>32.57</td>

                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>4025</td>
                                    <td>COLA CITRIQUE</td>
                                    <td>1</td>
                                    <td>28.49</td>

                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>4031</td>
                                    <td>FRAISE TSOIN-TSOIN</td>
                                    <td>1</td>
                                    <td>33.92</td>

                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>4036</td>
                                    <td>LANGUE COLA CITRIQUE</td>
                                    <td>1</td>
                                    <td>28.5</td>

                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>4004</td>
                                    <td>SUCETTE BOULE POP</td>
                                    <td>1</td>
                                    <td>28.5</td>

                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>4053</td>
                                    <td>OURSON GUIMAUVE</td>
                                    <td>1</td>
                                    <td>47.5</td>

                                </tr>
                                <tr>
                                    <td>7</td>
                                    <td>4042</td>
                                    <td>TETINE CANDI</td>
                                    <td>1</td>
                                    <td>27.14</td>

                                </tr>
                                <tr>
                                    <td colspan="3"> Montant de la commande : 226.62 €</td>
                                    <td colspan="2"> Total TVA : 45.32 €</td>
                                </tr>
                                </tbody>
                            </table>


                        </div>
                        <div class="card-body card-block">
                            <div class="col-md-6"><input type="button" class="btn btn-submit" value="Retour"
                                                         onclick="location.href = &quot;index.php?gestion=commande&quot;">
                            </div>
                            <div class="col-md-6 "></div>
                            <br>
                        </div>
                    </div>
                </form>
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
