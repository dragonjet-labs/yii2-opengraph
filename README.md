# Open Graph for Yii 2.x
Open Graph implementation for Yii 2 which adds valid meta tags to your HTML output.

## Configuration
```
'components' => [
	'opengraph' => [
		'class' => 'dragonjet\opengraph\OpenGraph',
	],
	//....
],
```

## Usage
The following codes must be used on controller actions before rendering the view.

### Usage via Object
```
Yii::$app->opengraph->title = 'My_Article';
Yii::$app->opengraph->description = 'My_Article_Description';
Yii::$app->opengraph->image = 'http://image.for.my/article';
return $this->render('My_View_Name');
```

### Usage via Array
```
Yii::$app->opengraph->set([
	'title' => 'My_Article',
	'description' => 'My_Article_Description',
	'image' => 'http://image.for.my/article',
]);
return $this->render('My_View_Name');
```

### Twitter Cards
```
Yii::$app->opengraph->title = 'My_Article';
Yii::$app->opengraph->description = 'My_Article_Description';
Yii::$app->opengraph->image = 'http://image.for.my/article';
Yii::$app->opengraph->twitter->card = 'summary';
Yii::$app->opengraph->twitter->site = 'My_Site_Twitter_Username';
Yii::$app->opengraph->twitter->creator = 'Author_Username';
return $this->render('My_View_Name');
```
or
```
Yii::$app->opengraph->set([
	'title' => 'My_Article',
	'description' => 'My_Article_Description',
	'image' => 'http://image.for.my/article',
	'twitter' => [
		'card' => 'summary',
		'site' => 'My_Site_Twitter_Username',
		'creator' => 'Author_Username',
	],
]);
return $this->render('My_View_Name');
```

## Available Properties
#### Title
`Yii::$app->opengraph->title`

This is the title that shows up on social sharing. In contrast to the view title, this should be simpler and should not contain your branding for best practice, as mentioned on the *Facebook Sharing Guidelines*:

* "*The title of your article, excluding any branding.*"
* "*The title should not have branding or extraneous information.*"

e.g. "*MySite.com - Blog - Hello world!*" should just be "*Hello World!*"

#### Site Name
`Yii::$app->opengraph->site_name`

[**Automatic**] Your website's name. You do not need to specify this on every controller action if you have an application `name` in your Yii config:

```
return [
    'id' => 'yiiappid',
	'name' => 'My Website',
    //....
]
```

#### URL
`Yii::$app->opengraph->url`

[**Automatic**] This is automatically prefilled with the current URL. You do not need to specify this on every controller action.

#### Description
`Yii::$app->opengraph->description`

Description of the current page. Optional but recommended for best results in social sharing.

#### Object Type
`Yii::$app->opengraph->type`

The type of object this page will appear on social media. Defaults to `article`.

#### Locale
`Yii::$app->opengraph->locale`

[**Automatic**] This is the locale (language) of the open graph object. This defaults to your Yii application language.

#### Image
`Yii::$app->opengraph->image`

Image for the graph object. This is highly recommended for best results when shared onto the social media. For best results in Facebook, make this at least `600x315px`