<?php

return [
    ['/','get','index.index'],
    ['/auth/login','get','auth.showLoginForm'],
    ['/auth/login','post','auth.login'],
    ['/auth/logout','get','auth.logout'],

];