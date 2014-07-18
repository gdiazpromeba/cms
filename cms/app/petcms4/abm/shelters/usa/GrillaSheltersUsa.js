Ext.define('SheltersUsaModel',{
    extend: 'Ext.data.Model',
	fields : [ 
			    {name : 'id', type : 'string'}, 
				{name : 'name', type : 'string'},
				{name : 'zip', type : 'string'},
				{name : 'url', type : 'string'},
				{name : 'logoUrl', type : 'string'},
				{name : 'email', type : 'string'},
				{name : 'phone', type : 'string'},
				{name : 'description', type : 'string'},
				{name : 'streetAddress', type : 'string'},
				{name : 'poBox', type : 'int'},
				{name : 'cityName', type : 'string'},
				{name : 'countyName', type : 'string'},
				{name : 'stateName', type : 'string'},
				{name : 'distanceMiles', type : 'float'}
			]
});

var sheltersUsaStore = Ext.create('Ext.data.JsonStore', {
    // store configs
    autoDestroy: true,
    model: 'SheltersUsaModel',
    proxy: {
        type: 'ajax',
        url: Global.dirAplicacion + '/svc/conector/sheltersUsa.php/selecciona',
        reader: {
            type: 'json',
            root: 'data',
            idProperty: 'id',
            totalProperty: 'total'
        }
    },
    remoteSort: false,
    pageSize: 15
});

Ext.define('app.petcms4.abm.shelters.usa.GrillaSheltersUsa', {
	  extend: 'Ext.grid.Panel',
	  store : sheltersUsaStore,
	  columns : [ 
	    {header : 'id', dataIndex : 'id', hidden : true}, 
	    {header : 'Name', dataIndex : 'name', width : 320, sortable : true},
	    {header : 'URL', dataIndex : 'url', width : 200, sortable : true},
	    {header : 'ZIP', dataIndex : 'zip', width : 100, sortable : true},
	    {header : 'City', dataIndex : 'cityName', width : 110, sortable : true},
	    {header : 'State', dataIndex : 'stateName', width : 110, sortable : true},
	    {header : 'Distancia', dataIndex : 'distanceMiles', width : 110,  xtype: 'numbercolumn', format:'0', align: 'right'}
	  ],
	  // paging bar on the bottom
	  bbar: Ext.create('Ext.PagingToolbar', {
	      store: sheltersUsaStore,
	      displayInfo: true,
	      displayMsg: '{0} - {1} of {2}',
	      emptyMsg: "No topics to display"
	  }),  
	  selModel : 'rowmodel'
});

