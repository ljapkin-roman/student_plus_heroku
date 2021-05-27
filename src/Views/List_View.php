<?php
for ($i=1; $i<=$data['quantityPage']; $i++)
{
    print_r(createLink($i)."<br>");
}
function createLink($numberOfPage)
{
    $page = 'page' . $numberOfPage;
    $uriArray = explode('/', $_SERVER['REQUEST_URI']);
    $partOfUri = array_slice($uriArray, 0, -1);
    array_push($partOfUri, $page);
    $uri = implode('/', $partOfUri);
    $link = "http://". "{$_SERVER['HTTP_HOST']}{$uri}";
    $tagA = "<a href='{$link}'> {$page}</a>";
    return $tagA;
}
print_r($data['offset'] . " ");
print_r($data['listStudent']);