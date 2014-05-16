<?php

namespace Btn\AppBundle\Service;

use Btn\AppBundle\Entity\Game;
use Symfony\Component\Templating\EngineInterface;
use Symfony\Component\HttpFoundation\Session\Session;

class GameManager
{
    protected $mailer;
    protected $em;
    protected $email;
    protected $templating;
    protected $session;

    public function __construct(\Swift_Mailer $mailer, $em, $email, EngineInterface $templating, Session $session)
    {
        $this->mailer     = $mailer;
        $this->em         = $em;
        $this->email      = $email;
        $this->templating = $templating;
        $this->session    = $session;
    }

    /**
     * Trigger when new game is created
     *
     * @param  $game
     * @return void
     **/
    public function createGame(Game $game)
    {
        $this->em->persist($game);
        $this->em->flush();

        $this->sendEmail($game);

        $this->setFlash();
    }

    private function setFlash()
    {
        // flash message
        $this->session->getFlashBag()->add(
            'notice',
            'Your changes were saved!'
        );
    }

    private function sendEmail(Game $game)
    {
        $body = $this->templating
            ->renderResponse('BtnAppBundle:Email:email.txt.twig',
                array('game' => $game)
        );

        // send email to admin
       $message = \Swift_Message::newInstance()
            ->setSubject('New game is here')
            ->setFrom('workshops@bitnoi.se')
            ->setTo($this->email)
            ->setBody($body)
        ;
        $this->mailer->send($message);
    }
}
