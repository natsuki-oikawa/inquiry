<?php
/* Smarty version 4.3.4, created on 2024-02-21 10:55:30
  from 'C:\xampp\htdocs\mvc_app\Views\contacts\contactform.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_65d55812f2ce13_38675609',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6a390d4e68138316320aee82adf976f87aa42dbf' => 
    array (
      0 => 'C:\\xampp\\htdocs\\mvc_app\\Views\\contacts\\contactform.tpl',
      1 => 1708480463,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65d55812f2ce13_38675609 (Smarty_Internal_Template $_smarty_tpl) {
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
                <h2 class="mb-4">お問い合わせ</h2>
                <form action="/contacts/contactform" id='my-action' method="post" class="bg-white p-3 rounded mb-5">
                    <div class="form-group">
                        <label form="name">名前</label>
                        <input type="text" class="form-control" name="name" id="inputName" placeholder="テスト太郎" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['_SESSION']->value['name'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
                        <p class="error-text"><?php echo (($tmp = $_smarty_tpl->tpl_vars['errors']->value['name'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
</p>
                    </div>
                    <div class="form-group">
                        <label form="name">フリガナ</label>
                        <input type="text" class="form-control" name="kana" id="inputKana" placeholder="テストタロウ" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['_SESSION']->value['kana'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
                        <p class="error-text"><?php echo (($tmp = $_smarty_tpl->tpl_vars['errors']->value['kana'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
</p>
                    </div>
                    <div class="form-group">
                        <label form="email">メールアドレス</label>
                        <input type="email" class="form-control" name="email" id="inputMail" placeholder="exemple@cin-group.co.jp" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['_SESSION']->value['email'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
                        <p class="error-text"><?php echo (($tmp = $_smarty_tpl->tpl_vars['errors']->value['email'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
</p>
                    </div>
                    <div class="form-group">
                        <label form="tel">電話番号</label>
                        <input type="tell" class="form-control" name="tel" id="inputTel" placeholder="00000000000" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['_SESSION']->value['tel'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
                        <p class="error-text"><?php echo (($tmp = $_smarty_tpl->tpl_vars['errors']->value['tel'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
</p>
                    </div>
                    <div class="form-group">
                        <label form="contact">お問い合わせ内容</label>
                        <input type="text" cols='40' rows='8' class="form-control" name="text" id="inputContact" placeholder="お問い合わせ" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['_SESSION']->value['text'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
                        <p class="error-text"><?php echo (($tmp = $_smarty_tpl->tpl_vars['errors']->value['text'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
</p>
                    </div>
                    <div>

                    </div>
                    <div action='UserController.php' method="post">
                        <button type='submit' class='submit' id="btnSubmit">内容確認</button>
                    </div>
                    <table>
                        <tr>
                            <th>名前</th>
                            <th>フリガナ</th>
                            <th>電話番号</th>
                            <th>メールアドレス</th>
                            <th>お問い合わせ内容</th>
                            <th></th>
                            <th></th>
                        </tr>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['posts']->value, 'data');
$_smarty_tpl->tpl_vars['data']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['data']->value) {
$_smarty_tpl->tpl_vars['data']->do_else = false;
?>

                            <tr>
                                <td><?php echo $_smarty_tpl->tpl_vars['data']->value['name'];?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['data']->value['kana'];?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['data']->value['tel'];?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['data']->value['email'];?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['data']->value['body'];?>
</td>
                                <td> <a href="/contacts/update?id=<?php echo $_smarty_tpl->tpl_vars['data']->value['id'];?>
" class="button" name='update'>編集</a></td>
                                <td> <a href="/contacts/delete?id=<?php echo $_smarty_tpl->tpl_vars['data']->value['id'];?>
" class="button" name='delete' onclick="return confirm('本当に削除しますか?')">削除</a></td>
                            </tr>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </table>
                </form>
            </div>
        </div>
        <div>
            <div class="row justify-content-md-center text-center">
                <div class="col-lg-6 mx-auto col-md-8">
                    <div class="bg-white p-3 rounded mb-5">
                        <div class="m-1">
                            <a href="/">トップページへ</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</body><?php }
}
