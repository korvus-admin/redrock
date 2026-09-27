#!/usr/bin/env bash
# Builds installable zips for an existing WordPress site:
#   dist/redrock-theme.zip   -> Appearance › Themes › Add New › Upload Theme
#   dist/redrock-core.zip    -> Plugins › Add New › Upload Plugin
set -euo pipefail
cd "$(dirname "$0")/.."
rm -rf dist && mkdir -p dist
( cd wp-content/themes  && zip -qr ../../dist/redrock-theme.zip redrock -x '*.DS_Store' )
( cd wp-content/plugins && zip -qr ../../dist/redrock-core.zip  redrock-core -x '*.DS_Store' )
ls -la dist
