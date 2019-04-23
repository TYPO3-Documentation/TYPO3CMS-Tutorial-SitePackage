.. include:: Includes.txt
.. highlight:: ini

===========
Linktargets
===========

.. _linktargets-explanation:

Explanation
===========

:code:`t3sitepackage` is the usual alias for :code:`https://docs.typo3.org/typo3cms/SitePackageTutorial`
when creating :ref:`cross-references <h2document:intersphinx>` (links) to this manual.


*Examples:*

#. Link to the start page of this manual from another manual

   .. code-block:: rest

      :ref:`Sitepackage Tutorial <t3sitepackage:start>`

   or (without changing anchor text)

   .. code-block:: rest

      :ref:`t3sitepackage:start`


#. Link to the section "Quick Introduction to Fluid" (`quick-introduction-to-fluid`)
   from another manual:

   .. code-block:: rest

      :ref:`t3sitepackage:quick-introduction-to-fluid`


#. Link to section "Quick Introduction to Fluid " (`quick-introduction-to-fluid`)
   from this manual


   .. code-block:: rest

      :ref:`quick-introduction-to-fluid`


Have the following lines in your :file:`Documentation/Settings.cfg` file to set the alias::
   
   [intersphinx_mapping]
   
   t3sitepackage = https://docs.typo3.org/typo3cms/SitePackageTutorial



Targets For Cross-Referencing
=============================

This is a list of all link targets in this manual.

.. ref-targets-list::

