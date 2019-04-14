//alert("this works")



function selectOutfit() {
    var usedColors = [];
    document.getElementById("shirt").innerHTML = randomShirt(usedColors) + " shirt";
    document.getElementById("pants").innerHTML = randomPants(usedColors) + " pants";
    document.getElementById("jacket").innerHTML = randomJacket(usedColors) + " jacket";
    //alert(usedColors);
}

function randomShirt(usedColors) {
    let rs = Math.floor(Math.random()*26);
    usedColors.push(rs);
    return rs;
}

function randomPants(usedColors) {
    var retry = true;
    var rp;
    while (retry) {
        rp = Math.floor(Math.random()*26);
        if (usedColors.indexOf(rp) == -1) {
            retry = false;
        }
    }
    usedColors.push(rp);
    return rp;
}

function randomJacket(usedColors) {
    var retry = true;
    var rj;
    while (retry) {
        rj = Math.floor(Math.random()*26);
        if (usedColors.indexOf(rj) == -1) {
            retry = false;
        }
    }
    usedColors.push(rj);
    return rj;
}