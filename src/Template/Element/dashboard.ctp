<?php
/**
 * Mini Dashboard
 */
echo $this->Html->script('highchart/highcharts', ['block' => true]);
echo $this->Html->script('dashboards', ['block' => true]);

use Cake\Routing\Router; ?>
<!-- Please take note of the CSS for this chart place holder -->
<style type="text/css">
    .data-section {
        vertical-align: middle;
    }

    .minidashboard-donut {
        height: 100px;
        width: 100px;
        visibility: hidden;
    }
</style>

<script type="text/javascript"
        src="//cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>

<?php if ($model == 'students'): ?>
    <?php if ($notYetProcessed > 0): ?>
        <?php if ($isProcessed = 0): ?>
            <div class="alert alert-danger text-center text-uppercase" role="alert">
                <a data-dismiss="alert" href="#" aria-hidden="true" class="close">×</a>
                You have <strong><?= ($notYetProcessed) ?> </strong> Not yet Processed <?= ($model) ?>
            </div>
        <?php else:?>
         <div class="alert alert-success text-center text-uppercase" role="alert">
                <a data-dismiss="alert" href="#" aria-hidden="true" class="close">×</a>
                You have processed all the <?= ($model) ?>
            </div>
        <?php endif ?>

        <?php if ($isProcessed == 1): ?>
            <div class="alert alert-warning text-center text-uppercase" role="alert">
                <a data-dismiss="alert" href="#" aria-hidden="true" class="close">×</a>
                You have <strong><?= ($notYetProcessed) ?> </strong> Not yet Processed <?= ($model) ?>
            </div>
        <?php else:?>
            <div class="alert alert-success text-center text-uppercase" role="alert">
                <a data-dismiss="alert" href="#" aria-hidden="true" class="close">×</a>
                You have processed all the <?= ($model) ?>
            </div>
        <?php endif ?>
    <?php endif; ?>
<?php endif; ?>

<div class="overview-box alert" ng-class="disableElement">
    <a data-dismiss="alert" href="#" aria-hidden="true" class="close">×</a>
    <div class="data-section">
        <!--Getting the correct icon and the header name base on the calling method-->
        <?php if (isset($iconClass) && !empty($iconClass)): ?>
            <i class="<?= $iconClass ?> icon"></i>
        <?php else: ?>
            <i class="kd-<?= $model ?> icon"></i>
        <?php endif; ?>
        <div class="data-field">
            <h4><?= __('Total Processed ' . ucfirst($model)) ?>:</h4>
            <h1 class="data-header">
                lkllklkl
            </h1>
        </div>
    </div>

    <?php foreach ($modelArray as $highChartData) : ?>
        <div class="data-section">
            <div class="data-field">
                <div class="highchart minidashboard-donut"><?php echo $highChartData; ?></div>
            </div>
        </div>
    <?php endforeach ?>
</div>
