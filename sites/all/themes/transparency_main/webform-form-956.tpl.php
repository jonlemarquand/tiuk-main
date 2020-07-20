<?php

/**
 * @file
 * Customize the display of a complete webform.
 *
 * This file may be renamed "webform-form-[nid].tpl.php" to target a specific
 * webform on your site. Or you can leave it "webform-form.tpl.php" to affect
 * all webforms on your site.
 *
 * Available variables:
 * - $form: The complete form array.
 * - $nid: The node ID of the Webform.
 *
 * The $form array contains two main pieces:
 * - $form['submitted']: The main content of the user-created form.
 * - $form['details']: Internal information stored by Webform.
 *
 * If a preview is enabled, these keys will be available on the preview page:
 * - $form['preview_message']: The preview message renderable.
 * - $form['preview']: A renderable representing the entire submission preview.
 */
?>
<?php
  // Print out the progress bar at the top of the page
  print drupal_render($form['progressbar']);

  // Print out the preview message if on the preview page.
  if (isset($form['preview_message'])) {
    print '<div class="messages warning">';
    print drupal_render($form['preview_message']);
    print '</div>';
  }

  // Print out the main part of the form.
  // Feel free to break this up and move the pieces within the array.
  //print drupal_render($form['submitted']);

  // Always print out the entire $form. This renders the remaining pieces of the
  // form that haven't yet been rendered above (buttons, hidden elements, etc).
//print_r($form);

//print drupal_render_children($form);
print '<form id="'.$form['#id'].'" accept-charset="UTF-8" method="'.$form['#method'].'" action="'.$form['#action'].'">'; 
//print drupal_render_children($form); 
//print render($form);
//print drupal_render($form['submitted']['name']);


?>
<div class="w-tab-pane w--tab-active bigTab t1" data-w-tab="Tab 1" style="">
  <div class="centrerow tall w-row">
    <div class="w-col w-col-7">
      <h3 class="donatehead">TI-UK MEMBERSHIP APPLICATION&nbsp;FORM</h3>
      <div class="w-richtext">
        <ul>
          <li>To become a member, there is an application process - the online form should be completed, and the application has to be approved by the Transparency International UK Board. Members pay an annual fee or 1-off payment for life membership.</li>
          <li>Members are required to sign the declaration agreeing to uphold the "Vision, Values and Guiding Principles for Transparency International"</li>
          <li>Members are invited to the full range of our events, and receive our periodic news updates.</li>
          <li>Members are able to attend the formal business section of the charity's Annual General Meeting and vote on resolutions - for example, electing members of the Board.</li>
        </ul>
      </div>
    </div>
    <div class="mafcol2 w-col w-col-5">
      <div class="w-form">
          <div class="diversityblock">
              <h3>I,</h3>
              <div><em>(please enter full name)</em></div>
              <?php print drupal_render($form['submitted']['name']); ?>
              <h3>Of</h3>
              <div><em>(personal address, email and phone number)</em></div>
              <?php print drupal_render($form['submitted']['address_line_1']); ?>
              <?php print drupal_render($form['submitted']['address_line_2']); ?>
              <?php print drupal_render($form['submitted']['city']); ?>
              <?php print drupal_render($form['submitted']['country']); ?>
              <?php print drupal_render($form['submitted']['postcode']); ?>
              <?php print drupal_render($form['submitted']['phone_number']); ?>
              <?php print drupal_render($form['submitted']['e_mail']); ?>
          </div>
      </div>
    </div>
  </div>
