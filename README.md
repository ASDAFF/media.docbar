Docs Bar. (alkom:media.docbar)
============
Bar of items from Medialibrary's collection with permissions for 1C Bitrix.

***
## What's new?
v1.01:
* Added: "Use permissions" setting

***

## How to install?
Download .zip, unpack it and put the folder "alkom" in
```
%BitrixRoot%/bitrix/components/
```

***

## How to use?
2 Ways:
* Add "Docs bar" component in Page Editor in 1C Bitrix
* Put the next php code in the need place:

```php
<? $APPLICATION->IncludeComponent("alkom:media.docbar",
    ".default",
    array( ),
    false
); ?>
```



_Don't forget set settings in Bitrix Editor!_

**Enjoy it!**

