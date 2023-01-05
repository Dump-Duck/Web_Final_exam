document.addEventListener("DOMContentLoaded", function() {
    const body = document.querySelector("body");

    const main_menu = document.querySelector(".main-menu");
    const main_option = document.querySelectorAll(".main-option > .in-menu");
    const dropbtn = document.querySelector('.dropbtn');
    const sidebar = document.querySelector(".sidebar");
    const recent_name = document.querySelectorAll(".recent-name");
    const recent_chap = document.querySelectorAll(".recent-chap");
    const all_h1 = document.querySelectorAll("h1");
    const name_title = document.querySelectorAll(".name-title");

    const btn_list_dark = document.querySelector(".btn_list_dark");
    const btn_list_light = document.querySelector(".btn_list_light");

    const button_dark = document.querySelector(".btn_dark");
    const button_light = document.querySelector(".btn_light");

    var i;

    btn_list_dark.style.display = "none";

    button_dark.onclick = function() {
        body.style.backgroundColor = "#170f23";
        main_menu.style.backgroundColor = "#170f23";
        sidebar.style.backgroundColor = "#170f23";
        dropbtn.style.backgroundColor = "#170f23";
        dropbtn.style.color = "#fff";
        document.querySelector("#sidebar-title").style.color = "#fff";
        btn_list_dark.style.display = "none";
        btn_list_light.style.display = "block";
        for(i=0; i<all_h1.length; i++) {
            all_h1[i].style.color = "#fff";
        }
        for(i=0; i<name_title.length; i++) {
            name_title[i].style.color = "#fff";
        }
        for(i=0; i<main_option.length; i++) {
            main_option[i].style.color = "#fff";
        }
        for(i=0; i<recent_chap.length; i++) {
            recent_chap[i].style.color = "#fff";
        }
        for(i=0; i<recent_name.length; i++) {
            recent_name[i].style.color = "#fff";
        }
    };

    button_light.onclick = function() {
        body.style.backgroundColor = "#fff";
        main_menu.style.backgroundColor = "#fff";
        sidebar.style.backgroundColor = "#fff";
        dropbtn.style.backgroundColor = "#fff";
        dropbtn.style.color = "#170f23";
        document.querySelector("#sidebar-title").style.color = "#170f23";
        btn_list_light.style.display = "none";
        btn_list_dark.style.display = "block";
        for(i=0; i<all_h1.length; i++) {
            all_h1[i].style.color = "#170f23";
        }
        for(i=0; i<name_title.length; i++) {
            name_title[i].style.color = "#170f23";
        }
        for(i=0; i<main_option.length; i++) {
            main_option[i].style.color = "#170f23";
        }
        for(i=0; i<recent_chap.length; i++) {
            recent_chap[i].style.color = "#170f23";
        }
        for(i=0; i<recent_name.length; i++) {
            recent_name[i].style.color = "#170f23";
        }
    }

});