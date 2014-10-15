Ext.define('BreedersUsaModel',{
    extend: 'Ext.data.Model',
	fields : [ 
			    {name : 'id', type : 'string'}, 
				{name : 'name', type : 'string'},
				{name : 'zip', type : 'string'},
				{name : 'url', type : 'string'},
				{name : 'urlEncoded', type : 'string'},
				{name : 'logoUrl', type : 'string'},
				{name : 'email', type : 'string'},
				{name : 'phone', type : 'string'},
				{name : 'description', type : 'string'},
				{name : 'streetAddress', type : 'string'},
				{name : 'poBox', type : 'int', useNull: true},
				{name : 'latitude', type : 'float', useNull: true},
				{name : 'longitude', type : 'float', useNull: true},
				{name : 'adminArea1', type : 'string'},
				{name : 'adminArea2', type : 'string'},
				{name : 'collArea', type : 'string'},
				{name : 'locality', type : 'string'},
				{name : 'subLocality1', type : 'string'},
				{name : 'distanceMiles', type : 'float'},
				{name : 'specialBreedId', type : 'string', useNull: true},
				{name : 'specialBreedName', type : 'string', useNull: true},
			]
});

var breedersUsaStore = Ext.create('Ext.data.JsonStore', {
    // store configs
    autoDestroy: true,
    model: 'BreedersUsaModel',
    proxy: {
        type: 'ajax',
        url: Global.dirAplicacion + '/svc/conector/breedersUsa.php/selecciona',
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

Ext.define('app.petcms4.abm.breeders.usa.GrillaBreedersUsa', {
	  extend: 'Ext.grid.Panel',
	  store : breedersUsaStore,
	  columns : [ 
	    {header : 'id', dataIndex : 'id', hidden : true}, 
	    {header : 'Name', dataIndex : 'name', width : 320, sortable : true},
	    {header : 'URL', dataIndex : 'url', width : 200, sortable : true},
	    {header : 'ZIP', dataIndex : 'zip', width : 100, sortable : true},
	    {header : 'Locality', dataIndex : 'locality', width : 110, sortable : true},
	    {header : 'State', dataIndex : 'adminArea1', width : 110, sortable : true},
	    {header : 'Distancia', dataIndex : 'distanceMiles', width : 110,  xtype: 'numbercolumn', format:'0', align: 'right'}
	  ],
	  // paging bar on the bottom
	  bbar: Ext.create('Ext.PagingToolbar', {
	      store: breedersUsaStore,
	      displayInfo: true,
	      displayMsg: '{0} - {1} of {2}',
	      emptyMsg: "No topics to display"
	  }),  
	  selModel : 'rowmodel'
});

