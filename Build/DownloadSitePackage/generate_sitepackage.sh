#!/bin/bash

curl -X 'POST' \
  'https://get.typo3.org/api/v1/sitepackage/' \
  -H 'accept: application/zip' \
  -H 'Content-Type: application/json' \
  -d @"$(dirname "$0")/data.json" --output Documentation/CodeSnippets/my_site_package.zip

rm -rf Documentation/CodeSnippets/my_site_package/*
rm -rf Documentation/CodeSnippets/my_site_package/.*
unzip Documentation/CodeSnippets/my_site_package.zip -d "Documentation/CodeSnippets/my_site_package/"
rm Documentation/CodeSnippets/my_site_package.zip
