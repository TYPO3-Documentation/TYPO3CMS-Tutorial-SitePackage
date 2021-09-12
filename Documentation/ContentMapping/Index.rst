.. include:: ../Includes.txt

.. _content-mapping:

===============
Content mapping
===============

Having a perfect visual appearance of a website is pointless, if the content
entered into the backend is not visible in the frontend. In the last step, we
create a backend layout with several rows and columns, which hold content
elements such as text, images, etc. to be displayed in areas in the frontend.

The backend layouts can be defined as database records or a TsConfig
configuration. We use page TsConfig as it can be kept in the site-package and
under version control.

The output of content into the front end is defined via TypoScript.

See :ref:`Backend layouts <t3coreapi:be-layout>` for more information about setting up various columns and rows.


Define the backend layouts
==========================

Many websites nowadays require different layouts for different types of pages.

We define two distinct backend layouts here to demonstrate using multiple
backend (and frontend) page layouts.

We assume by default pages consists of the menu, a jumbotron and the main
content area. Meanwhile some subpages will additionally have need sidebar
displayed to the right of the main content.

Create a new directory :file:`Configuration/TypoScript/Helper/`

.. _cm-dynamic-content-rendering-in-typoscript:

Dynamic Content Rendering in TypoScript
=======================================

.. highlight:: typoscript

Create a new directory :file:`Configuration/TsConfig/Page/` and inside this
directory, a new file called :file:`Page.tsconfig` with the following
content::

   @import 'EXT:site_package/Configuration/TsConfig/Page/PageLayout/*.tsconfig'

This file imports all files ending on `.tsconfig` from the specified folder.
The file :file:`Page.tsconfig` could for example handle other page TsConfig
configurations or their imports.

Then create a file
:file:`Configuration/TsConfig/Page/PageLayout/Default.tsconfig` with the
following content::

   mod.web_layout.BackendLayouts {
       Default {
           title = Default Layout
           config {
               backend_layout {
                   colCount = 1
                   rowCount = 2
                   rows {
                       1 {
                           columns {
                               1 {
                                   name = Jumbotron
                                   colPos = 1
                               }
                           }
                       }
                       2 {
                           columns {
                               1 {
                                   name = Main Content
                                   colPos = 0
                               }
                           }
                       }
                   }
               }
           }
       }
   }

After clearing the all caches the new backend layout is available in the page
properties at :guilabel:` Appearance >  Page Layout > Backend Layout`.

.. todo: screenshot of backend layout in page properties

Switch to the new backend layout and save the page properties. In the
:guilabel:`Page` module you will see two columns called "Jumbotron" and
"Main Content" now.

.. todo: screenshot of backend layout in page module

Insert some example content into the two rows. In the database each content
element (stored in the table :sql:`tt_content`) has the value defined in
`colPos` stored in a field of corresponding name. The numbers of the columns
are arbitary. It is best practise, however to store the main content in colPos
0 and to use the same column numbers for the same positions throughout all
backend layouts of a site. This facilitates switching between different
layouts or looking up content up the page tree.

For the second layout we create a second file at
:file:`Configuration/TsConfig/Page/PageLayout/TwoColumns.tsconfig` with the
following content::

   mod.web_layout.BackendLayouts {
       TwoColumns {
           title = Two Columns
           config {
               backend_layout {
                   colCount = 2
                   rowCount = 2
                   rows {
                       1 {
                           columns {
                               1 {
                                   name = Jumbotron
                                   colspan = 2
                                   colPos = 1
                               }
                           }
                       }
                       2 {
                           columns {
                               1 {
                                   name = Main Content
                                   colPos = 0
                               }
                               2 {
                                   name = Sidebar
                                   colPos = 2
                               }
                           }
                       }
                   }
               }
           }
       }
   }

Internally the backend layouts are grids. A row can span multiple columns by
setting a `colspan`. It is also possible for a column to span multiple rows.

See :ref:`Backend layouts <t3coreapi:be-layout>` for more information about
setting up various columns and rows.

.. _cm-typo3-backend-create-pages:

Content rendering via data processing
=====================================

Just like displaying the menu, the content can also be displayed by using
a data processor, the :php:`DatabaseQueryProcessor`.

Define the data processors in :typoscript:`page.10.dataProcessing` beside the
data processors of the menu. We need one data processor for each column
position::

   page {
     10 {
       dataProcessing {
         //10 = TYPO3\CMS\Frontend\DataProcessing\MenuProcessor
         20 = TYPO3\CMS\Frontend\DataProcessing\DatabaseQueryProcessor
         20 {
           table = tt_content
           orderBy = sorting
           where = colPos = 0
           as = mainContent
         }
         30 = TYPO3\CMS\Frontend\DataProcessing\DatabaseQueryProcessor
         30 {
           table = tt_content
           orderBy = sorting
           where = colPos = 1
           as = jumbotronContent
         }
         40 = TYPO3\CMS\Frontend\DataProcessing\DatabaseQueryProcessor
         40 {
           table = tt_content
           orderBy = sorting
           where = colPos = 2
           as = sidebarContent
         }
       }
     }
   }

To keep different configurations separate in the example extension you can finde

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

Add Content in the TYPO3 Backend
================================

Now it's a great time to add some content in the backend. Go to **WEB → Page**
and select any of the pages you created before (e.g. "Page 1"). Click the
"plus" icon in the column labelled "*normal*" and choose the "Regular Text
Element" content element.

.. figure::  /Images/ManualScreenshots/CreateNewContentElement.png
   :alt: Create New Content Element
   :class: with-shadow

Enter a headline (marker 1), some arbitrary text in the Rich Text Editor (RTE)
and save your changes by clicking button "Save and close" at the top (marker 2).

.. figure::  /Images/ManualScreenshots/SaveAndClose.png
   :alt: Save and Close
   :class: with-shadow

The new content element appears in the appropriate column. Repeat this process
and enter some further content in columns "*left*" and "*right*", but leave
column "*border*" empty.

.. figure::  /Images/ManualScreenshots/FillColumnsLeftAndRight.png
   :alt: Further Content Elements in Left and Right Columns
   :class: with-shadow


.. _cm-Preview-page:

Preview Page
============

Finally, clear the frontend cache and preview the page.

.. figure::  /Images/ManualScreenshots/ContentMappingPreviewPage.png
   :alt: Preview Page
   :class: with-shadow


Each of the three columns shows the headline and content.

The last section of this tutorial summarises the achievements, discusses some
shortfalls of the extension as it stands now and provides some suggestions what
to do next.
