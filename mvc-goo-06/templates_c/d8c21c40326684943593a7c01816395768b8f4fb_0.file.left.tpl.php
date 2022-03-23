<?php
/* Smarty version 3.1.34-dev-7, created on 2022-03-21 08:38:53
  from 'C:\laragon\www\gourmandise\mvc-goo-06\public\left.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_6238399d0b3d12_28072565',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd8c21c40326684943593a7c01816395768b8f4fb' => 
    array (
      0 => 'C:\\laragon\\www\\gourmandise\\mvc-goo-06\\public\\left.tpl',
      1 => 1647607823,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6238399d0b3d12_28072565 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <a href="left.tpl"></a>
            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="#A VOUS D'ECRIRE LE LIEN">Gourmandise SARL</a>
                <a class="navbar-brand hidden" href="#A VOUS D'ECRIRE LE LIEN">G</a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="index.php?gestion=accueil"> <i class="menu-icon fa fa-dashboard"></i>Accueil </a>
                    </li>
                    <h3 class="menu-title">ADMINISTRATION</h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Clients</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-puzzle-piece"></i><a href="index.php?gestion=client">Liste</a></li>
                            <li><i class="fa fa-id-badge"></i><a href="index.php?gestion=client&action=form_ajouter">Nouveau</a></li>
                            
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Produits</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="#A VOUS D'ECRIRE LE LIEN">Liste</a></li>
                            <li><i class="fa fa-table"></i><a href="#A VOUS D'ECRIRE LE LIEN">Nouveau</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#A VOUS D'ECRIRE LE LIEN" > <i class="menu-icon fa fa-th"></i>Mon profil</a>
                        
                    </li>

                    <h3 class="menu-title">COMMANDES</h3><!-- /.menu-title -->

                    <li class="dropdown">
                        <a href="#A VOUS D'ECRIRE LE LIEN"> <i class="menu-icon fa fa-tasks"></i>Historique</a>
                         
                        
                    </li>
                    <li>
                        <a href="#"> <i class="menu-icon ti-email"></i>Passer une commande </a>
                    </li>
                   
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel --><?php }
}
