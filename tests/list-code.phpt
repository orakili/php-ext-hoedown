--TEST--
list code
--SKIPIF--
--FILE--
<?php
$text = <<<EOT
*   a list containing a block of code

	    10 PRINT HELLO INFINITE
	    20 GOTO 10
EOT;

$hoedown = new Hoedown;
echo $hoedown->parse($text);

--EXPECTF--
<ul>
<li><p>a list containing a block of code</p>

<pre><code>10 PRINT HELLO INFINITE
20 GOTO 10
</code></pre></li>
</ul>
