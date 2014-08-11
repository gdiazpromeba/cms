Ext.application({
    name: 'Petzynga - CMS',
    launch: function() {
    	
        // Validación básica de ZipCodes
        Ext.apply(Ext.form.field.VTypes, {
            usaZipCode: function(val, field) {
                if (/^\d{5}$/.test(val)) {
                    return true;
                }
            },
            japanZipCode: function(val, field) {
                if (/^\d{3}-\d{4}$/.test(val)) {
                    return true;
                }
            },            
            digits8: function(val, field) {
                if (/^\d{1,8}$/.test(val)) {
                    return true;
                }
            },            
            usaZipCodeText: 'Zip Codes must have 5 numbers.'
        });
        

    	
        Ext.create('Ext.container.Viewport', {
            layout: 'border',
            items: [
              Ext.create('app.petcms4.MenuAcordeon', {region: 'west', width: 250}),
              {xtype: 'panel', region: 'center', layout: 'fit', itemId: 'panelCentral', id: 'panelCentral'}
            ]
        });
    }
});