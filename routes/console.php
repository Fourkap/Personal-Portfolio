<?php
/**
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
 * php version 7.2.10
 *
 * @category Route
 * @package  Routes
 * @author   Tao BERQUER <tao.berquer@gmail.com>
 * @author   Alexandre Kaprielian <alex.kaprielian@gmail.com>
 * @license  https://github.com/taoberquer/Portfolio/blob/develop/LICENSE GNU Public License
 * @link     https://github.com/taoberquer/Portfolio
 **/

use Illuminate\Foundation\Inspiring;

Artisan::command(
    'inspire',
    function () {
        $this->comment(Inspiring::quote());
    }
)->describe('Display an inspiring quote');
