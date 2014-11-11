Ext.define('petcms4.iu.combos.ComboCatBreeds', {
  extend: 'Ext.form.field.ComboBox',
  alias: 'widget.comboCatBreeds',
  typeAhead: true,
  minChars: 2,
  mode: 'remote',
  queryParam: 'nombreOParte',
  forceSelection: true,
  store: Ext.create('Ext.data.Store', {
	    autoLoad: true,
	    fields: ['catBreedId','catBreedName'],
	    proxy: {
	       type: 'ajax',
	       url: Global.dirAplicacion + '/svc/conector/catBreeds.php/selecciona',
	       reader: {
	          type:'json',
	          root: 'data'
	       }
	    },
	    baseParams: { nombreOParte: '', start: 0, limit: 20 },
	    listeners:{
	    	load: function(store, records) {
	          store.insert(0, [{
	              catBreedName: '',
	              catBreedId: ''
	          }]);
	    	}
	    }
  }),
 

  displayField: 'catBreedName', 
  valueField: 'catBreedId',
});

