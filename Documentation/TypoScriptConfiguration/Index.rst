.. include:: /Includes.rst.txt
.. highlight:: typoscript


.. _typoscript-configuration:

========================
TypoScript configuration
========================

TYPO3 uses **TypoScript** as a specific *language* to configure a website.
TypoScript is a very powerful tool in the TYPO3 universe, because it allows
integrators to configure and manipulate almost every aspect of the system and
customize a TYPO3 instance to very specific needs of their customers. It is
important to highlight, that TypoScript is not a programming language, so you
do not need to be a software developer to fine tune TYPO3. However, due to the
complexity of TYPO3 and its configuration options, quite comprehensive
documentation about TypoScript exists, which can be overwhelming sometimes.

As part of this tutorial, we focus on the basics only and how to apply them. A
documentation about TypoScript and all its objects, properties
and functions can be found in the :doc:`TypoScript Reference <t3tsref:Index>`.

.. _files-and-directories:

Files and directories
=====================

First of all, we create two new files in the site package directory structure,
which will contain all TypoScript configurations. By following the official
conventions of their file and directory naming, TYPO3 knows how to include them
automatically.

.. code-block:: none

   site_package/
   site_package/Configuration/
   site_package/Configuration/TypoScript/
   site_package/Configuration/TypoScript/Setup/
   site_package/Configuration/TypoScript/constants.typoscript
   site_package/Configuration/TypoScript/setup.typoscript
   site_package/Resources/
   site_package/Resources/...

As shown above, these two files are :file:`constants.typoscript` and
:file:`setup.typoscript` inside the :file:`Configuration/TypoScript/` folder.
The Fluid template files we have created in the previous step are located in
the :file:`Resources/` directory, but not listed above for clarity reasons.


.. _file-constants-typoscript:

TypoScript constants
--------------------

TypoScript constants are used to set values that can be used in the TypoScript
setup through out the project.

.. note::
   TypoScript constants are only interpreted as such, when they are added to
   the correct location. They need to be added to the file
   :file:`constants.typoscript` or a file or path included from this file.

It is best practise to use them for values that might
want to be changed later on like paths, ids of important pages (contact,
imprint, a system folder that contains certain records, ...).

You could for example define the title of your page in a TypoScript constant:

.. code-block:: typoscript
   :caption: EXT:site_package/Configuration/TypoScript/constants.typoscript

   mysitepackage.page.title = My cool project

And later on use it somewhere in your TypoScript setup to output it on your page:

.. code-block:: typoscript
   :caption: EXT:site_package/Configuration/TypoScript/setup.typoscript

   lib.footer = TEXT
   lib.footer.value = {$mysitepackage.page.title}
   lib.footer.wrap = <footer> &copy | </footer>

Add the following lines to file :file:`constants.typoscript`:

.. include:: /CodeSnippets/TypoScript/Constants.rst.txt

Line 1 includes the default constants from the system extension
:code:`fluid_styled_content` (which is part of the TYPO3 Core).

The following lines define some constants with paths to the template directories
that we defined in the previous chapter.

The part :typoscript:`EXT:` of the paths will be automatically replaced by the
path to your extensions location, usually something like :file:`/typo3conf/ext/`.

You can read more about :ref:`TypoScript constants in the TypoScript reference
<t3tsref:typoscript-syntax-constants>`.



.. _file-setup-typoscript:

TypoScript setup
----------------

The :file:`setup.typoscript` will only contain imports in our example. It is
considered best practice to split up large TypoScript files into logical parts.
This improves maintainability and collaboration. In the example below we split
up the TypoScript setup file into sections by didactic reasons.

.. include:: /CodeSnippets/TypoScript/Setup.rst.txt

Line 1 imports the default setup
from the system extension :code:`fluid_styled_content` (which is part of the
TYPO3 Core).

Line 2 imports all files ending on :file:`.typoscript` from the specified
folder. It does however not import files from sub folders. Those would have to
be imported separately.

Hello World: The PAGE object
~~~~~~~~~~~~~~~~~~~~~~~~~~~~

In order to create any output at all we first need to define a
:typoscript:`PAGE`. The example below would output an empty page:

.. include:: /CodeSnippets/TypoScript/Page.rst.txt

If you remove the comments :typoscript:`//` before line 4 and 5 there would be
an output of "Hello World!".

You can read more about :ref:`the top-level PAGE object in the TypoScript
reference <t3tsref:page>`.

The parameter :typoscript:`typeNum` is mandatory. Setting it to :typoscript:`0`
enables the page to be called. If you would set it to any value above there
the page would need to be called with an additional parameter like `&type=12345`
to the url.


