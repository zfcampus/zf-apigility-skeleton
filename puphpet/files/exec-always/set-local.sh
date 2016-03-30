#!/bin/bash
echo "Setting locale to fix encoding"
sh -c "echo 'LC_ALL=en_US.UTF-8' >> /etc/environment"
echo "done setting locale"
