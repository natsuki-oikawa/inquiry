<?php
/* Smarty version 4.3.4, created on 2024-02-16 10:44:29
  from 'C:\xampp\htdocs\mvc_app\Views\contacts\update.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_65cebdfd9b0a10_32244073',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '85f31128420ea35bd737f887abdd3512fdddd071' => 
    array (
      0 => 'C:\\xampp\\htdocs\\mvc_app\\Views\\contacts\\update.tpl',
      1 => 1707808726,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65cebdfd9b0a10_32244073 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Casteria</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/contacts.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <?php echo '<script'; ?>
 defer src="../js/validation.js"><?php echo '</script'; ?>
>
</head>
<body>
    <div class="p-4 container-field form-orange">
        <div class="row justify-content-center">
            <div class="col-lg-6 mx-auto col-md-8">
                <h2 class="mb-4">更新画面</h2>

                <form action="/contacts/update" method="post" id='my-action' class="bg-white p-3 rounded mb-5">
                    <div class="form-group">
                        <label for="name">名前</label>
                        <input type="text" class="form-control" name="name" id="inputName" placeholder="テスト太郎" value="<?php echo $_smarty_tpl->tpl_vars['rowData']->value->name;?>
">
                        <p class="error-text"><?php echo (($tmp = $_smarty_tpl->tpl_vars['errors']->value['name'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
</p>
                    </div>
                    <div class="form-group">
                        <label for="kana">フリガナ</label>
                        <input type="text" class="form-control" name="kana" id="inputKana" placeholder="テストタロウ" value="<?php echo $_smarty_tpl->tpl_vars['rowData']->value->kana;?>
">
                        <p class="error-text"><?php echo (($tmp = $_smarty_tpl->tpl_vars['errors']->value['kana'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
</p>
                    </div>
                    <div class="form-group">
                        <label for="email">メールアドレス</label>
                        <input type="email" class="form-control" name="email" id="inputMail" placeholder="exemple@cin-group.co.jp" value="<?php echo $_smarty_tpl->tpl_vars['rowData']->value->email;?>
">
                        <p class="error-text"><?php echo (($tmp = $_smarty_tpl->tpl_vars['errors']->value['email'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
</p>
                    </div>
                    <div class="form-group">
                        <label for="tel">電話番号</label>
                        <input type="tel" class="form-control" name="tel" id="inputTel" placeholder="00000000000" value="<?php echo $_smarty_tpl->tpl_vars['rowData']->value->tel;?>
">
                        <p class="error-text"><?php echo (($tmp = $_smarty_tpl->tpl_vars['errors']->value['tel'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
</p>
                    </div>
                    <div class="form-group">
                        <input type="hidden" class="form-control" name="id" id="inputId" placeholder="00000000000" value="<?php echo $_smarty_tpl->tpl_vars['rowData']->value->id;?>
">
                    </div>
                    <div class="form-group">
                        <label for="text">お問い合わせ内容</label>
                        <input class="form-control" name="text" id="inputContact"  placeholder="お問い合わせ" value="<?php echo $_smarty_tpl->tpl_vars['rowData']->value->body;?>
">
                        <p class="error-text"><?php echo (($tmp = $_smarty_tpl->tpl_vars['errors']->value['text'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
</p>
                    </div>
                    <p> <class="label-text">上記の内容でよろしいですか。</p>  
                    <a type="submit" name="btn_back" href="/contacts/contactform" value="キャンセル">キャンセル</a>  
                    <input type="submit" class="submit" name="btnSubmit" id="btnSubmit" value='更新'>
                </form>
                <div class="m-1">
                    <a href="/">トップページへ</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html><?php }
}