.. _typoscript-configuration-page-view-section:

Part 1: PAGEVIEW template section
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

First, create a file called :file:`Part1PageviewSection.typoscript` in the
folder :file:`Configuration/TypoScript/Setup/` with the following content:

.. include:: /CodeSnippets/TypoScript/Part1PageviewSection.rst.txt

Line 1 is a comment. All lines starting with :typoscript:`//` or :typoscript:`#`
will be ignored by the parser. In TypoScript it is however not possible to have
a comment after code in a line as you might be used from PHP of Java.

Line 2 configures that the template rendering engine Fluid should be used to
generate the page output. As mentioned in the changelog
:ref:`Feature: #103504 - New ContentObject PAGEVIEW <changelog:feature-103504-1712041725>`
the new ContentObject `PAGEVIEW` replaces the old ContentObject `FLUIDTEMPLATE`.
We recommend to use the new ContentObject `PAGEVIEW`, because it needs less
configurations and therefore reduces the susceptibility to errors. For example
you do not have to define a TypoScript variable :typoscript:`pageUid`, instead
use :html:`{page.uid}` directly in your HTML file to use the current page id
for any use cases. More examples you can find in the changelog mentioned before.

Before with the `FLUIDTEMPLATE`, one had to define which page layout and backend
layout should be rendered in the frontend. Now this is done automatically. All
files located in the given paths :typoscript:`page.10.paths` will be used as
default templates. In our case this is :file:`Default` and :file:`TwoColumns`.
Check our repository `https://github.com/TYPO3-Documentation/TYPO3CMS-Tutorial-SitePackage-Code/tree/main`__
to review this statement by your own. The paths for the templates are provided
in line 5 ff and define the paths where the templates can be find. In line 6
we added the TypoScript constant defining the same path. It serves as an example
on how one would add a TypoScript constant from file :file:`constants.typoscript`
to the :typoscript:`page.10.paths` paths. Remember the highest number will used
in first place. When the parser does not find a fitting template it jumps to the
next lower number.

Template files can be placed in the
:file:`EXT:my_site_package/Resources/Private/Templates/Pages/` and
:file:`EXT:my_site_package/Resources/Private/Templates/`. The
:ref:`directory and file structure <t3sitepackage:ec-directory-structure>` can
be checked here. If you write a typo into your :file:`Default.html` filename,
for example :file:`default.html` you get the following error in the frontend:

.. code-block:: plaintext
    :caption: Frontend Output

    503
    # Oops, an error occurred!
    Could not find template source for "pages/default". Configured templateRootPaths: /var/www/html/vendor/my-vendor/my-site-package/Resources/Private/Templates/
    More information regarding this error might be available online](https://typo3.org/go/exception/CMS/1711797936).
    Request: 1d0a22b6a400e

The reason for this error is that the system expects a file named :file:`Default.html`
(with captial D) within :file:`EXT:my_site_package/Resources/Private/Templates/Pages/` or
:file:`EXT:my_site_package/Resources/Private/Templates/`.


Part 2 and 3: CSS and JavaScript file inclusion
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

We have combined part 2 and 3, because the inclusion of CSS and JavaScript
files in TypoScript is pretty straight forward. Create a file called
:file:`Part2CssFileInclusion.typoscript` in the
folder :file:`Configuration/TypoScript/Setup/` with the following content:

.. include:: /CodeSnippets/TypoScript/Part2CssFileInclusion.rst.txt

Section :typoscript:`includeCSS { ... }` instructs TYPO3 to include the CSS from the
Bootstrap library from an external source. It also includes file
:file:`website.css` from the site package extension. We have copied this file
into the appropriate folder before.

Section :typoscript:`includeJSFooter { ... }` includes four JavaScript files in total.
The first three are externally hosted files (jQuery, Popper and Bootstrap).
Therefore, :typoscript:`.external = 1` forces TYPO3, not to check for their local
existence. The fourth JavaScript file is the file we added before to the site
package extension itself.

You can also include CSS or JavaScript per-component in your Fluid template or
by PHP. See :ref:`t3coreapi:assets`.


Part 4: Global site configuration
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

It is possible to configure multiple options globally in the section Typoscript
object :typoscript:`config`. None of them is necessary to make the example here
run. So we just included two configuration values as an example.
Read more about them here: :ref:`TypoScript Reference <t3tsref:config>`.

.. include:: /CodeSnippets/TypoScript/Part4GlobalConfiguration.rst.txt

This is all required for the "TypoScript Configuration" part at this point. The
next step deals with the extension configuration and adds a couple of PHP
files, so let's move on.
