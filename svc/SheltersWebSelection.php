<?php

/**
 * fuerza una selecci�n igual para todas las consultas que se hacen para listados en la web
 * @author Gdiaz
 *
*/
interface SheltersWebSelection {
	public function selTodosWeb($shelterName, $firstArea, $secondArea, $latitude, $longitude, $distance, $specialBreedId, $desde, $cuantos);
	public function selTodosWebCuenta($shelterName, $firstArea, $secondArea, $latitude, $longitude, $distance, $specialBreedId);
	
	/**
	* devuelve un array de pares valor-etiqueta, apto para ser usado por un selector en los formularios de b�squeda de 
	* shelters. Puede provenir de una tabla espec�fica de regiones, o de la tabla de shelters del pa�s. El campo "valor"
	* debe contener el tipo de valor requerido por el m�todo selTodos del pa�s correspondiente
	*/
	public function selFirstAreas();
}