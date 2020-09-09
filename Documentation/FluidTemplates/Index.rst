.. include:: ../Includes.txt
.. highlight:: html

.. fluid-templates:

===============
Fluid Templates
===============

Before we describe how the static files discussed in the previous section 
:ref:`design-template` can be converted into Fluid templates, we should understand
what *Fluid* is and what the main ideas behind this powerful rendering engine
are. It is important to point out that the following section is just a quick
introduction. Further details about Fluid can be found at the `project
repository at GitHub <https://github.com/TYPO3Fluid/Fluid>`__ for example.


.. quick-introduction-to-fluid:

Quick Introduction to Fluid
===========================

Like many other templating engines, Fluid reads *template files*,
processes them and replaces certain variables and specific tags with dynamic
content. The result is a fully working website with a clean and valid HTML
output. Dynamic elements are automatically updated as required. Navigation
menus are a typical example for this type of content. A menu exists on all
pages across the entire website. Whenever pages are added, deleted or renamed,
the menu items change.

Fluid takes modern templating a step further. By using *ViewHelpers*,
developers can implement complex functionality and therefore extend the
original functionality of Fluid to their heart's content. ViewHelpers are built
in the programming language PHP. Having said that, website integrators or
editors are not required to learn or understand these (this is the
responsibility of a software developer). Integrators only need to **apply**
them -- and this is as easy as adding an HTML tag such as :html:`<image.../>` to an
HTML file.

More than 80 ViewHelpers are shipped with the TYPO3 core already. They enable
integrators and web developers to use translations of variables, generate forms
and dynamic links, resize images, embed other HTML files and even implement
logical functions such as :html:`if ... then ... else ...`. An overview of the
available ViewHelpers and how to apply them can be found at `Fluid Powered
TYPO3 <https:/fluidtypo3.org/viewhelpers/>`__ and at the `TYPO3 Wiki
<https://wiki.typo3.org/Fluid>`__. Note that both sites are community-driven and
not maintained by the TYPO3 Documentation Team.


.. directory-structure:

Directory Structure
===================

Fluid requires a specific directory structure to store the template files. If
you are working through this tutorial now, this is a perfect time to create the
first set of folders of the sitepackage extension. The initial directory can
be named :file:`site_package/`, which we assume is located on your local
machine. You can also choose a different name such as "site_example" or
"site_clientname", but this tutorial uses "site_package".

The aforementioned folders for Fluid are all located as sub-directories of a
folder called :file:`Resources/`. Therefore, create the directory structure as
listed below.

.. code-block:: none

   site_package
   └── Resources
       ├── Private
       │   ├── Languages
       │   ├── Layouts
       │   │   └── Page
       │   ├── Partials
       │   │   └── Page
       │   └── Templates
       │       └── Page
       └── Public
           ├── Css
           ├── Images
           └── JavaScript

The :file:`Public/` directory branch is self-explanatory: it contains folders
such as :file:`Css/`, :file:`Images/` and :file:`JavaScript/`. All files in these folders
will be delivered to the user (website visitors) *as they are*. These are
**static** files which are not modified by TYPO3 at all before they are sent to
the user.

The :file:`Private/` directory with its four sub-folders :file:`Languages/`,
:file:`Layouts/`, :file:`Partials/` and :file:`Templates/` in contrast, require
some explanation.

Folders under 'Private/'
------------------------

Layouts
~~~~~~~
HTML files, which build the overall *layout* of the website, are stored in the
:file:`Layouts/` folder. Typically this is only **one** construct for all
pages across the entire website. Pages can have different layouts of course,
but *page layouts* do not belong into the :file:`Layout/` directory. They are
stored in the :file:`Templates/` directory (see below). In other words, the
:file:`Layouts/` directory should contain the global layout for the entire website
with elements which appear on all pages (e.g. the company logo, navigation
menu, footer area, etc.). This is the skeleton of your website.

Templates
~~~~~~~~~
The most important fact about HTML files in the :file:`Templates/` directory
has been described above already: this folder contains layouts, which are page-
specific. Due to the fact that a website usually consists of a number of pages
and some pages possibly show a different layout than others (e.g. number of
columns), the :file:`Templates/` directory may contain one or multiple HTML files.

