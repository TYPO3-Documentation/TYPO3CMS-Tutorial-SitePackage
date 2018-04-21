.. include:: ../Includes.txt


.. summary:

Summary
-------

First and foremost: **congratulations!** You reached a point where you have successfully implemented a custom Site Package for TYPO3. In fact, you have not only developed a "theme" for your website, you also built a fully working extension for TYPO3, which can be installed, uninstalled, copied to another TYPO3 instance and put under version control. You could also share your Site Package with others by uploading your extension to the `TYPO3 Extension Repository <https://extensions.typo3.org>`_.

The list below shows a quick summary what you have achieved by working through this tutorial.

- Split a "static" HTML/CSS/JavaScript template into Fluid templates (Layout, Templates and Partial).
- Applied "Fluid Styled Content" TypoScript (files ``constants.typoscript`` and ``setup.typoscript``).
- Included the `Bootstrap framework <https://getbootstrap.com>`_ and `jQuery <https://jquery.com>`_ library as external resources.
- Built a fully functional TYPO3 extension and installed this extension via the Extension Manager.
- Created some initial Pages, the TypoScript templates and learned how to preview a page in the backend.
- Developed a navigation menu using TypoScript and Fluid.
- Applied TypoScript to render the content (file ``DynamicContent.typoscript``).

This all sounds very sophisticated and complicated, but keep in mind, the extension (as it stands at this point in time) contains xxx files only, plus the HTML/CSS files. Except xxx files in the root level of the extension directory, non of these files are PHP files.

.. @TODO add number of files


.. next-steps:

Next Steps
^^^^^^^^^^

The Site Package extension as it stands now still has some shortfalls. Let's have a closer look what you could or should do as the next steps to address these.

.. one page layout only
.. navigation menu just one level
.. backend columns

*TODO: list known issues such as one page layout, just one menu level, BE columns, etc.*

Please understand, that describing these actions is beyond the scope of this tutorial.


.. site-package-builder:

Site Package Builder
^^^^^^^^^^^^^^^^^^^^

*TODO: Add some basic information and a reference to `http://sitepackagebuilder.com/`_.*

.. @TODO point out that instead of writing all files from scratch, the site package builder can be used as a freeonline service.
.. @TODO screenshot


.. site-package-free-to-download:

Site Package Free to Download
^^^^^^^^^^^^^^^^^^^^^^^^^^^^^

*TODO: Add link to Github, where to download the extension.*