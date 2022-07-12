<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Model\M_config;
use App\Http\Model\M_order;

use Mail;
use DateTime;
use Config;
use Log, Artisan;
class SendMail extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:sendmail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Gửi mail';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */

    public function handle(){
        $mailSendStatus = M_config::where('name','mailSendStatus')->where('type','mail')->first();
        $mailAddress = M_config::where('name','mailAddress')->where('type','mail')->first();
        $mailPass = M_config::where('name','mailPass')->where('type','mail')->first();

        Log::info($mailSendStatus);

        //email config
        Config::set('mail.mailers.smtp.username', $mailAddress); // default
        Config::set('mail.mailers.smtp.password', $mailPass); // default

        if($mailSendStatus->value == 'on'){
            $email_send_list = M_order::where('email','!=','')->get();
            $mailContent = M_config::where('name','mailContent')->where('type','mail')->first();
            $mailTitle = M_config::where('name','mailTitle')->where('type','mail')->first();

        
            $email_send = 'cid18hotmail@gmail.com';
            $content = $mailContent->value;
            // gui gmail 
            $data = [
                'content'=> $content,
            ];
            $title_mail =  $mailTitle->value;
            // emai nhan 
            $email_nhan_get = M_order::where('sendmail','!=','on')->first();
            $email_nhan_get -> sendmail = 'on';
            $email_khach = $email_nhan_get->email;

            // gui mail den cho quan tri
            Mail::send('V_email/V_pay_success',$data,function($msg) use ($email_send,$title_mail, $email_khach){
            $msg -> from($email_send,'[Hệ thống]');
            $msg -> to($email_khach)-> subject($title_mail);
            });
            Log::info('SendMail Success');   
        }else{
            Log::info('Mail chua bat');   
        }
    }
}
