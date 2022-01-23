<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiteSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_settings', function (Blueprint $table) {
            $table->bigIncrements('id');

            // site identity and seo 
            $table->string('site_full_name')->nullable();
            $table->string('site_short_name')->nullable();
            $table->string('site_domain_name')->nullable();
            $table->string('site_title')->nullable();

            $table->string('site_breadcrumb_background')->nullable();
            $table->string('site_header_logo')->nullable();
            $table->string('site_footer_logo')->nullable();
            $table->string('site_favicon')->nullable();
            $table->string('site_url')->nullable();



            $table->longText('site_meta_title', 300)->nullable();
            $table->string('site_meta_description', 300)->nullable();
            $table->string('site_meta_tags',300)->nullable();
            $table->string('site_op_meta_title', 300)->nullable();
            $table->string('site_op_meta_description', 300)->nullable();
            $table->string('site_op_meta_image', 300)->nullable();
      

            $table->string('site_google_html_file', 300)->nullable();
 
           // site contact info
            $table->string('site_google_map')->nullable();
            $table->string('site_address')->nullable();
            $table->string('site_mobile')->nullable();
            $table->string('site_phone')->nullable();
            $table->string('site_email')->nullable();
            // site social icon
            $table->string('facebook_url')->nullable();
            $table->string('twitter_url')->nullable();
            $table->string('linkedin_url')->nullable();
            $table->string('whatsapp_url')->nullable();
            $table->string('skype_url')->nullable();


               // SMTP Seeting
               $table->string('site_smtp_mail_mailer')->nullable();
               $table->string('site_smtp_mail_host')->nullable();
               $table->string('site_smtp_mail_port')->nullable();
               $table->string('site_smtp_mail_username')->nullable();
               $table->string('site_smtp_mail_encryption')->nullable();
            


             // site  owner or  developer info
             $table->string('site_develop_by')->nullable();
             $table->string('site_developer_url')->nullable();
  

             // site current copy owner info
             $table->string('site_license_no')->nullable();
             $table->date('site_handover_date')->nullable();
             $table->string('site_copyright_owner')->nullable();
             $table->date('site_license_issue')->nullable();
             $table->date('site_license_expire')->nullable();
             $table->tinyInteger('site_is_permanent_license')->default(0);
             

        
            

           
            

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('site_settings');
    }
}
