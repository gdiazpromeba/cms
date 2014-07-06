Ext.define('app.petcms4.abm.shelters.usa.FormSheltersUsa', {
    extend: 'app.petcms4.abm.PanelFormCabeceraAbm',
    frame: true,
    prefijo: 'formSheltersUsa',
    nombreElementoId: 'id',
    urlAgregado:  Global.dirAplicacion + '/svc/conector/sheltersUsa.php/inserta',
    urlModificacion: Global.dirAplicacion + '/svc/conector/sheltersUsa.php/actualiza',
    urlBorrado: Global.dirAplicacion + '/svc/conector/sheltersUsa.php/borra',
    layout: 'column',
    items: [
      {xtype: 'hidden', name: 'id', id: 'id', itemId: 'id'},            
      {xtype: 'fieldset', itemId: 'colIzq', border: false, style: 'padding:0px', bodyStyle: 'padding:0px', columnWidth: 0.5,
        items:[            
          
            {fieldLabel: 'Shelter Name', xtype: 'textfield',  name: 'name', itemId: 'name',  id: 'name', allowBlank: false, width: 350},
            {fieldLabel: 'State', xtype: 'textfield',  name: 'state', itemId: 'state',  id: 'state', readOnly: true, allowBlank: false, width: 200},
            {fieldLabel: 'County', xtype: 'textfield',  name: 'county', itemId: 'county',  id: 'county', readOnly: true, allowBlank: false, width: 250},
            {fieldLabel: 'City', xtype: 'textfield',  name: 'city', itemId: 'city',  id: 'city', readOnly: true, allowBlank: false, width: 250},
            {fieldLabel: 'Zip Code', xtype: 'textfield',  name: 'zip', itemId: 'zip',  id: 'zip', allowBlank: false, width: 160,
            	listeners:{
            		blur : function(  The, eOpts ){
            			var colIzq=this.up('#colIzq');
            			Ext.Ajax.request ({
            			    url: Global.dirAplicacion + '/svc/conector/sheltersUsa.php/zipContainers?zip=' + this.getValue(),        			    
            			    success: function (res) {
            			    	var ret=Ext.JSON.decode(res.responseText);
            			    	if (ret.success=true){
            			    		colIzq.getComponent('state').setValue(ret.state);
            			    		colIzq.getComponent('city').setValue(ret.city);
            			    		colIzq.getComponent('county').setValue(ret.county);
            			    	}else{
            			    		colIzq.getComponent('zip').markInvalid();
            			    	}
            			    } ,
            			    failure: function () {
            			        alert('ajax call error');
            			    }
            			});
            		}	
            	}
            	
            },
            {fieldLabel: 'URL', xtype: 'textfield',  name: 'url', itemId: 'url',  id: 'url', allowBlank: false, width: 350},
            {fieldLabel: 'Email', xtype: 'textfield',  name: 'email', itemId: 'email',  id: 'email', allowBlank: true, width: 320},
            {fieldLabel: 'Phone', xtype: 'textfield',  name: 'phone', itemId: 'phone',  id: 'phone', allowBlank: true, width: 210},
            {fieldLabel: 'Description', xtype: 'textareafield',  name: 'description', itemId: 'description',  id: 'description', grow: true, width: 350},
            {fieldLabel: 'Street Address', xtype: 'textareafield',  name: 'streetAddress', itemId: 'streetAddress',  id: 'streetAddress', 
	          allowBlank: false, width: 350, height: 40},
          ]
      },//colizq
      {xtype: 'fieldset', itemId: 'colDer', border: false, style: 'padding:0px', bodyStyle: 'padding:0px', columnWidth: 0.5,
    	  items:[
    	            {fieldLabel: 'Picture', xtype: 'textfield',  name: 'logoUrl', itemId: 'logoUrl', id: 'logoUrl', allowBlank: true, width: 250},
    	            {fieldLabel: 'Foto', xtype: 'button', text: 'Subir foto', itemId: 'botAceptar', ref: '../botAceptar', 
    		            listeners: {scope: this,  
    		               'click' :  function(){
    		                 var win=muestraRemisionFotos('fichaFotoFU',  Global.dirAplicacion + '/svc/conector/sheltersUsa.php/subeLogo');
    		                 win.show();
    		                 win.on("beforedestroy", function(){
    		                     Ext.getCmp('logoUrl').setValue(win.getNombreArchivoFoto());
    		                     Ext.getCmp('imageLogoShelter').el.dom.src= Global.dirAplicacion + '/resources/images/shelterLogos/' + win.getNombreArchivoFoto(); 
    		                     //formulario.doLayout();     
    		                 });
    		               }//evento click
    		              }//listeners
    		         },//botón Aceptar       
    		         {xtype : 'image', id : 'imageLogoShelter', width: 240, grow: true},    		         
    	         
    	  ]
      }
    ],
      
      
  	   
  	pueblaDatosEnForm : function(record){
      this.getComponent('id').setValue(record.id);
      var colIzq=this.getComponent('colIzq');
  	  colIzq.getComponent('name').setValue(record.get('name'));
  	  colIzq.getComponent('zip').setValue(record.get('zip'));
  	  colIzq.getComponent('city').setValue(record.get('cityName'));
  	  colIzq.getComponent('county').setValue(record.get('countyName'));
  	  colIzq.getComponent('state').setValue(record.get('stateName'));
  	  colIzq.getComponent('url').setValue(record.get('url'));
  	  colIzq.getComponent('email').setValue(record.get('email'));
  	  colIzq.getComponent('phone').setValue(record.get('phone'));
  	  colIzq.getComponent('description').setValue(record.get('description'));
  	  colIzq.getComponent('streetAddress').setValue(record.get('streetAddress'));
      //foto
  	  var colDer=this.getComponent('colDer');
  	  colDer.getComponent('logoUrl').setValue(record.get('logoUrl'));
  	  //imagen, la carga si existe el archivo
  	  var urlImagen =Global.dirAplicacion + '/resources/images/shelterLogos/' +record.get('logoUrl');
  	  try{
  		colDer.getComponent('imageLogoShelter').el.dom.src= urlImagen;
  	  }catch(exception){
  		  //nada
  	  }
    },
    
    
  	   
  pueblaFormEnRegistro : function(record){
	record.data['id']=  this.getComponent('id').getValue();	  
	var colIzq=this.getComponent('colIzq');
    record.data['name']=  colIzq.getComponent('name').getValue();
    record.data['zip']=  colIzq.getComponent('zip').getValue();
    record.data['url']=  colIzq.getComponent('url').getValue();
    record.data['email']=  colIzq.getComponent('email').getValue();
    record.data['phone']=  colIzq.getComponent('phone').getValue();
    record.data['description']=  colIzq.getComponent('description').getValue();
    record.data['streetAddress']=  colIzq.getComponent('streetAddress').getValue();
    var colDer=this.getComponent('colDer');
    record.data['logoUrl']=  colDer.getComponent('logoUrl').getValue();
  	record.commit();
  },  	   
  
  
  validaHijo : function(muestraVentana){
  		   var mensaje=null;
  		   var valido=true;
  		   
  		   var colIzq=this.getComponent('colIzq');
  		   if (!colIzq.getComponent('name').isValid()){
  			   valido=false;
  			   mensaje='Name not valid';
  		   }
  		   
  		   if (!colIzq.getComponent('zip').isValid()){
  			   valido=false;
  			   mensaje='Zip not valid';
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













