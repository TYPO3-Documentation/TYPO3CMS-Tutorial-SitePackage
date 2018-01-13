.. include:: ../Includes.txt


.. page-creation-and-main-menu:

Page Creation and Main Menu
---------------------------

bla bla bla...


.. typo3-backend-create-sub-pages:

Create Sub-Pages in the TYPO3 Backend
^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^

Page tree...

::

    NEW TYPO3 site
      example.com
        Page 1
        Page 2
        ...


.. typo3script-add-menu-processor:

Add MenuProcessor
^^^^^^^^^^^^^^^^^

Open file ``setup.typoscript`` and add the section `dataProcessing{...}` as follows.

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


.. fluid-implement-main-menu:

Update Fluid and Implement Main Menu
^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^

::

    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
      <a class="navbar-brand" href="/">Navbar</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
        aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <f:for each="{mainnavigation}" as="mainnavigationItem">
            <li class="nav-item {f:if(condition: mainnavigationItem.active, then:'active')}">
              <a class="nav-link" href="{mainnavigationItem.link}" target="{mainnavigationItem.target}" title="{mainnavigationItem.title}">
                {mainnavigationItem.title}
              </a>
            </li>
          </f:for>
        </ul>
      </div>
    </nav>
