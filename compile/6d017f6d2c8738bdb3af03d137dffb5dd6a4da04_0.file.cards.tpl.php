<?php
/* Smarty version 4.2.0, created on 2022-09-13 13:03:47
  from 'C:\OpenServer\domains\auto\template\main\cards.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.0',
  'unifunc' => 'content_632055831893e2_70477984',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6d017f6d2c8738bdb3af03d137dffb5dd6a4da04' => 
    array (
      0 => 'C:\\OpenServer\\domains\\auto\\template\\main\\cards.tpl',
      1 => 1663063426,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_632055831893e2_70477984 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="cards-container">
    <div class="card" style="display: none">
        <div class="card-title">
            <h5 class="car-brand"></h5>
        </div>
        <div class="card-img-container">
            <img src="/img/img.png" alt="car">
        </div>
        <table class="card-description">
            <tr>
                <td>year</td>
                <td class="car-year"></td>
            </tr>
            <tr>
                <td>color</td>
                <td class="car-color"></td>
            </tr>
            <tr>
                <td>motor</td>
                <td class="car-motor"></td>
            </tr>
        </table>
        <div class="card-form-container">
            <input class="edit-form  f_edit-item" type="submit" name="edit" data-item-id="" value="edit">
            <input class="delete-form  f_delete-item" type="submit" name="delete" data-item-id="" value="delete">
        </div>
    </div>
</div><?php }
}
