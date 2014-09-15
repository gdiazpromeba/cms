<?php

/**
 * fuerza una selección igual para todas las consultas que se hacen para listados en la web
 * @author Gdiaz
 *
*/
interface SheltersWebSelection {
	public function selTodosWeb($shelterName, $firstArea, $secondArea, $latitude, $longitude, $distance, $specialBreedId, $desde, $cuantos);
	public function selTodosWebCuenta($shelterName, $firstArea, $secondArea, $latitude, $longitude, $distance, $specialBreedId);
	
	/**
	* devuelve un array de pares valor-etiqueta, apto para ser usado por un selector en los formularios de bísqueda de 
	* shelters. Puede provenir de una tabla específica de regiones, o de la tabla de shelters del país. El campo "valor"
	* debe contener el tipo de valor requerido por el método selTodos del país correspondiente
	*/
	public function selFirstAreas();
}