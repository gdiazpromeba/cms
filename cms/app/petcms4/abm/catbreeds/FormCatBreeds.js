Ext.define('app.petcms4.abm.catbreeds.FormCatBreeds', {
    extend: 'app.petcms4.abm.PanelFormCabeceraAbm',
    frame: true,
  	prefijo: 'formCatBreeds',
  	nombreElementoId: 'catBreedId',
  	urlAgregado:  Global.dirAplicacion + '/svc/conector/catBreeds.php/inserta',
  	urlModificacion: Global.dirAplicacion + '/svc/conector/catBreeds.php/actualiza',
  	urlBorrado: Global.dirAplicacion + '/svc/conector/catBreeds.php/inhabilita',
    layout: {
        type: 'table',
        columns: 3,
    },
  	items: [
        {xtype: 'fieldset', itemId: 'colDesc', border: false,  layout:'vbox',  layoutConfig: { padding: 10}, width: 200,
        	items: [
              {xtype: 'label', text: 'Header Text'},
              {xtype: 'textarea', name: 'headerText', itemId: 'headerText', allowBlank: true, height: 50},
              {xtype: 'label', text: 'Meta Description'},
              {xtype: 'textarea', name: 'metaDescripcion', itemId: 'metaDescripcion', allowBlank: true, height: 50},
              {xtype: 'label', text: 'Meta Keywords'},
              {xtype: 'textarea', name: 'metaKeywords', itemId: 'metaKeywords', allowBlank: true, height: 50},
        	]
        },
        {xtype: 'fieldset', itemId: 'colIzq', border: false, layout: 'form', style: 'padding:0px', bodyStyle: 'padding:0px', width: 300,
          items:[
            {xtype: 'hidden', name: 'catBreedId', id: 'catBreedId', itemId: 'catBreedId'},
            {fieldLabel: 'Breed Name', xtype: 'textfield',  name: 'catBreedName', itemId: 'catBreedName',  id: 'catBreedName', allowBlank: false, width: 50},
            {fieldLabel: 'Name encoded', xtype: 'encodable',  linkedText: 'catBreedName', name: 'nameEncoded', itemId: 'nameEncoded',  allowBlank: false},
            {fieldLabel: 'Size', xtype: 'comboCatSizes', name: 'catSize', itemId: 'catSize', width: 50},
            {fieldLabel: 'Coat Length', xtype: 'comboCatCoatLengths', name: 'coatLength', itemId: 'coatLength',  width: 50},
            {fieldLabel: 'Size', xtype: 'comboCatSizes', name: 'size', itemId: 'size', width: 50},
            {fieldLabel: 'Main Features', xtype: 'textfield',  name: 'mainFeatures', itemId: 'mainFeatures',  allowBlank: true, width: 50},
            {fieldLabel: 'Colors', xtype: 'textarea',  name: 'colors', itemId: 'colors',  allowBlank: true, width: 150, height: 70},
//            {fieldLabel: 'For appartments', xtype: 'checkbox', name: 'appartments', itemId: 'appartments'},
//            {fieldLabel: 'Safe for kids', xtype: 'checkbox', name: 'kids', itemId: 'kids'},
           ]
        },//del colIzq    
        {xtype: 'fieldset', itemId: 'colDer', border: false, layout: 'form',  width: 250, //style: 'padding:0px;', bodyStyle: 'padding:0px;', width: 300,
            items:[
              {title: 'Lifespan', xtype: 'fieldset', itemId: 'size', border: true, layout: {type: 'hbox',pack: 'start',align: 'stretch'},
                items: [
                  {fieldLabel: 'Min', labelAlign:'right', labelWidth: 40, xtype: 'numberfield',  allowDecimals: false, decimalPrecision: 2, name: 'lifeMin', itemId: 'lifeMin', allowBlank: false, width: 90},
                  {fieldLabel: 'Max', labelAlign:'right', labelWidth: 40, xtype: 'numberfield',  allowDecimals: false, decimalPrecision: 2, name: 'lifeMax', itemId: 'lifeMax', allowBlank: false, width: 90}
                ]
              },
              {title: 'Weight', xtype: 'fieldset', itemId: 'weight', border: true, layout: {type: 'hbox',pack: 'start',align: 'stretch'}, 
         	     items: [
                   {fieldLabel: 'Min', labelAlign:'right', labelWidth: 40, xtype: 'numberfield',  allowDecimals: true, decimalPrecision: 2, name: 'weightMin', itemId: 'weightMin',   allowBlank: false,  width: 90},
                   {fieldLabel: 'Max', labelAlign:'right', labelWidth: 40, xtype: 'numberfield',  allowDecimals: true, decimalPrecision: 2, name: 'weightMax', itemId: 'weightMax',   allowBlank: false,  width: 90},
                 ]
               },                   
//               {title: 'Serving sizes', xtype: 'fieldset', itemId: 'serving', border: true, layout: {type: 'hbox',pack: 'start',align: 'stretch'}, 
//           	     items: [
//                     {fieldLabel: 'Min', labelAlign:'right', labelWidth: 40, xtype: 'numberfield',  allowDecimals: true, decimalPrecision: 2, name: 'servingMin', itemId: 'servingMin',  allowBlank: false, width: 90},
//                     {fieldLabel: 'Max', labelAlign:'right', labelWidth: 40, xtype: 'numberfield',  allowDecimals: true, decimalPrecision: 2, name: 'servingMax', itemId: 'servingMax',  allowBlank: false, width: 90},
//                   ]
//                 },                
               {fieldLabel: 'Video', xtype: 'textfield',  name: 'videoUrl', itemId: 'videoUrl',  allowBlank: true, width: 250},
               {fieldLabel: 'Picture', xtype: 'textfield',  name: 'pictureUrl', itemId: 'pictureUrl', id: 'catBreedPictureUrl', allowBlank: true, width: 250},
               {fieldLabel: 'Foto', xtype: 'button', text: 'Subir foto', itemId: 'botAceptar', ref: '../botAceptar', 
                   listeners: {scope: this,  
                     'click' :  function(){
                       var win=muestraRemisionFotos('fichaFotoFU',  Global.dirAplicacion + '/svc/conector/catBreeds.php/subeFoto');
                       win.show();
                       win.on("beforedestroy", function(){
                           Ext.getCmp('catBreedPictureUrl').setValue(win.getNombreArchivoFoto());
                           Ext.getCmp('imagePhotoCatBreed').el.dom.src= Global.dirAplicacion + '/resources/images/catBreeds/' + win.getNombreArchivoFoto(); 
                           //formulario.doLayout();     
                       });
                     }//evento click
                    }//listeners
               },//botón Aceptar                  
            ]
        },//del colDer
        {xtype: 'tabpanel',  itemId: 'ranksPanel', height: 195, activeTab: 0, colspan: 3, //width: 800, //height: 240, 
          items:[
            {xtype: 'panel', itemId: 'friendly', layout: 'form', title: 'Friendly', frame: true, labelWidth: 10,
        	    items:[
                   {xtype: 'comboRango1a5', name: 'friendlyRank', itemId: 'rangoFriendly', width: 220},
                   {xtype: 'textarea', name: 'friendlyText', itemId: 'friendlyText', allowBlank: true, width: 680, height: 140}
        	    ]
            },
            {xtype: 'panel', itemId: 'active', layout: 'form', title: 'Active', frame: true, labelWidth: 10,
        	    items:[
                       {xtype: 'comboRango1a5', name: 'activeRank', itemId: 'rangoActive',  width: 220},
                       {xtype: 'textarea', name: 'activeText', itemId: 'activeText', allowBlank: true, width: 680, height: 140}
            	    ]
            },
            {xtype: 'panel', itemId: 'healthy', layout: 'form', title: 'Healthy',  frame: true, labelWidth: 10,
        	    items:[
                       {xtype: 'comboRango1a5', name: 'healthyRank', itemId: 'rangoHealthy', width: 220},
                       {xtype: 'textarea', name: 'healthyText', itemId: 'healthyText', allowBlank: true, width: 680, height: 140}
            	    ]
            },
            {xtype: 'panel', itemId: 'grooming', layout: 'form', title: 'Grooming', frame: true, labelWidth: 10,
        	    items:[
                       {xtype: 'comboRango1a5', name: 'groomingRank', itemId: 'rangoGrooming', width: 220},
                       {xtype: 'textarea', name: 'groomingText', itemId: 'groomingText', allowBlank: true, width: 680, height: 140}
            	    ]
            },
            {xtype: 'panel', itemId: 'guardian', layout: 'form', title: 'Guardian', frame: true, labelWidth: 10,
        	    items:[
                       {xtype: 'comboRango1a5', name: 'guardianRank', itemId: 'rangoGuardian', width: 220},
                       {xtype: 'textarea', name: 'guardianText', itemId: 'guardianText', allowBlank: true, width: 680, height: 140}
            	    ]
            },
            {xtype: 'panel', itemId: 'training', layout: 'form', title: 'Training', frame: true, labelWidth: 10,
        	    items:[
                       {xtype: 'comboRango1a5', name: 'trainingRank', itemId: 'rangoTraining', width: 220},
                       {xtype: 'textarea', name: 'trainingText', itemId: 'trainingText', allowBlank: true, width: 680, height: 140}
            	    ]
            },

          ]
        }
      ],      
      
  	   
  	  pueblaDatosEnForm : function(record){
   		 var colDesc=this.getComponent('colDesc');
  		 colDesc.getComponent('headerText').setValue(record.get('headerText'));
  		 colDesc.getComponent('metaDescripcion').setValue(record.get('metaDescripcion'));
  		 colDesc.getComponent('metaKeywords').setValue(record.get('metaKeywords'));
  		 var colIzq=this.getComponent('colIzq');
  		 colIzq.getComponent('catBreedId').setValue(record.id);
  		 colIzq.getComponent('catBreedName').setValue(record.get('catBreedName'));
  		 colIzq.getComponent('nameEncoded').setValue(record.get('nameEncoded'));
  		 colIzq.getComponent('catSize').setValue(record.get('catSizeId'));
         colIzq.getComponent('coatLength').setValue(record.get('coatLengthId'));
         colIzq.getComponent('size').setValue(record.get('sizeId'));
         colIzq.getComponent('mainFeatures').setValue(record.get('mainFeatures'));
         colIzq.getComponent('colors').setValue(record.get('colors'));
//         colIzq.getComponent('appartments').setValue(record.get('appartments'));
//         colIzq.getComponent('kids').setValue(record.get('kids'));
         var ranks=this.getComponent('ranksPanel');
         ranks.getComponent('friendly').getComponent('rangoFriendly').setValue(record.get('friendlyRank'));
         ranks.getComponent('friendly').getComponent('friendlyText').setValue(record.get('friendlyText'));
         ranks.getComponent('active').getComponent('rangoActive').setValue(record.get('activeRank'));
         ranks.getComponent('active').getComponent('activeText').setValue(record.get('activeText'));
         ranks.getComponent('healthy').getComponent('rangoHealthy').setValue(record.get('healthyRank'));
         ranks.getComponent('healthy').getComponent('healthyText').setValue(record.get('healthyText'));
         ranks.getComponent('training').getComponent('rangoTraining').setValue(record.get('trainingRank'));
         ranks.getComponent('training').getComponent('trainingText').setValue(record.get('trainingText'));
         ranks.getComponent('guardian').getComponent('rangoGuardian').setValue(record.get('guardianRank'));
         ranks.getComponent('guardian').getComponent('guardianText').setValue(record.get('guardianText'));
         ranks.getComponent('grooming').getComponent('rangoGrooming').setValue(record.get('groomingRank'));
         ranks.getComponent('grooming').getComponent('groomingText').setValue(record.get('groomingText'));
         var colDer=this.getComponent('colDer');
         var size=colDer.getComponent('size');
         size.getComponent('lifeMin').setValue(record.get('lifeMin'));
         size.getComponent('lifeMax').setValue(record.get('lifeMax'));
         var weight=colDer.getComponent('weight');
         weight.getComponent('weightMin').setValue(record.get('weightMin'));
         weight.getComponent('weightMax').setValue(record.get('weightMax'));
//         var serving=colDer.getComponent('serving');
//         serving.getComponent('servingMin').setValue(record.get('servingMin'));
//         serving.getComponent('servingMax').setValue(record.get('servingMax'));
         colDer.getComponent('videoUrl').setValue(record.get('videoUrl'));
         colDer.getComponent('pictureUrl').setValue(record.get('pictureUrl'));
         //foto
         Ext.getCmp('imagePhotoCatBreed').el.dom.src= Global.dirAplicacion + '/resources/images/catBreeds/' +record.get('pictureUrl'); 
  	   },
  	   
  	   pueblaFormEnRegistro : function(record){
         var colDesc=this.getComponent('colDesc');
         record.data['headerText']=colDesc.getComponent('headerText');
         record.data['metaDescripcion']=colDesc.getComponent('metaDescripcion');
         record.data['metaKeywords']=colDesc.getComponent('metaKeywords');
  		 var colIzq=this.getComponent('colIzq');
  		 record.data['catBreedId']=  colIzq.getComponent('catBreedId').getValue();
  		 record.data['catBreedName']= colIzq.getComponent('catBreedName').getRawValue();
  		 record.data['nameEncoded']= colIzq.getComponent('nameEncoded').getValue();
  		 record.data['coatLengthName']= colIzq.getComponent('coatLengthName').getRawValue();
  		 record.data['coatLengthId']= colIzq.getComponent('coatLengthId').getValue();
  		 record.data['sizeName']= colIzq.getComponent('size').getRawValue();
  		 record.data['sizeId']= colIzq.getComponent('size').getValue();
  		 record.data['mainFeatures']=  colIzq.getComponent('mainFeatures').getValue();
  		 record.data['headerText']=  colIzq.getComponent('headerText').getValue();
  		 record.data['colors']=  colIzq.getComponent('colors').getValue();
//  		 record.data['appartments']=  colIzq.getComponent('appartments').getValue();
//  		 record.data['kids']=  colIzq.getComponent('kids').getValue();
  		 var ranks=this.getComponent('ranksPanel');
  		 record.data['friendlyRank']= ranks.getComponent('friendly').getComponent('rangoFriendly').getValue();
  		 record.data['friendlyText']= ranks.getComponent('friendly').getComponent('friendlyText').getValue();
  		 record.data['activeRank']= ranks.getComponent('active').getComponent('rangoActive').getValue();
  		 record.data['activeText']= ranks.getComponent('active').getComponent('activeText').getValue();
  		 record.data['healthyRank']= ranks.getComponent('healthy').getComponent('rangoHealthy').getValue();
  		 record.data['healthyText']= ranks.getComponent('healthy').getComponent('healthyText').getValue();
  		 record.data['trainingRank']= ranks.getComponent('training').getComponent('rangoTraining').getValue();
  		 record.data['trainingText']= ranks.getComponent('training').getComponent('trainingText').getValue();
  		 record.data['guardianRank']= ranks.getComponent('guardian').getComponent('rangoGuardian').getValue();
  		 record.data['guardianText']= ranks.getComponent('guardian').getComponent('guardianText').getValue();
  		 record.data['groomingRank']= ranks.getComponent('grooming').getComponent('rangoGrooming').getValue();
  		 record.data['groomingText']= ranks.getComponent('grooming').getComponent('groomingText').getValue();
  		 var colDer=this.getComponent('colDer');
  		 var size=colDer.getComponent('size');
  		 record.data['lifeMin']=  size.getComponent('lifeMin').getValue();
  		 record.data['lifeMax']=  size.getComponent('lifeMax').getValue();
  		 var weight=colDer.getComponent('weight');
  		 record.data['weightMin']=  weight.getComponent('weightMin').getValue();
  		 record.data['weightMax']=  weight.getComponent('weightMax').getValue();
//  		 var serving=colDer.getComponent('serving');
//  		 record.data['servingMin']= serving.getComponent('servingMin').getValue();
//  		 record.data['servingMax']= serving.getComponent('servingMax').getValue();
  		 record.data['videoUrl']= colDer.getComponent('videoUrl').getValue();
  		 record.data['pictureUrl']= colDer.getComponent('pictureUrl').getValue();
  		 record.commit();
  	   },  	   
  	   
  	   validaHijo : function(muestraVentana){
  		   var mensaje=null;
  		   var valido=true;
  		   var colIzq=this.getComponent('colIzq');
  		   
  		   if (!colIzq.getComponent('catBreedName').isValid()){
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
  	   },
  	   
  	  //override para que tabpanel nunca se inabilite
  	  //pero que el valor de habilitación se propague a los paneles individuales
  	  //el tab está siempre habilitado, los paneles también (para poder clickear en las
  	  //solapas individuales), pero los hijos no 
  	  habilitaCampos: function(me, valor){
  	    me.callParent(arguments);
  	    var ranks=me.getComponent('ranksPanel');
  	    ranks.enable(true);
  	    function inhabilitaHijos(comp){
  	    	comp.items.each(function(c){c.setDisabled(!valor);});
  	    };
  	    //lo mismo que las líneas de abajo
  	    ranks.items.each(function(c){inhabilitaHijos(c)});
//  	    inhabilitaHijos(ranks.getComponent('friendly'));
//  	    inhabilitaHijos(ranks.getComponent('active'));
//  	    inhabilitaHijos(ranks.getComponent('healthy'));
//  	    inhabilitaHijos(ranks.getComponent('training'));
//  	    inhabilitaHijos(ranks.getComponent('guardian'));
//  	    inhabilitaHijos(ranks.getComponent('grooming'));
  	  },   	   
  	   
  	   
  

  
  
});













