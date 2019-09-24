# Composer configurations go here

I've moved Composer settings here when possible, so they don't clutter up the site root.


## Changes to ScriptHandler.php

Instead of `createRequiredFiles` called for both post-install and post-update, I call separate functions.

- `postInstallHandler`
   - Checks for required files and directories and if missing, creates them with permissions.

- `postUpdateHandler`
  - Sets permissions on settings.php file to 0550
  - Sets permissions on sites/default/files/ to 0775
  - Todo: Add recursive function to reset all files/directory permissions.

The `composer.json` file has been updated to reflect this.

**Note:** These are looser settings, for hosting where the group needs write permissions. Tighten when possible.

---

*P.S. These may not be completely up to date.  Future revisions may happen.*
