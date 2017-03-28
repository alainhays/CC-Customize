# CC-Customize

Created with love in Poland by Leszek Pomianowski | [RapidDev](http://rapiddev.pl/)

Very fast engine for easy making customization in WordPress<br />
Create personalization quickly and without worrying about code integrity!

## Functions:
1. Simply Customization create
2. Support for default options and no-database usage
3. Quick declaration in multidimensional arrays

## How to connect it?:
Just add the cc-customize.php file to the theme folder and add the following line to the functions.php file.<br />
(Or just copy and paste all functions and settings into your computational file)
```php
include 'cc-customize.php';
```


## How to create your own menu?:
To create our menu in personalization we create such an array.<br />
(The first array within the panel is its settings)
```php
if(!isset($customization)){ //does the child theme use customization? 
$customization = array( // our array

  'main' => array( //first panel
    array('title' => 'Main', 'des' => ''), //panel settings
    array('title' => 'General', 'id' => 'cc_main', 'des' => 'Whatever you want'), //first section
    array('title' => 'Other stuff', 'id' => 'my_stuff', 'des' => ''), //second section
	
  'colors' => array( //second panel
    array('title' => 'Colors', 'des' => 'Edit colors'), //panel settings
    array('title' => 'Main', 'id' => 'cc_colors_main', 'des' => ''),), //first section
    
);global $customization;}
```
## How to add your own options?:
To add your own option create such an array<br />
Available types of options: text, textarea, url, image, color, multiselect, select<br />
You do not need to add a 'title', 'des', or 'default'. Mandatory is 'type' and id
```php
if(!isset($cc)){
$cc = array(
  'no_index' => array( // no-index section
    'version' => array('3.1.4', '3'), // single option, not editable
    'load_defaults' => false,
  ),

  'cc_main' => array( //section 
    'brand_name' => array('default' => 'My Company', 'type' => 'text', 'title' => 'Brand name'), //single option
  ),
  'cc_colors_main' => array( //section 
    'bacgkround-color' => array('default' => '#ffffff', 'type' => 'color', 'title' => 'Background color'), //single option
  ),
);global $cc;}
```

## How to use our options?:
Wherever you decide to use your function, write:
```php
ec_['brand_name']; //echo 

// or
if( c_['load_defaults'] == true ){ echo 'Defaults'; } // return
```
