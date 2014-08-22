Ext.define('app.petcms4.abm.news.FormNews', {
    extend: 'app.petcms4.abm.PanelFormCabeceraAbm',
    frame: true,
  	prefijo: 'formNews',
  	nombreElementoId: 'newsId',
  	urlAgregado:  Global.dirAplicacion + '/svc/conector/news.php/inserta',
  	urlModificacion: Global.dirAplicacion + '/svc/conector/news.php/actualiza',
  	urlBorrado: Global.dirAplicacion + '/svc/conector/news.php/inhabilita',
  	items: [
      {xtype: 'hidden', name: 'newsId', id: 'newsId', itemId: 'newsId'},
      {fieldLabel: 'Title', xtype: 'textfield',  name: 'newsTitle', itemId: 'newsTitle',  id: 'newsTitle', allowBlank: false, width: 150},
      {fieldLabel: 'Date', xtype: 'fecha', name: 'newsDate', itemId: 'newsDate', width: 100},
      {fieldLabel: 'Text', xtype: 'textareafield',  name: 'newsText', itemId: 'newsText',  id: 'newsText', grow: false, width: 350, height: 270},
      {fieldLabel: 'Soruce', xtype: 'textfield',  name: 'newsSource', itemId: 'newsSource',  id: 'newsSource', allowBlank: true, width: 320},
    ],      
  	   
  	pueblaDatosEnForm : function(record){
      this.getComponent('newsId').setValue(record.id);
      this.getComponent('newsTitle').setValue(record.get('newsTitle'));
      this.getComponent('newsDate').setValue(record.get('newsDate'));
      this.getComponent('newsSource').setValue(record.get('newsSource'));
      this.getComponent('newsText').setValue(record.get('newsText'));
  	},
  	   
  	pueblaFormEnRegistro : function(record){
  	  record.data['newsId']=  this.getComponent('newsId').getValue();
  	  record.data['newsTitle']=  this.getComponent('newsTitle').getValue();
  	  record.data['newsSource']=  this.getComponent('newsSource').getValue();
  	  record.data['newsDate']=  this.getComponent('newsDate').getValue();
  	  record.data['newsText']=  this.getComponent('newsText').getValue();
  	   },  	   
  	   
  	   validaHijo : function(muestraVentana){
  		   var mensaje=null;
  		   var valido=true;
  		   
  		   if (!this.getComponent('newsTitle').isValid()){
  			   valido=false;
  			   mensaje='The title is invalid';
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













