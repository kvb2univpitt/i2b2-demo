#!/bin/bash

# Apache and Shibd gets grumpy about PID files pre-existing from previous runs
rm -f /etc/httpd/run/httpd.pid /var/lock/subsys/shibd

# Make sure /etc/shibboleth/shibd-redhat is executable
chmod +x /etc/shibboleth/shibd-redhat

# Start Shibd
/etc/shibboleth/shibd-redhat start

# Start httpd
exec httpd -DFOREGROUND
