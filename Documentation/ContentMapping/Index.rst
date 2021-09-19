.. include:: ../Includes.txt


.. _content-mapping:

===============
Content Mapping
===============

Having a perfect visual appearance of a website is pointless, if the content
entered into the backend is not visible in the frontend. In the last step, we
map some of the backend columns, which hold content elements such as text,
images, etc. to areas in the frontend. This can be achieved easily by using
custom TypoScript.

See :ref:`Backend layouts <t3coreapi:be-layout>` for more information about setting up various columns and rows.


.. _cm-dynamic-content-rendering-in-typoscript:

Dynamic Content Rendering in TypoScript
=======================================

.. highlight:: typoscript

Create a new directory :file:`Configuration/TypoScript/Helper/` and inside this
directory, a new file called :file:`DynamicContent.typoscript` with the following
content::

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

Once again, describing what exactly this TypoScript does is not part of this
tutorial. The only fact that is important is, that the variable
`lib.dynamicContent` contains the content in subject to the column and
language in the backend. More details about the TypoScript can be found in the
:ref:`TypoScript Reference <t3tsref:menu-objects>`.


.. _cm-typo3-backend-create-pages:

Include Dynamic Content Rendering
=================================

To use the TypoScript, it needs to be loaded (*included*), so open file
`Configuration/TypoScript/setup.typoscript` and add line
`@import '...'` as shown here in the second line::

   @import 'EXT:fluid_styled_content/Configuration/TypoScript/setup.typoscript'
   @import 'EXT:site_package/Configuration/TypoScript/Helper/DynamicContent.typoscript'

   page = PAGE
   page {
      // ...
   }

   config {
      // ...
   }


.. _cm-fluid-typoscript-mapping:

Typoscript Mapping in Fluid Template
====================================

.. highlight:: html

Open file :file:`Resources/Private/Templates/Page/Default.html` and locate the
three columns. They all show a "Headline" (look for the :code:`<h2>`-tags) and some
dummy content (look for the :code:`<p>`-tags).

Simply replace these lines with the cObject-ViewHelper (`<f:cObject ... >`),
so that file :file:`Default.html` shows the following HTML code. Make sure, you
specify the column positions correctly (:code:`1`, :code:`0` and :code:`2`) and
in exactly this order::

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


.. _cm-typo3-backend-add-content:

Add content in the TYPO3 backend
================================

Now it's a great time to add some content in the backend. Go to
:guilabel:`Web > Page` and select any of the pages you created before,
(for example "Page 1"). Click the :guilabel:`+ Content` button
in the column labelled "*Main*" and choose the "Regular Text
Element" content element.

.. include:: /Images/AutomaticScreenshots/CreateNewContentElement.rst.txt

Enter a headline and some arbitrary text in the Rich Text Editor (RTE)
and save your changes by clicking button :guilabel:`Save` at the top.
You can return to the previous view by clicking :guilabel:`Close`.

.. include:: /Images/AutomaticScreenshots/FillNewContentElement.rst.txt

The new content element appears in the appropriate column. Repeat this process
and enter some further content in the column "Jumbotron".

.. include:: /Images/AutomaticScreenshots/FilledColumns.rst.txt


.. _cm-Preview-page:

Preview page
============

We have made changes to the Fluid templates of the extension above. It is
therefore necessary to :guibuilder:`Flush the content caches` in the Menu in the
top bar before you can preview the page properly:

.. figure::  /Images/ManualScreenshots/ContentMappingPreviewPage.png
   :alt: Preview Page
   :class: with-shadow


Each of the three columns shows the headline and content.

The last section of this tutorial summarises the achievements, discusses some
shortfalls of the extension as it stands now and provides some suggestions what
to do next.
