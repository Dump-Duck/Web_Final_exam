document.addEventListener("DOMContentLoaded", function() {
    const form = document.querySelector(".register-form");
    const notification_area = document.querySelector("#notification-area");
    
    form.onsubmit = function() {
        var username = document.querySelector("#username").value;
        var password = document.querySelector("#password").value;
        var re_password = document.querySelector("#re-password").value;
        create_alert();
        var notification_content = document.querySelector(".notification");
        var message_content = document.querySelector("#message");

        if(username === "" || password === "" || re_password === "") {
            message_content.innerHTML = `Please enter all information in field!`;
            notification_content.style.background = "rgba(255, 10, 5, 0.4";
            notification_content.style.borderLeft = "6px solid red";
            document.querySelector("#countdown").style.background = "red";
            return false;
        }
        else if(re_password != password) {
            message_content.innerHTML = `Re-password is incorrect. Please try again!`;
            notification_content.style.background = "rgba(255, 10, 5, 0.4";
            notification_content.style.borderLeft = "6px solid red";
            document.querySelector("#countdown").style.background = "red";
            return false;
        }
    };

    function create_alert() {
        const content = document.createElement("div");
        content.classList.add("notification");
        content.innerHTML = `<span id="message"></span>
                            <span id="countdown"></span>`;
        notification_area.append(content);
        
        setTimeout(function() {
            content.style.animation = "hide_alert 2s ease forwards";
        }, 3000);
        
        setTimeout(function() {
            content.remove();
        }, 4500);
    }
})