<?php

/**
 * fuerza una direcci�n de 2 l�neas, listable en la web
 * @author Gdiaz
 *
*/
interface FormattedAddress {
	public function get1stLine();
	public function get2ndLine();
	/**
	 * Esta sirve para listar en los resultado de b�squeda
	*/
	public function getAdminAreas();
}