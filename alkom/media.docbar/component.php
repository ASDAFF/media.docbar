<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

CModule::IncludeModule("fileman");
CMedialib::Init();

$canviewexts = explode(',', $arParams[CANVIEWEXTS]);

if (!function_exists(getExt)) {
	function getExt($filename){
		return end(explode(".", $filename));
	};
};

if (!function_exists(getCanView)) {
	function getCanView ($ext, $canexts) {
		return in_array($ext, $canexts);
	};
};

if (!function_exists(getCanAccess)) {
	function getCanAccess ($collectionId) {
		return CMedialib::CanDoOperation('medialib_view_collection', $collectionId);
	};
};

if (($arParams[USEPERMISSIONS]) && (getCanAccess($arParams[MEDIASECTION])) || ($arParams[USEPERMISSIONS]=='N')) {

	$arResult[CHARSET_ADDER] = (LANG_CHARSET == ToUpper("UTF-8") ? '_UTF8' : '');
	
	$params = array ("arCollections"=>array($arParams[MEDIASECTION]));
	$items = CMedialibItem::GetList($params);

	$i=0;
	foreach ($items as $itemkey => $item){
		$arResult[ITEMS][$i][NAME] = $item[NAME];
		$arResult[ITEMS][$i][PATH] = $item[PATH];
		$arResult[ITEMS][$i][THUMB_PATH] = $item[THUMB_PATH];
		$arResult[ITEMS][$i][EXT] = getExt($item[NAME]);
		$arResult[ITEMS][$i][CANVIEW] = getCanView(getExt($item[NAME]), $canviewexts);
		$i++;
	};

$arResult[CANVIEWCOLLECTION] = true;
}
else $arResult[CANVIEWCOLLECTION] = false;

$this->IncludeComponentTemplate();
?>