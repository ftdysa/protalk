<?php

/**
 * ProTalk
 *
 * Copyright (c) 2012-2013, ProTalk
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * If you don't want to setup permissions the proper way, just uncomment the following PHP line
 * read http://symfony.com/doc/current/book/installation.html#configuration-and-setup for more information
 * umask(0000);
 */

/**
 * This check prevents access to debug front controllers that are deployed by accident to production servers.
 * Feel free to remove this, extend it, or make something more sophisticated. 
 */
if (!in_array(@$_SERVER['REMOTE_ADDR'], array(
    '127.0.0.1',
    '::1',
    '192.168.56.1',
    '33.33.33.1',
))) {
    header('HTTP/1.0 403 Forbidden');
    exit('You are not allowed to access this file. Check '.basename(__FILE__).' for more information.');
}

require_once __DIR__.'/../app/bootstrap.php.cache';
require_once __DIR__.'/../app/AppKernel.php';

use Symfony\Component\HttpFoundation\Request;

$kernel = new AppKernel('dev', true);
$kernel->loadClassCache();
$kernel->handle(Request::createFromGlobals())->send();
