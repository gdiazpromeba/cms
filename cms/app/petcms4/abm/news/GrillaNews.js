Ext.define('NewsModel',{
    extend: 'Ext.data.Model',
	fields : [ 
			    {name : 'newsId', type : 'string'}, 
				{name : 'newsTitle', type : 'string'},
				{name : 'newsText', type : 'string'},
				{name : 'newsSource', type : 'string'},
				{name : 'newsDate', type : 'date',  dateFormat: 'Y-m-d H:i:s'}
			]
});

var dogBreedStore = Ext.create('Ext.data.JsonStore', {
    // store configs
    autoDestroy: true,
    model: 'NewsModel',
    proxy: {
        type: 'ajax',
        url: Global.dirAplicacion + '/svc/conector/news.php/selecciona',
        reader: {
            type: 'json',
            root: 'data',
            idProperty: 'newsId',
            totalProperty: 'total'
        }
    },
    remoteSort: false,
    pageSize: 15
});

Ext.define('app.petcms4.abm.news.GrillaNews', {
	  extend: 'Ext.grid.Panel',
	  store : dogBreedStore,
	  columns : [ 
	    {header : 'id', dataIndex : 'newsId', hidden : true}, 
	    {header : 'Title', dataIndex : 'newsTitle', width : 350, sortable : true},
	    {header : 'Date', dataIndex : 'newsDate', width : 150, sortable : false, renderer: Ext.util.Format.dateRenderer('d/m/Y')},
	  ],
	  // paging bar on the bottom
	  bbar: Ext.create('Ext.PagingToolbar', {
	      store: dogBreedStore,
	      displayInfo: true,
	      displayMsg: '{0} - {1} of {2}',
	      emptyMsg: "No topics to display"
	  }),  
	  selModel : 'rowmodel'
});

