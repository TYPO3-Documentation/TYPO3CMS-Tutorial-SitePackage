.. include:: ../Includes.txt


.. page-creation-and-main-menu:

Page Creation and Main Menu
---------------------------

bla bla bla...


.. typo3-backend-create-sub-pages:

TYPO3 Backend: Create Sub-Pages
^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^

Page tree...

::

    NEW TYPO3 site
      example.com
        Page 1
        Page 2
        ...


.. typo3script-add-menu-processor:

Add Menu Processor
^^^^^^^^^^^^^^^^^^

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


