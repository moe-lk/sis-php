<footer>
    <?php if (!$footerText) : ?>
    <?= __('Copyright') ?> &copy;  <?= date('Y') ?>  <?=$footerBrand ?>. <?= __('All rights reserved.') ?>
    <?php else: ?>
    <?= str_replace('{{currentYear}}', date('Y'), $footerText) ?>
    <?php endif; ?>
    | <?= __('Version') . ' ' . $SystemVersion ?>
</footer>
