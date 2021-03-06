Ext.define('Utilities', {
    statics: {
        /**
         * transforma un nombre para que pueda funcionar como parte de una url
         */
    	codificaUrl: function(url){
			//url=url.replace(" ", "-");
			url=url.replace("&", "and");
			url=url.replace("\'", "");
			url=url.replace("'", "");
			url=url.replace("%", "");
			url=url.replace(", ", "-");
			url=url.replace(",", "-");
			url = url.replace(/([()[{*+.$^\\|?])/g, '\\$1');
			url=url.replace(new RegExp(' ', 'g'), "-");
			url=url.replace(new RegExp('/', 'g'), "-");
			url=url.replace(new RegExp('_+', 'g'), "-");
            //paréntesis y backslashes (todo junto, porque deja backslashes después de la primera conversión)			
			url=url.replace(/["'\(\)]/g, "");
			url=url.replace(new RegExp('\\\\', 'g'), "-");
			//guión
			url=url.replace(new RegExp('\-', 'g'), "-");
			//puntos
			url=url.replace(new RegExp('\\.', 'g'), "-");
			//doble guión bajo
			url=url.replace(new RegExp('__', 'g'), "-");
			//diéresis
			url=url.replace(new RegExp('ü', 'g'), "u");
			return url;
		},
		/**
		 * revisa el array de objetos "address components" que es devuelto del 
		 * objeto Geocoder, y verifica la existencia combinada de los tipos del array arrTipos.
		 * Los que existan, los devuelve en el array asociativo "areas"
		 */
		procesaGeoComponentes : function (addressComponents){
			var areas=[];
			var arrTipos=[
			  ["administrative_area_level_1", "political"],
			  ["administrative_area_level_2", "political"],
			  ["colloquial_area", "locality", "political"],
			  ["locality", "political"],
			  ["sublocality_level_1", "sublocality", "political"]
			];
			for (var i=0; i<arrTipos.length; i++){
				var longName=Utilities.encuentraTipoComponente(addressComponents, arrTipos[i]);
				if (longName!=null){
					areas[arrTipos[i][0]]=longName; 
				}
			}
			return areas;
		},
		/**
		 * función utilitaria de procesaGeoComponentes. Devuelve el "longName" de un elemento "address_component", si
		 * todos sus objetos "type" figuran en el array de tipos que se manda como parámetro.
		 */
		encuentraTipoComponente : function( componentes, tipos ){
		    for(var i=0; i<componentes.length; i++) {
		    	var compDir=componentes[i];
		    	var tiposComp=compDir.types;
		    	var estanTodos=false;
		    	for (var e=0; e<tipos.length; e++){
			    	if (tiposComp.indexOf(tipos[e]) != -1){
			    	  	estanTodos=true;
			    	}else{
			    		estanTodos=false;
			    		break;
			    	}
		    	}
		    	if (estanTodos){
		    		return compDir.long_name;
		    	}
		    }
            return null;
		}
      
    }
});