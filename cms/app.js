Ext.application({
    name: 'Petzynga - CMS',
    launch: function() {
        Ext.create('Ext.container.Viewport', {
            layout: 'border',
            items: [
              Ext.create('app.petcms4.MenuAcordeon', {region: 'west', width: 250}),
              {xtype: 'panel', region: 'center', layout: 'fit', itemId: 'panelCentral', id: 'panelCentral'}
            ]
        });
    }
});