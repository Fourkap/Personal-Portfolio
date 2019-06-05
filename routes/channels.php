<?php

/**
    |--------------------------------------------------------------------------
    | Broadcast Channels
    |--------------------------------------------------------------------------
    |
    | Here you may register all of the event broadcasting channels that your
    | application supports. The given channel authorization callbacks are
    | used to check if an authenticated user can listen to the channel.
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

Broadcast::channel(
    'App.User.{id}',
    function ($user, $id) {
        return (int) $user->id === (int) $id;
    }
);
