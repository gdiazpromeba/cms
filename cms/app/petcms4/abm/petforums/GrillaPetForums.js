Ext.define('PetForumsModel',{
    extend: 'Ext.data.Model',
	fields : [ 
			    {name : 'id', type : 'string'}, 
				{name : 'name', type : 'string'},
				{name : 'encodedName', type : 'string'},
				{name : 'url', type : 'string'},
				{name : 'pictureUrl', type : 'string'},
				{name : 'description', type : 'string'},
				{name : 'metaDescripcion', type : 'string'},
				{name : 'metaKeywords', type : 'string'}
			]
});

var petForumsStore = Ext.create('Ext.data.JsonStore', {
    // store configs
    autoDestroy: true,
    model: 'PetForumsModel',
    proxy: {
        type: 'ajax',
        url: Global.dirAplicacion + '/svc/conector/petForums.php/selecciona',
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

Ext.define('app.petcms4.abm.petforums.GrillaPetForums', {
	  extend: 'Ext.grid.Panel',
	  store : petForumsStore,
	  columns : [ 
	    {header : 'id', dataIndex : 'id', hidden : true}, 
	    {header : 'Name', dataIndex : 'name', width : 320, sortable : true},
	    {header : 'Encoded name', dataIndex : 'encodedName', width : 320, sortable : true},
	    {header : 'URL', dataIndex : 'url', width : 200, sortable : true},
	  ],
	  // paging bar on the bottom
	  bbar: Ext.create('Ext.PagingToolbar', {
	      store: petForumsStore,
	      displayInfo: true,
	      displayMsg: '{0} - {1} of {2}',
	      emptyMsg: "No topics to display"
	  }),  
	  selModel : 'rowmodel'
});

