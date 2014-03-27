--TEST--
toc render
--SKIPIF--
--FILE--
<?php
$text = <<<EOT
# a

hoge

## b

foo

### `code`

huge
EOT;

$hoedown = new Hoedown;

$hoedown->setOption(Hoedown::TOC, true);

echo "== default renderer ==\n";
echo $hoedown->parse($text);

echo "== default renderer and state ==\n";
echo $hoedown->parse($text, $state);
if (array_key_exists('toc', $state)) {
    echo ": toc\n";
    echo $state['toc'];
}

echo "== toc renderer ==\n";
$hoedown->setOption(Hoedown::RENDERER_TOC, true);
echo $hoedown->parse($text);
--EXPECTF--
== default renderer ==
<h1 id="toc_a">a</h1>

<p>hoge</p>

<h2 id="toc_b">b</h2>

<p>foo</p>

<h3 id="toc_-code-code--code-"><code>code</code></h3>

<p>huge</p>
== default renderer and state ==
<h1 id="toc_a">a</h1>

<p>hoge</p>

<h2 id="toc_b">b</h2>

<p>foo</p>

<h3 id="toc_-code-code--code-"><code>code</code></h3>

<p>huge</p>
: toc
<ul>
<li>
<a href="#toc_a">a</a>
<ul>
<li>
<a href="#toc_b">b</a>
<ul>
<li>
<a href="#toc_-code-code--code-">&lt;code&gt;code&lt;/code&gt;</a>
</li>
</ul>
</li>
</ul>
</li>
</ul>
== toc renderer ==
<ul>
<li>
<a href="#toc_a">a</a>
<ul>
<li>
<a href="#toc_b">b</a>
<ul>
<li>
<a href="#toc_-code-code--code-">&lt;code&gt;code&lt;/code&gt;</a>
</li>
</ul>
</li>
</ul>
</li>
</ul>
