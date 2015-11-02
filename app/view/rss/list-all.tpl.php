<h2><?=$title?></h2>



<table> 

<tr><th>Id</th><th>Page key</th><th>Title</th><th>Description</th></tr>
<?php foreach ($feeds as $feed) : ?>

    <tr>
            <td><?=$feed->id?></td>
            <td><?=$feed->pagekey?></td>
            <td><?=$feed->title?></td>
            <td><?=$feed->description?></td>
            <td>|</td>
            <td><a href='<?=$this->url->create('rss/view/' . $feed->pagekey)?>'>View</a></td>
            <td>|</td>
            <td><a href='<?=$this->url->create('rss/update/' . $feed->id)?>'>Edit</a></td>
            <td>|</td>
            <td><a href='<?=$this->url->create('rss/delete/' . $feed->id . '/' . $feed->pagekey)?>'>Delete</a></td>
    </tr>
<?php endforeach; ?>
</table> 