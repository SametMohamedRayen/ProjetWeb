
//Adding events checkbox otpions
var checkbox1 = document.getElementById("events-checkbox")
checkbox1.addEventListener("change",()=>
{   var div1 = document.getElementById("events-options");
    if (checkbox1.checked == true){
        div1.style.display = "block";
    }
    else {
        div1.style.display = "none";
    }
});

//Adding restos checkbox otpions
var checkbox2 = document.getElementById("endroits-checkbox")
checkbox2.addEventListener("change",()=>
{   var div2 = document.getElementById("endroits-options");
    if (checkbox2.checked == true){
        div2.style.display = "block";
    }
    else {
        div2.style.display = "none";
    }
});
