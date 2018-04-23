.. include:: ../Includes.txt


.. introduction:

Introduction
------------


.. _site-package-benefits:

Site Package Benefits
^^^^^^^^^^^^^^^^^^^^^

The development of a website can be approached in several ways. Standard
websites usually consist of HTML documents, which contain texts and have image
files, video files, styles, etc. referenced. The enterprise content management
system TYPO3 features a clean separation between design, content and
functionality of a website and allows developers/integrators to add simple as
well as sophisticated functions to the system easily.

Encapsulation
~~~~~~~~~~~~~

Using extensions are a powerful way to get the most out of TYPO3. Extensions
can be installed, deinstalled, replaced, etc. and extend the core system with
functions and features not shipped with the core system. An extension typically
consists of PHP files, but can also (or only) contain design templates (HTML,
CSS, JavaScript files, etc.) and global configuration. The visual appearance of
a website does not require any PHP code necessarily. However, the site package
extension described in this tutorial contains exactly two PHP files (plus a
handful of HTML/CSS and configuration files) to work as an *extension* in
TYPO3. The PHP code can be copied from this tutorial if the reader does not
have any programming knowledge as such.

Version Control
~~~~~~~~~~~~~~~

By building the site package as an extension, all relevant files are stored at
a central point and changes can easily be tracked in a version control system
such as Git. Despite the fact that TYPO3 supports several methods of
implementing websites, this approach is a very flexible and professional way.
At the same time the process is not overly complicated.

Dependency Management
~~~~~~~~~~~~~~~~~~~~~

Another important benefit or a TYPO3 extension is the fact that dependencies to
other extensions and/or the TYPO3 version can be defined. This makes
deployments easier and more fail-safe. This feature is called "Dependency
Management". Most TYPO3 sites require a number of extensions. This could be
"News", "Powermail" or "RealURL" for example. By building a site package
extension, which may contain global configuration for these add-ons, the
dependencies can be defined. When the site package extension is installed in an
empty TYPO3 instance, all dependent extensions are downloaded from the `TYPO3
Extension Repository <https://extensions.typo3.org>`_ and installed
automatically.

Clean Separation from the Userspace
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

Without using an extension, template files are often stored in the
`fileadmin/` directory of a TYPO3 instance. As a matter of fact, files in
this directory are indexed by TYPO3's File Abstraction Layer (FAL). This
results in irrelevant and avoidable records in the database. From a logical
perspective, the `fileadmin/` area is the "userspace". This area is meant to
belong to editors. Even if access permissions restrict editors from accessing
or manipulating files in `fileadmin/`, site configuration components should
not be stored in the userspace by all means.

Security
~~~~~~~~

Files in `fileadmin/` are typically meant to be publicly accessible per
convention. To avoid a so-called information disclosure vulnerability (see the
:ref:`TYPO3 Security Guide <t3security:start>` for further details),
configuration files should not be exposed to the public.

Deployment
~~~~~~~~~~

Modern versions of TYPO3 CMS follow the *convention over configuration*
paradigm. As a consequence, if files and directories of the site package
extension use a specific naming convention, they are loaded automatically as
soon as the extension is installed/activated in the system. This leads to
another important advantage of the site package extension. The extension can be
deployed easily by using the Extension Manager and/or the PHP composer method.
This also enables system administrators to automate the deployment for example.

Distributable
~~~~~~~~~~~~~

In virtue of the motto "TYPO3 inspires people to share!", the site package
extension can also be shared with the community via the official `TYPO3
Extension Repository <https://extensions.typo3.org>`_ and/or in a publicly
accessible version control system such as `GitHub <https://github.com>`_.

Last, but not least, configuration implemented in the site package can be
overwritten in the TypoScript setup and constants as required.


.. _prerequisites:

Prerequisites
^^^^^^^^^^^^^

This TYPO3 tutorial assumes that the reader has some basic knowledge in the
following areas:

* HTML, CSS and JavaScript
* SSH/FTP (copy files and directories to and from the server)

It is also recommended that the reader has worked with TYPO3 before, knows what
the *frontend*, *backend* and *Extension Manager* is and how to access the
*Install Tool*. Missing knowledge can be acquired by working through the TYPO3
documentation, for example the :ref:`Getting Started Tutorial <t3start:start>`.

Due to the fact that the site package discussed in the next chapters implements
a new, fresh, clean website skin from scratch, an empty TYPO3 instance is a
prerequisite, too. This means, we assume we have a TYPO3 site without any
pages, any design templates, any configuration, etc. However, a valid TYPO3
backend user with administrator privileges is required and SSH/FTP access to
the server is recommended.
