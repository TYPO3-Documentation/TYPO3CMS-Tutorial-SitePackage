.. include:: ../Includes.txt


.. _main-menu-creation:

==================
Main Menu Creation
==================

At this point, we have a working *frontend* for our website, but an important part
is missing: there is no easy way to navigate through the pages, which is a
crucial part of any website. The following section explains how to implement
a simple one-level menu by using TYPO3's Frontend Data Processor
`MenuProcessor`. Other options are available (e.g. the :ts:`HMENU cObject` as
described in the :ref:`TypoScript Reference <t3tsref:menu-objects>`).


.. _add-menu-processor:

Add 'MenuProcessor'
===================

Open file :file:`Configuration/TypoScript/setup.typoscript` and locate the part
which defines the :ts:`FLUIDTEMPLATE`. Add the :ts:`dataProcessing { ... }` section
below the paths declarations as follows.

.. code-block:: typoscript

   // Part 1: Fluid template section
   10 = FLUIDTEMPLATE
   10 {
         // ...
      }
      templateRootPaths {
         // ...
      }
      partialRootPaths {
         // ...
      }
      layoutRootPaths {
         // ...
      }
      dataProcessing {
         10 = TYPO3\CMS\Frontend\DataProcessing\MenuProcessor
         10 {
            levels = 1
            includeSpacer = 1
            as = mainnavigation
         }
      }
   }

Note the directive :ts:`as = mainnavigation`: this defines the name of the menu
which will be used in the next step. It is 'mainnavigation' in this case.


.. _fluid-implement-main-menu:

Update Fluid and Implement Main Menu
====================================

To make the output of the :ts:`MenuProcessor` visible at the frontend, we have to
adjust the Fluid template slightly. You may remember that we moved the
main menu to the Fluid layout file, which is located under
:file:`Resources/Private/Layouts/Page/Default.html` (see section
:ref:`the-website-layout-file`). Open this file and adjust it as shown here:

.. code-block:: html

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
            <f:for each="{mainnavigation}" as="mainnavigationItem">
               <li class="nav-item {f:if(condition: mainnavigationItem.active, then: 'active')}">
                  <a class="nav-link"
                     href="{mainnavigationItem.link}"
                     target="{mainnavigationItem.target}"
                     title="{mainnavigationItem.title}"
                     >
                     {mainnavigationItem.title}
                  </a>
               </li>
            </f:for>
         </ul>
      </div>
   </nav>

   <f:render section="Main" />

The changes are inside the :html:`<ul> ... </ul>` tags. The new code extends the
list by using a "For-ViewHelper", which builds a loop and iterates variable
`mainnavigation` as single items named :ts:`mainnavigationItem`. Each item
represents one link to a page in the menu. The attributes we are using are:

* :ts:`mainnavigationItem.link`: the actual link to the page or external
  resource

* :ts:`mainnavigationItem.target`: if the link should be opened in a new window
  for example

* :ts:`mainnavigationItem.title`: the page or link title

The construct :html:`{f:if(condition: mainnavigationItem.active, then: 'active')}`
is a special case. This is called an *inline notation*, that outputs the word
`active`, if variable :ts:`mainnavigationItem.active` is set. In this example,
the inline notation is used to output :html:`active` as the CSS class name.


Preview Page
============

When previewing the site as it stands now, we can verify if everything is
working as expected and if the menu is generated. Go to **WEB → View** and
check, if the menu reflects the pages you created in the backend. Add one or
two additional pages to the page tree and check to see if they appear in the preview. If
the menu does not change, you possibly need to clear the frontend cache (marker
1), then reload the preview (marker 2).

.. figure:: PreviewPage.png
   :alt: Preview Page
   :class: with-shadow

The preview in the screenshot above shows the menu with three page links: "Page
1", "Page 2" and "Page 3". If everything is working as expected, let's
configure the dynamic content rendering in the next step.
