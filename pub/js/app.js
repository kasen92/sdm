var numPag=1;
var pagTotales=1;

$(document).ready(function(){




  $('form.ajaxLogin').on('submit',function(){
    var var1=$(this),
    url=var1.attr('action'),
    type=var1.attr('method'),
    data={};
    var1.find('[name]').each(function(index,value){
      var var1=$(this),
      name=var1.attr('name'),
      value=var1.val();
      data[name]=value;
    });

    $.ajax({
      url:url, 
      type:type,
      data:data,
      dataType: 'json',
      
      success: function(output){ 
        window.location.href=output.redirect;
      },
      
      error: function(){}
      });

    return false;
  });

  $('form.afegirusuari').on('submit',function(){
    var that=$(this),
    url=that.attr('action'),
    type=that.attr('method'),
    data={};
    that.find('[name]').each(function(index,value){
      var that=$(this),
      name=that.attr('name'),
      value=that.val();
      data[name]=value;
    });

    $.ajax({
      url:url, 
      type:type,
      data:data,
      dataType: 'json',
      beforeSend: function(){
      },
      success: function(output){
        
        $("#must").hide();
        if(output.registro==true) {
          $("#must").html("<p>Usuario registrado correctamente</p>");
          $("#must p").addClass("be");
        }else{
          $("#must").html("<p>"+output.msg+"</p>");
          $("#must p").addClass("malament");
        } 

      },
      
      complete: function(){        
        setTimeout(function(){ 
          $("#must").show();
        }, 3000);
      },

      error: function(output){
        alert(output.registro);
      }
      });

    return false;
  });

  $('#gestionUsuarios').on('click',function(){
    loadusers();
  });
});


function loadusers(){
  $.ajax({
      url:'desktopAdmin/CargarDatosUsuarios',
      dataType:'json',
      success: function(output){
        showusers(output);
      },
      error: function(output){
        console.log(output);
      }
  });
}

function showusers(datos){
  $(".classUP").remove();
  var sav="";
  sav+='<table class="classUP">';
    sav+='<thead>';
       sav+='<tr>';
         sav+='<th>Rol Usuari</th>';
         sav+='<th>Nom</th>';
         sav+='<th>Contrasenya</th>';
         sav+='<th></th>';
         sav+='<th></th>';
       sav+='</tr>';
    sav+='</thead>';
    sav+='<tbody>';
  $.each(datos, function(index, el) {
    sav+='<tr>';
      sav+='<td>'+el.rol+'</td>';
      sav+='<td>'+el.nombre+'</td>';
      sav+='<td>'+el.contrasena+'</td>';
      sav+='<td><button onClick="CargarDatosUsuarios(\''+el.id+'\',\''+el.nombre+'\',\''+el.contrasena+'\',\''+el.rol+'\')"">Edit User</button></td>';
      sav+='<td><button onClick="deleteuser(\''+el.id+'\',\''+el.nombre+'\',\''+el.contrasena+'\',\''+el.rol+'\')"">Delete</button></td>';
    sav+='</tr>';
  });
    sav+='</tbody> ';
  sav+='</table>';
  $(".usuarios").html(sav);
}

function CargarDatosUsuarios(id,nombre,contrasena,rol){
  $("#Identificacio").prop("disabled",true);
  $("#Identificacio").val(id);
  $("#nommodal").val(nombre);
  $("#contramodal").val(contrasena);
  $("#dialogPerfilUsuario").dialog({
    open: function(event, ui) { $(".ui-dialog-titlebar-close").hide();},
    width:460,
    height:360,
    modal: true,
    buttons: {
      "Acceptar": function() {
        $.ajax({
          url:"desktopAdmin/editarPerfilUsuario", 
          type:"POST",
          data:{'id': $("#Identificacio").val(),'nombre':$("#nommodal").val(),'contrasena':$("#contramodal").val()},
          dataType: 'json',
          success: function(output){ 
            if (output=="OK") {
              stringvarcharr("Datos guardados correctamente");
            }else{
              stringvarcharr("Error ("+output+")");
            }
            loadusers();
          },                   
          error: function(output){
            console.log(output);
          }
        });
        $( this ).dialog( "close" );
      },
      "Retorn": function() {
        $( this ).dialog( "close" );
      }
    }
  });
}

function deleteuser(id){
  $.ajax({
      url:'desktopAdmin/deleteuser',
      type:"POST",
      data:{'id': id},
      dataType:'json',
      success: function(output){
        if (output=="OK") {
          stringvarcharr("Eliminat");
        }else{
          stringvarcharrstringvarcharr("("+output+")");
        }
        loadusers();
      },
      error: function(output){
        console.log(output);
      }
  });
}


function stringvarcharr(mensaje) {
  $("#mensajeModal").text(mensaje);
  $("#dialog-mensaje").dialog({
      open: function(event, ui) { $(".ui-dialog-titlebar-close").hide();},

    draggable: false,
    resizable: false,
    width:500,
    height:250,
    modal: true,
    buttons: {
      "Aceptar": function() {
        $( this ).dialog( "close" );
      }
    }
  });
}
