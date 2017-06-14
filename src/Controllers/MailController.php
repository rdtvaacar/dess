<?php

namespace Acr\Des\Controllers;

use Mail;
use Auth;
use View;
use Acr\Des\Model\Destek_model;

class MailController
{
    function mailGonder($view = null, $mail, $isim = null, $subject = null, $ekMesaj = null)
    {
        $destek_model    = new Destek_model();
        $ayar            = $destek_model->destek_ayar();
        $user_email_stun = empty($ayar->user_email_stun) ? 'id' : $ayar->user_email_stun;
        $email           = $user_email_stun;
        $user            = array(
            'email'   => $mail,
            'isim'    => $isim,
            'subject' => $subject
        );
// the data that will be passed into the mail view blade template
        $data = array(
            'ek'   => $ekMesaj,
            'isim' => $user['isim'],
        );
        if (Auth::check()) {
            $user_name         = empty(Auth::user()->name) ? Auth::user()->ad : Auth::user()->$email;
            $destek_mail       = empty($ayar->destek_mail) ? 'acarbey15@gmail.com' : $ayar->destek_mail;
            $destek_admin_isim = empty($ayar->destek_admin_isim) ? 'Admin' : $ayar->destek_admin_isim;

            $from = $destek_model->uye_id() == 1 ? $destek_mail : Auth::user()->$email;
            if ($destek_model->uye_id() == 1) {
                $user_name = $destek_admin_isim;
            }
        } else {
            $user_name = '';
            $from      = $destek_mail;
        }
// use Mail::send function to send email passing the data and using the $user variable in the closure
        Mail::send('acr_des_v::' . $view, $data, function ($message) use ($user, $user_name, $from) {
            $message->from($from, $user_name);
            $message->to($user['email'], $user['isim'])->subject($user['subject']);
        });
    }
}

?>