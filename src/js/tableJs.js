"use strict"

document.addEventListener('DOMContentLoaded', () => {

 
  document.getElementById("btnInsertForm").addEventListener("click", toggleInsertUser)
  document.getElementById("btnReturn").addEventListener("click", ()=>{
    toggleInsertUser();
    
  });
  function toggleInsertUser(e) {
  e.preventDefault();
    document.getElementById("createUser").classList.toggle("createUser");
    document.getElementById("btnInsertForm").classList.toggle("createUser");


  }

});