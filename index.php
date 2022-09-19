<?php

require __DIR__ . '/vendor/autoload.php';

$smarty = new Smarty();

$smarty->setTemplateDir('./template');
$smarty->setCompileDir('./compile');

try {
    $smarty->display('./template/index.tpl');
} catch (SmartyException|Exception $e) {
}

