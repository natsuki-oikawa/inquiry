window.onload = function(){
    /*各画面オブジェクト*/
    const btnSubmit = document.getElementById('btnSubmit');
    const inputName = document.getElementById('inputName');
    const inputKana = document.getElementById('inputKana');
    const inpuinputTeltAge = document.getElementById('inputTel');
    const inputMail = document.getElementById('inputMail');
    const inputContact = document.getElementById('inputContact');
    const reg = /^[A-Za-z0-9]{1}[A-Za-z0-9_.-]*@{1}[A-Za-z0-9_.-]{1,}.[A-Za-z0-9]{1,}$/;

    // console.log(inputName);
    // console.log(inputContact);    



    btnSubmit.addEventListener('click', function(event) {
        const form = document.getElementById('my-action'); 
        // form.addEventListener('my-action', event => {
            // イベントを停止する
            event.preventDefault();

        let message = [];
        /*入力値チェック*/
        if (inputName.value === "") {
            message.push("氏名が未入力です。");
        } else if (inputName.value.length > 10) {
            message.push("氏名は10文字以内で入力してください。");
        }
        if (inputKana.value === "") {
            message.push("フリガナが未入力です。");
        } else if (inputKana.value.length > 10) {
            message.push("１０文字以内で入力してください。");
        }
        if(inputTel.value==""){
            message.push("電話番号が未入力です。");
        }
        var phoneNumber = inputTel.value.replace(/-/g, ''); // ハイフンを除去して数字のみにする

        if (!/^\d+$/.test(phoneNumber)) {
            message.push("電話番号は数字のみで入力してください。");
        }
        if(inputContact.value==""){
            message.push("お問い合わせ内容が未入力です。");
        }
        if(inputMail.value==""){
            message.push("メールアドレスが未入力です。");
        }else if(!reg.test(inputMail.value)){
            message.push("メールアドレスの形式が不正です。");
        }

        if(message.length > 0){

            form.submit();
            alert(message);

            // location.href="/contacts/contactform";  
            return;
        }else{

            alert('入力チェックOK');
            form.submit();
            // location.href="/contacts/contact-confirmation";    
            // open("/contacts/contact-confirmation","_blank");  
        }
        // });
    });
};