Photon CMS
=======

An extremely fast CMS.

Photon CMS is a CMS with the goal of helping you build the fastest portal websites.

Features
--------

### Publishing to static files

When clicking on "Publish all", all the pages are dumped to static HTML pages. This means that when users access your website, no PHP is executed, no queries are run. This allows you to sustain a much larger load than if you are running a fully dynamic frontend.


### Full site preview before publishing

Simply by going to <url>/backend/preview you can view a full version of your website before publishing. All internal links are functional, so you can browse and test this website while remaining in the preview version.


### HTML editing of pages

Rich text editors are fine, but more often than not they make things harder. In this CMS, editing the content is done in unfiltered HTML.


### Easy set up, even on shared hosts

Simply upload to your hosting's public folder, and you're set up! No database to set up, all is handled in SQLite.


### Themes

Develop and deploy easily new themes for your website.


### Autominifying of CSS and JS

On publishing, CSS and JS are minified and multiple files are combined to make page loading as fast as possible.


### Full site version management

If you made a mistake, rolling back to the previous version is done in one click.


Setup
-----
Upload the code in your public folder. Voilà.

To edit and create pages, go to <url>/backend

To publish your changes click the "Publish all" link in the menu and follow instructions.


Requirements
------------
* Apache2
* PHP 5.3+
* SQlite3


Use cases
---------
* Simple portal websites
* Websites with very different HTML templates for each page
* Low cost hosting
* Sites developed by developer primarily experienced in HTML, CSS and JS
* Sites with low update frequency


Examples
--------
Coming soon (I hope!)

Contribute
----------
The project is just starting! If you wish to contribute, just submit a pull request - or send me an email at mahe.yannick[at]gmail.com

Built upon
----------
 * http://php.net
 * http://twitter.github.com/bootstrap/
 * http://codemirror.net/
 * http://www.sqlite.org/

TODO
----
* Page assets
* Minify CSS and JS
* Publish (HTML generation)
* Preview
