<?php
namespace App\Controllers;

use App\Controller;

class Exception extends Controller
{
    public $exception;
    public $code;

    public function action()
    {

        if ($this->code == 42) {

            $transport = (new \Swift_SmtpTransport('smtp.gmail.com', '465', 'SSL'))
                ->setUsername('xxmargo.rayxx@gmail.com')
                ->setPassword('MyPasword);

            $mailer = new \Swift_Mailer($transport);

            $message = (new \Swift_Message())
                ->setFrom(['xxmargo.rayxx@gmail.com' => 'Margo Joy'])
                ->setTo(['margoxjoy@gmail.com'])
                ->setSubject($this->exception)
                ->setBody(
                    'Код ошибки: ' . $this->code . "\n"
                    . 'Сообщение: ' . $this->exception . "\n"
                    . 'Дата и время: ' . date('c')
                    )
                ;

            $mailer->send($message);
        }

       $this->view->exception = $this->exception;

       echo $this->view->render(__DIR__ . '/../Templates/errors.php');
    }
}

