..  include:: /Includes.rst.txt

..  _fluid-templates:

===============
Fluid Templates
===============

To understand the following section you need basic knowledge about how to use the
:ref:`Fluid templating engine <t3start:fluid-templates>` and
:ref:`TypoScript <t3start:typoscript>`.

This chapter is based on the following steps:

*   A Composer-based TYPO3 installation, at least version 13.3.
*   You need :ref:`Initial pages and a site
    configuration <t3sitepackage:typo3-backend-create-initial-pages>`.
*   You need a :ref:`Minimal site package <t3sitepackage:minimal-design>`.
*   The assets should be in the correct locations.

After this tutorial you have created Fluid templates and split them into
manageable pieces.

.. _implement-templates-files:

Implement template files
========================

Based on the facts explained above, it should be easy to copy the *static
files* from the :ref:`design-template` into the appropriate folders of the site
package directory structure.

The custom CSS file, as well as the custom JavaScript file, are files which
will be maintained by a developer and never modified by TYPO3 at all. The same
applies to the logo. However, TYPO3 may create a *modified copy* of the image,
but should never manipulate the original image file (the "source"). Therefore,
all three files can be classified as *static* and copied to the :file:`Public/`
folder as follows.

* :file:`site_package/Resources/Public/Css/website.css`
* :file:`site_package/Resources/Public/JavaScript/website.js`
* :file:`site_package/Resources/Public/Images/logo.png`

As discussed before, the Bootstrap and jQuery files should be ignored for the
time being. This leaves us with the :file:`index.html` file, more precisely with
the :html:`<body>`-part of that file.

Due to the fact that this file needs to be rendered and enriched with dynamic
content from the CMS, it can not be *static* and the content of this file will
not be sent to the user directly. Therefore, this file should be stored
somewhere inside the :file:`Resources/Private/` directory. The question about
the exact sub-directory pops up though: is :file:`Resources/Private/Layouts/Page/`
or :file:`Resources/Private/Templates/Page/` the perfect fit?

In our case, directory :file:`Resources/Private/Templates/Page/` is the correct
folder, because this is the entry point for all page templates, despite the
fact that our :file:`index.html` file in fact implements the layout of the entire
site. Therefore, the :file:`index.html` file gets copied into
:file:`Resources/Private/Templates/Page/` and renamed to :file:`Default.html` (in order
to visualize that this file represents the layout of a default page).

As a result, we end up with the following structure.

.. code-block:: none

   site_package
   └── Resources
       ├── Private
       │   ├── Language
       │   ├── Layouts
       │   │   └── Page
       │   ├── Partials
       │   │   └── Page
       │   └── Templates
       │       └── Page
       │           └── Default.html
       └── Public
           ├── Css
           │   └── website.css
           ├── Images
           │   └── logo.png
           └── JavaScript
               └── website.js

It is important to note that at this point in time the sitepackage extension
contains four files only: :file:`Default.html`, :file:`website.css`, :file:`logo.png` and
:file:`website.js`. The rest are empty directories for now.

The point is that TYPO3 follows the *convention over configuration* principle.
This is a software design paradigm to decrease the number of decisions that a
web developer is required to make. Simply learn and follow the conventions
(e.g. that the path should be :file:`Resources/Private/Templates/Page/`) and the
development will be smooth, easy and straight forward. In addition, if another
web developer (e.g. one of your colleagues) looks at your sitepackage
extension, they know the locations and naming of files. This reduces
development time significantly, e.g. if an issue needs to be investigated or a
change should be implemented.

Furthermore, you might want to consider technologies such as Sass, SCSS and
TypeScript for improved productivity and maintainability of your style sheets
and JavaScript code. For the sake of simplicity, this tutorial uses the basic
implementation of Cascading Style Sheets (CSS) and JavaScript files.


.. _the-page-layout-file:

The page layout file
====================

As described before, a typical static :file:`index.html` file contains a :html:`<head>`
and a :html:`<body>` section, but we only need to focus on the :html:`<body>`. Open
file :file:`site_package/Resources/Private/Templates/Page/Default.html` in your
favorite text editor and remove all lines before the starting :html:`<body>` tag
and after the closing :html:`</body>` tag. Then, remove these two lines, too. As a
result, your :file:`Default.html` may now be empty. In that case, you can use the
following example based on the Bootstrap Jumbotron. If using your own layout template,
your :file:`Default.html` now contains only the HTML code inside the body.

So, let's assume it contains something like the following HTML code:

.. include:: /CodeSnippets/Fluid/Step1Default.rst.txt

