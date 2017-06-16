<pre>
<strong>Uptime:</strong>
<?php system("uptime"); ?>
<br />
<strong>System Information:</strong>
<?php system("uname -a"); ?>
<br />
<strong>Memory Usage (MB):</strong>
<?php system("free -m"); ?>
<br />
<strong>Disk Usage:</strong>
<?php system("df -h"); ?>
<br />
<strong>CPU Information:</strong>
<?php system("cat /proc/cpuinfo | grep \"model name\\|processor\""); ?>
<br />
<strong>Apache V:</strong>
<?php
system("httpd -v");
?>
<br />
</pre>
<?php
phpinfo()
?>