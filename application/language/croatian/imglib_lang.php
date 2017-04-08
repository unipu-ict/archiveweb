<?php
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2014 - 2016, British Columbia Institute of Technology
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package	CodeIgniter
 * @author	EllisLab Dev Team
 * @copyright	Copyright (c) 2008 - 2014, EllisLab, Inc. (https://ellislab.com/)
 * @copyright	Copyright (c) 2014 - 2016, British Columbia Institute of Technology (http://bcit.ca/)
 * @license	http://opensource.org/licenses/MIT	MIT License
 * @link	https://codeigniter.com
 * @since	Version 1.0.0
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');

$lang['imglib_source_image_required'] = 'Morate definirati početnu sliku u vašim karakteristikama.';
$lang['imglib_gd_required'] = 'GD biblioteka za slike je neophodna za ovu karakteristiku.';
$lang['imglib_gd_required_for_props'] = 'Vaš server mora da podržava GD biblioteku za slike u slučaju da određujete karakteristike slike.';
$lang['imglib_unsupported_imagecreate'] = 'Vaš server ne podržava GD biblioteku za slike koja je neophodna da bi se obradio ovaj tip slike.';
$lang['imglib_gif_not_supported'] = 'GIF slike često nisu podržane zbog ograničenja licence. Možete koristiti JPG ili PNG slike umjesto toga.';
$lang['imglib_jpg_not_supported'] = 'JPG slike nisu podržane.';
$lang['imglib_png_not_supported'] = 'PNG slike nisu podržane.';
$lang['imglib_jpg_or_png_required'] = 'Protokol za mjenjanje veličine slika koji je određen u karakteristikama rada jedino radi sa tipom JPEG i PNG slika.';
$lang['imglib_copy_error'] = 'Greška je primijećena dok je pokušan pristup ili zamjena fajla. Provjerite da li je dozvoljen upis podataka u direktorij.';
$lang['imglib_rotate_unsupported'] = 'Rotacija slika nije podržana na serveru.';
$lang['imglib_libpath_invalid'] = 'Putanja do vaše biblioteke za slike nije ispravna. Podesite ispravnu putanju u karakterisitikama slike.';
$lang['imglib_image_process_failed'] = 'Neuspiješna obrada slike. Provijerite da li vaš server podržava izabrani protokol i da li je putanja do biblioteke za slike ispravna.';
$lang['imglib_rotation_angle_required'] = 'Potreban je ugao rotacije da bi se rotacija izvršila.';
$lang['imglib_invalid_path'] = 'Putanja do slike nije ispravna.';
$lang['imglib_invalid_image'] = 'Priložena slika nije važeća.';
$lang['imglib_copy_failed'] = 'Kopiranje slike je neuspiješno.';
$lang['imglib_missing_font'] = 'Ne može se locirati font za upotrebu.';
$lang['imglib_save_failed'] = 'Ne može se snimiti slika. Provjerite da slika i direktorij u kojrm se nalazi datoteka imaju dozvolu za pisanje.';
