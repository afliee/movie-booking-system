<?php

namespace App\Mails;

use Libraries\Mail\Mailable;
use PHPMailer\PHPMailer\Exception;

class HelloUser extends Mailable
{
    public function __construct($data)
    {
        $this->subject = $data['subject'];
        $this->to = $data['to'];
        $this->view_name = $data['view_name'];
        $this->view_data = $data['view_data'];

        parent::__construct();
    }

    /**
     * @throws Exception
     */
    public function handle(): HelloUser
    {
        return $this->to($this->to)->subject($this->subject)
            ->view($this->view_name, $this->view_data);
    }
}