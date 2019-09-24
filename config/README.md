# Configurations go here

My development model is (very basically):
- All web stuff is in: `/srv/`
- Apache is at: `/srv/server/apache`
- Projects are at: `/srv/projects/PROJECTTYPE/DOMAIN`
- Configuration for sites is at: `/srv/projects/PROJECTTYPE/DOMAIN/config`
  This folder contains various configuration folders depending on the project:
  - apache/ - vhost settings for local development
  - composer/ - settings for use with composer, to get them out of the site root
  - drupal8/ - settings for Drupal 8
  - tests/ - testing settings and tests
  - ...you get the idea.

  Default or example files are included in some directories.
  If you have to add a file here, or rename a file to use it,
  do NOT check it into version control.

---

*P.S. These may not be completely up to date.  Future revisions may happen.*
