<?php
function renderHeader(string $content, int $level){
    echo "<h{$level}>{$content}</h{$level}>";
}