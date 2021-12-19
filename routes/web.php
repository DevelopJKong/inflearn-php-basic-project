<?php

return [
    ['/','get','index.index'],
    ['/auth/login','get','auth.showLoginForm'],
    ['/auth/login','post','auth.login'],
    ['/auth/logout','get','auth.logout'],
    ['/user/register','get','user.create'],
    ['/user/register','post','user.store'],
    ['/user/register','get','user.edit'],
    ['/user/register','post','user.update'],

];