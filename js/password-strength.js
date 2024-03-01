const power = document.getElementById("power-point"); 
password.oninput = function () { 
    let point = 0; 
    let passwordValue = password.value; 
    let widthPower =  
        ["1%", "25%", "50%", "75%", "100%"]; 
    let colorPower =  
        ["#D73F40", "#DC6551", "#F2B84F", "#BDE952", "#3ba62f"]; 
  
    if (passwordValue.length >= 6) { 
        let characterTest =  
            [/[0-9]/, /[a-z]/, /[A-Z]/, /[^0-9a-zA-Z]/]; 
        characterTest.forEach((character) => { 
            if (character.test(passwordValue)) { 
                point += 1; 
            } 
        }); 
    } 
    power.style.width = widthPower[point]; 
    power.style.backgroundColor = colorPower[point]; 
};