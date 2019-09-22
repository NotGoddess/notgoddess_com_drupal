#Default Apache vhost configuration for local server

Note: These are very basic instructions based on my development model, which is:

All web stuff is in: /srv/
Apache is at: /srv/server/apache
Projects are at: /srv/projects/PROJECTTYPE/DOMAIN

---

## Initial Setup
Do this if you have never used a local configuration like this before.

In the apache server httpd-vhosts.conf file add this line (if missing):

  `Include "/path/to/vhosts/directory/*.conf"`

An absolute path may work for you, or you may need to use a relative path.
Change the directory separator (/) to the correct one for your OS.

This vhosts directory acts like Ubuntu's sites-enabled directory.
If you don't need a vhost, remove it from the directory
Or to temporarily disable, rename the extension to .conf_disabled

## Set up your vhost configuration file
This file is kept with the project, so you can version it.

1. Copy the file default.vhost.conf to vhost.conf

2. Edit the vhost.conf file

3. Perform a find and replace on these placeholders, inserting your site information.
  ___SITENAME___    My Example Site
  ___DOMAIN___      example.com
  ___SUBDOMAIN___   www
  ___SITEROOT___    /srv/projects/php/example.com
  ___WEBROOT___     /srv/projects/php/example.com/www
  ___LOCAL_IP___    127.0.0.4
  ___DEV_IP___      IP for Development Server SSL
  ___STAGE_IP___    IP for Staging Server SSL
  ___PROD_IP___     IP for Production Server SSL

Adust other values if needed.
Comment out with `#` or remove the SSL section if you aren't using it.
Note: If you aren't using it because you aren't sure how to set up SSL on localhost, Google it - it's not too hard.  You can do it. I believe in you.


## Enable the vhost

1. In the vhost directory, create a new file __DOMAIN__.conf

2. Insert this line, replacing variables:

`Include __SITEROOT__/config/apache/vhost.conf`

3. Save the file

## Run Apache configtest
Syntax varies per system, so look up the way to do it with your setup.

## Disabling a site

If you don't need a vhost, remove it from the directory
Or to temporarily disable, rename the extension to .conf_disabled
Only files ending in .conf will be included by the vhosts file.

