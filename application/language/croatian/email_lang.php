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

$lang['email_must_be_array'] = 'Metoda za validaciju emaila mora biti poslana kao niz.';
$lang['email_invalid_address'] = 'Nepostojeća email adresa: %s';
$lang['email_attachment_missing'] = 'Nemoguće je locirati dodatnu datoteku za email: %s';
$lang['email_attachment_unreadable'] = 'Nemoguće je otvoriti dodatnu datoteku: %s';
$lang['email_no_from'] = 'Ne može se poslati email bez "From" zaglavlja.';
$lang['email_no_recipients'] = 'Morate navesti primaoce: To, Cc, or Bcc';
$lang['email_send_failure_phpmail'] = 'Nemoguće je poslati mail korištenjem PHP mail(). Vaš server možda nije podešen da šalje email ovom metodom.';
$lang['email_send_failure_sendmail'] = 'Nemoguće je poslati email korištenjem PHP Sendmail. Vaš server možda nije podešen da šalje email ovom metodom.';
$lang['email_send_failure_smtp'] = 'Nemoguće je poslati email korištenjem PHP SMTP. Vaš server možda nije podešen da šalje email ovom metodom.';
$lang['email_sent'] = 'Vaša poruka je uspešno poslana korištenjem sljedećeg protokola: %s';
$lang['email_no_socket'] = 'Nemoguće je otvoriti socket za Sendmail. Provijerite podešavanja.';
$lang['email_no_hostname'] = 'Niste podesili ime SMTP hosta.';
$lang['email_smtp_error'] = 'Dogodila se slijedeća SMTP error greška: %s';
$lang['email_no_smtp_unpw'] = 'Greška: Morate podesiti SMTP korisničko ime i šifru.';
$lang['email_failed_smtp_login'] = 'Neuspešan pokušaj slanja AUTH LOGIN naredbe. Greška: %s';
$lang['email_smtp_auth_un'] = 'Neuspiješna autentikacija korisničkog imena. Greška: %s';
$lang['email_smtp_auth_pw'] = 'Neuspiješna autentikacija šifre. Greška: %s';
$lang['email_smtp_data_failure'] = 'Nemoguće je poslati podatke: %s';
$lang['email_exit_status'] = 'Šifra izlaznog statusa: %s';
