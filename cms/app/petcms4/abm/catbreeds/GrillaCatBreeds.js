Ext.define('CatBreedModel',{
    extend: 'Ext.data.Model',
	fields : [ 
			    {name : 'catBreedId', type : 'string'}, 
				{name : 'catBreedName', type : 'string'},
				{name : 'nameEncoded', type : 'string'},
				{name : 'catSizeId', type : 'string'},
				{name : 'catSizeName', type : 'string'},
				{name : 'catPurposeId', type : 'string'},
				{name : 'catPurposeName', type : 'string'},
				{name : 'coatLengthId', type : 'string'},
				{name : 'coatLengthName', type : 'string'},
				{name : 'sizeId', type : 'string'},
				{name : 'sizeName', type : 'string'},
				{name : 'lifeMin', type : 'int'},
				{name : 'lifeMax', type : 'int'},
				{name : 'weightMin', type : 'int'},
				{name : 'weightMax', type : 'int'},
				{name : 'mainFeatures', type : 'string'},
				{name : 'headerText', type : 'string'},
				{name : 'colors', type : 'string'},
				{name : 'servingMin', type : 'float'},
				{name : 'servingMax', type : 'float'},
				{name : 'friendlyRank', type : 'int'},
				{name : 'friendlyText', type : 'string'},
				{name : 'healthyRank', type : 'int'},
				{name : 'healthyText', type : 'string'},
				{name : 'activeRank', type : 'int'},
				{name : 'activeText', type : 'string'},
				{name : 'trainingRank', type : 'int'},
				{name : 'trainingText', type : 'string'},
				{name : 'guardianRank', type : 'int'},
				{name : 'guardianText', type : 'string'},
				{name : 'groomingRank', type : 'int'},
				{name : 'groomingText', type : 'string'},
				{name : 'pictureUrl', type : 'string'},
				{name : 'appartments', type : 'bool'},
				{name : 'kids', type : 'bool'},
				{name : 'metaDescripcion', type : 'string'},
				{name : 'metaKeywords', type : 'string'},
				{name : 'videoUrl', type : 'string'}
			]
});

var catBreedStore = Ext.create('Ext.data.JsonStore', {
    // store configs
    autoDestroy: true,
    model: 'CatBreedModel',
    proxy: {
        type: 'ajax',
        url: Global.dirAplicacion + '/svc/conector/catBreeds.php/selecciona',
        reader: {
            type: 'json',
            root: 'data',
            idProperty: 'catBreedId',
            totalProperty: 'total'
        }
    },
    remoteSort: false,
    pageSize: 15
});

Ext.define('app.petcms4.abm.catbreeds.GrillaCatBreeds', {
	  extend: 'Ext.grid.Panel',
	  store : catBreedStore,
	  columns : [ 
	    {header : 'id', dataIndex : 'catBreedId', hidden : true}, 
	    {header : 'Nombre', dataIndex : 'catBreedName', width : 350, sortable : true},
	    {header : 'Size', dataIndex : 'catSizeName', width : 150, sortable : true},
	    {header : 'Coat Length', dataIndex : 'coatLengthName', width : 150, sortable : true},
	    {header : 'Size', dataIndex : 'sizeName', width : 150, sortable : true}
	  ],
	  // paging bar on the bottom
	  bbar: Ext.create('Ext.PagingToolbar', {
	      store: catBreedStore,
	      displayInfo: true,
	      displayMsg: '{0} - {1} of {2}',
	      emptyMsg: "No topics to display"
	  }),  
	  selModel : 'rowmodel'
});

