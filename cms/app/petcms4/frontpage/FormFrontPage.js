Ext.define('app.petcms4.abm.dogbreeds.FormDogBreeds', {
    extend: 'Ext.form.Panel',
	defaultType: 'textfield',
		
    frame: true,
  	prefijo: 'formDogBreeds',
  	nombreElementoId: 'dogBreedId',
  	urlAgregado:  Global.dirAplicacion + '/svc/conector/dogBreeds.php/inserta',
  	urlModificacion: Global.dirAplicacion + '/svc/conector/dogBreeds.php/actualiza',
  	urlBorrado: Global.dirAplicacion + '/svc/conector/dogBreeds.php/inhabilita',
    layout: {
        type: 'table',
        columns: 2,
        tableAttrs: {
            style: {
                width: '100%',
                height: '100%'
            }
        }
    },
  	items: [
        {xtype: 'fieldset', itemId: 'colIzq', border: false, layout: 'form', style: 'padding:0px', bodyStyle: 'padding:0px', width: 400,
          items:[
            {xtype: 'hidden', name: 'dogBreedId', id: 'dogBreedId', itemId: 'dogBreedId'},
            {fieldLabel: 'Breed Name', xtype: 'textfield',  name: 'dogBreedName', itemId: 'dogBreedName',  id: 'dogBreedName', allowBlank: false, width: 150},
            {fieldLabel: 'Size', xtype: 'comboDogSizes', name: 'dogSize', itemId: 'dogSize', width: 100},
            {fieldLabel: 'Hist.Purpose', xtype: 'comboDogPurposes', name: 'dogPurpose', itemId: 'dogPurpose', width: 100},
            {fieldLabel: 'Shed.Amount', xtype: 'comboDogSheddingAmounts', name: 'dogSheddingAmount', itemId: 'dogSheddingAmount',  width: 100},
            {fieldLabel: 'Shed.Freq.', xtype: 'comboDogSheddingFrequencies', name: 'dogSheddingFrequency', itemId: 'dogSheddingFrequency', width: 100},
            {fieldLabel: 'Main Features', xtype: 'textfield',  name: 'mainFeatures', itemId: 'mainFeatures',  allowBlank: false, width: 150},
            {fieldLabel: 'Colors', xtype: 'textfield',  name: 'colors', itemId: 'colors',  allowBlank: false, width: 100},
            {fieldLabel: 'For appartments', xtype: 'checkbox', name: 'appartments', itemId: 'appartments'},
            {fieldLabel: 'Safe for kids', xtype: 'checkbox', name: 'kids', itemId: 'kids'},
           ]
        },//del colIzq    
        {xtype: 'fieldset', itemId: 'colDer', border: false, layout: 'form',  width: 400, //style: 'padding:0px;', bodyStyle: 'padding:0px;', width: 300,
            items:[
              {title: 'Size', xtype: 'fieldset', itemId: 'size', border: true, layout: 'column',
                items: [
                  {fieldLabel: 'Min', labelAlign:'right', xtype: 'numberfield',  allowDecimals: true, decimalPrecision: 2, name: 'sizeMin', itemId: 'sizeMin', allowBlank: false, columnWidth:0.5},
                  {fieldLabel: 'Max', labelAlign:'right', xtype: 'numberfield',  allowDecimals: true, decimalPrecision: 2, name: 'sizeMax', itemId: 'sizeMax', allowBlank: false, columnWidth:0.5}
                ]
              },
              {title: 'Weight', xtype: 'fieldset', itemId: 'weight', border: true, layout: 'column', 
         	     items: [
                   {fieldLabel: 'Min', labelAlign:'right', xtype: 'numberfield',  allowDecimals: true, decimalPrecision: 2, name: 'weightMin', itemId: 'weightMin',   allowBlank: false, columnWidth:0.5},
                   {fieldLabel: 'Max', labelAlign:'right', xtype: 'numberfield',  allowDecimals: true, decimalPrecision: 2, name: 'weightMax', itemId: 'weightMax',   allowBlank: false, columnWidth:0.5},
                 ]
               },                   
               {title: 'Serving sizes', xtype: 'fieldset', itemId: 'serving', border: true, layout: 'column', 
           	     items: [
                     {fieldLabel: 'Min', labelAlign:'right', xtype: 'numberfield',  allowDecimals: true, decimalPrecision: 2, name: 'servingMin', itemId: 'servingMin',  allowBlank: false, columnWidth:0.5},
                     {fieldLabel: 'Max', labelAlign:'right', xtype: 'numberfield',  allowDecimals: true, decimalPrecision: 2, name: 'servingMax', itemId: 'servingMax',  allowBlank: false, columnWidth:0.5},
                   ]
                 },                
               {fieldLabel: 'Video', xtype: 'textfield',  name: 'videoUrl', itemId: 'videoUrl',  allowBlank: false, width: 250},
               {fieldLabel: 'Picture', xtype: 'textfield',  name: 'pictureUrl', itemId: 'pictureUrl', id: 'breedPictureUrl', allowBlank: false, width: 250},
               {fieldLabel: 'Foto', xtype: 'button', text: 'Subir foto', itemId: 'botAceptar', ref: '../botAceptar', 
                   listeners: {scope: this,  
                     'click' :  function(){
                       var win=muestraRemisionFotos('fichaFotoFU',  Global.dirAplicacion + '/svc/conector/dogBreeds.php/subeFoto');
                       win.show();
                       win.on("beforedestroy", function(){
                           Ext.getCmp('breedPictureUrl').setValue(win.getNombreArchivoFoto());
                           Ext.getCmp('imagePhotoBreed').el.dom.src= Global.dirAplicacion + '/resources/images/breeds/' + win.getNombreArchivoFoto(); 
                           //formulario.doLayout();     
                       });
                     }//evento click
                    }//listeners
               },//botón Aceptar                  
            ]
        },//del colDer
        {xtype: 'tabpanel',  itemId: 'ranksPanel', height: 195, activeTab: 0, colspan: 2, //width: 800, //height: 240, 
          items:[
            {xtype: 'panel', itemId: 'friendly', layout: 'form', title: 'Friendly', frame: true, labelWidth: 10,
        	    items:[
                   {xtype: 'comboRango1a5', name: 'friendlyRank', itemId: 'rangoFriendly', width: 220},
                   {xtype: 'textarea', name: 'friendlyText', itemId: 'friendlyText', allowBlank: false, width: 680, height: 140}
        	    ]
            },
            {xtype: 'panel', itemId: 'active', layout: 'form', title: 'Active', frame: true, labelWidth: 10,
        	    items:[
                       {xtype: 'comboRango1a5', name: 'activeRank', itemId: 'rangoActive',  width: 220},
                       {xtype: 'textarea', name: 'activeText', itemId: 'activeText', allowBlank: false, width: 680, height: 140}
            	    ]
            },
            {xtype: 'panel', itemId: 'healthy', layout: 'form', title: 'Healthy',  frame: true, labelWidth: 10,
        	    items:[
                       {xtype: 'comboRango1a5', name: 'healthyRank', itemId: 'rangoHealthy', width: 220},
                       {xtype: 'textarea', name: 'healthyText', itemId: 'healthyText', allowBlank: false, width: 680, height: 140}
            	    ]
            },
            {xtype: 'panel', itemId: 'grooming', layout: 'form', title: 'Grooming', frame: true, labelWidth: 10,
        	    items:[
                       {xtype: 'comboRango1a5', name: 'groomingRank', itemId: 'rangoGrooming', width: 220},
                       {xtype: 'textarea', name: 'groomingText', itemId: 'groomingText', allowBlank: false, width: 680, height: 140}
            	    ]
            },
            {xtype: 'panel', itemId: 'guardian', layout: 'form', title: 'Guardian', frame: true, labelWidth: 10,
        	    items:[
                       {xtype: 'comboRango1a5', name: 'guardianRank', itemId: 'rangoGuardian', width: 220},
                       {xtype: 'textarea', name: 'guardianText', itemId: 'guardianText', allowBlank: false, width: 680, height: 140}
            	    ]
            },
            {xtype: 'panel', itemId: 'training', layout: 'form', title: 'Training', frame: true, labelWidth: 10,
        	    items:[
                       {xtype: 'comboRango1a5', name: 'trainingRank', itemId: 'rangoTraining', width: 220},
                       {xtype: 'textarea', name: 'trainingText', itemId: 'trainingText', allowBlank: false, width: 680, height: 140}
            	    ]
            },

          ]
        }
      ],      
      
  	   
  	  pueblaDatosEnForm : function(record){
  		 var colIzq=this.getComponent('colIzq');
  		 colIzq.getComponent('dogBreedId').setValue(record.id);
  		 colIzq.getComponent('dogBreedName').setValue(record.get('dogBreedName'));
  		 colIzq.getComponent('dogSize').setValue(record.get('dogSizeId'));
         colIzq.getComponent('dogPurpose').setValue(record.get('dogPurposeId'));
         colIzq.getComponent('dogSheddingAmount').setValue(record.get('dogSheddingAmountId'));
         colIzq.getComponent('dogSheddingFrequency').setValue(record.get('dogSheddingFrequencyId'));
         colIzq.getComponent('mainFeatures').setValue(record.get('mainFeatures'));
         colIzq.getComponent('colors').setValue(record.get('colors'));
         colIzq.getComponent('appartments').setValue(record.get('appartments'));
         colIzq.getComponent('kids').setValue(record.get('kids'));
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
         size.getComponent('sizeMin').setValue(record.get('sizeMin'));
         size.getComponent('sizeMax').setValue(record.get('sizeMax'));
         var weight=colDer.getComponent('weight');
         weight.getComponent('weightMin').setValue(record.get('weightMin'));
         weight.getComponent('weightMax').setValue(record.get('weightMax'));
         var serving=colDer.getComponent('serving');
         serving.getComponent('servingMin').setValue(record.get('servingMin'));
         serving.getComponent('servingMax').setValue(record.get('servingMax'));
         colDer.getComponent('videoUrl').setValue(record.get('videoUrl'));
         colDer.getComponent('pictureUrl').setValue(record.get('pictureUrl'));
         //foto
         Ext.getCmp('imagePhotoBreed').el.dom.src= Global.dirAplicacion + '/resources/images/breeds/' +record.get('pictureUrl'); 
  	   },
  	   
  	   pueblaFormEnRegistro : function(record){
  		 var colIzq=this.getComponent('colIzq');
  		 record.data['dogBreedId']=  colIzq.getComponent('dogBreedId').getValue();
  		 record.data['dogBreedName']= colIzq.getComponent('dogBreedName').getRawValue();
  		 record.data['dogSizeName']= colIzq.getComponent('dogSize').getRawValue();
  		 record.data['dogSizeId']= colIzq.getComponent('dogSize').getValue();
  		 record.data['dogPurposeName']= colIzq.getComponent('dogPurpose').getRawValue();
  		 record.data['dogPurposeId']= colIzq.getComponent('dogPurpose').getValue();
  		 record.data['dogSheddingAmountName']= colIzq.getComponent('dogSheddingAmount').getRawValue();
  		 record.data['dogSheddingAmountId']= colIzq.getComponent('dogSheddingAmount').getValue();
  		 record.data['dogSheddingFrequencyName']= colIzq.getComponent('dogSheddingFrequency').getRawValue();
  		 record.data['dogSheddingFrequencyId']= colIzq.getComponent('dogSheddingFrequency').getValue();
  		 record.data['mainFeatures']=  colIzq.getComponent('mainFeatures').getValue();
  		 record.data['colors']=  colIzq.getComponent('colors').getValue();
  		 record.data['appartments']=  colIzq.getComponent('appartments').getValue();
  		 record.data['kids']=  colIzq.getComponent('kids').getValue();
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
  		 record.data['sizeMin']=  size.getComponent('sizeMin').getValue();
  		 record.data['sizeMax']=  size.getComponent('sizeMax').getValue();
  		 var weight=colDer.getComponent('weight');
  		 record.data['weightMin']=  weight.getComponent('weightMin').getValue();
  		 record.data['weightMax']=  weight.getComponent('weightMax').getValue();
  		 var serving=colDer.getComponent('serving');
  		 record.data['servingMin']= serving.getComponent('servingMin').getValue();
  		 record.data['servingMax']= serving.getComponent('servingMax').getValue();
  		 record.data['videoUrl']= colDer.getComponent('videoUrl').getValue();
  		 record.data['pictureUrl']= colDer.getComponent('pictureUrl').getValue();
  		 record.commit();
  	   },  	   
  	   
  	   validaHijo : function(muestraVentana){
  		   var mensaje=null;
  		   var valido=true;
  		   var colIzq=this.getComponent('colIzq');
  		   
  		   if (!colIzq.getComponent('dogBreedName').isValid()){
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