Partials
~~~~~~~~
The directory called :file:`Partials/` may contain small
snippets of HTML template files. "Partials" are similar to templates, but their
purpose is to represent small units, which are perfect to fulfil recurring
tasks. A good example of a partial is a specially styled box with content that
may appear on several pages. If this box would be part of a page layout, it
would be implemented in one or more HTML files inside the :file:`Templates/`
directory. If an adjustment of the box is required at one point in the future,
this would mean that several template files need to be updated. However, if we
store the HTML code of the box as a small HTML snippet into the :file:`Partials/`
directory, we can include this snippet at several places. An adjustment only
requires an update of the partial and therefore in one file only.

The use of partials is optional, whereas files in the :file:`Layouts/` and
:file:`Templates/` directories are mandatory for a typical sitepackage extension.

The sitepackage extension described in this tutorial focuses on the
implementation of pages, rather than specific content elements. Therefore,
folders :file:`Layouts/`, :file:`Templates/` and :file:`Partials/` all show a sub-
directory :file:`Page/`.

Language
~~~~~~~~
The directory :file:`Languages/` may contain :file:`.xlf` files that are used for
the localization of labels and text strings (frontend as well as backend) by
TYPO3. This topic is not strictly related to the Fluid template engine and is
documented in section
:ref:`Internationalization and Localization <t3coreapi:internationalization-and-localization>`.


.. implement-templates-files:

Implement Template Files
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
       │   ├── Languages
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
TypeScript for improved productivity and mainainability of your style sheets
and JavaScript code. For the sake of simplicity, this tutorial uses the basic
implementation of Cascading Style Sheets (CSS) and JavaScript files.


.. the-page-layout-file:

The Page Layout File
====================

As described before, a typical static :file:`index.html` file contains a :html:`<head>`
and a :html:`<body>` section, but we only need to focus on the :html:`<body>`. Open
file :file:`site_package/Resources/Private/Templates/Page/Default.html` in your
favorite text editor and remove all lines before the starting :html:`<body>` tag
and after the closing :html:`</body>` tag. Then, remove these two lines, too. As a 
result, your :file:`Default.html` may now be empty. In that case, you can use the 
following example based on the Bootstrap Jumbotron. If using your own layout template, 
your :file:`Default.html` now contains only the HTML code inside the body.

So, let's assume it contains something like the following HTML code::

   <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
      <a class="navbar-brand" href="#">Navbar</a>
      <button  class="navbar-toggler"
               type="button"
               data-toggle="collapse"
               data-target="#navbarsExampleDefault"
               aria-controls="navbarsExampleDefault"
               aria-expanded="false"
               aria-label="Toggle navigation"
               >
         <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
         <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
               <a class="nav-link" href="#">
                  Home
               </a>
            </li>
         </ul>
      </div>
   </nav>

   <main role="main">
      <div class="jumbotron">
         <div class="container">
            <h1 class="display-3">Hello, world!</h1>
            <p> ... </p>
         </div>
      </div>
      <div class="container">
         <div class="row">
            <div class="col-md-4">
               <h2>Heading 1</h2>
               <p> ... </p>
            </div>
            <div class="col-md-4">
               <h2>Heading 2</h2>
               <p> ... </p>
            </div>
            <div class="col-md-4">
               <h2>Heading 3</h2>
               <p> ... </p>
            </div>
         </div>
      </div>
   </main>

In case you have worked with the Bootstrap library before, you will quickly
realize that this is a simplified version of the well-known template called
`Bootstrap Jumbotron <http://getbootstrap.com/docs/4.0/examples/jumbotron/>`__.
The first section creates a mobile responsive navigation menu (:html:`<nav> ...
</nav>`) and the second section a container for the content (:html:`<main> ...
</main>`). Inside the content area we see a full-width section (:html:`<div
class="jumbotron"> ... </div>`) and a simple container with three columns.

The code above misses a few lines at the end, which include some JavaScript
files such as jQuery and Bootstrap. You are advised to remove these line from
the :file:`Resources/Private/Template/Page/Default.html` file, too.

Due to the fact that the "jumbotron" elements could be used on several pages
(page layouts) across the entire website, we should move this part to a
partial. Create a new file named :file:`Jumbotron.html` inside directory
:file:`site_package/Resources/Private/Partials/Page/` and copy the approriate six
lines (starting from :html:`<div class="jumbotron">`) into it. Make sure the file
name reads **exactly** as stated above with upper case "J" as the first
character.

