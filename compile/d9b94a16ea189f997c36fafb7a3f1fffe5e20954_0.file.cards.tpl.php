<?php
/* Smarty version 4.2.1, created on 2022-10-03 18:36:07
  from '/mnt/c/MyProjects/auto/template/main/cards.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_633af357277b72_15449360',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd9b94a16ea189f997c36fafb7a3f1fffe5e20954' => 
    array (
      0 => '/mnt/c/MyProjects/auto/template/main/cards.tpl',
      1 => 1663856906,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_633af357277b72_15449360 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="cards-container">
    <div class="card f_card" style="display: none">
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
            <input class="edit-form  f_edit-item" type="submit" name="edit" value="edit">
            <input class="delete-form  f_delete-item" type="submit" name="delete" value="delete">
        </div>
    </div>
</div><?php }
}
