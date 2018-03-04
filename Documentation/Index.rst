.. include:: Includes.txt


.. _start:

=====================
Site Package Tutorial
=====================

:Version:
      8.7

:Language:
      en

:Description:
      The official tutorial how to create a site package in TYPO3 from scratch.

:Keywords:
      forDevelopers, forAdmins

:Copyright:
      2018 TYPO3 Documentation Team

:Author:
      Michael Schams

:Email:
      documentation@typo3.org

:License:
      Open Publication License available from `www.opencontent.org/openpub/ <http://www.opencontent.org/openpub/>`_

:Rendered:
      |today|

The content of this document is related to TYPO3 CMS, a GNU/GPL CMS/Framework available from `typo3.org <https://typo3.org>`_ .


**Official Documentation**

This document is included as part of the official TYPO3 documentation. It has been approved by the TYPO3 Documentation Team following a peer-review process. The reader should expect the information in this document to be accurate - please report discrepancies to the Documentation Team (documentation@typo3.org). Official documents are kept up-to-date to the best of the Documentation Team's abilities.


**Tutorial**

This document is a Tutorial. Tutorials are designed to be step-by-step instructions specifically created to walk a beginner through a particular task from beginning to end. To facilitate effective learning, Tutorials provide examples to illustrate the subjects they cover. In addition, Tutorials provide guidance on how to avoid common pitfalls and highlight key concepts that should be remembered for future reference.


Summary
=======

This tutorial describes the steps required to turn a basic design template (HTML, CSS, JavaScript files, etc.) into a fully working, mobile-responsive website powered by TYPO3. By using a so-called *extension* (which is called the "Site Package" extension), all relevant files are stored at a central point and changes can easily be tracked in a version control system such as Git.

Despite the fact that TYPO3 supports several methods of implementing websites, this approach is a very flexible and professional way. At the same time, the process is not overly complicated and does not require any programming knowledge.


Table of Contents
=================

.. toctree::
   :maxdepth: 2
   :titlesonly:
   :glob:

   Preface/Index
   Introduction/Index
   DesignTemplate/Index
   FluidTemplates/Index
   TypoScriptConfiguration/Index
   ExtensionConfiguration/Index
   ExtensionInstallation/Index
   MainMenuCreation/Index
   ContentMapping/Index
   Summary/Index
   Targets
