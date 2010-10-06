<?php
/*
Plugin Name: AB-Video
Plugin URI: http://www.bachmaier.cc/2010/05/wordpress-plugin-ab-video/
Description: Allows the user to embed Youtube / Vimeo / Dailymotion movie clips by entering a shortcode ([youtube] / [vimeo] / [dailymotion]) into the post area.
Author: Andreas Bachmaier
Version: 1.2.0
Author URI: http://www.bachmaier.cc/
License: GPL 2.0, @see http://www.gnu.org/licenses/gpl-2.0.html
*/

class ab_video {
    function vimeo($atts, $content=null) {
    extract(shortcode_atts(array(
      'clip_id'   => '',
      'width'   => '512',
      'height'  => '288',
    ), $atts));

    if (empty($clip_id) || !is_numeric($clip_id)) return '<!-- AB Video: Invalid clip_id -->';
    if ($height && !$width) $width = intval($height * 16 / 9);
    if (!$height && $width) $height = intval($width * 9 / 16);
    
    return "<p><iframe src='http://player.vimeo.com/video/$clip_id?portrait=0' width='$width' height='$height' frameborder='0'></iframe></p>";
    }
  
  function youtube($atts, $content=null) {
    extract(shortcode_atts(array(
      'clip_id'   => '',
      'width'   => '512',
      'height'  => '288',
    ), $atts));
    
    if (empty($clip_id)) return '<!-- AB Video: Invalid clip_id -->';
    if ($height && !$width) $width = intval($height * 16 / 9);
    if (!$height && $width) $height = intval($width * 9 / 16);
    $height += 25; // Youtube Controls
    
    return '<p><object width="'.$width.'" height="'.$height.'" type="application/x-shockwave-flash" data="http://www.youtube.com/v/'.$clip_id.'&fs=1&fmt=18">
      <param name="movie" value="http://www.youtube.com/v/'.$clip_id.'&fs=1&fmt=18"></param>
      <param name="allowFullScreen" value="true" />
      <param name="allowscriptaccess" value="always" />
      <param name="wmode" value="transparent"></param>
      </object></p>';
  }
  
  function dailymotion($atts, $content=null) {
    extract(shortcode_atts(array(
      'clip_id'   => '',
      'width'   => '512',
      'height'  => '288',
    ), $atts));
    
    if (empty($clip_id)) return '<!-- AB Video: Invalid clip_id -->';
    if ($height && !$width) $width = intval($height * 16 / 9);
    if (!$height && $width) $height = intval($width * 9 / 16);
    
    return '<p><object width="'.$width.'" height="'.$height.'">
      <param name="movie" value="http://www.dailymotion.com/swf/video/'.$clip_id.'"></param>
      <param name="allowFullScreen" value="true"></param>
      <param name="allowScriptAccess" value="always"></param>
      <param name="wmode" value="transparent"></param>
      <embed wmode="transparent" type="application/x-shockwave-flash" src="http://www.dailymotion.com/swf/video/'.$clip_id.'" width="'.$width.'" height="'.$height.'" allowfullscreen="true" allowscriptaccess="always"></embed>
      </object></p>';
  }

}

  function ab_video_description_option_page() {
    echo '<div class="wrap">
          <h2>AB-Video</h2>
          <h3>Description</h3>
          <p>Allows the user to embed Youtube, Vimeo or Dailymotion movie clips by entering a shortcode ([youtube] / [vimeo] / [dailymotion]) into the post area.</p>
          <br />
          <h3>Usage</h3>
          <p>
          Vimeo:<br />
          1. Enter the [vimeo clip_id="XXXXXXX"] short code into any post. clip_id is the number from the clip\'s URL (e.g. http://vimeo.com/123456)<br />
          2. Optionally modify the clip\'s appearance by specifying width or height, like so: [vimeo clip_id="XXXXXXX" width="400" height="225"]<br />
          3. Using empty values for either the width or height attributes will cause AB-Video to calculate the proper dimension based on a 16:9 aspect ration.<br />
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Example: [vimeo clip_id="12345678" height="300" width=""] or [vimeo clip_id="12345678" height="" width="640"]<br />
          <br />
          Youtube:<br />
          1. Enter the [youtube clip_id="XXXXXXX"] short code into any post. clip_id is the id from the clip\'s URL after v= (e.g. http://www.youtube.com/watch?v=2LbpLRZwWtE)<br />
          2. Optionally modify the clip\'s appearance by specifying width or height, like so: [youtube clip_id="XXXXXXX" width="400" height="225"]<br />
          3. Using empty values for either the width or height attributes will cause AB-Video to calculate the proper dimension based on a 16:9 aspect ration.<br /> 
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Example: [youtube clip_id="2LbpLRZwWtE" height="300" width=""] or [youtube clip_id="2LbpLRZwWtE" height="" width="640"]<br />
          <br />
          Dailymotion:<br />
          1. Enter the [dailymotion clip_id="xdjrm7"] short code into any post. clip_id is the id from the clip\'s URL (e.g. http://www.dailymotion.com/video/xdjrm7_kylie-minogue-all-the-lovers_music#hp-v-v4)<br />
          2. Optionally modify the clip\'s appearance by specifying width or height, like so: [dailymotion clip_id="XXXXXXX" width="400" height="225"]<br />
          3. Using empty values for either the width or height attributes will cause AB-Video to calculate the proper dimension based on a 16:9 aspect ration.<br /> 
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Example: [dailymotion clip_id="xdjrm7" height="300" width=""] or [dailymotion clip_id="xdjrm7" height="" width="640"]`<br />
          </p>
          <br />
          <h3>Donate</h3>
          <p>
            If you find this plugin useful, please consider making a donation to support its continued development; any amount is welcome.
            <div style="margin-left:300px">
              <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
              <input type="hidden" name="cmd" value="_s-xclick">
              <input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----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-----END PKCS7-----
              ">
              <input type="image" src="https://www.paypal.com/en_US/GB/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online.">
              <img alt="" border="0" src="https://www.paypal.com/de_DE/i/scr/pixel.gif" width="1" height="1">
              </form>
            </div>
          </p>
        </div>';
  }

  // Adminmenu Optionen erweitern
  function ab_video_description_add_menu() {
    add_options_page('AB-Video Plugin', 'AB-Video', 9, __FILE__, 'ab_video_description_option_page'); //optionenseite hinzufügen
  }

add_shortcode('youtube', array('ab_video', 'youtube'));
add_shortcode('vimeo', array('ab_video', 'vimeo'));
add_shortcode('dailymotion', array('ab_video', 'dailymotion'));

// Registrieren der WordPress-Hooks
add_action('admin_menu', 'ab_video_description_add_menu');

?>
