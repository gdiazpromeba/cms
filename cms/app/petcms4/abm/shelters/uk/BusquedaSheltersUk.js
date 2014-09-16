Ext.define('app.petcms4.abm.shelters.japan.BusquedaSheltersUk', {
      extend: 'Ext.form.Panel',
      region: 'west',
      frame: true,
      items: [
        {fieldLabel: 'Name ', xtype: 'textfield', itemId: 'name', allowBlank: true, width: 230},
        {fieldLabel: 'Country', xtype: 'comboCountriesUk', itemId: 'comboCountriesUk', width: 230,
        	listeners:{
        		select : function(combo, value){
              	  var store=combo.up('form').getComponent('comboUkRegions').getStore();
            	  store.proxy.extraParams = { countryName: value[0].data.name};
            	  store.load();
        		}
        	}
        },        
        {fieldLabel: 'County', xtype: 'comboUkRegions', name: 'comboUkRegions', itemId: 'comboUkRegions',  width: 330},       
        {fieldLabel: 'Breed', xtype: 'comboDogBreeds', name: 'specialBreedId', itemId: 'specialBreedId', width: 330},
      ],
      buttons: [
          {text:'Buscar', itemId: 'botBuscar', ref: '../botBuscar',
            handler:  function(){
              this.up('form').fireEvent('buscar pulsado');
            }
          },
          {text:'Reinicializar', itemId: 'botReinicializar', ref: 'botReinicializar',
              handler:  function(){
                  this.up('form').fireEvent('reinicializar pulsado');
                }
          }
      ],
      
      /**
       * función utilitaria que le agrega una fila más con par nombre-valor
       * al array de parámetros que se devuelve
       */
      agregaClaveValor : function (arr, nombre, valor){
        if (valor!=null){
          var fila=new Array();
          fila['nombre']=nombre; fila['valor']=valor;
          arr.push(fila);
        }
      },
      
      agregaMapeoTeclas : function(panel){
           var map = new Ext.KeyMap(panel.id, [{key: [10,13], scope: panel, fn: function(){
              panel.botBuscar.fireEvent('click'); //buscar
            }
         }
        ]);
      },       
      
      getParamsBusqueda: function(){
        var resultado=new Array();
        this.agregaClaveValor(resultado, 'nombreOParte', this.getComponent('name').getValue());
        this.agregaClaveValor(resultado, 'countryName', this.getComponent('comboCountriesUk').getValue());
        this.agregaClaveValor(resultado, 'regionName', this.getComponent('comboUkRegions').getValue());
        this.agregaClaveValor(resultado, 'specialBreedId', this.getComponent('specialBreedId').getValue());
        
        return resultado;
      },
      
      getBotonBuscar: function(){
        return this.down('#botBuscar');
      },
      
      getBotonReinicializar: function(){
    	  return this.down('#botReinicializar');
      },
      

      reinicializar: function(){
            this.getForm().reset();
            this.getComponent('comboCountriesUk').setValue('');
            this.getComponent('comboUkRegions').setValue('');
            this.getComponent('specialBreedId').setValue('');
      },
      
       /**
        * esta función borra los valores de los campos ocultos creados por los combos (si los hay),
        * los cuales el form.reset() parece no ser capaz de borrar
        */
       borraOcultos : function(){
         Ext.select("div[id=" + this.id + "] input[type=hidden]").each(function(item){
          item.dom.value='';
         });
       }    
      
  },
  this.agregaMapeoTeclas
);

