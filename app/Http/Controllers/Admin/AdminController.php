<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\SiteSetting;
use Session;
use DB;


use App\TeamMember;
use App\Testimonial;
use App\PostType;
use App\Post;
use App\QuestionAnswer;




class AdminController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
        cache()->forget('siteSetting');
    }

 
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      
        return view('backend.home.index',\get_defined_vars());
    }
    public function basicSetting()
    {
        // return 1;
        $siteSetting = SiteSetting::firstOrFail();
        return view('backend.setting.basic-setting',\get_defined_vars());
    }

     public function updateBasicSetting(Request $request)
    {
        $this->validate($request,[
            'site_name' => 'nullable|max:255',
            'site_domain_name' => 'nullable|max:255',
            'site_title' => 'nullable|max:255',
    
        ]);
        $siteSetting = SiteSetting::firstOrFail();
        $siteSetting->site_name = $request->site_name;
        $siteSetting->site_title = $request->site_title;
        $siteSetting->site_domain_name = $request->site_domain_name;
        $siteSetting->save();


       Session::flash('success','Information Saved Successfully..');
       return back();
    }


    public function viewSiteContact(){
        $siteSetting = SiteSetting::firstOrFail();
        return view('backend.setting.contact-info',\get_defined_vars());
    }

    public function updateSiteContact(Request $request)
    {
        $this->validate($request,[
            'site_google_map' => 'nullable|max:255',
            'site_address' => 'nullable|max:255',
            'site_mobile' => 'nullable|max:255',
            'site_email' => 'nullable|max:255',
        ]);
       

        $siteSetting = SiteSetting::firstOrFail();
        $siteSetting->site_google_map = $request->site_google_map;
        $siteSetting->site_address = $request->site_address;
        $siteSetting->site_phone = $request->site_phone;
        $siteSetting->site_mobile = $request->site_mobile;
        $siteSetting->site_email = $request->site_email;
         $siteSetting->save();


       Session::flash('success','Information Saved Successfully..');
       return back();
    }


    public function viewSiteSeo(){
        $siteSetting = SiteSetting::firstOrFail();
        return view('backend.setting.seo-info',\get_defined_vars());
    }

    public function updateSiteSeo(Request $request)
    {
        $this->validate($request,[
            'site_meta_title' => 'nullable|max:300',
            'site_meta_description' => 'nullable|max:300',
            'site_meta_tags' => 'nullable|max:300',
            'site_op_meta_title' => 'nullable|max:300',
            'site_op_meta_description' => 'nullable|max:300',
            'site_op_meta_image' => 'required|image|mimes:jpeg,png,jpg,svg',
        ]);
       
       
        DB::beginTransaction();
        try{

        $siteSetting = SiteSetting::firstOrFail();
        $siteSetting->site_meta_title = $request->site_meta_title;
        $siteSetting->site_meta_description = $request->site_meta_description;
        $siteSetting->site_meta_tags = $request->site_meta_tags;
        $siteSetting->site_op_meta_title = $request->site_op_meta_title;
        $siteSetting->site_op_meta_description = $request->site_op_meta_description;
        $siteSetting->site_op_meta_image = $request->site_op_meta_image;
        
            if($request->hasFile('site_op_meta_image')){
                if($siteSetting->site_op_meta_image){
                    @unlink(public_path().'/'.$siteSetting->site_op_meta_image);
                }
                $originalImage = $request->file('site_op_meta_image');
                $imagePath = 'assets/images/site-images/';
                $imageName = uniqid().time().'logo.'.$originalImage->getClientOriginalExtension();
                $imageFullPath = $imagePath.$imageName;
                $originalImage->move(public_path().'/'.$imagePath,$imageName);
                $siteSetting->site_op_meta_image =  $imageFullPath;
            }

            $siteSetting->save();

            DB::commit();
            $status = true;
        
        }catch(\Exception  $e){
            $message = $e->getMessage();
            DB::rollback();
            $status = false;
            return back()->with('error','Please fill out form correctly...');
        }

      
        Session::flash('success','Information Saved Successfully..');
        return back();


    }




    


 

    public function viewSiteIdentity(){
        $siteSetting = SiteSetting::firstOrFail();
        return view('backend.setting.site-identity',\get_defined_vars());
    }

    
    public function updateHeaderSiteLogo(Request $request)
    {
    //   return $request->all();


        $this->validate($request,[
            'site_header_logo' => 'required|image|mimes:jpeg,png,jpg,svg',
        ]);

        DB::beginTransaction();



        try{

            $siteSetting = SiteSetting::firstOrFail();
          
           
        
        if($request->hasFile('site_header_logo')){

             if($siteSetting->site_header_logo){
                @unlink(public_path().'/'.$siteSetting->site_header_logo);
            }

            $originalImage = $request->file('site_header_logo');
            $imagePath = 'assets/images/site-images/';
            $imageName = uniqid().time().'logo.'.$originalImage->getClientOriginalExtension();
            $imageFullPath = $imagePath.$imageName;
            $originalImage->move(public_path().'/'.$imagePath,$imageName);
            $siteSetting->site_header_logo =  $imageFullPath;
        }

            $siteSetting->save();

            DB::commit();
            $status = true;
        
        }catch(\Exception  $e){
            $message = $e->getMessage();
            DB::rollback();
            $status = false;
            return back()->with('error','Please fill out form correctly...');
        }

      
        Session::flash('success','Information Saved Successfully..');
        return back();
    }



  
    public function updateFooterSiteLogo(Request $request)
    {
    //   return $request->all();


        $this->validate($request,[
            'site_footer_logo' => 'required|image|mimes:jpeg,png,jpg,svg,webp',
        ]);

        DB::beginTransaction();



        try{

            $siteSetting = SiteSetting::firstOrFail();
          
           
        
        if($request->hasFile('site_footer_logo')){

             if($siteSetting->site_footer_logo){
                @unlink(public_path().'/'.$siteSetting->site_footer_logo);
            }

            $originalImage = $request->file('site_footer_logo');
            $imagePath = 'assets/images/site-images/';
            $imageName = uniqid().time().'logo.'.$originalImage->getClientOriginalExtension();
            $imageFullPath = $imagePath.$imageName;
            $originalImage->move(public_path().'/'.$imagePath,$imageName);

            $siteSetting->site_footer_logo =  $imageFullPath;
        }

            $siteSetting->save();

            DB::commit();
            $status = true;
        
        }catch(\Exception  $e){
            $message = $e->getMessage();
            DB::rollback();
            $status = false;
            return back()->with('error','Please fill out form correctly...');
        }

      
        Session::flash('success','Information Saved Successfully..');
        return back();
    }



    


    public function updateBreadcrumbBackgroundImage(Request $request)
    {
    //   return $request->all();


        $this->validate($request,[
            'site_breadcrumb_background' => 'required|image|mimes:jpeg,png,jpg,svg',
        ]);

        DB::beginTransaction();



        try{

            $siteSetting = SiteSetting::firstOrFail();
          
           
        
        if($request->hasFile('site_breadcrumb_background')){

             if($siteSetting->site_breadcrumb_background){
                @unlink(public_path().'/'.$siteSetting->site_breadcrumb_background);
            }

            $originalImage = $request->file('site_breadcrumb_background');
            $imagePath = 'assets/images/site-images/';
            $imageName = uniqid().time().'logo.'.$originalImage->getClientOriginalExtension();
            $imageFullPath = $imagePath.$imageName;
            $originalImage->move(public_path().'/'.$imagePath,$imageName);
           
            $siteSetting->site_breadcrumb_background =  $imageFullPath;
        }

            $siteSetting->save();

            DB::commit();
            $status = true;
        
        }catch(\Exception  $e){
            $message = $e->getMessage();
            DB::rollback();
            $status = false;
            return back()->with('error','Please fill out form correctly...');
        }

      
        Session::flash('success','Information Saved Successfully..');
        return back();
    }





    public function viewSiteSocialLink(){
           $siteSetting = SiteSetting::firstOrFail();
        return view('backend.setting.social-link',\get_defined_vars());
    }

     public function updateSiteSocialLink(Request $request)
    {

       $this->validate($request,[
            'facebook_url' => 'nullable|max:255',
            'twitter_url' => 'nullable|max:255',
            'linkedin_url' => 'nullable|max:255',
            'whatsapp_url' => 'nullable|max:255',
            'skype_url' => 'nullable|max:255',
        ]);
       

        $siteSetting = SiteSetting::firstOrFail();
        $siteSetting->facebook_url = $request->facebook_url;
        $siteSetting->twitter_url = $request->twitter_url;
        $siteSetting->linkedin_url = $request->linkedin_url;
        $siteSetting->whatsapp_url = $request->whatsapp_url;
        $siteSetting->skype_url = $request->skype_url;
         $siteSetting->save();

       Session::flash('success','Information Saved Successfully..');
       return back();
    }


    
    public function viewSiteSMTPSetting(){
        $siteSetting = SiteSetting::firstOrFail();
        return view('backend.setting.smtp-setting',\get_defined_vars());
    }
    protected function changeEnv($data = array()){
        if(count($data) > 0){

            // Read .env-file
            $env = file_get_contents(base_path() . '/.env');

            // Split string on every " " and write into array
            $env = preg_split('/\s+/', $env);;

            // Loop through given data
            foreach((array)$data as $key => $value){

                // Loop through .env-data
                foreach($env as $env_key => $env_value){

                    // Turn the value into an array and stop after the first split
                    // So it's not possible to split e.g. the App-Key by accident
                    $entry = explode("=", $env_value, 2);

                    // Check, if new key fits the actual .env-key
                    if($entry[0] == $key){
                        // If yes, overwrite it with the new one
                        $env[$env_key] = $key . "=" . $value;
                    } else {
                        // If not, keep the old one
                        $env[$env_key] = $env_value;
                    }
                }
            }

            // Turn the array back to an String
            $env = implode("\n\n", $env);

            // And overwrite the .env with the new data
            file_put_contents(base_path() . '/.env', $env);

            return true;
        } else {
            return false;
        }
    }

    public function updateSiteSMTPSetting(Request $request){

        // return $request->all();

        // $db_env = [
        //     'DB_DATABASE'   => 'new_db_name',
        //     'DB_USERNAME'   => 'new_db_user',
        //     'DB_HOST'       => 'new_db_host',
        //     'APP_NAME'       => 'aaa',
        // ];

        $mail_env = [
                'MAIL_DRIVER'   => $request->site_smtp_mail_mailer,
                'MAIL_HOST'   => $request->site_smtp_mail_host,
                'MAIL_PORT'       => $request->site_smtp_mail_port,
                'MAIL_USERNAME'       => $request->site_smtp_mail_username,
                'MAIL_PASSWORD'       => $request->site_smtp_mail_password,
                'MAIL_ENCRYPTION'       => $request->site_smtp_mail_encryption,
        ];
    
        $this->changeEnv($mail_env);
        return back();
            
       

        

    }

    public function viewSiteCacheSetting(){
        $siteSetting = SiteSetting::firstOrFail();
        return view('backend.setting.cache-setting',\get_defined_vars());
    }

    public function updateSiteCacheSetting(Request $request){
        // return $request->all();
        switch ($request->cache_type) {
        case 'view':
                \Artisan::call('view:clear');
                break;
        case 'route':
            \Artisan::call('route:clear');
               break;
        case 'config':
            \Artisan::call('config:clear');
            \Artisan::call('config:cache');
            break;
        case 'cache':
            \Artisan::call('cache:clear');
            \Artisan::call('config:cache');
                break;
        case 'all':
            \Artisan::call('view:clear');
            \Artisan::call('route:clear');
            \Artisan::call('config:clear');
            \Artisan::call('cache:clear');
            \Artisan::call('config:cache');
            \Artisan::call('clear-compiled');
            break;        
        default:
               \Artisan::call('view:clear');
                \Artisan::call('route:clear');
                \Artisan::call('config:clear');
                \Artisan::call('cache:clear');
                \Artisan::call('config:cache');
                \Artisan::call('clear-compiled');
            break;
        }
        return back();
    }
    
   
}
