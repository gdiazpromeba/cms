Ext.define('ComboAbecedario', {
	extend: 'Ext.form.field.ComboBox',
	alias:'widget.comboAbecedario',
	minWidth: 100,
    queryMode: 'local',
	store: Ext.create('Ext.data.Store', {
	  model: Ext.define('MyModel', { //no sé por qué define, con un nombre que no me sirve
		extend: 'Ext.data.Model',
        fields: [
          {name: 'letter', type: 'string'},
          {name: 'label',  type: 'string'}
        ]
      }),
	  data:[
         {letter: '', label: 'All'},	        
		 {letter: 'A', label: 'A'},
		 {letter: 'B', label: 'B'},
		 {letter: 'C', label: 'C'},
		 {letter: 'D', label: 'D'},
		 {letter: 'E', label: 'E'},
		 {letter: 'F', label: 'F'},
		 {letter: 'G', label: 'G'},
		 {letter: 'H', label: 'H'},
		 {letter: 'I', label: 'I'},
		 {letter: 'J', label: 'J'},
		 {letter: 'K', label: 'K'},
		 {letter: 'L', label: 'L'},
		 {letter: 'M', label: 'M'},
		 {letter: 'N', label: 'N'},
		 {letter: 'O', label: 'O'},
		 {letter: 'P', label: 'P'},
		 {letter: 'Q', label: 'Q'},
		 {letter: 'R', label: 'R'},
		 {letter: 'S', label: 'S'},
		 {letter: 'T', label: 'T'},
		 {letter: 'U', label: 'U'},
		 {letter: 'V', label: 'V'},
		 {letter: 'W', label: 'W'},
		 {letter: 'X', label: 'X'},
		 {letter: 'Y', label: 'Y'},
		 {letter: 'Z', label: 'Z'},
      ]
    }),
	displayField: 'label',
	valueField: 'letter',
	editable: false
});