Now, remove the lines from file
:file:`Resources/Private/Template/Page/Default.html` and replace them with the
following single line::

   <f:render partial="Jumbotron" />

Congratulations -- you just applied your first ViewHelper! HTML tags starting
with :html:`<f:...>` are typically core ViewHelpers in Fluid. The tag
:html:`<f:render>` is the Render-ViewHelper, which (as the name suggests)
renders the content of a section or partial. In our case it is the latter,
because of the :html:`partial="..."` argument. Note: do not append :file:`.html` here.
HTML is the default format and as a convention, the ViewHelper automatically
knows the file name and its location: :file:`Partials/Page/Jumbotron.html`.

At this point, we have implemented an (optional) partial and a page layout
template. Keep the file :file:`Resources/Private/Templates/Page/Default.html` open
in your text editor, because we need to make one more small adjustment.

As described above, files inside the :file:`Templates/` directory are page-specific
layouts. An additional component allows web developers to build the overall
*layout* (the skeleton) of the website: this is an HTML file in the
:file:`Resources/Private/Layouts/Page/` folder that we name :file:`Default.html`, too.
Before we create this file, we need to tell our page layout template
(:file:`Resource/Private/Templates/Page/Default.html`) which website template it should
use::

   <f:layout name="Default" />
   <f:section name="Main">

      <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
         <a class="navbar-brand" href="#">Navbar</a>
         <button  class="navbar-toggler"
                  type="button"
                  data-toggle="collapse"
                  data-target="#navbarsExampleDefault"
                  aria-controls="navbarsExampleDefault"
                  aria-expanded="false"
                  aria-label="Toggle navigation"
                  >
            <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
               <li class="nav-item active">
                  <a class="nav-link" href="#">
                     Home
                  </a>
               </li>
            </ul>
         </div>
      </nav>

      <main role="main">
         <f:render partial="Jumbotron" />
         <div class="container">
            <div class="row">
               <div class="col-md-4">
                  <h2>Heading 1</h2>
                  <p> ... </p>
               </div>
               <div class="col-md-4">
                  <h2>Heading 2</h2>
                  <p> ... </p>
               </div>
               <div class="col-md-4">
                  <h2>Heading 3</h2>
                  <p> ... </p>
               </div>
            </div>
         </div>
      </main>
   </f:section>

The updated template file shows two additional lines at the top (:html:`<f:layout>`
and :html:`<f:section>`) and an additional line at the bottom (the closing
:html:`</f:section>` tag). The Layout-ViewHelper refers to the "Default" template
file, which we will create in the next step. The Section-ViewHelper simply
wraps the page template code we created before and therefore defines a section
named "Main".


.. _the-website-layout-file:

The Website Layout File
=======================

Now, let's implement the website layout file. First, we create a new file
:file:`Default.html` inside the directory
:file:`site_package/Resources/Private/Layouts/Page/` and add the following line::

   <f:render section="Main" />

Surprisingly, that is all. This line instructs Fluid to render the section
"Main", which we have implemented in the page layout template file
:file:`Resources/Private/Templates/Page/Default.html`.

However, we will do an additional step. The navigation menu will be shown on
all pages across the entire website. Similar to the "Jumbotron" partial, it
makes perfect sense to move the :html:`<nav> ... </nav>` section from the page
layout template to a central place. Due to the fact that a menu is required on
all pages, it can be part of the global website layout. Therefore, file
:file:`Resources/Private/Layouts/Page/Default.html` is a suitable destination.

Move the :html:`<nav> ... </nav>` part from file
:file:`Resources/Private/Templates/Page/Default.html` to
:file:`Resources/Private/Layouts/Page/Default.html` as shown here::

   <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
      <a class="navbar-brand" href="#">Navbar</a>
      <button  class="navbar-toggler"
               type="button"
               data-toggle="collapse"
               data-target="#navbarsExampleDefault"
               aria-controls="navbarsExampleDefault"
               aria-expanded="false"
               aria-label="Toggle navigation"
               >
         <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
         <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
               <a class="nav-link" href="#">
                  Home
               </a>
            </li>
         </ul>
      </div>
   </nav>

   <f:render section="Main" />

Do not forget to remove the lines from the
:file:`Resources/Private/Templates/Page/Default.html` file. If you do not
remove them, the menu would appear twice in the frontend.
