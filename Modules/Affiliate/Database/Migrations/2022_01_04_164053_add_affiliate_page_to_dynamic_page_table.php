<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Str;

class AddAffiliatePageToDynamicPageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $registration_route = url('/').'/affiliate/registration';
        $asset = asset('');
        try{
            \Modules\FrontendCMS\Entities\DynamicPage::create([
                'title' =>'Affiliate',
                'slug'  =>'affiliate',
                'status' => 1,
                'is_static' => 0,
                'module' =>'Affiliate',
                'description' => '<div class="row">
        <div class="col-sm-12 ui-resizable" data-type="container-content"><div data-type="component-text">
<div class="affiliate_bradcam_area">
<div class="container">
<div class="row">
<div class="col-lg-10 offset-lg-1">
<div class="breadcam_text text-center"><span>Join Our Affiliate Program</span>
<h3>Become a Part of Our Success Earn Up-to 30% On Affiliate</h3>

<p>We offer attractive referral commissions for each successful</p>
<a class="theme_btn" href="'.$registration_route.'">Join Our Affiliate Family</a></div>
</div>
</div>
</div>
</div>
</div>
<div data-type="component-text">
<div class="lms_section">
<div class="container">
<div class="row justify-content-center">
<div class="col-xl-10">
<div class="commision_box">
<div alt="" class="'.$asset.'Modules/PageBuilder/Resources/assets/img/affiliate/round.svg">&nbsp;</div>

<div class="comissiion_left">
<h4>Commission Rate</h4>

<p class="rate_text">Help Shape the Future of Commerce</p>

<h3>25%</h3>

<p class="Sale_text">For the First Sale</p>
<a class="theme_btn small_btn2" href="#">Create Affiliate Link</a>

<p class="abc">Offers 30% commission for first referral sale If your visitor purchases our product for $99 you will get a $29.7 commission.</p>
</div>

<div class="comissiion_right flex-fill">
<div class="commision_payment_lists">
<div class="commision_payment_list">
<div class="thumb"><img alt="" src="'.$asset.'Modules/PageBuilder/Resources/assets/img/affiliate/wallet_1.svg"></div>

<div class="comission_payment_text">
<h4>Minimum Payout</h4>

<p>Our affiliates always on 16th of the month for sales referred in last month.</p>
</div>
</div>

<div class="commision_payment_list">
<div class="thumb"><img alt="" src="'.$asset.'Modules/PageBuilder/Resources/assets/img/affiliate/wallet_2.svg"></div>

<div class="comission_payment_text">
<h4>Global Payments</h4>

<p>Our affiliates always on 16th of the month for sales referred in last month.</p>
</div>
</div>

<div class="commision_payment_list">
<div class="thumb"><img alt="" src="'.$asset.'Modules/PageBuilder/Resources/assets/img/affiliate/wallet_3.svg"></div>

<div class="comission_payment_text">
<h4>Dedicated Support</h4>

<p>Our affiliates always on 16th of the month for sales referred in last month.</p>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div data-type="component-text">
<div class="lms_section section_padding2">
<div class="container">
<div class="row justify-content-center">
<div class="col-xl-10">
<div class="work_title_area">
<div class="section__title4 "><span class="subheading_text">How Does It Works?</span>
<h3>We’ve Streamlined Affiliate Process</h3>
</div>

<div class="work_title_desc">
<p>Felix is the ultimate product to create unique and powerful experiences online. Easily edit pages and sections to create professional-looking.</p>

<p>We are humans helping other humans succeed and we believe transparency is the key to forging lasting relationships, as we continue to grow.</p>
</div>
</div>

<div class="row justify-content-center">
<div class="col-xl-4 col-lg-4 col-md-6">
<div class="process_widget_box text-center mb_30">
<div class="icon"><img alt="" src="'.$asset.'Modules/PageBuilder/Resources/assets/img/affiliate/process_icon_1.svg"></div>

<h4>Register As Affiliate</h4>

<p>Capib vivamus element senisie vulputa eleifend tellus aenean ligula aene vulputa eleifend.</p>
</div>
</div>

<div class="col-xl-4 col-lg-4 col-md-6">
<div class="process_widget_box text-center mb_30">
<div class="icon"><img alt="" src="'.$asset.'Modules/PageBuilder/Resources/assets/img/affiliate/process_icon_2.svg"></div>

<h4>Register As Affiliate</h4>

<p>Capib vivamus element senisie vulputa eleifend tellus aenean ligula aene vulputa eleifend.</p>
</div>
</div>

<div class="col-xl-4 col-lg-4 col-md-6">
<div class="process_widget_box text-center mb_30">
<div class="icon"><img alt="" src="'.$asset.'Modules/PageBuilder/Resources/assets/img/affiliate/process_icon_3.svg"></div>

<h4>Register As Affiliate</h4>

<p>Capib vivamus element senisie vulputa eleifend tellus aenean ligula aene vulputa eleifend.</p>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div data-type="component-text">
<div class="lms_section section_padding2 affiliate_bg">
<div class="container">
<div class="row justify-content-center">
<div class="col-xl-6 col-lg-8 col-md-8">
<div class="section__title4 text-center margin_52"><span class="subheading_text">Rules and Requirements</span>
<h3>Do’s &amp; Don’ts for an <span>Codethemes</span> Affiliate Partner</h3>
</div>
</div>
</div>

<div class="row justify-content-center">
<div class="col-xl-10">
<div class="Requirements_boxs mb_80">
<div class="single_Requirements_box">
<div class="Requirements_box_head">
<h3>What to Do</h3>
</div>

<div class="Requirements_box_body">
<ul>
	<li>
	<div class="icon"><img alt="" src="'.$asset.'Modules/PageBuilder/Resources/assets/img/affiliate/green_check.svg"></div>

	<p>Engage with the WordPress community and suggest our solutions on relevant threads.</p>
	</li>
	<li>
	<div class="icon"><img alt="" src="'.$asset.'Modules/PageBuilder/Resources/assets/img/affiliate/green_check.svg"></div>

	<p>Write reviews and Blog posts about our products and solutions.</p>
	</li>
	<li>
	<div class="icon"><img alt="" src="'.$asset.'Modules/PageBuilder/Resources/assets/img/affiliate/green_check.svg"></div>

	<p>Spread positive awareness about our products and its features through social channels.</p>
	</li>
	<li>
	<div class="icon"><img alt="" src="'.$asset.'Modules/PageBuilder/Resources/assets/img/affiliate/green_check.svg"></div>

	<p>Publish product comparisons, white papers, infographics, images and case studies.</p>
	</li>
	<li>
	<div class="icon"><img alt="" src="'.$asset.'Modules/PageBuilder/Resources/assets/img/affiliate/green_check.svg"></div>

	<p>Create demo videos and video blogs on our products on your own channels.</p>
	</li>
</ul>
</div>
</div>

<div class="single_Requirements_box">
<div class="Requirements_box_head style2">
<h3>What Not to Do</h3>
</div>

<div class="Requirements_box_body">
<ul>
	<li>
	<div class="icon"><img alt="" src="'.$asset.'Modules/PageBuilder/Resources/assets/img/affiliate/red_cross.svg"></div>

	<p>Spam with links without having a meaningful conversation and in irrelevant threads.</p>
	</li>
	<li>
	<div class="icon"><img alt="" src="'.$asset.'Modules/PageBuilder/Resources/assets/img/affiliate/red_cross.svg"></div>

	<p>Use Blackhat approach and unethical means to manipulate search engines.</p>
	</li>
	<li>
	<div class="icon"><img alt="" src="'.$asset.'Modules/PageBuilder/Resources/assets/img/affiliate/red_cross.svg"></div>

	<p>Spam with links without having a meaningful conversation and in irrelevant threads.</p>
	</li>
	<li>
	<div class="icon"><img alt="" src="'.$asset.'Modules/PageBuilder/Resources/assets/img/affiliate/red_cross.svg"></div>

	<p>Spam with links without having a meaningful conversation and in irrelevant threads.</p>
	</li>
	<li>
	<div class="icon"><img alt="" src="'.$asset.'Modules/PageBuilder/Resources/assets/img/affiliate/red_cross.svg"></div>

	<p>Spam with links without having a meaningful conversation and in irrelevant threads.</p>
	</li>
</ul>
</div>
</div>
</div>

<div class="apply_btn text-center mb_30"><a class="theme_btn min_windth_200 text-center" href="#">Apply Today</a></div>
</div>
</div>
</div>
</div>
</div>
<div data-type="component-text">
<div class="lms_section section_padding2">
<div class="container">
<div class="row justify-content-center">
<div class="col-xl-6 col-lg-8 col-md-8">
<div class="section__title4 text-center margin_50"><span class="subheading_text">Codethemes Affiliate Benefits</span>
<h3 class="m-0">We Follow Industry Standard Practices in Our Affiliate</h3>
</div>
</div>
</div>

<div class="row justify-content-center ">
<div class="col-xl-10">
<div class="Affiliate_benefit_boxs position-relative ">
<div class="row">
<div class="col-xl-4 col-lg-4 col-md-6">
<div class="Affiliate_benefit_box mb_30"><img alt="" src="'.$asset.'Modules/PageBuilder/Resources/assets/img/affiliate/benifit_icon_1.png">
<h4>Up-to $2K commission</h4>

<p>Capib vivamus element senisie aene vulp uta eleifend tellus aenean ligulaene barai element senisie aene.</p>
</div>
</div>

<div class="col-xl-4 col-lg-4 col-md-6">
<div class="Affiliate_benefit_box mb_30"><img alt="" src="'.$asset.'Modules/PageBuilder/Resources/assets/img/affiliate/benifit_icon_2.png">
<h4>Amounts of Creative</h4>

<p>Capib vivamus element senisie aene vulp uta eleifend tellus aenean ligulaene barai element senisie aene.</p>
</div>
</div>

<div class="col-xl-4 col-lg-4 col-md-6">
<div class="Affiliate_benefit_box mb_30"><img alt="" src="'.$asset.'Modules/PageBuilder/Resources/assets/img/affiliate/benifit_icon_3.png">
<h4>Dedicated Mentorship</h4>

<p>Capib vivamus element senisie aene vulp uta eleifend tellus aenean ligulaene barai element senisie aene.</p>
</div>
</div>

<div class="col-xl-4 col-lg-4 col-md-6">
<div class="Affiliate_benefit_box mb_30"><img alt="" src="'.$asset.'Modules/PageBuilder/Resources/assets/img/affiliate/benifit_icon_1.png">
<h4>Weekly Follow-Up</h4>

<p>Capib vivamus element senisie aene vulp uta eleifend tellus aenean ligulaene barai element senisie aene.</p>
</div>
</div>

<div class="col-xl-4 col-lg-4 col-md-6">
<div class="Affiliate_benefit_box mb_30"><img alt="" src="'.$asset.'Modules/PageBuilder/Resources/assets/img/affiliate/benifit_icon_2.png">
<h4>Offers and Promotions</h4>

<p>Capib vivamus element senisie aene vulp uta eleifend tellus aenean ligulaene barai element senisie aene.</p>
</div>
</div>

<div class="col-xl-4 col-lg-4 col-md-6">
<div class="Affiliate_benefit_box mb_30"><img alt="" src="'.$asset.'Modules/PageBuilder/Resources/assets/img/affiliate/benifit_icon_3.png">
<h4>Real-time Reporting</h4>

<p>Capib vivamus element senisie aene vulp uta eleifend tellus aenean ligulaene barai element senisie aene.</p>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div data-type="component-text">
<div class="affliate_faq-section">
<div class="container">
<div class="row justify-content-center">
<div class="col-xl-6 col-lg-8 col-md-8">
<div class="section__title4 text-center margin_52"><span class="subheading_text">Frequently Asked Questions</span>
<h3>Never Hesitate to Reach Out Regarding Any Queries</h3>
</div>
</div>
</div>

<div class="row">
<div class="col-xl-4 col-lg-4 col-md-6">
<div class="affiliate_faq_box mb_25">
<h4>Do you support banking loan?</h4>

<p>Consectetur adipiscing elit maecenas loboes alesuada am pellentesque sitproin mauris quam congue orciodio laoreet quis nisi lacinia gravida onec.</p>
</div>
</div>

<div class="col-xl-4 col-lg-4 col-md-6">
<div class="affiliate_faq_box mb_25">
<h4>How do I open an account?</h4>

<p>Consectetur adipiscing elit maecenas loboes alesuada am pellentesque sitproin mauris quam congue orciodio laoreet quis nisi lacinia gravida onec.</p>
</div>
</div>

<div class="col-xl-4 col-lg-4 col-md-6">
<div class="affiliate_faq_box mb_25">
<h4>How do I open an account?</h4>

<p>Consectetur adipiscing elit maecenas loboes alesuada am pellentesque sitproin mauris quam congue orciodio laoreet quis nisi lacinia gravida onec.</p>
</div>
</div>

<div class="col-xl-4 col-lg-4 col-md-6">
<div class="affiliate_faq_box mb_25">
<h4>How do I open an account?</h4>

<p>Consectetur adipiscing elit maecenas loboes alesuada am pellentesque sitproin mauris quam congue orciodio laoreet quis nisi lacinia gravida onec.</p>
</div>
</div>

<div class="col-xl-4 col-lg-4 col-md-6">
<div class="affiliate_faq_box mb_25">
<h4>How do I open an account?</h4>

<p>Consectetur adipiscing elit maecenas loboes alesuada am pellentesque sitproin mauris quam congue orciodio laoreet quis nisi lacinia gravida onec.</p>
</div>
</div>

<div class="col-xl-4 col-lg-4 col-md-6">
<div class="affiliate_faq_box mb_25">
<h4>How do I open an account?</h4>

<p>Consectetur adipiscing elit maecenas loboes alesuada am pellentesque sitproin mauris quam congue orciodio laoreet quis nisi lacinia gravida onec.</p>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
    </div>',
                'is_page_builder' =>1
            ]);
        }catch(Exception $e){

        }
    }

    public function down()
    {

    }
}
