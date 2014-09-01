Ext.define('app.petcms4.abm.videos.FormVideos', {
    extend: 'app.petcms4.abm.PanelFormCabeceraAbm',
    frame: true,
  	prefijo: 'formVideos',
  	nombreElementoId: 'videoId',
  	urlAgregado:  Global.dirAplicacion + '/svc/conector/videos.php/inserta',
  	urlModificacion: Global.dirAplicacion + '/svc/conector/videos.php/actualiza',
  	urlBorrado: Global.dirAplicacion + '/svc/conector/videos.php/borra',
  	items: [
      {xtype: 'hidden', name: 'videoId', id: 'videoId', itemId: 'videoId'},
      {fieldLabel: 'Title', xtype: 'textfield',  name: 'videoTitle', itemId: 'videoTitle',  id: 'videoTitle', allowBlank: false, width: 550},
      {fieldLabel: 'Url', xtype: 'textfield',  name: 'videoUrl', itemId: 'videoUrl',  id: 'videoUrl', allowBlank: false, width: 250},
      //{fieldLabel: 'Preview', xtype: 'panel',  id: 'xx', html: '<iframe width="560" height="315" src="http://www.youtube.com/embed/AuzyODgWRp4" frameborder="0" allowfullscreen></iframe>'},
      {fieldLabel: 'Tags', xtype: 'textareafield',  name: 'videoTags', itemId: 'videoTags',  id: 'videoTags', grow: false, width: 550, height: 70}, 
    ],      
  	   
  	pueblaDatosEnForm : function(record){
      this.getComponent('videoId').setValue(record.id);
      this.getComponent('videoTitle').setValue(record.get('videoTitle'));
      this.getComponent('videoUrl').setValue(record.get('videoUrl'));
      this.getComponent('videoTags').setValue(record.get('videoTags'));
      var videoPreview=Ext.getCmp('videoPreview');
      videoPreview.setUrl(record.get('videoUrl'));
  	},
  	   
  	pueblaFormEnRegistro : function(record){
  	  record.data['videoId']=  this.getComponent('videoId').getValue();
  	  record.data['videoTitle']=  this.getComponent('videoTitle').getValue();
  	  record.data['videoUrl']=  this.getComponent('videoUrl').getValue();
  	  record.data['videoTags']=  this.getComponent('videoTags').getValue();
  	},  	   
  	   
  	   validaHijo : function(muestraVentana){
  		   var mensaje=null;
  		   var valido=true;
  		   
  		   if (!this.getComponent('videoTitle').isValid()){
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













