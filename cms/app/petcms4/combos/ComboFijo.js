Ext.define('ComboFijo', {
	extend: 'Ext.form.ComboBox',
	config:{
        loadingText: 'cargando ...',
        typeAhead: false,
        forceSelecion: true,
        hideTrigger: false,
        lazyInit: false,
        triggerAction: 'all',
        itemSelector: 'div.search-item',
        pageSize:0,
        autoLoad: true
    }
});
