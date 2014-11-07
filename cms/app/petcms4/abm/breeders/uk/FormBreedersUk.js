Ext.define('app.petcms4.abm.breeders.uk.FormBreedersUk', {
    extend: 'app.petcms4.abm.PanelFormCabeceraAbm',
    requires: ['Utilities'],
    frame: true,
    prefijo: 'formBreedersUk',
    nombreElementoId: 'breederUkId',
    urlAgregado:  Global.dirAplicacion + '/svc/conector/breedersUk.php/inserta',
    urlModificacion: Global.dirAplicacion + '/svc/conector/breedersUk.php/actualiza',
    urlBorrado: Global.dirAplicacion + '/svc/conector/breedersUk.php/borra',
    layout: 'column',
    items: [
      {xtype: 'hidden', name: 'breederUkId', id: 'breederUkId', itemId: 'breederUkId'},            
      {xtype: 'fieldset', itemId: 'colIzq', id: 'colIzqFormBreedersUk', border: false, style: 'padding:0px', bodyStyle: 'padding:0px', columnWidth: 0.5,
        items:[            
          
            {fieldLabel: 'Breeder Name', xtype: 'textfield',  name: 'name', itemId: 'name',  allowBlank: false, width: 350},
            {title: 'Encoded URL', xtype: 'fieldset', itemId: 'encoding', border: false, layout: 'column', border: true, bodyStyle: 'padding:0px; margin:0px',
            	items: [
                  {xtype: 'textfield',  name: 'urlEncoded', itemId: 'urlEncoded',  allowBlank: false, columnWidth: 0.8},
  	              {xtype: 'button', text: 'Encode', itemId: 'botEncodeUrl', columnWidth: 0.2,
                  	listeners:{
                		click : function(  The, eOpts ){
                			var encoding= The.up('fieldset');
                			var colIzq= encoding.up('fieldset');
                			var url=colIzq.getComponent('name').getValue();
                			var ueTxt = Utilities.codificaUrl(url);
                			encoding.getComponent('urlEncoded').setValue(ueTxt);
                		}	
                	}
  		          }
            	]
            },
            {fieldLabel: 'URL', xtype: 'textfield',  name: 'url', itemId: 'url',  allowBlank: false, width: 350},
            {fieldLabel: 'Email', xtype: 'textfield',  name: 'email', itemId: 'email',  allowBlank: true, width: 320},
            {fieldLabel: 'Phone', xtype: 'textfield',  name: 'phone', itemId: 'phone',  allowBlank: true, width: 210},
            {fieldLabel: 'Description', xtype: 'textareafield',  name: 'description', itemId: 'description',  grow: false, width: 350, height: 70},
            {fieldLabel: 'Street Address', xtype: 'textareafield',  name: 'streetAddress', itemId: 'streetAddress',  id: 'streetAddress', 
	          allowBlank: true, width: 350, height: 40},
	        {fieldLabel: 'P.O.Box', xtype: 'textfield',  vtype: 'digits8', name: 'poBox', itemId: 'poBox',  allowBlank: true, width: 210},  
          ]
      },//colizq
      {xtype: 'fieldset', itemId: 'colDer', border: false, style: 'padding:0px', bodyStyle: 'padding:0px', columnWidth: 0.5,
    	  items:[
                    { title: 'Related breeds', xtype: 'fieldset', itemId: 'specializations', border: true, collapsible: true, collapsed: true,
                      items: [
                              {xtype: 'comboDogBreeds', name: 'specialBreedId', itemId: 'specialBreedId', id: 'specialBreedId', width: 320},
                              {xtype: 'button', text: 'Add', itemId: 'botAddSpecial',
                            	  listeners:{
                            		  click : function(  The, eOpts ){
                            			  var cmbBreeds = The.up('fieldset').getComponent('specialBreedId');
                            			  var id=cmbBreeds.getValue();
                            			  var name=cmbBreeds.getRawValue();
                            			  var grid=The.up('fieldset').getComponent('breedsAdded');
                            			  var store=grid.getStore();
                            			  var registro = Ext.create(store.model.modelName);
                            			  registro.data['id']=id;
                            			  registro.data['name']=name;
                            			  store.insert(0, registro);
                            		  }
                            	  }
                              },
                              {fieldLabel: 'Added so far', xtype: 'grid', name: 'breedsAdded', itemId: 'breedsAdded', width: 320, height: 250,
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
                                	        url: Global.dirAplicacion + '/svc/conector/dogBreeds.php/selNombresPorBreeder',
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
                                	          read: Global.dirAplicacion + '/svc/conector/dogBreeds.php/selNombresPorBreeder',
                                	          create: Global.dirAplicacion + '/svc/conector/breedersUk.php/vinculaDogBreed',
                                	          //update: Global.dirAplicacion + '/svc/conector/dogBreeds.php/actualizaEnLotePorBreeder',
                                	          destroy: Global.dirAplicacion + '/svc/conector/breedersUk.php/desvinculaDogBreed',
                                	        }
                                	    },
                                	    remoteSort: false,
                                	    pageSize: 15
                                	}),
                              },
                              {xtype: 'button', text: 'Delete', itemId: 'botDeleteSpecial',
                            	  listeners: {
                            		  click: function(The, Opts){
                            			var grid=The.up('fieldset').getComponent('breedsAdded');
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
                    {title: 'GeoLocation', xtype: 'fieldset', itemId: 'coordenadas', id: 'coordenadasFormBreedersUk',  border: true, collapsible: true, collapsed: true,
                    	items: [
                          {fieldLabel: 'Zip Code', xtype: 'textfield', vtype: 'ukZipCode',  name: 'zip', itemId: 'zip',  allowBlank: false, width: 180}, 
                          {fieldLabel: 'Country', xtype: 'comboCountriesUk', name: 'adminArea1', itemId: 'adminArea1', width: 230,
                          	listeners:{
                          		select : function(combo, value){
                                  var store=Ext.getCmp('comboUkStatisticalForm').getStore();
                              	  store.proxy.extraParams = { countryName: value[0].data.name};
                              	  store.load();
                          		},
//                          		load : {
//                          			
//                                  var store2=Ext.getCmp('comboUkRegionsForm').getStore();
//                                  store2.proxy.extraParams = { statistical: store.getAt(0).data.name};
//                                  store2.load();
//                          		}
                          	}
                          },
                          {fieldLabel: 'St.Area', xtype: 'comboUkStatistical', itemId: 'comboUkStatistical',  name: 'statistical', id: 'comboUkStatisticalForm', width: 330,
                          	listeners:{
                          		select : function(combo, value){
                                  var store=Ext.getCmp('comboUkRegionsForm').getStore();
                              	  store.proxy.extraParams = { statistical: value[0].data.name};
                              	  store.load();
                          		}
                          	}
                          },                          
                          {fieldLabel: 'County (manual)', xtype: 'comboUkRegions', itemId: 'comboUkRegionsForm', id: 'comboUkRegionsForm', width: 350,
                          	listeners:{
                        		select : function(combo, value){
                        			var aa2=combo.up('fieldset').down('#adminArea2');
                        			if (Ext.isEmpty(aa2.getValue())){
                        				Ext.getCmp('adminArea2').setValue(value[0].data.name);	
                        			}
                        		}
                        	}
                          },                          
                          {fieldLabel: 'County (geo)', xtype: 'textfield',  name: 'adminArea2',   itemId: 'adminArea2',   readOnly: true, allowBlank: true, width: 250},
                          {fieldLabel: 'Locality',   xtype: 'textfield',  name: 'locality',     itemId: 'locality',       readOnly: true, allowBlank: true, width: 250},
                          {fieldLabel: 'Neighbor.',   xtype: 'textfield',  name: 'subLocality1', itemId: 'subLocality1',  readOnly: true, allowBlank: true, width: 250},
                          {fieldLabel: 'Latitude', xtype: 'numberfield',  name: 'latitude', itemId: 'latitude',  allowBlank: false, decimalPrecision: 8, width: 200, allowNegative:true,  readOnly: true},
                          {fieldLabel: 'Longitude', xtype: 'numberfield',  name: 'longitude', itemId: 'longitude',  allowBlank: false, decimalPrecision: 8, width: 200, allowNegative:true, readOnly: true},
                          {xtype: 'fieldset', itemId: 'botonesGeo', id: 'botonesGeo',  border: false,  
                        	  layout: { type: 'hbox', padding:'5', align:'top'},
                              items: [
                                      {xtype: 'button', text: 'GeoLocation', itemId: 'botGeoLocation', 
                                      	  listeners:{
                                    		click : function(  The, eOpts ){
                                    			var coordenadas=Ext.getCmp('coordenadasFormBreedersUk');
                                    			var colIzq=Ext.getCmp('colIzqFormBreedersUk');
                                    			var address=null;
                                    			if (Ext.isEmpty(colIzq.getComponent('poBox').getValue())){
                                      			  address= colIzq.getComponent('streetAddress').getValue() + ', ' + coordenadas.getComponent('zip').getValue() + ', United Kingdom';	
                                      			}else{
                                      			  address= coordenadas.getComponent('zip').getValue() + ', United Kingdom';
                                      			}
                                      			
                                      		    var geocoder = new google.maps.Geocoder();
                                      	        
                                      	        request= { 
                                      	        		'address': address,
                                      	        		 region: 'UK',
                                      	        		 language: 'en',
                                      	        		 componentRestrictions: {
               	                                           country: 'uk'
                                      	        		 }
                                      	        		
                                      	        };
                                    			
                                    		    
                                    			var geocoder = new google.maps.Geocoder();
                                    	        
                                    	        
                                    		    
                                    		    geocoder.geocode( request, function( results, status ) {
                                    		    	var coordenadas=Ext.getCmp('coordenadasFormBreedersUk');
                                    		    	coordenadas.getComponent('adminArea1').reset();
                                    		    	coordenadas.getComponent('adminArea2').reset();
                                    		    	coordenadas.getComponent('locality').reset();
                                    		    	coordenadas.getComponent('comboUkStatistical').reset();
                                    		        if ( status == google.maps.GeocoderStatus.OK ) {
                                			    		var res0=results[0];
                                			    		var areas=Utilities.procesaGeoComponentes(res0.address_components);
                                			    		if (areas['administrative_area_level_1']!=null) coordenadas.getComponent('adminArea1').setValue(areas['administrative_area_level_1']);
                                			    		if (areas['administrative_area_level_2']!=null) coordenadas.getComponent('adminArea2').setValue(areas['administrative_area_level_2']);
                                			    		if (areas['locality']!=null) coordenadas.getComponent('locality').setValue(areas['locality']);
                                			    		coordenadas.getComponent('latitude').setValue(res0.geometry.location.lat());
                                			    		coordenadas.getComponent('longitude').setValue(res0.geometry.location.lng());
                                    		        }else{
                                    		        	coordenadas.getComponent('adminArea1').markInvalid();
                                    		        	coordenadas.getComponent('adminArea2').markInvalid();
                                    		        	coordenadas.getComponent('locality').markInvalid();
                                    		        	coordenadas.getComponent('comboUkStatistical').markInvalid();
                                    		        	coordenadas.getComponent('latitude').markInvalid();
                                			    		coordenadas.getComponent('longitude').markInvalid();	
                                    		        }
                                    		            
                                    		    }, { language: 'en_US' });                        		    
                                    		}	
                                    	}
                      		          },
                      	              {xtype: 'button', text: 'Suggest Upper Regions', itemId: 'botSuggestUpper', 
                                        listeners:{
                                      		click : function(  The, eOpts ){
                                      			var coordenadas=Ext.getCmp('coordenadasFormBreedersUk');
                                      			var countyName = coordenadas.getComponent('adminArea2').getValue();;
                                      			Ext.Ajax.request({
                                      			    url: Global.dirAplicacion + '/svc/conector/ukRegions.php/obtieneRegionesMayores',
                                      			    method: 'POST',          
                                      			    params: {
                                      			        regionName: countyName
                                      			    },
                                      			    success: function(response){
                                      			    	var res= Ext.JSON.decode(response.responseText)
                                      			    	coordenadas.getComponent('comboUkStatistical').setValue(res.statistical);
                                      			    	coordenadas.getComponent('adminArea1').setValue(res.country);
                                      			    },                                    
                                      			    failure: function(){
                                      			    	alert("Error finding this region's containing areas");
                                      			    }
                                      			});
                                      		}
                                         }
                                      }

                              ]
                          }
                      ]
                    },
    	            {fieldLabel: 'Picture', xtype: 'textfield',  name: 'logoUrl', itemId: 'logoUrl', allowBlank: true, width: 250},
    	            {fieldLabel: 'Foto', xtype: 'button', text: 'Subir foto', itemId: 'botAceptar', ref: '../botAceptar', 
    		            listeners: {scope: this,  
    		               'click' :  function(but){
    		                 var win=muestraRemisionFotos('fichaFotoFU',  Global.dirAplicacion + '/svc/conector/breedersUk.php/subeLogo');
    		                 win.show();
    		                 win.on("beforedestroy", function(){
    		                	 var frm = but.up('form');
    		                	 var colDer = frm.getComponent('colDer');
    		                     colDer.getComponent('logoUrl').setValue(win.getNombreArchivoFoto());
    		                     colDer.getComponent('imageLogoBreeder').el.dom.src= Global.dirAplicacion + '/resources/images/breederLogos/uk/' + win.getNombreArchivoFoto(); 
    		                 });
    		               }//evento click
    		              }//listeners
    		         },//botón Aceptar       
    		         {xtype : 'image', itemId : 'imageLogoBreeder', width: 240, grow: true},    		         
    	         
    	  ]
      }
    ],
    
    /**
     * carga las razas de perro en las que este refugio se especialice
     */
    cargaRazasAsociadas : function(me, breederId){
      var grid=me.getComponent('colDer').getComponent('specializations').getComponent('breedsAdded');
	  var store=grid.getStore();
	  store.getProxy().extraParams['breederId']=breederId;
	  store.load();
    },
      
      
  	   
  	pueblaDatosEnForm : function(record){
      this.getComponent('breederUkId').setValue(record.data['id']);
      this.cargaRazasAsociadas(this, record.data['id']);
      var colIzq=this.getComponent('colIzq');
  	  colIzq.getComponent('name').setValue(record.get('name'));
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
  	  var coordenadas=colDer.getComponent('coordenadas');
  	  coordenadas.getComponent('zip').setValue(record.get('zip'));
  	  coordenadas.getComponent('latitude').setValue(record.get('latitude'));
  	  coordenadas.getComponent('longitude').setValue(record.get('longitude'));
  	  coordenadas.getComponent('adminArea1').setValue(record.get('adminArea1'));
  	  coordenadas.getComponent('adminArea2').setValue(record.get('adminArea2'));
  	  coordenadas.getComponent('locality').setValue(record.get('locality'));
  	  coordenadas.getComponent('comboUkStatistical').setValue(record.get('statistical'));
  	  
  	  //imagen, la carga si existe el archivo
  	  var urlImagen =Global.dirAplicacion + '/resources/images/breederLogos/uk/' +record.get('logoUrl');
  	  try{
  		colDer.getComponent('imageLogoBreeder').el.dom.src= urlImagen;
  	  }catch(exception){
  		  //nada
  	  }
    },
    
    
  	   
  pueblaFormEnRegistro : function(record){
	record.data['id']=  this.getComponent('breederUkId').getValue();	  
	var colIzq=this.getComponent('colIzq');
    record.data['name']=  colIzq.getComponent('name').getValue();
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
    var coordenadas=colDer.getComponent('coordenadas');
    record.data['longitude']= coordenadas.getComponent('longitude').getValue();
    record.data['latitude']=  coordenadas.getComponent('latitude').getValue();
    record.data['zip']=  coordenadas.getComponent('zip').getValue();
    record.data['adminArea1']=  coordenadas.getComponent('adminArea1').getValue();
    record.data['adminArea2']=  coordenadas.getComponent('adminArea2').getValue();
    record.data['locality']=  coordenadas.getComponent('locality').getValue();
    record.data['statistical']=  coordenadas.getComponent('comboUkStatistical').getValue();
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
  		   
  		   var colDer=this.getComponent('colDer');
  		   var coordenadas=colDer.getComponent('coordenadas');
  		   if (!coordenadas.getComponent('zip').isValid()){
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
   * Actualiza el store de razas asociadas.
   * Se lo llama luego de un ingreso o una actualización del registro principal exitosas
   */
  sincronizacionStores : function(me, breederId){
	  var grid=me.getComponent('colDer').getComponent('specializations').getComponent('breedsAdded');
      var store=grid.getStore();
	  store.getProxy().extraParams['breederId']=breederId;
      store.sync(); 
  }, 
  
  /**
   * override borrar la lista de razas asociadas (que hubieran podido agregadas durante la entrada anterior)
   * cada vez que se oprime "agregar"
   */
  pulsoAgregar: function(me){
	  var grid=me.getComponent('colDer').getComponent('specializations').getComponent('breedsAdded');
      var store=grid.getStore();
      store.loadData([], false); //esto borra el caché local y no manda nada al server
      me.callParent(arguments);
  }, 
  	   
  
});













