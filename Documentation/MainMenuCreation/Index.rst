.. include:: ../Includes.txt


.. main-menu-creation:

Main Menu Creation
------------------

The following section explains how to implement a simple one-level menu by using TYPO3's Frontend Data Processor ``MenuProcessor``. Other options are available (e.g. the ``HMENU cObject`` as described in the :ref:`TypoScript Reference <t3tsref:menu-objects>`).


.. add-menu-processor:

Add MenuProcessor
^^^^^^^^^^^^^^^^^

Open file ``Configuration/TypoScript/setup.typoscript`` and locate the part which defines the ``FLUIDTEMPLATE``. Add the ``dataProcessing { ... }`` section below the paths declarations as follows.

::

    // Part 1: Fluid template section
    10 = FLUIDTEMPLATE
    10 {
        ...
      }
      templateRootPaths {
        ...
      }
      partialRootPaths {
        ...
      }
      layoutRootPaths {
        ...
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

Note the directive ``as = mainnavigation``: this defines the name of the menu (here: ``mainnavigation``), which will be used in the next step.


.. fluid-implement-main-menu:

Update Fluid and Implement Main Menu
^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^

To make the output of the ``MenuProcessor`` visible at the frontend, we have to adjust the Fluid template slightly. You possibly remember, that we moved the main menu to the Fluid layout file, which is located under ``Resources/Private/Layouts/Default.html`` (see section :ref:`the-website-layout-file`). Open this file and adjust it as shown below.


::

    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
        aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <f:for each="{mainnavigation}" as="mainnavigationItem">
            <li class="nav-item {f:if(condition: mainnavigationItem.active, then: 'active')}">
              <a class="nav-link" href="{mainnavigationItem.link}" target="{mainnavigationItem.target}" title="{mainnavigationItem.title}">
                {mainnavigationItem.title}
              </a>
            </li>
          </f:for>
        </ul>
      </div>
    </nav>

    <f:render section="Main" />

The changes are inside the ``<ul> ... </ul>`` tags. The new code extends the list by a so-called "For-ViewHelper", which builds a typical loop and iterates the variable ``{mainnavigation}``as single items named ``{mainnavigationItem}``. Each item represents one link to a page in the menu. The attributes we are using are ``{mainnavigationItem.link}`` (the actual link to the page or external resource), ``{mainnavigationItem.target}`` (if the link should be opened in a new window for example) and ``{mainnavigationItem.title}`` (the page or link title).

The construct ``{f:if(condition: mainnavigationItem.active, then: 'active')}`` is a special case: this is a so-called *inline notation*, that outputs the word ``active``, if variable ``mainnavigationItem.active`` is set. In this example, the inline notation is used to output ``active`` as the CSS class name.


Preview Page
^^^^^^^^^^^^

When previewing the site as it stande now, we can verify if everything is working as expected and if the menu is generated. Go to **WEB → View** and check, if the menu reflects the pages you created in the backend. Add one or two further pages to the page tree and check, if they appear in the preview.

.. @TODO screenshot

If everything is working as expected, let's configure the dynamic content rendering as the next step.
