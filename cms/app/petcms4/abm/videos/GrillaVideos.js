Ext.define('VideosModel',{
    extend: 'Ext.data.Model',
	fields : [ 
			    {name : 'videoId', type : 'string'}, 
				{name : 'videoTitle', type : 'string'},
				{name : 'videoUrl', type : 'string'},
				{name : 'videoTags', type : 'string'}
			]
});

var videoStore = Ext.create('Ext.data.JsonStore', {
    // store configs
    autoDestroy: true,
    model: 'VideosModel',
    proxy: {
        type: 'ajax',
        url: Global.dirAplicacion + '/svc/conector/videos.php/selecciona',
        reader: {
            type: 'json',
            root: 'data',
            idProperty: 'videoId',
            totalProperty: 'total'
        }
    },
    remoteSort: false,
    pageSize: 15
});

Ext.define('app.petcms4.abm.videos.GrillaVideos', {
	  extend: 'Ext.grid.Panel',
	  store : videoStore,
	  viewConfig: {
	        loadMask: false
	  },	  
	  columns : [ 
	    {header : 'id', dataIndex : 'videoId', hidden : true}, 
	    {header : 'Title', dataIndex : 'videoTitle', width : 350, sortable : true},
	    {header : 'Tags', dataIndex : 'videoTags', width : 550, sortable : false},
	  ],
	  // paging bar on the bottom
	  bbar: Ext.create('Ext.PagingToolbar', {
		  suspendLayout: true,
		  maskOnDisable: false,
	      store: videoStore,
	      displayInfo: true,
	      displayMsg: '{0} - {1} of {2}',
	      emptyMsg: "No topics to display"
	  }),  
	  selModel : 'rowmodel'
});

