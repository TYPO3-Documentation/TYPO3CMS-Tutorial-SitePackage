.. include:: ../Includes.txt


.. _design-template:

===============
Design Template
===============

.. _dt-external-resources:

External Resources
==================

A typical use case of developing a standard website includes the implementation
of the visual appearance of the site. In most cases this is a set of HTML and
CSS files, as well as some images, e.g. a company logo, etc. As of today,
modern frameworks build a perfect foundation and provide features such as
clean, structured layouts, mobile responsiveness and compatibility across a
wide range of web browsers.

The project discussed in this tutorial uses the well-known and popular
`Bootstrap framework <https://getbootstrap.com>`_ version 4 and `jQuery
<https://jquery.com>`__ version 3. Both are not mandatory for a sitepackage in
TYPO3 as such and can be replaced with similar frameworks or JavaScript
libraries as required by the individual project.


.. _dt-directory-structure:

Directory Structure
===================

Let's assume, we have the following directories and files, which represent a
typical website theme as we know it from a static website.

.. code-block:: none

    theme/css/
    theme/css/bootstrap.min.css
    theme/css/website.css
    theme/images/
    theme/images/logo.png
    theme/js/
    theme/js/bootstrap.min.js
    theme/js/jquery-3.2.1.min.js
    theme/js/website.js
    theme/index.html

The two CSS and JavaScript files :file:`bootstrap.min.css` and
:file:`bootstrap.min.js` belong to the Bootstrap framework. As a matter of
fact, these files can be ignored (we will include the Bootstrap framework using
TypoScript as shown in section :ref:`file-setup-typoscript`). The CSS file
:file:`website.css` implements the custom styles used for the website. Same as
the JavaScript file :file:`website.js`, which contains custom JavaScript code.
The only file inside the :file:`images/` directory is a simple logo. Let's 
assume this is a square image of 100px width by 100px height.

Another file we can ignore is the jQuery library :file:`jquery-3.2.1.min.js` in
the :file:`js/` directory. Due to the fact that there is a better way to
include external libraries in TYPO3, we do not need to worry about this library
either.

This leaves us with the remaining file :file:`index.html`, which is explained
in more detail in the next section.


.. _dt-file-index-html:

File 'index.html'
=================

A typical HTML document consists of a *header* and a *body* section. These
parts are wrapped by the :html:`<html> ... </html>` tags as shown below.

.. code-block:: html

   <html>
      <head>
         ...
      </head>
      <body>
         ...
      </body>
   </html>

At this point, we only need to focus on the :html:`<body> ... </body>` part.

The next section of this tutorial describes how the design templates are
converted into "Fluid" templates, which can be used by TYPO3 to render the
theme.
