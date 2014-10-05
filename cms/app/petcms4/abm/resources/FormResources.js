Ext.define('app.petcms4.abm.resources.FormResources', {
    extend: 'app.petcms4.abm.PanelFormCabeceraAbm',
    frame: true,
  	prefijo: 'formResources',
  	nombreElementoId: 'id',
  	urlAgregado:  Global.dirAplicacion + '/svc/conector/textResources.php/inserta',
  	urlModificacion: Global.dirAplicacion + '/svc/conector/textResources.php/actualiza',
  	urlBorrado: Global.dirAplicacion + '/svc/conector/textResources.php/borra',
  	items: [
      {xtype: 'hidden', name: 'id', itemId: 'id'},
      {fieldLabel: 'Key', xtype: 'textfield',  name: 'key', itemId: 'key', allowBlank: false, width: 550},
      {fieldLabel: 'Text', xtype: 'textarea',  name: 'text', itemId: 'text',  grow: false, width: 750, height: 130}, 
    ],      
  	   
  	pueblaDatosEnForm : function(record){
      this.getComponent('id').setValue(record.id);
      this.getComponent('key').setValue(record.get('key'));
      this.getComponent('text').setValue(record.get('text'));
  	},
  	   
  	pueblaFormEnRegistro : function(record){
  	  record.data['id']=  this.getComponent('id').getValue();
  	  record.data['key']=  this.getComponent('key').getValue();
  	  record.data['text']=  this.getComponent('text').getValue();
  	},  	   
  	   
  	   validaHijo : function(muestraVentana){
  		   var mensaje=null;
  		   var valido=true;
  		   
  		   if (!this.getComponent('key').isValid()){
  			   valido=false;
  			   mensaje='The Key is invalid';
  		   }
  		   
  		   if (!this.getComponent('text').isValid()){
  			   valido=false;
  			   mensaje='The Text is invalid';
  		   }  		   
         
  		   
  		   if (!valido && muestraVentana){
  	           Ext.MessageBox.show({
  	               title: 'Field Validation',
  	               msg: mensaje,
  	               buttons: Ext.MessageBox.OK,
  	               icon: Ext.MessageBox.ERROR
  	           });
  		   }
  		   return valido;
  	   },

  
  
});













