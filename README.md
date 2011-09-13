php-virtualhost
===============

I wanted to emulate an Apache Virtual Host setup without setting up Apache. So I
wrote a PHP script to do it.

Warning
-------

This script is not production ready, and I'm not quite sure it should be used in production:

* There may be security holes that can expose your file system
* Apache is much better at this than a PHP script
* There may be unexpected side effects in other PHP scripts
* It's unconfigurable

Why use it
----------

You want to automagically setup a virtual host on a box to see what happens, **and
then add the Apache config later**.
