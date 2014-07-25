Ext.define('petcms4.iu.combos.ComboDogBreeds', {
  extend: 'Ext.form.field.ComboBox',
  alias: 'widget.comboDogBreeds',
  typeAhead: true,
  minChars: 2,
  mode: 'remote',
  queryParam: 'nombreOParte',
  forceSelection: true,
  store: Ext.create('Ext.data.Store', {
	    autoLoad: true,
	    fields: ['dogBreedId','dogBreedName'],
	    proxy: {
	       type: 'ajax',
	       url: Global.dirAplicacion + '/svc/conector/dogBreeds.php/selecciona',
	       reader: {
	          type:'json',
	          root: 'data'
	       }
	    },
	    baseParams: { nombreOParte: '', start: 0, limit: 20 }
  }),
  
  //esto es para que permita meter valores vacíos (dado que el campo no es obligatorio), teniendo el forceSelection: true
  //la firma del evento "change" debería ser onChange: function( cmp, newValue, oldValue, eOpts ), pero por algún motivo 
  // el valor nuevo me vuelve en el primer parámetro
  onChange: function(newValue)  {
      var me = this;
      if (  me.forceSelection && newValue === null )
          me.reset();
      me.callParent( arguments );
  },  

  displayField: 'dogBreedName', 
  valueField: 'dogBreedId',
});