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
	    baseParams: { nombreOParte: '', start: 0, limit: 20 },
	    listeners:{
	    	load: function(store, records) {
	          store.insert(0, [{
	              dogBreedName: '',
	              dogBreedId: ''
	          }]);
	    	}
	    }
  }),
 

  displayField: 'dogBreedName', 
  valueField: 'dogBreedId',
});

