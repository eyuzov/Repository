<?php
function renderTemplate(){
    ob_start();
    include "layout.php";
    return ob_get_clean();
}

echo renderTemplate();