In case you have worked with the Bootstrap library before, you will quickly
realize that this is a simplified version of the well-known template called
`Bootstrap Jumbotron <http://getbootstrap.com/docs/4.0/examples/jumbotron/>`__.
The first section creates a mobile responsive navigation menu (:html:`<nav> ...
</nav>`) and the second section a container for the content (:html:`<main> ...
</main>`). Inside the content area we see a full-width section (:html:`<div
class="jumbotron"> ... </div>`) and a simple container with two columns.

The code above misses a few lines at the end, which include some JavaScript
files such as jQuery and Bootstrap. You are advised to remove these line from
the :file:`Resources/Private/Templates/Page/Default.html` file, too.

Due to the fact that the "jumbotron" elements could be used on several pages
(page layouts) across the entire website, we should move this part to a
partial. Create a new file named :file:`Jumbotron.html` inside directory
:file:`site_package/Resources/Private/Partials/Page/` and copy the approriate six
lines (starting from :html:`<div class="jumbotron">`) into it. Make sure the file
name reads **exactly** as stated above with upper case "J" as the first
character.

Now, remove the lines from file
:file:`Resources/Private/Templates/Page/Default.html` and replace them with the
following single line:

.. code-block:: html
   :caption: EXT:site_package/Resources/Private/Templates/Page/Default.html

   <f:render partial="Jumbotron" />

Congratulations -- you just applied your first ViewHelper! HTML tags starting
with :html:`<f:...>` are typically core ViewHelpers in Fluid. The tag
:html:`<f:render>` is the Render-ViewHelper, which (as the name suggests)
renders the content of a section or partial. In our case it is the latter,
because of the :html:`partial="..."` argument. Note: do not append :file:`.html` here.
HTML is the default format and as a convention, the ViewHelper automatically
knows the file name and its location: :file:`Partials/Page/Jumbotron.html`.

Let us also move the navigation part into the file
:file:`Partials/Page/Navigation/MainNavigation.html`. As the navigation will
contain dynamic parts we forward all variables as arguments:

.. code-block:: html
   :caption: EXT:site_package/Resources/Private/Partials/Page/Navigation/MainNavigation.html

   <f:render partial="Navigation/MainNavigation.html" arguments="{_all}"/>

The file :file:`Default.html` should now look like this:

.. include:: /CodeSnippets/Fluid/Step2Default.rst.txt

At this point, we have implemented an (optional) partial and a page layout
template. Keep the file :file:`Resources/Private/Templates/Page/Default.html` open
in your text editor, because we need to make one more small adjustment.

As described above, files inside the :file:`Templates/` directory are page-specific
layouts. An additional component allows web developers to build the overall
*layout* (the skeleton) of the website: this is an HTML file in the
:file:`Resources/Private/Layouts/Page/` folder that we name :file:`Default.html`, too.
Before we create this file, we need to tell our page layout template
(:file:`Resources/Private/Templates/Page/Default.html`) which website template
it should use:

.. include:: /CodeSnippets/Fluid/Step3Default.rst.txt

The updated template file shows two additional lines at the top (:html:`<f:layout>`
and :html:`<f:section>`) and an additional line at the bottom (the closing
:html:`</f:section>` tag). The Layout-ViewHelper refers to the "Default" website layout
file, which we will create in the next step. The Section-ViewHelper simply
wraps the page template code we created before and therefore defines a section
named "Main".


..  _the-website-layout-file:

The website layout file
=======================

Now, let's implement the website layout file. First, we create a new file
:file:`Default.html` inside the directory
:file:`site_package/Resources/Private/Layouts/Page/` and add the following line:

.. code-block:: html
   :caption: EXT:site_package/Resources/Private/Layouts/Page/Default.html

   <f:render section="Main" />

Surprisingly, that is all. This line instructs Fluid to render the section
"Main", which we have implemented in the page layout template file
:file:`Resources/Private/Templates/Page/Default.html`.

However, we will do an additional step. The navigation menu will be shown on
all pages across the entire website. Therefore, it can be part of the global
website layout. Therefore, file
:file:`Resources/Private/Layouts/Page/Default.html` is a suitable destination.

Move the :html:`<f:render partial="Navigation/MainNavigation.html" arguments="{_all}"/>`
part from file
:file:`Resources/Private/Templates/Page/Default.html` to
:file:`Resources/Private/Layouts/Page/Default.html` as shown here:

.. include:: /CodeSnippets/Fluid/Layout.rst.txt

Do not forget to remove the line from the
:file:`Resources/Private/Templates/Page/Default.html` file. If you do not
remove them, the menu would appear twice in the frontend.



..  _fluid-templates-next-steps:

Next steps: Fetch the content and configure the menus
=====================================================

*   :ref:`Fetch and display the content <content-mapping>`
*   :ref:`Configure the menus <main-menu-creation>`
