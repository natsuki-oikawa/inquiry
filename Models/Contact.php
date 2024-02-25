<?php
require_once(ROOT_PATH . 'Models/Db.php');

class Contact extends Db
{

    public function __construct($dbh = null)
    {
        parent::__construct($dbh);
        $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function index()
    {
        $record = [];

        try{
            $sql = 'SELECT id,name, kana, tel, email, body FROM contacts';
            $table_rec = $this->dbh->query($sql);

            $record = $table_rec->fetchall(PDO::FETCH_ASSOC);

            return $record;

        }catch(PDOException $e){
            $this->dbh->rollBack();

            return $record;
            exit();

        }
    }

    // =============================================================
        /**
     * メールアドレスが一意か判定後ユーザー登録処理を行ってユーザーIDを返却する
     *
     * @param string $name 氏名
     * @param string $kana ふりがな
     * @param string $email メールアドレス
     * @param string $tel 電話番号
     * @param string $text お問い合わせ内容
     */
    public function create(string $name, string $kana, string $email, string $tel, string $text)
    {
        try{
            $this->dbh->beginTransaction();
            $query = 'INSERT INTO contacts (name, kana, email, tel, body) VALUES (:name, :kana, :email, :tel , :text)';
            $stmt = $this->dbh->prepare($query);
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->bindParam(':kana', $kana, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':tel', $tel, PDO::PARAM_STR);
            $stmt->bindParam(':text', $text, PDO::PARAM_STR);
            $stmt->execute();

            $lastId = $this->dbh->lastInsertId();

            // トランザクションを完了することでデータの書き込みを確定させる
            $this->dbh->commit();

            return $lastId;
        } catch (PDOException $e) {
            // 不具合があった場合トランザクションをロールバックして変更をなかったコトにする。
            $this->dbh->rollBack();
            echo "登録失敗: " . $e->getMessage() . "\n";
            exit();
        }
    }

    public function getContactData($contactId): stdClass
    {
        try{
            $query = 'SELECT * FROM contacts WHERE id = :id';
            $stmt = $this->dbh->prepare($query);
            $stmt->bindParam(':id', $contactId, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_OBJ);
        }catch (PDOException $e) {
            echo "承認エラー: ".$e->getMessage()."\n";
            exit();
        }
    }

    /**
     * ユーザーの情報を更新する
     * @param string $id 更新対象のユーザーID
     * @param string $name 氏名
     * @param string $kana ふりがな
     * @param string $email メールアドレス
     * @param string $tel 電話番号
     * @param string $text お問い合わせ内容
     */
    public function update(string $id, string $name, string $kana, string $email, string $tel, string $text): bool
    {
        try{
            // 重複アドレスの確認 (メールアドレスが一意のためすでに使用されていた場合はエラーとする)
            $query = 'SELECT COUNT(*) as count FROM contacts WHERE email = :email AND id <> :id';
            $stmt = $this->dbh->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_OBJ);

            $this->dbh->beginTransaction();

            $query = 'UPDATE contacts SET name = :name, kana = :kana, email = :email, tel = :tel, body = :text';
            $query .= ' WHERE id = :id';
            $stmt = $this->dbh->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':kana', $kana);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':tel', $tel);
            $stmt->bindParam(':text', $text);
            $stmt->execute();
            // トランザクションを完了することでデータの書き込みを確定させる
            $this->dbh->commit();
            return true;

        } catch (PDOException $e) {
            // 不具合があった場合トランザクションをロールバックして変更をなかったコトにする。
            $this->dbh->rollBack();
            echo "登録失敗: " . $e->getMessage() . "\n";
            exit();
        }
    }
    /**
     * ユーザーIDに対応するユーザーのデータをテーブルから削除する
     * @param string $id ユーザーID
     * @return void
     */
    public function deleteContact(string $id) {
        try{
            $this->dbh->beginTransaction();
            $query = 'DELETE FROM contacts WHERE id = :id';
            $stmt = $this->dbh->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            // トランザクションを完了することでデータの書き込みを確定させる
            $this->dbh->commit();
            return;
        } catch (PDOException $e) {
            // 不具合があった場合トランザクションをロールバックして変更をなかったコトにする。
            $this->dbh->rollBack();
            echo "削除失敗: " . $e->getMessage() . "\n";
            exit();
        }
    }
}