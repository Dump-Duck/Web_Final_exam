document.addEventListener("DOMContentLoaded", function() {
    var phone = document.querySelector(".form__field");
    var button = document.querySelector(".btn--primary");

    button.disabled = true;
    button.style.backgroundColor = "rgba(34, 34, 34, 0.5)";
    button.style.color = "#fff";
    button.style.cursor = "not-allowed";

    phone.onkeyup = function() {
        button.disabled = false;
        button.style.backgroundColor = "orange";
        button.style.color = "#fff";
        button.style.boxShadow = "0 0 10px 2px rgb(0 0 0 / 10%)";
        button.style.borderRadius = "2px";
        button.style.padding = "8px 24px";
        button.style.cursor = "pointer";
    };
    button.onclick = function() {
        let phone_number = document.querySelector('.form__field').value;
        if(document.querySelector(".form__field").value.length == 10) {
            alert(`Đăng ký liên hệ với số điện thoại: ${phone_number} thành công!`);
        } else {
            alert(`Số điện thoại bạn nhập không hợp lệ. Vui lòng thử lại!`);
        }
    };
});