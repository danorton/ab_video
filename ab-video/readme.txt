=== AB-Video ===
Contributors: AndreasBa73
Tags: video, embed, movie, shortcode, plugin, clip, vimeo, youtube, dailymotion
Requires at least: 2.5
Tested up to: 3.0.1
Stable tag: 1.2.0

Allows the user to embed Youtube, Vimeo or Dailymotion movie clips by entering a shortcode ([youtube] / [vimeo] / [dailymotion) into the post area. 

Video options are supported as short code attributes.


== Description ==

Allows the user to embed Youtube Vimeo or Dailymotion movie clips by entering a shortcode ([youtube] / [vimeo] / [dailymotion]) into the post area.


== Installation ==

1. Unzip `ab-video.zip` and upload the contained files to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress


== Changelog ==

= 1.2.0 =
* Released: 2010-09-25
* Changed: Watch Youtube and Vimeo on your iPhone / iPad / iPod touch

= 1.1.1 =
* Released: 2010-06-26
* Changed: The video doesn't place on top anymore.

= 1.1.0 =
* Released: 2010-06-06
* Dailymotion video added

= 1.0.2 =
* Released: 2010-05-28
* Description corrected

= 1.0.1 =
* Released: 2010-05-25
* Changelog added
* Options Site with usage description added

= 1.0 =
* Released: 2010-05-24
* Initial release



== Usage ==
Vimeo:
1. Enter the `[vimeo clip_id="XXXXXXX"]` short code into any post. `clip_id` is the number from the clip's URL (e.g. http://vimeo.com/123456)
2. Optionally modify the clip's appearance by specifying width or height, like so: `[vimeo clip_id="XXXXXXX" width="400" height="225"]`
3. Using empty values for either the `width` or `height` attributes will cause AB-Video to calculate the proper dimension based on a 16:9 aspect ration. 
   Example: `[vimeo clip_id="12345678" height="300" width=""]` or `[vimeo clip_id="12345678" height="" width="640"]`

Youtube:
1. Enter the `[youtube clip_id="XXXXXXX"]` short code into any post. `clip_id` is the id from the clip's URL after v= (e.g. http://www.youtube.com/watch?v=2LbpLRZwWtE)
2. Optionally modify the clip's appearance by specifying width or height, like so: `[youtube clip_id="XXXXXXX" width="400" height="225"]`
3. Using empty values for either the `width` or `height`attributes will cause AB-Video to calculate the proper dimension based on a 16:9 aspect ration. 
   Example: `[youtube clip_id="2LbpLRZwWtE" height="300" width=""]` or `[youtube clip_id="2LbpLRZwWtE" height="" width="640"]`

Dailymotion:
1. Enter the `[dailymotion clip_id="xdjrm7"]` short code into any post. `clip_id` is the id from the clip's URL (e.g. http://www.dailymotion.com/video/xdjrm7_kylie-minogue-all-the-lovers_music#hp-v-v4)
2. Optionally modify the clip's appearance by specifying width or height, like so: `[dailymotion clip_id="XXXXXXX" width="400" height="225"]`
3. Using empty values for either the `width` or `height` attributes will cause AB-Video to calculate the proper dimension based on a 16:9 aspect ration. 
   Example: `[dailymotion clip_id="12345678" height="300" width=""]` or `[dailymotion clip_id="12345678" height="" width="640"]`
