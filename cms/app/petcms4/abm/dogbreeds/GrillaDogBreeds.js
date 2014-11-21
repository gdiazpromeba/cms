Ext.define('DogBreedModel',{
    extend: 'Ext.data.Model',
	fields : [ 
			    {name : 'dogBreedId', type : 'string'}, 
				{name : 'dogBreedName', type : 'string'},
				{name : 'dogSizeId', type : 'string'},
				{name : 'dogSizeName', type : 'string'},
				{name : 'dogPurposeId', type : 'string'},
				{name : 'dogPurposeName', type : 'string'},
				{name : 'dogSheddingAmountId', type : 'string'},
				{name : 'dogSheddingAmountName', type : 'string'},
				{name : 'dogSheddingFrequencyId', type : 'string'},
				{name : 'dogSheddingFrequencyName', type : 'string'},
				{name : 'sizeMin', type : 'int'},
				{name : 'sizeMax', type : 'int'},
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

var dogBreedStore = Ext.create('Ext.data.JsonStore', {
    // store configs
    autoDestroy: true,
    model: 'DogBreedModel',
    proxy: {
        type: 'ajax',
        url: Global.dirAplicacion + '/svc/conector/dogBreeds.php/selecciona',
        reader: {
            type: 'json',
            root: 'data',
            idProperty: 'dogBreedId',
            totalProperty: 'total'
        }
    },
    remoteSort: false,
    pageSize: 15
});

Ext.define('app.petcms4.abm.dogbreeds.GrillaDogBreeds', {
	  extend: 'Ext.grid.Panel',
	  store : dogBreedStore,
	  columns : [ 
	    {header : 'id', dataIndex : 'dogBreedId', hidden : true}, 
	    {header : 'Nombre', dataIndex : 'dogBreedName', width : 350, sortable : true},
	    {header : 'Size', dataIndex : 'dogSizeName', width : 150, sortable : true},
	    {header : 'Purpose', dataIndex : 'dogPurposeName', width : 150, sortable : true},
	    {header : 'Shed Amount', dataIndex : 'dogSheddingAmountName', width : 150, sortable : true},
	    {header : 'Shed Frequency', dataIndex : 'dogSheddingFrequencyName', width : 150, sortable : true}
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

