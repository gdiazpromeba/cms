function abmIza(grillaCabecera, formCabecera, panelSearch) {

	var modeloCabecera = grillaCabecera.getStore();
	var storeCabecera=grillaCabecera.getStore();


	cargaParametrosAdicionales = function(store, panelSearch){
		var arrAdicionales = panelSearch.getParamsBusqueda();
		for (i = 0; i < arrAdicionales.length; i++) {
			storeCabecera.getProxy().extraParams[arrAdicionales[i]['nombre']]=arrAdicionales[i]['valor'];
		}
	};

	formCabecera.on('datos del formulario cabecera cambiaron',
			function() {
				cargaStore(grillaCabecera);
    });

	formCabecera.on('exitoAgregado',function(idNuevo) {
		var store=grillaCabecera.getStore();
	    var registro = Ext.create(store.model.modelName);
	    formCabecera.pueblaFormEnRegistro(registro); //todo menos el id
	    registro.data[registro.idField.name]=idNuevo;
	    store.insert(0, registro);
        grillaCabecera.getSelectionModel().select(0);
	  }
	);


	grillaCabecera.on(
		'select',
		function(sm, record, index, options) {
		  formCabecera.pueblaDatosEnForm(record);
		  formCabecera.setId(formCabecera, record.data['id']);
		}
	);


	formCabecera.on('cambio en agregando/modificando',
			function(agregando, modificando) {
				if (agregando || modificando){
				  grillaCabecera.disable();
				  panelSearch.disable();
				}else{
				  grillaCabecera.enable();
				  panelSearch.enable();
				}
	});


	function reaccionaAClickBuscar(){
		cargaParametrosAdicionales(storeCabecera, panelSearch);
		storeCabecera.load();
	}

	panelSearch.getBotonBuscar().on('click', function() {
		reaccionaAClickBuscar();
	});

	/**
	 * el reset debe hacerse aquí, externamente, no internamente en el form,
	 * pues los eventos ocurren casi simultáneamente y el form no llega a vaciarse
	 */
	panelSearch.getBotonReinicializar().on('click', function() {
		panelSearch.reinicializar();
		panelSearch.borraOcultos();
		cargaParametrosAdicionales(storeCabecera, panelSearch);
		storeCabecera.load();
		grillaCabecera.getSelectionModel().deselectAll();
	});

	function cargaStore(grilla) {
		var store = grilla.getStore();
		cargaParametrosAdicionales(store, panelSearch);
		store.load();
	};


}