</div>
<div class="w-tab-pane bigTab t2" data-w-tab="Tab 2" style="">
  <div class="centrerow tall w-row">
    <div class="w-col w-col-7">
      <!--<h3 class="donatehead">Motivations and Interest in becoming a member</h3>-->
      <div class="w-richtext">
        <h3>Our vision</h3><p>A world in which government, politics, business, civil society and the daily lives of people are free of corruption.</p><h3>Our values</h3><p>Transparency, Accountability, Integrity, Solidarity, Courage, Justice, Democracy&nbsp;</p><h3>Our guiding principles</h3><p>We are a civil society organisation committed to respecting the following principles:</p><p>As coalition builders, we will work cooperatively with all individuals and groups, with for profit and not for profit corporations and organisations, and with governments and international bodies committed to the fight against corruption, subject only to the policies and priorities set by our governing bodies.</p><p>We undertake to be open, honest and accountable in our relationships with everyone we work with and with each other.</p><p>We will be democratic, politically non partisan and non sectarian in our work.</p><p>We will condemn bribery and corruption vigorously and courageously wherever it has been reliably identified.</p><p>The positions we take will be based on sound, objective and professional analysis and high standards of research.</p><p>We will only accept funding that does not compromise our ability to address issues freely, thoroughly and objectively.</p><p>We will provide accurate and timely reports of our activities to our stakeholders.</p><p>We will respect and encourage respect for fundamental rights and freedoms.</p><p>We are committed to building, working with and working through national chapters worldwide.</p><p>We will strive for balanced and diverse representation on our governing bodies.</p><p>As one global movement, we stand in solidarity with each other and we will not act in ways that may adversely affect other Chapters or the TI movement as a whole.</p><p><em>Adopted by the TI AMM in Prague, 06 October 2001 updated by the TI AMM in Bali, 28 October 2007 and by the AMM in Berlin, 16 October 2011.</em></p>
      </div>
    </div>
    <div class="mafcol2 w-col w-col-5">
      <div class="w-form">
          <div class="diversityblock">
            <h3>I do hereby affirm that;</h3>
            <div class="w-checkbox">
                <?php print drupal_render($form['submitted']['i_agree_to_uphold']); ?>
            </div>
            <div class="w-checkbox">
                <?php print drupal_render($form['submitted']['i_apply_to_become_a_member']); ?>
              </div>
            <div class="w-checkbox">
                <?php print drupal_render($form['submitted']['i_am_applying_independently']); ?>
              </div>
            <div class="w-checkbox">
                <?php print drupal_render($form['submitted']['i_am_uk_national']); ?>
              </div>
            <div class="w-checkbox">
                <?php print drupal_render($form['submitted']['i_agree_to_be_contacted']); ?>
              </div>
          </div>
      </div>
    </div>
  </div>
</div>
<div class="w-tab-pane bigTab t3" data-w-tab="Tab 3" style="">
    <div class="centrerow tall w-row">
        <div class="w-col w-col-7">
          <h3 class="donatehead">Motivations and Interest in becoming a member</h3>
          <div class="w-richtext">
            <p>As part of the application process, and to help ensure transparency, we would like to know a little more about your motivations and interests.</p>
              <p>We'd recommend copy and pasting your answers into the boxes provided. Please also upload a CV or biography.</p>
          </div>
        </div>
        <div class="mafcol2 w-col w-col-5">
          <div class="w-form">
              <div class="diversityblock">
                <h3>Please write a brief written statement outlining your motivation for becoming a member of TI-UK</h3>
                <?php print drupal_render($form['submitted']['a_brief_written_statement_outlining_motivation_for_becoming_a_member']); ?>
              </div>
              <div class="diversityblock">
                <h3>Do you have any interest in particular aspects of TI-UK’s work?</h3>
                <?php print drupal_render($form['submitted']['interest_in_particular_aspects_of_ti_uks_work']); ?>
              </div>
          </div>
        </div>
      </div>
</div>
<!--<div class="w-tab-pane bigTab" data-w-tab="Tab 4" style="">
    <div class="centrerow tall w-row">
        <div class="w-col w-col-7">
          <h3 class="donatehead">SUMMARY CV OR BIOGRAPHY</h3>
          <div class="w-richtext">
            <p>Please use the form to upload or write a summary CV or Biography.</p>
          </div>
        </div>
        <div class="mafcol2 w-col w-col-5">
          <div class="diversityblock">
            <h3>PLEASE SELECT HOW YOU WOULD LIKE TO INPUT YOUR CV</h3>
            <div class="w-tabs" data-duration-in="300" data-duration-out="100">
              <div class="tabs-menu w-tab-menu">
                <a class="tab-link w-inline-block w-tab-link w--current fields" data-item="fields" data-w-tab="Tab 1x">
                  <div>TEXT INPUT</div>
                </a>
                <a class="tab-link w-inline-block w-tab-link fields" data-item="fields"  data-w-tab="Tab 2x">
                  <div>UPLOAD FILE</div>
                </a>
              </div>
              <div class="w-tab-content"> 
                <div class="w-tab-pane w--tab-active fields" data-w-tab="Tab 1x"  style="opacity: 1; transition: opacity 300ms;">
                  <div class="w-form">
                      <div class="w-richtext">
                        <p>Please type or paste your CV into the field below. <em>(This could also be a link to your online CV for example)</em></p>
                      </div>
                      <?php print drupal_render($form['submitted']['my_cv_bio']); ?>
                  </div>
                </div>
                <div class="w-tab-pane fields" data-w-tab="Tab 2x" style="">
                    <div class="text-block-5"><?php print drupal_render($form['submitted']['cv_bio_file']); ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
