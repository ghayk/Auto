<?php
/* Smarty version 4.2.1, created on 2022-10-03 18:36:05
  from '/mnt/c/MyProjects/auto/template/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_633af355f35905_00334477',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3333a9d5b2f3eb7b393a79cafe849c8b6addcc27' => 
    array (
      0 => '/mnt/c/MyProjects/auto/template/index.tpl',
      1 => 1664807249,
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
function content_633af355f35905_00334477 (Smarty_Internal_Template $_smarty_tpl) {
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
<?php $_smarty_tpl->_subTemplateRender('file:./header/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<div class="wrapper">
    <main class="main">
        <div class="nav">
            <button class="add-btn add-car">add new car</button>
            <label><input type="text" name="search" class="search-car" placeholder="search"></label>
            <label>
                <select name="db" class="dataType">
                    <option value="mysql">MySql</option>
                    <option value="file">File</option>
                </select>
            </label>
        </div>

        <?php $_smarty_tpl->_subTemplateRender('file:./main/addOrEditForm.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        <?php $_smarty_tpl->_subTemplateRender('file:./main/cards.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    </main>
</div>
<?php echo '<script'; ?>
 type="module" src="./web/script/draw.js"><?php echo '</script'; ?>
>
</body>
</html>

<?php }
}
