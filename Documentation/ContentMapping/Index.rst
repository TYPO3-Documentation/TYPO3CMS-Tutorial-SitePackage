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
content area. Meanwhile some subpages will additionally need a sidebar
to be displayed to the right of the main content.


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

When you make changes to the files of an extension it is usually necessary
to flush all caches by hitting the button.

.. include:: /Images/AutomaticScreenshots/FlushAllCaches.rst.txt

After flushing the all caches the new backend layout is available in the page
properties at :guilabel:` Appearance >  Page Layout > Backend Layout`.

.. include:: /Images/AutomaticScreenshots/ChooseBackendLayout.rst.txt

Switch to the new backend layout and save the page properties. In the
:guilabel:`Page` module you will see two columns called "Jumbotron" and
"Main Content" now.

.. include:: /Images/AutomaticScreenshots/CreateNewContentElement.rst.txt

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

Just like with the menu, the content can also be displayed by using
a data processor, the :php:`DatabaseQueryProcessor`.

Define the data processor in :typoscript:`page.10.dataProcessing` beside the
data processors of the menu::

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
       }
     }
   }

In the Fluid template there will be a variable called "mainContent" available,
containing an array of all contents of this column on the current page.

We need one data processor for each column so lets add the other two::

   page {
     10 {
       dataProcessing {
         //10 = TYPO3\CMS\Frontend\DataProcessing\MenuProcessor
         //20 = TYPO3\CMS\Frontend\DataProcessing\DatabaseQueryProcessor
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

.. _cm-fluid-typoscript-mapping:

TypoScript mapping in Fluid template
====================================

.. highlight:: html

Open the file :file:`Resources/Private/Templates/Page/Default.html` and locate the
main content area. It contains a headline (look for the :code:`<h2>`-tags) and
some dummy content (look for the :code:`<p>`-tags).

Simply replace these lines with the cObject-ViewHelper (`<f:cObject ... >`),
so that file :file:`Default.html` shows the following HTML code.

.. code-block:: html

   <f:layout name="Default" />
   <f:section name="Main">

     <main role="main">

       <f:render partial="Jumbotron" arguments="{jumbotronContent: jumbotronContent}"/>

       <div class="container">
         <div class="row">
           <div class="col-md-12">
               <f:for each="{mainContent}" as="contentElement">
                   <f:cObject
                       typoscriptObjectPath="tt_content.{contentElement.data.CType}"
                       data="{contentElement.data}"
                       table="tt_content"
                   />
               </f:for>
           </div>
         </div>
       </div>

     </main>

   </f:section>

The TypoScript object :typoscript:`tt_content.[CType]` comes from the TypoScript
of the system extension :file:`fluid_styled_content`. It internally uses
Fluid templates and TypoScript with data processors just like the ones we were
defining above. If you desire to change the output of these content elements
you could override the Fluid templates of the extension
:file:`fluid_styled_content`.

Edit the file :file:`TwoColumns.html` in the same directory. Exchange the
main content area just as we have done before with the default template. Now
replace the content area of the sidebar with the content elements in the Fluid
variable :html:`{sidebarContent}`.

You can compare your result to the example in our site extension:
`TwoColumns.html <https://github.com/TYPO3-Documentation/TYPO3CMS-Tutorial-SitePackage-Code/blob/main/Resources/Private/Templates/Page/TwoColumns.html>`_.

The jumbotron: Customize output of content elements
===================================================

As you can see in the static html template, the jumbotron consist of a headline
and a text:

.. code-block:: html

   <div class="jumbotron">
       <div class="container">
           <h1 class="display-3">Hello, world!</h1>
           <p> ... </p>
       </div>
   </div>

We could use a content element of type :guilabel:`Text` to store the needed
information. However the output of the Standard content element "Text" look
like this:

.. code-block:: html

   <div id="c215" class="frame frame-default frame-type-text frame-layout-0">
      <header>
         <h2 class="">
            Hello World!
         </h2>
      </header>
      <p>Lorem ipsum dolor sit amet, ...</p>
   </div>

Also we do not want to output other types of content like images or forms.

Open the partial displaying the jumbotron:
:file:`Resources/Private/Partials/Page/Jumbotron.html`. We already have the
data of content elements in the column "jumbotron" in a Fluid variable called
"jumbotronContent".

Now instead of letting extension :file:`fluid_styled_content` render the
content we will render it ourselves in this partial. Add the debug view helper
to the partial to see what the data of the jumbotronContent looks like:

.. code-block:: html

   <div class="jumbotron">
      <f:debug>{jumbotronContent}</f:debug>
      <!-- ... -->
   </div>

As you can see the data of the actually :sql:`tt_content` record can be found in
:typoscript:`data`. Now let us traverse the array and output the content
elements:

.. code-block:: html

   <div class="jumbotron">
       <f:for each="{jumbotronContent}" as="contentElement">
           <div class="container">
               <h1 class="display-3">{contentElement.data.header}</h1>
               <f:format.html>{contentElement.data.bodytext}</f:format.html>
           </div>
       </f:for>
   </div>


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
and enter some further content in the column "Jumbotron". The page module should
now look like this:

.. include:: /Images/AutomaticScreenshots/ContentMappingPreviewPage.rst.txt

.. _cm-Preview-page:

Preview page
============

We have made changes to the Fluid templates of the extension above. It is
therefore necessary to :guilabel:`Flush the content caches` in the Menu in the
top bar before you can preview the page properly:

.. include:: /Images/AutomaticScreenshots/FlushFrontendCaches.rst.txt

You can now preview your page:

.. include:: /Images/AutomaticScreenshots/ContentMappingPreviewPage.rst.txt



.. _cm-switch_backend_layout:

Switch to the two column layout with a sidebar
==============================================

You can switch the used page backend layout in the page properties at
:guilabel:` Appearance >  Page Layout > Backend Layout`. Edit the page
properties of your page to use the backend layout "Two Columns".

.. include:: /Images/AutomaticScreenshots/SwitchBackendLayout.rst.txt

After saving you will see that the content of the columns "main" and
"jumbotron" remains unchanged while there is a third column "sidebar".
This is due to the fact that the backend layout "Default" and "TwoColumns"
use the same colPos number for these columns.

.. include:: /Images/AutomaticScreenshots/BackendLayoutTwoColumns.rst.txt

Enter some content to the sidebar. You could for example use the content element
"Menu of subpages" to display a menu in the sidebar.

Preview the page once more. A sidebar will appear in the frontend:

.. include:: /Images/AutomaticScreenshots/TwoColumnsPreviewPage.rst.txt

Next steps
==========

The last section of this tutorial summarises the achievements, discusses some
shortfalls of the extension as it stands now and provides some suggestions what
to do next.
