<?php

$issn = [];
if (!empty($journal['issn']['online'])) {
    $issn[] = "<span>Online ISSN: {$journal['issn']['online']}</span>";
}
if (!empty($journal['issn']['print'])) {
    $issn[] = "<span>Print ISSN: {$journal['issn']['print']}</span>";
}
?>
<p><?=join(' ',$issn)?></p>
