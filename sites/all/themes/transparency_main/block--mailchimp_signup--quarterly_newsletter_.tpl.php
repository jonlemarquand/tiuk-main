<?php

/**
 * @file
 * Default theme implementation to display a block.
 *
 * Available variables:
 * - $block->subject: Block title.
 * - $content: Block content.
 * - $block->module: Module that generated the block.
 * - $block->delta: An ID for the block, unique within each module.
 * - $block->region: The block region embedding the current block.
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. The default values can be one or more of the
 *   following:
 *   - block: The current template type, i.e., "theming hook".
 *   - block-[module]: The module generating the block. For example, the user
 *     module is responsible for handling the default user navigation block. In
 *     that case the class would be 'block-user'.
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 *
 * Helper variables:
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 * - $block_zebra: Outputs 'odd' and 'even' dependent on each block region.
 * - $zebra: Same output as $block_zebra but independent of any block region.
 * - $block_id: Counter dependent on each block region.
 * - $id: Same output as $block_id but independent of any block region.
 * - $is_front: Flags true when presented in the front page.
 * - $logged_in: Flags true when the current user is a logged-in member.
 * - $is_admin: Flags true when the current user is an administrator.
 * - $block_html_id: A valid HTML ID and guaranteed unique.
 *
 * @see template_preprocess()
 * @see template_preprocess_block()
 * @see template_process()
 *
 * @ingroup themeable
 */
?>
<div id="<?php print $block_html_id; ?>" class="<?php print $classes; ?>"<?php print $attributes; ?>>
    
<div class="newsletter" data-ix="fieldexpand">
    <div class="container">
        <div class="form-wrapper-2">
            <div class="w-row">
            <div class="w-col w-col-4"><h3 class="recommendTitle">STAY INFORMED</h3><div>Sign up for updates on our work and <br />
            corruption news from around the globe:</div></div>
             <div class="w-col w-col-8 mchimp-form-padding">  
                    <!-- Begin Mailchimp Signup Form -->
<link href="//cdn-images.mailchimp.com/embedcode/classic-10_7.css" rel="stylesheet" type="text/css">
<style type="text/css">
	#mc_embed_signup{background:#3695d8; clear:left; color: #333; font:14px "Raleway",sans-serif; }
	/* Add your own Mailchimp form style overrides in your site stylesheet or in this style block.
	   We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
</style>
<style type="text/css">
	#mc-embedded-subscribe-form input[type=checkbox]{display: inline; width: auto;margin-right: 10px;}
	#mergeRow-gdpr {margin-top: 20px; color: #fff;}
	#mergeRow-gdpr fieldset label {font-weight: normal;}
	#mc-embedded-subscribe-form .mc_fieldset{border:none;min-height: 0px;padding-bottom:0px;}
</style>
<div id="mc_embed_signup">
<form action="https://transparency.us8.list-manage.com/subscribe/post?u=cd87957c772f7bc847e157914&amp;id=3dfcdd62c1" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
    <div id="mc_embed_signup_scroll">
        <div class="w-col w-col-6">
                <div class="mc-field-group">
                    <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL" placeholder="Email Address">
                </div>
                <div class="fieldexpand">
                <div class="mc-field-group">
                    <input type="text" value="" name="FNAME" class="" id="mce-FNAME" placeholder="First Name">
                </div>
                <div class="mc-field-group">
                    <input type="text" value="" name="LNAME" class="" id="mce-LNAME" placeholder="Last Name">
                </div>
                </div>
            
        </div>
        <div class="w-col w-col-6">
            <!--<div class="mc-field-group">
                <input type="text" value="" name="MMERGE3" class="" id="mce-MMERGE3" placeholder="Job title">
            </div>
            <div class="mc-field-group">
                <input type="text" value="" name="MMERGE4" class="" id="mce-MMERGE4" placeholder="Organisation">
            </div>-->
            <div id="mergeRow-gdpr" class="mergeRow gdpr-mergeRow content__gdprBlock fieldexpand" style="margin:0">
                <div class="content__gdpr">
                <!--<label>Permissions</label>
                <p style="font-size:10px">Transparency International UK will only use the information you provide on this form to be in touch with you with news and fundraising updates and information about events.</p>-->
                <p>Transparency International UK will only use the information you provide on this form to be in touch with you with news, fundraising updates and information about events</p>
                <fieldset class="mc_fieldset gdprRequired mc-field-group" name="interestgroup_field">
                <label class="checkbox subfield" for="gdpr_1853"><input type="checkbox" id="gdpr_1853" name="gdpr[1853]" value="Y" class="av-checkbox "><span>I agree to be contacted by e-mail for the purposes stated above.</span> </label>
                </fieldset>
                
            </div>
            <!--<div class="content__gdprLegal">
                <p>We use Mailchimp as our marketing platform. By clicking below to subscribe, you acknowledge that your information will be transferred to Mailchimp for processing. <a href="https://mailchimp.com/legal/" target="_blank">Learn more about Mailchimp's privacy practices here.</a></p>
            </div>-->
        </div>
        <div id="mce-responses" class="clear">
            <div class="response" id="mce-error-response" style="display:none"></div>
            <div class="response" id="mce-success-response" style="display:none"></div>
        </div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
        <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_cd87957c772f7bc847e157914_3dfcdd62c1" tabindex="-1" value=""></div>
        <div class="clear"><input type="submit" value="Sign up" name="subscribe" id="mc-embedded-subscribe" class="submit-button w-button" style="background-image:none"></div>
    </div>
    </div>
</form>
</div>
<script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';fnames[3]='MMERGE3';ftypes[3]='text';fnames[4]='MMERGE4';ftypes[4]='text';}(jQuery));var $mcj = jQuery.noConflict(true);</script>
<!--End mc_embed_signup-->
            <?php //print $content ?>
                </div>
                </div>
        </div></div>
</div>
</div>
