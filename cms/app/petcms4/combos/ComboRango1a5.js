Ext.define('ComboRango1a5', {
	extend: 'Ext.form.field.ComboBox',
	alias:'widget.comboRango1a5',
    width: 280,
    queryMode: 'local',
	store: Ext.create('Ext.data.Store', {
	  model: Ext.define('MyModel', { //no sé por qué define, con un nombre que no me sirve
		extend: 'Ext.data.Model',
        fields: [
          {name: 'number', type: 'int'},
          {name: 'label',  type: 'string'}
        ]
      }),
	  data:[
		 {number: 5, label: '5 - *****'},
		 {number: 4, label: '4 - ****'},
		 {number: 3, label: '3 - ***'},
		 {number: 2, label: '2 - **'},
		 {number: 1, label: '1 - *'}
      ]
    }),
	displayField: 'label',
	valueField: 'number',
	editable: false
});
