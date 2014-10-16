Ext.define('app.petcms4.abm.PanelFormCabeceraAbm', {
  extend: 'Ext.form.Panel',
  frame:true,
  defaultType: 'textfield',
  agregando: false,
  modificando: false,
  padreModificando: true,  // si es una form padre, siempre es verdadero
  exito: false,
  prefijo: null,
  nombreElementoId: null,
  valorIdPadre: null,
  urlAgregado: null,
  urlModificacion: null,
  urlBorrado: null,
  impresion: null,
  escritura: true,
  defaults: {
    msgTarget: 'side'
  },
  buttons:[
    {text: 'Agregar', itemId: 'botAgregar', handler:  function(){
    	var form=this.up('form');
    	form.pulsoAgregar(form);
      }
    },
    {text: 'Modificar', itemId:  'botModificar',  handler:  function(){
    	var form=this.up('form');
    	form.pulsoModificar(form);
      }
    },
    {text: 'Borrar',  itemId:  'botBorrar', handler:  function(){
    	var form=this.up('form');
    	form.pulsoBorrar(form);
      }
    },
    {text: 'Confirmar', itemId:  'botConfirmar',  handler:  function(){
    	var form=this.up('form');
    	form.pulsoConfirmar(form);
      }
    },
    {text: 'Cancelar',  itemId:  'botCancelar', handler:  function(){
    	var form=this.up('form');
    	form.pulsoCancelar(form);
      }
    },
  ],
  keys: [
   {key: [10,13], fn: function(codigo, evento){
      if (evento.getTarget().type!='textarea'){
        if (this.agregando || this.modificando){
          this.pulsoConfirmar();
        }
      }
    },
    scope: this
   },
   {key: [27], fn: function(){                                              
      if (panel.agregando || panel.modificando){
        panel.pulsoCancelar();
      }
    },
    scope: this
   }
  ],


  pulsoAgregar: function(me){
      me.agregando=true;
      me.modificando=false;
      me.habilitaCampos(me, true);
      me.down('#botAgregar').setDisabled(true);
      me.down('#botModificar').setDisabled(true);
      me.down('#botBorrar').setDisabled(true);
      me.down('#botConfirmar').setDisabled(false);
      me.down('#botCancelar').setDisabled(false);
      me.reseteaForm(me);
      me.fireEvent('cambio en agregando/modificando', this.agregando, this.modificando);
      me.focus();
  },
    
    
  pulsoModificar: function(me){
   	  me.agregando=false;
   	  me.modificando=true;
   	  me.habilitaCampos(me, true);
 	  me.down('#botAgregar').setDisabled(true);
	  me.down('#botModificar').setDisabled(true);
	  me.down('#botBorrar').setDisabled(true);
	  me.down('#botConfirmar').setDisabled(false);
	  me.down('#botCancelar').setDisabled(false);
   	  me.fireEvent('cambio en agregando/modificando', this.agregando, this.modificando);
   	  me.focus();
  },    
    
  pulsoCancelar: function(me){
      me.agregando=false;
      me.modificando=false;
      me.habilitaCampos(me, false);
      me.down('#botAgregar').setDisabled(false);
      me.down('#botModificar').setDisabled(false);
      me.down('#botBorrar').setDisabled(false);
      me.down('#botConfirmar').setDisabled(true);
      me.down('#botCancelar').setDisabled(true);
      me.fireEvent('cambio en agregando/modificando', this.agregando, this.modificando);
  } ,       
    
  habilitaCampos: function(me, valor){
   	 var items=me.items;
   	 var keys=items.keys;
   	 for (var i=0; i<keys.length; i++){
   		 var key=keys[i];
   		 var item=items.map[key];
        if (item.getXType()=='hidden') continue;
   		 if (valor){
   	       item.enable();
   		 }else{
	     	   item.disable();
   		 }
   	 }
  },    
    
  pulsoConfirmar: function(me){
        if (me.validaHijo(true)){
 	  	   if (me.agregando){
 	  		 me.agregado(me);
 	  	   }else if (me.modificando){
 	  		 me.modificacion(me);
 	  	   }
        }
  },    
    
  pulsoBorrar: function(me){
	   var idABorrar=me.down('#' + me.nombreElementoId).getValue();
   	   if (Ext.isEmpty(idABorrar)){
   		   Ext.Msg.show({
   			   title:'Borrado',
   			   msg: 'Debe seleccionar algún registro para borrar',
   			   buttons: Ext.Msg.OK
   	       });
   		   return;
   	   }else{
   		   Ext.Msg.show({
   				   title:'Confirmación',
   				   msg: '¿Desea realmente borrar?',
   				   buttons: Ext.Msg.YESNO,
   				   fn: function(btn){  
   			         if(btn === 'yes'){
   			        	 me.borrado(me, idABorrar);
   			         }
   		           }
   		   });
   	   }

  },    
    
  //reinicializa el formulario, pero preservando el valor del "id padre", si existe
  reseteaForm : function(me){
        var vidp=me.getComponent(this.prefijo +  'valorIdPadre');
        var valor=null;
        if(!(typeof vipd === 'undefined')){
        	valor=vidp.getValue();
        }
        me.getForm().reset();
        if(!(typeof vipd === 'undefined')){
        	vidp.setValue(valor);
        }
        
  },  
   
  agregado: function(me){
     var panForm=me;
	 panForm.getForm().submit({
       url : me.urlAgregado,
       waitMsg : 'Grabando datos...',
       failure: function (form, options) {
      	 panForm.tratamientoFailure(panForm, form, options, 'agregado');
       },
       success: function (form, options) {
	    	var objRespuesta=Ext.JSON.decode(options.response.responseText);
	    	if (objRespuesta.success==true){
	    		panForm.exitoAgregado(me, objRespuesta.nuevoId);
	    	}
       }
     });
  },  
  
  exitoAgregado: function(me, nuevoId){
    me.fireEvent('exitoAgregado', nuevoId);
	me.habilitaCampos(me, false);
    me.agregando=false;
    me.modificando=false;
    me.inicioBotones(me, true);
    me.fireEvent('cambio en agregando/modificando', me.agregando, me.modificando);
  },  
  
  inicioBotones: function(me, escritura){
   	if (escritura){
       me.down('#botAgregar').setDisabled(false);
       me.down('#botModificar').setDisabled(false);
       me.down('#botBorrar').setDisabled(false);
       me.down('#botConfirmar').setDisabled(true);
       me.down('#botCancelar').setDisabled(true);  
  	}else{
        me.down('#botAgregar').setDisabled(true);
        me.down('#botModificar').setDisabled(true);
        me.down('#botBorrar').setDisabled(true);
        me.down('#botConfirmar').setDisabled(false);
        me.down('#botCancelar').setDisabled(false);  
  	}
  } ,  
  
  modificacion: function(me){
	   var panForm=me;
	   panForm.getForm().submit({
	          url : me.urlModificacion, 
	          waitMsg : 'Grabando datos...',
	          failure: function (form, options) {
	          	panForm.tratamientoFailure(panForm, form, options, 'modificación');
	          },
	          success: function (form, request) {
	        	panForm.exitoModificacion(me);
           }
	   });
  },  
  
  tratamientoFailure : function(me, param1, param2, accion){
	 	var form=param1;
	 	var response=param2.response;
	 	if (accion=='agregado' || accion=='modificación'){
	    	//la respuesta en sí es exitosa, pero se envió un mensaje de error JSON formateado
	    	//var cadena = response.responseText;
	 		var tipoFalla=param2.failureType;
	 		if (tipoFalla!=undefined){
	 	      if (tipoFalla=='client'){
                Ext.MessageBox.show({title: 'Error', msg: 'Formulario remitido con valores inválidos', buttons: Ext.MessageBox.OK, icon: Ext.MessageBox.ERROR});
                return;         	
	 	      }else if(tipoFalla=='connect' || tipoFalla=='server'){
                Ext.MessageBox.show({title: 'Error', msg: 'Error de procesamiento en el servidor', buttons: Ext.MessageBox.OK, icon: Ext.MessageBox.ERROR});
                return;         	
	 	      }		
	 		}
			var objJSON = Ext.JSON.decode(param2.response.responseText, true);
			if (objJSON!=null && !objJSON.success ){
	          me.fracasoGrabacion(objJSON.errors);
	          return;
			}
	 		if (response.status!=undefined && response.status==500){
              me.fracasoGrabacion('Error de tipo 500. \n ¿Probablemente se haya intentado ingresar un valor nulo para un campo que no lo permite?');
              return;
    	    }else{
                Ext.MessageBox.show({title: 'Error', msg: 'Tipo de error no contemplado', buttons: Ext.MessageBox.OK, icon: Ext.MessageBox.ERROR});
                return;         	
    	    }
	 	}else if (accion=='borrado'){
           if (form.status==500){
             me.fracasoBorrado(me, 'Error de tipo 500. \n ¿Probablemente el registro tenga dependencias?');
    	   }else{
    	     me.fracasoBorrado(me, options.result.errors);
    	   }	 		
	 	}
  },  
   
  exitoModificacion: function(me){
   	me.fireEvent('datos del formulario cabecera cambiaron');
   	me.fireEvent('exitoModificacion', me);
   	me.habilitaCampos(me, false);
   	me.agregando=false;
   	me.modificando=false;
   	me.inicioBotones(me, true);
   	me.fireEvent('cambio en agregando/modificando',  me.agregando, me.modificando);
  },  
  
  
  fracasoGrabacion: function(me, error){
    mensaje="Error al grabar los datos. <br/>";
    mensaje+='El mensaje devuelto por el servidor es: <br/>';
    mensaje+=error;
 	  Ext.MessageBox.show({
        title: 'Error',
        msg: mensaje,
        buttons: Ext.MessageBox.OK,
        icon: Ext.MessageBox.ERROR
    });
    me.habilitaCampos(me, true);
    me.fireEvent('cambio en agregando/modificando', me.agregando, me.modificando);
  } ,    
  
  exitoBorrado: function(me){
    me.reseteaForm(me);
    me.fireEvent('datos del formulario cabecera cambiaron');
  },     
  
  fracasoBorrado: function(me, error){
      mensaje="Error al borrar los datos. <br/>";
      mensaje+='El mensaje devuelto por el servidor es: <br/>';
      mensaje+=error;
      Ext.MessageBox.show({
	       title: 'Error',
	       msg: mensaje,
	       buttons: Ext.MessageBox.OK,
	       icon: Ext.MessageBox.ERROR
      });
      me.habilitaCampos(me, true);
      me.fireEvent('cambio en agregando/modificando', me.agregando, me.modificando);
    } ,    
    
    borrado: function(me, idABorrar){
	     var conn = new Ext.data.Connection();
	     conn.request({
	       url:  me.urlBorrado,
	       method: 'POST',
	       params: {"id": idABorrar},
	        failure: function (form, options) {
	          panForm.tratamientoFailure(me, form, options, 'borrado');
	        },
	        success: function (response, request) {
           var objRespuesta=Ext.JSON.decode(response.responseText);
           if (objRespuesta.success){
	        	  me.exitoBorrado(me);
           }else{
             me.fracasoBorrado(me, objRespuesta.errors);
           }
	        }
	   });
    },    
    
    setId : function(me, valor){
        me.down('#' + me.nombreElementoId).setValue(valor);
    },
  

    
    setValorIdPadre : function(me, valor){
      me.getComponent(me.prefijo + "valorIdPadre").setValue(valor);
    },
    
    getValorIdPadre : function(me){
      return me.getComponent(this.prefijo +  "valorIdPadre").getValue();
    },
    
     // Agrego listener en el botón "agregar", para revertir si no hay valorIdPadre.
     //Esto se usa en forms secundarias, para evitar
    agregaVerificacionValorPadre : function(me){
        me.buttons[0].on('click', function(){
    	  var nombreVIP=me.prefijo + 'valorIdPadre';
    	  if (Ext.isEmpty(me.getComponent(nombreVIP).getValue())){
    	   Ext.MessageBox.show({
             title: 'Error',
             msg: 'No hay un registro principal seleccionado',
             buttons: Ext.MessageBox.OK,
             icon: Ext.MessageBox.ERROR
          });
          me.inicioBotones(me, true);
    	}
      })
   },


   listeners: {
	   render : function(me, component, index, eOpts){
	     var nombreVIP= this.prefijo + 'valorIdPadre';
	     this.add({xtype:'hidden', name: nombreVIP, itemId: nombreVIP, id: nombreVIP});
	     var panelCentral=Ext.getCmp('panelCentral');
	     this.habilitaCampos(this, false);
	   }
   }

    
});//del define