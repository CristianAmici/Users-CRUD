"use strict"

document.addEventListener('DOMContentLoaded', () => {


    document.getElementById("createAccount").addEventListener("click", toggleInsertUser)
    document.getElementById("session").addEventListener("click", toggleInsertUser)
    function toggleInsertUser(e) {
        e.preventDefault();
        document.getElementById("session").classList.toggle("createUser");
        document.getElementById("createAccount").classList.toggle("createUser");
        document.getElementById("login").classList.toggle("createUser");
        document.getElementById("createUser").classList.toggle("createUser");
    }


});