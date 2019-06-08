#!/usr/bin/env bash

find wordpress/ -type d -exec chmod 0777 {} + && find wordpress -type f -print0 | xargs -0 chmod og+rwx