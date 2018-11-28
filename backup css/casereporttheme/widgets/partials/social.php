<?=$args['before_widget']?>

<a href="<?=$this->url()?>"><img src="<?=sprintf("%s/icon-footer-%s.png",$GLOBALS['bmj']['repository'],$this->icon)?>"
                                                     srcset="data:image/svg+xml;base64,<?=base64_encode($this->svg)?>"></a>

<?=$args['after_widget']?>
