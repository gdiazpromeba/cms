Ext.define('app.petcms4.abm.shelters.usa.FormSheltersUsa', {
    extend: 'app.petcms4.abm.PanelFormCabeceraAbm',
    frame: true,
  	prefijo: 'formSheltersUsa',
  	nombreElementoId: 'shelterUsaId',
  	urlAgregado:  Global.dirAplicacion + '/svc/conector/sheltersUsa.php/inserta',
  	urlModificacion: Global.dirAplicacion + '/svc/conector/sheltersUsa.php/actualiza',
  	urlBorrado: Global.dirAplicacion + '/svc/conector/sheltersUsa.php/inhabilita',
    layout: 'form',
  	items: [
      {xtype: 'hidden', name: 'id', id: 'id', itemId: 'id'},
      {fieldLabel: 'Shelter Name', xtype: 'textfield',  name: 'name', itemId: 'name',  id: 'name', allowBlank: false, width: 150},
      {fieldLabel: 'Zip Code', xtype: 'textfield',  name: 'zip', itemId: 'zip',  id: 'zip', allowBlank: false, width: 150},
      {fieldLabel: 'URL', xtype: 'textfield',  name: 'url', itemId: 'url',  id: 'url', allowBlank: false, width: 150},
      {fieldLabel: 'Email', xtype: 'textfield',  name: 'email', itemId: 'email',  id: 'email', allowBlank: false, width: 150},
      {fieldLabel: 'Phone', xtype: 'textfield',  name: 'phone', itemId: 'phone',  id: 'phone', allowBlank: false, width: 150},
      {fieldLabel: 'Description', xtype: 'textfield',  name: 'description', itemId: 'description',  id: 'description', allowBlank: false, width: 150},
      {fieldLabel: 'Street Address', xtype: 'textfield',  name: 'streetAddress', itemId: 'streetAddress',  id: 'streetAddress', allowBlank: false, width: 150},
	  {fieldLabel: 'Picture', xtype: 'textfield',  name: 'logoUrl', itemId: 'logoUrl', id: 'logoUrl', allowBlank: false, width: 250},
	  {fieldLabel: 'Foto', xtype: 'button', text: 'Subir foto', itemId: 'botAceptar', ref: '../botAceptar', 
	       listeners: {scope: this,  
	         'click' :  function(){
	           var win=muestraRemisionFotos('fichaFotoFU',  Global.dirAplicacion + '/svc/conector/sheltersUsa.php/subeLogo');
	           win.show();
	           win.on("beforedestroy", function(){
	               Ext.getCmp('logoUrl').setValue(win.getNombreArchivoFoto());
	               Ext.getCmp('imagePhotoBreed').el.dom.src= Global.dirAplicacion + '/resources/images/breeds/' + win.getNombreArchivoFoto(); 
	               //formulario.doLayout();     
	           });
	         }//evento click
	        }//listeners
	   },//botón Aceptar                  
    ],      
  	   
  	pueblaDatosEnForm : function(record){
  	 this.getComponent('id').setValue(record.id);
  	 this.getComponent('name').setValue(record.get('name'));
  	 this.getComponent('zip').setValue(record.get('zip'));
  	 this.getComponent('url').setValue(record.get('url'));
  	 this.getComponent('logoUrl').setValue(record.get('logoUrl'));
  	 this.getComponent('email').setValue(record.get('email'));
  	 this.getComponent('phone').setValue(record.get('phone'));
  	 this.getComponent('description').setValue(record.get('description'));
  	 this.getComponent('streetAddress').setValue(record.get('streetAddress'));
     //foto
     Ext.getCmp('imagePhotoBreed').el.dom.src= Global.dirAplicacion + '/resources/images/breeds/' +record.get('pictureUrl'); 
  },
  	   
  pueblaFormEnRegistro : function(record){
    record.data['id']=  this.getComponent('id').getValue();
    record.data['name']=  this.getComponent('name').getValue();
    record.data['zip']=  this.getComponent('zip').getValue();
    record.data['url']=  this.getComponent('url').getValue();
    record.data['logoUrl']=  this.getComponent('logoUrl').getValue();
    record.data['email']=  this.getComponent('email').getValue();
    record.data['phone']=  this.getComponent('phone').getValue();
    record.data['description']=  this.getComponent('description').getValue();
    record.data['streetAddress']=  this.getComponent('streetAddress').getValue();
  	record.commit();
  },  	   
  	   
  	   validaHijo : function(muestraVentana){
  		   var mensaje=null;
  		   var valido=true;
  		   
  		   if (!this.getComponent('name').isValid()){
  			   valido=false;
  			   mensaje='El nombre no es válido';
  		   }
         
  		   
  		   if (!valido && muestraVentana){
  	           Ext.MessageBox.show({
  	               title: 'Validación de campos',
  	               msg: mensaje,
  	               buttons: Ext.MessageBox.OK,
  	               icon: Ext.MessageBox.ERROR
  	           });
  		   }
  		   return valido;
  	   }
  	   
  
});













