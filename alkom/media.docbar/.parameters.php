<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

CModule::IncludeModule("fileman");
CMedialib::Init();

$dbMediaTypes = CMedialib::GetTypes(array(), true);
foreach ($dbMediaTypes as $vals)
{
	$arMediaTypes[$vals[id]] = $vals[name];
};

ksort($arMediaTypes);

$dbMediaCollections = CMediaLibCollection::GetList(array('arOrder' => array('ID'=>'ASC'),'arFilter' => array('ACTIVE' => 'Y', 'ML_TYPE' => $arCurrentValues[MEDIATYPE])));
foreach ($dbMediaCollections as $vals)
{
	$arMediaCollections[$vals[ID]] = $vals[NAME];
};

$arComponentParameters = array(
	'PARAMETERS' => array (
		'MEDIATYPE' => array (
			'PARENT' => 'BASE',
			'NAME' => GetMessage('ALKOM_DOCBAR_MEDIALIB_TYPE'),
			'TYPE' => 'LIST',
			'MULTIPLE' => 'N',
			'ADDITIONAL_VALUES' => 'N',
			'VALUES' => $arMediaTypes,
			'DEFAULT' => 'N',
			'REFRESH' => 'Y',
		),
		'MEDIASECTION' => array (
			'PARENT' => 'BASE',
			'NAME' => GetMessage('ALKOM_DOCBAR_MEDIALIB_COLLECTION'),
			'TYPE' => 'LIST',
			'MULTIPLE' => 'N',
			'ADDITIONAL_VALUES' => 'N',
			'VALUES' => $arMediaCollections,
			'DEFAUL' => 'N',
			'REFRESH' => 'N',
		),
		'CANVIEWEXTS' => array (
			'PARENT' => 'BASE',
			'NAME' => GetMessage('ALKOM_DOCBAR_CAN_VIEW_EXTS'),
			'TYPE' => 'STRING',
			'DEFAULT' => 'pdf,jpg,jpeg,png,bmp,gif,tiff',
		),
	),
);
?>
