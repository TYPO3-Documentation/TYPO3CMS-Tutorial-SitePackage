.. include:: ../Includes.txt


.. content-mapping:

Content Mapping
---------------

Bla, bla bla...


.. dynamic-content-rendering-in-typoscript:

Dynamic Content Rendering in TypoScript
^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^

Create a new directory ``Configuration/TypoScript/Helper/`` and inside this directory, a new file called ``DynamicContent.typoscript`` with the following content.

::

    lib.dynamicContent = COA
    lib.dynamicContent {
      10 = LOAD_REGISTER
      10 {
        colPos.cObject = TEXT
        colPos.cObject {
          field = colPos
          ifEmpty.cObject = TEXT
          ifEmpty.cObject {
            value.current = 1
            ifEmpty = 0
          }
        }
        pageUid.cObject = TEXT
        pageUid.cObject {
          field = pageUid
          ifEmpty.data = TSFE:id
        }
        contentFromPid.cObject = TEXT
        contentFromPid.cObject {
          data = DB:pages:{register:pageUid}:content_from_pid
          data.insertData = 1
        }
        wrap.cObject = TEXT
        wrap.cObject {
          field = wrap
        }
      }
      20 = CONTENT
      20 {
        table = tt_content
        select {
          includeRecordsWithoutDefaultTranslation = 1
          orderBy = sorting
          where = {#colPos}={register:colPos}
          where.insertData = 1
          pidInList.data = register:pageUid
          pidInList.override.data = register:contentFromPid
        }
        stdWrap {
          dataWrap = {register:wrap}
          required = 1
        }
      }
      30 = RESTORE_REGISTER
    }


.. typo3-backend-create-pages:

Include Dynamic Content Rendering
^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^

Open file ``Configuration/TypoScript/setup.typoscript`` and add line ``<INCLUDE_TYPOSCRIPT: ... >`` as shown below (second line).

::

    <INCLUDE_TYPOSCRIPT: source="FILE:EXT:fluid_styled_content/Configuration/TypoScript/setup.txt">
    <INCLUDE_TYPOSCRIPT: source="FILE:EXT:site_package/Configuration/TypoScript/Helper/DynamicContent.typoscript">

    page = PAGE
    page {
      ...
    }

    config {
      ...
    }


.. fluid-typoscript-mapping:

Typoscript Mapping in Fluid Template
^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^

Open file ``Resources/Private/Templates/Page/Default.html`` and locate the three columns. They all show a "Headline" (look for the ``<h2>``-tags) and some dummy content (look for the ``<p>``-tags).

Simply replace these lines with cObject-ViewHelper (``<f:cObject ... >``), so that file ``Default.html`` show the following HTML code. Make sure, you specify the column positions correctly (`1`, `0` and `2`) and in exactly this order.

::

    <f:layout name="Default" />
    <f:section name="Main">

      <main role="main">

        <f:render partial="Jumbotron" />

        <div class="container">
          <div class="row">
            <div class="col-md-4">
              <f:cObject typoscriptObjectPath="lib.dynamicContent" data="{colPos: '1'}" />
            </div>
            <div class="col-md-4">
              <f:cObject typoscriptObjectPath="lib.dynamicContent" data="{colPos: '0'}" />
            </div>
            <div class="col-md-4">
              <f:cObject typoscriptObjectPath="lib.dynamicContent" data="{colPos: '2'}" />
            </div>
          </div>
        </div>

      </main>

    </f:section>


.. typo3-backend-add-content:

Add Content in the TYPO3 Backend
^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^

WEB → Page → "Page 1"

Add some example content in columns "left", "middle" and "right" (leave column "border" empty).

Clear frontend cache and preview the page.
