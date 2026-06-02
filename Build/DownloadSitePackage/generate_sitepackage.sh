#!/usr/bin/env bash

set -euo pipefail

SCRIPT_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"
PROJECT_ROOT="$(cd "${SCRIPT_DIR}/../.." && pwd)"

SOURCE_REPOSITORY="https://github.com/TYPO3-Documentation/site_package.git"
SOURCE_BRANCH="main"
TARGET_DIR="${PROJECT_ROOT}/Documentation/CodeSnippets/my_site_package"

TEMP_DIR="$(mktemp -d)"

cleanup() {
  rm -rf "${TEMP_DIR}"
}

trap cleanup EXIT

git clone \
  --depth 1 \
  --branch "${SOURCE_BRANCH}" \
  "${SOURCE_REPOSITORY}" \
  "${TEMP_DIR}/site_package"

rm -rf "${TARGET_DIR}"
mkdir -p "${TARGET_DIR}"

rsync -a \
  --exclude ".git" \
  --exclude ".github" \
  "${TEMP_DIR}/site_package/" \
  "${TARGET_DIR}/"
