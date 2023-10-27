.. include:: /Includes.rst.txt


.. _introduction:

============
Introduction
============


.. _site-package-benefits:

Sitepackage Benefits
====================

Developing a website can be approached in different ways. Standard
websites usually consist of HTML documents which contain text and reference
image files, video files, styles, etc. Because it is an enterprise content
management system, TYPO3 features a clean separation between design, content and
functionality and allows developers/integrators to add simple or
sophisticated functionality easily.

Encapsulation
-------------
Using extensions is a powerful way to get the most out of TYPO3. Extensions
can be installed, uninstalled and replaced. They can extend the core TYPO3
system with further functions and features. An extension typically
consists of PHP files, and can also contain design templates (HTML,
CSS, JavaScript files, etc.) and global configuration variables. The visual
appearance of a website does not necessarily require any PHP code. However, the
sitepackage extension described in this tutorial contains exactly two PHP files
(plus a handful of HTML/CSS and configuration files) and is an *extension* to
TYPO3. The PHP code can be copied from this tutorial if the reader does not
have any programming knowledge.

Version Control
---------------
In building the sitepackage as an extension, all relevant files are stored in
one place and changes can easily be tracked in a version control system
such as Git. The site package approach is not the only way of creating TYPO3
websites but it is flexible and professional and not overly complicated.

Dependency Management
---------------------
TYPO3 extensions allow dependencies to other extensions and/or the TYPO3 version
to be defined. This is called "Dependency Management" and makes deployment easy
and fail-safe. Most TYPO3 sites are dependent on a number of extensions. Some
examples are "News" or "Powermail". A sitepackage extension which contains
global configuration variables for these extensions will define the dependencies
for you. When the sitepackage extension is installed in an
empty TYPO3 instance, all dependent extensions are automatically downloaded from
the `TYPO3 Extension Repository <https://extensions.typo3.org>`__ and installed.

Clean Separation from the Userspace
-----------------------------------
In a TYPO3 installation that doesn't use extensions, template files are often
stored in the :file:`fileadmin/` directory. Files in
this directory are indexed by TYPO3's File Abstraction Layer (FAL) resulting in
possibly irrelevant records in the database. To avoid this the :file:`fileadmin/`
area should be seen as a "userspace" which is only available for editors to
use. Even if access permissions restrict editors from accessing or manipulating
files in :file:`fileadmin/`, site configuration components should
still not be stored in the userspace.

Security
--------
Files in :file:`fileadmin/` are typically meant to be publicly accessible by
convention. To avoid disclosing sensitive system information (see the
:ref:`TYPO3 Security Guide <t3coreapi:security>` for further details),
configuration files should not be stored in :file:`fileadmin/`.

Deployment
----------
The TYPO3 CMS follows the *convention over configuration*
paradigm. If files and directories in the sitepackage
extension use the naming convention, they are loaded automatically as
soon as the extension is installed/activated. This means the
extension can be easily deployed using the Extension Manager and/or PHP composer.
Deployment can be automated by system administrators.

Distributable
-------------
By virtue of the motto "TYPO3 inspires people to share!", the sitepackage
extension can be shared with the community via the official `TYPO3
Extension Repository <https://extensions.typo3.org>`__ and/or in a publicly
accessible version control system such as `GitHub <https://github.com>`__.

Last, but not least, configuration settings in the sitepackage can
be overwritten using TypoScript setup and constants.


.. _prerequisites:

Prerequisites
=============

This TYPO3 tutorial assumes that the reader has some basic knowledge in the
following areas:

* HTML, CSS and JavaScript
* SSH/FTP (copy files and directories to and from the server)

It is also recommended that the reader has worked with TYPO3 before, knows what
the *frontend*, *backend* and *Extension Manager* are and how to access the
*Install Tool*. Missing knowledge can be acquired by working through the TYPO3
documentation, for example the :doc:`Getting Started Tutorial <t3start:Index>`.

The sitepackage in this tutorial will build a new, clean website from scratch,
so it is assumed you have an empty TYPO3 instance with no pages, design
templates, configuration, etc. You will need a valid TYPO3 backend user login with
administrator privileges and SSH/FTP access to the server is recommended.
