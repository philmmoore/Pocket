# Pocket

Pocket is **a stripped back PHP HMVC Framework** with a focus on helping developers jump from writing tightly coupled spaghetti to organised, re-usable, modular code. You'll **get to grips in minutes** not days, that can't be bad can it!

**No libraries.. are you serious?** Yup that's right! You won't find rich libraries for authentication, validation, benchmarking etc, well, not out of the box anyway** Why not? Well... If you're not familiar with routing, models, views and controllers then you've got enough to be thinking about and all those libraries that might not even be used will just add unnecessary 'noise' making it even more difficult for you to grasp. 

** Pocket libraries will be written in due course where they'll drop right into your Pocket instance, until then roll your own or find something on GitHub!

## Getting started

To install Pocket just download the source and deploy to your server, the framework deploys with a default module (Hello world example) ready to handle requests right away.

Every page load begins with a request, the request is the url that the user enters when trying to access a page on your website.

A request is checked against routes that have been defined, if the route for a request cannot be found then a 404 error would be returned.

Put simply a route is the url a user would type into the address bar.

***

### Routes

Routes are bound to a module and optionally an action (a method with the action name within the module controller)

The routes file can be found in /application/routes.php here you'll define all routes for your website/application.

By default the routes file will container two routes:

```php

# Binds the index page
# mywebsite.com

Pocket::setRoute('/');

# Binds anything after the first slash
# mywebsite.com/example

Pocket::setRoute('/<:slug>');

```

The second rule is a regular expression, anything found after the first / will be captured and stored as a parameter with the given name - in this case 'slug' 

The method Pocket::setRoute($route, $opts) accepts two parameters $route & $opts if the $opts array is not passed that route will be bound to the by default to the 'default' module.

Because we've not passed the action in the $opts array Pocket will try to match the users input to a method within the default controller... For example mywebsite.com/example is bound to a method in the default controller called example, if the method does not exist a 404 error will be returned.
 
Hyphenated requests will be converted to underscores e.g. mywebsite.com/example-page will try to load the example_page method.

#### Pocket::setRoute($route, $opts)

The $opts parameter is an optional array that accepts a module and optionally an action key, if the action is not set Pocket will look for a method in the defined module controller using the last part of the url.  

```php

Pocket::setRoute('/testing/<:slug>', array(
     'module'  =>  'testmodule'
));

```

For example the above would route mywebsite.com/testing/test to the method 'test' within the 'testmodule' controller.

Alternatively you can supply an action:

```php

Pocket::setRoute('/testing/<:slug>', array(
     'module'  =>  'testmodule',
     'action'  =>  'mymethod'
));

```
 
This will route anything after testing e.g. mywebsite.com/testing/hello, mywebsite.com/testing/hello-world etc to a single method 'mymethod' within the 'testmodule' controller. 

#### Simple route design

The $route parameter is designed to be easy to read and write, you don't need to know how to write regular  expression rules. A route should resemble a url with the option to add 'pretty' catchall expressions. 

Pocket has three simple expressions, routes can use any number of these in any order.

**<:param_name_here>**<br />
Matches alphanumeric hyphens & undercores

**<#param_name_here>**<br />
Matches numeric only

**<:param_name_here([a-z]+)>**<br />
Allows you to define your own expression

#### Example routes

Below are some examples of some commonly used routes

**News article**<br />

```php

Pocket::setRoute('/news/<:article_slug>-<#article_id>', array(
     'module'  =>  'news',
     'action'  =>  'article'
));

```

This route would route mywebsite.com/news/some-article-title-123 to the 'news' module sending parameters 'article_slug' and 'article_id' to the 'article' method in the controller.

**News pagination**<br />

```php

Pocket::setRoute('/news/page<#page_num>', array(
     'module'  =>  'news',
     'action'  =>  'articles_list'
));

```

This route would route mywebsite.com/news/page3 to the 'news' module sending parameters 'page_num' to the 'articles_list' method in the controller.

**General content**<br />

```php

Pocket::setRoute('/about/<:slug>', array(
     'module'  =>  'default',
     'action'  =>  'about_us'
));

```

This route would route mywebsite.com/about/anything, mywebsite.com/about/anything-else to the 'default' module sending parameters 'slug' to the 'about_us' method in the controller.

In the 'about_us' method you could check to see if the requested 'slug' is a valid page using a model that interrogates a database (see Models)

Alternatively if the website or application only has a few static pages remove the action from the $opts array and let Pocket find the method for you.

```php

Pocket::setRoute('/about/<:slug>', array(
     'module'  =>  'default'
));

```

***

### Controllers

### Views

### Models
