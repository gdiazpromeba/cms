<?php

/**
 * fuerza una dirección de 2 líneas, listable en la web
 * @author Gdiaz
 *
*/
interface FormattedAddress {
	public function get1stLine();
	public function get2ndLine();
}