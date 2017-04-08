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

$lang['db_invalid_connection_str'] = 'Ne mogu se odrediti podešavanja baze na osnovu stringova za konekciju koje ste vi unijeli.';
$lang['db_unable_to_connect'] = 'Ne može se povezati na server baze sa pribavljenim podešavanjima.';
$lang['db_unable_to_select'] = 'Ne može se izabrati navedena baza: %s';
$lang['db_unable_to_create'] = 'Ne može se napraviti navedena baza: %s';
$lang['db_invalid_query'] = 'Upit koji ste unijeli nije ispravan.';
$lang['db_must_set_table'] = 'Mora se podesiti tablica koja će se koristiti u upitu.';
$lang['db_must_use_set'] = 'Mora se koristiti "set" metoda da bi ažurirali unos.';
$lang['db_must_use_index'] = 'Mora se navesti indeks vrijednosti koje želite ažurirati.';
$lang['db_batch_missing_index'] = 'Nedostaje indeks za jedan ili više redova koje želite ažurirati.';
$lang['db_must_use_where'] = 'Ažuriranja nisu dozvoljena ako ne sadrže "where" uvijet.';
$lang['db_del_must_use_where'] = 'Brisanja nisu dozvoljena ako ne sadrže "where" ili "like" uvijet.';
$lang['db_field_param_missing'] = 'Da bi pribavili podatke iz polja potrebno je unijeti ime tabele kao parametar.';
$lang['db_unsupported_function'] = 'Ova karakteristika nije dostupna u vrsti baze koju koristite.';
$lang['db_transaction_failure'] = 'Transakcija neuspiješna: Izvršeno vraćanje na prethodno stanje.';
$lang['db_unable_to_drop'] = 'Nemoguće je izvršiti brisanje željene baze.';
$lang['db_unsupported_feature'] = 'Nije podržana karakteristika za vrstu baze koju koristite.';
$lang['db_unsupported_compression'] = 'Format za kompresiju fajlova koji ste izabrali nije podržan na vašem serveru.';
$lang['db_filepath_error'] = 'Ne mogu se zapisati podaci u fajl koji ste naveli.';
$lang['db_invalid_cache_path'] = 'Putanja koju ste naveli za cache nije ispravna ili nije dozvoljena za pisanje.';
$lang['db_table_name_required'] = 'Ime tabele je obavezno za tu operaciju.';
$lang['db_column_name_required'] = 'Ime kolone je obavezno za tu operaciju.';
$lang['db_column_definition_required'] = 'Definiranje stupca je obavezno za tu operaciju.';
$lang['db_unable_to_set_charset'] = 'Ne može se podesiti klijentovo slovno kodiranje: %s';
$lang['db_error_heading'] = 'Desila se greška u bazi podataka.';
