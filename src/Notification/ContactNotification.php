<?php

namespace App\Notification;

use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Contact;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class ContactNotification
{

    /**
    * @var Swift_Mailer
    */
    private $mailer;

    /**
    * @var Environment
    */
    private $render;


    public function __construct( \Swift_Mailer $mailer, Environment $render)
    {
        $this->mailer = $mailer;
        $this->render = $render;
    }

  public function notify(Contact $contact)
  {
      $message = (new \Swift_Message("Coiffure: Hello email"))
            ->setFrom('toto@coiffure.com')
            ->setTo('toto@gmail.com')
            ->setReplyTo($contact->getEmail())
            ->setBody($this->render->render('emails/contact.html.twig',[
              'contact' => $contact,
            ]), 'text/html') ;

        /** @var Symfony\Component\Mailer\SentMessage $sentEmail */
        $this->mailer->send($message);

  }
}
