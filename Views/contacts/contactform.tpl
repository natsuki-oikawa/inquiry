<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Casteria</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/contacts.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script defer src="../js/validation.js"></script>
</head>
<body>

    <div class="p-4 container-field form-orange">
        <div class="row justify-content-center">
            <div class="col-lg-6 mx-auto col-md-8">
                <h2 class="mb-4">お問い合わせ</h2>
                <form action="/contacts/contactform" id='my-action' method="post" class="bg-white p-3 rounded mb-5">
                    <div class="form-group">
                        <label form="name">名前</label>
                        <input type="text" class="form-control" name="name" id="inputName" placeholder="テスト太郎" value="{$_SESSION['name']|default:''}">
                        <p class="error-text">{$errors['name']|default:''}</p>
                    </div>
                    <div class="form-group">
                        <label form="name">フリガナ</label>
                        <input type="text" class="form-control" name="kana" id="inputKana" placeholder="テストタロウ" value="{$_SESSION['kana']|default:''}">
                        <p class="error-text">{$errors['kana']|default:''}</p>
                    </div>
                    <div class="form-group">
                        <label form="email">メールアドレス</label>
                        <input type="email" class="form-control" name="email" id="inputMail" placeholder="exemple@cin-group.co.jp" value="{$_SESSION['email']|default:''}">
                        <p class="error-text">{$errors['email']|default:''}</p>
                    </div>
                    <div class="form-group">
                        <label form="tel">電話番号</label>
                        <input type="tell" class="form-control" name="tel" id="inputTel" placeholder="00000000000" value="{$_SESSION['tel']|default:''}">
                        <p class="error-text">{$errors['tel']|default:''}</p>
                    </div>
                    <div class="form-group">
                        <label form="contact">お問い合わせ内容</label>
                        <input type="text" cols='40' rows='8' class="form-control" name="text" id="inputContact" placeholder="お問い合わせ" value="{$_SESSION['text']|default:''}">
                        <p class="error-text">{$errors['text']|default:''}</p>
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
                        {foreach from=$posts item=data}

                            <tr>
                                <td>{$data.name}</td>
                                <td>{$data.kana}</td>
                                <td>{$data.tel}</td>
                                <td>{$data.email}</td>
                                <td>{$data.body}</td>
                                <td> <a href="/contacts/update?id={$data.id}" class="button" name='update'>編集</a></td>
                                <td> <a href="/contacts/delete?id={$data.id}" class="button" name='delete' onclick="return confirm('本当に削除しますか?')">削除</a></td>
                            </tr>
                        {/foreach}
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
</body>