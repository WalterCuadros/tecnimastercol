function ajax(url,data,done,timeout){
    $.ajax({
        crossDomain: true,
        url: base_url+url,
        context : document.body,
        dataType: "json",
        global: true,
        type: "POST",
        data: data,
        timeout: timeout
    }).done(done).fail(function(jqXHR,status,msg){
    	$("body").removeClass("loading");
    	alert("Error conexion: "+status+" - "+msg);
    });
}

$(document).ajaxStart(function(){
	$("body").addClass("loading");
});

$(document).ajaxStop(function(){
	$("body").removeClass("loading");
});

//PERMITE SÓLO NÚMEROS
//UTILIZAR EN EVENTO ONKEYPRESS
function onlyNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}

//PERMITE LETRAS Y CARACTERES ESPECIALES
//UTILIZAR EN EVENTO ONKEYPRESS
function onlyText(e){
   key = e.keyCode || e.which;
   tecla = String.fromCharCode(key).toLowerCase();
   letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
   especiales = "8-37-39-46";
   tecla_especial = false
   for(var i in especiales){
        if(key == especiales[i]){
            tecla_especial = true;
            break;
        }
    }
    if(letras.indexOf(tecla)==-1 && !tecla_especial){
        return false;
    }
}

//PERMITE LETRAS Y NUMEROS
//UTILIZAR EN EVENTO ONKEYPRESS
function  onlyTextNumber(e){
    if( e.which == 8 || e.which == 46 ) {return true;}
    var regex = new RegExp("^[a-zA-Z0-9]*$");
    var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
    if (regex.test(str)) {
        return true;
    }
    e.preventDefault();
    return false;
}

//RETORNA EL TRUE SI EL CORREO ES VÁLIDO, FALSE EN CASO CONTRARIO
function validarCorreo(correo){
    var regcorreo = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if(!regcorreo.test(correo))return false;
    return true;
}


/************************************
*               MODALES             *
************************************/
var modalwindow = $("#modal-msj");
var modalcontent = document.getElementById("modal-msj-content");
var modaltitle = document.getElementById("modal-msj-title");
var modalactions = document.getElementById("modal-msj-actions");

var cancel = document.createElement("button");
cancel.innerHTML = "Cancelar";
cancel.setAttribute("data-dismiss","modal");
cancel.className = "btn btn-outline-dark";

var ok = document.createElement("button");
ok.innerHTML = "Aceptar";
ok.setAttribute("data-dismiss","modal");
ok.className = "btn btn-primary mb-0";

//MODAL DE MENSAJES TIPO ALERT
function mensaje(msj = "",callback = false){
    modaltitle.innerHTML = '<i class="fa fa-commenting-o"></i> Mensaje';
    modalcontent.innerHTML = msj;
    modalwindow.modal();
    if(callback){
        $(document.body).on("hidden.bs.modal","#modal-msj",function(){
            callback();            
        });
    }
}

/*
data = {
    ok : "Aceptar",
    cancel : "Cancelar"
}
*/
//MODAL DE MENSAJES TIPO CONFIRM
function confirmar(msj = "",okfunction = false, cancelfunction = false, btnnames = false){  
console.log(modalcontent)  
    modaltitle.innerHTML = '<i class="fa fa-question-circle-o"></i> Mensaje Confirmación';
    modalcontent.innerHTML = msj;
    ok.onclick = okfunction;
    if(cancelfunction)cancel.onclick = cancelfunction;
    if(btnnames.ok)ok.innerHTML = btnnames.ok;
    if(btnnames.cancel)cancel.innerHTML = btnnames.cancel;
    modalactions.innerHTML = "";
    modalactions.appendChild(cancel);
    modalactions.appendChild(ok);
    modalwindow.modal();
}


/*
var params = [];
params.push({
    name    : "btncustom",
    value   : "Mi boton",
    class   : "btn btn-primary",
    action  : function(){
        //mi función a ejecutar con el boton
    }
});
*/
// MODAL CUSTOM
// CREA EL MODAL DE ACUERDO A LOS PARÁMETROS ENVIADOS
function custom(msj = "", title= "", buttons = false){
    modaltitle.innerHTML = title;
    modalcontent.innerHTML = msj;
    modalactions.innerHTML = "";    
    if(buttons){
        for(var i = 0; i < buttons.length; i++){
            if(buttons[i]){                
                eval("var "+buttons[i].name+" = document.createElement('button');");
                eval(buttons[i].name+".innerHTML = '"+buttons[i].value+"';");
                eval(buttons[i].name+".className = '"+buttons[i].class+"';");
                if(buttons[i].action){
                    eval(buttons[i].name+".onclick = "+buttons[i].action+";");
                }
                //eval(buttons[i].name+".setAttribute('data-dismiss','modal');");
                eval("modalactions.appendChild("+buttons[i].name+");");
            }            
        }
    }
    modalwindow.modal();
}

