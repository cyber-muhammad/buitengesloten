# Cities Section Documentation

This document explains how to use the Cities Section feature in your WordPress site.

## Overview

The Cities Section allows you to display a list of cities as links in a formatted section. You can use this feature in three different ways:

1. Using Advanced Custom Fields (ACF) to manually enter cities and their URLs
2. Using the shortcode `[cities_section]` in any content area
3. Using the template part in your theme files

## Option 1: Using ACF Fields

1. Edit any page in WordPress
2. Scroll down to the "Locations Settings" section
3. Enable the "Enable Locations Section" toggle
4. Fill in the section title (e.g., "Onze Locaties in de Provincie")
5. Enter the province name (e.g., "Antwerpen")
6. In the "Cities" textarea, enter each city in the format:
   ```
   City Name|../slotenmaker-city.html
   ```
   One city per line.
   
   Example:
   ```
   Aartselaar|../slotenmaker-aartselaar.html
   Arendonk|../slotenmaker-arendonk.html
   Baarle-Hertog|../slotenmaker-baarle-hertog.html
   ```

7. Save the page

The cities section will automatically appear on the page with the formatting shown in the design.

## Option 2: Using the Shortcode

You can display the cities section anywhere in your content by using the shortcode:

```
[cities_section]
```

This will display the cities section based on the ACF fields you've set up for that page.

## Option 3: Using the Template Part in Your Theme

For developers who want to include the cities section in a template file, use:

```php
<?php display_cities_section(); ?>
```

## Support

If you have any questions about using the Cities Section feature, please contact your website administrator.