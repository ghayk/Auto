<?php
/* Smarty version 4.2.0, created on 2022-09-10 09:16:46
  from 'C:\OpenServer\domains\auto\template\main\cards.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.0',
  'unifunc' => 'content_631c2bce5c6772_90688560',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6d017f6d2c8738bdb3af03d137dffb5dd6a4da04' => 
    array (
      0 => 'C:\\OpenServer\\domains\\auto\\template\\main\\cards.tpl',
      1 => 1662790546,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_631c2bce5c6772_90688560 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="cards-container">
    <div class="card" style="display: none">
        <div class="card-img-container"></div>
        <div class="card-title">
            <h5 class="car-brand"></h5>
        </div>
        <div class="card-description">
            <p class="car-year"></p>
            <p class="car-color"></p>
            <p class="car-motor"></p>
        </div>
        <div class="card-form-container">
            <input class="edit-form  f_edit-item" type="submit" name="edit" data-item-id="" value="edit">
            <input class="delete-form  f_delete-item" type="submit" name="delete" data-item-id="" value="delete">
        </div>
    </div>
</div><?php }
}
