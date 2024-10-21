:navigation-title: Jumbotron
..  include:: /Includes.rst.txt

..  _customize-content-elements:

===================================================
The jumbotron: Customize output of content elements
===================================================

As you can see in the static html template, the jumbotron consist of a headline
and a text:

.. code-block:: html
   :caption: theme/index.html

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
   :caption: Example HTML Output

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
   :caption: EXT:site_package/Resources/Private/Partials/Page/Jumbotron.html

   <div class="jumbotron">
      <f:debug>{jumbotronContent}</f:debug>
      <!-- ... -->
   </div>

As you can see the data of the actually :sql:`tt_content` record can be found in
:typoscript:`data`. Now let us traverse the array and output the content
elements:

.. code-block:: html
   :caption: EXT:site_package/Resources/Private/Partials/Page/Jumbotron.html

   <div class="jumbotron">
       <f:for each="{jumbotronContent}" as="contentElement">
           <div class="container">
               <h1 class="display-3">{contentElement.data.header}</h1>
               <f:format.html>{contentElement.data.bodytext}</f:format.html>
           </div>
       </f:for>
   </div>
