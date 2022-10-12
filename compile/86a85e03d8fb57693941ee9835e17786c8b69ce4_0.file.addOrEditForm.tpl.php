<?php
/* Smarty version 4.2.1, created on 2022-10-05 17:22:36
  from 'C:\MyProjects\auto\template\main\addOrEditForm.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_633dbd5ca92cb4_78260968',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '86a85e03d8fb57693941ee9835e17786c8b69ce4' => 
    array (
      0 => 'C:\\MyProjects\\auto\\template\\main\\addOrEditForm.tpl',
      1 => 1663856906,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_633dbd5ca92cb4_78260968 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="form-container">
    <form action="#" method="POST" class="form-car">
        <h3 class="form-title">Add new car</h3>
        <hr>
        <label>
            <select name="brand" id="select-brand">
                <option value="">brand</option>
            </select>
        </label>
        <label>
            <select name="year" id="select-year">
                <option value="">year</option>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, range(1985,date("Y")), 'year');
$_smarty_tpl->tpl_vars['year']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['year']->value) {
$_smarty_tpl->tpl_vars['year']->do_else = false;
?>
                    <option value=<?php echo $_smarty_tpl->tpl_vars['year']->value;?>
><?php echo $_smarty_tpl->tpl_vars['year']->value;?>
</option>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </select>
        </label>
        <label>
            <select name="color" id="select-color">
                <option value="">color</option>
            </select>
        </label>
        <label>
            <select name="motor" id="select-motor">
                <option value="">motor</option>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, range(8,50), 'item');
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
                    <option value=<?php echo $_smarty_tpl->tpl_vars['item']->value/10;?>
><?php echo $_smarty_tpl->tpl_vars['item']->value/10;?>
</option>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </select>
        </label>
        <label>
            <input type="hidden" name="id" value='' id="select-id">
        </label>
        <div class="btn-container">
            <input type="submit" value="save" name="action" class="save-btn">
            <input type="submit" value="update" name="action" class="update-btn">
            <input type="submit" value="cancel" name="action" class="cancel-btn">
        </div>
    </form>
</div>
<?php }
}
