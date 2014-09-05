Ext.define('app.petcms4.util.MarcoVideo', {
	extend: 'Ext.Panel',  
	alias: 'widget.marcovideo',
	layout: 'fit',
    html: "<iframe frameborder='0' allowfullscreen></iframe>",
    preHtml: "<iframe width='425' height='315' src='http://www.youtube.com/embed/",
    postHtml: "' frameborder='0' allowfullscreen></iframe>",
    setUrl : function (url){
    	this.removeAll(true);
        this.add({
            xtype: 'box',
            autoEl: {
                id: "myIFramePanel",
                tag: 'iframe',
                frameborder: 0,
                src: "http://www.youtube.com/embed/" + url
            }
        });
        this.doLayout();
    }
});