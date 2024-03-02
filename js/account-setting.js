const settingBox = document.getElementById("setting-box");
const accountBox = document.getElementById("account-info");

accountBox.addEventListener("mouseover",function(){
    settingBox.style.display = "flex";
})

accountBox.addEventListener("mouseout",function(){
    settingBox.style.display = "none";
})