// $Id: README.txt,v 1.1.8.4 2010/04/25 12:50:03 amitaibu Exp $

OVERVIEW
---------
Zen ninesixty (a.k.a zen-960) is a subtheme deriving from Zen and Ninesixty 
themes.We use Zen to define the page elements, and use Ninesixty to define the page 
layout. The hierarchy of themes is as follows:

1) Zen                 - Base theme 
  2) Zen starter       - That's how we renamed Zen's STARTERKIT 
    3) Ninesixty       - We'll make it a subtheme of Zen starter
      4) Zen ninesixty - Our theme that we can directly edit 

DEPENDENCY
----------
Zen 2.x version - http://drupal.org/project/zen
Ninesixty - http://drupal.org/project/ninesixty

INSTALLATION
------------

1) Download Zen 2.x version, and Ninesixty.
  drush dl zen-6.x-2.x-dev ninesixty
  drush en zen ninesixty -y
2) Create a subtheme from Zen's STARTERKIT. 
You can use Zenophile module to do it automatically for you:
  drush dl zenophile
  drush en zenophile -y
  drush zenophile zen_starter "Subtheme of Zen. Base theme of Ninesixty" --friendly="Zen starter"
3) Some editing of zen_starter and ninesixty info file is required. This can be
done manually, or automatically by adding code to a custom module.
3.a) Manually:
In zen_starter.info comment out layout-fixed.css by adding a semi-column:
  ; stylesheets[all][]   = css/layout-fixed.css
In ninesixty.info add:
  base theme = zen_starter
3.b) Automatically:
Place code in your custom module and replace 'foo' with the name of the module.

/**
* Implementation of hook_system_info_alter()
*
* Add Zen starter theme as the base theme of Ninesixty theme.
*/
function foo_system_info_alter(&$info, $file) {
  if ($file->name == 'ninesixty') {
    $info['base theme'] = 'zen_starter';
  }
}
   
4) Enable all themes, and mark Zen-960 as the Default theme. 
5) Optional; You may use fresh.css to add your own CSS.