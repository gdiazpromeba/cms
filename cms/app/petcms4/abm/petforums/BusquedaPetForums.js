Ext.define('app.petcms4.abm.petforums.BusquedaPetForums', {
      extend: 'Ext.form.Panel',
      region: 'west',
      frame: true,
      items: [
        {fieldLabel: 'Name ', xtype: 'textfield', itemId: 'nombreOParte', allowBlank: true, width: 320},
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
        this.agregaClaveValor(resultado, 'nombreOParte', this.getComponent('nombreOParte').getValue());
        
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

