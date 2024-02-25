<?php
require_once ROOT_PATH.'Controllers/Controller.php';

require_once ROOT_PATH . 'Models/Contact.php';

class ContactController extends Controller
{

    // contactForm - contactForm POST
    public function contactformvalidation(){

        $inputName = $_POST['name'];
        $inputKana = $_POST['kana'];
        $inputTel = $_POST['tel'];
        $inputMail = $_POST['email'];
        $inputContact = $_POST['text'];

        $_SESSION = $_POST;

        $errors = array();
        // var_dump($inputName);
        // 氏名のバリデーション
        if (empty($inputName)) {
            $errors['name'] = '氏名を入力してください。';
        } elseif (mb_strlen($inputName, 'UTF-8') > 10) {
            $errors['name'] = '氏名は10文字以内で入力してください。';
        }

        // フリガナのバリデーション
        if (empty($inputKana)) {
            $errors['kana'] = 'フリガナを入力してください。';
        } elseif (mb_strlen($inputKana, 'UTF-8') > 10) {
            $errors['kana'] = 'フリガナは10文字以内で入力してください。';
        }

        // 電話番号のバリデーション 
        if (empty($inputTel)) {
            $errors['tel'] = '電話番号を入力してください。';
        }elseif (!empty($inputTel) && !preg_match('/^[0-9]+$/', $inputTel)) {
            $errors['tel'] = '電話番号は数字のみで入力してください。';
        }

        // メールアドレスのバリデーション
        if (empty($inputMail)) {
            $errors['email'] = 'メールアドレスを入力してください。';
        } elseif (!filter_var($inputMail, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = '有効なメールアドレスを入力してください。';
        }

        // お問い合わせ内容のバリデーション
        if (empty($inputContact)) {
            $errors['text'] = 'お問い合わせ内容を入力してください。';
        }

        // エラーがある場合はエラーメッセージを表示して処理を中断
        if (!empty($errors)) {
            $Contact = new Contact;
            $record = $Contact->index();
            $record = $this->escapeFormData($record);
            $this->view('contacts/contactform',['post' => $_POST, 'posts' => $record, 'errors' => $errors]);
        } else {

            $this->view('contacts/contact-confirmation',['post' => $_POST]);

        }         
    }            
 //  ============================================================   
    public function contactform(){
            // $_SESSION = array();
            $_SESSION['rowData'] = $_POST;
            // $contact = new Contact;
            $Contact = new Contact;
            $record = $Contact->index();
            $_SESSION['Data'] = $_POST;
            // var_dump($_POST);
        if (!empty($_SESSION['post'])){
            $post = $_SESSION['post'];
            $post = $this->escapeFormData($post);
            $record = $this->escapeFormData($record);
            $this->view('contacts/contactform',['post' => $post,'posts' => $record]);
        }else{
            $this->view('contacts/contactform',['posts' => $record]);
        }
    }




    private function escapeFormData($data){
        if (is_array($data)) {
            return array_map([$this, 'escapeFormData'], $data);

        } else {
            return htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
        }
    }

    public function complete(){

        // リファラーを取得
        $referer = @$_SERVER['HTTP_REFERER'];

        // リファラーが存在しない場合、直接アクセスとみなしエラーメッセージを表示
        if (empty($referer)) {
            die('このページへの直接アクセスは禁止されています。');
            header('Location: /contacts/contactform');
        }else{

            $Data = $_SESSION;

                    //登録処理
                    // echo(8);
                    $Contact = new Contact;
                    $result = $Contact->create(
                        $Data['name'],
                        $Data['kana'],
                        $Data['email'],
                        $Data['tel'],
                        $Data['text']
                    );

                $this->view('contacts/contact-complete');

        }  
    }

    public function update(){


        if ($_SERVER['REQUEST_METHOD'] === 'GET') {

            // =============================================

            // GETリクエストで編集ページを表示する処理
            // URLからidを取得
            $url = $_SERVER['REQUEST_URI'];
            $params = explode('/', $url);
            $id = end($params);
            $contactId = preg_replace('/[^0-9]/', '', $id);
            // =============================================
                // var_dump($contactId);

            // GETリクエストで編集ページを表示する処理
            $contact = new Contact;
            $rowData = $contact->getContactData($contactId);
            // var_dump($rowData);
            $this->view('contacts/update', ['rowData' => $rowData]);
        } 

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // POSTリクエストでデータを更新する処理
            //  var_dump($contactId); 
            // echo'AAAAA';
            // var_dump( $_POST);
            // if (isset($_POST['btnSubmit'])) {
                $contactId = $_POST['id'];
                $name = $_POST['name'];
                $kana = $_POST['kana'];
                $email = $_POST['email'];
                $tel = $_POST['tel'];
                $text = $_POST['text'];
                // var_dump($text);
                $errors = array();

                // 氏名のバリデーション
                if (empty($name)) {
                    $errors['name'] = '氏名を入力してください。';
                } elseif (mb_strlen($name, 'UTF-8') > 10) {
                    $errors['name'] = '氏名は10文字以内で入力してください。';
                }

                // フリガナのバリデーション
                if (empty($kana)) {
                    $errors['kana'] = 'フリガナを入力してください。';
                } elseif (mb_strlen($kana, 'UTF-8') > 10) {
                    $errors['kana'] = 'フリガナは10文字以内で入力してください。';
                }

                // 電話番号のバリデーション (数字かどうかをチェック)
                if (!empty($tel) && !preg_match('/^[0-9]+$/', $tel)) {
                    $errors['tel'] = '電話番号は数字のみで入力してください。';
                }

                // メールアドレスのバリデーション
                if (empty($email)) {
                    $errors['email'] = 'メールアドレスを入力してください。';
                } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $errors['email'] = '有効なメールアドレスを入力してください。';
                }

                // お問い合わせ内容のバリデーション
                if (empty($text)) {
                    $errors['text'] = 'お問い合わせ内容を入力してください。';
                }

                // エラーがある場合はエラーメッセージを表示して処理を中断
                if (!empty($errors)) {
                    foreach ($errors as $error) {
                        // var_dump($errors);

                        $_SESSION['rowData'] = $_POST;
                        $contact = new Contact;
                        $rowData = $contact->getContactData($contactId);
                        // var_dump($rowData);
                        $this->view('contacts/update', ['rowData' => $rowData,'errors'=>$errors]);
                        // $this->view('contacts/update',['rowData' => $_POST]);
                        $_SESSION['errorMessages'] = $errors;
                    }

                }else{

                // バリデーションが成功した場合にデータを更新
                $contact = new Contact;
                $result = $contact->update($contactId, $name, $kana, $email, $tel, $text);

                header('Location: /contacts/contactform');
                exit;
                }
            // }   

            // if (isset($_POST['btn_back'])) {
            //     $_SESSION['post'] = $Data; // 現在のデータをセッションに保存
            //     header('Location: /contacts/contactform');
            //     return;   
            // }
        }


    }

    public function delete(){

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            // POSTリクエストで削除を実行する処理
            $contactId = $_GET['id'];

            $contact = new Contact;
            $result = $contact->deleteContact($contactId);

            header('Location: /contacts/contactform');
            exit;

        }
    }

}

    ?>