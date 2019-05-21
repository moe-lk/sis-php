<!DOCTYPE html>
<html lang="en" dir="ltr" class="ltr">
<head>
    <?= $this->Html->charset(); ?>
    <title><?= $_productName ?></title>

    <?php
    $icon = strpos($_productName, 'School') != -1 ? '_school' : '';
    echo $this->Html->meta('icon', 'favicon'.$icon.'.ico');
    echo $this->fetch('meta');

    echo $this->element('styles');
    echo $this->fetch('css');

    echo $this->element('scripts');
    echo $this->fetch('script');

    echo $this->element('Angular.app');
    ?>
    <style type="text/css">
        .kdx-installer .kdx-installer-container{
            position: absolute;
            top: 48px;
            left: 0;
            right: 0;
            bottom: 35px;
            overflow-y: auto;
            padding: 0 20px;
        }

        .kdx-installer .kdx-installer-container .wizard{
            padding-bottom: 0;
        }
        
        @media only screen and (max-width: 344px) { 
            .kdx-installer .kdx-installer-container{
                bottom: 49px;
            }
        }
    </style>
</head>

<body class='fuelux installer kdx-installer' ng-app="OE_Core" ng-controller="AppCtrl" >

        <nav class="navbar" >
            <div class="navbar-left">
                <div class="menu-handler">
                    <button class="menu-toggle" type="button">
                        <i class="fa fa-bars"></i>
                    </button>
                </div>
                <a href="#">
                    <div class="brand-logo">
                        <i class="kd-openemis"></i>
                        <h1><?= $_productName ?></h1>
                    </div>
                </a>
            </div>
        </nav>

    <div class="kdx-installer-container">
    <?php
        echo $this->fetch('content');
    ?>
    </div>
    <?= $this->element('OpenEmis.footer') ?>

    <!-- <?= $this->fetch('scriptBottom'); ?> -->
    <!-- <?= $this->element('OpenEmis.scriptBottom') ?> -->

</body>
</html>
