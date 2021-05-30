<?php

function createLink($numberOfPage)
{
    $page = 'page' . $numberOfPage;
    $uriArray = explode('/', $_SERVER['REQUEST_URI']);
    $partOfUri = array_slice($uriArray, 0, -1);
    array_push($partOfUri, $page);
    $uri = implode('/', $partOfUri);
    $link = "http://" . "{$_SERVER['HTTP_HOST']}{$uri}";
    return $link;
}
function isCurrentPage($i) :bool
{
    $uriArray = explode('/', $_SERVER['REQUEST_URI']);
    $partOfUri = array_slice($uriArray, 3, 1)[0];
    $numberPage = explode('page', $partOfUri)[1];
    if ($numberPage == $i)
    {
        return true;
    }
    return false;
}
$list_student = $data['listStudent'];
?>
<nav aria-label="Page navigation example">
    <ul class="pagination">

        <?php for ($i = 1; $i <= $data['quantityPage']; $i++) { ?>
        <li class="page-item <?php if(isCurrentPage($i)) { print_r("active"); } ?>">
            <a class="page-link" href="<?php print_r(createLink($i)); ?>"><?php print_r($i); ?></a>
        </li>
        <?php } ?>

    </ul>
</nav>
<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">First Name</th>
        <th scope="col">Last Name</th>
        <th scope="col">Name group</th>
    </tr>
    </thead>
    <tbody>
        <?php for($i=0; $i<count($list_student);$i++) { ?>
        <tr>
            <th scope="row"><?php print_r($list_student[$i]['id']); ?></th>
                <td> <?php print_r($list_student[$i]['first_name']); ?> </td>
                <td> <?php print_r($list_student[$i]['last_name']); ?> </td>
                <td> <?php print_r($list_student[$i]['number_group']); ?> </td>

        </tr>
        <?php } ?>
    </tbody>
</table>