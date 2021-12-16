<?php

return veritft([
    ['/auth/login','POST'],
    ['/post/write','POST'],
    ['/post/update','POST'],
    ['/post/delete/','POST'],
    ['/user/update','POST']
]) ?: reject(400);