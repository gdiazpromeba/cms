Ext.define('app.petcms4.abm.petforums.FormPetForums', {
    extend: 'app.petcms4.abm.PanelFormCabeceraAbm',
    requires: ['Utilities'],
    frame: true,
    prefijo: 'formForums',
    nombreElementoId: 'forumId',
    urlAgregado:  Global.dirAplicacion + '/svc/conector/petForums.php/inserta',
    urlModificacion: Global.dirAplicacion + '/svc/conector/petForums.php/actualiza',
    urlBorrado: Global.dirAplicacion + '/svc/conector/petForums.php/borra',
    layout: 'column',
    listeners:{
    	exitoAgregado: function (nuevoId){
    		this.sincronizacionStores(this, nuevoId);
    		
    	},
    	exitoModificacion: function (me){
    		var nuevoId = me.down('#' + me.nombreElementoId).getValue();
    		me.sincronizacionStores(me, nuevoId);
    	}
    },
    items: [
      {xtype: 'hidden', name: 'forumId', itemId: 'forumId'},            
      {xtype: 'fieldset', itemId: 'colIzq', id: 'colIzqFormForums', border: false, style: 'padding:0px', bodyStyle: 'padding:0px', columnWidth: 0.5,
        items:[            
            {fieldLabel: 'Name', xtype: 'textfield',  name: 'forumName', itemId: 'name',  allowBlank: false, width: 350},
            {fieldLabel: 'Encoded name', xtype: 'encodable',  linkedText: 'name', name: 'encodedName', itemId: 'encodedName',  allowBlank: false, width: 350},
            {fieldLabel: 'Meta descripcion', xtype: 'textarea',name: 'metaDescripcion', itemId: 'metaDescripcion', allowBlank: true, height: 65, width: 350},
            {fieldLabel: 'Meta keywords', xtype: 'textarea', name: 'metaKeywords', itemId: 'metaKeywords', allowBlank: true, height: 65, width: 350},
            {fieldLabel: 'URL', xtype: 'textfield',  name: 'forumUrl', itemId: 'url',  allowBlank: false, width: 350},
            {fieldLabel: 'Description', xtype: 'textarea', name: 'forumDescription', itemId: 'description', allowBlank: true, height: 100, width: 350},
          ]
      },//colizq
      {xtype: 'fieldset', itemId: 'colDer', border: false, style: 'padding:0px', bodyStyle: 'padding:0px', columnWidth: 0.5,
    	  items:[
                    { title: 'Related dog breeds', xtype: 'fieldset', itemId: 'specializations', border: true, collapsible: true, collapsed: true,
                      items: [
                              {xtype: 'comboDogBreeds', name: 'specialBreedId', itemId: 'specialBreedId', width: 320},
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
                                	        url: Global.dirAplicacion + '/svc/conector/dogBreeds.php/selNombresPorForum',
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
                                	          read: Global.dirAplicacion + '/svc/conector/dogBreeds.php/selNombresPorForum',
                                	          create: Global.dirAplicacion + '/svc/conector/petForums.php/vinculaDogBreed',
                                	          //update: Global.dirAplicacion + '/svc/conector/dogBreeds.php/actualizaEnLotePorShelter',
                                	          destroy: Global.dirAplicacion + '/svc/conector/petForums.php/desvinculaDogBreed',
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
                    { title: 'Related cat breeds', xtype: 'fieldset', itemId: 'specializationsCats', border: true, collapsible: true, collapsed: true,
                        items: [
                                {xtype: 'comboCatBreeds', name: 'specialBreedIdCats', itemId: 'specialBreedIdCats', width: 320},
                                {xtype: 'button', text: 'Add', itemId: 'botAddSpecialCats',
                              	  listeners:{
                              		  click : function(  The, eOpts ){
                              			  var cmbBreeds = The.up('fieldset').getComponent('specialBreedIdCats');
                            			  var id=cmbBreeds.getValue();
                            			  var name=cmbBreeds.getRawValue();                              			  
                              			  var grid=The.up('fieldset').getComponent('breedsAddedCats');
                              			  var store=grid.getStore();
                              			  var registro = Ext.create(store.model.modelName);
                              			  registro.data['id']=id;
                              			  registro.data['name']=name;
                              			  store.insert(0, registro);
                              		  }
                              	  }
                                },
                                {fieldLabel: 'Added so far', xtype: 'grid', name: 'breedsAddedCats', itemId: 'breedsAddedCats', width: 320, height: 250,
                              	  columns : [ 
                              	     	    {header : 'id', dataIndex : 'id', hidden : true}, 
                              	     	    {header : 'Breed name', dataIndex : 'name', width : 310, sortable : true}
                              	   ],
                                     model: Ext.define('relatedCatBreedsModel',{   
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
                                  	    model: relatedCatBreedsModel,
                                  	    proxy: {
                                  	        type: 'ajax',
                                  	        url: Global.dirAplicacion + '/svc/conector/catBreeds.php/selNombresPorForum',
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
                                  	          read: Global.dirAplicacion + '/svc/conector/catBreeds.php/selNombresPorForum',
                                  	          create: Global.dirAplicacion + '/svc/conector/petForums.php/vinculaCatBreed',
                                  	          //update: Global.dirAplicacion + '/svc/conector/dogBreeds.php/actualizaEnLotePorShelter',
                                  	          destroy: Global.dirAplicacion + '/svc/conector/petForums.php/desvinculaCatBreed',
                                  	        }
                                  	    },
                                  	    remoteSort: false,
                                  	    pageSize: 15
                                  	}),
                                },
                                {xtype: 'button', text: 'Delete', itemId: 'botDeleteSpecialCats',
                              	  listeners: {
                              		  click: function(The, Opts){
                              			var grid=The.up('fieldset').getComponent('breedsAddedCats');
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
    	            {fieldLabel: 'Picture', xtype: 'textfield',  name: 'forumPictureUrl', itemId: 'pictureUrl', allowBlank: true, width: 250},
    	            {fieldLabel: 'Foto', xtype: 'button', text: 'Upload picture', itemId: 'botAceptar', ref: '../botAceptar', 
    		            listeners: {scope: this,  
    		               'click' :  function(but){
    		                 var win=muestraRemisionFotos('fichaFotoFU',  Global.dirAplicacion + '/svc/conector/petForums.php/subeLogo');
    		                 win.show();
    		                 win.on("beforedestroy", function(){
    		                	 var frm = but.up('form');
    		                	 var colDer = frm.getComponent('colDer');
    		                     colDer.getComponent('pictureUrl').setValue(win.getNombreArchivoFoto());
    		                     colDer.getComponent('imageLogoForum').el.dom.src= Global.dirAplicacion + '/resources/images/forumLogos/' + win.getNombreArchivoFoto(); 
    		                 });
    		               }//evento click
    		              }//listeners
    		         },//botón Aceptar       
    		         {xtype : 'image', itemId : 'imageLogoForum', width: 240, grow: true},    		         
    	         
    	  ]
      }
    ],
    
    /**
     * carga las razas en las que este refugio se especialice
     */
    cargaRazasAsociadas : function(me, forumId){
      //de perro
      var grid=me.getComponent('colDer').getComponent('specializations').getComponent('breedsAdded');
	  var store=grid.getStore();
	  store.getProxy().extraParams['forumId']=forumId;
	  store.load();
	  
      //de gato
	  grid=me.getComponent('colDer').getComponent('specializationsCats').getComponent('breedsAddedCats');
	  store=grid.getStore();
	  store.getProxy().extraParams['forumId']=forumId;
	  store.load();
	  
    },
      
      
  	   
  	pueblaDatosEnForm : function(record){
      this.getComponent('forumId').setValue(record.data['id']);
      this.cargaRazasAsociadas(this, record.data['id']);
      var colIzq=this.getComponent('colIzq');
  	  colIzq.getComponent('name').setValue(record.get('name'));
  	  colIzq.getComponent('encodedName').setValue(record.get('encodedName'));
  	  colIzq.getComponent('metaDescripcion').setValue(record.get('metaDescripcion'));
  	  colIzq.getComponent('metaKeywords').setValue(record.get('metaKeywords'));
  	  colIzq.getComponent('url').setValue(record.get('url'));
  	  colIzq.getComponent('description').setValue(record.get('description'));
      //foto
  	  var colDer=this.getComponent('colDer');
  	  colDer.getComponent('pictureUrl').setValue(record.get('pictureUrl'));
  	  
  	  //imagen, la carga si existe el archivo
  	  var urlImagen =Global.dirAplicacion + '/resources/images/forumLogos/' +record.get('pictureUrl');
  	  try{
  		colDer.getComponent('imageLogoForum').el.dom.src= urlImagen;
  	  }catch(exception){
  		  //nada
  	  }
    },
    
    
  	   
  pueblaFormEnRegistro : function(record){
	record.data['id']=  this.getComponent('forumId').getValue();	  
	var colIzq=this.getComponent('colIzq');
    record.data['name']=  colIzq.getComponent('name').getValue();
    record.data['encodedName']=  colIzq.getComponent('encodedName').getValue();
    record.data['metaDescripcion']=  colIzq.getComponent('metaDescripcion').getValue();
    record.data['metaKeywords']=  colIzq.getComponent('metaKeywords').getValue();
    record.data['url']=  colIzq.getComponent('url').getValue();
    record.data['description']=  colIzq.getComponent('description').getValue();
    var colDer=this.getComponent('colDer');
    //record.data['specialBreedId']= colDer.getComponent('specialBreedId').getRawValue();
    record.data['pictureUrl']=  colDer.getComponent('pictureUrl').getValue();
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
  		   
  		   if (!colIzq.getComponent('encodedName').isValid()){
  			   valido=false;
  			   mensaje='Encoded name not valid';
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
  sincronizacionStores : function(me, forumId){
	  //perros
	  var grid=me.getComponent('colDer').getComponent('specializations').getComponent('breedsAdded');
      var store=grid.getStore();
	  store.getProxy().extraParams['forumId']=forumId;
      store.sync(); 
      
      //gatos
	  grid=me.getComponent('colDer').getComponent('specializationsCats').getComponent('breedsAddedCats');
      store=grid.getStore();
	  store.getProxy().extraParams['forumId']=forumId;
      store.sync();       
  }, 
  
  /**
   * override borrar la lista de razas asociadas (que hubieran podido agregadas durante la entrada anterior)
   * cada vez que se oprime "agregar"
   */
  pulsoAgregar: function(me){
	  //perros
	  var grid=me.getComponent('colDer').getComponent('specializations').getComponent('breedsAdded');
      var store=grid.getStore();
      store.loadData([], false); //esto borra el caché local y no manda nada al server
      me.callParent(arguments);
      
	  //gatos
      grid=me.getComponent('colDer').getComponent('specializationsCats').getComponent('breedsAddedCats');
      store=grid.getStore();
      store.loadData([], false); //esto borra el caché local y no manda nada al server
      me.callParent(arguments);      
  }, 
  
  	   
  
});













