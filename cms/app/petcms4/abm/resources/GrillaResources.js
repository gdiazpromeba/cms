Ext.define('ResourcesModel',{
    extend: 'Ext.data.Model',
	fields : [ 
			    {name : 'id', type : 'string'}, 
				{name : 'key', type : 'string'},
				{name : 'text', type : 'string'}
			]
});

var resourcesStore = Ext.create('Ext.data.JsonStore', {
    // store configs
    autoDestroy: true,
    model: 'ResourcesModel',
    proxy: {
        type: 'ajax',
        url: Global.dirAplicacion + '/svc/conector/textResources.php/selecciona',
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

Ext.define('app.petcms4.abm.resources.GrillaResources', {
	  extend: 'Ext.grid.Panel',
	  store : resourcesStore,
	  viewConfig: {
	        loadMask: false
	  },
	  columns : [ 
	    {header : 'id', dataIndex : 'id', hidden : true}, 
	    {header : 'Key', dataIndex : 'key', width : 550, sortable : true},
	    {header : 'Text', dataIndex : 'text', width : 550, sortable : false},
	  ],
	  // paging bar on the bottom
	  bbar: Ext.create('Ext.PagingToolbar', {
	      store: resourcesStore,
	      displayInfo: true,
	      displayMsg: '{0} - {1} of {2}',
	      emptyMsg: "No topics to display"
	  }),  
	  selModel : 'rowmodel'
});

