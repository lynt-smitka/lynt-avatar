<?php
/*
Plugin Name: Lynt Avatar
Author: Vladimir Smitka
Description: Replace avatars with the local SVG colorcoded from the original url.
Plugin URI: https://github.com/lynt-smitka/lynt-avatar
Version: 0.0.1
Author URI: https://lynt.cz
License: GPLv2 or later
*/
/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.
This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.
You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/

class LyntAvatar {
 function LyntAvatar()
  {
    add_filter( 'get_avatar_url', array($this, 'lynt_avatar'), 10, 3 );
  }
  
  
  function lynt_avatar( $url, $id_or_email, $args ){

       
    $hash = 0;
    
    //small changes makes a bigger color difference
    $multiplier = 10;
    
    $url = parse_url($url);
    //extract only host and path part form the url
    //ignore GET params to preserve color with gravatar service
    $chars = str_split($url['host'].$url['path']);
    
    foreach($chars as $c){
      $hash+= ord($c) * $multiplier++;
    }
    //get number from 0 - 360 - hue
    $hash = $hash % 360;

    //generate path to the SVG generator
    return  plugin_dir_url( __FILE__ ) .'/avatar.php?c='.$hash;

  }
  
}
new LyntAvatar();
?>