</div>-->
<div class="w-tab-pane bigTab t4" data-w-tab="Tab 4" style="">
   <div class="centrerow tall w-row">
    <div class="w-col w-col-7">
      <h3 class="donatehead">DIVERSITY MONITORING FORM (OPTIONAL)</h3>
      <div class="w-richtext">
        <p>To ensure that our procedures do not discriminate, and to analyse whether our member applicants are representative of the population, we ask all prospective members to complete a monitoring form. It is not obligatory, but we strongly encourage applicants to complete it. This form will be treated in the strictest confidence.</p>
        <p>Please note that we will not use this information as part of the membership acceptance process. The information you provide will be used for statistical purposes only. It will help us fulfil our commitment to equal opportunities if you would complete all sections of this form.
        </p>
        <p>The information given will be used in compliance with the requirements of the Data Protection Act 1998.
        </p>
      </div>
    </div>
    <div class="mafcol2 w-col w-col-5">
      <div class="diversityblock w-form">
        <h3>1. How Did you learn about TI-UK</h3>
          <?php print drupal_render($form['submitted']['how_did_you_learn_about_ti_uk']); ?>
          <?php print drupal_render($form['submitted']['employer_specify']); ?>
          <?php print drupal_render($form['submitted']['other_specify_how_did_you_learn_about_ti_uk']); ?>
      </div>
        <div class="diversityblock w-form">
        <h3>2. Gender</h3>
        <?php print drupal_render($form['submitted']['gender']); ?>
      </div>

      <div class="diversityblock w-form">
        <h3>3. Ethnic origin</h3>
        <div class="w-row">
            <?php print drupal_render($form['submitted']['ethnic_origin']); ?>
            <?php print drupal_render($form['submitted']['white_specify']); ?>
            <?php print drupal_render($form['submitted']['mised_specify']); ?>
            <?php print drupal_render($form['submitted']['black_specify']); ?>
            <?php print drupal_render($form['submitted']['asian_specify']); ?>
            <?php print drupal_render($form['submitted']['any_other']); ?>
        </div>
          <!--
        <div class="w-row">
            <div class="w-col w-col-6">
              <div class="w-richtext">
                <h3><em>A WHITE</em></h3>
              </div>
                  <?php print drupal_render($form['submitted']['ethnic_origin']['British']); ?>
                  <?php print drupal_render($form['submitted']['ethnic_origin']['Irish']); ?>
                  <?php print drupal_render($form['submitted']['ethnic_origin']['Any other white background']); ?>
              <?php print drupal_render($form['submitted']['white_specify']); ?>
            </div>
            <div class="w-col w-col-6">
              <div class="w-richtext">
                <h3><em>B Mixed</em></h3>
              </div>
              <?php print drupal_render($form['submitted']['ethnic_origin']['White and black Caribbean']); ?>
            <?php print drupal_render($form['submitted']['ethnic_origin']['White and black African']); ?>
                <?php print drupal_render($form['submitted']['ethnic_origin']['White and Asian']); ?><?php print drupal_render($form['submitted']['ethnic_origin']['Any other mixed background']); ?>
              <?php print drupal_render($form['submitted']['mised_specify']); ?>
          </div>
          </div>
          <div class="w-row">
            <div class="w-col w-col-6">
              <div class="w-richtext">
                <h3><em>C Asian or Asian British</em></h3>
              </div>
              <?php print drupal_render($form['submitted']['ethnic_origin']['Indian']); ?>
                <?php print drupal_render($form['submitted']['ethnic_origin']['Pakistani']); ?>
                <?php print drupal_render($form['submitted']['ethnic_origin']['Bangladeshi']); ?>
                <?php print drupal_render($form['submitted']['ethnic_origin']['Any other Asian background']); ?>
              <?php print drupal_render($form['submitted']['asian_specify']); ?>
              </div>
            <div class="w-col w-col-6">
              <div class="w-richtext">
                <h3><em>D Black or Black British</em></h3>
              </div>
              <?php print drupal_render($form['submitted']['ethnic_origin']['Caribbean']); ?>
                <?php print drupal_render($form['submitted']['ethnic_origin']['African']); ?>
                <?php print drupal_render($form['submitted']['ethnic_origin']['Any other black background']); ?>
              <?php print drupal_render($form['submitted']['any_other']); ?>
              
              </div>
          </div>
          <div class="w-row">
            <div class="w-col w-col-6">
              <div class="w-richtext">
                <h3><em>E Chinese or other ethnic group</em></h3>
              </div>
              <?php print drupal_render($form['submitted']['ethnic_origin']['Chinese']); ?>
                <?php print drupal_render($form['submitted']['ethnic_origin']['Any other']); ?>
              <?php print drupal_render($form['submitted']['white_specify']); ?>
              </div>
            <div class="w-col w-col-6"></div>
          </div>
            -->
      </div>
      <div class="diversityblock w-form">
        <h3>4. RELIGION</h3>
        <div class="w-row">
            <?php print drupal_render($form['submitted']['religion']); ?>
             <?php print drupal_render($form['submitted']['other_specify_religion']); ?>
          </div>
      </div>
      <div class="diversityblock w-form">
        <h3>5. Age</h3>
        <?php print drupal_render($form['submitted']['age']); ?>
      </div>
      <div class="diversityblock w-form">
        <h3>6. Do you consider yourself to have a disability?</h3>

          <div class="w-row">
            <div class="w-col w-col-6">
                  <?php print drupal_render($form['submitted']['disability_impairment']['Yes']); ?>
             </div>
            <div class="w-col w-col-6">
                  <?php print drupal_render($form['submitted']['disability_impairment']['No']); ?>
            </div>
          </div>
      </div>
      <!--<div class="diversityblock w-form">
        <h3>DECLARATION</h3>
        <div class="w-richtext">
          <p>I understand and give my consent that the information I provide on this diversity monitoring form will be processed and retained in accordance with the Data Protection Act 1998. I understand that the information provided on this form will not be used as part of the membership acceptance process.</p>
        </div>
          <div class="w-checkbox">
             <?php print drupal_render($form['submitted']['declaration_of_consent']); ?>
          </div>
      </div>-->
      
    </div>
  </div>
