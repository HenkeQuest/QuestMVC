<?php if($content['id']): $qu = Questmvc::Instance();?>
  <h1><?=esc($content['title'])?></h1>
  <p><?=$content->GetFilteredData()?></p>
  <p class='smaller-text silent'><?php if($qu->user->IsAdmin()){ ?><a href='<?=create_url("content/edit/{$content['id']}")?>'>edit</a> <?php } ?></p>
<?php else:?>
  <p>404: No such page exists.</p>
<?php endif;?>
