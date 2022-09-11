<?php
/* Smarty version 4.2.0, created on 2022-09-09 11:15:35
  from 'C:\OpenServer\domains\auto\template\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.0',
  'unifunc' => 'content_631af62763ce81_81174064',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1e6035a62369f4cd72e664c42659be38dc72df7c' => 
    array (
      0 => 'C:\\OpenServer\\domains\\auto\\template\\index.tpl',
      1 => 1662711333,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:./header/header.tpl' => 1,
    'file:./main/addOrEditForm.tpl' => 1,
    'file:./main/cards.tpl' => 1,
  ),
),false)) {
function content_631af62763ce81_81174064 (Smarty_Internal_Template $_smarty_tpl) {
?><!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AUTO CARDS</title>
    <link rel="stylesheet" href="../web/css/style.css">

</head>

<body>
<div class="wrapper">
    <?php $_smarty_tpl->_subTemplateRender('file:./header/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <main class="main">
        <button class="add-btn add-car">add new car</button>
        <label><input type="text" name="search" class="search-car" placeholder="search"></label>
        <select name="db" class="dataType">
            <option value="mysql">MySql</option>
            <option selected value="file">File</option>
        </select>

        <?php $_smarty_tpl->_subTemplateRender('file:./main/addOrEditForm.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        <?php $_smarty_tpl->_subTemplateRender('file:./main/cards.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    </main>
</div>
<?php echo '<script'; ?>
 src="./web/script/script.js"><?php echo '</script'; ?>
>
</body>
</html>

<?php }
}