</div>
<div class="w-tab-pane bigTab t5" data-w-tab="Tab 5" style="">
  <div class="centrerow tall w-row">
    <div class="w-col w-col-7">
      <h3 class="donatehead">PAYMENT DETAILS</h3>
      <div class="w-richtext">
          <p>Since membership applications need approval, we cannot take your payment right away. We will let you know as and when your membership application has been approved (which will usually be within three months), and will remind you then about the ways to pay. However, you can tick the Gift Aid box now.</p>
        <h3>Methods of Payment</h3>
        <p>Once accepted as a member, there are 4 different payment methods:</p>
        <ul>
          <li data-new-link="true">Online</li>
          <li>Call the Membership Team at 020 3096 7675 with your card detailss</li>
          <li data-new-link="true">Set up a standing order</li>
          <li>Send a cheque made payable to 'Transparency International UK' (if you send a cheque with your application, we will only cash it if your application is accepted.</li>
        </ul>
        <h3>Your donation</h3>
        <p>Standard membership donation levels are:</p>
        <ul>
          <li>Membership £40 pa</li>
          <li>Life Membership £1,000</li>
        </ul>
        <p>If you are able to make <strong>an additional donation</strong> of any size, it is extremely valuable to us.</p>
      </div>
    </div>
    <div class="mafcol2 w-clearfix w-col w-col-5">
      <div class="diversityblock w-form" data-ix="hide-button">
        <h3>Gift Aid Declaration – please complete if you are a UK taxpayer</h3>
        <div class="w-richtext">
          <p>I am a UK taxpayer and I want Transparency International UK to treat this donation and any donations I make in the future or have made in the past 4 years to be treated as GiftAid donations. I also understand that if I pay less Income Tax and/or Capital Gains Tax than the amount of Gift Aid claimed on all my donations in that tax year it is my responsibility to pay any difference</p>
              <?php print drupal_render($form['submitted']['gift_aid_declaration']); ?>
            </div>
      </div>
      <?php 
        $form['actions']['submit']['#attributes']['class'][]='completebutton';
        $form['actions']['submit']['#attributes']['class'][]='w-button';
        print drupal_render($form['actions']['submit']); ?>
      </div>
  </div>
</div>
<?php 
print drupal_render($form['form_id']);
print drupal_render($form['form_build_id']);
print drupal_render($form['form_token']);
print '</form>';
?>