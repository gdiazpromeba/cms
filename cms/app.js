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
            ukZipCode : function(val, field){
	    	    val = val.replace(/\s/g, "");
	    	    var regex = /^[A-Z]{1,2}[0-9]{1,2} ?[0-9][A-Z]{2}$/i;
	    	    return regex.test(val);
            },
            chinaZipCode : function(val, field){
                if (/^([0-9]){6}$/.test(val)) {
                    return true;
                }
            },
            canadaZipCode : function(val, field){
                if (/^[A-Za-z]\d[A-Za-z][ -]?\d[A-Za-z]\d$/.test(val)) {
                    return true;
                }
            },
            indiaZipCode: function(val, field) {
                if (/^\d{6}$/.test(val)) {
                    return true;
                }
            },
            digits8: function(val, field) {
                if (/^\d{1,8}$/.test(val)) {
                    return true;
                }
            },    
            usaZipCodeText: 'Zip Codes must have 5 numbers.',
            japanZipCodeText: 'Zip Codes must have the following format: 999-9999',
            ukZipCodeText: 'Invalid UK postal code',
            chinaZipCodeText: 'Chinese zip codes must have the following format: 999999',
            canadaZipCodeText: 'Invalid Canadian postal code',
            indiaZipCodeText: 'India zip codes must have the following format: 999999',
        });
        Ext.create('Ext.container.Viewport', {
            requires: [
              'app.petcms4.MenuAcordeon'
            ],
            layout: 'border',
            items: [
              Ext.create('app.petcms4.MenuAcordeon', {region: 'west', width: 150}),
              {xtype: 'panel', region: 'center', layout: 'card', itemId: 'panelCentral', id: 'panelCentral'}
            ]
        });
    }
});