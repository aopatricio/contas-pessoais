/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function abrirPag(valor){
    var url = valor;

    xmlRequest.open("GET",url,true);    
    xmlRequest.onreadystatechange = mudancaEstado;
    xmlRequest.send(null);

        if (xmlRequest.readyState == 1) {
            document.getElementById("conteudo_mostrar").innerHTML = "<img src='loader.gif'>";
        }

    return url;
}

function mudancaEstado(){
    if (xmlRequest.readyState == 4){
        document.getElementById("conteudo_mostrar").innerHTML = xmlRequest.responseText;
    }
}