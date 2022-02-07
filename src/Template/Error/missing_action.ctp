<?php
use Cake\Core\Configure;

if (Configure::read('debug')):
    $this->layout = $layout;;

    // $this->assign('title', $message);
    // $this->assign('templateName', 'error404.ctp');

    $this->start('file');

?>
<?php echo "<h1>Error: 404</h1>" ?>
<?php
    // if (extension_loaded('xdebug')):
        // xdebug_print_function_stack();
    // endif;

    $this->end();
endif;
?>
