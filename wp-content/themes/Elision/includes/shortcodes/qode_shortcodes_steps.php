<?php
$full_path = __FILE__;
$path = explode('wp-content', $full_path);
require_once( $path[0] . '/wp-load.php' );
?>

<div id="qode_shortcode_form_wrapper">
    <form id="qode_shortcode_form" name="qode_shortcode_form" method="post" action="">
        <div class="input">
            <label>Number Of Steps</label>
            <select name="number_of_steps" id="number_of_steps">
                <option value="">Default</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
        </div>
        <div class="input">
        <label>Image 1</label>
            <input id="image1" class="popup_image" type="text" name="image1" value="" size="55" />
            <input class="upload_button" type="button" value="Upload file" id="popup_image_button">
        </div>
        <div class="input">
            <label>Image 2</label>
            <input id="image2" class="popup_image" type="text" name="image2" value="" size="55" />
            <input class="upload_button" type="button" value="Upload file" id="popup_image_button">
        </div>
        <div class="input">
            <label>Image 3</label>
            <input id="image3" class="popup_image" type="text" name="image3" value="" size="55" />
            <input class="upload_button" type="button" value="Upload file" id="popup_image_button">
        </div>
        <div class="input">
            <label>Image 4</label>
            <input id="image4" class="popup_image" type="text" name="image4" value="" size="55" />
            <input class="upload_button" type="button" value="Upload file" id="popup_image_button">
        </div>
        <div class="input">
            <label>Number Color</label>
            <div class="colorSelector"><div style=""></div></div>
            <input type="text" name="number_color" id="number_color" value="" size="12" maxlength="12" />
        </div>
        <div class="input">
            <label>Number Background Color</label>
            <div class="colorSelector"><div style=""></div></div>
            <input type="text" name="number_background_color" id="number_background_color" value="" size="12" maxlength="12" />
        </div>
        
        <!-- First step input fieds -->
        <div class="input">
            <label>Step Number 1</label>
            <input name="step_number_1" id="step_number_1" value="" maxlength="12" size="12" />
        </div>
        <div class="input">
            <label>Step Link 1</label>
            <input name="step_link_1" id="step_link_1" value="" maxlength="12" size="12" />
        </div>
        <div class="input">
            <label>Step Link Target 1</label>
            <select name="step_link_target_1" id="step_link_target_1">
                <option value="_blank">Blank</option>
                <option value="_self">Self</option>
                <option value="_parent">Parent</option>
                <option value="_top">Top</option>
            </select>
        </div>
        
        <!-- Second step input fieds -->
        <div class="input">
            <label>Step Number 2</label>
            <input name="step_number_2" id="step_number_2" value="" maxlength="12" size="12" />
        </div>
        <div class="input">
            <label>Step Link 2</label>
            <input name="step_link_2" id="step_link_2" value="" maxlength="12" size="12" />
        </div>
        <div class="input">
            <label>Step Link Target 2</label>
            <select name="step_link_target_2" id="step_link_target_2">
                <option value="_blank">Blank</option>
                <option value="_self">Self</option>
                <option value="_parent">Parent</option>
                <option value="_top">Top</option>
            </select>
        </div>
        
        <!-- Third step input fieds -->
        <div class="input">
            <label>Step Number 3</label>
            <input name="step_number_3" id="step_number_3" value="" maxlength="12" size="12" />
        </div>
        <div class="input">
            <label>Step Link 3</label>
            <input name="step_link_3" id="step_link_3" value="" maxlength="12" size="12" />
        </div>
        <div class="input">
            <label>Step Link Target 3</label>
            <select name="step_link_target_3" id="step_link_target_3">
                <option value="_blank">Blank</option>
                <option value="_self">Self</option>
                <option value="_parent">Parent</option>
                <option value="_top">Top</option>
            </select>
        </div>
        
        <!-- Fourth step input fieds -->
        <div class="input">
            <label>Step Number 4</label>
            <input name="step_number_4" id="step_number_4" value="" maxlength="12" size="12" />
        </div>
        <div class="input">
            <label>Step Link 4</label>
            <input name="step_link_4" id="step_link_4" value="" maxlength="12" size="12" />
        </div>
        <div class="input">
            <label>Step Link Target 4</label>
            <select name="step_link_target_4" id="step_link_target_4">
                <option value="_self">Self</option>
                <option value="_blank">Blank</option>
                <option value="_parent">Parent</option>
                <option value="_top">Top</option>
            </select>
        </div>>

        <div class="input">
            <input type="submit" name="Insert" id="qode_insert_shortcode_button" value="Submit" />
        </div>
    </form>
</div>