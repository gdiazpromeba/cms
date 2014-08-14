Ext.define('app.petcms4.abm.shelters.usa.FormSheltersUsa', {
    extend: 'app.petcms4.abm.PanelFormCabeceraAbm',
    frame: true,
    prefijo: 'formSheltersUsa',
    nombreElementoId: 'shelterUsaId',
    urlAgregado:  Global.dirAplicacion + '/svc/conector/sheltersUsa.php/inserta',
    urlModificacion: Global.dirAplicacion + '/svc/conector/sheltersUsa.php/actualiza',
    urlBorrado: Global.dirAplicacion + '/svc/conector/sheltersUsa.php/borra',
    layout: 'column',
    items: [
      {xtype: 'hidden', name: 'shelterUsaId', id: 'shelterUsaId', itemId: 'shelterUsaId'},            
      {xtype: 'fieldset', itemId: 'colIzq', id: 'colIzqFormSheltersUsa', border: false, style: 'padding:0px', bodyStyle: 'padding:0px', columnWidth: 0.5,
        items:[            
          
            {fieldLabel: 'Shelter Name', xtype: 'textfield',  name: 'name', itemId: 'name',  id: 'name', allowBlank: false, width: 350},
            {title: 'Encoded URL', xtype: 'fieldset', itemId: 'encoding',  border: false, layout: 'column', border: true, bodyStyle: 'padding:0px; margin:0px',
            	items: [
                  {xtype: 'textfield',  name: 'urlEncoded', itemId: 'urlEncoded',  id: 'urlEncoded', allowBlank: false, columnWidth: 0.8},
  	              {xtype: 'button', text: 'Encode', itemId: 'botEncodeUrl', columnWidth: 0.2,
                  	listeners:{
                		click : function(  The, eOpts ){
                			var url=Ext.getCmp('name').getValue();
                			var ueTxt = Utilities.codificaUrl(url);
                			Ext.getCmp('urlEncoded').setValue(ueTxt);
                		}	
                	}
  		          }
            	]
            },
            {fieldLabel: 'State', xtype: 'textfield',  name: 'state', itemId: 'state',  id: 'state', readOnly: true, allowBlank: false, width: 200},
            {fieldLabel: 'County', xtype: 'textfield',  name: 'county', itemId: 'county',  id: 'county', readOnly: true, allowBlank: false, width: 250},
            {fieldLabel: 'City', xtype: 'textfield',  name: 'city', itemId: 'city',  id: 'city', readOnly: true, allowBlank: false, width: 250},
            {fieldLabel: 'Zip Code', xtype: 'textfield', vtype: 'usaZipCode',  name: 'zip', itemId: 'zip',  id: 'zip', allowBlank: false, width: 160,
            	listeners:{
            		blur : function(  The, eOpts ){
            			var colIzq=this.up('#colIzq');
            			Ext.Ajax.request ({
            			    url: Global.dirAplicacion + '/svc/conector/usaZips.php/obtienePorCodigo?zip=' + this.getValue(),        			    
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
            {fieldLabel: 'Description', xtype: 'textareafield',  name: 'description', itemId: 'description',  id: 'description', grow: false, width: 350, height: 70},
            {fieldLabel: 'Street Address', xtype: 'textareafield',  name: 'streetAddress', itemId: 'streetAddress',  id: 'streetAddress', 
	          allowBlank: true, width: 350, height: 40},
	        {fieldLabel: 'P.O.Box', xtype: 'textfield',  vtype: 'digits8', name: 'poBox', itemId: 'poBox',  id: 'poBox', allowBlank: true, width: 210},  
          ]
      },//colizq
      {xtype: 'fieldset', itemId: 'colDer', border: false, style: 'padding:0px', bodyStyle: 'padding:0px', columnWidth: 0.5,
    	  items:[
                    { title: 'Related breeds', xtype: 'fieldset', itemId: 'specializations', id: 'specializations',  border: true, collapsible: true, collapsed: true,
                      items: [
                              {xtype: 'comboDogBreeds', name: 'specialBreedId', itemId: 'specialBreedId', id: 'specialBreedId', width: 320},
                              {xtype: 'button', text: 'Add', itemId: 'botAddSpecial',
                            	  listeners:{
                            		  click : function(  The, eOpts ){
                            			  var cmbBreeds=Ext.getCmp('specialBreedId');
                            			  var id=cmbBreeds.getValue();
                            			  var name=cmbBreeds.getRawValue();
                            			  var grid=Ext.getCmp('breedsAdded');
                            			  var store=grid.getStore();
                            			  var registro = Ext.create(store.model.modelName);
                            			  registro.data['id']=id;
                            			  registro.data['name']=name;
                            			  store.insert(0, registro);
                            		  }
                            	  }
                              },
                              {fieldLabel: 'Added so far', xtype: 'grid', name: 'breedsAdded', itemId: 'breedsAdded', id: 'breedsAdded',width: 320, height: 250,
                            	  columns : [ 
                            	     	    {header : 'id', dataIndex : 'id', hidden : true}, 
                            	     	    {header : 'Breed name', dataIndex : 'name', width : 310, sortable : true}
                            	   ],
                                   model: Ext.define('relatedDogBreedsModel',{   
                                     extend: 'Ext.data.Model',
                                       fields : [ 
                                         {name : 'id', type : 'string'}, 
                                      	 {name : 'name', type : 'string'}
                                       ],
                                       idProperty: 'id'
                                   }),
                                   store: Ext.create('Ext.data.JsonStore', {
                                	    // store configs
                                	    autoDestroy: true,
                                	    model: relatedDogBreedsModel,
                                	    proxy: {
                                	        type: 'ajax',
                                	        url: Global.dirAplicacion + '/svc/conector/dogBreeds.php/selNombresPorShelter',
                                	        reader: {
                                	            type: 'json',
                                	            root: 'data',
                                	            idProperty: 'id',
                                	            totalProperty: 'total'
                                	        },
                                	        writer: {
                                	            type: 'json',
                                	            writeAllFields : false,  //just send changed fields
                                	            allowSingle :false,      //always wrap in an array
                                	            idProperty: 'id'
                                	           // nameProperty: 'mapping'
                                	        },                                	        
                                	        api: {
                                	          read: Global.dirAplicacion + '/svc/conector/dogBreeds.php/selNombresPorShelter',
                                	          create: Global.dirAplicacion + '/svc/conector/sheltersUsa.php/vinculaDogBreed',
                                	          //update: Global.dirAplicacion + '/svc/conector/dogBreeds.php/actualizaEnLotePorShelter',
                                	          destroy: Global.dirAplicacion + '/svc/conector/sheltersUsa.php/desvinculaDogBreed',
                                	        }
                                	    },
                                	    remoteSort: false,
                                	    pageSize: 15
                                	}),
                              },
                              {xtype: 'button', text: 'Delete', itemId: 'botDeleteSpecial',
                            	  listeners: {
                            		  click: function(the, Opts){
                            		    var grid=Ext.getCmp('breedsAdded');
                            		    var selection = grid.getSelectionModel().getSelection()[0];
                            		    if (selection) {
                            		      var store=grid.getStore();
                            		      store.remove(selection);
                            		    }
                            		  }
                            	  }
                              }                          
                      ]                 
                    },
                    {xtype: 'fieldset', itemId: 'coordenadas', id: 'coordenadasFormSheltersUsa',  border: true, 
                    	items: [
                          {fieldLabel: 'Latitude', xtype: 'numberfield',  name: 'latitude', itemId: 'latitude',  id: 'latitude', allowBlank: false, decimalPrecision: 8, width: 200, readOnly: true},
                          {fieldLabel: 'Longitude', xtype: 'numberfield',  name: 'longitude', itemId: 'longitude',  id: 'longitude', allowBlank: false, decimalPrecision: 8, width: 200, readOnly: true},
          	              {xtype: 'button', text: 'GeoLocation', itemId: 'botGeoLocation', 
                          	listeners:{
                        		click : function(  The, eOpts ){
                        			var colIzq=Ext.getCmp('colIzqFormSheltersUsa');
                        			var address=null;
                        			if (Ext.isEmpty(colIzq.getComponent('poBox').getValue())){
                        			  address= colIzq.getComponent('streetAddress').getValue() + ', ' + colIzq.getComponent('zip').getValue() + ', USA';	
                        			}else{
                        			  address= colIzq.getComponent('zip').getValue() + ', USA';
                        			}
                        			
                        		    var geocoder = new google.maps.Geocoder();
                        	        
                        	        request= { 'address': address };
                        	        
                        		    
                        		    geocoder.geocode( request, function( results, status ) {
                        	            
                        		        if ( status == google.maps.GeocoderStatus.OK ) {
                        		        	var coordenadas=Ext.getCmp('coordenadasFormSheltersUsa');
                    			    		var res0=results[0];
                    			    		var areas=Utilities.procesaGeoComponentes(res0.address_components);
                    			    		var message="";
                    			    		for (var key in areas) {
                    			    		    message += key + " = " + areas[key] + "\n";
                    			    		}
                    			    		alert(message);                    			    		
                    			    		coordenadas.getComponent('latitude').setValue(res0.geometry.location.k);
                    			    		coordenadas.getComponent('longitude').setValue(res0.geometry.location.B);
                        		        }else{
                    			    		coordenadas.getComponent('latitude').markInvalid();
                    			    		coordenadas.getComponent('longitude').markInvalid();	
                        		        }
                        		            
                        		    });                        		    
                        		}	
                        	}
          		          }
                    	]
                    },
    	            {fieldLabel: 'Picture', xtype: 'textfield',  name: 'logoUrl', itemId: 'logoUrl', id: 'logoUrl', allowBlank: true, width: 250},
    	            {fieldLabel: 'Foto', xtype: 'button', text: 'Subir foto', itemId: 'botAceptar', ref: '../botAceptar', 
    		            listeners: {scope: this,  
    		               'click' :  function(){
    		                 var win=muestraRemisionFotos('fichaFotoFU',  Global.dirAplicacion + '/svc/conector/sheltersUsa.php/subeLogo');
    		                 win.show();
    		                 win.on("beforedestroy", function(){
    		                     Ext.getCmp('logoUrl').setValue(win.getNombreArchivoFoto());
    		                     Ext.getCmp('imageLogoShelter').el.dom.src= Global.dirAplicacion + '/resources/images/shelterLogos/usa/' + win.getNombreArchivoFoto(); 
    		                     //formulario.doLayout();     
    		                 });
    		               }//evento click
    		              }//listeners
    		         },//botón Aceptar       
    		         {xtype : 'image', id : 'imageLogoShelter', width: 240, grow: true},    		         
    	         
    	  ]
      }
    ],
    
    /**
     * carga las razas de perro en las que este refugio se especialice
     */
    cargaRazasAsociadas : function(shelterId){
	  var grid=Ext.getCmp('breedsAdded');
	  var store=grid.getStore();
	  store.getProxy().extraParams['shelterId']=shelterId;
	  store.load();
    },
      
      
  	   
  	pueblaDatosEnForm : function(record){
      this.getComponent('shelterUsaId').setValue(record.data['id']);
      this.cargaRazasAsociadas(record.data['id']);
      var colIzq=this.getComponent('colIzq');
  	  colIzq.getComponent('name').setValue(record.get('name'));
  	  colIzq.getComponent('zip').setValue(record.get('zip'));
  	  colIzq.getComponent('city').setValue(record.get('cityName'));
  	  colIzq.getComponent('county').setValue(record.get('countyName'));
  	  colIzq.getComponent('state').setValue(record.get('stateName'));
  	  colIzq.getComponent('url').setValue(record.get('url'));
  	  colIzq.getComponent('encoding').getComponent('urlEncoded').setValue(record.get('urlEncoded'));
  	  colIzq.getComponent('email').setValue(record.get('email'));
  	  colIzq.getComponent('phone').setValue(record.get('phone'));
  	  colIzq.getComponent('description').setValue(record.get('description'));
  	  colIzq.getComponent('streetAddress').setValue(record.get('streetAddress'));
  	  colIzq.getComponent('poBox').setValue(record.get('poBox'));
      //foto
  	  var colDer=this.getComponent('colDer');
  	  //colDer.getComponent('specialBreedId').setValue(record.get('specialBreedId'));
  	  //colDer.getComponent('specialBreedId').setRawValue(record.get('specialBreedName'));
  	  colDer.getComponent('logoUrl').setValue(record.get('logoUrl'));
  	  colDer.getComponent('coordenadas').getComponent('latitude').setValue(record.get('latitude'));
  	  colDer.getComponent('coordenadas').getComponent('longitude').setValue(record.get('longitude'));
  	  //imagen, la carga si existe el archivo
  	  var urlImagen =Global.dirAplicacion + '/resources/images/shelterLogos/usa/' +record.get('logoUrl');
  	  try{
  		colDer.getComponent('imageLogoShelter').el.dom.src= urlImagen;
  	  }catch(exception){
  		  //nada
  	  }
    },
    
    
  	   
  pueblaFormEnRegistro : function(record){
	record.data['id']=  this.getComponent('shelterUsaId').getValue();	  
	var colIzq=this.getComponent('colIzq');
    record.data['name']=  colIzq.getComponent('name').getValue();
    record.data['zip']=  colIzq.getComponent('zip').getValue();
    record.data['url']=  colIzq.getComponent('url').getValue();
    record.data['urlEncoded']=  colIzq.getComponent('encoding').getComponent('urlEncoded').getValue();
    record.data['email']=  colIzq.getComponent('email').getValue();
    record.data['phone']=  colIzq.getComponent('phone').getValue();
    record.data['description']=  colIzq.getComponent('description').getValue();
    record.data['streetAddress']=  colIzq.getComponent('streetAddress').getValue();
    record.data['poBox']=  colIzq.getComponent('poBox').getValue();
    var colDer=this.getComponent('colDer');
    //record.data['specialBreedId']= colDer.getComponent('specialBreedId').getRawValue();
    record.data['logoUrl']=  colDer.getComponent('logoUrl').getValue();
    record.data['longitude']= colDer.getComponent('coordenadas').getComponent('longitude').getValue();
    record.data['latitude']=  colDer.getComponent('coordenadas').getComponent('latitude').getValue();
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
  		   
  		   if (!colIzq.getComponent('encoding').getComponent('urlEncoded').isValid()){
  			   valido=false;
  			   mensaje='URL encoded not valid';
  		   }  		   
  		   
  		   if (!colIzq.getComponent('zip').isValid()){
  			   valido=false;
  			   mensaje='Zip not valid';
  		   }
  		   
  		   var addressEmpty=Ext.isEmpty(colIzq.getComponent('streetAddress').getValue());
  		   var poBoxEmpty=Ext.isEmpty(colIzq.getComponent('poBox').getValue());
  		   
  		   if (!(addressEmpty ^ poBoxEmpty)){
  			   valido=false;
  			   mensaje='Either the street address or the P.O.Box must be provided';
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
  },
  
  /**
   * override para grabar también el store de las razas asociadas
   */
  pulsoConfirmar: function(me){
      var grid=Ext.getCmp('breedsAdded');
      var store=grid.getStore();
      store.sync(); 
      me.callParent(arguments);
  }, 
  	   
  
});













