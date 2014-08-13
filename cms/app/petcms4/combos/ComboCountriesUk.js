Ext.define('ComboCountriesUk', {
	extend: 'Ext.form.field.ComboBox',
	alias:'widget.comboCountriesUk',
	minWidth: 100,
    queryMode: 'local',
	store: Ext.create('Ext.data.Store', {
	  model: Ext.define('MyModel', { //no sé por qué define, con un nombre que no me sirve
		extend: 'Ext.data.Model',
        fields: [
          {name: 'name', type: 'name'}
        ]
      }),
	  data:[
         {name: ''},
         {name: 'England'},
         {name: 'Scotland'},
         {name: 'Northern Ireland'},
         {name: 'Wales'}
      ]
    }),
	displayField: 'name',
	valueField: 'name',
	editable: false
});
