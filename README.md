#QuestMVC

This is my MVC based on Lydia

##Download

You can download Lydia from QuestMVC.

git clone git://github.com/HenkeQuest/QuestMVC.git 

You can review its source directly on github: https://github.com/HenkeQuest/QuestMVC


##Installation

First you have to make the data-directory writable. This is the place where Lydia needs to be able to write and create files.

cd questmvc; chmod 777 site/data 

Second, QuestMVC has some modules that need to be initialized. You can do this through a controller. Point your browser to the following link.


##module/install 

* In /index.php you can define your installation path and site path

* In /site/config.php you can set your personal settings.


----------------------------

##Customize

You can modify your theme in site/config.php
$qu->config['theme']
Here you can:
* Set the path to your theme
* Set the parent theme
* Set the name of your stylesheet
* Set the template file
* Set regions
* Set header, slogan, favicon, logo (height and weight) and footer

You're menu can be change in `$qu->config['menus']` under `"my-navbar"`.
You can modify the label or you can add a nav-bar item. If you want to add 
a new page of your parents you can add the following line in my-navbar:

`'parents'   => array('label'=>'My Parents', 'url'=>'my/parents'),`

Go to your site and log in as admin. Standard is root/root
Go to `/content/create` and create a page:
* Title: My Parents
* Key: parents
* Content: I have 2 parents.
* Type: page
* Filter: htmlpurify

After you clicked "Create" you received a ID to this page. It is shown in the address field. Put that number in mind.

Then you need to create a method in `site/src/Mycontroller/Mycontroller.class.php` like this:
```
/**
 * My parents page.
 */
public function Parents() {
  $content = new MContent(9);
  $this->views->AddInclude(__DIR__ . '/page.tpl.php', array(
                'content' => $content,
              ));
}
```
Now you have a page for your parents.

If you want a blog you only have to uncomment the "blog" line in `my-navbar` in `site/config.php`
Do you want to add a post in your blog just go to `/content/create` and create a post:
* Title: Your title
* Key: your-key
* Content: Content of your blog
* Type: post
* Filter: htmlpurify

You now have a new post in your blog

If you want a guestbook you can only uncomment the "guestbook" line in `my-navbar` in `site/config.php`
