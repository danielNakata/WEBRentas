/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var divs = [
    'inmueblesDiv'
    ,'clientesDiv'
];


function muestraDiv(divid){
    for(var i=0; i<divs.length; i++){
        if(divid === divs[i]){
            document.getElementById(divid).style.visibility = "visible";
            document.getElementById(divid).style.heigth = "auto";
        }else{
            document.getElementById(divs[i]).style.visibility = "hidden";
            document.getElementById(divs[i]).style.heigth = "0px";
        }
    }
    
}


