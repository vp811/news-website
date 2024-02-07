# News Website Plugin | 1.0.0

## Page Templates
This plugin utilizes three page templates that will only load when the plugin is active.
- Home Page Template
  - Each section on the home page is a post (including the Submit a Story and Ytori sections). If an image for these sections needs to be changed, go to that post in the WP dashboard and change the featured image.
  - Pulls in posts from these category slugs
    - featured-news
    - recent-news
    - research-news
    - awards-honors
    - submit-news
    - ytori
- Featured Article Template
- Article Template
- Archive Templates

## Custom Functionality
This plugin has some built in custom functionality:
- Ability to share articles to Facebook, Twitter, and LinkedIn
- Ability to add a donation button after the article with custom text and link.
- Related posts are also displayed at the bottom of an article.
- Pop up with Emma form embedded inside (iframe)
- Hide author and/or featured image on articles (Checkbox shows up on right hand side)

## Plugins needed
- Advanced Custom Fields
  - This plugin adds the custom fields that someone can fill out in the WP dashboard when looking at an individual post
    - Sub heading
    - Support Link
    - Support Text
