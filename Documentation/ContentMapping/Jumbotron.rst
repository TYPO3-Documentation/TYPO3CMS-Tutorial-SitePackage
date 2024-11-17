:navigation-title: Jumbotron
..  include:: /Includes.rst.txt

..  _customize-content-elements:

===================================================
The jumbotron: Customize output of content elements
===================================================

..  contents::

..  _jumbotron-partial:

The jumbotron partial template
==============================

The partial of the jumbotron that we created in step
:ref:`Split up the template into partials <t3sitepackage:partials>` still
contains static content:

..  code-block:: html
    :caption: packages/site_package/Resources/Private/Templates/Partials/Jumbotron.html

    <div class="container">
    <div class="p-5 mb-4 bg-body-tertiary">
        <div class="container-fluid py-5">
            <h1 class="display-5 fw-bold">Custom jumbotron</h1>
            <p class="col-md-8 fs-4">This jumbotron contains a button to demonstrate that JavaScript is working: </p>
            <button class="btn btn-dark btn-lg" role="button" href="#" id="exampleButton">Example button</button>
        </div>
    </div>

..  _jumbotron-content-records:

Jumbotron content records
=========================

In our Fluid template the variable the variable `{content.jumbotron.records}`
already contains the content of the content elements entered in columns
`jumbotron` in the TYPO3 backend. This column was defined in the
:ref:`Page layout <t3sitepackage:content-mapping-backend-layout>`. It is provided
by the :ref:`page-content data processor <t3sitepackage:page-content-data-processor>`.

Open the partial displaying the jumbotron:
:file:`Resources/Private/Partials/Page/Jumbotron.html`. Using the
:ref:`Debug ViewHelper <f:debug> <t3viewhelper:typo3-fluid-debug>` have a look
at what kind of data is passed to your partial template:

..  code-block:: html
    :caption: EXT:site_package/Resources/Private/Partials/Page/Jumbotron.html

    <f:debug>{content.jumbotron.records}</f:debug>
    <div class="jumbotron">
        <!-- ... -->
    </div>

..  _jumbotron-customized-rendering:

Customized rendering of the content records
===========================================

The variable will contain an array of :php:`\TYPO3\CMS\Core\Domain\Record`
elements. If the array is empty. Check that your page indeed has content in
the column "Jumbotron".

You could render these content elements the way that we rendered the main content
(compare :ref:`Extract the content element rendering to a
partial <t3sitepackage:content-element-partial>`). However our expected HTML
output is different from what fluid-styled-content produces out-of-the-box.

Instead of letting the system extension fluid-styled-content render the
content we will render it ourselves in this partial.

We traverse the array provided by the page-content data processor and render
the content ourselves:

..  include:: /CodeSnippets/Fluid/PartialJumbotron.rst.txt

The :ref:`For ViewHelper <f:for> <t3viewhelper:typo3fluid-fluid-for>` loops
through all content elements in column jumbotron and provides them in variable
`{record}`.

The :php-short:`\TYPO3\CMS\Core\Domain\Record` object contains the information
of the database row representing the current content element record.
For advanced usage see :ref:`Use records in Fluid <t3coreapi:record_objects_fluid>`.

Here we use the fields `header` and `bodytext` of the record. As the `bodytext`
field has a rich-text editor in the backend, we pass it through the
:ref:`Format.html ViewHelper <f:format.html> <t3viewhelper:typo3-fluid-format-html>`.
