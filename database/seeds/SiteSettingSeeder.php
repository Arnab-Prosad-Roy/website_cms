<?php

use Illuminate\Database\Seeder;

class SiteSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('site_settings')->insert([

            // site identity and seo 
                 'site_full_name' => 'Scientific Calculator Online',
                 'site_short_name' => 'SCO',
                 'site_title' => 'Scientific Calculator Online',


            // 'site_header_logo' =>  'frontend/images/default/logo.svg',
            // 'site_footer_logo' =>  'frontend/images/default/logo.svg',
            // 'site_favicon' =>  'frontend/images/default/logo.svg',
            // 'site_breadcrumb_background' => 'http://scientificcalculatoronline.com',
            // 'site_url' => 'http://scientificcalculatoronline.com',


            // 'site_meta_title' => 'Get the best idea about scientific calculator online! We also cover online general calculator, weight calculator, date calculator, age calculator, time calculator,  binary calculator , percentage calculator and many more',
            // 'site_meta_description' => 'scientific calculator online, online scientific calculator ,scientific calculator, general calculator, weight calculator, date calculator, age calculator, time calculator,  binary calculator, percentage calculator , online calculator',
            // 'site_meta_keywords' => 'scientific calculator online, online scientific calculator ,scientific calculator, general calculator, weight calculator, date calculator, age calculator, time calculator,  binary calculator, percentage calculator , online calculator',


            // 'site_op_meta_title' => 'Get the best idea about scientific calculator online! We also cover online general calculator, weight calculator, date calculator, age calculator, time calculator,  binary calculator , percentage calculator and many more',
            // 'site_op_meta_description' => 'scientific calculator online, online scientific calculator ,scientific calculator, general calculator, weight calculator, date calculator, age calculator, time calculator,  binary calculator, percentage calculator , online calculator',
            // 'site_op_meta_name' => 'scientific calculator online, online scientific calculator ,scientific calculator, general calculator, weight calculator, date calculator, age calculator, time calculator,  binary calculator, percentage calculator , online calculator',
            // 'site_op_meta_url' => 'scientific calculator online, online scientific calculator ,scientific calculator, general calculator, weight calculator, date calculator, age calculator, time calculator,  binary calculator, percentage calculator , online calculator',

            // 'site_google_html_file' => 'scientific calculator online, online scientific calculator ,scientific calculator, general calculator, weight calculator, date calculator, age calculator, time calculator,  binary calculator, percentage calculator , online calculator',
                


               // stie contact info
                // 'site_google_map' =>  'https://maps.google.com/maps?q=dubai&t=&z=13&ie=UTF8&iwloc=&output=embed',
                // 'site_address' => 'Mouchak Road, Shiddhirganj, Narayanganj,Dhaka',
                // 'site_phone' => '+8801000000',
                // 'site_mobile' => '+8801000000',
                // 'site_email' => 'demo@gamil.com',

                
                // stie social icon
                // 'facebook_url' => 'https://www.facebook.com',
                // 'twitter_url' => 'https://twitter.com',
                // 'linkedin_url' => 'https://www.linkedin.com',
                // 'gamil_url' => 'https://www.linkedin.com',
                // 'whatsapp_url' => 'https://www.linkedin.com',
                // 'skyp_url' => 'https://www.linkedin.com',

            // site copyright owner or  developer info

            // 'site_develop_by' => 'Dummy Text',
            // 'site_developer_url' => 'Dummy Text',
             

            //  // site current copy owner info

            // 'site_license_no' => 'Dummy Text',
            // 'site_handover_date' => date('Y-m-d'),
            // 'site_copyright_owner' => 'Dummy Text',
            // 'site_license_issue' => date('Y-m-d'),
            // 'site_license_expire' => date('Y-m-d'),
            // 'site_is_permanent_license' => 0,
         

             
                
        ]);
    }
}
