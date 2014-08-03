<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>
<div id="docbar">
<? 
if ($arResult[CANVIEWCOLLECTION]) {
	foreach($arResult[ITEMS] as $key=>$item) {
	?>
		<div class="bar <?=$item[EXT]?>" <?=(isset($item[THUMB_PATH]) ? ('style="background-image: url('.$item[THUMB_PATH].');"') : (''))?> title="<?=$item[NAME]?>">
			<div class="smallext"><span><?=$item[EXT]?></span></div>
			<div class="bigext"><?=(!isset($item[THUMB_PATH]) ? ('.'.strtoupper($item[EXT])) : ('&nbsp'))?></div>
			<div class="dnmenu">
				<?=((strlen($item[NAME])>15) ? (substr($item[NAME],0,13).'...') : $item[NAME])?>
				<br>
				<? if ($item[CANVIEW]){ ?>			
					<a href="<?=$item[PATH]?>" title="<?=GetMessage('ALKOM_DOCBAR_VIEW_ITEM');?>" target="_blank"><?=CFile::ShowImage($templateFolder .'/img/view.png')?></a>
				<? }; ?>
				<a href="<?=$item[PATH]?>" title="<?=GetMessage('ALKOM_DOCBAR_DOWNLOAD_ITEM');?>" target="_blank" download><?=CFile::ShowImage($templateFolder .'/img/download.png')?></a>
			</div>
		</div>
	<? };
}
else { ?> <h3><?=GetMessage('ALKOM_DOCBAR_ACCESS_DENIED');?></h3> <? }; ?>
</div>
<?
?>