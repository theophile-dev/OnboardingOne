<?php


namespace App\Controller;


use App\Entity\Contact;
use App\Form\ContactType;
use App\Notification\ContactNotification;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ContactController extends AbstractController
{

    public function index(Request $request, ContactNotification $notification): Response {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            
            // Send an email to the department's manager
            $notification->notify($contact);

            // Comment this line if you want to try sending multiple form without reloading
            return  $this->redirectToRoute("");
        }
        return $this->render('pages/contact.html.twig', ['form' => $form->createView()]);
    }

}