# Apache vhost configuration for local server

## Overview

This local server vhosts directory acts like Ubuntu's sites-enabled directory.

## Initial Setup

Do this if you have never used a local configuration like this before.

Create a `vhosts` directory for referencing local configurations. Use whatever name you like. I use `vhosts`

In the Apache server `httpd-vhosts.conf` file add this line to the bottom (if missing):

```
Include "/path/to/your/vhosts/directory/*.conf"
```

An absolute path may work for you, or you may need to use a relative path.
Change the directory separator (/) to the correct one for your OS as needed.

## Configuration

### Set up your vhost configuration file

1. Copy the file `default.vhost.conf` to `vhost.conf`

2. Edit the `vhost.conf` file

3. Perform a find and replace on these placeholders, inserting your site information.


| Placeholder       | Example                           |
|-------------------|-----------------------------------|
| `___SITENAME___`  | My Example Site                   |
| `___DOMAIN___`    | example.com                       |
| `___SUBDOMAIN___` | www                               |
| `___SITEROOT___`  | /srv/projects/php/example.com     |
| `___WEBROOT___`   | /srv/projects/php/example.com/www |


If not using SNI:

| Placeholder       | Example                           |
|-------------------|-----------------------------------|
| `___LOCAL_IP___`  | 127.0.0.4                         |
| `___DEV_IP___`    | IP for Development Server SSL     |
| `___STAGE_IP___`  | IP for Staging Server SSL         |
| `___PROD_IP___`   | IP for Production Server SSL      |

Adjust other values if needed.

#### PHP module settings
These only apply if you are loading PHP via module
If using PHP FPM, you can add the settings to a .user.ini file
See: https://secure.php.net/manual/en/configuration.file.per-user.php

I use IfModule to ensure these settings won't break Apache.
You may want it to break on errors - if so comment out the <IfModule> directives
The module name may change - refer to Apache httpd.conf for name
Then check via phpinfo on the site to verify 'Local Value' matches settings

#### SSL VirtualHost
Comment out with `#` or remove the SSL section if you aren't using it.
Note: If you aren't using it because you aren't sure how to set up SSL on localhost, Google it - it's not too hard.  You can do it. I believe in you.

### Enable the vhost

1. In the vhost directory, create a new file __DOMAIN__.conf

2. Insert this line, replacing variables:

`Include __SITEROOT__/config/apache/vhost.conf`

3. Save the file

### Add a Hosts file entry

Which file you edit and how varies by OS and security policies so I won't provide exact details here.

I recommend using an IP other than 127.0.0.1 as the IPv6 loopback can cause minor delays.

```
# Host entry for local development
127.0.0.2  local.example.com
```
**Note:** If you changed the local domain in the vhhost.conf, change it here also.


### Run Apache configtest

Syntax varies per system, so look up the way to do it with your setup.

### Start your local server

If all goes well, going to http://local.example.com will show your site.

## Troubleshooting

> A developer's greatest skill isn't knowing everything, but rather knowing how to find it.

*If you do know everything, kudos to you! Can you send me next week's winning lottery numbers?*

You can open an issue if needed, or open one to share a solution with others.

## Disabling a site

If you don't need a vhost, remove it from the directory

To temporarily disable, rename the extension to `.conf_disabled`

Only files ending in `.conf` will be included by the vhosts file.

## Should I version the file?

It depends.

If every developer working on the project uses the same setup, and the file
doesn't contain any information you would consider sensitive, you can commit it.

However, in most cases you'll want to keep it in the same secure location
where you keep other sensitive files that should or may be shared with other
developers but should not be public.

**Consult your security expert for more advice.**

---

*P.S. These may not be completely up to date.  Future revisions may happen.*
