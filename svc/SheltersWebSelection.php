<?php

/**
 * fuerza una selección igual para todas las consultas que se hacen para listados en la web
 * @author Gdiaz
 *
*/
interface SheltersWebSelection {
	public function selTodosWeb($shelterName, $latitude, $longitude, $distance, $specialBreedId, $desde, $cuantos);
	public function selTodosWebCuenta($shelterName, $latitude, $longitude, $distance, $specialBreedId);
}